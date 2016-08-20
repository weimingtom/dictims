<?php include('inc/right.php'); ?> 
<?php include('inc/conn.php'); ?> 
<?php
$keywords = isset($_REQUEST["keywords"]) ? $_REQUEST["keywords"] : "";
$lx = isset($_REQUEST["lx"]) ? $_REQUEST["lx"] : "";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>员工工资信息管理系统</title>
<link href="images/main.css" rel="stylesheet" type="text/css">
<script language=JavaScript>
<!--
function doEmpty(params)
{
if (confirm("真的要删除这条记录吗？删除后此记录里的所有内容都将被删除并且无法恢复！"))
alert("删除信息成功\n 返回信息列表")
window.location = params ;
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
          <td class="optiontitle" colspan="8">查询职员信息</td>	
        </tr>
        <tr align="center" bgcolor="#FFFFFF">
          <form id="search" name="search" method="get" action="staffsearch.php">
            <td height="30" colspan="8"> <strong>查找类别：</strong>
			<select name="lx">
             <option value="sname">职员姓名</option>
             <option value="sid">职员工号</option>
            </select>
			<input name="keywords" type="text" id="keywords" size="30"> 
            <input name="query" type="submit" id="query" value="查 询"></td>
          </form>
        </tr>  
<?php
if ($keywords != "") {
?>
	    <tr align="center" bgcolor="#ebf0f7">
          <td width="10%">职员工号</td>
          <td width="65%" colspan="5">职员信息</td>
          <td width="25%">执行操作</td>
        </tr>
<?php
	if ($lx != "") {
		if ($lx == "Sid") { 
	   		$sql = "select * from staff where sid like '%" . 
	   			keywords . 
	   			"%' order by id desc";
		} else if ($lx == "Sname") {
	   		$sql = "select * from staff where sname like '%" . 
	   			keywords . 
	   			"%' order by id desc";
	   	}
 	}
	$result = mysql_query($sql, $con);
	if ($result !== false) {
	    $rs = mysql_fetch_assoc($result);
	} else {
	    $rs = null;
	}
	if (!rs) {
		do {
?>
		<tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td><?php echo($rs["sid"]); ?></td>
          <td><?php echo($rs["sex"]); ?></td>
          <td><?php echo($rs["sname"]); ?></td>
          <td><?php echo($rs["department"]); ?></td>
          <td><?php echo($rs["jobs"]); ?></td>
          <td><?php echo($rs["state"]); ?></td>
          <td><IMG src="images/view.gif" align="absmiddle"><a href="staff.php?action=view&id=<?php echo($rs["id"]); ?>">详细</a> <IMG src="images/edit.gif" align="absmiddle"><a href="staff.php?action=edit&id=<?php echo($rs["id"]); ?>">修改</a> <IMG src="images/drop.gif" align="absmiddle"><a href="javascript:doEmpty('staff.php?work=del&id=<?php echo($rs["id"]); ?>&action=list&ToPage=<?php echo($intCurPage); ?>')">删除</a></td>
<?php
		} while ($rs = mysql_fetch_assoc($result));
?>
		</tr>
		
<?php
	} else {
?>
        <tr align="center" bgcolor="#FFFFFF">
          <td colspan="8">对不起！目前库中还没有 <font color="#FF0000"><?php echo($keywords); ?></font> 信息！</td>
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
