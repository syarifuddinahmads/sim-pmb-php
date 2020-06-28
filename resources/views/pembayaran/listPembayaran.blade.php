@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Daftar Pembayaran</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal Pembayaran</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($no = 1)
                    @forelse($pembayaran as $j)
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td>{{$j->nama_mahasiswa}}</td>
                            <td class="text-center">{{date('Y-M-d',strtotime($j->tanggal_pembayaran))}}</td>
                            <td class="text-center">{{$j->status_pembayaran == 1?'Dibayar & Terverifikasi':'Belum Dibayar'}}</td>
                            <td class="text-center">
                                <a href="{{url('detail-pembayaran',$j->id_mahasiswa)}}" class="btn btn-sm btn-outline-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data tidak tersedia !</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <hr>
                <div class="text-center">
                    {{$pembayaran->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection