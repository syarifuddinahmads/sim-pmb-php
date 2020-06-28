@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Detail Pembayaran</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{url('pembayaran')}}" class="btn btn-sm btn-success">Kembali</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <br>
                <img id="preview" src="{{asset($user->status_pembayaran == null ?'images/placeholder.jpg':$user->bukti_pembayaran)}}" alt="your image" style="width: 25%;"/>
            </div>
            <hr>
            <form action="{{url('verifikasi-pembayaran')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$user->id_mahasiswa}}" name="id_mahasiswa">
                <div class="form-group text-right">
                    <a href="{{url('pembayaran')}}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-primary">Verifikasi Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
@endsection