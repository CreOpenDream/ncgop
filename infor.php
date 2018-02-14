<?php

/**
信息查询
时间:2016-08-07 11:44
作者：郭守金 qq 1577432674
 version:  3.0
*/
  include "include/dbconn.php";
  include "include/common.inc.php";
  header("Content-type:text/html;
 charset=utf-8");

//从客户端获取post的action值

  $action=$_POST['action'];
  $nickname=$_POST['UserName'];
  /**  
 $action
1 查询能力 贡献度  _QueryAll
*/
   //常量
   //$_QueryAll="1";
     $action=1;
switch($action){
   case 1:

$Contri=getResFromTable("contri","nickname",$nickname,"user");
$MemClass=getResFromTable("memclass","nickname",$nickname,"user");
if($MemClass!=null && Contri!=null){
    $arr = array(           
            'SUserName' => $nickname,
            'SContri' => $Contri,
            'SMemClass' => $MemClass,
            'SResult' =>1
            );
            
}else{
         $arr = array(          
            'SUserName' => $nickname,
            'SContri' =>$Contri,
            'SMemClass' =>$MemClass,
            'SResult' => 0
            );
}

break;
   default:
   
         $arr = array(          
            'SUserName' => $nickname,
            'SContri' => "错误",
            'SMemClass' => null,
            'SResult' => 2
            );
break;
}



          //将数组转成json格式进行传递
     $strr = json_encode($arr);
	echo($strr);






?>


