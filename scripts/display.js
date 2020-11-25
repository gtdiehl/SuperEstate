// Sets a default value of one to show the first
// photo when initially loading the Property Display page
var slideIndex = 1;

/**
 * Move forward or backward through the photo slideshow
 * @param {number} n Integer value to increment/decrement the index by
 */
function plusSlides(n) {
  showSlides(slideIndex += n);
}

/**
 * Moves the slideshow a specific position
 * @param {number} n Integer value of photo position
 */
function currentSlide(n) {
  showSlides(slideIndex = n);
}

/**
 * Displays the photo based on the index parameter. Keeps the index
 * value within the range of photos available for the home property.
 * @param {nunber} n Index number of photo to display
 */
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("photo-container");

  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}

/**
 * Checks if the Property displayed is marked as a Favorite Property
 * in the database.
 * @param {string} uname Username of logged in user
 */
function isFavProperty(uname) {
  // Retrieves property ID from the window URL
  var propertyId = getURLParam('id');

  // HTML POST to PHP backend, to run the fav() method from 
  // the getFavProperty.php page using username and property ID as arguments
  jQuery.ajax({
    type: "POST",
    url: 'getFavProperty.php',
    dataType: 'json',
    data: {functionname: 'fav', arguments: [uname, propertyId]},

    success: function (obj, textstatus) {
                  // Returns either true or false if the
                  // property is a favorite of the user. setFavProperty()
                  // will set the star icon as selected or not.
                  if( !('error' in obj) ) {
                    setFavProperty(obj.result);
                  }
                  else {
                      console.log(obj.error);
                  }
            }
    });
}

/**
 * Function that sets/unsets the favorite property star icon
 * @param {string} uname Username of logged in user
 */
function clickedFav(uname) {
  // Retrieves property ID from the window URL
  var propertyId = getURLParam('id');

  // If the star icon is unchecked than change the propertyId value to a negative
  if(document.getElementById("favStar").innerHTML == "\u2b50") {
    propertyId = -propertyId;
  } 

  // HTML POST to PHP backend, to run the fav() method from 
  // the setFavProperty.php page using username and property ID as arguments
  jQuery.ajax({
    type: "POST",
    url: 'setFavProperty.php',
    dataType: 'json',
    data: {functionname: 'fav', arguments: [uname, propertyId]},

    success: function (obj, textstatus) {
                  // Takes the current property ID and updates the
                  // database appropiately to add/remove a favorite property
                  // and returns a true or false value so we can display the 
                  // selected/unselected start icon.
                  if( !('error' in obj) ) {
                    setFavProperty(obj.result);
                  }
                  else {
                      console.log(obj.error);
                  }
            }
    });
}

/**
 * Sets the favorite property star icon as selected/unselected
 * @param {boolean} result Value to select the appropiate star icon
 */
function setFavProperty(result) {
  if(result) {
    document.getElementById("favStar").innerHTML = "\u2b50";
  } else {
    document.getElementById("favStar").innerHTML = "\u2606";
  }
}