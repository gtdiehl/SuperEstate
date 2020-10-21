function createURLSearchString() {
    var minPrice = 0;
    var maxPrice = 0;
    
	var numBedrooms = document.getElementsByName('bedrooms').value;
	var numBathrooms = document.getElementsByName('bathrooms').value;
    var buildingType = [];
	
	document.getElementsByName('buildings').forEach(element => {
        if(element.checked)
            buildingType.push(element.value);
    });

    minPrice = $( "#slider-range" ).slider( "values", 0 );
    maxPrice = $( "#slider-range" ).slider( "values", 1 );

	var urlSearchParams="";
    urlSearchParams += "?bed_count=";
    urlSearchParams += numBedrooms;
    urlSearchParams += "&bath_count=";
    urlSearchParams += numBathrooms;
    urlSearchParams += "&min_price=";
    urlSearchParams += minPrice;
    urlSearchParams += "&max_price=";
    urlSearchParams += maxPrice;
    
    if(buildingType.length > 0) {
        buildingType.forEach(element => {
            urlSearchParams += "&building%5B%5D=";
            urlSearchParams += element;
        });
    }

    return "getSearchResults.php" + urlSearchParams;
}