<?php
   session_start();
?>
<html>
    <head>
        <meta charset='utf-8'>
        <title>superestate.com</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css"></link>
		<link rel="stylesheet" type="text/css" href="styles/displayStyles.css"></link>
		<script src="scripts/getURLParam.js"></script>
		<script src="scripts/navLoaded.js"></script>
		<script src="scripts/display.js"></script>
		<script src="scripts/utils.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</head>
	
	<body onload="navLoaded();footerLoaded();">
		<div class="container">
			<div class="starbutton" >
				<a href="#" id="defaultStar" onclick="starDefault();">&#x2606;<p>Save</p></a>
				<script>
					// Get current user if logged in
					var isLoggedIn = "<?php echo $_SESSION['login_user']; ?>";
					var t = document.getElementsByClassName("starbutton")[0];
					
					// If the user is logged in, show the favorite star icon selected/unselected
					// based on if the property is apart of the user's favorite list in the database
					if(isLoggedIn != "") {
						var clickedFavMethodStr = "clickedFav('" + isLoggedIn + "')";
						
						var starNode = document.createElement("A");
						starNode.setAttribute("id", "favStar");
						starNode.setAttribute("onclick", clickedFavMethodStr);
						t.appendChild(starNode);
						isFavProperty(isLoggedIn);
						document.getElementById("defaultStar").style.display = "none";
					}
				</script>
			</div>
			<div class="slides-container">
				<div class="photo-container">
					<!-- Get the property id from the window URL and add it to the image path to display the correct image -->
					<script>document.writeln('<img src="images/house/house'+ getURLParam('id') +'.jpg" alt="Property for Sale" width="100%" height="100%" class="property-photo">');</script>
				</div>
				<script type="text/javascript">
					var photoCount;
					var videoCount;
					// Function to display property photos, slideshow buttons, and favorite star icon
					$(document).ready(function() {
						// Get the count of photos and videos associated with the property id from the database
						$.get('getPropertyPhotos.php', {id:getURLParam('id')}, function(data) {
							var dataArray = data.split(",");
							photoCount = dataArray[0];
							videoCount = dataArray[1];
							
							// Get a reference to the slides-container element for photos to be added to
							s = document.getElementsByClassName("slides-container")[0];

							// Loop to add the photos to the container
							for(var i=1;i<parseInt(photoCount)+1;++i)
							{
								var divNode = document.createElement("div");
								divNode.setAttribute("class", "photo-container");
								var imgNode = document.createElement("img");
								imgNode.setAttribute("src", ("images/house/house" + getURLParam('id') + "_" + i + ".jpg"));
								imgNode.setAttribute("alt", "Property for Sale");
								imgNode.setAttribute("width", "100%");
								imgNode.setAttribute("heigh", "100%");
								imgNode.setAttribute("class", "property-photo");

								divNode.appendChild(imgNode);
								s.appendChild(divNode);

								// Make sure to display the first photo
								showSlides(1);
							}

							// Add prev and next buttons for the photo slideshow
							if(photoCount > 0)
							{
								var prevNode = document.createElement("a");
								prevNode.setAttribute("class", "prev");
								prevNode.setAttribute("onclick", "plusSlides(-1)");
								var prevTextNode = document.createTextNode('\u2b05');
								prevNode.appendChild(prevTextNode);

								var nextNode = document.createElement("a");
								nextNode.setAttribute("class", "next");
								nextNode.setAttribute("onclick", "plusSlides(+1)");
								var nextTextNode = document.createTextNode('\u27a1');
								nextNode.appendChild(nextTextNode);

								s.appendChild(prevNode);
								s.appendChild(nextNode);
							}
						});
						
						
					});
				</script>
			</div>
			
			
			<div class="propertyDetails">
				<script>
					// Display getDetails.php page with property details that is retrieved from the database using the property id
					document.writeln('<iframe src="getDetails.php?id='+getURLParam('id')+'" width="100%" height="100%"></iframe>');
				</script>
				
			</div>
			<div id="map">
				<script>
					var propertyAddress;

					// Retrieves property address from database using the property id. Appends address to Google Maps API
					// to show the map in the Property Display page.
					$(document).ready(function() {
						$.get('getPropertyAddress.php', {id:getURLParam('id')}, function(data) {
							propertyAddress = data;

							// Uses Google Maps Embed API
							p = document.getElementById("map");
							var iframeNode = document.createElement("iframe");
							iframeNode.setAttribute("id", "map");
							iframeNode.setAttribute("src", "https://www.google.com/maps/embed/v1/place?key=***REMOVED***&q=" + propertyAddress);
							
							p.appendChild(iframeNode);
						});
					});
				</script>
			</div>
		</div>
    </body>
</html>
