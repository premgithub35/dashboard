<?php
namespace App\Http\Helpers;

use View;
use Session;
use Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Meta;
use App\Models\Notification;
use App\Models\Permissions;
use App\Models\Admin;
use App\Models\PermissionRole;
use App\Models\Properties;
use App\Models\Appconfig;
use App\Models\PropertyDates;
use App\Models\PropertyFees;
use App\Models\penalty;
use App\Models\Apilog;
use DB;
//use App\Models\Currency;
class Common{

	function __construct(){
		setlocale(LC_ALL, 'en_US.UTF8');
	}


  function sendsms($data,$mobile,$orderid)
  {

	$sms_api = Cache::get('sms_api_config', function () {

		$sms_api=Appconfig::where('name','sms_api')->first(['smsapi']);

        Cache::forever('sms_api_config',$sms_api);

        return $sms_api;
        });
	

	if($sms_api->smsapi==1)
	{
      $smskey=config('rrconfig.sms.sms_key');
      $senderid=config('rrconfig.sms.sender_id');
      $route=config('rrconfig.sms.route');
	  $smsurl=config('rrconfig.sms.sms_url');
	  $smsData = array('authkey' =>$smskey ,'mobiles' => $mobile,'message' => urlencode($data),'sender' => $senderid,'route' =>$route);
	}
	elseif($sms_api->smsapi==2)
	{
		$smskey=config('rrconfig.sms.myoperator_key');
		$senderid=config('rrconfig.sms.myoperator_sender_id');
		$route=config('rrconfig.sms.myoperator_route');
		$smsurl=config('rrconfig.sms.myoperator_url');
		$smsData = array('authkey' =>$smskey ,'mobiles' => $mobile,'message' => urlencode($data),'sender' => $senderid,'route' =>$route);
	}
	elseif($sms_api->smsapi==3){
		$smskey=config('rrconfig.sms.azmobia_key');
		$senderid=config('rrconfig.sms.azmobia_sender_id');
		$route=config('rrconfig.sms.azmobia_route');
		$smsurl=config('rrconfig.sms.azmobia_url');
		$smsData = array('authentic-key' =>$smskey ,'number' => $mobile,'message' =>$data,'senderid' => $senderid,'route' =>$route);
	}
	

	

	$ch = curl_init();
	curl_setopt_array($ch, array(CURLOPT_URL => $smsurl,CURLOPT_RETURNTRANSFER => true,CURLOPT_POST => true, CURLOPT_POSTFIELDS => $smsData ));
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   $response = curl_exec($ch);

   $err = curl_error($ch);

   curl_close($ch);
   if($sms_api->smsapi==1)
   {
	   $item = DB::table('orders')->where('id',$orderid)->first(['smsid','status']);
	   $log=json_decode($item->smsid,true);
	   $log[] = array('requestId'=>$response,'status'=>$item->status);
	   DB::table('orders')->where('id',$orderid)->update(['smsid'=>json_encode($log)]);

   }
   if($sms_api->smsapi==2)
   {
	   $response=json_decode($response);
	   if(isset($response->message))
	   {
		   $requestid=$response->message;
	   }
	   else{
		   $requestid=$response;	
	   }
	   $item = DB::table('orders')->where('id',$orderid)->first(['smsid','status']);
	   $log=json_decode($item->smsid,true);
	   $log[] = array('requestId'=>$requestid,'status'=>$item->status);
	   DB::table('orders')->where('id',$orderid)->update(['smsid'=>json_encode($log)]);
	   

   }
   return true;



//     $smsData = array('authkey' =>$smskey ,'mobiles' => $mobile,'message' => urlencode($data),'sender' => $senderid,'route' =>$route);

//        $ch = curl_init();
//        curl_setopt_array($ch, array(CURLOPT_URL => $smsurl,CURLOPT_RETURNTRANSFER => true,CURLOPT_POST => true, CURLOPT_POSTFIELDS => $smsData ));
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//         $output=curl_exec($ch);
// 		$response= curl_close($ch);
      

// $response=json_decode($response,true);

// if($response['type']=='error')
// {
	   

      
//}
// print_r($response);
// exit;





//return $output;


  }
	function irctcCurl($url,$data)
      {
      	//Stagging
      	//$surl=config('rrconfig.irctc.surl');
      	//$skey=config('rrconfig.irctc.skey');

        //Production
         $purl=config('rrconfig.irctc.purl');
      	 $pkey=config('rrconfig.irctc.pkey');

          $url=$purl.''.$url;
         
	    $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); //timeout in seconds
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: '.$pkey,
           'Content-Type: application/json',
           'Content-Length: '.strlen($data)
          )
       );
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);//Setting post data as xml
         $response = curl_exec($curl);
       
       curl_close($curl);
       return $response;
	  }



	  public function curlapi($url,$api)
	  {
	  	$curl=config('rrconfig.cnfrmtkt.url');
	  	$ckey=config('rrconfig.cnfrmtkt.key');
	  	
	  	$purl=config('rrconfig.irctc.purl');
	  	$pkey=config('rrconfig.irctc.pkey');

	  	$surl=config('rrconfig.irctc.surl');
	  	$skey=config('rrconfig.irctc.skey');
        if($api=='IRCTC')
        {
        	$url=$purl.''.$url;
        }
        elseif($api=='confirmtkt')
        {
        	$url=$curl.''.$url.'key='.$ckey;
        }
        else
        {
        	$url=$url;
        }
	  	
// echo($url);
// exit;
	  	$curl = curl_init();

	  	 curl_setopt($curl, CURLOPT_URL, $url);
	  	 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
	  	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	  	 if($api=='IRCTC')
	  	 {
	  	 curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	  	 'Authorization: '.$pkey,
	  	 'Content-Type: text/plain'
	  	 )
	  	 );	
	  	 }
	  	 
	  	 $curlout = curl_exec($curl);
	  	 curl_close($curl);
	  	 return $curlout;
	  }

