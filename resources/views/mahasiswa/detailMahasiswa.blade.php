@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Detail Mahasiswa</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{url('mahasiswa')}}" class="btn btn-sm btn-success">Kembali</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <td>{{$user->nama_mahasiswa}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <td>{{$user->alamat}}</td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <td>{{$user->kode_jurusan.' - '.$user->nama_jurusan}}</td>
                        </tr>
                        <tr>
                            <th>Ijazah</th>
                            <th>:</th>
                            <td><a href="{{url($user->ijazah)}}" target="_blank">Lihat</a></td>
                        </tr>
                        <tr>
                            <th>Skl</th>
                            <th>:</th>
                            <td><a href="{{url($user->skl)}}" target="_blank">Lihat</a></td>
                        </tr>
                        <tr>
                            <th>Kartu Keluarga</th>
                            <th>:</th>
                            <td><a href="{{url($user->kk)}}" target="_blank">Lihat</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <img src="{{asset($user->foto)}}" alt="" style="width: 100%;">
                </div>
            </div>
            <hr>
            <form action="{{url('verifikasi/mahasiswa')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{$user->id_user}}">
                <div class="form-group text-right">
                    <a href="{{url('mahasiswa')}}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-primary">Verifikasi Mahasiswa</button>
                </div>
            </form>
        </div>
    </div>
@endsection