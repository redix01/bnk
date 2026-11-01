<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminAvatarUploadTest extends TestCase
{
    use RefreshDatabase;

    /** @var string[] */
    private array $createdAvatars = [];

    protected function tearDown(): void
    {
        foreach ($this->createdAvatars as $filename) {
            $path = public_path('avatars/'.$filename);
            if (is_file($path)) {
                @unlink($path);
            }
        }
        parent::tearDown();
    }

    private function rawAvatar(?User $user): ?string
    {
        // Bypass the getAvatarAttribute accessor, which prefixes '/avatars/'.
        return $user ? $user->getRawOriginal('avatar') : null;
    }

    private function trackAvatar(?User $user): void
    {
        $filename = $this->rawAvatar($user);
        if ($filename) {
            $this->createdAvatars[] = $filename;
        }
    }

    private function assertAvatarStored(User $user): void
    {
        $this->assertNotEmpty($this->rawAvatar($user));
        $this->assertFileExists(public_path('avatars/'.$this->rawAvatar($user)));
        $this->trackAvatar($user);
    }

    public function test_admin_can_update_user_with_avatar(): void
    {
        $admin = User::factory()->create(['admin' => 1]);
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->patch(route('admin.update_user', $user->id), [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'avatar' => UploadedFile::fake()->image('photo.jpg', 400, 400),
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Profile Updated Successful');

        $user->refresh();
        $this->assertSame('Jane', $user->first_name);
        $this->assertAvatarStored($user);
    }

    public function test_admin_can_update_user_without_avatar(): void
    {
        $admin = User::factory()->create(['admin' => 1]);
        $user = User::factory()->create(['avatar' => 'existing.jpg']);

        $response = $this->actingAs($admin)->patch(route('admin.update_user', $user->id), [
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Profile Updated Successful');

        $user->refresh();
        $this->assertSame('John', $user->first_name);
        $this->assertSame('existing.jpg', $this->rawAvatar($user));
    }

    public function test_admin_can_store_user_with_avatar(): void
    {
        $admin = User::factory()->create(['admin' => 1]);

        $response = $this->actingAs($admin)->post(route('admin.store_user'), [
            'first_name' => 'New',
            'last_name' => 'User',
            'email' => 'newuser@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'country_code' => '+1',
            'account_type' => 'savings',
            'preferred_currency' => 'USD',
            'avatar' => UploadedFile::fake()->image('photo.jpg', 400, 400),
        ]);

        $response->assertRedirect(route('admin.users'));

        $user = User::where('email', 'newuser@example.com')->firstOrFail();
        $this->assertAvatarStored($user);
        $this->assertNotNull($user->account);
    }

    public function test_public_new_account_with_avatar(): void
    {
        $response = $this->post(route('new_account'), [
            'first_name' => 'Pub',
            'last_name' => 'Lic',
            'email' => 'publicuser@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'country_code' => '+1',
            'account_type' => 'savings',
            'preferred_currency' => 'USD',
            'avatar' => UploadedFile::fake()->image('photo.jpg', 400, 400),
        ]);

        $response->assertRedirect(route('admin.users'));

        $user = User::where('email', 'publicuser@example.com')->firstOrFail();
        $this->assertAvatarStored($user);
    }
}
