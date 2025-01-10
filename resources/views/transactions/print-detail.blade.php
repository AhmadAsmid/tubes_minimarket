<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            border-bottom: 1px solid #ddd;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            background-color: #fce4e4;
            padding: 10px;
            border-radius: 6px;
            color: #d32f2f;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .total .amount {
            font-size: 22px;
            color: #d32f2f;
        }

        .total .label {
            font-size: 16px;
            color: #333;
        }

        .footer-text {
            font-size: 14px;
            color: #666;
            margin-top: 20px;
        }

        /* Add a little animation to total for emphasis */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .total {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Mini Market Pak Jayusman</h2>
        <p><strong>Kode Transaksi:</strong> {{ $transaction->code }}</p>
        <p><strong>Tanggal:</strong> {{ $transaction->date }}</p>
        <p><strong>Kasir:</strong> {{ $transaction->user->name }}</p>

        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction_details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td class="text-right">{{ $detail->qty }}</td>
                        <td class="text-right">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                        <td class="text-right">Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Section with New Styling -->
        <div class="total">
            <span class="label">Total:</span>
            <span class="amount">Rp {{ number_format($transaction->total, 0, ',', '.') }}</span>
        </div>

        <p class="text-center footer-text">Anda puas kami senang!</p>
    </div>
</body>
</html>
