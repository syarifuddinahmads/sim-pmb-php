@if(Auth::user()->user_type == 1)
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">Mahasiswa</a>
        <a href="{{url('jurusan')}}" class="list-group-item list-group-item-action">Jurusan</a>
        <a href="#" class="list-group-item list-group-item-action">Laporan</a>
    </div>
@endif

@if(Auth::user()->user_type == 2)
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">Data Diri</a>
    </div>
@endif