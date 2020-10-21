function searchHomes(homes) {
    var resultHomes = [];
    var minPrice = 0;
    var maxPrice = 0;
    var numBathrooms = 0
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
                if(numBathrooms <= element.Bathrooms)
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
    ifrm.document.write("<div class=\"content\" style=\"height: 100%; padding: 10px; margin-left: 0;\">");
    if(results.length > 0)
    {
        ifrm.document.write("<p>Sorted by Price</p>");
        results.forEach(element => {
            ifrm.document.write("<div class=\"property\">");
            ifrm.document.write("<img src=\"" + element.image + "\" alt=\"house\">");
            ifrm.document.write("<div class=\"middle\"><a href=\"display_home.html?id=" + element.ref + "&display_nav=true\">Details</a></div>");
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
    var styleLink = ifrm.document.createElement("link");
    styleLink.href = "styles/styles.css";
    styleLink.type = "text/css";
    styleLink.rel = 'stylesheet';
    head.append(styleLink);

    var style = ifrm.document.createElement("style");
    style.innerHTML = 
        'body {' +
            'text-align:center;' +
            'font-family:Microsoft YaHei;' +
            'font-weight:bold;' +
            'margin:5px;' +
            'padding-right:0;' +
        '}';
    head.append(style);

    ifrm.document.close();
}