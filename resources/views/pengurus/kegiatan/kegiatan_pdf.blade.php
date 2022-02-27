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
                <td>{{$data->nama_kegiatan}}</td>
            </tr>
            <tr>
                <td>Tanggal, Waktu</td>
                <td>{{$data->tanggal}}, {{$data->waktu}}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>{{$data->tempat}}</td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>{{$data->deskripsi}}</td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>  
                    @if(!empty($data->image))
                        <div style="overflow:hidden; width:300px">
                        <img src="{{ public_path('storage/'. $data->image) }}" class="img-fluid mb-3" style="width:100%">
                        </div>
                    @endif
                </td>
            </tr>       
        </table>
        
    </div>
</div>
            
</body>
</html>
            
           
    