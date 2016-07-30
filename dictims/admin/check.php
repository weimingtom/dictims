<!--#include file="inc/conn.asp"-->
<!--#include file="inc/md5.asp"-->
<% 
dim verifycode,verifycode2
verifycode=Session("pSN")
verifycode2=trim(Request.Form("verifycode"))
if verifycode<>verifycode2 then
response.write"<SCRIPT language=JavaScript>alert('您输入的验证码不正确。注意：区分大小写 \n \n');"
response.write"location.href='Login.asp'</SCRIPT>"
founderr=true
else
session("pSN")=""
if request("action")="login" then
   Username=trim(request("admin_name"))
   Password=trim(request("admin_pass"))
end if
If Instr(Username,"or")<>0 or Instr(Password,"or")<>0 or Instr(Username,"and")<>0 or Instr(Password,"and")<>0Then
   response.write "<br><br><br><br><font size=2><center>没事别搞人家后台，谢谢！</font>"
else
set rs=server.createobject("adodb.recordset")
sql="select * from admin where Username='"&Username&"' and Password='"&md5(Password)&"'"
rs.open sql,conn,1,3
    if rs.eof then
        response.write"<SCRIPT language=JavaScript>alert('您输入的用户名或密码有误。返回重新输入!');"
        response.write"location.href='Login.asp'</SCRIPT>"
    else
		rs("LastLoginIP")=Request.ServerVariables("REMOTE_ADDR")
		rs("LastLoginTime")=now()
		rs.update
        session("admin_name")=request("admin_name")
        response.redirect "index.asp"
	end if 
rs.close
set rs=nothing
conn.close
set conn=nothing
end if
end if
%>
