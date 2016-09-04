<?php include('inc/right.php'); ?> 
<?php include('inc/conn.php'); ?> 
<?php
if (isset($_REQUEST["wor"]) and $_REQUEST["wor"] == "del") {
	$id = $_REQUEST["id"];
	$idArr = explode(",", $id);
	for ($i = 0; $i < count($idArr); $i++) {
		$sql = "delete from Salary where id=" . trim($idArr[$i]);
		mysql_query($sql, $con);
	}
}
?>
<?php
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
if ($action == "yes") {
	if ($id == "") {
		$sql = "select syear,smonth,sname from salary where syear='" .
			 trim($_REQUEST["syear"]) . 
			 "' and Smonth='" .
			 trim($_REQUEST["smonth"]) .
			 "' and Sid='" . 
			 trim($_REQUEST["sid"]) .
			 "'";
		$result = mysql_query($sql, $con);
		$rsCheck = false;
		if ($result !== false) {
		    $rsCheck = mysql_fetch_assoc($result);
		} else {
		    $rsCheck = null;
		}
	    if ($rsCheck === false) {
	      	die("<script language='javascript'>alert(' " . trim($_REQUEST["syear"]) . "年" . trim($_REQUEST["Smonth"]) . "月 " . trim($_REQUEST["sname"]) . " 工资已存在，请检查！');history.back(-1);</script>");
	    }
	   	$sql = "insert into salary (sid,sname,syear,smonth,basic,perform,jt,bt,gjj,lb,yb,qt,stotal,`addtime`) values (" .
			"'" . $_REQUEST["sid"] . "'," .
			"'" . $_REQUEST["sname"] . "'," .
			"'" . $_REQUEST["syear"] . "'," .
			"'" . $_REQUEST["smonth"] . "'," .
			"'" . $_REQUEST["basic"] . "'," .
			"'" . $_REQUEST["perform"] . "'," .
			"'" . $_REQUEST["jt"] . "'," .
			"'" . $_REQUEST["bt"] . "'," .
			"'" . $_REQUEST["gjj"] . "'," .
			"'" . $_REQUEST["lb"] . "'," .
			"'" . $_REQUEST["yb"] . "'," .
			"'" . $_REQUEST["qt"] . "'," .
			"'" . $_REQUEST["stotal"] . "'," .
			"'" . $_REQUEST["addtime"] . "')"; 
	} else {
	   	$sql = "update salary set " . 
	   		"sid='" . $_REQUEST["sid"] . "'," .
			"sname='" . $_REQUEST["sname"] . "'," .
			"syear='" . $_REQUEST["syear"] . "'," .
			"smonth='" . $_REQUEST["smonth"] . "'," .
			"basic='" . $_REQUEST["basic"] . "'," .
			"perform='" . $_REQUEST["perform"] . "'," .
			"jt='" . $_REQUEST["jt"] . "'," .
			"bt='" . $_REQUEST["bt"] . "'," .
			"gjj='" . $_REQUEST["gjj"] . "'," .
			"lb='" . $_REQUEST["lb"] . "'," .
			"yb='" . $_REQUEST["yb"] . "'," .
			"qt='" . $_REQUEST["qt"] . "'," .
			"stotal='" . $_REQUEST["stotal"] . "'," .
			"`addtime`='" . $_REQUEST["addtime"] . "' " .
	   		" where id=" . $id . ""; 
	}
	mysql_query($sql, $con);
	//echo($sql);
	header('location:?action=list');
	exit;
}
?>
<html>
<head>
<title>员工工资信息管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="images/main.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript">
function checkAll(form) {
	for (var i=0;i<form.elements.length;i++){
		var e = form.elements[i];
		if (e.name != 'chkall') {
			e.checked = form.chkall.checked;
		}
	}
}

function doEmpty(params) {
	if (confirm("真的要删除这条记录吗？删除后此记录里的所有内容都将被删除并且无法恢复！")) {
		window.location = params ;
	}
}
</script>
<script language="javascript" type="text/javascript">
<!--
function check() {
	if (document.add.sid.value=="") {
    	alert("请填写职员工号！");
      	document.add.sid.focus();
      	document.add.sid.select();
      	return;
  	}
  	if (document.add.sname.value=="") {
     	alert("请填写职员姓名！");
      	document.add.sname.focus();
      	document.add.sname.select();
      	return;
  	}
  	if (document.add.syear.value=="") {
      	alert("请填写工资年份！");
      	document.add.syear.focus();
      	document.add.syear.select();
      	return;
    }
  	if (document.add.smonth.value=="") {
      	alert("请填写工资月份！");
      	document.add.smonth.focus();
      	document.add.smonth.select();
      	return;
	}
  	if (document.add.basic.value=="") {
      	alert("请填写基本工资！");
      	document.add.Basic.focus();
      	document.add.Basic.select();
      	return;
    }
	if (document.add.stotal.value=="") {
      	alert("请填写工资合计！");
      	document.add.stotal.focus();
      	document.add.stotal.select();
      	return;
	}	 
	document.add.submit();
}

