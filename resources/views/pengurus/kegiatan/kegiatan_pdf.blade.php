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
        @foreach(kegiatan as $kegiatans)
            <tr>
                <th>Nama Kegiatan</th>
                <td>{{$kegiatans->nama_kegiatan}}</td>
            </tr>
            <tr>
                <th>Tanggal | Waktu</th>
                <td>{{$kegiatans->tanggal}} | {{$kegiatans->tanggal}}</td>
            </tr>
            <tr>
                <th>Tempat</th>
                <td>{{$kegiatans->tempat}}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{$kegiatans->deskripsi}}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td> 
                    @if ($kegiatans->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/'.$kegiatans->image) }}" 
                        class="img-fluid mb-3">
                    </div>
                    @endif
                </td>
            </tr>
            @endforaech
        </table>
       
    </div>
        
            
</body>
</html>
            
           
    