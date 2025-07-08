<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA BK-KARIER</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <style>
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
            border: 1px solid black;
        }

        td {
            word-wrap: break-word;
            border: 1px solid black;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="text-center">DATA BIMBINGAN KARIER SISWA SMK NEGERI 1 BOJONGPICUNG</h1>
    @php
    $tahun = date('Y');
    @endphp
    <p class="text-center">Laporan Data Prestasi Akademik Siswa-Siswi SDN Nyalindung II
        Kp.Haregem, RT/RW. 005/001 Kel.Galudra, Kec.Cugenang, Kab.Cianjur Tahun{{$tahun}}</p>
    <br>
    <table>
        <thead>
            <tr>
                <th>NO.</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>KAMPUS</th>
                <th>PRODI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @php $num=1; @endphp
            @foreach ($karier as $data)
            <tr>
                <td>{{ $num++ }}</td>
                <td>{{ $data->siswa->nis}}</td>
                <td>{{ $data->siswa->nama_siswa}}</td>
                <td>{{ $data->siswa->kelas }}</td>
                <td>{{ $data->kampus }}</td>
                <td>{{ $data->prodi }}</td>
                <td>{{ $data->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> -->