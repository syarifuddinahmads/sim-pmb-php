@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Data Diri</div>

        <div class="card-body">
            <form action="{{url('lengkapi-data/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$user->id_user}}" name="id">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama_mahasiswa" class="form-control" value="{{$user->nama_mahasiswa}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan <span class="text-danger">*</span></label>
                            <select name="jurusan" class="form-control">
                                <option value="">Pilih Jurusan</option>
                                @foreach($jurusan as $j)
                                    <option value="{{$j->kode_jurusan}}">{{$j->kode_jurusan.' - '.$j->nama_jurusan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control" rows="2" required>{{$user->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Foto <span class="text-danger">*</span></label>
                            <br>
                            <img id="preview" src="{{asset($user->foto != null ? $user->foto:'images/placeholder.jpg')}}" alt="your image" style="width: 100%;"/>
                            <hr>
                            <input type="file" class="form-control" name="foto" id="imgInp" required/>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Ijazah <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="ijazah" required>
                </div>
                <div class="form-group">
                    <label for="">SKL <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="skl" required>
                </div>
                <div class="form-group">
                    <label for="">Kartu Keluarga <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="kk" required>
                </div>
                <hr>
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        })
    </script>
@endpush