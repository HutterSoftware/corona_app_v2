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
       <div id="user-id">
        <div class="id-label">Ihre AppID(Wird zur Meldung benötigt):</div>
        <div class="id-label">
          <script>
            document.write(localStorage.getItem("corona_app_v2-app_user_id"));
          </script>
        </div>
       </div>
       <div id="tracking-option">
           <input id="track-button" type="checkbox" checked="unchecked" class="tracking-state-elements" onchange="changeTrackingState()">
         <label id="tracking-state-info" for="track-button" class="tracking-state-elements">
           Tracking is disabled
         </label>
      </div>
      <div id="warning-content">
        <table>
          <tr>
            <th>Status</th>
            <td id="warning-level">You must enable tracking to get warnings</td>
          </tr>
          <tr>
            <th>Empfehlung</th>
            <td id="recommendation"></td>
        </table>

      </div>
    </div>
    <script>
      document.getElementById("track-button").checked = false;
    </script>
  </body>
</html>
