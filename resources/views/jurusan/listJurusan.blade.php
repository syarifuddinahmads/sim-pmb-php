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
                        <a href="{{url('jurusan/add')}}" class="btn btn-sm btn-success">Tambah Jurusan</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @forelse($jurusan as $j)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{$j->kode_jurusan}}</td>
                                    <td>{{$j->nama_jurusan}}</td>
                                    <td class="text-center">
                                        <a href="{{url('jurusan/edit',$j->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger btnDelete" data-id="{{$j->id}}">Delete</a>
                                    </td>
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
                        {{$jurusan->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ url('jurusan/delete') }}" id="formDelete">
        {{ csrf_field() }}
        <input type="hidden" id="idDelete" name="id">
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('.btnDelete').each(function () {
                $(this).on('click',function () {
                    $('#idDelete').val($(this).data('id'))
                    swal({
                            title: "Hapus Jurusan !",
                            text: "Apakah anda akan menhghapus jurusan ?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ya, Hapus Jurusan',
                            cancelButtonText: "Tidak, Batalkan",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm){
                            if (isConfirm){
                                swal("Sukses", "Data jurusan dihapus...", "success");
                                $('#formDelete').submit();
                            } else {
                                swal("Batal", "Data jurusan batal dihapus...", "error");
                                e.preventDefault();
                            }
                        });
                })
            })
        })
    </script>
@endpush
