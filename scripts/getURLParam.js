function getURLParam(parameter)
{
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);

    return urlParams.get(parameter);
}
