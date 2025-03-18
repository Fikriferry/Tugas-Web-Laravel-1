<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
            max-width: 600px;
            margin: 20px auto;
        }

        li {
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        li span {
            font-weight: bold;
            color: #1a73e8;
        }

        /* Styling tombol */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
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
    <h1>Daftar Produk</h1>
    <ul>
        @foreach ($produk as $item)
            <li>
                <span>{{ $item['nama'] }}</span> - Rp {{ number_format($item['harga'], 0, ',', '.') }}
            </li>
        @endforeach
    </ul>

    <div class="button-container">
        <a href="/keranjang" class="button">Keranjang</a>
        <a href="/checkout" class="button">Checkout</a>
    </div>
</body>
</html>