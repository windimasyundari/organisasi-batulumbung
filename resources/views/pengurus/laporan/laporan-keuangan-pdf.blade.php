<div class="table-responsive mt-3">
    <table class="table text-nowrap">
        <thead>
            <tr>
                <th class="border-top-0">NO</th>
                <th class="border-top-0">PEMASUKAN</th>
                <th class="border-top-0">PENGELUARAN</th>
                <th class="border-top-0">TANGGAL</th>
                <th class="border-top-0">KETERANGAN</th>
                <th class="border-top-0">JENIS ORGANISASI</th>
                <th class="border-top-0">ID KEGIATAN</th>
                <th class="border-top-0">ID PENGURUS</th>
                <th class="border-top-0">AKSI</th>
            </tr>
        </thead>
        <tbody>
        @forelse($laporan_keuangan as $laporan_keuangan)
            <tr>
                <th scope="row">{{ $loop->iteration}}</th>
                <td>Rp {{ number_format($laporan_keuangan ->jmlh_pemasukan) }}</td>
                <td>Rp {{ number_format($laporan_keuangan ->jmlh_pengeluaran) }}</td>
                <td>{{$laporan_keuangan->tanggal}}</td>
                <td>{{$laporan_keuangan->keterangan}}</td>
                <td>{{$laporan_keuangan->organisasi->jenis}}</td>
                <td>{{$laporan_keuangan->kegiatan_id}}</td>
                <td>{{$laporan_keuangan->pengurus_id}}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
