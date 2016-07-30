<?php include('inc/right.php'); ?> 
<?php include('inc/conn.php'); ?> 
<%
if Request("wor")="del" then
id=request("id")
idArr=split(id,",")
for i=0 to ubound(idArr)
sql="delete from Staff where id="&trim(idArr(i))
conn.execute(sql)
next
end if
%>
<%
IF Request("work")="del" Then
sql="delete from Staff where id="&Request("id")
Conn.execute(sql)
Response.Redirect "?action=list"
End IF
%>
<%
action=Request("action")
id=Request("id")
if action="yes" Then
 set rs=server.createobject("adodb.recordset") 
if id="" then
   set rsCheck = conn.execute("select Sid from Staff where Sid='" & trim(Request.Form("Sid")) & "'")
     if not (rsCheck.bof and rsCheck.eof) then
      response.write "<script language='javascript'>alert('职员工号" & trim(Request.Form("Sid")) & " 已存在，请检查！');history.back(-1);</script>"
      response.end
     end if
   set rsCheck=nothing
   sql="select * from Staff" 
   rs.open sql,conn,3,3
   rs.addnew 
else
   sql="select * from Staff where id="&id&"" 
   rs.open sql,conn,1,2
end if
rs("Sid")=Request("Sid")
rs("Pws")=Request("Pws")
rs("Sname")=Request("Sname")
rs("State")=Request("State")
rs("Idcard")=Request("Idcard")
rs("Sex")=Request("Sex")
rs("Home")=Request("Home")
rs("National")=Request("National")
rs("Birth")=Request("Birth")
rs("Marriage")=Request("Marriage")
rs("Political")=Request("Political")
rs("Political_date")=Request("Political_date")
rs("Culture")=Request("Culture")
rs("School")=Request("School")
rs("Graduate")=Request("Graduate")
rs("Address")=Request("Address")
rs("Phone")=Request("Phone")
rs("Email")=Request("Email")
rs("IM")=Request("IM")
rs("Department")=Request("Department")
rs("Jobs")=Request("Jobs")
rs("Duty")=Request("Duty")
rs("Entrance")=Request("Entrance")
rs("Comment")=Request("Comment")
 rs.update
 rs.close
set rs=nothing
 Response.Redirect "?action=list"
end if
%>
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
	<%if action="add" then%><BR>
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
	<%end if%>
<br>
    <%if action="list" then%>
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
		
<%
sql="select * from Staff order by id desc"
 set rs=server.createobject("adodb.recordset") 
 rs.open sql,conn,1,1
 if not rs.eof then
 proCount=rs.recordcount
	rs.PageSize=10					  '定义显示数目
     if not IsEmpty(Request("ToPage")) then
	    ToPage=CInt(Request("ToPage"))
		if ToPage>rs.PageCount then
		   rs.AbsolutePage=rs.PageCount
		   intCurPage=rs.PageCount
		elseif ToPage<=0 then
		   rs.AbsolutePage=1
		   intCurPage=1
		else
		   rs.AbsolutePage=ToPage
		   intCurPage=ToPage
		end if
	 else
		rs.AbsolutePage=1
		intCurPage=1
	 end if
	 intCurPage=CInt(intCurPage)
	 For i = 1 to rs.PageSize
	 if rs.eof then     
	 Exit For 
	 end if
%>
        <form name="del" action="" method="post">
        <tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td><input type="checkbox" name="id" value="<%=rs("id")%>"></td>
		  <td><%=rs("Sid")%></td>
          <td><%=rs("Sex")%></td>
          <td><%=rs("Sname")%></td>
          <td><%=rs("Department")%></td>
          <td><%=rs("Jobs")%></td>
          <td><%=rs("State")%></td>
          <td><IMG src="images/view.gif" align="absmiddle"><a href="?action=view&id=<%=rs("id")%>">详细</a> <IMG src="images/edit.gif" align="absmiddle"><a href="?action=edit&id=<%=rs("id")%>">修改</a> <IMG src="images/drop.gif" align="absmiddle"><a href="javascript:DoEmpty('?work=del&id=<%=rs("id")%>&action=list&ToPage=<%=intCurPage%>')">删除</a></td>
        </tr>
