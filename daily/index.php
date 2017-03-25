<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Daily UI - Sign up (with AngularJS validation)</title>
    
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <body ng-app="MyApp">
  <div class="wrap" ng-controller="MainCtrl">
  
    <form name="formRegister" class="form--register"
            ng-submit="formRegister.$valid && !registerFormSubmitted && submitRegisterForm(user)" novalidate action="" method="POST">
        <fieldset>
          <legend class="serif">Create Channel</legend>
          
          <div class="input-group" ng-class="{'input--filled' : user.name}">
            <input class="input__field" id="formRegisterName" name="channel" type="text" 
                   ng-model="user.name" required>
            <label class="input__label" for="formRegisterName">
              <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
                <path d="m0,0l404,0l0,77l-404,0l0,-77z"></path>
              </svg>
              <span class="input__label-content">Channel Name</span>
            </label>
          </div>
<span class="input__label-content">Channel Type</span>
		<select name="typechannel">
<option value="1" ><font color = "black">Public</font></option>
<option value="2" color="black"><font color = "red">Private</font></option>
</select>

          
           <div class="input-group" ng-class="{'input--filled' : user.nam}">
            <input class="input__field" id="formRegisterNam" type="text" name="description"
                   ng-model="user.nam" required>
            <label class="input__label" for="formRegisterNam">
              <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
                <path d="m0,0l404,0l0,77l-404,0l0,-77z"></path>
              </svg>
              <span class="input__label-content">Description</span>
            </label>
          </div>

        </fieldset>
         

        <button class="button--submit"
                ng-class="{'disabled' : !formRegister.$valid, 'success': showSuccess }"
                type="submit">
       
       <span class="button--submit__label button--submit__default">
                  Create
                </span>
                <span class="button--submit__label button--submit__success">
                  <i class="fa fa-check"></i> Yay, success!
                </span>
        </button>
      </form>
    
    </div>
</body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>

<?php

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
$flag = 1;
$message = "";
if(isset($_POST['description']) and isset($_POST['channel']) and isset($_POST['typechannel'])){
$channel = $_POST["channel"];
$query = "select * from channels where channel='$channel'";
$result = mysql_query($query);

$typechannel = $_POST["typechannel"];

$description = $_POST["description"];

	$query = "INSERT INTO channelss (channel,typechannel,description) VALUES ('$channel','$typechannel','$description')";
//echo $query;
	$result = mysql_query($query);
	$message = "Registration successful";
}


?>



</html>
