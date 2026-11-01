<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class NoInterventionImageTest extends TestCase
{
    /**
     * Controllers must not reference Intervention classes: the package is
     * not a composer dependency, so any such call fatals (e.g. admin
     * update_user failing at UserController:211 on avatar upload).
     */
    public function test_controllers_do_not_reference_intervention(): void
    {
        $files = [
            dirname(__DIR__, 2).'/app/Http/Controllers/Admin/UserController.php',
            dirname(__DIR__, 2).'/app/Http/Controllers/ClientAccountCreation.php',
        ];

        foreach ($files as $file) {
            $this->assertFileExists($file);
            $source = (string) file_get_contents($file);
            $this->assertStringNotContainsString(
                'Intervention',
                $source,
                basename($file).' must not reference the Intervention package'
            );
            $this->assertStringNotContainsString(
                'Image::make',
                $source,
                basename($file).' must not call the removed Image::make API'
            );
        }
    }
}
