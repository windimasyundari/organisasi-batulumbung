<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Keuangan</title>
</head> 
<body>    
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <h2 style="text-align:center">LAPORAN KEUANGAN</h2>
        
        <table class="table table-borderless" style="text-align:justify">
            <tr>
                <th style="width:200px"> Nama Pengurus</th>
                <td> {{$data->pengurus->nama}}</td>
            </tr>
            <tr>
                <th style="width:200px"> Nama Kegiatan</th>
                <td> {{$data->kegiatan->nama_kegiatan}}</td>
            </tr>
            <tr>
                <th> Jumlah Pemasukan</th>
                <td>Rp {{ number_format ($data->jmlh_pemasukan)}}</td>
            </tr>
            <tr>
                <th> Jumlah Pengeluaran</th>
                <td>Rp {{ number_format ($data->jmlh_pengeluaran)}}</td>
            </tr>
            <tr>
                <th> Tanggal</th>
                <td>{{$data->tanggal}}</td>
            </tr>         
            <tr>
                <th> Jenis Organisasi</th>
                <td>{{$data->organisasi->jenis}}</td>
            </tr>         
            <tr>
                <th> Keterangan</th>
                <td>{{$data->keterangan}}</td>
            </tr>         
           
               
        </table>
        
    </div>
</div>
            
</body>
</html>
            
           
    