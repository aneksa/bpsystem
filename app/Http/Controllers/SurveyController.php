<?php

namespace App\Http\Controllers;

use Request;
use DB;
use DateTime;
use Session;
use Schema;
use Excel;
use Illuminate\Database\Schema\Blueprint;

use App\Http\Requests;

class SurveyController extends Controller
{
    //INDEX
    public function index()
    {  
        $user = DB::table('users')->where('email', session::get('email'))->first();
        $pegawai = DB::table('users')->where('level_User', '!=', 1)->get();
        $survey=DB::table('survey')->get();
        $now2=date('Y');
        if(Session::has('email')){
            return view('superadmin.createsurvey', compact('user', 'pegawai','survey','now2'));
        }else{
            return redirect('login');
        } 
    }

    //CREATE
    public function create(){
        $now = new DateTime();
        $now2=date('Y');
        $now3=date('d/m/Y');
        $identitas_Survey = Request::get('surveyidentity');
        $survey_mulai=Request::get('tgl_mulai');
        $survey_selesai=Request::get('tgl_selesai');

        
        DB::beginTransaction();

        try{
            //Monitoring/survey
            if($survey_mulai>=$survey_selesai or $survey_mulai<$now3 or $survey_selesai<=$now3){
                return redirect('survey/create');
            } else {
                DB::table('survey')->insert([
                        'id_Survey'=>$identitas_Survey,
                        'nama_Survey'=>Request::get('surveyname'),
                        'tgl_mulai'=>$survey_mulai,
                        'tgl_selesai'=>$survey_selesai,
                        'status'=>0,
                        'table_HakAkses'=>$identitas_Survey.'-HakAkses',
                        'tahun'=>$now2,
                        'created_at'=>$now,
                        'updated_at'=>$now,
                ]);
            }

            //Tahapan Survey
            $tahapan_mulai=Request::get('tahapan_mulai');
            $tahapan_selesai=Request::get('tahapan_selesai');
            $nama_tahapan = Request::get('nama_tahapan');
            $size=count($nama_tahapan);
            $survey = DB::table('survey')->where('id_Survey', $identitas_Survey)->first();
            $nama_wilayah=Request::get('nama_wilayah');
            $length_wilayah=Request::get('length_wilayah');
            $data_tahapan=Request::get('data_tahapan');
            $type_tahapan=Request::get('type_tahapan');
    
            for($i=0;$i<$size;$i++){
                if($tahapan_mulai[$i]>=$tahapan_selesai[$i] or $tahapan_mulai[$i]<$survey_mulai or $tahapan_mulai[$i]>$survey_selesai or $tahapan_selesai[$i]<$survey_mulai or $tahapan_selesai[$i]>$survey_selesai){

                    DB::rollback();
                    return redirect($tahapan_selesai[$i]);

                } else {    
                    DB::table('tahapanSurvey')->insert([
                        'id_Survey'=> $survey->id_Survey,
                        'nama_Tahapan'=>$nama_tahapan[$i],
                        'tgl_mulai'=>$tahapan_mulai[$i],
                        'tgl_selesai'=>$tahapan_selesai[$i],
                        'data_Tahapan'=>$identitas_Survey.'-'.$nama_tahapan[$i],
                        'created_at'=>$now,
                        'updated_at'=>$now
                    ]);
                        
                    Schema::create($identitas_Survey.'-'.$nama_tahapan[$i], function(Blueprint $table)use($nama_wilayah,$length_wilayah,$data_tahapan,$type_tahapan,$i){
                        $table->increments('id');        
                        foreach(array_combine($nama_wilayah, $length_wilayah) as $wil=>$length){
                            $table->string($wil,$length);
                        }
                        $size_tambah_tahapan=count($data_tahapan[$i+1]);
                        for($j=0;$j<$size_tambah_tahapan;$j++){
                            if($type_tahapan[$i+1][$j]=='1'){
                                $table->string($data_tahapan[$i+1][$j]);
                            }else if($type_tahapan[$i+1][$j]=='2'){
                                $table->integer($data_tahapan[$i+1][$j]);
                            }else if($type[$i+1][$j]=='3'){
                                $table->float($data_tahapan[$i+1][$j]);
                            }
                        }
                        $table->dateTime('tgl_create');
                        $table->dateTime('tgl_update');
                        $table->dateTime('user_create');
                        $table->dateTime('user_update');
                    });
                    
                    Schema::create($identitas_Survey.'-'.$nama_tahapan[$i].'-hist', function(Blueprint $table)use($nama_wilayah,$length_wilayah,$data_tahapan,$type_tahapan,$i){
                        $table->increments('id');        
                        foreach(array_combine($nama_wilayah, $length_wilayah) as $wil=>$length){
                            $table->string($wil,$length);
                        }
                        $size_tambah_tahapan=count($data_tahapan[$i+1]);
                        for($j=0;$j<$size_tambah_tahapan;$j++){
                            if($type_tahapan[$i+1][$j]=='1'){
                                $table->string($data_tahapan[$i+1][$j]);
                            }else if($type_tahapan[$i+1][$j]=='2'){
                                $table->integer($data_tahapan[$i+1][$j]);
                            }else if($type[$i+1][$j]=='3'){
                                $table->float($data_tahapan[$i+1][$j]);
                            }
                        }
                        $table->dateTime('tgl_create');
                        $table->dateTime('tgl_update');
                        $table->dateTime('user_create');
                        $table->dateTime('user_update');
                    });

                    Schema::create($identitas_Survey.'-'.$nama_tahapan[$i].'-histgl', function(Blueprint $table)use($nama_wilayah,$length_wilayah,$data_tahapan,$type_tahapan,$i){
                        $table->increments('id');        
                        foreach(array_combine($nama_wilayah, $length_wilayah) as $wil=>$length){
                            $table->string($wil,$length);
                        }
                        $size_tambah_tahapan=count($data_tahapan[$i+1]);
                        for($j=0;$j<$size_tambah_tahapan;$j++){
                            if($type_tahapan[$i+1][$j]=='1'){
                                $table->string($data_tahapan[$i+1][$j]);
                            }else if($type_tahapan[$i+1][$j]=='2'){
                                $table->integer($data_tahapan[$i+1][$j]);
                            }else if($type[$i+1][$j]=='3'){
                                $table->float($data_tahapan[$i+1][$j]);
                            }
                        }
                        $table->date('tgl_create');
                        $table->date('tgl_update');
                        $table->date('user_create');
                        $table->date('user_update');
                    });
                }

                //Cakupan Wilayah
                $count=Request::get('count');
                $index=count($count);
                for($j=1;$j<=$index;$j++){
                    $dat = Request::file('wilayah'.$j);
                    DB::table('wilayah')->insert([
                        'id_Survey'=>$survey->id_Survey,
                        'nama_Wilayah'=>$nama_wilayah[$j-1],
                        'data_Wilayah'=>$identitas_Survey.'-'.$nama_wilayah[$j-1],
                        'created_at'=>$now,
                        'updated_at'=>$now
                    ]);

                    $exdata = Excel::selectSheetsByIndex(0)->load($dat, function($reader) {})->get();

                    Schema::create($identitas_Survey.'-'.$nama_wilayah[$j-1], function(Blueprint $table)use($j,$nama_wilayah,$length_wilayah){
                        for($k=$j-1;$k>=0;$k--){
                            if($k==$j-1){
                                $table->string('id_'.$nama_wilayah[$k],$length_wilayah[$k])->primary();
                            } else {
                                $table->string('id_'.$nama_wilayah[$k],$length_wilayah[$k]);
                            }
                        }
                        $table->string('nama_'.$nama_wilayah[$j-1]);
                        
                    });
                    foreach ($exdata->toArray() as $row) {
                        DB::table($identitas_Survey.'-'.$nama_wilayah[$j-1])->insert([$row]);
                    }
                }

                //Hak Akses
                $admin = Request::get('admin');

                Schema::create($identitas_Survey.'-HakAkses', function(Blueprint $table){
                    $table->increments('id_HakAkses');
                    $table->integer('id_User');
                    $table->integer('HakAkses');
                    $table->dateTime('tgl_create');
                    $table->dateTime('tgl_update');
                    $table->dateTime('user_create');
                    $table->dateTime('user_update');
                });

                Schema::create($identitas_Survey.'-HakAkses-wilayah', function(Blueprint $table)use($nama_wilayah,$length_wilayah){
                    $table->increments('id_HakAkses');
                    foreach(array_combine($nama_wilayah, $length_wilayah) as $wil=>$length){
                        $table->string($wil,$length);
                    }
                    $table->integer('id_User');
                    $table->integer('HakAkses');
                    $table->dateTime('tgl_create');
                    $table->dateTime('tgl_update');
                    $table->dateTime('user_create');
                    $table->dateTime('user_update');
                });

                foreach ($admin as $row) {
                    DB::table($identitas_Survey.'-HakAkses')->insert([
                        'id_User'=>$row,
                        'HakAkses'=>1,
                        'tgl_create'=>$now,
                        'tgl_update'=>$now,
                        'user_create'=>Session::get('email'),
                        'user_update'=>Session::get('email')
                    ]);
                }
            }
            DB::commit();
            return redirect('survey/'.$survey->id_Survey);
        }   catch (\Exception $e) {
            DB::rollback();
            return redirect('createsurvey');
        }

    }  

