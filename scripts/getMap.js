/* Token expires on Nov 05 2020 */
const jwt_token = "eyJhbGciOiJFUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IlM0VkpSWkg1U1EifQ.eyJpc3MiOiJXNjc1OE5OUUE5Iiwia" + 
                  "WF0IjoxNjAzNDE5NTI1LjM1MiwiZXhwIjoxNjA0NjI5MTI1LjM1Mn0.JNLjP1fnc_nQ9T7uUPTKKM2svgU0KUyF89qxaJ" +
                  "-dnoNbgP0je-EjI7ysJmzBWxhJoNlzq-UPHPMDJxue5x_tCg"

function displayAppleMap(address, mapElementName) {
    var latitude, longitude, home;
    var MarkerAnnotation = mapkit.MarkerAnnotation,
        clickAnnotation;
    var geocoder = new mapkit.Geocoder({
        language: "en",
        getsUserLocation: false
    });

    geocoder.lookup(address, function(err, data) {
        console.log(data);
        latitude = data.results[0].coordinate.latitude;
        longitude = data.results[0].coordinate.longitude;
        home = new mapkit.Coordinate(latitude, longitude);
        var homeAnnotation = new MarkerAnnotation(home, { color: "#f4a56d" });
        map.showItems([homeAnnotation]);
    });
    
    mapkit.init({
        authorizationCallback: function(done) {
            done(jwt_token);
        },
        language: "en"
    });
    var map = new mapkit.Map(mapElementName);
    map.mapType = mapkit.Map.MapTypes.Hybrid;
}

function displayGoogleMap(address, mapObject) {
    const geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, mapObject, address);
}

function geocodeAddress(geocoder, resultsMap, address) {
    console.log(address);
    console.log(resultsMap);
    geocoder.geocode({ address: address }, (results, status) => {
      if (status === "OK") {
          console.log("got ok");
          console.log(results[0]);
        resultsMap.setCenter(results[0].geometry.location);
        new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location,
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }