<?php
require 'kint/Kint.class.php';  

interface BillerInterface 
{
	public function bill(array $user, $amount);
}



interface BillingNotifierInterface 
{
	public function notify(array $user, $amount);
}


class StripeBiller implements BillerInterface 
{
	const A = 'b';
	public static $kib = __CLASS__;
	public function __construct(BillingNotifierInterface $notifier)
	{
		$this->notifier = $notifier;
	}

	public function bill(array $user, $amount)
	{
		// Bill the user via Stripe...
		$this->notifier->notify($user, $amount);
	}

	static function kk(){
		echo ';3';
	}
}



if( !function_exists('ftok') )
{
    function ftok($filename = "", $proj = "")
    {
        if( empty($filename) || !file_exists($filename) )
        {
            return -1;
        }
        else
        {
            $filename = $filename . (string) $proj;
            for($key = array(); sizeof($key) < strlen($filename); $key[] = ord(substr($filename, sizeof($key), 1)));
            return dechex(array_sum($key));
        }
    }
}

$mesg_key = ftok(__FILE__, 'm');

$mesg_id = msg_get_queue($mesg_key, 0666);
 
function fetchMessage($mesg_id){
 
 if(!is_resource($mesg_id)){
 
 print_r("Mesg Queue is not Ready");
 
 }
 
 if(msg_receive($mesg_id, 0, $mesg_type, 1024, $mesg, false, MSG_IPC_NOWAIT)){
 
 print_r("Process got a new incoming MSG: $mesg ");
 
 }
 
}
 
register_tick_function("fetchMessage", $mesg_id);
 
declare(ticks=2){
 
 $i = 0;
 
 while(++$i < 100){
 
 if($i%5 == 0){
 
 msg_send($mesg_id, 1, "Hi: Now Index is :". $i);
 }
 }
}
exit;

$reflection = new ReflectionClass('StripeBiller');
var_dump($reflection->getMethods());
var_dump($reflection->getConstants());
echo StripeBiller::A;
set_time_limit(0);
ob_end_clean();
ob_implicit_flush();
while(1){
    //部分浏览器需要内容达到一定长度了才输出
    echo str_repeat("<div></div>", 200).'hello sjolzy.cn<br />';
    sleep(1);
    //ob_end_flush();
    //ob_flush();
    //flush();
}
exit;

// try{
// 	throw new Exception('Division by zero.');
// 	$a = fsockopen('192.168.30.5');
// }
// catch (Exception $e){
// 	echo '3';
// }
// finally{
// 	echo '4';
// }
// echo '3';
// exit;
class A {
    public static function foo() {
        static::who();
    }
 
    public static function who() {
        echo __CLASS__."\n";
    }
}
 
class B extends A {
    public static function test() {
        A::foo();
        parent::foo();
        self::foo();
    }
 
    public static function who() {
        echo __CLASS__."\n";
    }
}
class C extends B {
    public static function who() {
        echo __CLASS__."\n";
    }
}
 
// C::test();
//后期绑定
// echo mt_getrandmax();
// session_name('session');
// session_start();
// $_SESSION['name'] = 'wangzhimin';
// echo session_name();
// echo session_id();
// var_dump($_SESSION);
// // session_regenerate_id();
// echo session_name(),':';
// echo session_id();
// var_dump($_SESSION);

// echo bindtextdomain('mpp', 'a');
// echo setlocale(LC_ALL, 'iwedish');
// echo setlocale(LC_ALL, 0);
// Kint::trace();
// $c = curl_init('http://baike.baidu.com/subview/8347/5786180.htm?fromId=8347&from=rdtself');
// $cookie = '__gads=ID=cd5e09436b447d6f:T=1372657119:S=ALNI_MZNnSCay_lRRbj38IMlbgEsekM_tA; pgv_pvi=2928835584; lzstat_uv=3692418366269794873|2252266@2510115; Hm_lvt_674430fbddd66a488580ec86aba288f7=1387856493,1387870432,1389079304,1389603279; Hm_lvt_95eb98507622b340bc1da73ed59cfe34=1389608052; _ga=GA1.2.1705755029.1372657117; .DottextCookie=B132EB0769A7F1B2E07124342D81157900EE78633E04E4CF1D7039D777AED760DF9CC084DB38137A14AEF90BE165F123CF08BBBA48E89DCE6BE1282127B2E4853373D81B4B62E3585161F28A7AFA7E11FB67E350563CC61B41CD9C50B0BB74F12888161138A04A34D8829277B8510ADA5FF515B4; __utma=226521935.1705755029.1372657117.1393817250.1393900300.351; __utmb=226521935.17.10.1393900300; __utmc=226521935; __utmz=226521935.1393817250.350.229.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)';
// curl_setopt($c, CURLOPT_COOKIE, $cookie);
// curl_setopt($c, CURLOPT_RETURNTRANSFER , true);
// $info = curl_getinfo($c);
// curl_exec($c);
// var_dump($info);
// $tempCn = curl_multi_getcontent($c);
// $tempCn = str_replace('<script src="/', '<script src="http://www.cnblogs.com/', $tempCn);
// echo $tempCn;
// var_dump($page);
// curl_close($c);
// Kint::trace();
// +Kint::dump(1);
?>