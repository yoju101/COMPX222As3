<?php
   // Report all errors
   ini_set("error_reporting",E_ALL);
?>
<?php
   // Create new session or connect to existing one
   session_start()
?>
<?php
      //we check if there is already cookies for the variables on the computer 
        if(isset($_COOKIE["FName"]))
        $FName=$_COOKIE["FName"];
        else
        $FName = 1;
        if(isset($_COOKIE["SName"]))
        $SName=$_COOKIE["SName"];
        else
        $SName = 1;

        // if(isset($_COOKIE["NHI"]))
        // $NHI=$_COOKIE["NHI"];
        // else
        // $NHI = 1;
        if( isset( $_SESSION['NHI'] ) ) {
          $_SESSION['NHI'] = $NHI;
        }
        echo "the cookie is done " 
        ?>
        <?php
        // get the data that was posted  
           $FName=$_POST["FName"];
           $SName=$_POST["SName"];
           $NHI=$_POST["NHI"];
           $Respiratory=$_POST["Respiratory"];
           $Cardiovascular=$_POST["Cardiovascular"];
           $CNS=$_POST["central nervous system"];
           $Coagulation=$_POST["Coagulation"];
           $Liver=$_POST["Liver"];
           $Kidneys=$_POST["Kidneys"];
           ?>
           <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOFA Score Calculator</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>SOFA Score Calculator</h1>
    <form  method="post">
        <h2>Patient Details</h2>
    </form>

    <form  method="post">
        <p>This is your SOFA Score Calculated based on the input provided. </p> 
           
    </form>
