<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(){
      return View('admin.main_dashboard');
    }

    public function staty(){
      $this->add_staty("statystyki");
      $staty = $this->read_staty("statystyki");
      //var_dump($staty);
      $i = 0;
      return View('admin.staty_dashboard')->with('staty',$staty)->with('i',$i);
      
    }
    
    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
    
    
    private function add_staty($page) {
      $ip = $_SERVER["REMOTE_ADDR"];
      $system = $_SERVER["HTTP_USER_AGENT"];
      $data = date("U");
      if (empty(Auth::user()->id) ) $id_users = 0;
      else $id_users = Auth::user()->id;
      DB::insert("insert into statystyk(page,id_usera,ip,http_user_agent,date) values('$page','$id_users','$ip','$system','$data')");
      
      
    }
    
    private function read_staty($page) {
    
      $read_staty = DB::select("select page,id_usera,ip,http_user_agent,date from statystyk");
      $i = 0;
      
      $read3_staty = array();
      foreach ($read_staty as $read2_staty) {
	//$read2->page = $read[0];
	$id_users = $read2_staty->id_usera;
	$user = DB::select("select name from users where id = '$id_users'");
	foreach($user as $user2) {
	  if ($user2->name == "") {
	    $read2_staty->name = "anonim";
	  }
	  else {
	    $read2_staty->name = $user2->name;
	  }
	   //$read2->name = $user2->name;
	}
	$read_staty3[$i][0] = $read2_staty->name;
	$read_staty3[$i][1] = $read2_staty->page;
	$read_staty3[$i][2] = $read2_staty->ip;
	$read_staty3[$i][3] = $read2_staty->http_user_agent;
	$read_staty3[$i][4] = $read2_staty->date;
	//print $read2->page;
	$i++;
      
      }
      //var_dump($read2);
      return $read_staty3;
      
    }
    
    

}
