<?php include('images/right.php'); ?> 
<?php include('images/conn.php'); ?>
<?php
$action = $_REQUEST["action"];
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
if ($action == "yes") {
    $sql="update Staff set pws = '". $_REQUEST["pws1"] . "' where id=". $id . ""; //更新数据表记录
	echo("<script language='javascript'>alert('密码修改成功，请重新登录！');");
    echo("location.href='logout.php'</script>");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd html 4.01 transitional//EN" "http://www.w3c.org/tr/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>员工工资信息管理系统</title>
<meta http-equiv=Content-type content="text/html; charset=utf-8">
<link href="images/css.css" rel="stylesheet" type="text/css">
<script language="Javascript">
function check()
{
  if (document.add.Pws1.value=="")
     {
      alert("请输入您的查询密码！")
      document.add.Pws1.focus()
      document.add.Pws1.select()		
      return
     }
  if (document.add.Pws1.value.length<6)
     {
      alert("请输入查询密码(字符数在6-16位之间)！")
      document.add.Pws1.focus()
      document.add.Pws1.select()		
      return
     }
  if (document.add.Pws1.value.length>16)
     {
      alert("请输入查询密码(字符数在6-16位之间)！")
      document.add.Pws1.focus()
      document.add.Pws1.select()		
      return
     }
  if (document.add.Pws1.value!=document.add.Pws2.value)
     {
      alert("您输入的两次密码不相同！")
      document.add.Pws2.focus()
      document.add.Pws2.select()		
      return
     }
     document.add.submit()
}
</script>
</head>
<body>
<table cellSpacing=1 cellPadding=5 width=460 align=center bgColor=#b9b0a9 border=0>
  <tr>
    <td vAlign=top bgColor=#ffffff>
      <table cellSpacing=0 cellPadding=0 width="100%" border=0>
        <tbody>
        <tr><td width=460 background=images/top.gif height=54 class="bt">工资查询</td></tr>
        <tr>
          <td bgColor=#FFFFFF height=150>
            <table height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <tbody>
              <tr>
                <td>
<?php
if ($action == "view") {
    $sql = "select * from staff where id=". $id . "";
    $result = mysql_query($sql, $con);
    if ($result !== false) {
        $rs = mysql_fetch_assoc($result);
    } else {
        $rs = null;
    }
    if ($rs) {
?>
                  <table cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
                    <tr>
                      <td align=right height=30 width="30%">职员工号：</td>
                      <td height=30><?php echo($rs["sid"]);?> </td>
					</tr>
                    <tr>
                      <td align=right height=30>职员姓名：</td>
                      <td height=30><?php echo($rs["sname"]);?></td>
					</tr>
                    <tr>
                      <td align=right height=30 width="30%">身份证号：</td>
                      <td height=30><?php echo($rs["idcard"]);?> </td>
					</tr>
                    <tr>
                      <td align=right height=30>所在部门：</td>
                      <td height=30><?php echo($rs["department"]);?></td>
					</tr>
                    <tr>
                      <td align=right height=30>担任职务：</td>
                      <td height=30><?php echo($rs["jobs"]);?></td>
					</tr>
                    <?php if (isset($rs["luqu"]) and $rs["luqu"] == "录取") { ?>
                    <tr>
                      <td align=right height=30>职员职称：</td>
                      <td height=30><?php echo($rs["duty"]);?></td>
					</tr>
                    <?php } ?>
					<tr>
                      <td align=right height=30>入职时间：</td>
                      <td height=30><?php echo($rs["entrance"]);?></td>
					</tr>
					<tr>
                      <td align=right height=30>查询密码：</td>
                      <td height=30><?php echo($rs["pws"]);?></td>
					</tr>
					<tr>
                      <td height=30 colspan="2" align=center>
					  <input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
                      </tr>
				   </table>
<?php
    } else {
        echo("<script language='javascript'>alert('对不起，工号或身份证号不匹配!\\n \\n请检查，返回重新输入！');");
        echo("location.href='index.php'</script>");
        exit;
    }
}
?>
<?php
if ($action == "edit") {
    $sql = "select * from Staff where id=". $id ."";
    $result = mysql_query($sql, $con);
    if ($result !== false) {
        $rs = mysql_fetch_assoc($result);
    } else {
        $rs = null;
    }
    if ($rs) {
?>				   
                  <table cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
					<form name="add" method="post" action="user.php">
                    <tr>
                      <td align=right height=30 width="30%">职员工号：</td>
                      <td height=30><?php echo($rs["sid"]);?> </td>
					</tr>
                    <tr>
                      <td align=right height=30>职员姓名：</td>
                      <td height=30><?php echo($rs["sname"]);?></td>
					</tr>
                    <tr>
                      <td align=right height=30 width="30%">身份证号：</td>
                      <td height=30><?php echo($rs["idcard"]);?> </td>
					</tr>
                    <tr>
                      <td align=right height=30>所在部门：</td>
                      <td height=30><?php echo($rs["department"]);?></td>
					</tr>
                    <tr>
                      <td align=right height=30>担任职务：</td>
                      <td height=30><?php echo($rs["jobs"]);?></td>
					</tr>
					<?php if (isset($rs["luqu"]) and $rs["luqu"] == "录取") { ?>
                    <tr>
                      <td align=right height=30>职员职称：</td>
                      <td height=30><?php echo($rs["duty"]);?></td>
					</tr>
					<?php } ?>
					<tr>
                      <td align=right height=30>入职时间：</td>
                      <td height=30><?php echo($rs["entrance"]);?></td>
					</tr>
					<tr>
                      <td align=right height=30>查询密码：</td>
                      <td height=30><input name="Pws1" type="password" id="Pws1" value="<?php echo($rs["pws"]);?>" size="16"></td>
					</tr>
					<tr>
                      <td align=right height=30>密码确认：</td>
                      <td height=30><input name="Pws2" type="password" id="Pws2" value="<?php echo($rs["pws"]);?>" size="16"></td>
					</tr>
					<tr>
                      <td height=30 colspan="2" align=center><input type="hidden" name="action" value="yes">
          <input type="button" name="Submit2" value="修改" onClick="check()">
          <input type="button" name="Submit2" value="返回" onClick="history.back(-1)">
		  <input name="id" type="hidden" id="id" value="<?php echo($rs["id"]);?>">	</td>
                      </tr>
					  </form>
				   </table>
<?php
    } else {
  	    echo("<script language='javaScript'>alert('对不起，工号或身份证号不匹配!\\n \\n请检查，返回重新输入！\\n \\n校无忧科技-友情提示');");
        echo("location.href='index.php'</script>");
    }
}
?>
				 </td>
			  </tr>
			 </tbody>
		   </table>
		 </td>
		</tr>
		</tbody>
	  </table>
	</td>
   </tr>
   </tbody>
  </table>
</body>
</html>
