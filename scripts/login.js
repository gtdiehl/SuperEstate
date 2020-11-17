function userLogin() {
    var username = doc
  
    if(document.getElementById("favStar").innerHTML == "\u2b50") {
      propertyId = -propertyId;
    } 
  
    jQuery.ajax({
      type: "POST",
      url: 'setFavProperty.php',
      dataType: 'json',
      data: {functionname: 'fav', arguments: [username, propertyId]},
  
      success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                      setFavProperty(obj.result);
                    }
                    else {
                        console.log(obj.error);
                    }
              }
      });
  }