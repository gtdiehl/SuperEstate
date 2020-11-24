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
