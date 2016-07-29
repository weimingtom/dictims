<?php
if (!session_id()) session_start();
//session.TimeOut=60
if ((empty($_SESSION["id"]) or $_SESSION["id"]=="") and 
    (empty($_SESSION["userid"]) or $_SESSION["userid"]=="") and 
    (empty($_SESSION["username"]) or $_SESSION["username"]=="")) {
    echo("<script language=JavaScript>'alert('您还未登录或者超时,请登录！');window.location.href = 'index.php'</script>");
    exit;
}
?>
