function searchHomes() {
    var resultHomes = [];
    var minPrice = 0;
    var maxPrice = 0;
    var varnumBathrooms = 0
    var numBedrooms = 0
    var buildingType = [];

    document.getElementsByName('bedrooms').forEach(element => {
        if(element.checked)
            numBedrooms = element.value;
    });

    document.getElementsByName('bathrooms').forEach(element => {
        if(element.checked)
            numBathrooms = element.value;
    });  

    document.getElementsByName('buildings').forEach(element => {
        if(element.checked)
            buildingType.push(element.value);
    });

    minPrice = $( "#slider-range" ).slider( "values", 0 );
    maxPrice = $( "#slider-range" ).slider( "values", 1 );

    homes.forEach(element => {
        if(minPrice <= element.Price && maxPrice >= element.Price)
            if(numBedrooms <= element.Bedrooms)
                if(numBathrooms <= element.Bathooms)
                    buildingType.forEach(type => {
                        if(element.Type == type)
                            resultHomes.push(element);
                    });
    });
    resultHomes.sort(sortByProperty("Price"));
    displaySearchResults(resultHomes)
}

function displaySearchResults(results) {
    var ifrm = document.getElementById('searchFrame');
    ifrm = ifrm.contentWindow || ifrm.contentDocument.document || ifrm.contentDocument;

    ifrm.document.open();
    ifrm.document.write("<div class=\"content\">");
    if(results.length > 0)
    {
        ifrm.document.write("<p>Sorted by Price</p>");
        results.forEach(element => {
            ifrm.document.write("<div class=\"property\">");
            ifrm.document.write("<a href=\"images/house1.jpg\">");
            ifrm.document.write("<img src=\"images/house1.jpg\" alt=\"house\">");
            ifrm.document.write("</a>");
            ifrm.document.write("<div class=\"middle\">Details</div>");
            ifrm.document.write("<div class=\"desc\">$" + numberWithCommas(element.Price) + "</div>");
            ifrm.document.write("</div>");
        });
    }
    else
    {
        ifrm.document.write("<p>No homes found.</p>");
    }
    ifrm.document.write("</div>");

    var head = ifrm.document.getElementsByTagName('head')[0];
    console.log(head);
    var style = ifrm.document.createElement("link");
    style.href = "styles/styles.css";
    style.type = "text/css";
    style.rel = 'stylesheet';
    head.append(style);

    ifrm.document.close();
}