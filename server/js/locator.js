var watchDogId;
var state = false;

function getPosition(position) {
  var longitude = position.coords.longitude;
  var latitude = position.coords.latitude;
  var timestamp = position.timestamp;
  var requester = new XMLHttpRequest();
  requester.onreadystatechange = function() {
    if (this.readyState === 4) {
      if (this.status === 200) {
        printNotification(this.responseText);
      }
    }
  }

  var data = new FormData();
  data.append("longitude", longitude);
  data.append("latitude", latitude);
  data.append("timestamp", timestamp);

  requester.open("POST", "/php/location.php", true);
  requester.send(data);
}

function changeTrackingState() {
  if (!state) {
    watchDogId = navigator.geolocation.watchPosition(getPosition);
    document.getElementById("tracking-state-info").innerText = "Tracking is enabled";
  } else {
    navigator.geolocation.clearWatch(watchDogId);
    document.getElementById("tracking-state-info").innerText = "Tracking is disabled";
  }
}
