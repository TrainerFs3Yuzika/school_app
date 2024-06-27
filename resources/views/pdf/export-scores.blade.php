<!DOCTYPE html>
<html>
<head>
    <title>Detail Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .header, .footer {
            width: 100%;
            text-align: center;
            position: fixed;
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
            font-size: 14px;
        }
        .content {
            margin: 100px auto;
            width: 80%;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333333;
        }
        .icon {
            font-size: 20px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Detail Nilai</h2>
    </div>
    <div class="content">
        <h1>Laporan Nilai Siswa</h1>
        <table>
            <tbody>
                <tr>
                    <th>Guru</th>
                    <td>{{ $score->teacher->full_name }}</td>
                </tr>
                <tr>
                    <th>Siswa</th>
                    <td>{{ $score->student->first_name }}</td>
                </tr>
                <tr>
                    <th>Mata Pelajaran</th>
                    <td>{{ $score->subject->subject_name }}</td>
                </tr>
                <tr>
                    <th>Nilai</th>
                    <td>{{ $score->score }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>Page <span class="page-number"></span></p>
    </div>
</body>
</html>
