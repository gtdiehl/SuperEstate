/**
 * Takes the current selects on the page to create
 * a URL that passes parameters to another page to be
 * processed.
 * 
 * @returns URL String
 */
function createURLSearchString() {
	// Sets variable based on selection of drop-down
	var e1=document.querySelector('#language').value;

	// Sets variable based on text input field
	var e2=document.getElementById("name").value;
	
	var urlSearchParams="";
    urlSearchParams += "?language=";
    urlSearchParams += e1;
    urlSearchParams += "&name=";
    urlSearchParams += e2;
    
	// Returns a string with search parameters
    return "getAgentResults.php" + urlSearchParams;
}

/**
 * Function passes default parameters to display 
 * all agents.
 */
function start(){
	var AF= document.getElementById("agentFrame");
	var result="";
	var df1="English";
	var df2="";
	
	// Building the result string with values that
	// that will return all agents from getAgentResults.php
	result = "getAgentResults.php";
	
	result += "?language="+df1+"&name="+df2;
	
	// Sets the src URL for the iFrame
	document.getElementById("agentFrame").setAttribute("src", result);

	// Programmatically set the height of the iFrame based on the
	// height of the search results
	AF.onload = function() {
		AF.style.height="";
		var searchHeight = parseInt(AF.contentWindow.document.body.scrollHeight)+80;
		AF.style.height = searchHeight + 'px'; 
	} 
}


window.addEventListener("load",start,false);

