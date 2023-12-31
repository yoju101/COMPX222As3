<!-- set the error checking  -->
<!-- <?php
parse_str(implode('&', array_slice($argv, 1)), $_POST);
ini_set("error_reporting",E_ALL);
session_start();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>SOFA Score Calculator</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h1>SOFA Score Calculator</h1>
    <div id="pageInfo"> 
        <h2>About the SOFA Score</h2>
        <p>
            <!-- the information about the page  -->
              This definition is based on Wikipedia's explanation<br>
               The purpose of the SOFA Score is to determine rate of organ failure.
               <br>
              It is a test that is used to help track a patient's medical status which in the ICU (intensive care unit).
              The score is based on six different scores, one each for the respiratory, cardiovascular, hepatic, coagulation, renal and neurological systems. 
              The information below is being used to determined that score based on the answers provided.
          </br>
        </p>
    </div>
    <!-- The variables for the cookies -->
    <?php
        $FName=$_POST["FName"];
        $SName=$_POST["SName"];
        $NHI=$_SESSION["NHI"];
      ?>
      <!-- This checks that we dont have the data saved on the pc -->
        <?php
            if(!isset($_COOKIE[$FName])) {
                
            } else {
                
            }
            if(!isset($_COOKIE[$SName])) {
                
            } else {
                
                echo "Value is: " . $_COOKIE[$SName];
            }
            if(!isset($_COOKIE[$NHI])) {
            } else {
                echo "Value is: " . $_COOKIE[$NHI];
            }

            if(isset($_COOKIE["FName"]))
            $FName=$_COOKIE["FName"];
            else
            $FName = 1;
            if(isset($_COOKIE["SName"]))
            $SName=$_COOKIE["SName"];
            else
            $SName = 1;
            if( isset( $_SESSION['NHI'] ) ) {
              $_SESSION['NHI'] = $NHI;
            }
            ?>
     <form method="POST" action="sofa.php"> 
        <!-- <form method="POST" action="sofa.html"> -->
        <label for="nhi">NHI number:</label>
        <input type="text" id="nhi" name="nhi" pattern="[A-Z]{3}[0-9]{4}" required value=<?php echo $_SESSION["NHI"];?>>
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required value=<?php echo $_POST["SName"];?>>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required value=<?php echo $_POST["FName"];?>>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
        <?php
            // destory the session for the nhi number to not be remembered 
            session_destroy();
            ?>
    </form>
    <script src="js/script.js"></script>
</body>
</html>
