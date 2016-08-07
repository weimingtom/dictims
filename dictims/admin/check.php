<?php include('inc/conn.php'); ?> 
<?php include('inc/md5.php'); ?> 
<?php
$verifycode = !empty($_SESSION['pSN']) ? $_SESSION['pSN'] : "";
$verifycode2 = !empty($_REQUEST['verifycode']) ? trim($_REQUEST['verifycode']) : "";
if ($verifycode != $verifycode2) {
    echo("<head>");
	echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
	echo("<script language='javascript'>alert('您输入的验证码不正确。注意：区分大小写 \\n \\n');");
    echo("location.href='login.php'</script>");
    echo("</head>");
    $founderr = true;
    exit;
} else {
    $_SESSION["pSN"] = "";
    if (!empty($_REQUEST["action"]) and $_REQUEST["action"] == "login") {
        $username = !empty($_REQUEST["admin_name"]) ? trim($_REQUEST["admin_name"]) : "";
        $password = !empty($_REQUEST["admin_pass"]) ? trim($_REQUEST["admin_pass"]) : "";
    }
    if (strpos($username, "or") !== false or strpos($password, "or") !== false or 
        strpos($username, "and") !== false or strpos($password, "and") !== false) {
        echo("<head>");
		echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
		echo("</head>");
		echo("<body><br><br><br><br><font size='2'><center>没事别搞人家后台，谢谢！</font></body>");
		exit;
    } else {
        $sql="select * from admin where username='" . $username . "' and password='" . md5_str($password) . "'";
        $result = mysql_query($sql, $con);
        if ($result !== false) {
            $rs = mysql_fetch_assoc($result);
        } else {
            $rs = null;
        }
        if (!$rs) {
            echo("<head>");
			echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
			echo("<script language='javaScript'>alert('您输入的用户名或密码有误。返回重新输入!');");
            echo("location.href='login.php'</script>");
            echo("</head>");
            exit;
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
            $now = date('y-m-d h:i:s', time());
            mysql_query("UPDATE admin SET lastloginip = '" . $ip . "', LastLoginTime = '" . $now . 
                "' WHERE username = '" . $username . "' AND password='" . md5_str($password) . "'", $con);
            $_SESSION['admin_name'] = $_REQUEST['admin_name'];
            header('location:index.php');
        }

        mysql_close($con);
    }
}
?>
