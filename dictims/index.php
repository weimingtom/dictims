<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd html 4.01 transitional//EN" "http://www.w3c.org/tr/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>员工工资信息管理系统</title>
<meta http-equiv=Content-type content="text/html; charset=utf-8">
<link href="images/css.css" rel="stylesheet" type="text/css">
<script language=javascript>
function check(){
    if (chaxun.sid.value == "" && chaxun.idcard.value == "") {
        alert("请输入您的员工号或身份证号，二者选一!");
        chaxun.sid.focus();
        return false;
    }
    
    if (chaxun.pws.value == "") {
        alert("请输入您的查询密码!");
        chaxun.pws.focus();
        return false;
    } 
 
    if (chaxun.checkcode.value == "") {
        alert("请输入随机验证码!");
        chaxun.checkcode.focus();
        return false;
    }
}
</script>
</head>
<body onload="document.chaxun.sid.focus();">
<table cellspacing="1" cellpadding="5" width="460" align="center" bgcolor="#b9b0a9" border="0">
  <form method="post" name="chaxun" action="check.php?action=login" onsubmit="return check();">
  <tbody>
  <tr>
    <td valign="top" bgcolor="#ffffff">
      <table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tbody>
        <tr>
            <td width="460" background="images/top.gif" height="54" class="bt">工资查询</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" height="150">
            <table height="100%" cellspacing="0" cellpadding="0" width="100%" border="0">
              <tbody>
              <tr>
                <td>
                  <table cellSpacing="1" cellPadding="2" width="100%" align="center" border="0">
                    <tbody>
                    <tr>
                        <td align="right" height="30">员 工 号：</td>
                        <td height="30">
                            <input id="sid" maxLength="10" size="18" name="sid"> 
                        </td>
					</tr>
                    <tr>
                        <td align="right" height="30">身份证号：</td>
                        <td height="30">
                            <input id="idcard" maxlength="18" size="18" name="idcard"> 
                        </td>
					</tr>
                    <tr>
                        <td align="right" height="30">查询密码：</td>
                        <td height="30">
                            <input name="pws" type="password" id="pws" size="18" maxlength="16"> 
                        </td>
					</tr>
                    <tr>
                        <td align="right">验 证 码：</td>
                        <td>
                            <input name="checkcode" class="input" type="text" size="4" maxlength="4" onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#f0ffff'">
                            <img src="images/checkcode.php" style="cursor:hand;width:40px;height:14px" border="0" align="absmiddle" onclick="this.src='images/checkcode.php'" alt="请点击刷新验证码" />
                        </td>
                    </tr>
                    <tr align="middle">
                        <td colSpan="2" height="40">
                            <input name="submit" type="submit" style="width: 5.6em; height: 2.1em; font: 14px;" value="查 询" /> 
                            <input name="submit" type="reset" style="width: 5.6em; height: 2.1em; font: 14px;" value="重 置" /> 
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
      </td>
    </tr>
    </tbody>
    </form>
</table>
</body>
</html>