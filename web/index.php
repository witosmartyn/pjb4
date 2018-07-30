<!doctype html public "-//w3c//dtd html 4.0 transitional//en">

<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <title>PHP/Java Bridge examples</title>
</head>
<body bgcolor="#FFFFFF">
<H1>PHP/Java Bridge board generation</H1>
<?php
    $jspFormLink = "<a href='board/form.jsp'>JSP Form</a> &nbsp;<a href='source.php?source=board.php'>Source php<br> ";
    $phpFormLink = "<a href='board/form.php'>PHP Form</a> &nbsp;<a href='source.php?source=jspservlet.jsp'>Source JSP</a><br><br>";
    $infoServlet = "<a href='others/infoServlet'>php info from servlet</a> &nbsp;<a href='source.php?source=others/phpinfo.php'>Source phpinfo.php</a><br>";
    $phpinfo = "<a href='others/phpinfo.php?info=1'>php info from php</a> &nbsp;<a href='source.php?source=others/phpinfo.php'>Source phpinfo.php</a><br>";
echo $jspFormLink;
echo $phpFormLink;
echo $infoServlet;
echo $phpinfo;
?>
</body>
</html>
