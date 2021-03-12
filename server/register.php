<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Corona App V2</title>
    <link href="/css/main-style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
      include "php/getHTMLPieces.php";
      getHeader();
    ?>

    <div id="content">
      <form action="/php/add-user.php" method="post">
        <div>
          <label for="username" class="login-element">Username</label>
          <input id="username" name="username" class="login-element small-skip">
        </div>
        <div>
          <label for="password" class="login-element">Password</label>
          <input id="password" name="password" class="login-element small-skip"
            type="password">
        </div>
        <div>
          <label for="first-name" class="login-element">First name</label>
          <input id="first-name" name="first-name"
            class="login-element small-skip">
        </div>
        <div>
          <label for="last-name" class="login-element">Last name</label>
          <input id="last-name" name="last-name"
            class="login-element small-skip">
        <div>
        <div>
          <button class="small-skip">Registrieren</button>
        </div>
      </form>
    </div>
    <?php

    if (isset($_GET["successully"])) {
      getSuccesfullyNotification();
    }

     ?>
  </body>
</html>
