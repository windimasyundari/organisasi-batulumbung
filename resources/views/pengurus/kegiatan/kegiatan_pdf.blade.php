<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
</head>        
        <h1> LAPORAN KEGIATAN </h1>
            <h6>Nama Kegiatan</h6>
            <p>{{$kegiatan->nama_kegiatan}}</p>

            <h6>Tanggal | Waktu</h6>
            <p>{{ $kegiatan->tanggal }} | {{ $kegiatan->waktu }}</p>

            <h6>Tempat</h6>
            <p>{{ $kegiatan->tempat }}</p>

            <h6>Deskripsi</h6>
            <p>{{ $kegiatan->deskripsi }}</p>

            <h6>Gambar</h6>
            @if ($kegiatan->image)
            <div style="max-height: 50px; overflow:hidden">
                <img src="data:image/png;base64,{{ $image }}">
            </div>
            @endif
</body>
</html>
            
           
    