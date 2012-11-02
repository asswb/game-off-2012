<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <div>
      <form action='<?=$_SERVER["PHP_SELF"]?>?page=main' method='POST'>
        <div>Username:</div>
        <div><input type='text' class='' id='username' name='username' value='' /></div>
        <div>Password</div>
        <div><input type='password' class='' id='password' name='password' value='' /></div>
        <div><input type='submit' class='' id='exe' name='exe' value='Login' /></div>
      </form>
      <form action='<?=$_SERVER["PHP_SELF"]?>?page=register' method='POST'>
       <div><input type='submit' id='register' name='register' value='Register Here' disabled/></div>
      </form>
   </div>
  </body>
</html> 
