<?php include('inc/right.php'); ?> 
<?php include('inc/conn.php'); ?> 
<%
keywords=request("keywords")
LX=request("LX")
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>员工工资信息管理系统</title>
<link href="images/main.css" rel="stylesheet" type="text/css">
<script language=JavaScript>
<!--
function DoEmpty(params)
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
          <form name="search" method="get" action="staffsearch.php">
            <td height="30" colspan="8"> <strong>查找类别：</strong>
			<select name="LX">
             <option value="Sname">职员姓名</option>
             <option value="Sid">职员工号</option>
            </select>
			<input name="keywords" type="text" id="keywords" size="30"> 
            <input name="Query" type="submit" id="Query" value="查 询"></td>
          </form>
        </tr>  
<%
if keywords<>"" then
%>
	    <tr align="center" bgcolor="#ebf0f7">
          <td width="10%">职员工号</td>
          <td width="65%" colspan="5">职员信息</td>
          <td width="25%">执行操作</td>
        </tr>
<%
 if LX<>"" Then
   Select Case LX
     Case "Sid" 
   sql="select * from Staff where Sid like '%"&keywords&"%' order by id desc"
	 Case "Sname"
   sql="select * from Staff where Sname like '%"&keywords&"%' order by id desc"
   end select
 end if
 set rs=server.createobject("adodb.recordset") 
 rs.open sql,conn,1,1
 if not rs.eof Then
    proCount=rs.recordcount
    For i = 1 to proCount
    if rs.EOF then     
    Exit For 
    end if
%>
		<tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td><%=rs("Sid")%></td>
          <td><%=rs("Sex")%></td>
          <td><%=rs("Sname")%></td>
          <td><%=rs("Department")%></td>
          <td><%=rs("Jobs")%></td>
          <td><%=rs("State")%></td>
          <td><IMG src="images/view.gif" align="absmiddle"><a href="staff.php?action=view&id=<%=rs("id")%>">详细</a> <IMG src="images/edit.gif" align="absmiddle"><a href="staff.php?action=edit&id=<%=rs("id")%>">修改</a> <IMG src="images/drop.gif" align="absmiddle"><a href="javascript:DoEmpty('staff.php?work=del&id=<%=rs("id")%>&action=list&ToPage=<%=intCurPage%>')">删除</a></td>
<%
rs.MoveNext 
next
%>
		</tr>
		
<%
else
%>
        <tr align="center" bgcolor="#FFFFFF">
          <td colspan="8">对不起！目前库中还没有 <font color="#FF0000"><%=keywords%></font> 信息！</td>
        </tr>
<%
end if
rs.close
set rs=nothing
end if
%>
      </table> 
    </td>
  </tr>
</table>
</body>
</html>
