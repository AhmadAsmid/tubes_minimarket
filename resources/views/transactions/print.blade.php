<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e74c3c;
            color: white;
        }

        td {
            background-color: #ffffff;
        }

        /* Styling for the total section */
        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            background-color: #fce4e4;
            padding: 15px;
            border-radius: 8px;
            color: #d32f2f;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .total .label {
            font-size: 16px;
            font-weight: normal;
            color: #333;
        }

        .total .amount {
            font-size: 22px;
            color: #d32f2f;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <h2>Riwayat Transaksi - Toko Kelontong Pak Jayusman</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->code }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                    <td>{{ $transaction->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total Section -->
    <div class="total">
        <div class="label">Total Pembayaran Semua Transaksi:</div>
        <div class="amount">Rp {{ number_format($transactions->sum('total'), 0, ',', '.') }}</div>
    </div>

    <div class="footer">Terima kasih telah berbelanja di Toko Kelontong Pak Jayusman!</div>
</body>
</html>
