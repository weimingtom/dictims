<?php
if (!session_id()) session_start();
//session.TimeOut=60
if (!isset($_SESSION["admin_name"]) or $_SESSION["admin_name"]=="") {
	echo("<head>");
    echo("<meta http-equiv='Content-type' content='text/html; charset=utf-8'>");
    echo("<script language='javascript'>alert('您还未登录或者超时,请登录！');window.location.href = 'login.php'</script>");
    echo("</head>");
    exit;
}
$sysConfig = "员工工资信息管理系统";
?>

