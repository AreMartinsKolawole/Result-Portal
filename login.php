<?php
    require_once("includes/connection.php");
    require_once("includes/functions.php");
?>
<?php
    $error = array();
    $date = date('d/M/Y');
    $year = date('Y');
    if(isset($_POST['login_btn'])){
        $login_id = inject_checker($connection, $_POST['login_id']);
        $login_password = inject_checker($connection, $_POST['login_password']);
        
        if(empty($login_id)){
            $error[] = "Registration Number is Required";
        }
        if(empty($login_password)){
            $error[] = "Password is Required";
        }
        if(empty($error)){
			$query = " SELECT * FROM `users` WHERE `email` = '{$login_id}' AND `password` = '{$login_password}' ";
			$run_query = mysqli_query($connection, $query);
			if(mysqli_num_rows($run_query) == 1){
				session_start();
				
				while($result = mysqli_fetch_assoc($run_query)){
					$user_id = $result['id'];
					$_SESSION['admin'] = $user_id;
					
					header("Location:staff_dashboard.php");
				}
			}

			$query = " SELECT * FROM `students` WHERE `reg_number` = '{$login_id}' AND `gen_password` = '{$login_password}' ";
			$run_query = mysqli_query($connection, $query);
			if(mysqli_num_rows($run_query) == 1){
				session_start();
				
				while($result = mysqli_fetch_assoc($run_query)){
					$student_id = $result['id'];
					$_SESSION['student'] = $student_id;
					
					header("Location:student_dashboard.php");
				}
			}	 
            
            $query = " SELECT * FROM `teachers` WHERE `email` = '{$login_id}' AND `password` = '{$login_password}' ";
			$run_query = mysqli_query($connection, $query);
			if(mysqli_num_rows($run_query) == 1){
				session_start();
				
				while($result = mysqli_fetch_assoc($run_query)){
					$user_id = $result['id'];
					$_SESSION['admin'] = $user_id;
					
					header("Location:teacher_dashboard.php");
				}
			}
            
            
            
            else {
                $msg = "Login Failed. Invalid Credentials!";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>SURE FOUNDATION COMPREHENSIVE COLLEGE - Login</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/bootstrap.css'>
    <link rel='stylesheet' href='css/font-awesome.css'>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            text-align: center;
        }
        .logo img {
            width: 100px;
            margin-bottom: 10px;
        }
        .login-title {
            font-size: 20px;
            margin-bottom: 20px;
            color: #444;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            height: 40px;
        }
        .login-btn {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="img/logo.jpg" alt="SURE FOUNDATION COMPREHENSIVE COLLEGE">
        </div>
        <h2 class="login-title">Login</h2>
        <?php
            if(isset($msg)){
                echo "<p style='color:red;'>$msg</p>";
            }
        ?>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" name="login_id" placeholder="Registration Number" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="login_password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" name="login_btn" class="btn login-btn">Login</button>
        </form>
        <p class="footer">SURE FOUNDATION COMPREHENSIVE COLLEGE.<br>2024</p>
    </div>
</body>
</html>
