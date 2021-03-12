function getPosition(position) {
  var longitude = position.coords.longitude;
  var latitude = position.coords.latitude;
  var timestamp = position.timestamp;
  // TODO: Write to database
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

var watchDog = navigator.geolocation.watchPosition(getPosition);
