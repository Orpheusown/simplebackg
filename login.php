<?php

	session_start();
    
    //引用数据库信息文件
    require_once 'DBinfo.php';

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(mysqli_connect_errno($link)){
		die("<script type='text/javascript'>alert('连接数据库失败！');window.location.href='index.html';</script>".mysql_error());
	}

	$adName = $_POST['username'];
    $adPassword = $_POST['passwd'];
    $adPasscheck = $_POST['passcheck'];

    if($adPasscheck!=$adPassword){
    	echo <<< wrong
        <script type='text/javascript'>
        	alert('重复密码错误！');
        	window.location.href='login.html';
        	$('input').val();
        </script>
wrong;
    }

	$query = "SELECT adName, adPassword FROM cnta_admin WHERE adName = '$adName' AND adPassword = '$adPassword' ";

	$res = mysqli_query($link,$query);

    if( mysqli_num_rows( $res) == 1 ){

    	setcookie('admin',$adName,time()+3600);
        echo <<< success
        <script type='text/javascript'>
        	alert('登录成功！');
        	window.location.href='/admin/Admin.php';
        </script>
success;
    }else{
        echo "<script type='text/javascript'>alert('用户名或密码错误！');window.location.href='login.html';$('input').val();</script>";
    }

	mysqli_free_result($res);
	mysqli_close($link);

	die();


?>