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

function start(){
	var AF= document.getElementById("agentFrame");
	var result="";
	var df1="English";
	var df2="";
	
	result = "getAgentResults.php";
	
	result += "?language="+df1+"&name="+df2;
	
	
	document.getElementById("agentFrame").setAttribute("src", result);
	AF.onload = function() {
		AF.style.height="";
		var searchHeight = parseInt(AF.contentWindow.document.body.scrollHeight)+80;
		AF.style.height = searchHeight + 'px'; 
	} 
}


window.addEventListener("load",start,false);

