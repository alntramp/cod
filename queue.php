<?php
if( !function_exists('ftok') )
{
    //定义该函数是为了防止不能使用该函数.所有自定义一个.
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
    if(!is_resource($mesg_id))
    {
 
        print_r("Mesg Queue is not Ready");
	echo '<br>'; 
    }
 
    if(msg_receive($mesg_id, 0, $mesg_type, 1024, $mesg, false, MSG_IPC_NOWAIT)){
 
        print_r("Process got a new incoming MSG: $mesg ");
	echo '<br>'; 
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
?>
