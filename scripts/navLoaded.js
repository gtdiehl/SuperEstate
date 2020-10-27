function navLoaded()
{
	let div = document.createElement("div");
	div.setAttribute("class", "nav");

	let unorderedList = document.createElement("UL");
	div.appendChild(unorderedList);

	let listItem1 = document.createElement("LI");
	listItem1.setAttribute("class", "navList");
	unorderedList.appendChild(listItem1);
	

	let homeLink = document.createElement("A");
	homeLink.setAttribute("href","index.html");
	homeLink.setAttribute("class", "homepage");
	listItem1.appendChild(homeLink);
	
	let imgsrc = document.createElement("IMG");
	imgsrc.setAttribute("src", "images/logo.jpg");
	imgsrc.setAttribute("alt", "SuperEstate logo");
	imgsrc.setAttribute("width", 140);
	imgsrc.setAttribute("height", 75);
	homeLink.appendChild(imgsrc);

	let listItem2 = document.createElement("LI");
	listItem2.setAttribute("class", "navList");
	unorderedList.appendChild(listItem2);
	
	let searchLink = document.createElement("A");
	searchLink.setAttribute("href", "search.html");
	listItem2.appendChild(searchLink);

	let searchText = document.createTextNode("Search a house");
	searchLink.appendChild(searchText);

	let listItem3 = document.createElement("LI");
	listItem3.setAttribute("class", "navList");
	unorderedList.appendChild(listItem3);
	
	let sellLink = document.createElement("A");
	sellLink.setAttribute("href", "sell.html");
	listItem3.appendChild(sellLink);

	let sellText = document.createTextNode("Sell a house");
	sellLink.appendChild(sellText);

	let listItem4 = document.createElement("LI");
	listItem4.setAttribute("class", "navList");
	unorderedList.appendChild(listItem4);
	
	let aboutLink = document.createElement("A");
	aboutLink.setAttribute("href", "#about");
	listItem4.appendChild(aboutLink);

	let aboutText = document.createTextNode("Agents");
	aboutLink.appendChild(aboutText);

	let listItem5 = document.createElement("LI");
	listItem5.setAttribute("class", "navList");
	unorderedList.appendChild(listItem5);
	
	let contactLink = document.createElement("A");
	contactLink.setAttribute("href", "#about");
	listItem5.appendChild(contactLink);

	let contactText = document.createTextNode("Contact us");
	contactLink.appendChild(contactText);

	let listItem6 = document.createElement("LI");
	listItem6.setAttribute("class", "navList");
	unorderedList.appendChild(listItem6);
	
	let mypropertyLink = document.createElement("A");
	mypropertyLink.setAttribute("href", "#account");
	mypropertyLink.setAttribute("class", "special");
	listItem6.appendChild(mypropertyLink);

	let mypropertyText = document.createTextNode("My property");
	mypropertyLink.appendChild(mypropertyText);

	document.body.insertBefore(div, document.body.firstChild);
}
