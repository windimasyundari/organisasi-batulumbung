<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Kegiatan</title>
</head> 
<body>    
<div class="page-wrapper">

    <div class="page-breadcrumb bg-white">
        <h2 style="text-align:center">LAPORAN KEGIATAN</h2>
        
        <table class="table table-borderless">
            <tr>
                <td>Nama Kegiatan</td>
                <td>{{$kegiatan['kegiatan']->nama_kegiatan}}</td>
            </tr>
            <tr>
                <td>Tanggal, Waktu</td>
                <td>{{$kegiatan['kegiatan']->tanggal}}, {{$kegiatan['kegiatan']->waktu}}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>{{$kegiatan['kegiatan']->tempat}}</td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>{{$kegiatan['kegiatan']->deskripsi}}</td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>  
                    @if($kegiatan['kegiatan']->image)
                        <div style="overflow:hidden">
                        <img src="{{ asset('storage/'. $kegiatan['kegiatan']->image) }}" class="img-fluid mb-3">
                        </div>
                    @endif
                </td>
            </tr>       
        </table>
        
    </div>
</div>
            
</body>
</html>
            
           
    