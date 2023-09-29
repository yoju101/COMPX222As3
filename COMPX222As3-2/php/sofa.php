 <?php
   // Report all errors
   ini_set("error_reporting",E_ALL);
?> 
 <?php
   // Create new session or connect to existing one
   session_start()
?> 
<?php
   // Report all errors
   ini_set("error_reporting",E_ALL);
?>
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate form data
    $NHI = $_POST["nhi"];
    $SName = $_POST["surname"];
    $FName = $_POST["firstname"];

    // Set cookies
    setcookie("patient-nhi", $NHI, time() + 3600, "/");
    setcookie("patient-surname", $SName, time() + 3600, "/");
    setcookie("patient-firstname", $FName, time() + 3600, "/");
}
?> 
<!-- The variables for the cookies -->
<?php
$respiratory_binary=$_POST["respiratory_binary"];
$respiratory_numeric=$_POST["respiratory_numeric"];

$normal=$_POST["normal"];
$dopamine =$_POST["dopamine "];
$epinephrine=$_POST["epinephrine"];
$norepinephrine=$_POST["norepinephrine"];
$low_MAP=$_POST["low_MAP"];

$nervous_numeric=$_POST["nervous_numeric"];
$Coagulation=$_POST["Coagulation"];
$liver=$_POST["liver"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOFA Score Calculator</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
</head>
            
<body>
    <h1>SOFA Score Calculator</h1>
    <!-- <form  method="post" action="result.php">
        <h2>Patient Details</h2>
         Add inputs for each component here -->
        <!-- <?php
            // dump the post array to see what's there for testing
            //var_dump($_POST);
            // get the data that was posted 
        //    $FName = $_POST["firstname"];
        //    $SName=$_POST["surname"];
        //    $NHI=$_POST["nhi"];
        //    echo "<pre>";
        //    echo "This is the First Name provided: $FName \r\n";
        //    echo "This is the Surname provided: $SName \r\n";
        //    echo "This is the NHI number provided: $NHI \r\n";
        //    echo "</pre>";
        // ?>  -->
    <!-- </form>  -->
    <div id="pageDetails"> 
    <h2>Patient Details</h2>
        <!-- Add inputs for each component here -->
        <?php
            // dump the post array to see what's there for testing
            //var_dump($_POST);
            // get the data that was posted 
           $FName = $_POST["firstname"];
           $SName=$_POST["surname"];
           $NHI=$_POST["nhi"];
           echo "<pre>";
           echo "This is the First Name provided: $FName \r\n";
           echo "This is the Surname provided: $SName \r\n";
           echo "This is the NHI number provided: $NHI \r\n";
           echo "</pre>";
        ?> 
    </div>

    <form id="respiratory"  method="post" action="result.php" onsubmit="return validateForm()">
        <h2>Respiratory System</h2>
        <!-- <label for="respiratory_binary">Is the patient using mechanical ventilation?</label>
        <select id="respiratory_binary" name="respiratory_binary" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select> -->
        
            <label for="respiratory_binary">Is the patient using mechanical ventilation and What is your Respiratory System rate PaO2/FiO2 mmHg</label>
            <!-- <input type="checkbox" id="respiratory_binary" name="respiratory_binaryYes" value="Yes" > 
            <input type="checkbox" id="respiratory_binary" name="respiratory_binaryNo" value="No" >  -->

            <select id="respiratory_binary" name="respiratory_binary">
            <option id="respiratory_binaryYes" value="YES">Yes</option>
            <option id="respiratory_binaryNo" value="NO ">No</option>
            
        <label for="respiratory_numeric"></label>
        <input type="number" id="respiratory_numeric" name="respiratory_numeric" step="0.01" required placeholder="e.g. 400 mmHg" >
        
        <!-- <script>
            document.getElementById('respiratory_numeric').addEventListener('input', function() {
            selectedRespiratoryValue =document.getElementById('respiratory_numeric').value;
            console.log(selectedRespiratoryValue , "the respiratory_numeric value ");
            
        });
        document.getElementById('respiratory_binary').addEventListener('change', function() {
            selectedRespiratoryBool = document.getElementById('respiratory_binary').value;
            console.log(selectedRespiratoryBool , "checked status");
        });
        </script> -->


        <h2>Nervous System</h2>
    <label for="nervous_numeric">Central nervous system (Glasgow coma scale)</label>
    <input type="number" id="nervous_numeric" name="nervous_numeric" step="0.01" placeholder =" e.g. 15" >

    <!-- <script>
            document.getElementById('nervous_numeric').addEventListener('input', function() {
            selectedCNS =document.getElementById('nervous_numeric').value;
            console.log(selectedCNS , "the nervous_numeric value ");
        });
    </script> -->

    <!-- Cardiovascular System -->
    <!-- <h2>Cardiovascular System</h2>
    <label for="cardiovascular1">Cardiovascular system (Mean arterial pressure OR administration of vasopressors required):</label>
    <input type="number" id="cardiovascular1" name="cardiovascular1" step="0.01" required placeholder =" e.g. 80 mmHg">
    <label for="cardiovascular2">Parameter 2:</label>
    <input type="number" id="cardiovascular2" name="cardiovascular2">
    Add inputs for the remaining cardiovascular parameters as needed -->

    <h2>Cardiovascular System</h2>
    <label for="cardiovascular">Cardiovascular system:</label>
    <select id="cardiovascular" name="cardiovascular">
    <option id="normal" value="normal">Normal (Mean arterial pressure ≥ 70 mmHg)</option>
    <option id="dopamine" value="dopamine_low ">Dopamine ≤ 5 μg/kg/min or dobutamine (any dose)</option>
    <option id="dopamine" value="dopamine_high_5 ">Dopamine > 5 μg/kg/min</option>
    <option id="dopamine" value="dopamine_high_15 ">Dopamine > 15 μg/kg/min</option>
    <option id="epinephrine" value="epinephrine_low">Epinephrine ≤ 0.1 μg/kg/min</option>
    <option id="epinephrine" value="epinephrine_high">Epinephrine > 0.1 μg/kg/min</option>
    <option id="norepinephrine" value="norepinephrine_low">Norepinephrine ≤ 0.1 μg/kg/min</option>
    <option id="norepinephrine" value="norepinephrine_high">Norepinephrine > 0.1 μg/kg/min</option>
    <option id="low_MAP" value="low_MAP">MAP < 70 mmHg</option>
    </select>

    <!-- <script>
        document.getElementById('cardiovascular').addEventListener('change', function() {
            var selectedValue = this.value;
        
            // Use the selectedValue variable in your JavaScript logic
            console.log(selectedValue);
        });
    </script> -->

    <!--  Liver -->
    <h2>Liver</h2>  
    <label for="liver">Liver only (Bilirubin (mg/dl))</label>
    <input type="number" id="liver" name="liver" step="0.01" placeholder =" e.g. 1.2 mg/dl">

    <!-- <script>
        document.getElementById('liver').addEventListener('input', function() {
        selectedLiver =document.getElementById('liver').value;
        console.log(selectedLiver , "the liver value ");
    });
    </script> -->

    <!--  Coagulation -->
    <h2>Coagulation</h2>
    <label for="coagulation">Coagulation (Platelets×10^3/μl)</label>
    <input type="number" id="coagulation" name="coagulation" step="0.01" placeholder =" e.g. 150 10^3/μl">

    <!-- <script>
        document.getElementById('coagulation').addEventListener('input', function() {
        selectedCoagulation =document.getElementById('coagulation').value;
        console.log(selectedCoagulation , "the coagulation value ");
    });
    </script> -->

    <!--  Kidneys -->
   
    <h2>Kidneys</h2>
    <label for="kidneys">Kidneys function only (Creatinine (mg/dl))</label>
    <input type="number" id="kidneys" name="kidneys"  step="0.01" placeholder =" e.g. 1.2 mg/dl">

    <!-- <script>
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
</script> -->

    <!-- <script>
        document.getElementById('kidneys').addEventListener('input', function() {
        selectedKidneys =document.getElementById('kidneys').value;
        console.log(selectedKidneys , "the kidneys value ");
    });
    </script> -->

    <input type="submit" value="Calculate Score">
    <input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" /> 
     </form>
     <!-- <script>
        //gobal varibales
        var selectedRespiratoryValue = 400;
            var selectedRespiratoryBool = "No"; //defult value
            var selectedCardiovascular = 70;
            var selectedCNS = 15;
            var selectedCoagulation = 150;
            var selectedLiver = 1.2;
            var selectedKidneys = 1.2;
            var points = 0;
            var totalPoints = 0;

        function submitForm(){
            //testing that the values are saved in the varaiables correctly
            console.log(selectedRespiratoryBool , 'respetory bool');
            console.log(selectedRespiratoryValue , 'Respatory num');
            console.log(selectedCNS , 'nervious');
            console.log(selectedCardiovascular , 'heart');
            console.log(selectedLiver , 'liver');
            console.log(selectedCoagulation , 'platlets');
            console.log(selectedKidneys , 'kidneys');

            //submit for checks the valibity for the values and calls the calculate method
            calculate();
            points = 0;

        }
        function calculate(){
            //calls all the diffrent functions that calculates the points based on the input
            checkCNS();
            
            console.log(points , "this is the points after calling the two methods ");
        }
        function checkCNS(){
            console.log(points , "points value before checking the CNS value ");
           //checks the Nervous system
            if(selectedCNS == 15){
                points += 0; 
            }else if (selectedCNS >= 13 && selectedCNS <= 14) {
                 points += 1;
            } else if (selectedCNS >= 10 && selectedCNS <= 12) {
                    points += 2;
            } else if (selectedCNS >= 6 && selectedCNS <= 9) {
                points += 3;
            } else if (selectedCNS < 6) {
                points += 4;
            }
            console.log(points , "points value after checking cns vlaue");
            console.log(selectedCNS , "the value in the selectedCNS var after checking ");

            //to check the Respiratory 
            console.log(points , "points value before checking the Respiratory value ");
            if(selectedRespiratoryValue >= 400 ){
                points += 0; 
            }else if (selectedRespiratoryValue >= 301 && selectedRespiratoryValue <= 399) {
                 points += 1;
            } else if (selectedRespiratoryValue >= 201 && selectedRespiratoryValue <= 300 ) {
                    points += 2;
            } else if (selectedRespiratoryValue >= 101 && selectedRespiratoryValue <= 200 && selectedRespiratoryBool == "Yes") {
                points += 3;
            } else if (selectedRespiratoryValue < 100 && selectedRespiratoryBool == "Yes"){
                points += 4;
            }
            console.log(points , "points value after checking Respiratory  vlaue");
            console.log(selectedRespiratoryValue , selectedRespiratoryBool , "the value in the Respiratory  var after checking ");

            console.log(points , "points value before checking the platlet value ");
            if(selectedCoagulation >= 150){
                points += 0; 
            }else if (selectedCoagulation >= 100 && selectedCoagulation <= 149) {
                 points += 1;
            } else if (selectedCoagulation >= 50 && selectedCoagulation <= 99 ) {
                    points += 2;
            } else if (selectedCoagulation >= 20 && selectedCoagulation <= 49 ) {
                points += 3;
            } else if (selectedCoagulation <= 19){
                points += 4;
            }
            console.log(points , "points value after checking platlet vlaue");
            console.log(selectedCoagulation , "the value in the selectedCoagulation var after checking ");

            //to check the liver
            console.log(points , "points value before checking the liver value ");
            if(selectedLiver < 1.2){
                points += 0; 
            }else if (selectedLiver >= 1.2 && selectedLiver <= 1.9) {
                 points += 1;
            } else if (selectedLiver >= 2.0 && selectedLiver <= 5.9 ) {
                    points += 2;
            } else if (selectedLiver >= 6.0 && selectedLiver <= 11.9 ) {
                points += 3;
            } else if (selectedLiver > 12.0){
                points += 4;
            }
            console.log(points , "points value after checking liver vlaue");
            console.log(selectedLiver , "the value in the selectedLiver var after checking ");

            //to check the kidneys
            console.log(points , "points value before checking the kidneys value ");
            if(selectedKidneys < 1.2){
                points += 0; 
            }else if (selectedKidneys >= 1.2 && selectedKidneys <= 1.9) {
                 points += 1;
            } else if (selectedKidneys >= 2.0 && selectedKidneys <= 3.4 ) {
                    points += 2;
            } else if (selectedKidneys >= 3.5 && selectedKidneys <= 4.9 ) {
                points += 3;
            } else if (selectedKidneys > 5.0){
                points += 4;
            }
            console.log(points , "points value after checking kidneys vlaue");
            console.log(selectedKidneys , "the value in the kidneys var after checking ");
        }    
    </script> -->
</body>

</html>
