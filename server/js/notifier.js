var WARNING_CONTENT_ELEMENT_ID = "warning-content";
var WARNING_LEVEL_TOP_NOTIFICATION = "Coronat test is positiv";
var WARNING_LEVEL_1_NOTIFICATION = "Kein Warnung";
var WARNING_LEVEL_2_NOTIFICATION = "Es bestand eine Näherung mit einer " +
                                   "infizierten Person bei einer Distanz von " +
                                   "weniger als 1,5m";

var AUDIO_NOFIFICATION_FILE = "/audio/notification.mp3";

function printNotification(warningLevel) {
  var audioFile = AUDIO_NOFIFICATION_FILE;
  var notificationElement = document.getElementById(WARNING_CONTENT_ELEMENT_ID);

  switch (warningLevel) {
    case "0": // Corona test is positiv
      notificationElement.innerText = WARNING_LEVEL_TOP_NOTIFICATION;
      break;

    case "1": // No warning
      notificationElement.innerText = WARNING_LEVEL_1_NOTIFICATION;
      audioFile = "";
      break;

    case "2": // Warning, less than 1,5m
      notificationElement.innerText = WARNING_LEVEL_2_NOTIFICATION;
      break;

    default:
      notificationElement.innerText = "Warning Level unknown";
      audioFile = "";
  }

  if (audioFile !== "") {
    var audio = new Audio(audioFile);
    audio.play();
  }
}
