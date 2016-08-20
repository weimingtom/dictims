<?php 
include('images/conn.php');

//echo("<script>alert('action=".$_REQUEST['action']."');window.close();</script>");
//exit;

if (isset($_GET['action']) and $_REQUEST['action'] == 'login') {
    $checkcode = str_replace("'", "", trim($_REQUEST['checkcode']));

    if ($checkcode == "") {
    	echo("<head>");
    	echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
    	echo("<script>alert('验证码不能为空！');location.href='index.php'</script>");
		echo("</head>");
		exit;
    }
    if (!isset($_SESSION['checkcode']) or $_SESSION['checkcode'] == "") {
       	echo("<head>");
    	echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
    	echo("<script>alert('验证码失效，请重新输入！');location.href='index.php'</script>");
    	echo("</head>");
		exit;
    }
    if (isset($_SESSION['checkcode']) and $checkcode != $_SESSION['checkcode']) {
        echo("<head>");
    	echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
    	echo("<script>alert('您输入的验证码与系统产生的不一致，请重新输入！');location.href='index.php'</script>");
    	echo("</head>");
		exit;
	}
    $sid = $_REQUEST['sid'];
    $idcard = $_REQUEST['idcard'];
    $pws = $_REQUEST['pws'];
}

//echo("<script>alert('sid=".$sid.", idcard=".$idcard.", pws=".$pws."');window.close();</script>");

if (strpos($sid, "or") !== false or strpos($idcard, "or") !== false or strpos($pws, "or") !== false or 
    strpos($sid, "and") !== false or strpos($idcard, "and") !== false or strpos($pws, "and") !== false) {
    echo("<head>");
	echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
	echo("<script>alert('没事别搞人家后台，谢谢！\\n否则一切后果自负！');window.close();</script>");
	echo("</head>");
	exit;
} else {
    if ($sid != "") {
        $sql = "select * from staff where sid='" . trim($sid) . "' and pws='" . trim($pws) . "' ";
    } else {
        $sql = "select * from staff where idcard='" . trim($idcard) . "' and pws='" . trim($pws) . "' ";
    }
    $result = mysql_query($sql, $con);
    if ($result !== false) {
        $rs = mysql_fetch_assoc($result);
    } else {
        $rs = false;
    }
    if ($rs === false) {
        echo("<head>");
		echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
		echo("<script language='javascript'>alert('对不起，工号或身份证号不匹配!\\n \\n请检查，返回重新输入！');");
        echo("location.href='index.php'</script>");
    	echo("</head>");
		exit;
	} else {
       $_SESSION['id'] = $rs['id'];
       $_SESSION['userid'] = $rs['sid'];
       $_SESSION['username'] = $rs['sname'];
       header('location:search.php');
       exit;
	}
    mysql_close($con);
}
?>