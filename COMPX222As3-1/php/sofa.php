<script>
    //gobal varibales
            var selectedRespiratoryValue = 400;
            var selectedRespiratoryBool = "No"; //defult value
            var Cardiovascular = 70;
            var CNS = 15;
            var Coagulation = 150;
            var Liver = 1.2;
            var Kidneys = 1.2;
</script>

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
    <form  method="post">
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
    </form>

    <form id="respiratory" action="result.php" method="post">
        <h2>Respiratory System</h2>
        <label for="respiratory_binary">Is the patient using mechanical ventilation?</label>
        <select id="respiratory_binary" name="respiratory_binary" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <label for="respiratory_numeric">What is your Respiratory System rate PaO2/FiO2 mmHg</label>
        <input type="number" id="respiratory_numeric" name="respiratory_numeric" required placeholder="e.g. 400 mmHg" >
        
        <script>

            document.getElementById('respiratory_numeric').addEventListener('input', function() {
            selectedRespiratoryValue =document.getElementById('respiratory_numeric').value;
            console.log(selectedRespiratoryValue , "the respiratory_numeric value ");
            
        });
        document.getElementById('respiratory_binary').addEventListener('input', function() {
            selectedRespiratoryValue =document.getElementById('respiratory_binary').value;
            console.log(selectedRespiratoryValue , " venterlator yes or no");
        });
        </script>


        <h2>Nervous System</h2>
    <label for="nervous_numeric">Central nervous system (Glasgow coma scale)</label>
    <input type="number" id="nervous_numeric" name="nervous_numeric"  placeholder =" e.g. 15" >

    <script>

            document.getElementById('nervous_numeric').addEventListener('input', function() {
            selectedRespiratoryValue =document.getElementById('nervous_numeric').value;
            console.log(selectedRespiratoryValue , "the nervous_numeric value ");
            
        });
       
        </script>

    <!-- Cardiovascular System -->
    <h2>Cardiovascular System</h2>
    <label for="cardiovascular1">Cardiovascular system (Mean arterial pressure OR administration of vasopressors required):</label>
    <input type="number" id="cardiovascular1" name="cardiovascular1"  placeholder =" e.g. 70 mmHg">
    <label for="cardiovascular2">Parameter 2:</label>
    <input type="number" id="cardiovascular2" name="cardiovascular2">
    <!-- Add inputs for the remaining cardiovascular parameters as needed -->

    <!--  Liver -->
    <h2>Liver</h2>  
    <label for="liver">Liver (Bilirubin (mg/dl))</label>
    <input type="number" id="liver" name="liver"  placeholder =" e.g. 1.2 mg/dl">

    <!--  Coagulation -->
    <h2>Coagulation</h2>
    <label for="coagulation">Coagulation (Platelets×10^3/μl)</label>
    <input type="number" id="coagulation" name="coagulation"  placeholder =" e.g. 150 10^3/μl">

    <!--  Kidneys -->
    <h2>Kidneys</h2>
    <label for="kidneys">Kidneys function (Creatinine (mg/dl))</label>
    <input type="number" id="kidneys" name="kidneys"  placeholder =" e.g. 1.2 mg/dl">

    <input type="submit" value="Calculate Score">
    <input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" /> 
     </form>
    
</body>

</html>