    public function survey($id_Survey){
        $user=DB::table('users')->where('email', Session::get('email'))->first();
        $survey=DB::table('survey')->get();
        $now2 = date('Y');
        $survey2=DB::table('survey')->where('id_Survey', $id_Survey)->first();
        $tahapanSurvey = DB::table('tahapanSurvey')->get(); 
        $tahapanSurvey2 = DB::table('tahapansurvey') -> where('id_Survey',$survey2 -> id_Survey) -> get();
        return view('superadmin.survey', compact('user','survey','tahapanSurvey','tahapanSurvey2','survey2')); 
    }
    
    public function progress($id_Survey, $id_Tahapan) {
      $user=DB::table('users')->where('email', Session::get('email'))->first();
      $survey=DB::table('survey')->get();
      $survey2=DB::table('survey')->where('id_Survey', $id_Survey)->first();
      $tahapanSurvey = DB::table('tahapansurvey')->get();
      $tahapanSurvey2 = DB::table('tahapansurvey') -> where('id_Survey',$survey2 -> id_Survey) -> get();
      $tahapanSurvey3 = DB::table('tahapansurvey') -> where('id_Survey',$survey2 -> id_Survey) -> first();
      return view('superadmin.progress', compact('user','survey','tahapanSurvey','tahapanSurvey2','tahapanSurvey3','survey2'));
    }
}
