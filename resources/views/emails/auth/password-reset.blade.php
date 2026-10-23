<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Şifre sıfırlama</title>
</head>
<body style="margin:0;padding:0;background:#f7f7f4;color:#232923;font-family:Arial,Helvetica,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f7f7f4;padding:36px 14px;">
        <tr><td align="center">
            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;background:#ffffff;border:1px solid #e2e4dd;border-radius:16px;overflow:hidden;">
                <tr><td style="padding:24px 32px;background:#283a32;color:#ffffff;font-size:20px;font-weight:bold;">Not Defteri<span style="color:#9bbda5;">.</span></td></tr>
                <tr><td style="padding:36px 32px 18px;">
                    <p style="margin:0 0 12px;color:#547b67;font-size:12px;font-weight:bold;letter-spacing:2px;">HESAP GÜVENLİĞİ</p>
                    <h1 style="margin:0 0 16px;font-size:26px;line-height:1.3;color:#232923;">Merhaba {{ $name }},</h1>
                    <p style="margin:0;color:#626b63;font-size:16px;line-height:1.7;">Şifreni sıfırlamak için aşağıdaki bağlantıyı kullan. Bağlantı {{ $expireMinutes }} dakika boyunca geçerlidir.</p>
                </td></tr>
                <tr><td align="center" style="padding:12px 32px 24px;">
                    <a href="{{ $url }}" style="display:inline-block;padding:14px 24px;border-radius:9px;background:#547b67;color:#ffffff;font-size:15px;font-weight:bold;text-decoration:none;">Yeni şifre belirle</a>
                </td></tr>
                <tr><td style="padding:0 32px 32px;color:#626b63;font-size:14px;line-height:1.7;">
                    <p style="margin:0 0 12px;">Düğme çalışmazsa bu bağlantıyı tarayıcına kopyala:</p>
                    <p style="margin:0 0 16px;word-break:break-all;"><a href="{{ $url }}" style="color:#547b67;">{{ $url }}</a></p>
                    <p style="margin:0;">Bu isteği sen yapmadıysan e-postayı dikkate almayabilirsin; şifren değiştirilmez.</p>
                </td></tr>
                <tr><td style="padding:18px 32px;border-top:1px solid #e2e4dd;color:#737970;font-size:12px;line-height:1.6;">© {{ date('Y') }} Not Defteri · Bu otomatik bir bilgilendirme e-postasıdır.</td></tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
