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
		<script src="scripts/getMap.js"></script>
		<script src="scripts/utils.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdn.apple-mapkit.com/mk/5.x.x/mapkit.js"></script>
	</head>
	
	<body onload="navLoaded();footerLoaded();">
		<div class="fav">
		</div>
		<div class="container">
			<div class="slides-container">
				<div class="photo-container">
					<script>document.writeln('<img src="images/house/house'+ getURLParam('id') +'.jpg" alt="Property for Sale" width="100%" height="100%" class="property-photo">');</script>
				</div>
				<script type="text/javascript">
					var photoCount;
					var videoCount;
					$(document).ready(function() {
						$.get('getPropertyPhotos.php', {id:getURLParam('id')}, function(data) {
							var dataArray = data.split(",");
							photoCount = dataArray[0];
							videoCount = dataArray[1];

							var isLoggedIn = "<?php echo $_SESSION['login_user']?>";
							var clickedFavMethodStr = "clickedFav('" + isLoggedIn + "')";
							console.log("isLog: " + clickedFavMethodStr);

							if(isLoggedIn != "") {
								t = document.getElementsByClassName("fav")[0];
								var starNode = document.createElement("a");
								starNode.setAttribute("class", "next");
								starNode.setAttribute("id", "favStar");
								starNode.setAttribute("onclick", clickedFavMethodStr);
								t.appendChild(starNode);

								isFavProperty(isLoggedIn);
							}
							
							s = document.getElementsByClassName("slides-container")[0];

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

								showSlides(1);
							}

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
					document.writeln('<iframe src="getDetails.php?id='+getURLParam('id')+'" width="100%" height="100%"></iframe>');
				</script>
				
			</div>
			<div id="map">
				<script>
					var propertyAddress;
					$(document).ready(function() {
						$.get('getPropertyAddress.php', {id:getURLParam('id')}, function(data) {
							propertyAddress = data;

							// Uses Google Maps Embed API
							p = document.getElementById("map");
							var iframeNode = document.createElement("iframe");
							iframeNode.setAttribute("id", "map");
							iframeNode.setAttribute("src", "https://www.google.com/maps/embed/v1/place?key=AIzaSyDHoKTlzPooE2GOaFauWyvrzYjBxxY9wms&q=" + propertyAddress);
							
							p.appendChild(iframeNode);
						});
					});
				</script>
			</div>
		</div>
    </body>
</html>