// SIMPLE CURL GET ONLY 

 		function frontCacheBust($CACHE_KEY){
			$ch = curl_init();
			$url= env('FRONT_URL','https://www.railrestro.com/cacheBust/').$CACHE_KEY;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);
			$curlout = curl_exec($ch);
			curl_close($ch);
			return $curlout;
		 }
 

function array_group_by(array $array,$key)
   {
    if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key) ) {
     trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
     return null;
    }
    $func = (!is_string($key) && is_callable($key) ? $key : null);
    $_key = $key;
    // Load the new array, splitting by the target key
    $grouped = [];
    foreach ($array as $value) {
     $key = null;
     if (is_callable($func)) {
      $key = call_user_func($func, $value);
     } elseif (is_object($value) && isset($value->{$_key})) {
      $key = $value->{$_key};
     } elseif (isset($value[$_key])) {
      $key = $value[$_key];
     }
     if ($key === null) {
      continue;
     }
     $grouped[$key][] = $value;
    }
    // Recursively build a nested grouping if more parameters are supplied
    // Each grouped array value is grouped according to the next sequential key
    if (func_num_args() > 2) {
     $args = func_get_args();
     foreach ($grouped as $key => $value) {
      $params = array_merge([ $value ], array_slice($args, 2, func_num_args()));
      $grouped[$key] = call_user_func_array('array_group_by', $params);
     }
    }
    return $grouped;
   }








	public function content_read($url){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

	public function one_time_message($class, $message)
	{
			if($class == 'error') $class = 'danger';
			Session::flash('alert-class', 'alert-'.$class);
	    Session::flash('message', $message);
	}

    public function setDateTime($date)
    {
    	 $date1=date_create($date);
    	$curdate=date_create(date('Y-m-d'));
    	$predate=date_create(date('Y-m-d',strtotime(' -1 days')));
    	$nextdate=date_create(date('Y-m-d',strtotime(' +1 days')));
    	  $curdate = date_diff($date1, $curdate);
         $curdate =$curdate->format('%R%a');
      //    $predate = date_diff($date1, $predate);
      //    $predate =$predate->format('%a');
      //    $nextdate = date_diff($date1, $nextdate);
      //    $nextdate =$nextdate->format('%a');

       return $curdate;
        //   if($curdate==0)
        //  {
        // 	$date=explode(' ',$date);
        // 	return "Today ".$date[1];
        //  }
        // elseif($curdate==1)
        //  {
        //  	$date=explode(' ',$date);
        // 	return "Yesterday ".$date[1];
        //  }
        //  elseif($nextdate==1)
        //  {
        //  	$date=explode(' ',$date);
        // 	return "Tomorrow ".$date[1];
        //  }
        //  else
        //  {
        //  	return date('jS M,Y H:i',strtotime($date));
        //  }

    }



	public function key_value($key, $value, $ar){
		$ret = [];
		foreach($ar as $k => $v) {
			$ret[$v[$key]] = $v[$value];
		}
		return $ret;
	}

	public function current_action($route)
	{
		$current = explode('@', $route);
		View::share('current_action',$current[1]);
	}

	public static function has_permission($user_id, $permissions = '')
	{
		$permissions = explode('|', $permissions);

		$PERMISSIONS = Cache::get('PERMISSIONS', function () {
			$PERMISSIONS = Permissions::All();
            Cache::forever('PERMISSIONS', $PERMISSIONS);
            return $PERMISSIONS;
          });

		$permission_id = $PERMISSIONS->whereIn('name', $permissions)->pluck('id')->toArray();

		$PERMISSIONS_ROLES = Cache::get('PERMISSIONS_ROLES', function () {
			$PERMISSIONS_ROLES = PermissionRole::All();
            Cache::forever('PERMISSIONS_ROLES', $PERMISSIONS_ROLES);
            return $PERMISSIONS_ROLES;
		  });
		  
 		$role = Auth::guard('admin')->user()->role_id;


		if(count($permission_id) && isset($role)){
			$has_permit = $PERMISSIONS_ROLES->where('role_id', $role)->whereIn('permission_id', $permission_id);
			return $has_permit->count();
		}
		else return 0;
	}


	public static function readMeta($slug)
	{


			$page = Cache::get($slug, function () use($slug) {

			$page = 	Meta::where('url', $slug)->firstOrFail();

			Cache::forever($slug,$page);

			return $page;
		});

		return $page;

	}


	function backup_tables($host,$user,$pass,$name,$tables = '*')
	{
	    try {
	        $con = mysqli_connect($host,$user,$pass,$name);
	    }catch(Exception $e){

	    }

	    if (mysqli_connect_errno())
	    {
	        $this->one_time_message('danger', "Failed to connect to MySQL: ".mysqli_connect_error());
	        return 0;
	    }

	    if($tables == '*')
	    {
	        $tables = array();
	        $result = mysqli_query($con, 'SHOW TABLES');
	        while($row = mysqli_fetch_row($result))
	        {
	            $tables[] = $row[0];
	        }
	    }
	    else
	    {
	        $tables = is_array($tables) ? $tables : explode(',',$tables);
	    }

	    $return = '';
	    foreach($tables as $table)
	    {
	        $result = mysqli_query($con, 'SELECT * FROM '.$table);
	        $num_fields = mysqli_num_fields($result);


	        $row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE '.$table));
	        $return.= "\n\n".str_replace("CREATE TABLE", "CREATE TABLE IF NOT EXISTS", $row2[1]).";\n\n";

	        for ($i = 0; $i < $num_fields; $i++)
	        {
	            while($row = mysqli_fetch_row($result))
	            {
	                $return.= 'INSERT INTO '.$table.' VALUES(';
	                for($j=0; $j < $num_fields; $j++)
	                {
	                    $row[$j] = addslashes($row[$j]);
	                    $row[$j] = preg_replace("/\n/","\\n",$row[$j]);
	                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
	                    if ($j < ($num_fields-1)) { $return.= ','; }
	                }
	                $return.= ");\n";
	            }
	        }

	        $return.="\n\n\n";
	    }

	    $backup_name = date('Y-m-d-His').'.sql';

	    $handle = fopen(storage_path("db-backups").'/'.$backup_name,'w+');
	    fwrite($handle,$return);
	    fclose($handle);

	    return $backup_name;
	}

	public function add_notification($user_id, $message){
		$notification = new Notification;
		$notification->user_id = $user_id;
		$notification->message = $message;
		$notification->status = 'unread';
		$notification->save();
	}



	public function senitize($val){
		$inp = trim($val);
		$inp = strip_tags($inp);
		$inp = htmlspecialchars($inp);
		return $inp;
	}








	public function get_days($startDate, $endDate)
    {
	    $days []   	 = $startDate;
	    $startDate = is_numeric($startDate)?$startDate:strtotime($startDate);
	    $endDate = is_numeric($endDate)?$endDate:strtotime($endDate);

	    $startDate   = gmdate("Y-m-d", $startDate);
        $endDate     = gmdate("Y-m-d", $endDate);
	    $currentDate = $startDate;
      	while($currentDate < $endDate)
      	{
        	$currentDate = gmdate("Y-m-d", strtotime("+1 day", strtotime($currentDate)));
        	$days[]      = $currentDate;
      	}
	    return $days;
    }

    public function y_m_d_convert($date)
    {
      	return date('Y-m-d', strtotime($date));
    }






	public function apiLog($api,$status,$identity,$data,$request)
	{
	  $apilog=new Apilog();
	  $apilog->api=$api;
	  $apilog->status=$status;
	  $apilog->identity=$identity;
	  $apilog->data=$data;
	  $apilog->request=$request;
	  $apilog->save();
	}





    function randomCode($length=20)
	{
		$var_num = 3;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $num_set = '0123456789';
	    $low_ch_set = 'abcdefghijklmnopqrstuvwxyz';
	    $high_ch_set = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	    $randomString = '';

	    $randomString .= $num_set[rand(0, strlen($num_set) - 1)];
	    $randomString .= $low_ch_set[rand(0, strlen($low_ch_set) - 1)];
	    $randomString .= $high_ch_set[rand(0, strlen($high_ch_set) - 1)];

	    for ($i = 0; $i < $length-$var_num; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }

	    $randomString = str_shuffle($randomString);

	    return $randomString;
	}
}
