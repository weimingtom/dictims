<?php
if (!session_id()) session_start();
//session.TimeOut=60
if ((empty($_SESSION["admin_name"]) or $_SESSION["admin_name"]=="")) {
    echo("<script language=JavaScript>'alert('您还未登录或者超时,请登录！');window.location.href = 'login.php'</script>");
    exit;
}

$sysConfig = "员工工资信息管理系统";
?>

