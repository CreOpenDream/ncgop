<?php

/**
登录验证
时间：2016-08-01-18:01
作者： qq 1577432674
 version:  1.0
*/
	session_start();

	include "include/dbconn.php";
	include "include/common.inc.php";
	header("Content-type:text/html; charset=utf-8");
	//S 获取POST信息
	if(!empty($_POST['UserName']))
	$nickname = $_POST['UserName'];
	if(!empty($_POST['UserName']))
	$password = $_POST['PassWord'];
/*************test*****************/
//if(!empty($_GET['UserName']))
//	$nickname = $_GET['UserName'];
//if(!empty($_GET['PassWord']))
//	$password = $_GET['PassWord'];
	
/*************test*****************/
	$password = md5($password);
	if(!empty($_POST['Token']))
    $token = $_POST['Token'];
    if(!empty($_POST['Date']))
    $date = $_POST['Date'];
    
    //E 获取POST信息
    
	$sql = "select id from user where nickname='{$nickname}' and password='{$password}';";

	$num=mysqli_num_rows(mysqli_query($link,$sql));
	if($num<1){
		$result=2;
	}else{
		$_SESSION['nickname'] = $nickname;
		$_SESSION['password'] = $password;
   $result=1;
   //将token值保存到数据库
   $res= setTwoResFromTable("token",$token,"date",$date,"nickname",$nickname,"token");
	$isSetOk = $res;
	}
	
 		
		//将数据存储到数组中
		$arr = array(			
			'SUserName' => $nickname,
			'SResult'=>$result,
			'isSetOk' =>$isSetOk
			);
				//将数组转成json格式进行传递
		$strr = json_encode($arr);

	echo($strr);


?>
