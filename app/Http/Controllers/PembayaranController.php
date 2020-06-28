<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listPembayaran(){
        $pembayaran = User::join('mahasiswa as m','m.id_user','=','users.id')
            ->join('jurusan as j','j.kode_jurusan','=','m.jurusan')
            ->join('pembayaran as p','p.id_mahasiswa','=','m.id_user')
            ->orderBy('p.created_at','desc')->paginate(10);
        $dataView = [
            'pembayaran' =>$pembayaran
        ];
        return view('pembayaran.listPembayaran',$dataView);
    }

    public function detailPembayaran($id){
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')
            ->leftJoin('jurusan as j','j.kode_jurusan','=','m.jurusan')
            ->leftJoin('pembayaran as p','p.id_mahasiswa','=','m.id_user')
            ->where('p.id_mahasiswa',$id)->first();
        $dataView = [
            'user' =>$user
        ];

        return view('pembayaran.detailPembayaran',$dataView);
    }

    public function uploadPembayaran(){
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')
            ->leftJoin('jurusan as j','j.kode_jurusan','=','m.jurusan')
            ->leftJoin('pembayaran as p','p.id_mahasiswa','=','m.id_user')
            ->where('users.id',Auth::user()->id)->first();
        $dataView = [
            'user' =>$user
        ];

        return view('pembayaran.uploadPembayaran',$dataView);
    }

    public function savePembayaran(Request $request){
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')
            ->join('jurusan as j','j.kode_jurusan','=','m.jurusan')
            ->where('users.id',Auth::user()->id)->first();

        $tmp_file = $_FILES['bukti_pembayaran']['tmp_name'];
        $nmfile = "images/foto/" . $_FILES['bukti_pembayaran']['name'];
        $namafile = $_FILES['bukti_pembayaran']['name'];
        copy($tmp_file, "images/foto/$namafile");

        $pembayaran = new Pembayaran();
        $pembayaran->id_mahasiswa = $user->id_user;
        $pembayaran->bukti_pembayaran = $nmfile;
        $pembayaran->status_pembayaran = 2;
        $pembayaran->save();

        return redirect('home')->with(['success'=>'Upload bukti pembayaran berhasil, tunggu verifikasi dari admin...']);

    }

    public function verifikasiPembayaran(Request $request){
        Pembayaran::where('id_mahasiswa',$request->id_mahasiswa)->update(['status_pembayaran'=>1]);
        return redirect('pembayaran');
    }
}
