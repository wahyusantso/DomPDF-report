<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->latest()->get();
        return view('welcome', ['users' => $users]);
    }

    public function exportPdf()
    {
        $data = DB::table('users')->orderBy('name', 'asc')->get();
        $pdf = PDF::loadView('report', ['data' => $data]);
        return $pdf->download('laporan_pegawai.pdf');
    }
}
