@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Upload Pembayaran</div>

        <div class="card-body">
            <form action="{{url('upload-pembayaran/save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <br>
                    <img id="preview" src="{{asset($user->status_pembayaran == null ?'images/placeholder.jpg':$user->bukti_pembayaran)}}" alt="your image" style="width: 25%;"/>
                    <hr>
                    @if($user->status_pembayaran == null)
                        <div class="row">
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="bukti_pembayaran" id="imgInp" required/>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary mt-1">Upload Pembayaran</button>
                            </div>
                        </div>
                    @endif
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