<%
rs.movenext 
next
%>
		<tr bgcolor="#ffffff">
		  <td colspan="8">&nbsp;&nbsp;
		   <input name="chkall" type="checkbox" id="chkall" value="select" onclick=CheckAll(this.form)> 全选
		   <input name="wor" type="hidden" id="wor" value="del" />
		   <input type="submit" name="Submit3" value="删除所选" onClick="{if(confirm('确定要删除记录吗？删除后将被无法恢复！')){return true;}return false;}" />
		  </td>
		</tr>
		</form>
        <tr align="center" bgcolor="#ebf0f7">
          <td colspan="8"> 总共<font color="#ff0000"><%=rs.PageCount%></font>页, <font color="#ff0000"><%=proCount%></font>个职员, 当前页<font color="#ff0000"><%=intCurPage%> </font><%if intCurPage<>1 then%><a href="?action=list">首页</a>|<a href="?action=list&ToPage=<%=intCurPage-1%>">上一页</a>|<% end if
if intCurPage<>rs.PageCount then %><a href="?action=list&ToPage=<%=intCurPage+1%>">下一页</a>|<a href="?action=list&ToPage=<%=rs.PageCount%>"> 最后页</a><% end if%></span></td>
        </tr>
<%
else
%>
        <tr align="center" bgcolor="#ffffff">
         <td colspan="8">对不起！目前数据库中还没有添加职员！</td>
        </tr>
<%
rs.close
set rs=nothing
end if
%>
      </table>
	  <br>
