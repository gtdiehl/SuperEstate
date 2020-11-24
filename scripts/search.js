/**
 * Generate a URL string based on user selection in the Search page
 * @returns URL string
 */
function createURLSearchString() {
    var minPrice = 0;
    var maxPrice = 0;
    
    // Retrieve number of Bedrooms selected and converts type to integer
	var e1=document.querySelector('#bedrooms').value;
	var numBedrooms=parseInt(e1);
    
    // Retrieves number of Bathrooms selected and converts type to integer
	var e2=document.querySelector('#bathrooms').value;
	var numBathrooms=parseFloat(e2);
    
    // Populate buildingType array with string values of selected building types
    var buildingType = [];
	document.getElementsByName('buildings').forEach(element => {
        if(element.checked)
            buildingType.push(element.value);
    });

    // Retrieves minimum and maximum price values from the slider
    minPrice = $( "#slider-range" ).slider( "values", 0 );
    maxPrice = $( "#slider-range" ).slider( "values", 1 );

    // Build URL string
	var urlSearchParams="";
    urlSearchParams += "?bed_count=";
    urlSearchParams += numBedrooms;
    urlSearchParams += "&bath_count=";
    urlSearchParams += numBathrooms;
    urlSearchParams += "&min_price=";
    urlSearchParams += minPrice;
    urlSearchParams += "&max_price=";
    urlSearchParams += maxPrice;
    
    // Concatenate building parameter if one or more building
    // types are selected
    if(buildingType.length > 0) {
        buildingType.forEach(element => {
            urlSearchParams += "&building%5B%5D=";
            urlSearchParams += element;
        });
    }

    // Returns URL with php page and search parameters
    return "getSearchResults.php" + urlSearchParams;
}