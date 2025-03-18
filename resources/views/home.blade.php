<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 40px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .button {
            background-color: #1a73e8;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0f5bb5;
        }
    </style>
</head>
<body>
    <h1>Menu Utama</h1>
    <div class="button-container">
        <a href="/produk" class="button">Produk</a>
        <a href="/dashboard" class="button">Dashboard</a>
        <a href="https://www.kompasiana.com/fikriferryf5159/67d97bfec925c41c5941a8e5/pengenalan-laravel-framework-php-modern-untuk-pengembangan-web" class="button">Link Blog</a>
    </div>
</body>
</html>