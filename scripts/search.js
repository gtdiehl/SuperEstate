function createURLSearchString() {
    var minPrice = 0;
    var maxPrice = 0;
	
	var e1=document.querySelector('#bedrooms').value;
	var numBedrooms=parseInt(e1);
	
	var e2=document.querySelector('#bathrooms').value;
	var numBathrooms=parseFloat(e2);
	
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