<%end if%>
<%if action="edit" then
set rs=server.createobject("adodb.recordset") 
sql="select * from Staff where id="&Request("id")
rs.open sql,conn,1,1
if not rs.eof Then
%>
	  <table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
       <form name="add" method="post" action="staff.php">
		<tr align="center" bgcolor="#F2FDFF">
		  <td colspan="12" class="optiontitle">修改职员</td>
		</tr>
        <tr bgcolor="#F2FDFF">
          <td width="10%" align="right"> 职员工号</td>
          <td width="15%"><input name="Sid" type="text" id="Sid" value="<%=rs("Sid")%>" size="10"> <font color="red">*</font></td>
          <td width="10%" align="right"> 职员姓名</td>
          <td width="15%"><input name="Sname" type="text" id="Sname" value="<%=rs("Sname")%>" size="18"> 
          <font color="red">*</font></td>
		  <td width="10%" align="right">查询密码</td>
          <td width="15%"><input name="Pws" type="text" id="Pws" value="<%=rs("Pws")%>" size="16">
            <font color="red">*</font></td>
          <td width="10%" align="right">职员状态</td>
          <td width="15%">
		  <select name="State" selfValue="职员状态">
   		    <option value="在职" <% if rs("State")="在职" Then Response.write("Selected")%>>在职</option>
   		    <option value="离职" <% if rs("State")="离职" Then Response.write("Selected")%>>离职</option>
   		    <option value="产假" <% if rs("State")="产假" Then Response.write("Selected")%>>产假</option>
   		    <option value="休假" <% if rs("State")="休假" Then Response.write("Selected")%>>休假</option>
  		  </select><font color="red">*</font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right">身份证号</td>
          <td ><input name="Idcard" type="text" id="Idcard" value="<%=rs("Idcard")%>" size="18">
            <font color="red">*</font></td>
          <td align="right">性别</td>
          <td><input type="radio" name="Sex" value="男"  <% if rs("Sex")="男"  then response.Write("checked") end if%>/>男 <input type="radio" name="Sex" value="女"  <% if rs("Sex")="女" then response.Write("checked") end if%> />女<font color="red">*</font></td>
          <td align="right">籍贯</td>
          <td><input name="Home" type="text" id="Home" value="<%=rs("Home")%>"></td>
          <td align="right">民族</td>
          <td><input name="National" type="text" id="National" value="<%=rs("National")%>"></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 出生年月</td>
          <td><input name="Birth" type="text" id="Birth" value="<%=rs("Birth")%>" size="18"></td>
          <td align="right">婚姻状况</td>
          <td>
		  <select name="Marriage" selfValue="婚姻状况">
   		    <option value="">请选择</option>
   		    <option value="未婚" <% if rs("Marriage")="未婚" Then Response.write("Selected")%>>未婚</option>
   		    <option value="已婚" <% if rs("Marriage")="已婚" Then Response.write("Selected")%>>已婚</option>
  		  </select></td>
          <td align="right" width="10%">政治面貌</td>
          <td>
		  <select name="Political" selfValue="政治面貌">
   		    <option value="">请选择</option>
   		    <option value="无" <% if rs("Political")="无" Then Response.write("Selected")%>>无</option>
   		    <option value="团员" <% if rs("Political")="团员" Then Response.write("Selected")%>>团员</option>
   		    <option value="党员" <% if rs("Political")="党员" Then Response.write("Selected")%>>党员</option>
   		    <option value="民主" <% if rs("Political")="民主" Then Response.write("Selected")%>>民主</option>
  		  </select> </td>
          <td align="right" width="10%">加入时间</td>
          <td><input name="Political_date" type="text" id="Political_date" value="<%=rs("Political_date")%>"></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 文化程度</td>
          <td><input name="Culture" type="text" id="Culture" value="<%=rs("Culture")%>" size="18"></td>
          <td align="right">毕业学校</td>
          <td><input name="School" type="text" id="School" value="<%=rs("School")%>"></td>
          <td align="right">毕业时间</td>
          <td><input name="Graduate" type="text" id="Graduate" value="<%=rs("Graduate")%>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 联系住址</td>
          <td><input name="Address" type="text" id="Address" value="<%=rs("Address")%>"></td>
          <td align="right">联系电话</td>
          <td><input name="Phone" type="text" id="Phone" value="<%=rs("Phone")%>"></td>
          <td align="right">Email</td>
          <td><input name="Email" type="text" id="Email" value="<%=rs("Email")%>"></td>
          <td align="right">聊天号</td>
          <td><input name="IM" type="text" id="IM" value="<%=rs("IM")%>"></td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td align="right"> 所在部门</td>
          <td><select name="Department" selfvalue="所在部门">
            <option value="">请选择</option>
            <option value="业务部" <% if rs("Department")="业务部" Then Response.write("Selected")%>>业务部</option>
            <option value="客服部" <% if rs("Department")="客服部" Then Response.write("Selected")%>>客服部</option>
            <option value="技术部" <% if rs("Department")="技术部" Then Response.write("Selected")%>>技术部</option>
          </select>
            <font color="red">*</font></td>
          <td align="right">担任职务</td>
          <td>
		  <select name="Jobs" selfValue="担任职务">
   		    <option value="">请选择</option>
   		    <option value="技术员" <% if rs("Jobs")="技术员" Then Response.write("Selected")%>>技术员</option>
   		    <option value="主管" <% if rs("Jobs")="主管" Then Response.write("Selected")%>>主管</option>
   		    <option value="经理" <% if rs("Jobs")="经理" Then Response.write("Selected")%>>经理</option>
  		  </select><font color="red">*</font></td>
          <td align="right">职称</td>
          <td><select name="Duty" selfvalue="职称">
            <option value="">请选择</option>
            <option value="初级" <% if rs("Duty")="初级" Then Response.write("Selected")%>>初级</option>
            <option value="中级" <% if rs("Duty")="中级" Then Response.write("Selected")%>>中级</option>
            <option value="高级" <% if rs("Duty")="高级" Then Response.write("Selected")%>>高级</option>
          </select>
            <font color="red">*</font></td>
          <td align="right">入职时间</td>
          <td><input name="Entrance" type="text" id="Entrance" value="<%=rs("Entrance")%>" size="18"> 
          <font color="red">*</font></td>
        </tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right"> 备注</td>
          <td colspan="7" align="left"><textarea name="Comment" cols="100" rows="5" id="Comment"><%=rs("Comment")%></textarea></td>
        </tr>
		<tr align="center" bgcolor="#ebf0f7">
		  <td colspan="12">
		  <input type="hidden" name="action" value="yes">
          <input type="button" name="Submit2" value="提交" onClick="check()">
          <input type="button" name="Submit2" value="返回" onClick="history.back(-1)">
		  <input name="id" type="hidden" id="id" value="<%=rs("id")%>">		  </td>
		</tr>
  		</form>
  	</table>
