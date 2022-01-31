<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>    
    <div class="container-fluid">
        <div class="card"> 
        <h1> LAPORAN KEGIATAN </h1>
            <div class="card-body">
                <h6>Nama Kegiatan</h6>
                <p class="card-text">{{ $kegiatan->nama_kegiatan }}</p>

                <h6>Tanggal | Waktu</h6>
                <p class="card-text">{{ $kegiatan->tanggal }} | {{ $kegiatan->waktu }}</p>

                <h6>Tempat</h6>
                <p class="card-text">{{ $kegiatan->tempat }}</p>

                <h6>Deskripsi</h6>
                <p class="card-text">{{ $kegiatan->deskripsi }}</p>

                <h6>Gambar</h6>
                @if ($kegiatan->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/'.$kegiatan->image) }}" alt="{{ $kegiatan->nama_kegiatan }}"
                    class="img-fluid mb-3">
                </div>
                @endif
            </div>
        </div>
    </div>
   
</body>
</html>
            
           
    