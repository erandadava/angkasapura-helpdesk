<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;
use Auth;
use Carbon\Carbon;

class pdfController extends Controller
{
    public function make_pdf($tabel){
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $tabel = \Crypt::decrypt($tabel);
        $isinya = [];
        switch ($tabel) {
            case 'issues':
                if($roles[0] == "IT Administrator" || $roles[0] == "Admin"){
                    $get = \App\Models\issues::with(['category','priority','request'])->get();
                }elseif($roles[0] == "IT Non Public"){
                    $get = \App\Models\issues::with(['category','priority','request'])->where('complete_by','=',\DB::raw('assign_it_ops'))->get();
                }else{
                    $get = \App\Models\issues::with(['category','priority','request'])->where('request_id','=',$user->id)->orWhere('assign_it_ops','=',$user->id)->orWhere('assign_it_support','=',$user->id)->get();
                }
                $head = ['Kode', 'Permintaan Oleh', 'Prioritas', 'Waktu Keluhan', 'Kategori', 'Lokasi', 'Status'];
                $title = 'Ticket';
                foreach ($get as $key => $value) {
                    if ($value['status'] == null){ $status = 'Menunggu IT Administrator';};
                    if ($value['status'] == 'RITADM'){ $status = "Ditolak & Menunggu Alasan Dari IT Administrator";}
                    if ($value['status'] == 'AITADM'){ $status = "Diterima IT Administrator";}
                    if ($value['status'] == 'ITSP'){ $status = "Diteruskan ke IT Support";}
                    if ($value['status'] == 'RITSP'){ $status = "Keluhan Tidak Dapat Diatasi Oleh IT Support & Menunggu Konfirmasi Dari IT Administrator";}
                    if ($value['status'] == 'AITSP'){ $status = "Menunggu Solusi Dari IT Support";}
                    if ($value['status'] == 'ITOPS'){ $status = "Menunggu Solusi Dari IT OPS";}
                    if ($value['status'] == 'CLOSE'){ $status = "Keluhan Ditutup";}
                    if ($value['status'] == 'SLITADM'){ $status = "Solusi Telah Diberikan IT Administrator";}
                    if ($value['status'] == 'SLITOPS'){ $status = "Solusi Telah Diberikan IT OPS";}
                    if ($value['status'] == 'RT'){ $status = "User Telah Memberi Rating";}
                    $isinya[$key]=[
                        0 => $value['issue_id'],
                        1 => $value['request']['name'],
                        2 => $value['priority']['prio_name'],
                        3 => $value['issue_date'],
                        4 => $value['category']['cat_name'],
                        5 => $value['location'],
                        6 => $status
                    ];   
                }
                break; 
            case 'inventories': 
                $get = \App\Models\inventory::with('cat_inventory')->get();
                $head = ['Kategori Inventaris', 'Lokasi', 'Nama Perangkat', 'Merk', 'Status'];
                $title = 'Inventaris';
                foreach ($get as $key => $value) {
                    if ($value['is_active'] == 0){ $status = 'Non Aktif';};
                    if ($value['is_active'] == 1){ $status = "Aktif";}
                    $isinya[$key]=[
                        0 => $value['cat_inventory']['nama_cat'],
                        1 => $value['lokasi'],
                        2 => $value['nama_perangkat'],
                        3 => $value['merk'],
                        4 => $status,
                    ];   
                }
                break;
            case 'laporan_bulanan' :
                $now = Carbon::now();
                $get = \App\Models\inventory::with(['issues'])->withCount(['issuesjml','issuesjmlsla'])->get();
                $head = ['Nama Perangkat', 'Jumlah Keluhan', 'SLA'];
                $title = 'Laporan Bulanan';
                foreach ($get as $key => $value) {
                    $hasilrusak = 0;
                    foreach ($value->issues as $keys => $values) {
                        $interval = $values['issue_date']->diffInMinutes($values['complete_date'], true);
                        $interval = (int) $interval / 60 / 24;
                        $hasilrusak += $interval*24;
                    }
                    $hasil = ((720 - $hasilrusak)/720)*100;
                    $hasil = number_format($hasil, 2, '.', ' ');
                    $hasil = $hasil.'%';


                    $isinya[$key]=[
                        0 => $value['nama_perangkat'],
                        1 => $value['issuesjml_count'],
                        2 => $hasil
                    ];   
                }
            break;
            case 'laporan_inventaris': 
                $get = \App\Models\inventory::with('cat_inventory')->get();
                $head = ['Kategori Inventaris', 'Lokasi', 'Merk', 'Tanggal Pembelian', 'Tanggal Penyerahan', 'Status'];
                $title = 'Laporan Inventaris';
                foreach ($get as $key => $value) {
                    if ($value['is_active'] == 0){ $status = 'Non Aktif';};
                    if ($value['is_active'] == 1){ $status = "Aktif";}
                    $isinya[$key]=[
                        0 => $value['cat_inventory']['nama_cat'],
                        1 => $value['lokasi'],
                        2 => $value['merk'],
                        3 => $value['tgl_pembelian'],
                        4 => $value['tgl_penyerahan'],
                        5 => $status,
                    ];   
                }
            break;
            case 'penilaian':        
                if($roles[0] == "IT Administrator" || $roles[0] == "Admin"){
                    return $model->with(['category','priority','request','rating'])->where('status','=','RT')->newQuery();
                }else{
                    $get = \App\Models\issues::with(['category','priority','request','rating'])->where([['request_id','=',$user->id],['status','=','RT']])->orWhere([['assign_it_ops','=',$user->id],['status','=','RT']])->orWhere([['assign_it_support','=',$user->id],['status','=','RT']])->get();
                }
                $head = ['Kategori', 'Kode', 'Prioritas', 'Permintaan', 'Penialaian', 'Status', 'Waktu Keluhan'];
                $title = 'Penilaian';
                foreach ($get as $key => $value) {
                    if ($value['status'] == null){ $status = 'Menunggu IT Administrator';};
                    if ($value['status'] == 'RITADM'){ $status = "Ditolak & Menunggu Alasan Dari IT Administrator";}
                    if ($value['status'] == 'AITADM'){ $status = "Diterima IT Administrator";}
                    if ($value['status'] == 'ITSP'){ $status = "Diteruskan ke IT Support";}
                    if ($value['status'] == 'RITSP'){ $status = "Keluhan Tidak Dapat Diatasi Oleh IT Support & Menunggu Konfirmasi Dari IT Administrator";}
                    if ($value['status'] == 'AITSP'){ $status = "Menunggu Solusi Dari IT Support";}
                    if ($value['status'] == 'ITOPS'){ $status = "Menunggu Solusi Dari IT OPS";}
                    if ($value['status'] == 'CLOSE'){ $status = "Keluhan Ditutup";}
                    if ($value['status'] == 'SLITADM'){ $status = "Solusi Telah Diberikan IT Administrator";}
                    if ($value['status'] == 'SLITOPS'){ $status = "Solusi Telah Diberikan IT OPS";}
                    if ($value['status'] == 'RT'){ $status = "User Telah Memberi Rating";}
                    $isinya[$key]=[
                        0 => $value['category']['cat_name'],
                        1 => $value['issue_id'],
                        2 => $value['priority']['prio_name'],
                        3 => $value['request']['name'],
                        4 => $value['rating']['rate'].' Bintang',
                        5 => $status,
                        6 => $value['issue_date'],
                    ];   
                }
            break; 
            default:
                null;
                break;
        }
        $values = $isinya;
        $pdf = PDF::loadview('pdf.index',['head'=>$head,'title'=>$title,'value'=>$values]);
        return $pdf->stream($tabel.time().'.pdf');
    }

