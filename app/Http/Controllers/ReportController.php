<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Profil;
use App\Models\Tagihan;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function perusahaan()
    {
        $data = Profil::all();

        $pdf = Pdf::loadView('back.report.perusahaan', compact('data'))->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan Perusahaan.pdf');
    }

    public function pendapatan(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $data = Tagihan::wherebetween('tanggal_upload', [$start , $end])->get();
        $total = $data->sum('total');

        $pdf = Pdf::loadView('back.report.pendapatan', compact('data', 'total', 'start', 'end'))->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan pendapatan.pdf');
    }
}
