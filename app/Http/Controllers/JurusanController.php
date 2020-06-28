<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listJurusan(){
        $jurusan = Jurusan::paginate(10);
        $dataView = [
            'jurusan'=>$jurusan
        ];
        return view('jurusan.listJurusan',$dataView);
    }

    public function addJurusan(){
        return view('jurusan.formJurusan',['jurusan'=>null]);
    }

    public function editJurusan($id){
        $jurusan = Jurusan::where('id',$id)->first();
        $dataView = [
            'jurusan'=>$jurusan
        ];
        return view('jurusan.formJurusan',$dataView);
    }

    public function saveJurusan(Request $request){
        Log::info('REQ_SAVE_JURUSAN = '.json_encode($request->all()));
        $validatedData = $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
        ]);

        if ($validatedData){
            $jurusan = new Jurusan();
            if($request->id != null ||$request->id != ''){
                $jurusan->where('id',$request->id)->update(['nama_jurusan'=>$request->nama_jurusan,'kode_jurusan'=>$request->kode_jurusan]);
            }else{
                $jurusan->nama_jurusan = $request->nama_jurusan;
                $jurusan->kode_jurusan = $request->kode_jurusan;
                $jurusan->save();
            }
            return redirect('jurusan');
        }else{
            return redirect()->back();
        }
    }

    public function deleteJurusan(Request $request){
        $jurusan = Jurusan::findOrFail($request->id);
        $jurusan->delete();
        return redirect('/jurusan');
    }
}
