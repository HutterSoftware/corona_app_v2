var watchDogId;
var state = false;
var appUserId = -1;

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
  data.append("id", appUserId);

  requester.open("POST", "/php/location.php", true);
  requester.send(data);
}

function changeTrackingState() {
  if (document.getElementById("track-button").checked) {
    watchDogId = navigator.geolocation.watchPosition(getPosition);
    document.getElementById("tracking-state-info").innerText = "Tracking is enabled";
  } else {
    navigator.geolocation.clearWatch(watchDogId);
    document.getElementById("tracking-state-info").innerText = "Tracking is disabled";
  }
}

if (localStorage.getItem("corona_app_v2-app_user_id") == null) {
  var appIdRequester = new XMLHttpRequest();
  appIdRequester.onreadystatechange = function() {
      if (this.readyState === 4) {
        if (this.status === 200) {
          appUserId = this.responseText;
          localStorage.setItem("corona_app_v2-app_user_id", appUserId);
        }
      }
  };
  appIdRequester.open("POST", "/php/fetch-app-user-id.php", true);
  appIdRequester.send();
} else {
  appUserId = localStorage.getItem("corona_app_v2-app_user_id");
}
