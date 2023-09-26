<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Test</title>
  </head>
  <body>
    <span style="color:red;"><?=implode("<br />", $data)?></span>
    <form name="myform" action="/registrace" method="POST">
        Jméno:<input type="text" name="name"><br>
        Příjmení:<input type="text" name="surname"><br>
        Heslo:<input type="password" name="pass"><br>
        Heslo znovu:<input type="password" name="pass2"><br>
        Sečti 0+0 = <input type="text" name="response"><br>
        <input type="submit" name="register" value="Registrovat"><br>
    </form>
  </body>
</html>

