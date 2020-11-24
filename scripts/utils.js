/**
 * Adds commas to a number for easier reading
 * Ex: 1234 => 1,234
 * Ex: 98765432 => 98,765,432
 * @param {string} x Value to be seperated by commas
 * @returns number string seperated with commas
 */
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// TODO: Remove function appears not to be used anymore
function sortByProperty(property){  
    return function(a,b){  
       if(a[property] > b[property])  
          return 1;  
       else if(a[property] < b[property])  
          return -1;  
   
       return 0;  
   }  
}