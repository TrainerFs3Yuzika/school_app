<!DOCTYPE html>
<html>
<head>
    <title>Detail Pembayaran</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f2f2f2;
            padding-bottom: 20px;
        }
        .header img {
            width: 80px;
        }
        .header h2 {
            margin: 10px 0 0 0;
            font-size: 28px;
            color: #333;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #777;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }
        th {
            background-color: #f7f7f7;
            color: #333333;
        }
        td {
            background-color: #ffffff;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
        .btn-print {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-print:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            {{-- <img src="logo_url_here" alt="Logo"> --}}
            <h2>Detail Pembayaran</h2>
            <p>Terima kasih telah melakukan pembayaran</p>
        </div>
        <table>
            <tbody>
                <tr>
                    <th>Nama Siswa</th>
                    <td>{{ $payment->first_name }} {{ $payment->last_name }}</td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <td>{{ $payment->payment_method }}</td>
                </tr>
                <tr>
                    <th>Jenis Pembayaran</th>
                    <td>{{ $payment->payment_type }}</td>
                </tr>
                <tr>
                    <th>Status Pembayaran</th>
                    <td>{{ $payment->payment_status }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <td>{{ $payment->created_at->format('d M Y') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
