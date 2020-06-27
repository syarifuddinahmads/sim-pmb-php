@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Jurusan</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{url('jurusan')}}" class="btn btn-sm btn-success">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{url('jurusan/save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$jurusan != null ? $jurusan->id:''}}">
                    <div class="form-group row">
                        <label for="kode_jurusan" class="col-md-4 col-form-label text-md-right">Kode Jurusan</label>

                        <div class="col-md-6">
                            <input id="kode_jurusan" type="number" class="form-control{{ $errors->has('kode_jurusan') ? ' is-invalid' : '' }}" name="kode_jurusan"  value="{{$jurusan != null ? $jurusan->kode_jurusan:''}}" required>

                            @if ($errors->has('kode_jurusan'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kode_jurusan') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_jurusan" class="col-md-4 col-form-label text-md-right">Nama Jurusan</label>

                        <div class="col-md-6">
                            <input id="nama_jurusan" type="text" class="form-control{{ $errors->has('nama_jurusan') ? ' is-invalid' : '' }}" name="nama_jurusan" value="{{$jurusan != null ? $jurusan->nama_jurusan:''}}" required>

                            @if ($errors->has('nama_jurusan'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_jurusan') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{url('jurusan')}}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
