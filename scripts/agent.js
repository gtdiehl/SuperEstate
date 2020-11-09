function createURLSearchString() {
	var e1=document.querySelector('#language').value;
	
	var sn=document.getElementById("name").value;
	if (sn=="Name"||sn=="")
		var e2="";
	else
		var e2=sn;
	
	var urlSearchParams="";
    urlSearchParams += "?language=";
    urlSearchParams += e1;
    urlSearchParams += "&name=";
    urlSearchParams += e2;
    
   
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
		AF.style.height = parseInt(AF.contentWindow.document.body.scrollHeight) + 'px'; 
	} 
}


window.addEventListener("load",start,false);

