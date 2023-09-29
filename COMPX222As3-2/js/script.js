//Create global variables 
// var selectedRespiratoryValue = 400;
// var selectedRespiratoryBool = "NO"; //defult value
// var Cardiovascular = 70;
// var CNS = 15;
// var Coagulation = 150;
// var Liver = 1.2;
// var Kidneys = 1.2;

// document.getElementById('respiratory_numeric').addEventListener('input', function(){
//   selectedRespiratoryValue =document.getElementById('respiratory_numeric').value;
//   alert(selectedRespiratoryValue);
//   console.log(selectedRespiratoryValue);

  // document.getElementById('respiratoryValue').textContent = selectedRespiratoryValue;
  // console.log(selectedRespiratoryValue, 'Respiratory Value');
//});

// document.getElementById('respiratory_binary').addEventListener('change', function() {
//   selectedRespiratoryBool = document.getElementById('respiratory_binary').value;
//   console.log(selectedRespiratoryBool , 'respiratory_binary ');
// });

function validateForm() {
  var kidneysValue = document.getElementById("kidneys").value;
  var coagulationValue = document.getElementById("coagulation").value;
  var nervous_numeric = document.getElementById("nervous_numeric").value;
  var liver = document.getElementById("liver").value;
  var respiratory_numeric = document.getElementById("respiratory_numeric").value;
  
  if (kidneysValue >= 0 && coagulationValue >= 0 && nervous_numeric >= 0 && liver >= 0 && respiratory_numeric >= 0) {
  return true; // All values are valid, proceed with form submission
} else {
  var errorMessage = "";

  if (kidneysValue < 0) {
      errorMessage += "Error: Kidneys value must be a positive number.\n";
  }

  if (coagulationValue < 0) {
      errorMessage += "Error: Coagulation value must be a positive number.\n";
  }

  if (nervous_numeric < 0) {
      errorMessage += "Error: Nervous numeric value must be a positive number.\n";
  }

  if (liver < 0) {
      errorMessage += "Error: Liver value must be a positive number.\n";
  }

  if (respiratory_numeric < 0) {
      errorMessage += "Error: Respiratory numeric value must be a positive number.\n";
  }

  alert(errorMessage);
  return false; // Prevent form submission
}
}
