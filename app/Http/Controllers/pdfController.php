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
    public function make_pdf($tabel, Request $request){
        $user = Auth::user();
        $roles = $user->getRoleNames();
        // $tabel = \Crypt::decrypt($tabel);
        $myString = $request->exportid;
        $arr_export = explode(',', $myString);
        $isinya = [];
        switch ($tabel) {
            case 'issues':
                if($roles[0] == "IT Administrator" || $roles[0] == "Admin" || ($roles[0] == "IT Support" && request()->status_jam == 1)){
                    $get = \App\Models\issues::with(['category','priority','request'])->whereIn('id',$arr_export)->get();
                }elseif($roles[0] == "IT Non Public"){
                    $get = \App\Models\issues::with(['category','priority','request'])->whereIn('id',$arr_export)->get();
                }else{
                    $get = \App\Models\issues::with(['category','priority','request'])->where('request_id','=',$user->id)->orWhere('assign_it_ops','=',$user->id)->orWhere('assign_it_support','=',$user->id)->whereIn('id',$arr_export)->get();
                }
                $head = ['Kode', 'Permintaan Oleh', 'Prioritas', 'Waktu Keluhan', 'Kategori', 'Lokasi', 'Status'];
                $title = 'Tiket';
                foreach ($get as $key => $value) {

                    if ($value['status'] == null){ $status="Menunggu IT Administrator"; }
                    if ($value['status'] == 'AITADM'){ $status="Diterima IT Administrator"; }
                    if ($value['status'] == 'ITADM'){ $status="Diteruskan ke IT Administrator"; }
                    if ($value['status'] == 'ITSP'){ $status="Diteruskan ke IT Support"; }
                    if ($value['status'] == 'RITADM'){ $status="Keluhan Tidak Dapat Diatasi Oleh IT Administrator"; }
                    if ($value['status'] == 'RITSP'){ $status="Keluhan Tidak Dapat Diatasi Oleh IT Support"; }
                    if ($value['status'] == 'AITSP'){ $status="Menunggu Tindakan Dari IT Support"; }
                    if ($value['status'] == 'ITOPS'){ $status="Menunggu Tindakan Dari IT OPS"; }
                    if ($value['status'] == 'CLOSE'){ $status="Keluhan Selesai"; }
                    if ($value['status'] == 'SLITADM'){ $status="Solusi Telah Diberikan IT Administrator"; }
                    if ($value['status'] == 'SLITOPS'){ $status="Solusi Telah Diberikan IT OPS"; }
                    if ($value['status'] == 'SLITSP'){ $status="Solusi Telah Diberikan IT Support"; }
                    if ($value['status'] == 'LITADM'){ $status="IT Administrator Menuju ke Lokasi"; }
                    if ($value['status'] == 'LITOPS'){ $status="IT OPS Menuju ke Lokasi"; }
                    if ($value['status'] == 'LITSP'){ $status="IT Support Menuju ke Lokasi"; }
                    if ($value['status'] == 'DLITADM'){ $status="Sedang Dalam Tindakan IT Administrator"; }
                    if ($value['status'] == 'DLITOPS'){ $status="Sedang Dalam Tindakan IT OPS"; }
                    if ($value['status'] == 'DLITSP'){ $status="Sedang Dalam Tindakan IT Support"; }
                    if ($value['status'] == 'RT'){ $status="User Telah Memberi Rating"; }
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
                $get = \App\Models\inventory::with('cat_inventory')->whereIn('id',$arr_export)->get();
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
                $get = \App\Models\inventory::with(['issues'])->withCount(['issuesjml','issuesjmlsla'])->whereIn('id',$arr_export)->get();
                $head = ['Nama User','Nama Perangkat','Serial Number','Merk','Nama Perangkat Full','Jumlah Keluhan', 'SLA'];
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
                        0 => $value['nama_user'],
                        1 => $value['nama_perangkat'],
                        2 => $value['sernum'],
                        3 => $value['merk'],
                        4 => $value['nama_perangkat_full'],
                        5 => $value['issuesjml_count'],
                        6 => $hasil
                    ];   
                }
            break;
            case 'laporan_inventaris': 
                $get = \App\Models\inventory::with('cat_inventory')->whereIn('id',$arr_export)->get();
                $head = ['Kategori Inventaris', 'Lokasi', 'Merk', 'Status'];
                $title = 'Laporan Inventaris';
                foreach ($get as $key => $value) {
                    if ($value['is_active'] == 0){ $status = 'Non Aktif';};
                    if ($value['is_active'] == 1){ $status = "Aktif";}
                    $isinya[$key]=[
                        0 => $value['cat_inventory']['nama_cat'],
                        1 => $value['lokasi'],
                        2 => $value['merk'],
                        // 3 => $value['tgl_pembelian'],
                        // 4 => $value['tgl_penyerahan'],
                        3 => $status,
                    ];   
                }
            break;
            case 'penilaian':        
                if($roles[0] == "IT Administrator" || $roles[0] == "Admin"){
                    $get = \App\Models\issues::with(['category','priority','request','rating'])->where('status','=','RT')->orWhere('status','=','CLOSE')->whereIn('id',$arr_export)->get();
                }else{
                    $get = \App\Models\issues::with(['category','priority','request','rating'])->where([['request_id','=',$user->id],['status','=','RT']])->orWhere([['request_id','=',$user->id],['status','=','CLOSE']])->orWhere([['assign_it_ops','=',$user->id],['status','=','RT']])->orWhere([['assign_it_ops','=',$user->id],['status','=','CLOSE']])->orWhere([['assign_it_support','=',$user->id],['status','=','RT']])->orWhere([['assign_it_support','=',$user->id],['status','=','CLOSE']])->orWhere([['assign_it_admin','=',$user->id],['status','=','RT']])->orWhere([['assign_it_admin','=',$user->id],['status','=','CLOSE']])->whereIn('id',$arr_export)->get();
                }
                $head = ['Kategori', 'Kode', 'Prioritas', 'Permintaan', 'Penialaian', 'Status', 'Waktu Keluhan'];
                $title = 'Penilaian';
                foreach ($get as $key => $value) {
                    if ($value['status'] == null){ $status="Menunggu IT Administrator"; }
                    if ($value['status'] == 'AITADM'){ $status="Diterima IT Administrator"; }
                    if ($value['status'] == 'ITADM'){ $status="Diteruskan ke IT Administrator"; }
                    if ($value['status'] == 'ITSP'){ $status="Diteruskan ke IT Support"; }
                    if ($value['status'] == 'RITADM'){ $status="Keluhan Tidak Dapat Diatasi Oleh IT Administrator"; }
                    if ($value['status'] == 'RITSP'){ $status="Keluhan Tidak Dapat Diatasi Oleh IT Support"; }
                    if ($value['status'] == 'AITSP'){ $status="Menunggu Tindakan Dari IT Support"; }
                    if ($value['status'] == 'ITOPS'){ $status="Menunggu Tindakan Dari IT OPS"; }
                    if ($value['status'] == 'CLOSE'){ $status="Keluhan Selesai"; }
                    if ($value['status'] == 'SLITADM'){ $status="Solusi Telah Diberikan IT Administrator"; }
                    if ($value['status'] == 'SLITOPS'){ $status="Solusi Telah Diberikan IT OPS"; }
                    if ($value['status'] == 'SLITSP'){ $status="Solusi Telah Diberikan IT Support"; }
                    if ($value['status'] == 'LITADM'){ $status="IT Administrator Menuju ke Lokasi"; }
                    if ($value['status'] == 'LITOPS'){ $status="IT OPS Menuju ke Lokasi"; }
                    if ($value['status'] == 'LITSP'){ $status="IT Support Menuju ke Lokasi"; }
                    if ($value['status'] == 'DLITADM'){ $status="Sedang Dalam Tindakan IT Administrator"; }
                    if ($value['status'] == 'DLITOPS'){ $status="Sedang Dalam Tindakan IT OPS"; }
                    if ($value['status'] == 'DLITSP'){ $status="Sedang Dalam Tindakan IT Support"; }
                    if ($value['status'] == 'RT'){ $status="User Telah Memberi Rating"; }
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
        // if($roles[0] == 'IT Operasional'){
        //     $get = \App\Models\issues::with(['category','priority','request','unit_kerja','complete'])
        //     ->where([['assign_it_ops','=',Auth::user()->id],['complete_by','=',Auth::user()->id],['status','=','CLOSE']])
        //     ->whereDate('complete_date','=',$now->format('Y-m-d'))
        //     ->whereIn('id',$arr_export)
        //     ->orderBy('issue_date', 'DESC')
        //     ->get()
        //     ->sortByDesc(function($product){
        //         return $product->laporan;
        //     });
        // }else{
            if($roles[0] == "IT Non Public" || $roles[0] == "IT Operasional"){
                $get = \App\Models\issues::with(['category','priority','request','unit_kerja','complete'])
                ->whereColumn('assign_it_ops', 'complete_by')
                ->where([['status','=','CLOSE']])
                ->whereDate('complete_date','=',$now->format('Y-m-d'))
                ->whereIn('id',$arr_export)
                ->orWhereColumn('assign_it_support', 'complete_by')
                ->where([['status','=','CLOSE']])
                ->whereDate('complete_date','=',$now->format('Y-m-d'))
                ->orWhereColumn('assign_it_admin', 'complete_by')
                ->where([['status','=','CLOSE']])
                ->whereDate('complete_date','=',$now->format('Y-m-d'))
                ->whereIn('id',$arr_export)
                ->orderBy('issue_date', 'DESC')
                ->get()
                ->sortByDesc(function($product){
                    return $product->laporan;
                });
            }else{
                $get = \App\Models\issues::with(['category','priority','request','unit_kerja','complete'])
                ->where([['assign_it_ops','=',Auth::user()->id],['complete_by','=',Auth::user()->id],['status','=','CLOSE']])
                ->whereDate('complete_date','=',$now->format('Y-m-d'))
                ->whereIn('id',$arr_export)
                ->orWhere([['assign_it_support','=',Auth::user()->id],['complete_by','=',Auth::user()->id],['status','=','CLOSE']])
                ->whereDate('complete_date','=',$now->format('Y-m-d'))
                ->whereIn('id',$arr_export)
                ->orWhere([['assign_it_admin','=',Auth::user()->id],['complete_by','=',Auth::user()->id],['status','=','CLOSE']])
                ->whereDate('complete_date','=',$now->format('Y-m-d'))
                ->whereIn('id',$arr_export)
                ->orderBy('issue_date', 'DESC')
                ->get()
                ->sortByDesc(function($product){
                    return $product->laporan;
                });
            // }

            
        }

        $head = ['Nama', 'Unit Kerja',  'Keluhan', 'Petugas', 'No. HP', 'Waktu Keluhan', 'Waktu Penanganan', 'Waktu Selesai', 'Waktu Tanggap', 'Solusi'];
        $title = 'Laporan Harian';
        $group = [];
        foreach ($get as $key => $value) {;
            $finish = Carbon::parse($value->solution_date);
            $totalDuration = $finish->diffInSeconds(Carbon::parse($value->waktu_tindakan));
            $tanggap = gmdate('H:i:s', $totalDuration);
            $date="";
            if($value->issue_date){
                $date = Carbon::createFromFormat('Y-m-d H:i:s', $value->issue_date)->format('H:i:s');
            }

            if($date >='07:00:00' && $date <= '19:00:00'){
                $id_group = 1;
                $name_group = "Laporan Pagi";
            }else{
                $id_group = 2;
                $name_group = "Laporan Malam";
            }
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
            $group[$key]= [
                0 => $id_group,
                1 => $name_group
            ];   
        }
        // $values = $isinya;
        // //return view('pdf.index')->with(['head'=>$head,'title'=>$title,'value'=>$values]);
        // $pdf = PDF::loadview('pdf.index',['head'=>$head,'title'=>$title,'value'=>$values])->setPaper('a4', 'landscape');
        // return $pdf->stream('laporan_harian'.time().'.pdf', array("Attachment" => false));
        // //$pdf->download('laporan_harian'.time().'.pdf');

        $values = $isinya; 
        // return view('pdf.index_harian')->with(['head'=>$head,'title'=>$title,'value'=>$values,'group'=>$group]);
        $pdf = PDF::loadview('pdf.index_harian',['head'=>$head,'title'=>$title,'value'=>$values,'group'=>$group])->setPaper('a4', 'landscape');
        // return $pdf->download($tabel.time().'.pdf');
        return $pdf->stream('laporan_harian'.'.pdf', array("Attachment" => false));
    }
}
