<?php include('inc/right.php'); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/tr/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo($sysConfig); ?></title>
<link href="images/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td  bgcolor="#FFFFFF"><br>
	<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
	  <tr align="center" bgcolor="#F2FDFF">
        <td class="optiontitle" colspan="4">系统检测</td>	
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>后台操作管理员：</td>
        <td colspan="3"><?php echo($_SESSION["admin_name"]); ?></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="100">服务器名：</td>
        <td width="250"><?php echo($_SERVER["SERVER_NAME"]); ?></td>
        <td width="20%">服务器IP：</td>
        <td><?php echo($_SERVER["SERVER_ADDR"]); ?></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>服务器端口：</td>
        <td><?php echo($_SERVER["SERVER_PORT"]); ?></td>
        <td>服务器时间：</td>
        <td><?php echo(date('Y-m-d H:i:s', time())); ?></td>
      </tr>
    </table>
	<p>
    <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
	  <tr align="center" bgcolor="#F2FDFF">
        <td class="optiontitle" colspan="2">系统信息</td>	
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="100"> 系统名称：</td>
        <td><?php echo($sysConfig); ?></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td > 程序版本：</td>
        <td>V1.0</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</body>
</html>
