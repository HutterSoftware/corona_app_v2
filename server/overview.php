<!DOCTYPE html>
<html lang="de">
  <head>
    <?php

    include "./php/getHTMLPieces.php";
    getImportantHeader();

     ?>

     <script src="/js/notifier.js"></script>
     <script src="/js/locator.js"></script>
  </head>
  <body>
    <?php

    getHeader();

     ?>

     <div id="content">
       <div id="login">
        <?php

        if (!isset($_COOKIE["corona_app_v2-uid"])) {
          getLogInForm();
        }

         ?>
       </div>
      <div id="warning-content">
      </div>
        <?php

        if (isset($_COOKIE["corona_app_v2-uid"])) {
          getReportForm($_COOKIE["corona_app_v2-uid"]);
        }

         ?>
      </div>
      <div id="table-of-ill-people">
        <?php

          if (isset($_COOKIE["corona_app_v2-uid"])) {
            include "./php/get-ill-people.php";
            $result = getIllPeople();
            echo "<table><tr><th>Appnutzer Insgesamt</th><td>" .
              $result["number-of-appuser"] . "</td></tr><tr><th>Erkrankte " .
              "Appnutzer</th><td>" . $result["number-of-ill-people"];
          }

         ?>
      </div>
     </div>
     <?php

     if (isset($_GET["report"])) {
       if ($_GET["report"] == 1) {
         echo "<script>alert(\"Sick notification was successfull\");</script>";
       } else {
         echo "<script>alert(\"Sick notification was not successfull\");</script>";
       }
     }

    ?>
  </body>
</html>
