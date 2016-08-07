<?php include('inc/right.php'); ?> 
<?php include('inc/conn.php'); ?> 
<?php
if (!empty($_REQUEST["wor"]) and $_REQUEST["wor"] == "del") {
	$id = $_REQUEST["id"];
	$idArr = explode(",", $id);
	for ($i = 0; i < count($idArr); $i++) {
		$sql = "delete from Staff where id=" . trim($idArr($i));
		mysql_query($sql, $con);
	}
}
?>
<?php
if (!empty($_REQUEST["work"]) and $_REQUEST["work"] == "del") {
	$sql = "delete from Staff where id=" . $_REQUEST["id"];
	mysql_query($sql, $con);
	header('location:?action=list');
}
?>
<?php
$action = !empty($_REQUEST["action"]) ? $_REQUEST["action"] : "";
$id = !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
if ($action == "yes") {
 	if ($id == "") {
	   $sql = "select sid from staff where sid='" .
	   		trim($_REQUEST["sid"]) . "'";
	   if (!rsCheck) {
	      die("<script language='javascript'>alert('职员工号" . trim($_REQUEST["sid"]) . " 已存在，请检查！');history.back(-1);</script>");
	   }
	   $sql = "insert into staff (sid,pws,sname,state,idcard,sex,home,national,birth,marriage,political,political_date,culture,school,graduate,address,phone,email,im,department,jobs,duty,entrance,comment) values (" . 
	   		"'" . $_REQUEST["sid"] . "'," .
	   		"'" . $_REQUEST["pws"] . "'," .
	   		"'" . $_REQUEST["sname"] . "'," .
	   		"'" . $_REQUEST["state"] . "'," .
	   		"'" . $_REQUEST["idcard"] . "'," .
	   		"'" . $_REQUEST["sex"] . "'," .
	   		"'" . $_REQUEST["home"] . "'," .
	   		"'" . $_REQUEST["national"] . "'," .
	   		"'" . $_REQUEST["birth"] . "'," .
	   		"'" . $_REQUEST["marriage"] . "'," .
	   		"'" . $_REQUEST["political"] . "'," .
	   		"'" . $_REQUEST["political_date"] . "'," .
	   		"'" . $_REQUEST["culture"] . "'," .
	   		"'" . $_REQUEST["school"] . "'," .
	   		"'" . $_REQUEST["graduate"] . "'," .
	   		"'" . $_REQUEST["address"] . "'," .
	   		"'" . $_REQUEST["phone"] . "'," .
	   		"'" . $_REQUEST["email"] . "'," .
	   		"'" . $_REQUEST["im"] . "'," .
	   		"'" . $_REQUEST["department"] . "'," .
	   		"'" . $_REQUEST["jobs"] . "'," .
	   		"'" . $_REQUEST["duty"] . "'," .
	   		"'" . $_REQUEST["entrance"] . "'," .
	   		"'" . $_REQUEST["comment"] . "')";
	} else {
	   $sql="update from staff set " . 	   		"'" . $_REQUEST["sid"] . "'," .
	   		"pws='" . $_REQUEST["pws"] . "'," .
	   		"sname='" . $_REQUEST["sname"] . "'," .
	   		"state='" . $_REQUEST["state"] . "'," .
	   		"idcard='" . $_REQUEST["idcard"] . "'," .
	   		"sex='" . $_REQUEST["sex"] . "'," .
	   		"home='" . $_REQUEST["home"] . "'," .
	   		"national='" . $_REQUEST["national"] . "'," .
	   		"birth='" . $_REQUEST["birth"] . "'," .
	   		"marriage='" . $_REQUEST["marriage"] . "'," .
	   		"political='" . $_REQUEST["political"] . "'," .
	   		"political_date='" . $_REQUEST["political_date"] . "'," .
	   		"culture='" . $_REQUEST["culture"] . "'," .
	   		"school='" . $_REQUEST["school"] . "'," .
	   		"graduate='" . $_REQUEST["graduate"] . "'," .
	   		"address='" . $_REQUEST["address"] . "'," .
	   		"phone='" . $_REQUEST["phone"] . "'," .
	   		"email='" . $_REQUEST["email"] . "'," .
	   		"im='" . $_REQUEST["im"] . "'," .
	   		"department='" . $_REQUEST["department"] . "'," .
	   		"jobs='" . $_REQUEST["jobs"] . "'," .
	   		"duty='" . $_REQUEST["duty"] . "'," .
	   		"entrance='" . $_REQUEST["entrance"] . "'," .
	   		"comment='" . $_REQUEST["comment"] . "'" .
	   	" where id=" . $id . ""; 
	   //rs.open sql,conn,1,2
	}

	//rs.update
	//rs.close
	//set rs=nothing
	header('location:?action=list');
}
?>
<html>
<head>
<title>员工工资信息管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="images/main.css" rel="stylesheet" type="text/css">
<script language=JavaScript type=text/JavaScript>
function CheckAll(form)
{for (var i=0;i<form.elements.length;i++){
var e = form.elements[i];
if (e.name != 'chkall') e.checked = form.chkall.checked;
}
}

