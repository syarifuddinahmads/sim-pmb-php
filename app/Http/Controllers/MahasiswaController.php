<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lengkapiDataDiri(){
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')->where('users.id',Auth::user()->id)->first();
        $jurusan = Jurusan::all();
        $dataView = [
            'user' =>$user,
            'jurusan' => $jurusan
        ];
        return view('mahasiswa.formDataMahasiswa',$dataView);
    }

    public function updateDataDiri(Request $request){
        $tmp_file_foto = $_FILES['foto']['tmp_name'];
        $tmp_file_ijazah = $_FILES['ijazah']['tmp_name'];
        $tmp_file_kk = $_FILES['kk']['tmp_name'];
        $tmp_file_skl = $_FILES['skl']['tmp_name'];

        $nmfile = "images/foto/" . $_FILES['foto']['name'];
        $nmfile = "images/ijazah/" . $_FILES['ijazah']['name'];
        $nmfile = "images/kk/" . $_FILES['kk']['name'];
        $nmfile = "images/skl/" . $_FILES['skl']['name'];

        $namafilefoto = $_FILES['foto']['name'];
        $namafileijazah = $_FILES['ijazah']['name'];
        $namafilekk = $_FILES['kk']['name'];
        $namafileskl = $_FILES['skl']['name'];

        copy($tmp_file_foto, "images/foto/$namafilefoto");
        copy($tmp_file_ijazah, "images/ijazah/$namafileijazah");
        copy($tmp_file_kk, "images/kk/$namafilekk");
        copy($tmp_file_skl, "images/skl/$namafileskl");

        $data =[

        ];

        Mahasiswa::where('id_user',$request->id)->update($data);

        return redirect('home');
    }
}
