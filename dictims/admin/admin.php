<?php include('inc/right.php'); ?>
<?php include('inc/conn.php'); ?>
<?php include('inc/md5.php'); ?>   
<script language="javascript">
<!--
function DoEmpty(params)
{
if (confirm("真的要删除这条记录吗？删除后此记录里的所有内容都将被删除并且无法恢复！"))
window.location = params ;
}
//-->
</script>
<?php
if (!empty($_REQUEST["wor"]) and $_REQUEST["wor"] == "del") {
	$sql = "delete from admin where id=" . $_REQUEST["id"];
	mysql_query($sql, $con);
	header('location:?action=list');
	exit;
}
?>
<?php
$action = !empty($_REQUEST["action"]) ? $_REQUEST["action"] : "";
$id = !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
$username = !empty($_REQUEST["username"]) ? $_REQUEST["username"] : "";
$password = !empty($_REQUEST["password1"]) ? $_REQUEST["password1"] : "";
if ($action == "yes") {
 	if ($id == "") {
   		$sql = "select username from admin where Username='" .
   		 	trim($_REQUEST("username")) . "'";
		$result = mysql_query($sql, $con);
		if ($result !== false) {
		    $rsCheck = mysql_fetch_assoc($result);
		} else {
		    $rsCheck = null;
		}
	    if (!rsCheck) {
	      	die("<script language='javascript'>alert('" . trim($_REQUEST["username"]) . "用户名称已存在！');history.back(-1);</script>");
	    }
   		$sql = "insert into admin (username, password) values ('" . username ."', '" . md5_str($password) . "') "; 
   	} else {
   		$sql = "update admin set username = '" . $username . "', password = '" . md5_str($password) . "' where id=" . $id . ""; 
	}
	mysql_query($sql, $con);
  	header('location:?action=list');
	exit;
}
?>
<html>
<head>
<title><?php echo($sysConfig); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="images/main.css" rel="stylesheet" type="text/css">
<script language="Javascript">
function check()
{

  if (document.add.Username.value=="")
     {
      alert("请输入帐户名！")
      document.add.Username.focus()
      document.add.Username.select()
      return
     }
  if (document.add.Password1.value=="")
     {
      alert("请输入您的密码！")
      document.add.Password1.focus()
      document.add.Password1.select()		
      return
     }
  if (document.add.Password1.value.length<6)
     {
      alert("请填写管理员密码(字符数在6-16位之间)！")
      document.add.Password1.focus()
      document.add.Password1.select()		
      return
     }
  if (document.add.Password1.value.length>16)
     {
      alert("请填写管理员密码(字符数在6-16位之间)！")
      document.add.Password1.focus()
      document.add.Password1.select()		
      return
     }
  if (document.add.Password1.value!=document.add.Password2.value)
     {
      alert("您输入的两次密码不相同！")
      document.add.Password2.focus()
      document.add.Password2.select()		
      return
     }
     document.add.submit()
}
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td bgcolor="#FFFFFF">
<?php 
if ($action == "add") { 
?>
	<br>
      <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <form name="add" method="post" action="admin.php">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="2"  class="optiontitle">添加用户</td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
          <td width="10%" align="right">用户名：</td>
          <td align="left"><input name="Username" type="text" id="Username"></td>
        </tr>
		<tr align='center' bgcolor='#FFFFFF'>
		  <td align='right' bgcolor="#FFFFFF"> 登陆密码：</td>
		  <td align='left'><input name="Password1" type="password" id="Password1"> <font color="red">*</font>6-16个字符</td>
		</tr>
		<tr align='center' bgcolor='#FFFFFF'>
		  <td align='right' bgcolor="#FFFFFF"> 密码确认：</td>
		  <td align='left'><input name="Password2" type="password" id="Password2"> <font color="red">*</font></td>
		</tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="button" name="Submit" value="提交" onClick="check()">
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</form>
      </table> 
<?php 
} 
?>
	<br>
<?php 
if ($action == "list") { 
?>
      <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="5"  class="optiontitle">用户列表</td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td width="10%">序号</td>
          <td width="20%">用户名</td>
          <td width="25%">用户密码</td>
          <td width="20%">执行操作</td>
        </tr>
<?php
	$sql = "select * from admin"; 
	$result = mysql_query($sql, $con);
	while ($rs = mysql_fetch_assoc($result)) {
?>
        <tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td><?php echo($rs["id"]); ?></td>
          <td><?php echo($rs["username"]); ?></td>
          <td><?php echo($rs["password"]); ?></td>
          <td><?php if ($rs["id"] == 1) { ?>
          <IMG src="images/edit.gif" align="absmiddle"><a href="?action=edit&id=<?php echo($rs["id"]); ?>">修改</a> <IMG src="images/drop.gif" align="absmiddle">删除
          <?php } else { ?>
          <IMG src="images/edit.gif" align="absmiddle"><a href="?action=edit&id=<?php echo($rs["id"]); ?>">修改</a>  <IMG src="images/drop.gif" align="absmiddle"><a href="javascript:DoEmpty('?wor=del&id=<?php echo($rs["id"]); ?>')">删除</a>
          <?php } ?></td>
        </tr>
<?php
	}
?>
        <tr align="right" bgcolor="#ebf0f7">
          <td colspan="5"><a href="admin.php?action=add">添加用户</a></td>
        </tr>
      </table> 
<?php
}
if ($action == "edit") {
	$sql = "select * from admin where id=" . $_REQUEST["id"];
	$result = mysql_query($sql, $con);
	if ($result !== false) {
	    $rs = mysql_fetch_assoc($result);
	} else {
	    $rs = null;
	}
	if ($rs) {
?>
<br>
	  <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <form name="add" method="post" action="admin.php">
		<tr align="center" bgcolor="#F2FDFF">
		  <td colspan=2  class="optiontitle">修改用户</td>
		</tr>
		<tr align="center" bgcolor="#F2FDFF">
          <td width="10%" align="right">用户名：</td>
          <td align="left"><input name="Username" type="text" id="Username" value="<?php echo($rs["username"]); ?>"></td>
        </tr>
		<tr align='center' bgcolor='#FFFFFF'>
		  <td align='right' bgcolor="#FFFFFF"> 登陆密码：</td>
		  <td align='left'><input name="Password1" type="password" id="Password1"> 
		  <font color="red">*</font>6-16个字符</td>
		</tr>
		<tr align='center' bgcolor='#FFFFFF'>
		  <td align='right' bgcolor="#FFFFFF"> 密码确认：</td>
		  <td align='left'><input name="Password2" type="password" id="Password2"> 
		  <font color="red">*</font></td>
		</tr>
	    <tr align="center" bgcolor="#ebf0f7">
		  <td colspan="2">
		   <input type="hidden" name="action" value="yes"> <input type="button" name="Submit" value="提交" onClick="check()">
           <input type="button" name="Submit2"value="返回" onClick="history.back(-1)"> <input name="id" type="hidden" id="id" value="<?php echo($rs["id"]); ?>">
		 </td>
	   </tr>
  	 </form>
  	</table>
<?php
	}
}
?>
    </td>
  </tr>
</table>
</body>
</html>

