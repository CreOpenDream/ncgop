
<?php

/**
登录验证
时间：2016-07-09 -0:58
作者：郭守金 qq 1577432674
 version:  1.0
*/

// test
	/*$UserName = $_GET['UserName'];
	$PassWord = $_GET['PassWord'];
	$PassWord = md5($PassWord);
 */
  
	
//数据库连接，工具类
	include "include/dbconn.php";
	include "include/common.inc.php";
  //http头设置
	header("Content-type:text/html;charset=utf-8");
	//获取数据
	//获取客户端发来的请求信息
  $UserName = $_POST['UserName'];
	$PassWord = $_POST['PassWord'];
	$PassWord = md5($PassWord);
  //1策划 2编程 3美工
  $mc = $_POST['mc'];
	$ic= $_POST['ic'];
	$job= $_POST['job'];
    $infor= $_POST['infor'];
    $phone= $_POST['phone'];
    $qq= $_POST['qq'];
	$adr= $_POST['addr'];
	$sex= $_POST['sex'];
    $age= $_POST['age'];

$sql = "select * from user where nickname='".$UserName."';";
	$res = mysql_query($sql,$link);
	$row = mysql_num_rows($res);
	if ($row ==1){
//用户已经注册
		$result =2;
}else{

$res=registFunc($UserName,$PassWord,$ic,$job,$mc,$infor,$phone,$qq,$adr,$sex,$age);
if($res){//如果成功
   $result=1;
      //token表写入
     $sql = "insert into token (`nickname`) values ('{$nn}');";
     mysql_query($sql,$link);
        
	}
	else
	{
		$result =0;

		}


}
	//将数据存储到数据中
		$arr = array(			
			'SUserName' =>$UserName,
			'SResult'=>$result
			);
				//将数组转成json格式进行传递
		$strr = json_encode($arr);

	echo($strr);
 
 
?>
