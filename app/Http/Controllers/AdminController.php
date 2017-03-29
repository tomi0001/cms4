<?php

namespace App\Http\Controllers;
//namespace App\GeoIP\Services;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use GeoIP;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

public $question = "";
    public function index(){
      return View('admin.main_dashboard');
    }

    public function staty($start,$end){

      $this->add_staty("statystyki");
      if (empty($start) ) {
	$start = 0;
	$end = 15;
      }
      $staty = $this->read_staty($start,$end,true,"","","","");

      $draw = $this->draw_page("statystyk");

      return View('admin.staty_dashboard')->with('staty',$staty)->with('draw',$draw);
      
    }
    
   public function staty2(){
      $this->add_staty("statystyki");
      if (empty($start) ) {
	$start = 0;
	$end = 15;
      }
      $staty = $this->read_staty($start,$end,true,"","","","");
      $draw = $this->draw_page("statystyk");
      return View('admin.staty_dashboard')->with('staty',$staty)->with('draw',$draw);
    
    }
    
    
   public function staty3($id){
      $this->add_staty("statystyki w id $id");
      $staty = $this->read_staty_single($id);

      return View('admin.staty2_dashboard')->with('staty',$staty);
      
    }
    public function staty4($start,$end,$search,$search2,$od='',$do ='') {
    
      $this->add_staty("statystyki");
      if (empty($start) ) {
	$start = 0;
	$end = 15;
      }
      print Input::get("od");
      if (!empty(Input::get('search') ) ) {

	$search = Input::get('search');
	$search2 = Input::get('search2');
      }
      if (empty($od) ) {
	$od = Input::get("od");
	$do = Input::get("do");
      }

      $staty = $this->read_staty($start,$end,false,$search,$search2,$od,$do);

      $draw = $this->draw_page2($this->question);

      return View('admin.staty3_dashboard')->with('staty',$staty)->with('draw',$draw)->with('search',$search)->with('search2',$search2)->with('od',$od)->with('do',$do);
    }
    public function staty5() {
    
            $this->add_staty("statystyki");
      if (empty($start) ) {
	$start = 0;
	$end = 15;
      }
      print Input::get("od");

	$search = Input::get('search');
	$search2 = Input::get('search2');
	
	$od = Input::get("od");
	$do = Input::get("do");

      $staty = $this->read_staty($start,$end,false,$search,$search2,$od,$do);

      $draw = $this->draw_page2($this->question);

      return View('admin.staty3_dashboard')->with('staty',$staty)->with('draw',$draw)->with('search',$search)->with('search2',$search2)->with('od',$od)->with('do',$do);
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
      $country = geoip()->getLocation($ip);
      $country2 = $country->country;
      if (empty(Auth::user()->id) ) $id_users = 0;
      else $id_users = Auth::user()->id;
      $check = DB::select("select page,id_usera,ip,http_user_agent,date from statystyk where page = '$page' and id_usera = '$id_users' and ip = '$ip' and http_user_agent = '$system' order by id desc limit 1");
      
      foreach ($check as $check2) {
	if (!empty($check2->date) ) {
	  $result = $data - $check2->date;
	  if ($result > 1000) {
	     DB::insert("insert into statystyk(page,id_usera,ip,http_user_agent,date,country) values('$page','$id_users','$ip','$system','$data','$country2')");
	  }
	  
	}
	else {
	  DB::insert("insert into statystyk(page,id_usera,ip,http_user_agent,date,country) values('$page','$id_users','$ip','$system','$data','$country2')");
	}
	
      }
      if (empty($check) ) {
	DB::insert("insert into statystyk(page,id_usera,ip,http_user_agent,date,country) values('$page','$id_users','$ip','$system','$data','$country2')");
      }
     
      
      
    }
    
    
    private function read_staty_single($id) {
      $read_staty = DB::select("select page,id_usera,ip,http_user_agent,date,id,country from statystyk where id = '$id' ");
      foreach ($read_staty as $read_staty2) {
	$read_staty2->date = $this->calculate_date($read_staty2->date);
	$read_staty2->id_usera = $this->show_user($read_staty2->id_usera);
      }
      
      
      return $read_staty2;
      
      
      
    }
    
    private function read_staty($start,$end,$bool,$search,$search2,$od,$do) {
      $field = "";
      $id_users3 = 0;
      if ($bool == true) {
	$read_staty = "select page,id_usera,ip,http_user_agent,date,id from statystyk order by id desc limit $start,$end ";
      }
      else {
	if ($search == "") {
	  $read_staty = "select page,id_usera,ip,http_user_agent,date,id from statystyk ";
	  $this->question = "select page,id_usera,ip,http_user_agent,date,id from statystyk ";	  
	  
	}
	else if ($search2 == "login") {
	  $id_users = DB::select("select id from users where name = '$search' ");
	  foreach ($id_users as $id_users2) {
	    $id_users3 = $id_users2->id;
	  }

	  $read_staty = "select page,id_usera,ip,http_user_agent,date,id from statystyk where id_usera =  '$id_users3' ";
	  $this->question = "select page,id_usera,ip,http_user_agent,date,id from statystyk where id_usera =  '$id_users3'";

	}
	else if ($search2 == "page") {

	  $read_staty = "select page,id_usera,ip,http_user_agent,date,id from statystyk where page like '%$search%' ";
	  $this->question = "select page,id_usera,ip,http_user_agent,date,id from statystyk where page like '%$search%' ";
	}
	
	else if ($search2 == "ip") {

	  $read_staty = "select page,id_usera,ip,http_user_agent,date,id from statystyk where ip like '%$search%'  ";
	  $this->question = "select page,id_usera,ip,http_user_agent,date,id from statystyk where ip like '%$search%'";
	}
	else if ($search2 == "http") {

	  $read_staty = "select page,id_usera,ip,http_user_agent,date,id from statystyk where http_user_agent like '%$search%'  ";

	  $this->question = "select page,id_usera,ip,http_user_agent,date,id from statystyk where http_user_agent like '%$search%'";
	}


	
	if ($od != "" or $do != "") {
	  $array_date = $this->check_date($od,$do);
	  if ($search == "") {
	      $read_staty .= " where date >= '$array_date[0]' and date <= '$array_date[1]' ";
	      $this->question .= " where date >= '$array_date[0]' and date <= '$array_date[1]'";
	  }
	  else {
	      $read_staty .= " and date >= '$array_date[0]' and date <= '$array_date[1]' ";
	      $this->question .= "and date >= '$array_date[0]' and date <= '$array_date[1]'";
	  }
	  
	}
	
	$read_staty .= " order by id desc limit $start,$end ";
	
      }
      
      
      $read_staty2 = DB::select($read_staty);
      $i = 0;
       
      $read3_staty = array();
     
      foreach ($read_staty2 as $read2_staty) {
	$id_users = $read2_staty->id_usera;
	$user = DB::select("select name from users where id = '$id_users'");
	
	foreach($user as $user2) {
	  if ($user2->name == "") {
	    $read2_staty->name = "anonim";
	  }
	  else {
	    $read2_staty->name = $user2->name;
	  }
	}
	
	$read3_staty[$i][0] = $read2_staty->name;
	$read3_staty[$i][1] = $read2_staty->page;
	$read3_staty[$i][2] = $read2_staty->ip;
	$read3_staty[$i][3] = $this->calculate_date($read2_staty->date);
	$read3_staty[$i][4] = $read2_staty->id;
	$i++;
      
      }
      if (empty($read3_staty) ) return false;
      else return $read3_staty;
      
    }
    private function check_date($od,$do) {
      $od22 = explode(" ",$od);
      $od222 = explode("-",$od22[0]);
      //print var_dump($od22[1]);
      if ( !strstr($od,":") ) {
	$od2 = date("U",mktime("00","00","00",$od222[1],$od222[2],$od222[0]));
      }
      else {
	$od2222 = explode(":",$od22[1]);
	$od2 = date("U",mktime($od2222[0],$od2222[1],$od2222[2],$od222[1],$od222[2],$od222[0]));
      }
      $bool = checkdate($od222[1],$od222[2],$od222[0]);
      if (!$bool) return -1;
      $do22 = explode(" ",$do);
      $do222 = explode("-",$do22[0]);
      if ( !strstr($do,":") ) {
	$do2 = date("U",mktime("00","00","00",$do222[1],$do222[2],$do222[0]));
      }
      else {
	$do2222 = explode(":",$do22[1]);
	$do2 = date("U",mktime($do2222[0],$do2222[1],$do2222[2],$do222[1],$do222[2],$do222[0]));
      }
      $bool = checkdate($do222[1],$do222[2],$do222[0]);
      if (!$bool) return -1;
      else return array($od2,$do2);
      
    }
    private function calculate_date($date) {
      $date_now = date("U");
      $result = $date_now - $date;
      //Jeżeli różnica czasu będzie tyle sekund ile jest w instrukcjach warunkowych to czas będzie się różnił sekundami
      if ($result < 60) return "Mniej niż minutę temu";
      if ($result < 1800) return "Mniej niż pół godziny temu";
      if ($result < 3600) return "Mniej niż godzinę temu";
      if ($result < 7200) return "Mniej niż 2 godziny temu";
      else {
	//w przeciwnym razie jęzeli różnica czasu jest wieksza niż 2 godziny i jest to dzisiaj
	$result2 = date("Y-m-d H:i:s",$date);
	//rozbijanie na poszczególne wartosc np dni godziny.
	$result3 = explode(" ",$result2);
	$result4 = explode("-",$result3[0]);
	$result5 = explode(":",$result3[1]);
	if ($result4[2] == date("d") and $result4[1] == date("m") and $result4[0] == date("Y") ) {
	  return "Dzisiaj o godzinie " . $result5[0] . " i minucie " . $result5[1];
	}
	else return $result4[0] . "-" . $result4[1] . "-" . $result4[2] . " " . $result5[0] . ":" . $result5[1] . ":" . $result5[2];
	
      }
      
      
      
    }
    
    
    private function draw_page($table) {
      //$result = DB::select("select count(*) from $table");
      $result=DB::table($table)->count();
      //foreach ($result as $result2) {
      //$a  = (string) $result;
      //$a = implode($result);
      
      $result2 = $result / 20;
      if (strstr($result2,".") ) {
	$result3 = ( (int) $result2) + 1;
      }
      else {
	$result3 = $result2;
      }
      $table2 = array();
      for ($i = 0;$i < $result3;$i++) {
	
	$table2[$i][0] = $i+1;
	$table2[$i][1] = ($i+1) * 15 - 15;
	$table2[$i][2] = 15;
      }
      
      //print dd($table2);
	//print dd($result);
      //}
      return $table2;
    }
    
    
        private function draw_page2($qestion) {
      //$result = DB::select("select count(*) from $table");
      $result=DB::select($qestion);
      $i = 0;
      foreach ($result as $result2) {
	$i++;
      
      }
      $result = $i;
      //$result = mysql_num_rows($result);
      //foreach ($result as $result2) {
      //$a  = (string) $result;
      //$a = implode($result);
      
      $result2 = $result / 20;
      if (strstr($result2,".") ) {
	$result3 = ( (int) $result2) + 1;
      }
      else {
	$result3 = $result2;
      }
      $table2 = array();
      for ($i = 0;$i < $result3;$i++) {
	
	$table2[$i][0] = $i+1;
	$table2[$i][1] = ($i+1) * 15 - 15;
	$table2[$i][2] = 15;
      }
      
      //print dd($table2);
	//print dd($result);
      //}
      return $table2;
    }
    
    private function show_user($id) {
      if ($id == 0) return "anonim";
      $users = DB::select("select name from users where id = '$id'");
      foreach ($users as $users2) {
	//$user = $users2
      }
      return $users2->name;
    
    
    }
    

}
