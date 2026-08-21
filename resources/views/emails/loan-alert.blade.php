<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>{{ config('app.name') }} - Loan Request</title>
</head>
<body class="bg-light">
<div class="container">
    <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
        <tbody>
        <tr>
            <td></td>
            <td class="container" width="600" valign="top">
                <div class="content" style="max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="border-radius: 3px; background-color: #fff; border: 1px solid #e9e9e9;" bgcolor="#fff">
                        <tbody>
                        <tr>
                            <td style="color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #d5d9dd; padding: 20px;" align="center" bgcolor="#71b6f9">
                                <h3 style="font-weight: bolder">{{ config('app.name') }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="content-wrap" style="padding: 20px;" valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td style="padding: 0 0 20px;" valign="top">
                                            <p>A new loan request has been submitted.</p>
                                    @if(isset($data) && is_object($data))
                                    <p><strong>Amount:</strong> \${{ number_format($data->amount, 2) }}</p>
                                    @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 0 20px;" valign="top">
                                            Thanks,<br>
                                            <b>{{ config('app.name') }}</b>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="footer" style="width: 100%; clear: both; color: #999; padding: 20px;">
                        <table width="100%">
                            <tbody>
                            <tr>
                                <td align="center" style="font-size: 12px; color: #999; padding: 0 0 20px;">
                                    <a href="{{ config('app.url') }}" style="font-size: 12px; color: #999; text-decoration: underline;">{{ config('app.name') }}</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>