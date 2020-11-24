/**
 * Gets the value of a parameter that is part of the URL string
 * @param {string} parameter parameter in URL
 */
function getURLParam(parameter)
{
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);

    return urlParams.get(parameter);
}
