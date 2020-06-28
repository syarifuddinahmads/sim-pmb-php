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

    public function listMahasiswa(Request $request){

        $mahasiswa= User::join('mahasiswa as m','m.id_user','=','users.id')
            ->leftJoin('jurusan as j','j.kode_jurusan','=','m.jurusan')
            ->orderBy('m.registered_at','desc')
            ->where('users.user_type',2)->paginate(10);
        $dataView = [
            'mahasiswa'=>$mahasiswa
        ];
        return view('mahasiswa.listMahasiswa',$dataView);
    }

    public function detailMahasiswa($id){
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')->leftJoin('jurusan as j','j.kode_jurusan','=','m.jurusan')->where('m.id_user',$id)->first();
        $dataView = [
            'user' =>$user
        ];

        return view('mahasiswa.detailMahasiswa',$dataView);
    }

    public function dataDiri(){
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')
            ->join('jurusan as j','j.kode_jurusan','=','m.jurusan')
            ->leftJoin('pembayaran as p','p.id_mahasiswa','=','m.id_user')
            ->where('users.id',Auth::user()->id)->first();
        $dataView = [
            'user' =>$user
        ];
        return view('mahasiswa.dataDiriMahasiswa',$dataView);
    }

    public function lengkapiDataDiri(){
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')
            ->where('users.id',Auth::user()->id)->first();
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

        $nmfilefoto = "images/foto/" . $_FILES['foto']['name'];
        $nmfileijazah = "images/ijazah/" . $_FILES['ijazah']['name'];
        $nmfilekk = "images/kk/" . $_FILES['kk']['name'];
        $nmfileskl = "images/skl/" . $_FILES['skl']['name'];

        $namafilefoto = $_FILES['foto']['name'];
        $namafileijazah = $_FILES['ijazah']['name'];
        $namafilekk = $_FILES['kk']['name'];
        $namafileskl = $_FILES['skl']['name'];

        copy($tmp_file_foto, "images/foto/$namafilefoto");
        copy($tmp_file_ijazah, "images/ijazah/$namafileijazah");
        copy($tmp_file_kk, "images/kk/$namafilekk");
        copy($tmp_file_skl, "images/skl/$namafileskl");

        $data =[
            'foto' => $nmfilefoto,
            'kk' => $nmfilekk,
            'skl' => $nmfileskl,
            'ijazah' => $nmfileijazah,
            'alamat'=> $request->alamat,
            'jurusan' => $request->jurusan,
            'status'=>2
        ];

        Mahasiswa::where('id_user',$request->id)->update($data);

        return redirect('home');
    }

    public function verifikasiMahasiswa(Request $request){
        Mahasiswa::where('id_user',$request->id_user)->update(['status'=>1]);
        return redirect('mahasiswa');
    }
}
