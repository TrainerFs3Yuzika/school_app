<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header, .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
        }
        .footer .page-number:before {
            content: counter(page);
        }
        .content {
            margin: 50px 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Daftar Buku</h2>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Genre</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>{{ $book->tahun_terbit }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->stok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>Page <span class="page-number"></span></p>
    </div>
</body>
</html>
