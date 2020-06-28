@if(Auth::user()->user_type == 1)
    <div class="list-group">
        <a href="{{url('home')}}" class="list-group-item list-group-item-action">Home</a>
        <a href="{{url('mahasiswa')}}" class="list-group-item list-group-item-action">Mahasiswa</a>
        <a href="{{url('pembayaran')}}" class="list-group-item list-group-item-action">Pembayaran</a>
        <a href="{{url('jurusan')}}" class="list-group-item list-group-item-action">Jurusan</a>
        <a href="{{url('laporan')}}" class="list-group-item list-group-item-action">Laporan</a>
    </div>
@endif

@if(Auth::user()->user_type == 2)
    <div class="list-group">
        <a href="{{url('home')}}" class="list-group-item list-group-item-action" >Home</a>
        <a href="{{$user->status != 0?url('data-diri'):'javascript:void(0)'}}" class="list-group-item list-group-item-action" >Data Diri</a>
        <a href="{{$user->status != 0?url('upload-pembayaran'):'javascript:void(0)'}}" class="list-group-item list-group-item-action">Pembayaran</a>
    </div>
@endif