<?php
   // Report all errors
   ini_set("error_reporting",E_ALL);
?>
<?php
   // Create new session or connect to existing one
   session_start()
?>
<!-- <?php
      //we check if there is already cookies for the variables on the computer 
        // if(isset($_COOKIE["FName"]))
        // $FName=$_COOKIE["FName"];
        // else
        // $FName = 1;
        // if(isset($_COOKIE["SName"]))
        // $SName=$_COOKIE["SName"];
        // else
        // $SName = 1;

        // // if(isset($_COOKIE["NHI"]))
        // // $NHI=$_COOKIE["NHI"];
        // // else
        // // $NHI = 1;
        // if( isset( $_SESSION['NHI'] ) ) {
        //   $_SESSION['NHI'] = $NHI;
        // }
        // //echo "the cookie is done " 
        ?> -->

           <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and validate form data
            // $NHI = $_POST["nhi"];
            // $SName = $_POST["surname"];
            // $FName = $_POST["firstname"];
            $respiratory_binary=$_POST["respiratory_binary"];
            $respiratory_numeric=$_POST["respiratory_numeric"];

            $cardiovascular = $_POST["cardiovascular"];
            // $normal=$_POST["normal"];
            // $dopamine =$_POST["dopamine "];
            // $epinephrine=$_POST["epinephrine"];
            // $norepinephrine=$_POST["norepinephrine"];
            // $low_MAP=$_POST["low_MAP"];

            $nervous_numeric=$_POST["nervous_numeric"];
            $Coagulation=$_POST["coagulation"];
            $liver=$_POST["liver"];
            $kidneys=$_POST["kidneys"];

            // Set cookies
            // setcookie("patient-nhi", $NHI, time() + 3600, "/");
            // setcookie("patient-surname", $SName, time() + 3600, "/");
            // setcookie("patient-firstname", $FName, time() + 3600, "/");

            // setcookie("respiratory_binary", $respiratory_binary, time() + 3600, "/");
            // setcookie("respiratory_numeric", $respiratory_numeric, time() + 3600, "/");

            // setcookie("normal", $normal, time() + 3600, "/");
            // setcookie("dopamine", $dopamine, time() + 3600, "/");
            // setcookie("epinephrine", $epinephrine, time() + 3600, "/");
            // setcookie("norepinephrine", $norepinephrine, time() + 3600, "/");
            // setcookie("low_MAP", $low_MAP, time() + 3600, "/");

            // setcookie("nervous_numeric", $nervous_numeric, time() + 3600, "/");
            // setcookie("Coagulation", $Coagulation, time() + 3600, "/");
            // setcookie("liver", $liver, time() + 3600, "/");
        }
            ?>
           <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOFA Score Calculator</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>SOFA Score Calculator</h1>
    <form  method="post">
        <h2>Patient Details</h2>

        <?php
            // dump the post array to see what's there for testing
            //var_dump($_POST);
            // get the data that was posted 
           $FName = $_POST["firstname"];
           $SName=$_POST["surname"];
           $NHI=$_POST["nhi"];
           echo "<pre>";
           echo "The First name provided: ",$_COOKIE["patient-firstname"];
           echo "<pre>";
           echo "The Last name provided: " , $_COOKIE['patient-surname'];
           echo "<pre>";
           echo "The NHI provided: ", $_COOKIE['patient-nhi'];
           echo "<pre>";
           echo "Is the patient mechanically ventilated including CPAP? ", $_POST["respiratory_binary"];
           echo "<pre>";
            echo "Respiratory value [only mmHg]:", $_POST["respiratory_numeric"];
            echo "</pre>";

            // echo "Normal: $normal \r\n";
            // echo "Dopamine: $dopamine \r\n";
            // echo "Epinephrine: $epinephrine \r\n";
            // echo "Norepinephrine: $norepinephrine \r\n";
            // echo "Low MAP: $low_MAP \r\n";
            echo "Mean arterial pressure OR administration of vasopressors requireded: " ;
            echo "<pre>";
            echo $_POST["cardiovascular"];  
            echo "</pre>";
            echo "Central nervous system : " , $_POST["nervous_numeric"];
            echo "</pre>";
            echo "Platelets (×10^3/μl):" , $_POST["coagulation"];
            echo "</pre>";
            echo "Bilirubin (mg/dl) :", $_POST["liver"];
            echo "</pre>";
            echo "Creatinine (mg/dl): " , $_POST["kidneys"];
            echo "</pre>";
        ?> 
        
    </form>
    <?php
    $points = 0;

    
    //checks the Nervous system
    // echo "Points value before checking the CNS value: " . $points . "\n";
    // echo "</pre>";

        // Checks the Nervous system
        if ($nervous_numeric == 15) {
            $points += 0;
        } else if ($nervous_numeric >= 13 && $nervous_numeric <= 14) {
            $points += 1;
        } else if ($nervous_numeric >= 10 && $nervous_numeric <= 12) {
            $points += 2;
        } else if ($nervous_numeric >= 6 && $nervous_numeric <= 9) {
            $points += 3;
        } else if ($nervous_numeric < 6) {
            $points += 4;
        }

        // echo "Points value after checking CNS value: " . $points . "\n";
        // echo "</pre>";
        //Checks Respiratory System

            // echo "points value before checking the Respiratory value ". $points . "\n";
            // echo "</pre>";

            if ($respiratory_numeric >= 400) {
                $points += 0;
            } else if ($respiratory_numeric >= 301 && $respiratory_numeric <= 399) {
                $points += 1;
            } else if ($respiratory_numeric >= 201 && $respiratory_numeric <= 300) {
                $points += 2;
            } else if ($respiratory_numeric >= 101 && $respiratory_numeric <= 200 && $respiratory_binary == "Yes") {
                $points += 3;
            } else if ($respiratory_numeric < 100 && $respiratory_binary == "Yes") {
                $points += 4;
            }

            // echo "points value after checking Respiratory  vlaue     ". $points . "\n";
            // echo "</pre>";
            // echo "The value in the Respiratory var after checking:    " . $respiratory_numeric . " " . $respiratory_binary;
            // echo "</pre>";

            // For Cardiovascular
            // echo "Points value before checking the heart value ". $points . "\n";
            // echo "</pre>";

            if ($cardiovascular == "normal") {
                $points += 0; 
            } else if ($cardiovascular == "low_MAP") {
                $points += 1;
            } else if ($cardiovascular == "dopamine_low") {
                $points += 2;
            } else if ($cardiovascular == "dopamine_high_5" || $cardiovascular == "epinephrine_low" || $cardiovascular == "norepinephrine_low" ) {
                $points += 3;
            } else if ($cardiovascular == "dopamine_high_15" || $cardiovascular == "epinephrine_high" || $cardiovascular == "norepinephrine_high" ) {
                $points += 4;
            }

            // echo "Points value after checking platlet value". $points . "\n";
            // echo "</pre>";
            // echo "The value in the cardiovascular var after checking: " . $cardiovascular;
            // echo "</pre>";


             // For Coagulation
            // echo "Points value before checking the platlet value ". $points . "\n";
            // echo "</pre>";

            if ($Coagulation >= 150) {
                $points += 0; 
            } else if ($Coagulation >= 100 && $Coagulation <= 149) {
                $points += 1;
            } else if ($Coagulation >= 50 && $Coagulation <= 99 ) {
                $points += 2;
            } else if ($Coagulation >= 20 && $Coagulation <= 49 ) {
                $points += 3;
            } else if ($Coagulation <= 19) {
                $points += 4;
            }

            // echo "Points value after checking platlet value". $points . "\n";
            // echo "</pre>";
            // echo "The value in the selectedCoagulation var after checking: " . $Coagulation;
            // echo "</pre>";

            // For Liver
            // echo "Points value before checking the liver value ". $points . "\n";
            echo "</pre>";
            if ($liver < 1.2) {
                $points += 0; 
            } else if ($liver >= 1.2 && $liver <= 1.9) {
                $points += 1;
            } else if ($liver >= 2.0 && $liver <= 5.9 ) {
                $points += 2;
            } else if ($liver >= 6.0 && $liver <= 11.9 ) {
                $points += 3;
            } else if ($liver > 12.0) {
                $points += 4;
            }

            // echo "Points value after checking liver value". $points . "\n";
            // echo "</pre>";
            // echo "The value in the liver var after checking: " . $liver;
            // echo "</pre>";
            // For Kidneys
            // echo "Points value before checking the kidneys value ". $points . "\n";
            // echo "</pre>";

            if ($kidneys > 0 && $kidneys < 1.2) {
                $points += 0; 
            } else if ($kidneys >= 1.2 && $kidneys <= 1.9) {
                $points += 1;
            } else if ($kidneys >= 2.0 && $kidneys <= 3.4 ) {
                $points += 2;
            } else if ($kidneys >= 3.5 && $kidneys <= 4.9 ) {
                $points += 3;
            } else if ($kidneys > 5.0) {
                $points += 4;
            }else{
                
            }
            // echo "Points value after checking kidneys value". $points . "\r\n"; 
            // echo "</pre>";
            // echo "The value in the kidneys var after checking: " . $kidneys;
            // echo "</pre>";
    ?>

    <form method="post">
        <p> </p>
        <p> </p> 
        <?php
            echo "This is your SOFA Score Calculated based on the input provided: " . $points;
        ?>
        <p> </p> 
        <input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" /> 
    </form>
