//Create global variables 
var selectedRespiratoryValue = 400;
var selectedRespiratoryBool = "NO"; //defult value
var Cardiovascular = 70;
var CNS = 15;
var Coagulation = 150;
var Liver = 1.2;
var Kidneys = 1.2;

document.getElementById('respiratory_numeric').addEventListener('input', function() {
  selectedRespiratoryValue =document.getElementById('respiratory_numeric').value;
  alert(selectedRespiratoryValue);
  console.log(selectedRespiratoryValue);

  // document.getElementById('respiratoryValue').textContent = selectedRespiratoryValue;
  // console.log(selectedRespiratoryValue, 'Respiratory Value');
});

// document.getElementById('respiratory_binary').addEventListener('change', function() {
//   selectedRespiratoryBool = document.getElementById('respiratory_binary').value;
//   console.log(selectedRespiratoryBool , 'respiratory_binary ');
// });
