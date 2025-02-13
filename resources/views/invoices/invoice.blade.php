<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
        }

        .details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Invoice Booking</h2>
            <p>{{ $booking->created_at->format('d M Y') }}</p>
        </div>
        <div class="details">
            <p><strong>Nama:</strong> {{ $booking->nama }}</p>
            <p><strong>Email:</strong> {{ $booking->email }}</p>
            <p><strong>Kamar:</strong> {{ $booking->room->nama_kamar }}</p>
            <p><strong>Total Harga:</strong> Rp{{ number_format($booking->room->harga, 0, ',', '.') }}</p>
        </div>
        <table>
            <tr>
                <th>Keterangan</th>
                <th>Harga</th>
            </tr>
            <tr>
                <td>Biaya Sewa</td>
                <td>Rp{{ number_format($booking->room->harga, 0, ',', '.') }}</td>
            </tr>
        </table>
        <p style="text-align: center; margin-top: 20px;">Terima kasih telah booking di hotel kami!</p>
    </div>
</body>

</html>
