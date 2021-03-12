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
      <div id="warning-content">
      </div>
        <?php

        getReportForm($_COOKIE["uid"]);

         ?>
      </div>
      <div id="table-of-ill-people">
        <?php

          include "./php/get-ill-people.php";

         ?>
      </div>
     </div>
  </body>
</html>
