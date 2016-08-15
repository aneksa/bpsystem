<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use DateTime;
use Session;
use Schema;
use Excel;
use Illuminate\Support\Str;

class InputProgressController extends Controller
{
    public function index($id_Survey,$id_Tahapan) {
        if(session::has('email')){
            $user=DB::table('users')
                ->where('email', session::get('email'))
                ->first();
            $survey = DB::table('survey')->get();
            $survey2 = DB::table('survey')->where('id_Survey', $id_Survey) -> first();
            $tahapan = DB::table('tahapansurvey') ->where('id_Tahapan',$id_Tahapan) -> first();
            $tahapanSurvey2 = DB::table('tahapansurvey') -> where('id_Survey',$survey2 -> id_Survey) -> get();
            $ambiltabeltahapan = DB::table($tahapan -> data_Tahapan) -> get();
            $columns = \DB::connection()->getSchemaBuilder()->getColumnListing($tahapan -> data_Tahapan);
            return view('superadmin.inputprogress',compact('user','survey','survey2','tahapan','tahapanSurvey2','ambiltabeltahapan','columns'));
        }
        else {
            return redirect('/');
        }
    }
}
