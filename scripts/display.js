var slideIndex = 1;

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

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

function isFavProperty(uname) {
  var propertyId = getURLParam('id');

  jQuery.ajax({
    type: "POST",
    url: 'getFavProperty.php',
    dataType: 'json',
    data: {functionname: 'fav', arguments: [uname, propertyId]},

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

function clickedFav(uname) {
  var propertyId = getURLParam('id');

  if(document.getElementById("favStar").innerHTML == "\u2b50") {
    propertyId = -propertyId;
  } 

  jQuery.ajax({
    type: "POST",
    url: 'setFavProperty.php',
    dataType: 'json',
    data: {functionname: 'fav', arguments: [uname, propertyId]},

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

function setFavProperty(result) {
  console.log(result);
  if(result) {
    document.getElementById("favStar").innerHTML = "\u2b50";
  } else {
    document.getElementById("favStar").innerHTML = "\u2606";
  }
}