var WARNING_CONTENT_ELEMENT_ID_STATE = "warning-level";
var WARNING_CONTENT_ELEMENT_ID_RECOMMENDATION = "recommendation";

var WARNING_LEVEL_1_NOTIFICATION = "Keine Warnung";
var WARNING_LEVEL_1_COLOR = "green";
var WARNING_LEVEL_1_RECOMMENDATION = "Beachten Sie die AHA + L Regelen dann " +
                                    "bleiben Sie Gesund.";

var WARNING_LEVEL_2_NOTIFICATION = "Potentieller Kontakt";
var WARNING_LEVEL_2_COLOR = "yellow";
var WARNING_LEVEL_2_RECOMMENDATION = "Wenn Sie sich jetzt schlechter oder in " +
                                    "den nächsten Tagen schlecht fühlen, dann lassen Sie sich testen.";

var WARNING_LEVEL_3_NOTIFICATION = "Ihr Test war positiv";
var WARNING_LEVEL_3_COLOR = "red";
var WARNING_LEVEL_3_RECOMMENDATION = "Bleiben Sie solange zu Hause bis die " +
                                    "häusliche Quarantäne vom Gesundheitsamt " +
                                    "aufgehoben wird.";

var AUDIO_NOFIFICATION_FILE = "/audio/notification.mp3";

function printNotification(warningLevel) {
  var audioFile = AUDIO_NOFIFICATION_FILE;
  var notificationElementState =
    document.getElementById(WARNING_CONTENT_ELEMENT_ID_STATE);

  var notificationElementRecommendation =
    document.getElementById(WARNING_CONTENT_ELEMENT_ID_RECOMMENDATION);

  var warningContent = document.getElementById("warning-content");
  var color;
  var recommendation;
  var state;

  switch (warningLevel) {
    case "0": // Corona test is positiv
      state = WARNING_LEVEL_3_NOTIFICATION;
      recommendation = WARNING_LEVEL_3_RECOMMENDATION;
      color = WARNING_LEVEL_3_COLOR;
      break;

    case "1": // No warning
      state = WARNING_LEVEL_1_NOTIFICATION;
      recommendation = WARNING_LEVEL_1_RECOMMENDATION;
      color = WARNING_LEVEL_1_COLOR;
      audioFile = "";
      break;

    case "2": // Warning, less than 3m
      state = WARNING_LEVEL_2_NOTIFICATION;
      recommendation = WARNING_LEVEL_2_RECOMMENDATION;
      color = WARNING_LEVEL_2_COLOR;
      break;

    default:
      state = "Warning Level unknown";
      recommendation = "";
      color = "#c4c4c4";
      audioFile = "";
  }

  document.getElementById("warning-content").style.backgroundColor = color;
  document.getElementById("warning-level").innerText = state;
  document.getElementById("recommendation").innerText = recommendation;

  if (localStorage.getItem("corona_app_v2-state") === null) {
    localStorage.setItem("corona_app_v2-state", state);
    localStorage.setItem("corona_app_v2-audio", 1);
    localStorage.setItem("corona_app_v2-first_run", 1);
  }

  if (localStorage.getItem("corona_app_v2-state") != state &&
      localStorage.getItem("corona_app_v2-first_run") == 0) {

    localStorage.setItem("corona_app_v2-audio", 1);
  }

  if (audioFile !== "" && localStorage.getItem("corona_app_v2-audio") == 1) {
    var audio = new Audio(audioFile);
    audio.play();
    localStorage.setItem("corona_app_v2-audio", 0);
    localStorage.setItem("corona_app_v2-first_run", 0);
  }
}
