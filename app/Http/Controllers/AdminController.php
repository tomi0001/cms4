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
      //$staty = $this->read_staty("statystyki");
      //var_dump($staty);
      return View('admin.staty_dashboard');
      
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
    
      $read = DB::select("select page,id_usera,ip,http_user_agent,date from statystyk");
      $i = 0;
      $read3 = array();
      foreach ($read as $read2) {
	$id_users = $read2->id_usera;
	$user = DB::select("select name from users where id = '$id_users'");
	foreach($user as $user2) {
	  $read2->name = $user2->name;
	}
	$read3[0][$i] = $read2->name; 
	$read3[1][$i] = $read2->page;
	$read3[2][$i] = $read2->ip;
	$read3[3][$i] = $read2->http_user_agent;
	$read3[4][$i] = $read2->date;
	//print $read2->page;
	$i++;
      }
      return $read3;
      
    }
    
    

}
