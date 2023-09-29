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
            <label for="respiratory_binary">Is the patient using mechanical ventilation and What is your Respiratory System rate PaO2/FiO2 mmHg</label>
            <select id="respiratory_binary" name="respiratory_binary">
            <option id="respiratory_binaryYes" value="YES">Yes</option>
            <option id="respiratory_binaryNo" value="NO ">No</option>
            
        <label for="respiratory_numeric"></label>
        <input type="number" id="respiratory_numeric" name="respiratory_numeric" step="0.01" required placeholder="e.g. 400 mmHg" >

        <h2>Nervous System</h2>
    <label for="nervous_numeric">Central nervous system (Glasgow coma scale)</label>
    <input type="number" id="nervous_numeric" name="nervous_numeric" step="0.01" placeholder =" e.g. 15" >

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
    <!--  Liver -->
    <h2>Liver</h2>  
    <label for="liver">Liver only (Bilirubin (mg/dl))</label>
    <input type="number" id="liver" name="liver" step="0.01" placeholder =" e.g. 1.2 mg/dl">


    <!--  Coagulation -->
    <h2>Coagulation</h2>
    <label for="coagulation">Coagulation (Platelets×10^3/μl)</label>
    <input type="number" id="coagulation" name="coagulation" step="0.01" placeholder =" e.g. 150 10^3/μl">

    <!--  Kidneys -->
   
    <h2>Kidneys</h2>
    <label for="kidneys">Kidneys function only (Creatinine (mg/dl))</label>
    <input type="number" id="kidneys" name="kidneys"  step="0.01" placeholder =" e.g. 1.2 mg/dl">

    <input type="submit" value="Calculate Score">
    <input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" /> 
     </form>
</body>

</html>
