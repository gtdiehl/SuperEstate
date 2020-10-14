const homeData = [
   {
   "ref": 1,
   "Street": "692 Gale Dr",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 3,
   "Bathrooms": 2,
   "Price": 900000,
   "Type": "Condo",
   "Rank": 1,
   "image": "images/ref1.jpg"
   },
   {
   "ref": 2,
   "Street": "605 El Patio Dr",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 2,
   "Bathrooms": 1,
   "Price": 800000,
   "Type": "Manufactured",
   "Rank": 2,
   "image": "images/ref2.jpg"
   },
   {
   "ref": 3,
   "Street": "999 Linda Dr",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 5,
   "Bathrooms": 3,
   "Price": 1250000,
   "Type": "House",
   "Rank": 3,
   "image": "images/ref3.jpg"
   },
   {
   "ref": 4,
   "Street": "704 Duncanville Ct",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 3,
   "Bathrooms": 3,
   "Price": 775000,
   "Type": "House",
   "Rank": 4,
   "image": "images/ref4.jpg"
   },
   {
   "ref": 5,
   "Street": "184 Lu Anne Dr",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 1,
   "Bathrooms": 1,
   "Price": 550000,
   "Type": "Condo",
   "Rank": 5,
   "image": "images/ref5.jpg"
   },
   {
   "ref": 6,
   "Street": "N 1st St",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 2,
   "Bathrooms": 1,
   "Price": 650000,
   "Type": "Manufactured",
   "Rank": 6,
   "image": "images/ref6.jpg"
   },
   {
   "ref": 7,
   "Street": "775 Almarida",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 2,
   "Bathrooms": 1,
   "Price": 625000,
   "Type": "Condo",
   "Rank": 7,
   "image": "images/ref7.jpg"
   },
   {
   "ref": 8,
   "Street": "1067 Erin Way",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 3,
   "Bathrooms": 1.5,
   "Price": 750000,
   "Type": "TownHouse",
   "Rank": 8,
   "image": "images/ref8.jpg"
   },
   {
   "ref": 9,
   "Street": "134 Salice Way",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 6,
   "Bathrooms": 7,
   "Price": 1500000,
   "Type": "House",
   "Rank": 9,
   "image": "images/ref9.jpg"
   },
   {
   "ref": 10,
   "Street": "91 N 1st St",
   "City": "San Jose",
   "ZIP": 95125,
   "Bedrooms": 1,
   "Bathrooms": 1,
   "Price": 925000,
   "Type": "Condo",
   "Rank": 10,
   "image": "images/ref10.jpg"
   }
]

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function sortByProperty(property){  
    return function(a,b){  
       if(a[property] > b[property])  
          return 1;  
       else if(a[property] < b[property])  
          return -1;  
   
       return 0;  
    }  
 }