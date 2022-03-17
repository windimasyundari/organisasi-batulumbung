@extends ('layouts.main-pengurus')

@section('title', 'Dashboard')

@section('content')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">JUMLAH ANGGOTA</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <span class="counter text-primary"><i class="bi bi-people-fill"></i> {{ $hitunganggota }}</span>
                                </li>
                                <li class="ms-auto">
                                    <button class="btn btn-primary"> <a href="/anggota/anggota" style="color:white"> Detail </a></button>
                                <li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">JUMLAH EVENT</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <span class="counter text-success"><i class="bi bi-calendar2-week-fill"></i> {{ $hitungevent}}</span>
                                </li>
                                <li class="ms-auto">
                                    <button class="btn btn-success"> <a href="/event/event" style="color:white"> Detail </a></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">JUMLAH KEGIATAN</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <span class="counter text-warning"><i class="bi bi-calendar2-check-fill"></i> {{ $hitungkegiatan }}</span>
                                </li>
                                <li class="ms-auto">
                                    <button class="btn btn-warning"><a href="/kegiatan/kegiatan" style="color:white"> Detail </a></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">JUMLAH PENGUMUMAN</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <span class="counter text-danger"> <i class="bi bi-megaphone-fill"></i> {{ $hitungpengumuman }}</span>
                                </li>
                                <li class="ms-auto">
                                    <button class="btn btn-danger"><a href="/pengumuman/pengumuman" style="color:white"> Detail </a></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- KEGIATAN TERBRU -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Kegiatan Terbaru</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-info table-striped">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">NO</th>
                                            <th class="border-top-0">NAMA KEGIATAN</th>
                                            <th class="border-top-0">TANGGAL</th>
                                            <th class="border-top-0">JENIS ORGANISASI</th>
                                            <th class="border-top-0">DETAIL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kegiatan as $kegiatans)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration}}</th>
                                            <td>{{$kegiatans->nama_kegiatan}}</td>
                                            <td>{{$kegiatans->tanggal}}</td>
                                            <td>{{$kegiatans->organisasi->jenis}}</td>
                                            <td><a href="\kegiatan\kegiatan\{{ $kegiatans->id }}" class="btn btn-primary"><i class="bi bi-eye-fill m-r-5"></i>Detail</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- Pengumuman Terbaru -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-heading">
                                <h3 class="box-title mb-0">Pengumuman Terbaru</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($pengumuman as $pengumuman)
                                <div class="card-body bg-primary mb-2">
                                    <h4 class="card-title" style="font-weight:800">{{$pengumuman->judul}}</h4>
                                    <p class="card-text">{{$pengumuman->isi}}</p>
                                    <a href="{{route('file.download', $pengumuman->id)}}" class="btn btn-danger text-light"><i class="bi bi-download"></i> Download</a>
                                </div>
                                @endforeach
                            </div>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-heading">
                                <h3 class="box-title mb-0">Event</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($event as $events)
                                    <div class="card-body bg-success mb-2">
                                        <h4 class="card-title text-dark" style="font-weight:800" >{{$events->nama_event}}</h4>
                                        <p class="card-text text-dark">Tanggal : {{$events->tanggal}}</p>
                                        <a href="\event\event\{{ $events->id }}" class="btn btn-danger text-light"><i class="bi bi-eye-fill m-r-5"></i>Detail</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>

            </div>
               
@endsection