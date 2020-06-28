@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Data Diri</div>

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
        </div>
    </div>
@endsection