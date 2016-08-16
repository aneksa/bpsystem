<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;

class AdministrasiController extends Controller
{
    public function index($id_Survey) {
        if(session::has('email')){
            $user=DB::table('users')
                ->where('email', session::get('email'))
                ->first();
            $daftarHakAkses = DB::table($id_Survey.'-hakakses')->get();
            $survey=DB::table('survey')->get();
            $survey2=DB::table('survey')->where('id_Survey', $id_Survey)->first();
            $tahapanSurvey = DB::table('tahapansurvey')->get(); 
            $tahapanSurvey2 = DB::table('tahapansurvey') -> where('id_Survey', $id_Survey) -> get();
            return view('superadmin.administrasi',compact('user','daftarHakAkses','survey','survey2','tahapanSurvey2','id_Survey'));
        }
        else {
            return redirect('/');
        }
    }
    public function delete($id_Survey,$id_User) {
        $deleted = DB::table($id_Survey.'-hakakses')-> where('id_User', $id_User) ->delete();
        return back();
    }
}
