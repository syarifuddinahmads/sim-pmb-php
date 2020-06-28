@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Laporan</div>

            <div class="card-body">
                <form action="{{url('laporan')}}" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal_pembayaran" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Pembayaran</label>
                                <select name="status_pembayaran" class="form-control">
                                    <option value="">Semua</option>
                                    <option value="1">Dibayar</option>
                                    <option value="0">Belum Dibayar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Semua</option>
                                    <option value="1">Terverifikasi</option>
                                    <option value="2">Belum Terverifikasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group pt-2">
                                <button type="submit" class="btn btn-primary mt-4">Filter Laporan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Pendaftaran</th>
                            <th class="text-center">Status Pendaftaran</th>
                            <th class="text-center">Tanggal Pembayaran</th>
                            <th class="text-center">Status Pembayaran</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @forelse($laporan as $j)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-center">{{$j->nama_mahasiswa}}</td>
                                <td class="text-center">{{date('Y-M-d',strtotime($j->registered_at))}}</td>
                                <td class="text-center">{{$j->status== 1?'Terverifikasi':'Belum Terverifikasi'}}</td>
                                <td class="text-center">{{date('Y-M-d',strtotime($j->tanggal_pembayaran))}}</td>
                                <td class="text-center">{{$j->status_pembayaran == 1?'Dibayar & Terverifikasi':'Belum Dibayar'}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data tidak tersedia !</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <hr>
                    <div class="text-center">
                        {{$laporan->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection