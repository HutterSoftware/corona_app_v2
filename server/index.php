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
       <div id="tracking-option">
           <input id="track-button" type="checkbox" class="tracking-state-elements" onchange="changeTrackingState()">
         <label id="tracking-state-info" for="track-button" class="tracking-state-elements">
           Tracking is disabled
         </label>
      </div>
      <br>
      <div id="warning-content">
        You must enable tracking to get warnings
      </div>
    </div>
  </body>
</html>
