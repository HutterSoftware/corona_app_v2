<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Corona App V2</title>
    <link href="/css/main-style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
      include getcwd() . "/php/getHTMLPieces.php";
      getHeader();
    ?>

    <div id="content">
      <form action="php/login.php" method="post">
        <div>
          <label class="login-element" for="username">Username</label>
          <input id="username" class="login-element small-skip" name="username">
        </div>
        <div>
          <label class="login-element" for="password">Password</label>
          <input id="password" class="login-element small-skip" name="password" type="password">
        </div>
        <div>
          <button class="small-skip">Anmelden</button>
        </div>
        </div>
      </form>
      <div>
        <a href="/register.php">Registrieren</a>
      </div>
    </div>
  </body>
</html>
