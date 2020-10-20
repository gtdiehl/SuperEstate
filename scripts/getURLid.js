var url = document.URL;
var id = url.substring(url.lastIndexOf('=') + 1);

function getURLParam(parameter) {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);

    return urlParams.get(parameter);
}