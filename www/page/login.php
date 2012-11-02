<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <div>
      <form action='<?=$_SERVER["PHP_SELF"]?>' method='POST'>
        <input type='hidden' id='page' name='page' value='main' />
        <input type='hidden' id='exe' name='exe' value='login' />
        <div>Username:</div>
        <div><input type='text' class='' id='username' name='username' value='' /></div>
        <div>Password</div>
        <div><input type='password' class='' id='password' name='password' value='' /></div>
        <div><input type='submit' class='' id='login' name='login' value='Login' /></div>
   </div>
  </body>
</html> 
