/* Token expires on Nov 05 2020 */
const jwt_token = ***REMOVED***+ 
                  ***REMOVED*** +
                  ***REMOVED***

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