<%
end if
end if
%>
<br>
<%if action="view" then
set rs=server.createobject("adodb.recordset") 
sql="select * from Staff where id="&Request("id")
rs.open sql,conn,1,1
if not rs.eof Then
%>
	  <table width="98%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
		<tr align="center" bgcolor="#F2FDFF">
		  <td colspan="12" class="optiontitle">职员信息</td>
		</tr>
        <tr bgcolor="#F2FDFF">
          <td width="10%" align="right">职员工号</td>
          <td width="20%"><%=rs("Sid")%></td>
          <td width="10%" align="right">职员姓名</td>
          <td width="15%" ><%=rs("Sname")%></td>
          <td width="10%" align="right">查询密码</td>
          <td width="15%"><%=rs("Pws")%></td>
          <td width="10%" align="right">职员状态</td>
          <td width="10%"><%=rs("State")%></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right">身份证号</td>
          <td><%=rs("Idcard")%></td>
          <td align="right">性别</td>
          <td><%=rs("Sex")%></td>
          <td align="right">籍贯</td>
          <td><%=rs("Home")%></td>
          <td align="right">民族</td>
          <td><%=rs("National")%></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 出生年月</td>
          <td><%=rs("Birth")%></td>
          <td align="right">婚姻状况</td>
          <td><%=rs("Marriage")%></td>
          <td align="right" width="10%">政治面貌</td>
          <td><%=rs("Political")%></td>
          <td align="right" width="10%">加入时间</td>
          <td><%=rs("Political_date")%></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 文化程度</td>
          <td><%=rs("Culture")%></td>
          <td align="right">毕业学校</td>
          <td><%=rs("School")%></td>
          <td align="right">毕业时间</td>
          <td><%=rs("Graduate")%></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td align="right"> 联系住址</td>
          <td><%=rs("Address")%></td>
          <td align="right">联系电话</td>
          <td><%=rs("Phone")%></td>
          <td align="right">Email</td>
          <td><%=rs("Email")%></td>
          <td align="right">聊天号</td>
          <td><%=rs("IM")%></td>
        </tr>
        <tr bgcolor="#F2FDFF">
          <td align="right"> 所在部门</td>
          <td><%=rs("Department")%></td>
          <td align="right">担任职务</td>
          <td><%=rs("Jobs")%></td>
          <td align="right">职称</td>
          <td><%=rs("Duty")%></td>
          <td align="right">入职时间</td>
          <td><%=rs("Entrance")%></td>
        </tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right"> 备注</td>
          <td colspan="7" align="left"><%=rs("Comment")%></td>
        </tr>
		<tr align="center" bgcolor="#ebf0f7">
		  <td colspan="12">
          <input type="button" name="Submit2" value="返回" onClick="history.back(-1)">		  </td>
		</tr>
  	</table>
<%
end if
end if
%>    
    </td>
  </tr>
</table>
</body>
</html>