function changeN() {
	add.spec.disabled=true;
}
 
function changeY() {
  	add.spec.disabled=false;
}
 
function next() {
  	if(event.keyCode==13) {
		event.keyCode=9;
  	}
}
-->
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td bgcolor="#FFFFFF">
<?php 
if ($action == "add") { 
?><BR>
	<table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
      <form id="add" name="add" method="post" action="salary.php">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="10"  class="optiontitle"> 添加工资 </td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td width="10%" align="right">职员工号</td>
          <td align="left" colspan="9"><input name="sid" type="text" id="sid" onKeyDown="next()" >
            按回车\TAB键即可输入下一选项</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="10%" align="right">职员姓名</td>
          <td align="left" colspan="9"><input name="sname" type="text" id="sname" onKeyDown="next()" ></td>
        </tr>
        <tr bgcolor='#FFFFFF'>
          <td align='right'> 工资年月</td>
          <td colspan="9"><input name="syear" type="text" id="syear" onKeyDown="next()" value="<?php echo(date("Y")); ?>" size="5" maxlength="4" >年
            <input name="smonth" type="text" id="smonth" onKeyDown="next()" value="<?php echo(date("m")); ?>" size="3" maxlength="2" >月</td>
        </tr>
        <tr align='center' bgcolor='#F2FDFF'>
          <td align="right">工资详单</td>
          <td>基本工资</td>
          <td>绩效</td>
          <td>津贴</td>
          <td>补贴</td>
          <td>公积金</td>
          <td>养老保险</td>
          <td>医疗保险</td>
          <td>其它</td>
          <td>工资合计</td>
        </tr>
        <tr bgcolor='#FFFFFF'>
          <td align="right">所发金额</td>
          <td><input name="basic" type="text" id="basic" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="perform" type="text" id="perform" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="jt" type="text" id="jt" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="bt" type="text" id="bt" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="gjj" type="text" id="gjj" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="lb" type="text" id="lb" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="yb" type="text" id="yb" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="qt" type="text" id="q" onKeyDown="next()" size="10" maxlength="6" ></td>
          <td><input name="stotal" type="text" itd="stotal" onKeyDown="next()" size="10" maxlength="10" ></td>
	    </tr>
        <tr bgcolor='#FFFFFF'>
          <td colspan="1" align='right'> 添加时间</td>
          <td colspan="9"><input name="addtime" type="text" id="addtime" value="<?php echo(date('Y-m-d H:i:s', time())); ?>" onKeyDown="next()" ></td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="10" ><input type="hidden" name="action" value="yes">
              <input type="button" name="submit_btn" value="提交" onclick="check()">
              <input type="button" name="submit_btn2" value="返回" onclick="history.back(-1)"></td>
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
      <table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="7"  class="optiontitle">职员工资列表</td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
		  <td width="40">选中</td>
          <td width="10%">年份</td>
          <td width="10%">月份</td>
          <td width="15%">职员工号</td>	
          <td width="15%">职员姓名</td>
          <td width="20%">合计工资</td>	
		  <td>执行操作</td>  
        </tr>	
<?php
	$sql="select * from salary order by id desc";
    $result = mysql_query($sql, $con);
    if ($result !== false) {
    	$rsRows = mysql_num_rows($result);
        $rs = mysql_fetch_assoc($result);
    } else {
    	$rsRows = 0;
        $rs = false;
    }
 	if ($rs !== false) {
 		$proCount = $rsRows;
		$rsPageSize = 15; // 定义显示数目
		$rsPageCount = ceil($rsRows / $rsPageSize);
		if (isset($_REQUEST["topage"])) {
		    $toPage = intval($_REQUEST["topage"]);
			if ($toPage > $rsPageCount) {
			   	$rsAbsolutePage = $rsPageCount;
			   	mysql_data_seek($result, ($rsAbsolutePage - 1) * $rsPageSize);
			   	$intCurPage = $rsPageCount;
			} else if ($toPage <= 0) {
			   	$rsAbsolutePage = 1;
				mysql_data_seek($result, ($rsAbsolutePage - 1) * $rsPageSize);
			   	$intCurPage = 1;
			} else {
			   	$rsAbsolutePage = $toPage;
			   	mysql_data_seek($result, ($rsAbsolutePage - 1) * $rsPageSize);
			   	$intCurPage = $toPage;
			}
		 } else {
			$rsAbsolutePage = 1;
			mysql_data_seek($result, ($rsAbsolutePage - 1) * $rsPageSize);
			$intCurPage = 1;
		 }
		 $intCurPage = intval($intCurPage);
		 for ($i = 0; $i < $rsPageSize; $i++) {
		 	 $rs = mysql_fetch_assoc($result);
		     if ($rs === false) {     
			 	break; 
			 }
?>
        <form id="del" name="del" action="" method="post">
        <tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td><input type="checkbox" name="id" value="<?php echo($rs["id"]); ?>"></td>
		  <td><?php echo($rs["syear"]); ?></td>
          <td><?php echo($rs["smonth"]); ?></td>
          <td><?php echo($rs["sid"]); ?></td>
          <td><?php echo($rs["sname"]); ?></td>
          <td><?php echo($rs["stotal"]); ?></td>
          <td><img src="images/view.gif" align="absmiddle"><a href="?action=view&id=<?php echo($rs["id"]); ?>">详细</a> <img src="images/edit.gif" align="absmiddle"><a href="?action=edit&id=<?php echo($rs["id"]); ?>">修改</a> <img src="images/drop.gif" align="absmiddle"><a href="javascript:doEmpty('?wor=del&id=<?php echo($rs["id"]); ?>&action=list&topage=<?php echo($intCurPage); ?>')">删除</a></td>
        </tr>
<?php
		}
?>
		<tr bgcolor="#ffffff">
		  <td colspan="12">&nbsp;&nbsp;
		   <input name="chkall" type="checkbox" id="chkall" value="select" onclick="checkAll(this.form)"> 全选
		   <input name="wor" type="hidden" id="wor" value="del" />
		   <input type="submit" name="submit3" value="删除所选" onclick="{if(confirm('确定要删除记录吗？删除后将被无法恢复！')){return true;}return false;}" />
		  </td>
		</tr>
		</form>
        <tr align="center" bgcolor="#ebf0f7">
          <td colspan="7"> 总共：<font color="#ff0000"><?php echo($rsPageCount); ?></font>页, <font color="#ff0000"><?php echo($proCount); ?></font>条工资信息, 当前页<font color="#ff0000"><?php echo($intCurPage); ?> </font><?php if ($intCurPage != 1) { ?><a href="?action=list">首页</a>|<a href="?action=list&topage=<?php echo($intCurPage - 1); ?>">上一页</a>|<?php }
if ($intCurPage != $rsPageCount) { ?><a href="?action=list&topage=<?php echo($intCurPage + 1); ?>">下一页</a>|<a href="?action=list&topage=<?php echo($rsPageCount); ?>"> 最后页</a><?php } ?></span></td>
        </tr>
<?php
	} else {
?>
        <tr align="center" bgcolor="#ffffff">
          <td colspan="7">对不起！目前数据库中还没有添加职员工资！</td>
        </tr>
<?php
	}
?>
      </table>
	  <br>
<?php
}
?>
<?php
if ($action == "view") {
	$sql = "select * from Salary where id=" . $_REQUEST["id"];
    $result = mysql_query($sql, $con);
    if ($result !== false) {
        $rs = mysql_fetch_assoc($result);
    } else {
        $rs = null;
    }
	if ($rs) {
?>
<br>
	  <table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="10"  class="optiontitle"> 查看工资 </td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td width="10%" align="right">职员工号</td>
          <td align="left" colspan="9"><?php echo($rs["sid"]); ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="10%" align="right">职员姓名</td>
          <td align="left" colspan="9"><?php echo($rs["sname"]); ?></td>
        </tr>
        <tr bgcolor='#FFFFFF'>
          <td align='right'> 工资年月</td>
          <td colspan="9"><?php echo($rs["syear"]); ?>年<?php echo($rs["smonth"]); ?>月</td>
        </tr>
        <tr bgcolor='#F2FDFF' align="center">
          <td align="right">工资详单</td>
          <td>基本工资</td>
          <td>绩效</td>
          <td>津贴</td>
          <td>补贴</td>
          <td>公积金</td>
          <td>养老保险</td>
          <td>医疗保险</td>
          <td>其它</td>
          <td>工资合计</td>
        </tr>
        <tr bgcolor='#FFFFFF' align="center">
          <td align="right">所发金额</td>
          <td><?php echo($rs["basic"]); ?></td>
          <td><?php echo($rs["perform"]); ?></td>
          <td><?php echo($rs["jt"]); ?></td>
          <td><?php echo($rs["bt"]); ?></td>
          <td><?php echo($rs["gjj"]); ?></td>
          <td><?php echo($rs["lb"]); ?></td>
          <td><?php echo($rs["yb"]); ?></td>
          <td><?php echo($rs["qt"]); ?></td>
          <td><?php echo($rs["stotal"]); ?></td>
	    </tr>
        <tr bgcolor='#FFFFFF'>
          <td colspan="1" align='right' bgcolor="#FFFFFF"> 添加时间</td>
          <td colspan="9"><?php echo($rs["addtime"]); ?></td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td colspan="10" >
              <input type="button" name="submit4" value="返回" onclick="history.back(-1)"><input name="id" type="hidden" id="id" value="<?php echo($rs["id"]); ?>"></td>
        </tr>
	  </table>
<?php
	}
}
?>

