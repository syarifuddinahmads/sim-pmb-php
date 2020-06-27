@extends('layouts.app')

@section('content')
    <div class="container">

        @if($user->status == 0)
            <div class="alert alert-danger" role="alert">
                Data diri anda belum lengkap, <a href="{{url('lengkapi-data')}}">Klik disini untuk melengkapi !</a>
            </div>
        @endif

        @if($user->status == 2)
            <div class="alert alert-info" role="alert">
                Data diri anda sudah lengkap, <a href="{{url('upload-pembayaran')}}">Lakukan pembayaran !</a>
            </div>
        @endif

        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
@endsection
