window.addEventListener("DOMContentLoaded", domLoaded);

// When the DOM has finished loading, add the event listeners.
function domLoaded() {

   //Get DOM elements
   const convertButton = document.getElementById("convertButton");
   const C_in = document.getElementById("C_in");
   const F_in = document.getElementById("F_in");

   // Add event listener to convert button
   convertButton.addEventListener("click", function() {
      handleConversion();
   });

   // add event listener to clear opposite box that was not clicked
   C_in.addEventListener("input", function() {
      F_in.value = ""; //Clear F input box
   });
   F_in.addEventListener("input", function() {
      C_in.value = ""; //Clear C input box
   });
}


function convertCtoF(C) { // Farenheit coversion
   return (C * 9/5) + 32;
}

function convertFtoC(F) { // Celsius conversion
   return (F - 32) * 5/9;
}
//handleConversion and provide the correct weather icon based on fahrenheit temperature
function handleConversion() {
   const C_in = document.getElementById("C_in");
   const F_in = document.getElementById("F_in");
   const C = parseFloat(C_in.value);
   const F = parseFloat(F_in.value);

   if (!isNaN(C)) { //convert C to F if C is a number
      const F_converted = convertCtoF(C);
      F_in.value = F_converted.toFixed(2); // Update F input box with converted value
      updateWeatherIcon(F_converted);
      message.textContent = ""; // Clear the message on successful conversion
   } else if (!isNaN(F)) { //convert F to C if F is a number
      const C_converted = convertFtoC(F);
      C_in.value = C_converted.toFixed(2); // Update C input box with converted value
      updateWeatherIcon(F);
      message.textContent = ""; // Clear the message on successful conversion
   } else {
      // If neither input is a valid number or fields are blank, alert the user
      message.textContent = "Enter a temperature to convert";
      updateWeatherIcon(null); // Update icon to default
   }
}

//Update weather icon based on temperature in Fahrenheit
function updateWeatherIcon(F) {
   const weatherIcon = document.getElementById("weatherIcon");
   console.log(F);
   if (F === null) {
      weatherIcon.src = "images/C-F.png"; // Default icon when both fields are blank
      return;
   } 
   
   if (F >= 200 || F <= -200) {
      weatherIcon.src = "images/dead.png"; // Dead icon
   } else if (F >= 90 && F < 200) {
      weatherIcon.src = "images/hot.png"; // Hot icon
   } else if (F <= 32 && F > -200) {
      weatherIcon.src = "images/cold.png"; // Cold icon
   } else {
      weatherIcon.src = "images/cool.png"; // Cool icon
   }
}
