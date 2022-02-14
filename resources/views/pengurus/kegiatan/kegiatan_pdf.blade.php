<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
</head> 
<body>    
    <div>
        <h1> LAPORAN KEGIATAN </h1>
    </div>   
    <div>
        <table>
        @foreach ($kegiatan as $kegiatann)
            <tr>
                <th>Nama Kegiatan</th>
                <td>{{$kegiatan->nama_kegiatan}}</td>
            </tr>
            <tr>
                <th>Tanggal | Waktu</th>
                <td>{{$kegiatann->tanggal}} | {{$kegiatann->tanggal}}</td>
            </tr>
            <tr>
                <th>Tempat</th>
                <td>{{$kegiatan->tempat}}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{$kegiatan->deskripsi}}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td> 
                    @if ($kegiatan->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/'.$kegiatan->image) }}" 
                        class="img-fluid mb-3">
                    </div>
                    @endif
                </td>
            </tr>
           @endforeach
        </table>
    </div>
            
</body>
</html>
            
           
    