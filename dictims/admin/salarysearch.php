<?php include('inc/right.php'); ?> 
<?php include('inc/conn.php'); ?> 
<?php
$syear = isset($_REQUEST["syear"]) ? trim($_REQUEST["syear"]) : "";
$smonth = isset($_REQUEST["smonth"]) ? trim($_REQUEST["smonth"]) : "";
$lx = isset($_REQUEST["lx"]) ? trim($_REQUEST["lx"]) : "";
$keywords = isset($_REQUEST["keywords"]) ? trim($_REQUEST["keywords"]) : "";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>员工工资信息管理系统</title>
<link href="images/main.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function doEmpty(params) {
	if (confirm("真的要删除这条记录吗？删除后此记录里的所有内容都将被删除并且无法恢复！")) {
		alert("删除信息成功\n 返回信息列表");
		window.location = params;
	}
}
-->
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td bgcolor="#FFFFFF"><br>
      <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
		<tr align="center" bgcolor="#F2FDFF">
          <td class="optiontitle" colspan="8">查询职员工资</td>	
        </tr>
        <tr align="center" bgcolor="#FFFFFF">
          <form id="search" name="search" method="get" action="salarysearch.php">
            <td height="30" colspan="8">
			请选择查询信息：
			<select name="syear">
			<option value="">-请选择年份-</option>
			<?php for($y = 2011; $y <= 2012; $y++) { ?>
			<option value="<?php echo($y); ?>"><?php echo($y); ?></option>
			<?php } ?>
			</select>
			<select name="smonth">
			<option value="">-请选择月份-</option>
			<?php for ($m = 1; $m <= 12; $m++) { ?>
			<option value="<?php echo($m); ?>"><?php echo($m); ?></option>
			<?php } ?>
			</select>
			<select name="lx">
             <option value="Sname">职员姓名</option>
             <option value="Sid">职员工号</option>
            </select>
			<input name="keywords" type="text" id="keywords" size="30"> 
            <input name="query" type="submit" id="query" value="查 询"></td>
          </form>
        </tr> 
<?php
if ($keywords != "") {
?>
        <tr align="center" bgcolor="#ebf0f7">
          <td width="10%">年份</td>
          <td width="10%">月份</td>
          <td width="10%">职员工号</td>	
          <td width="10%">职员姓名</td>
          <td width="20%">合计工资</td>	
		  <td width="20%">执行操作</td>  
        </tr>
<?php
	$sql = "select * from salary where 5=5";
 	if ($syear != "") { //按类别显示
		$sql = $sql . " and syear='" . $syear . "' ";
 	}
 	if ($syear == "") {
    	$syear = intval(date("Y"));
		$sql = $sql . " and syear='" . $syear . "' ";
 	}
 	if ($smonth != "") {
		$sql = $sql . " and smonth='" . $smonth . "' ";
 	}
 	if ($smonth == "") {
    	$smonth = intval(date("m"));
		$sql = $sql . " and smonth='" . $smonth . "' ";
 	}
 	if ($lx == "sid") {
		$sql = $sql . " and sid like '%" . keywords . "%' ";
 	}
 	if ($lx == "sname") {
		$sql = $sql . " and sname like '%" . $keywords . "%' ";
 	}
 	$sql = $sql . " order by id desc";

	$result = mysql_query($sql, $con);
	if ($result !== false) {
	    $rs = mysql_fetch_assoc($result);
	} else {
	    $rs = false;
	}
	
 	if ($rs !== false) {
    	do {
?>	
		<tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td><?php echo($rs["syear"]); ?></td>
          <td><?php echo($rs["smonth"]); ?></td>
          <td><?php echo($rs["sid"]); ?></td>
          <td><?php echo($rs["sname"]); ?></td>
          <td><?php echo($rs["stotal"]); ?></td>
          <td><img src="images/view.gif" align="absmiddle"><a href="salary.php?action=view&id=<?php echo($rs["id"]); ?>">详细</a> <img src="images/edit.gif" align="absmiddle"><a href="salary.php?action=edit&id=<?php echo($rs["id"]); ?>">修改</a> <img src="images/drop.gif" align="absmiddle"><a href="javascript:doEmpty('salary.php?work=del&id=<?php echo($rs["id"]); ?>&action=list&topage=<?php echo($intCurPage); ?>')">删除</a></td>
<?php
    	} while ($rs = mysql_fetch_assoc($result));
?>
		</tr>
		
<?php
	} else {
?>
        <tr align="center" bgcolor="#FFFFFF">
          <td colspan="8">对不起！目前库中还没有 <font color="#FF0000"><?php echo($syear); ?>-<?php echo($smonth); ?>-<?php echo($keywords); ?>-</font> 信息！</td>
        </tr>
<?php
	}
}
?>
      </table> 
    </td>
  </tr>
</table>
</body>
</html>