<br>
<?php
if ($action == "edit") {
	$sql = "select * from salary where id=" . $_REQUEST["id"];
    $result = mysql_query($sql, $con);
    if ($result !== false) {
        $rs = mysql_fetch_assoc($result);
    } else {
        $rs = false;
    }
	if ($rs !== false) {
?>
	  <table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
      <form id="add" name="add" method="post" action="salary.php">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="10"  class="optiontitle"> 修改工资 </td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
          <td width="10%" align="right">职员工号</td>
          <td align="left" colspan="9"><input name="sid" type="text" id="sid" onKeyDown="next()" value="<?php echo($rs["sid"]); ?>" >
            按回车\TAB键即可输入下一选项</td>
        </tr>
        <tr align="center" bgcolor="#F2FDFF">
          <td width="10%" align="right">职员姓名</td>
          <td align="left" colspan="9"><input name="sname" type="text" id="sname" onKeyDown="next()" value="<?php echo($rs["sname"]); ?>" ></td>
        </tr>
        <tr bgcolor='#FFFFFF'>
          <td align='right' bgcolor="#FFFFFF"> 工资年月</td>
          <td colspan="9"><input name="syear" type="text" id="syear" onKeyDown="next()" value="<?php echo($rs["syear"]); ?>" size="5" maxlength="4" >年
            <input name="smonth" type="text" id="smonth" onKeyDown="next()" value="<?php echo($rs["smonth"]); ?>" size="3" maxlength="2" >月</td>
        </tr>
        <tr align='center' bgcolor='#F2FDFF'>
          <td align="right">工资详单</td>
          <td>基本工资</td>
          <td bgcolor="#F2FDFF">绩效</td>
          <td>津贴</td>
          <td>补贴</td>
          <td>公积金</td>
          <td>养老保险</td>
          <td>医疗保险</td>
          <td>其它</td>
          <td>工资合计</td>
        </tr>
        <tr align='center' bgcolor='#FFFFFF'>
          <td align="right">所发金额</td>
          <td><input name="basic" type="text" id="basic" onKeyDown="next()" value="<?php echo($rs["basic"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="perform" type="text" id="perform" onKeyDown="next()" value="<?php echo($rs["perform"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="jt" type="text" id="jt" onKeyDown="next()" value="<?php echo($rs["jt"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="bt" type="text" id="bt" onKeyDown="next()" value="<?php echo($rs["bt"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="gjj" type="text" id="gjj" onKeyDown="next()" value="<?php echo($rs["gjj"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="lb" type="text" id="lb" onKeyDown="next()" value="<?php echo($rs["lb"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="yb" type="text" id="yb" onKeyDown="next()" value="<?php echo($rs["yb"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="qt" type="text" id="qt" onKeyDown="next()" value="<?php echo($rs["qt"]); ?>" size="10" maxlength="6" ></td>
          <td><input name="stotal" type="text" id="stotal" onKeyDown="next()" value="<?php echo($rs["stotal"]); ?>" size="10" maxlength="10" ></td>
	    </tr>
        <tr bgcolor='#FFFFFF'>
          <td colspan="1" align='right' bgcolor="#FFFFFF"> 添加时间</td>
          <td colspan="9"><input name="addtime" type="text" id="addtime" value="<?php echo($rs["addtime"]); ?>" onKeyDown="next()" ></td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="10" ><input type="hidden" name="action" value="yes">
           <input type="button" name="submit3" value="提交" onclick="check()">
           <input type="button" name="submit4" value="返回" onclick="history.back(-1)"><input name="id" type="hidden" id="id" value="<?php echo($rs["id"]); ?>"></td>
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
