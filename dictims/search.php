<?php include('images/right.php'); ?> 
<?php include('images/conn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd html 4.01 transitional//EN" "http://www.w3c.org/tr/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>员工工资信息管理系统</title>
<meta http-equiv=Content-type content="text/html; charset=utf-8">
<link href="images/css.css" rel="stylesheet" type="text/css">
<?php include('images/ini.php'); ?>
</head>
<body>
<table cellSpacing=1 cellPadding=5 width=460 align=center bgColor=#b9b0a9 border=0>
  <tbody>
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
                <td valign="top">
                  <table cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
                    <tbody>
                    <tr>
                      <td align=right height=30 width="25%">职员工号：</td>
                      <td><?php echo($_SESSION["userid"]);?></td>
					  <td align=right width="25%">职员姓名：</td>
					  <td><?php echo($_SESSION["username"]);?></td>
                    </tr>
                    <tr align="center">
                      <td><a href="search.php">查询工资</a></td>
                      <td><a href="user.php?action=view">用户信息</a></td>
                      <td><a href="user.php?action=edit">修改密码</a></td>
                      <td><a href="logout.php">退出查询</a></td>
                    </tr>
                    <tr>
					 <form name="search" method="post" action="search.php">
                      <td height="30" colspan="4" align=center>
						<select name="Syear">
						<option  value="">-请选择年份-</option>
						<?php for($y=2013 ; $y <= intval(date("Y")); $y++) { ?>
						<option value="<?php echo($y);?>"><?php echo($y);?></option>
						<?php } ?>
						</select>
						<select name="Smonth">
						<option value="">-请选择月份-</option>
						<?php for($m = 1 ; $m <= 12; $m++) { ?>
						<option value="<?php echo($m);?>"><?php echo($m);?></option>
					    <?php } ?>
						</select> 
            			<input name="Query" type="submit" id="Query" value="查 询">					  </td>
					  </form>
                    </tr>
<?php
$syear = !empty($_REQUEST["syear"]) ? trim($_REQUEST["syear"]) : "";
$smonth = !empty($_REQUEST["smonth"]) ? trim($_REQUEST["smonth"]) : "";
$sid = $_SESSION["userid"];
$sql="select * from salary where 5 = 5";
if ($syear != "") { //按类别显示
	$sql = $sql . " and syear='" . $syear . "' ";
}
if ($syear == "") {
    $syear = intval(date("Y"));
	$sql = $sql . " and syear='" . $syear . "' ";
}
if ($smonth != "") { //
	$sql = $sql . " and smonth='" . $smonth . "' ";
}
if ($smonth == "") {
    $smonth = intval(date("m"));
	$sql = $sql . " and smonth='" . $smonth . "' ";
}
$sql = $sql . " and sid='" . $sid . "' ";
$sql = $sql . " order by id desc";

$result = mysql_query($sql, $con);
if ($result !== false) {
    $rs = mysql_fetch_assoc($result);
} else {
    $rs = null;
}

if ($rs) {
    do {
?>
                    <tr align="center">
                      <td height="30"><b>基本工资</b></td>
                      <td><b>绩效</b></td>
                      <td><b>津贴</b></td>
                      <td><b>补贴</b></td>
                    </tr>
                    <tr align="center">
                      <td height="30"><?php echo($rs["basic"]); ?></td>
                      <td><?php echo($rs["perform"]); ?></td>
                      <td><?php echo($rs["jt"]); ?></td>
                      <td><?php echo($rs["bt"]); ?></td>
                    </tr>
                    <tr align="center">
                      <td height="30"><b>公积金</b></td>
                      <td><b>养老保险</b></td>
                      <td><b>医疗保险</b></td>
                      <td><b>其它</b></td>
                    </tr>
                    <tr align="center">
                      <td height="30"><?php echo($rs["gjj"]);?></td>
                      <td><?php echo($rs["lb"]);?></td>
                      <td><?php echo($rs["yb"]);?></td>
                      <td><?php echo($rs["qt"]);?></td>
                    </tr>
                    <tr>
                      <td align="center" height="30"><font color="#FF0000"><b><?php echo($syear);?>年<?php echo($smonth);?>月</b></font></td>
                      <td colspan="3"><b>工资合计：</b><?php echo($stotal);?> 元</td>
					</tr>
<?php
    } while ($rs = mysql_fetch_assoc($result));
?>
<?php
} else {
?>
        <tr align="center" bgcolor="#FFFFFF">
          <td colspan="8">对不起！目前还没有 <font color="#FF0000"><?php echo($syear);?>年<?php echo($smonth);?>月</font>工资信息！</td>
        </tr>
<?php
}
?>				
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
	</td>
   </tr>
   </tbody>
  </table>
</body>
</html>
