<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balasan Pesan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .header h2 {
            color: #3b82f6;
            margin: 0;
        }
        .content {
            margin-bottom: 20px;
        }
        .greeting {
            font-size: 16px;
            margin-bottom: 15px;
        }
        .message-body {
            background-color: #f8fafc;
            padding: 20px;
            border-left: 4px solid #3b82f6;
            border-radius: 4px;
            margin: 20px 0;
            white-space: pre-line;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 14px;
            color: #6b7280;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>📧 Balasan dari Admin Galeri Website</h2>
        </div>
        
        <div class="content">
            <p class="greeting">Halo <strong>{{ $contactName }}</strong>,</p>
            
            <p>Terima kasih telah menghubungi kami. Berikut adalah balasan dari admin:</p>
            
            <div class="message-body">{{ $replyMessage }}</div>
            
            <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami kembali.</p>
        </div>
        
        <div class="footer">
            <p>Email ini dikirim secara otomatis dari sistem Galeri Website.</p>
            <p>&copy; {{ date('Y') }} Galeri Website. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
