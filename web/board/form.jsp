<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h4>JSP form</h4>
<form action="jspservlet.jsp" method="post">
    <p>Size board?: <input type="number" name="size" required value="8" autofocus /></p>
    <p>Color :
    <select size="5"  name="color1">
        <option disabled>select color</option>
        <option value="black" selected >black</option>
        <option value="brown">Brown</option>
        <option value="gray">Gray</option>
        <option value="red">Red</option>
    </select></p>
    <p><input id="btnSubmit" type="submit"/></p>
</form>
</body>
</html>