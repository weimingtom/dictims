<?php 
include('images/conn.php');

if ($_REQUEST['action'] == 'login') {
    $checkcode = str_replace("'", "", trim($_REQUEST['checkcode']));
    if ($checkcode == "") {
       echo("<script>alert('验证码不能为空！');window.close();</script>");
    }
    if ($_SESSION['checkcode'] == "") {
       echo("<script>alert('验证码失效，请重新输入！');window.close();</script>");
    }
    if ($checkcode != $_SESSION['checkcode']) {
        echo("<script>alert('您输入的验证码与系统产生的不一致，请重新输入！');window.close();</script>");
    }
    $sid = $_REQUEST['sid'];
    $idcard = $_REQUEST['idcard'];
    $pws = $_REQUEST['pws'];
}

if (Instr(Sid,"or")<>0 or Instr(Idcard,"or")<>0 or Instr(Pws,"or")<>0 or Instr(Sid,"and")<>0 or Instr(Idcard,"and")<>0 or Instr(Pws,"and")<>0) {
    echo("<script>alert('没事别搞人家后台，谢谢！<br>否则一切后果自负！');window.close();</script>");
} else {
    if ($sid != "") {
        $sql = "select * from staff where sid='" . trim(Sid) . "' and Pws='" . trim(Pws) . "' "
    } else {
        $sql = "select * from staff where idcard='" . trim(Idcard) . "' and Pws='" . trim(Pws) . "' "
    }
    $result = mysql_query($sql, $con);
    $rs = mysql_fetch_assoc($result);
    if rs.eof then
       echo("<SCRIPT language=JavaScript>alert('对不起，工号或身份证号不匹配!\n \n请检查，返回重新输入！');");
       echo("location.href='index.asp'</SCRIPT>");
    } else {
       $_SESSION['id'] = $rs['id']
       $_SESSION['userid'] = $rs['sid']
       $_SESSION['username'] = $rs['sname']
       response.redirect "search.asp"
	}
    rs.close
    set rs=nothing
    conn.close
    set conn=nothing
}
?>