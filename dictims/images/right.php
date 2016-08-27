<?php
if (!session_id()) session_start();
//session.TimeOut=60
if ((!isset($_SESSION["id"]) or $_SESSION["id"]=="") and 
    (!isset($_SESSION["userid"]) or $_SESSION["userid"]=="") and 
    (!isset($_SESSION["username"]) or $_SESSION["username"]=="")) {
    echo("<script language='javascript'>alert('您还未登录或者超时,请登录！');window.location.href = 'index.php'</script>");
    exit;
}
?>
