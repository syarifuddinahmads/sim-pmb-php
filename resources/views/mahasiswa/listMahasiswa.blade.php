@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Daftar Mahasiswa</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Tanggal Daftar</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($no = 1)
                    @forelse($mahasiswa as $j)
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td>{{$j->nama_mahasiswa}}</td>
                            <td>{{$j->email}}</td>
                            <td>{{$j->kode_jurusan.' - '.$j->nama_jurusan}}</td>
                            <td class="text-center">{{date('Y-M-d',strtotime($j->registered_at))}}</td>
                            <td class="text-center">{{$j->status == 1?'Terverifikasi':'Belum Terverifikasi'}}</td>
                            <td class="text-center">
                                <a href="{{url('mahasiswa',$j->id_user)}}" class="btn btn-sm btn-outline-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Data tidak tersedia !</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <hr>
                <div class="text-center">
                    {{$mahasiswa->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection