<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main/assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="main/assets/plugins/css/bootstrap.min.css" />


  <title>POS</title>
</head>
<body>
<body>
  <div class="container">
    <div class="row">
    <?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">

          <div class="card-body p-4 p-sm-5">
            <img src="main/logo7.png" height="110px"/>
<form action="login.php" method="post" onSubmit="target_popup(this)"  >
        
            <?php $today = date('Y-m-d');
if($today > '2023-09-05'){
	echo "Your System Licence needs renew before 05/09/2023";
}
if($today >= '2023-09-05'){
	echo '<br />Kindly Contact the System Admin for Licence: 0711649109';
}else{
	
	?>
              <div class="form-floating mb-3">
                <input type="text"  name="username" class="form-control" 
                 >
                <label for="username">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" 
                id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

             
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold"  href="dashboard.html"
                 type="submit">Sign
                  in</button>
              </div>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</body>
</html>