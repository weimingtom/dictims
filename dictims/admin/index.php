<?php include('inc/right.php'); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/main.css" rel="stylesheet" type="text/css">
<title><?php echo($sysConfig); ?></title>
</head>
<frameset rows="108,*,30" cols="*" frameborder="No" border="0" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset row190="*" cols="190,*" framespacing="0" frameborder="no" border="0">
    <frame src="left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="main.php" name="mainFrame" scrolling="yes" noresize="noresize" id="mainFrame" title="mainFrame" />
  </frameset>
  <frame src="bottom.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>
