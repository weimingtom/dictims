<!DOCtYPE html PUBLIC "-//W3C//Dtd html 4.01 transitional//EN" "http://www.w3c.org/tr/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>员工工资信息管理系统</title>
<meta http-equiv=Content-type content="text/html; charset=utf-8">
<STYLE type=text/css> 
body {FONt-SIZE: 12px; BACKGROUND: #E8F2FB; COLOR: #333; MARGIN: 80px;}
.bt{ font-size:24px; color:#FFFFFF; text-align:center; font-weight:bold}
.btn {
	BORDER-RIGHT: #0033cc 1px solid; BORDER-TOP: #00ccff 1px solid; FONT-SIZE: 12px; BORDER-LEFT: #00ccff 1px solid; CURSOR: hand; COLOR: #ffffff; BORDER-BOTTOM: #0033cc 1px solid; FONT-FAMILY: "宋体"; BACKGROUND-COLOR: #0099ff
}
</STYLE>
<script language="JavaScript">
<!--
function chk(theForm)
{
if (theForm.admin_name.value == "")
{
alert("请输入管理帐号！");
theForm.admin_name.focus();
return (false);
}
if (theForm.admin_pass.value == "")
{
alert("请输入管理密码！");
theForm.admin_pass.focus();
return (false);
}

return true;
}
//-->
</script>
</head>
<body>
<table cellSpacing=1 cellPadding=5 width=460 align=center bgColor=#b9b0a9 border=0>
 <FORM action="check.php?action=login" method="post" onsubmit="return chk(this)">
  <tbody>
  <tr>
    <td vAlign=top bgColor=#ffffff>
      <table cellSpacing=0 cellPadding=0 width="100%" border=0>
        <tbody>
        <tr><td width=460 background=images/login_top.jpg height=54 class="bt">员工工资信息管理系统后台</td></tr>
        <tr>
          <td bgColor=#FFFFFF height=150>
            <table height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
              <tbody>
              <tr>
                <td align=middle width="40%"><IMG height=90 src="images/login.gif" width=91></td>
                <td>
                  <table cellSpacing=1 cellPadding=2 width="100%" align=center border=0>
                    <tbody>
                    <tr>
                      <td align=right width=60 height=30>用户名：</td>
                      <td height=30><input id="admin_name" name="admin_name" value="admin"> </td></tr>
                    <tr>
                      <td align=right height=30>密&nbsp;&nbsp;码：</td>
                      <td height=30><input id="admin_pass" type="password" name="admin_pass" value="admin"> </td></tr>
                    <tr>
                      <td align=right>验证码：</td>
                      <td><input class=pwd id="verifycode" style="width: 40px" maxlength=4 name="verifycode"><img src="yz.php" border='0' onclick="this.src='yz.php'" alt='点击刷新验证码' /></td></tr>
                    <tr align=middle>
                      <td colspan=2 height=40><input class="btn" type="submit" value="提 交" name="Submit"> <input  class="btn" type="reset" value="取 消" name="reset"></td>
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
	</td>
   </tr></FORM>
   </tbody>
  </table>
</body>
</html>
