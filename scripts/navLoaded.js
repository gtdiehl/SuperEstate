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
	aboutLink.setAttribute("href", "agent.html");
	listItem4.appendChild(aboutLink);

	let aboutText = document.createTextNode("Agents");
	aboutLink.appendChild(aboutText);
	
	let listItem5 = document.createElement("LI");
	listItem5.setAttribute("class", "navList");
	unorderedList.appendChild(listItem5);
	
	let contactLink = document.createElement("A");
	contactLink.setAttribute("href", "#footer");
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

function footerLoaded(){
	let footer = document.createElement("FOOTER");
	footer.setAttribute("id", "footer");
	
	let outTable = document.createElement("TABLE");
	outTable.setAttribute("style", "width: 100%; height:200px;");
	footer.appendChild(outTable);
	
	let outTr = document.createElement("TR");
	outTable.appendChild(outTr);
	
	//table logo and social media link
	let outTd1 = document.createElement("TD");
	outTd1.setAttribute("valign", "center");
	outTd1.setAttribute("align", "center");
	outTr.appendChild(outTd1);
	
	//tr logo
	let inTable1 = document.createElement("TABLE");
	outTd1.appendChild(inTable1);
	
	let inTr1_1 = document.createElement("TR");
	inTable1.appendChild(inTr1_1);
	
	let inTh1_1 = document.createElement("TH");
	inTr1_1.appendChild(inTh1_1);
	
	let imglogo1 = document.createElement("IMG");
	imglogo1.setAttribute("src", "images/footer/Logo-removebg1.png");
	imglogo1.setAttribute("alt", "logo");
	imglogo1.setAttribute("width", 25);
	imglogo1.setAttribute("height", 25);
	inTh1_1.appendChild(imglogo1);
	
	let inTh1_2 = document.createElement("TH");
	inTh1_2.setAttribute("colspan", "2");
	inTr1_1.appendChild(inTh1_2);
	
	let imglogo2 = document.createElement("IMG");
	imglogo2.setAttribute("src", "images/footer/Logo-removebg2.png");
	imglogo2.setAttribute("alt", "logo");
	imglogo2.setAttribute("width", 150);
	imglogo2.setAttribute("height", 25);
	inTh1_2.appendChild(imglogo2);
	
	//tr social media link
	let inTr1_2 = document.createElement("TR");
	inTable1.appendChild(inTr1_2);
	
	//fb link
	let inTd1_1 = document.createElement("TD");
	inTd1_1.setAttribute("style", "text-align:right;");
	inTr1_2.appendChild(inTd1_1);
	
	let fbLink = document.createElement("A");
	fbLink.setAttribute("href", "https://www.facebook.com/sanjosestate/");
	inTd1_1.appendChild(fbLink);
	
	let imgfb = document.createElement("IMG");
	imgfb.setAttribute("src", "images/footer/fb_icon.png");
	imgfb.setAttribute("alt", "fbicon");
	imgfb.setAttribute("width", 30);
	imgfb.setAttribute("height", 30);
	fbLink.appendChild(imgfb);
	
	//ig link
	let inTd1_2 = document.createElement("TD");
	inTd1_2.setAttribute("style", "text-align:right;");
	inTr1_2.appendChild(inTd1_2);
	
	let igLink = document.createElement("A");
	igLink.setAttribute("href", "https://www.instagram.com/sjsu/?hl=zh-tw");
	inTd1_2.appendChild(igLink);
	
	let imgig = document.createElement("IMG");
	imgig.setAttribute("src", "images/footer/ig_icon.png");
	imgig.setAttribute("alt", "igicon");
	imgig.setAttribute("width", 25);
	imgig.setAttribute("height", 25);
	igLink.appendChild(imgig);
	
	//twitter link
	let inTd1_3 = document.createElement("TD");
	inTd1_3.setAttribute("style", "text-align:right;");
	inTr1_2.appendChild(inTd1_3);
	
	let twLink = document.createElement("A");
	twLink.setAttribute("href", "https://twitter.com/sjsu");
	inTd1_3.appendChild(twLink);
	
	let imgtw = document.createElement("IMG");
	imgtw.setAttribute("src", "images/footer/twitter_icon.png");
	imgtw.setAttribute("alt", "twicon");
	imgtw.setAttribute("width", 25);
	imgtw.setAttribute("height", 25);
	twLink.appendChild(imgtw);
	
	//table contact info
	//tr contact head text
	let outTd2 = document.createElement("TD");
	outTd2.setAttribute("valign", "top");
	outTd2.setAttribute("align", "center");
	outTr.appendChild(outTd2);
	
	let inTable2 = document.createElement("TABLE");
	outTd2.appendChild(inTable2);
	
	let inTr2_1 = document.createElement("TR");
	inTr2_1.setAttribute("style", "height:50px; text-align:left;");
	inTable2.appendChild(inTr2_1);
	
	let inTh2 = document.createElement("TH");
	inTh2.setAttribute("colspan", "2");
	inTr2_1.appendChild(inTh2);
	
	let heading3_1 = document.createElement("H3");
	inTh2.appendChild(heading3_1);
	
	let txthd1 = document.createTextNode("Contact us");
	heading3_1.appendChild(txthd1);
	
	//tr contact body text
	//email icon
	let inTr2_2 = document.createElement("TR");
	inTr2_2.setAttribute("style", "height:50px;");
	inTable2.appendChild(inTr2_2);
	
	let inTd2_1 = document.createElement("TH");
	inTr2_2.appendChild(inTd2_1);
	
	let imgemail = document.createElement("IMG");
	imgemail.setAttribute("src", "images/footer/email_icon.png");
	imgemail.setAttribute("alt", "emailicon");
	imgemail.setAttribute("width", 30);
	imgemail.setAttribute("height", 30);
	inTd2_1.appendChild(imgemail);
	//email info
	let inTd2_2 = document.createElement("TH");
	inTr2_2.appendChild(inTd2_2);
	
	let heading4_1 = document.createElement("H4");
	inTd2_2.appendChild(heading4_1);
	
	let txtinfo1 = document.createTextNode("info@superestate.com");
	heading4_1.appendChild(txtinfo1);
	
	//phone icon
	let inTr2_3 = document.createElement("TR");
	inTr2_3.setAttribute("style", "height:50px;");
	inTable2.appendChild(inTr2_3);
	
	let inTd2_3 = document.createElement("TH");
	inTr2_3.appendChild(inTd2_3);
	
	let imgphone = document.createElement("IMG");
	imgphone.setAttribute("src", "images/footer/phone_icon.png");
	imgphone.setAttribute("alt", "phoneicon");
	imgphone.setAttribute("width", 30);
	imgphone.setAttribute("height", 30);
	inTd2_3.appendChild(imgphone);
	//phone info
	let inTd2_4 = document.createElement("TH");
	inTr2_3.appendChild(inTd2_4);
	
	let heading4_2 = document.createElement("H4");
	inTd2_4.appendChild(heading4_2);
	
	let txtinfo2 = document.createTextNode("(408)859-7420");
	heading4_2.appendChild(txtinfo2);
	
	//address icon
	let inTr2_4 = document.createElement("TR");
	inTr2_4.setAttribute("style", "height:50px;");
	inTable2.appendChild(inTr2_4);
	
	let inTd2_5 = document.createElement("TH");
	inTr2_4.appendChild(inTd2_5);
	
	let imgadd = document.createElement("IMG");
	imgadd.setAttribute("src", "images/footer/map_icon.png");
	imgadd.setAttribute("alt", "mapicon");
	imgadd.setAttribute("width", 30);
	imgadd.setAttribute("height", 25);
	inTd2_5.appendChild(imgadd);
	//address info
	let inTd2_6 = document.createElement("TH");
	inTr2_4.appendChild(inTd2_6);
	
	let heading4_3 = document.createElement("H4");
	inTd2_6.appendChild(heading4_3);
	
	let txtinfo3 = document.createTextNode("2836 Walnut Grove Ave,");
	heading4_3.appendChild(txtinfo3);
	let br=document.createElement("BR");
	heading4_3.appendChild(br);
	let txtinfo3_2 = document.createTextNode("San Jose, CA, 95128");
	heading4_3.appendChild(txtinfo3_2);
	
	//table update
	//tr update head text
	let outTd3 = document.createElement("TD");
	outTd3.setAttribute("valign", "top");
	outTd3.setAttribute("align", "center");
	outTr.appendChild(outTd3);
	
	let inTable3 = document.createElement("TABLE");
	outTd3.appendChild(inTable3);
	
	let inTr3_1 = document.createElement("TR");
	inTr3_1.setAttribute("style", "height:50px; text-align:left;");
	inTable3.appendChild(inTr3_1);
	
	let inTh3 = document.createElement("TH");
	inTr3_1.appendChild(inTh3);
	
	let heading3_2 = document.createElement("H3");
	inTh3.appendChild(heading3_2);
	
	let txthd2 = document.createTextNode("For updates");
	heading3_2.appendChild(txthd2);
	
	//tr form
	let inTr3_2 = document.createElement("TR");
	inTr3_2.setAttribute("style", "height:30px;");
	inTable3.appendChild(inTr3_2);
	
	let inTd3_1 = document.createElement("TD");
	inTr3_2.appendChild(inTd3_1);
	
	let formSub = document.createElement("FORM");
	formSub.setAttribute("id", "inputform");
	inTd3_1.appendChild(formSub);
	
	let input1 = document.createElement("INPUT");
	input1.setAttribute("id", "useremail");
	input1.setAttribute("type", "email");
	input1.setAttribute("value", "example@gmail.com");
	input1.setAttribute("required", "required");
	formSub.appendChild(input1);
	let br2 = document.createElement("BR");
	formSub.appendChild(br2);
	
	//input button
	let input2 = document.createElement("INPUT");
	input2.setAttribute("id", "subscribe");
	input2.setAttribute("type", "submit");
	input2.setAttribute("value", "SUBSCRIBE");
	input2.setAttribute("onclick", "buttonPressed()");
	formSub.appendChild(input2);
	
	//copyright
	let p = document.createElement("p");
	p.setAttribute("style", "float:right;color:black;margin:3px;");
	footer.appendChild(p);
	
	let txtword = document.createTextNode("© 2020 Superestate Corp. All rights reserved.");
	p.appendChild(txtword);
	
	document.body.insertBefore(footer, document.body.nextSibling);
}

function buttonPressed() 
{
	var inputemail = document.getElementById("useremail").value;
	if (inputemail.includes("@"))
		window.alert("Thanks for subscribing to our newsletter!!");
	else
		window.alert("Please enter a valid email address!");
}
