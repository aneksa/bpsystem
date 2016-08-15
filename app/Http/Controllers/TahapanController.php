<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Request;
use DB;
use DateTime;

class TahapanController extends Controller
{
    public function home() {
        return view('superadmin.coba');
    }
    public function create() {
        
    $nama_tahapan = Request::get('nama_tahapan');
    $mulai_tahapan = Request::get('mulai_tahapan');
    $selesai_tahapan = Request::get('selesai_tahapan');
    $now = new DateTime();
        
    DB::table('tahapanSurvey')->insert([
            'id_Survey'=> '1',
            'nama_Tahapan'=>$nama_tahapan,
            'tgl_mulai'=>$mulai_tahapan,
            'tgl_selesai'=>$selesai_tahapan,
            'data_Tahapan'=> 'haha',
            'created_at'=>$now,
            'updated_at'=>$now
    ]); 
    }
}
