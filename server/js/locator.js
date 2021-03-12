function getPosition(position) {
  var longitude = position.coords.longitude;
  var latitude = position.coords.latitude;
  document.write("<div>");
  document.write(latitude);
  document.write("&nbsp");
  document.write(longitude);
  document.write("</div>");
  // TODO: Write to database
  var requester = new XMLHttpRequest();
  requester.onreadystatechange = function() {
    if (this.readyState === 4) {
      if (this.status === 200) {

      }
    }
  }
  
  var data = new FormData();
  data.append("longitude", longitude);
  data.append("latitude", latitude);

  requester.open("POST", "/php/location.php", true);
  requester.send(data);
}

var watchDog = navigator.geolocation.watchPosition(getPosition);