    public function make_pdf_laporan_harian(Request $request){
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $isinya = [];
        $myString = $request->exportid;
        $arr_export = explode(',', $myString);
        $now = Carbon::now();
        if($roles[0] == 'IT Operasional'){
            $get = \App\Models\issues::with(['category','priority','request','unit_kerja','complete'])->whereDate('complete_date', '=', $now->format('Y-m-d'))->whereIn('id',$arr_export)->get();
        }else{
            $get = \App\Models\issues::with(['category','priority','request','unit_kerja','complete'])->whereDate('complete_date', '=', $now->format('Y-m-d'))->get();
        }
        $head = ['Nama', 'Unit Kerja',  'Keluhan', 'Petugas', 'No. HP', 'Waktu Keluhan', 'Waktu Penanganan', 'Waktu Selesai', 'Waktu Tanggap', 'Solusi'];
        $title = 'Laporan Harian';
        foreach ($get as $key => $value) {;
            $finish = Carbon::parse($value->complete_date);
            $totalDuration = $finish->diffInSeconds(Carbon::parse($value->waktu_tindakan));
            $tanggap = gmdate('H:i:s', $totalDuration);
            $isinya[$key]=[
                0 => $value['request']['name'],
                1 => $value['unit_kerja']['nama_uk'],
                2 => $value['prob_desc'],
                3 => $value['complete']['name'],
                4 => $value['no_tlp'],   
                5 => $value['issue_date'],
                6 => $value['waktu_tindakan'],
                7 => $value['solution_date'],
                8 => $tanggap,
                9 => $value['solution_desc']
            ];   
        }
        $values = $isinya;
        //return view('pdf.index')->with(['head'=>$head,'title'=>$title,'value'=>$values]);
        $pdf = PDF::loadview('pdf.index',['head'=>$head,'title'=>$title,'value'=>$values])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_harian'.time().'.pdf', array("Attachment" => false));
        //$pdf->download('laporan_harian'.time().'.pdf');
    }
}