function DoEmpty(params)
{
if (confirm("真的要删除这条记录吗？删除后此记录里的所有内容都将被删除并且无法恢复！"))
window.location = params ;
}
</script>
<script language=JavaScript type=text/JavaScript>
function check()
{
  if (document.add.Sid.value=="")
     {
      alert("请填写职员工号！")
      document.add.Sid.focus()
      document.add.Sid.select()
      return
     } 
	 
  if (document.add.Pws.value=="")
     {
      alert("请填写职员查询密码！")
      document.add.Pws.focus()
      document.add.Pws.select()
      return
     } 

  if (document.add.State.value=="")
     {
      alert("请填写职员状态！")
      document.add.State.focus()
      document.add.State.select()
      return
     } 
	 
  if (document.add.Sname.value=="")
     {
      alert("请填写职员姓名！")
      document.add.Sname.focus()
      document.add.Sname.select()
      return
     } 

  if (document.add.Idcard.value=="")
     {
      alert("请填写职员身份证号！")
      document.add.Idcard.focus()
      document.add.Idcard.select()
      return
     } 
	 
  if (document.add.Sex.value=="")
     {
      alert("请填写职员性别！")
      document.add.Sex.focus()
      document.add.Sex.select()
      return
     } 
	 
  if (document.add.Department.value=="")
     {
      alert("请填写职员所在部门！")
      document.add.Department.focus()
      document.add.Department.select()
      return
     } 

  if (document.add.Jobs.value=="")
     {
      alert("请填写职员担任职务！")
      document.add.Jobs.focus()
      document.add.Jobs.select()
      return
     } 

  if (document.add.Duty.value=="")
     {
      alert("请填写职员职称！")
      document.add.Duty.focus()
      document.add.Duty.select()
      return
     } 
	 
  if (document.add.Entrance.value=="")
     {
      alert("请填写职员入职时间！")
      document.add.Entrance.focus()
      document.add.Entrance.select()
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
?><BR>
	<table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
      <form name="add" method="post" action="staff.php">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="8"  class="optiontitle">添加职员</td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td width="10%" align="right"> 职员工号</td>
          <td width="15%"><input name="Sid" type="text" id="Sid" value="" size="18">
              <font color="red">*</font></td>
          <td width="10%" align="right"> 职员姓名</td>
          <td width="15%" ><input name="Sname" type="text" id="Sname" value="" size="18">
              <font color="red">*</font></td>
          <td width="10%" align="right">查询密码</td>
          <td width="15%" ><input name="Pws" type="text" id="Pws" value="123456" size="18">
              <font color="red">*</font></td>
          <td width="10%" align="right">职员状态</td>
          <td width="15%"><select name="State" id="State" selfvalue="职员状态">
              <option value="在职">在职</option>
              <option value="离职">离职</option>
              <option value="产假">产假</option>
              <option value="休假">休假</option>
            </select>
              <font color="red">*</font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right">身份证号</td>
          <td ><input name="Idcard" type="text" id="Idcard" value="" size="18">
              <font color="red">*</font></td>
          <td align="right">性别</td>
          <td><input type="radio" name="Sex" value="男" />男<input type="radio" name="Sex" value="女" />女<font color="red">*</font></td>
          <td align="right">籍贯</td>
          <td><input name="Home" type="text" id="Home" value=""></td>
          <td align="right">民族</td>
          <td><input name="National" type="text" id="National" value=""></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 出生年月</td>
          <td><input name="Birth" type="text" id="Birth" value=""></td>
          <td align="right">婚姻状况</td>
          <td><select name="Marriage" id="Marriage" selfvalue="婚姻状况">
              <option value="">请选择</option>
              <option value="未婚">未婚</option>
              <option value="已婚">已婚</option>
          </select></td>
          <td align="right">政治面貌</td>
          <td><select name="Political" id="Political" selfvalue="政治面貌">
              <option value="">请选择</option>
              <option value="无">无</option>
              <option value="团员">团员</option>
              <option value="党员">党员</option>
              <option value="民主">民主</option>
            </select>          </td>
          <td align="right">加入时间</td>
          <td><input name="Political_date" type="text" id="Political_date" value=""></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 文化程度</td>
          <td><input name="Culture" type="text" id="Culture" value=""></td>
          <td align="right">毕业学校</td>
          <td><input name="School" type="text" id="School" value=""></td>
          <td align="right">毕业时间</td>
          <td><input name="Graduate" type="text" id="Graduate" value=""></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 联系住址</td>
          <td><input name="Address" type="text" id="Address" value=""></td>
          <td align="right">联系电话</td>
          <td><input name="Phone" type="text" id="Phone" value=""></td>
          <td align="right">Email</td>
          <td><input name="Email" type="text" id="Email" value=""></td>
          <td align="right">聊天号</td>
          <td><input name="IM" type="text" id="IM" value=""></td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td align="right"> 所在部门</td>
          <td><select name="Department" id="Department" selfvalue="所在部门">
              <option value="">请选择</option>
              <option value="业务部">业务部</option>
              <option value="客服部">客服部</option>
              <option value="技术部">技术部</option>
            </select>
              <font color="red">*</font></td>
          <td align="right">担任职务</td>
          <td><select name="Jobs" id="Jobs" selfvalue="担任职务">
              <option value="">请选择</option>
              <option value="技术员">技术员</option>
              <option value="主管">主管</option>
              <option value="经理">经理</option>
            </select>
              <font color="red">*</font></td>
          <td align="right">职称</td>
          <td><select name="Duty" id="Duty" selfvalue="职称">
              <option value="">请选择</option>
              <option value="初级">初级</option>
              <option value="中级">中级</option>
              <option value="高级">高级</option>
            </select>
              <font color="red">*</font></td>
          <td align="right">入职时间</td>
          <td><input name="Entrance" type="text" id="Entrance" size="18">
              <font color="red">*</font></td>
        </tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right"> 备注</td>
          <td colspan="7" align="left"><textarea name="Comment" cols="100" rows="5" id="Comment"></textarea></td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="8" ><input type="hidden" name="action" value="yes">
              <input type="button" name="Submit" value="提交" onClick="check()">
              <input type="button" name="Submit22" value="返回" onClick="history.back(-1)"></td>
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
          <td colspan="8"  class="optiontitle">职员列表</td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
		  <td width="40">选中</td>
          <td width="10%">职员工号</td>
          <td colspan="5">职员信息</td>
          <td width="20%">执行操作</td>
        </tr>
		
<?php
		$sql = "select * from Staff order by id desc";
		$result = mysql_query($sql, $con);
	    if ($result !== false) {
	        $rs = mysql_fetch_assoc($result);
	    } else {
	        $rs = null;
	    }
		if (!$rs) {
 			$proCount = $rs->recordcount;
			$rs->pageSize = 10;	//定义显示数目
		    if (!empty($_REQUEST["ToPage"])) {
			    $toPage = intval(Request("ToPage"));
				if ($toPage > $rs->pageCount) {
				   $rs->absolutePage = $rs->pageCount;
				   $intCurPage = $rs->pageCount;
				} else if ($ToPage <= 0) {
				   $rs->absolutePage = 1;
				   $intCurPage = 1;
				} else {
				   $rs->absolutePage = $toPage;
				   $intCurPage = $toPage;
				}
			 } else {
				$rs->absolutePage = 1;
				$intCurPage = 1;
			 }
			 $intCurPage = intval($intCurPage);
			 for ($i = 1; $i < $rs->pageSize; $i++) {
				 if (!$rs) {     
				 	break; 
				 }
?>
        <form name="del" action="" method="post">
        <tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td><input type="checkbox" name="id" value="<?php echo($rs["id"]); ?>"></td>
		  <td><?php echo($rs["sid"]); ?></td>
          <td><?php echo($rs["sex"]); ?></td>
          <td><?php echo($rs["sname"]); ?></td>
          <td><?php echo($rs["department"]); ?></td>
          <td><?php echo($rs["jobs"]); ?></td>
          <td><?php echo($rs["state"]); ?></td>
          <td><IMG src="images/view.gif" align="absmiddle"><a href="?action=view&id=<?php echo($rs["id"]); ?>">详细</a> <IMG src="images/edit.gif" align="absmiddle"><a href="?action=edit&id=<?php echo($rs["id"]); ?>">修改</a> <IMG src="images/drop.gif" align="absmiddle"><a href="javascript:DoEmpty('?work=del&id=<?php echo($rs["id"]); ?>&action=list&ToPage=<?php echo($intCurPage); ?>')">删除</a></td>
        </tr>
<?php
				//rs.movenext 
			}
?>
		<tr bgcolor="#ffffff">
		  <td colspan="8">&nbsp;&nbsp;
		   <input name="chkall" type="checkbox" id="chkall" value="select" onclick=CheckAll(this.form)> 全选
		   <input name="wor" type="hidden" id="wor" value="del" />
		   <input type="submit" name="Submit3" value="删除所选" onClick="{if(confirm('确定要删除记录吗？删除后将被无法恢复！')){return true;}return false;}" />
		  </td>
		</tr>
		</form>
        <tr align="center" bgcolor="#ebf0f7">
          <td colspan="8"> 总共<font color="#ff0000"><?php echo($rs.PageCount); ?></font>页, <font color="#ff0000"><?php echo($proCount); ?></font>个职员, 当前页<font color="#ff0000"><?php echo($intCurPage); ?> </font><?php if ($intCurPage != 1) { ?><a href="?action=list">首页</a>|<a href="?action=list&ToPage=<?php echo($intCurPage - 1); ?>">上一页</a>|<?php }
if ($intCurPage != $rs->pageCount) { ?><a href="?action=list&ToPage=<?php echo($intCurPage + 1); ?>">下一页</a>|<a href="?action=list&ToPage=<?php echo($rs->pageCount); ?>"> 最后页</a><?php } ?></span></td>
        </tr>
<?php
	} else {
?>
        <tr align="center" bgcolor="#ffffff">
         <td colspan="8">对不起！目前数据库中还没有添加职员！</td>
        </tr>
<?php
		//rs.close
		//set rs=nothing
	}
?>
      </table>
	  <br>
<?php
}
?>
<?php
if ($action == "edit") {
	$sql="select * from staff where id=" . $_REQUEST("id");
    $result = mysql_query($sql, $con);
    if ($result !== false) {
        $rs = mysql_fetch_assoc($result);
    } else {
        $rs = null;
    }
	if (!$rs) {
?>
	  <table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
       <form name="add" method="post" action="staff.php">
		<tr align="center" bgcolor="#F2FDFF">
		  <td colspan="12" class="optiontitle">修改职员</td>
		</tr>
        <tr bgcolor="#F2FDFF">
          <td width="10%" align="right"> 职员工号</td>
          <td width="15%"><input name="Sid" type="text" id="Sid" value="<?php echo($rs["sid"]); ?>" size="10"> <font color="red">*</font></td>
          <td width="10%" align="right"> 职员姓名</td>
          <td width="15%"><input name="Sname" type="text" id="Sname" value="<?php echo($rs["sname"]); ?>" size="18"> 
          <font color="red">*</font></td>
		  <td width="10%" align="right">查询密码</td>
          <td width="15%"><input name="Pws" type="text" id="Pws" value="<?php echo($rs["pws"]); ?>" size="16">
            <font color="red">*</font></td>
          <td width="10%" align="right">职员状态</td>
          <td width="15%">
		  <select name="State" selfValue="职员状态">
   		    <option value="在职" <?php if ($rs("state") == "在职") { echo("selected"); } ?>>在职</option>
   		    <option value="离职" <?php if ($rs("state") == "离职") { echo("selected"); } ?>>离职</option>
   		    <option value="产假" <?php if ($rs("state") == "产假") { echo("selected"); } ?>>产假</option>
   		    <option value="休假" <?php if ($rs("state") == "休假") { echo("selected"); } ?>>休假</option>
  		  </select><font color="red">*</font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right">身份证号</td>
          <td ><input name="Idcard" type="text" id="Idcard" value="<?php echo($rs["idcard"]); ?>" size="18">
            <font color="red">*</font></td>
          <td align="right">性别</td>
          <td><input type="radio" name="Sex" value="男"  <?php if ($rs["Sex"] == "男") { echo("checked"); } ?>/>男 <input type="radio" name="Sex" value="女"  <?php if ($rs["sex"] == "女") { echo("checked"); } ?> />女<font color="red">*</font></td>
          <td align="right">籍贯</td>
          <td><input name="Home" type="text" id="Home" value="<?php echo($rs["home"]); ?>"></td>
          <td align="right">民族</td>
          <td><input name="National" type="text" id="National" value="<?php echo($rs["national"]); ?>"></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 出生年月</td>
          <td><input name="Birth" type="text" id="Birth" value="<?php echo($rs["birth"]); ?>" size="18"></td>
          <td align="right">婚姻状况</td>
          <td>
		  <select name="Marriage" selfValue="婚姻状况">
   		    <option value="">请选择</option>
   		    <option value="未婚" <?php if ($rs["Marriage"] == "未婚") { echo("selected"); } ?>>未婚</option>
   		    <option value="已婚" <?php if ($rs["Marriage"] == "已婚") { echo("selected"); } ?>>已婚</option>
  		  </select></td>
          <td align="right" width="10%">政治面貌</td>
          <td>
		  <select name="Political" selfValue="政治面貌">
   		    <option value="">请选择</option>
   		    <option value="无" <?php if ($rs["Political"] == "无") { echo("selected"); } ?>>无</option>
   		    <option value="团员" <?php if ($rs["Political"] == "团员") { echo("selected"); } ?>>团员</option>
   		    <option value="党员" <?php if ($rs["Political"] == "党员") { echo("selected"); } ?>>党员</option>
   		    <option value="民主" <?php if ($rs["Political"] == "民主") { echo("selected"); } ?>>民主</option>
  		  </select> </td>
          <td align="right" width="10%">加入时间</td>
          <td><input name="Political_date" type="text" id="Political_date" value="<?php echo($rs["political_date"]); ?>"></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 文化程度</td>
          <td><input name="Culture" type="text" id="Culture" value="<?php echo($rs["culture"]); ?>" size="18"></td>
          <td align="right">毕业学校</td>
          <td><input name="School" type="text" id="School" value="<?php echo($rs["school"]); ?>"></td>
          <td align="right">毕业时间</td>
          <td><input name="Graduate" type="text" id="Graduate" value="<?php echo($rs["graduate"]); ?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 联系住址</td>
          <td><input name="Address" type="text" id="Address" value="<?php echo($rs["adress"]); ?>"></td>
          <td align="right">联系电话</td>
          <td><input name="Phone" type="text" id="Phone" value="<?php echo($rs["phone"]); ?>"></td>
          <td align="right">Email</td>
          <td><input name="Email" type="text" id="Email" value="<?php echo($rs["email"]); ?></td>
          <td align="right">聊天号</td>
          <td><input name="IM" type="text" id="IM" value="<?php echo($rs["im"]); ?></td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td align="right"> 所在部门</td>
          <td><select name="Department" selfvalue="所在部门">
            <option value="">请选择</option>
            <option value="业务部" <?php if ($rs["department"] == "业务部") { echo("Selected"); } ?>>业务部</option>
            <option value="客服部" <?php if ($rs["department"] == "客服部") { echo("Selected"); } ?>>客服部</option>
            <option value="技术部" <?php if ($rs["department"] == "技术部") { echo("Selected"); } ?>>技术部</option>
          </select>
            <font color="red">*</font></td>
          <td align="right">担任职务</td>
          <td>
		  <select name="Jobs" selfValue="担任职务">
   		    <option value="">请选择</option>
   		    <option value="技术员" <?php if ($rs["jobs"] == "技术员") { echo("selected"); } ?>>技术员</option>
   		    <option value="主管" <?php if ($rs["jobs"] == "主管") { echo("selected"); } ?>>主管</option>
   		    <option value="经理" <?php if ($rs["jobs"] == "经理") { echo("selected"); } ?>>经理</option>
  		  </select><font color="red">*</font></td>
          <td align="right">职称</td>
          <td><select name="Duty" selfvalue="职称">
            <option value="">请选择</option>
            <option value="初级" <?php if ($rs["duty"] == "初级") { echo("Selected"); } ?>>初级</option>
            <option value="中级" <?php if ($rs["duty"] == "中级") { echo("Selected"); } ?>>中级</option>
            <option value="高级" <?php if ($rs["duty"] == "高级") { echo("Selected"); } ?>>高级</option>
          </select>
            <font color="red">*</font></td>
          <td align="right">入职时间</td>
          <td><input name="Entrance" type="text" id="Entrance" value="<?php echo($rs["entrance"]); ?>" size="18"> 
          <font color="red">*</font></td>
        </tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right"> 备注</td>
          <td colspan="7" align="left"><textarea name="Comment" cols="100" rows="5" id="Comment"><?php echo($rs["comment"]); ?></textarea></td>
        </tr>
		<tr align="center" bgcolor="#ebf0f7">
		  <td colspan="12">
		  <input type="hidden" name="action" value="yes">
          <input type="button" name="Submit2" value="提交" onClick="check()">
          <input type="button" name="Submit2" value="返回" onClick="history.back(-1)">
		  <input name="id" type="hidden" id="id" value="<?php echo($rs["id"]); ?>">		  </td>
		</tr>
  		</form>
  	</table>
<?php
	}
}
?>
<br>
<?php
if ($action == "view") {
	$sql = "select * from Staff where id=" . $_REQUEST["id"];
    $result = mysql_query($sql, $con);
    if ($result !== false) {
        $rs = mysql_fetch_assoc($result);
    } else {
        $rs = null;
    }
	if (!$rs) {
?>
	  <table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
		<tr align="center" bgcolor="#F2FDFF">
		  <td colspan="12" class="optiontitle">职员信息</td>
		</tr>
        <tr bgcolor="#F2FDFF">
          <td width="10%" align="right">职员工号</td>
          <td width="20%"><?php echo($rs["sid"]); ?></td>
          <td width="10%" align="right">职员姓名</td>
          <td width="15%" ><?php echo($rs["sname"]); ?></td>
          <td width="10%" align="right">查询密码</td>
          <td width="15%"><?php echo($rs["pws"]); ?></td>
          <td width="10%" align="right">职员状态</td>
          <td width="10%"><?php echo($rs["state"]); ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right">身份证号</td>
          <td><?php echo($rs["idcard"]); ?></td>
          <td align="right">性别</td>
          <td><?php echo($rs["sex"]); ?></td>
          <td align="right">籍贯</td>
          <td><?php echo($rs["home"]); ?></td>
          <td align="right">民族</td>
          <td><?php echo($rs["national"]); ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 出生年月</td>
          <td><?php echo($rs["birth"]); ?></td>
          <td align="right">婚姻状况</td>
          <td><?php echo($rs["marriage"]); ?></td>
          <td align="right" width="10%">政治面貌</td>
          <td><?php echo($rs["political"]); ?></td>
          <td align="right" width="10%">加入时间</td>
          <td><?php echo($rs["political_date"]); ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 文化程度</td>
          <td><?php echo($rs["culture"]); ?></td>
          <td align="right">毕业学校</td>
          <td><?php echo($rs["school"]); ?></td>
          <td align="right">毕业时间</td>
          <td><?php echo($rs["graduate"]); ?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 联系住址</td>
          <td><?php echo($rs["addrss"]); ?></td>
          <td align="right">联系电话</td>
          <td><?php echo($rs["phone"]); ?></td>
          <td align="right">Email</td>
          <td><?php echo($rs["email"]); ?></td>
          <td align="right">聊天号</td>
          <td><?php echo($rs["im"]); ?></td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td align="right"> 所在部门</td>
          <td><?php echo($rs["department"]); ?></td>
          <td align="right">担任职务</td>
          <td><?php echo($rs["jobs"]); ?></td>
          <td align="right">职称</td>
          <td><?php echo($rs["duty"]); ?></td>
          <td align="right">入职时间</td>
          <td><?php echo($rs["entrance"]); ?></td>
        </tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right"> 备注</td>
          <td colspan="7" align="left"><?php echo($rs["comment"]); ?></td>
        </tr>
		<tr align="center" bgcolor="#ebf0f7">
		  <td colspan="12">
          <input type="button" name="Submit2" value="返回" onClick="history.back(-1)">		  </td>
		</tr>
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
