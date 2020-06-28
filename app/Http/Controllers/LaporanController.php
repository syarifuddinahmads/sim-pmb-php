<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listLaporan(Request $request)
    {

        $tanggalPembayaran = $request->tanggal_pembayaran==null ? date('yy-m-d'):date('yy-m-d', strtotime($request->tanggal_pembayaran));
        $startDate = $tanggalPembayaran . " 00:00:00";
        $endDate = $tanggalPembayaran . " 23:59:59";

        $laporan = User::join('mahasiswa as m', 'm.id_user', '=', 'users.id')
            ->leftJoin('jurusan as j', 'j.kode_jurusan', '=', 'm.jurusan')
            ->leftJoin('pembayaran as p', 'p.id_mahasiswa', '=', 'm.id_user')
            ->orderBy('p.created_at', 'desc');

        if ($request->status != "") {

            $laporan = $laporan->where([
                'users.user_type' => 2,
                'm.status' => $request->status
            ]);
        }else if ($request->status_pembayaran != "") {
            $laporan = $laporan->where([
                'status_pembayaran' => $request->status_pembayaran,
                'users.user_type' => 2,
            ]);
        }else{
            $laporan = $laporan->where([
                'users.user_type' => 2,
            ]);
        }

        $laporan = $laporan->whereBetween('p.tanggal_pembayaran', array($startDate, $endDate))->paginate(10);


        $dataView = [
            'laporan' => $laporan
        ];
        return view('laporan.listLaporan', $dataView);
    }
}
