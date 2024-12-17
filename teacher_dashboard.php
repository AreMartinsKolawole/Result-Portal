<?php
	ob_start();
	require_once("includes/staff_session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	date_default_timezone_set('Africa/Lagos');
	$date = date('d/M/Y');
	$select = "--select--";
	$oge = time();
	$time = date('H:i:s', $oge);
	$error = array();
	$year = date('Y');
?>
<?php
	//////////////////// GET teachers DATA FROM DATABASE AND DISPLAY IT ON DASHBOARD IF LOGIN IS SUCCESSFUL USING SESSION FROM LOGIN PAGE ////////////////
	$query = " SELECT * FROM `teachers` WHERE id = '{$_SESSION['admin']}' ";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$user_title = $result['title'];
			$user_fullname = ucwords($result['fullname']);
			$user_address = ucwords($result['address']);
			$user_phone = $result['phone'];
			$user_state = ucwords($result['state']);
			$user_lga = ucwords($result['lga']);
			$user_nationality = ucwords($result['nationality']);
			$user_email = $result['email'];
		
			if($user_title === "mr"){
				$gender = "Male";
			}
			elseif($user_title === "mrs"){
				$gender = "Female";
			}
			elseif($user_title === "miss"){
				$gender = "Female";
			}
			
			$msg_fullname = $user_fullname;
			$msg_title = $user_title;
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $user_fullname; ?></title>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
    <meta name='description" content="student registration' />
    <link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
    <link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
    <link type='text/css' rel='stylesheet' href='css/blink.css' />
    <link rel="shortcut icon" href="img/icon.png">
    <link rel='stylesheet' href='css/defined.css' />
    <script type='text/javascript' src='js/jquery-1.11.3.min.js'></script>
    <script type='text/javascript' src='js/blink.js'></script>
    <script src='js/bootstrap.js'></script>
    <style type="text/css">
    @media print {
        .noprint {
            display: none;
        }
    }

    /* @media screen {
        ...
    } */
    </style>
    <script type="text/javascript">
    window.onload = initClock;

    function initClock() {
        var now = new Date();
        var hr = now.getHours();
        var min = now.getMinutes();
        var sec = now.getSeconds();
        if (min < 10) min = "0" + min; // insert a leading zero
        if (sec < 10) sec = "0" + sec;
        document.getElementById('clockDisplay').innerHTML = "Time is " + hr + ":" + min + ":" + sec;
        setTimeout('initClock()', 500);
    }
    </script>
</head>

<body>
    <div class='container-fluid'>
        <header>
            <div class='row header noprint'>
                <div class='col-md-3 col-sm-3 col-xs-3'>
                    &nbsp;
                    <h5>Today: <?php echo $date; ?></h5>
                    <h4 class='blink'><span class='glyphicon glyphicon-cog'></span> Choose Action Below</h4>
                </div>

                <div class='col-md-6 col-sm-6 col-xs-6'>
                    <?php
							////////////// QUERY TO SHOW SCHOOL NAME /////////////////
							$query = " SELECT * FROM `administratives` ";
							$run_query = mysqli_query($connection, $query);
							
							if(mysqli_num_rows($run_query) > 0){
								while($result = mysqli_fetch_assoc($run_query)){
									$school_title = $result['school_name'];
									echo"<p class='text-center'><b><marquee>{$school_title}</marquee></b></p>";
								}
							}else{
								echo"<p class='text-center'><b><marquee>SPK POWERED BY TOXASWIFT</marquee></b></p>";
							}
						?>
                    <h2 class='text-center'><span class='glyphicon glyphicon-education'></span> Teacher - SURE FOUNDATION COMPREHENSIVE COLLEGE</h2>
                    <h4 class='text-center'>Welcome
                        <?php
								echo ucfirst($msg_title) ." " .$msg_fullname;
							?>
                    </h4>
                </div>

                <div class='col-md-3 col-sm-3 col-xs-3 logout'>
                    &nbsp;
                    <h5 class='text-right'><span id='clockDisplay'></span></h5>
                    <h4 class='text-right'><a href='teacher_dashboard.php?logout'><span
                                class='glyphicon glyphicon-lock'></span> Logout</a></h4>
                </div>
            </div>
        </header>
        <section class='row'>
            <br />
            <div class='col-md-2 col-sm-2 side_nav noprint'>
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a href="teacher_dashboard.php?view_profile"><span
                                class='glyphicon glyphicon-user'></span> View Profile</a></li>
                    <li role="presentation"><a href="teacher_dashboard.php?students_reg_no"><span
                                class='glyphicon glyphicon-eye-open'></span> Students</a></li>
                    <li role="presentation"><a href="teacher_dashboard.php?upload"><span
                                class='glyphicon glyphicon-cloud-upload'></span> Result Upload</a></li>
                    <li role="presentation"><a href="teacher_dashboard.php?logout"><span
                                class='glyphicon glyphicon-lock'></span> Logout</a></li>
                </ul>
            </div>

            <div class='col-md-10 col-sm-10'>
                <?php
                        if(isset($update_msg)){
                            echo "<p class='text-success'><b>{$update_msg}</b></p>";
                        }
                        if(isset($update_msg_error)){
                            echo "<p class='text-danger'><b>{$update_msg_error}</b></p>p>";
                        }
                    ?>
                <?php
						if(isset($_GET['view_profile'])){
							header("Location:teacher_dashboard.php");
						}
					elseif(isset($_GET['students_reg_no'])){
						echo"
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<div class='row'>
										<div class='col-md-8'>
											<h3 class='log-text'>Please Select Class to View Students</h3>
										</div>
										<div class='col-md-4'>
											<br />
											<form class='form-inline'>
												<div class='row'>
													<div class='col-md-6'>
														<div class='input-group'>
															<input type='text' name='search_bar_txt' placeholder='Search Student' class='form-control' />
														</div>
													</div>
													
													<div class='col-md-6'>
														<input type='submit' value='Search' class='btn btn-warning' />
													</div>
												</div>
											</form>
										</div>
									</div>";
									echo"
								</div>
								<div class='panel-body'>
									<form class='' method='POST' action='teacher_dashboard.php?students_reg_no'>
										<div class='row'>
											<div class='col-md-10'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>CLASS</span>
													<select class='form-control' name='reg_no_class'>
														<option selected> {$select} </option>";
														$query = " SELECT * FROM `classes` ";
														$run_query = mysqli_query($connection, $query);
														if(mysqli_num_rows($run_query) > 0){
															while($result = mysqli_fetch_assoc($run_query)){
																$target_classes = $result['classes'];
																echo"
																	<option>{$target_classes}</option>
																";
															}
														}
														echo"
													</select>
												</div>
											</div>
											<div class='col-md-2'>
												<input type='submit' name='get_reg_no_btn' id='submit' value='Get Details' class='btn btn-large btn-success login_btn text-center' />
											</div>
										</div>
									</form>
								</div>		
							</div>
							<div class='table-responsive'>
								<table class='table table-striped'>
									<thead>
										<tr class='bg-primary'>
											<th>S/N</th>
											<th>NAMES</th>
											<th>GENDER</th>
											<th>CLASS</th>
											<th>PHONE</th>
											<th>REG NUMBER</th>
											<th>PASSWORD</th>
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
										";
										//////////////////// POST ACTION TO GET ALL STUDENTS NAMES AND REGISTRATION NUMBER FROM A PARTICULAR CLASS //////////////////////
										if(isset($_POST['get_reg_no_btn'])){
											$reg_no_class = inject_checker($connection, $_POST['reg_no_class']);
											
											if($reg_no_class == $select){
												$reg_msg = "<h4 class='text-danger'><b>!!! Please select class to get registration number.</b></h4>";
												echo $reg_msg;
											}
											else{
												$query = " SELECT * FROM `students` WHERE `class` = '{$reg_no_class}' ORDER BY `reg_number` ASC ";
												$run_query = mysqli_query($connection, $query);
												if($run_query == true){
													if(mysqli_num_rows($run_query) > 0){
														$i = 0;
														while($result = mysqli_fetch_array($run_query)){
															$i++;
															$reg_no_id = $result['id'];
															$reg_no_firstname = $result['firstname'];
															$reg_no_lastname = $result['lastname'];
															$reg_no_othername = $result['othername'];
															$reg_no_class = $result['class'];
															$reg_reg_number = $result['reg_number'];
                                                            $reg_phone = $result['contact_phone'];
                                                            $reg_password = $result['gen_password'];
                                                            $reg_sex = ucfirst($result['gender']);
															
															$reg_name = ucwords("{$reg_no_firstname} {$reg_no_lastname} {$reg_no_othername}");
															echo"
																<tr>
																	<td>{$i}</td>
																	<td>{$reg_name}</td>
																	<td>{$reg_sex}</td>
																	<td>{$reg_no_class}</td>
																	<td>{$reg_phone}</td>
																	<td>{$reg_reg_number}</td>
																	<td>{$reg_password}</td>
																</tr>
															";
														}
													}else{
														$reg_msg = "<h4 class='text-danger'><b>!!! No Records Found in {$reg_no_class}</b></h4>";
														echo $reg_msg;
													}
												}
											}
								
											
										}else{
											///////////// POST ACTION TO DISPLAY ALL STUDENTS IN THE SCHOOL ////////////////
											$query = " SELECT * FROM `students` ORDER BY `class` LIMIT 50";
											$run_query = mysqli_query($connection, $query);
											if($run_query == true){
												if(mysqli_num_rows($run_query) > 0){
													$i = 0;
													while($result = mysqli_fetch_assoc($run_query)){
														$i++;
														$student_id = $result['id'];
														$student_firstname = $result['firstname'];
														$student_lastname = $result['lastname'];
														$student_othername = $result['othername'];
														$student_class = $result['class'];
														$student_reg_number = $result['reg_number'];
                                                        $student_phone = $result['contact_phone'];
                                                        $student_password = $result['gen_password'];
                                                        $student_sex = ucfirst($result['gender']);
														
														$full_name = ucwords("{$student_firstname} {$student_lastname} {$student_othername}");
														
														echo"
															<tr>
																<td>{$i}</td>
																<td>{$full_name}</td>
																<td>{$student_sex}</td>
																<td>{$student_class}</td>
																<td>{$student_phone}</td>
																<td>{$student_reg_number}</td>
																<td>{$student_password}</td>
															</tr>
														";
													}
												}else{
													echo "<h4 class='text-danger'><b>No Student has been registered in this portal...</b></h4>";
												}
											}
										
                                        }
                                        //////////// POST ACTION TO DELETE REGISTERED STUDENTS //////////////////////
										if(isset($_POST['all_student_delete_btn'])){
											$all_student_hidden_id = $_POST['all_student_hidden_id'];
											
											$query = " DELETE FROM `students` WHERE `id` = '{$all_student_hidden_id}' ";
											$run_query = mysqli_query($connection, $query);
											if($run_query == true){
												echo "<p class='text-success'><b>Student Deleted Successfully</b></p>";
											}else{
												echo "<p><b>Error! Could Not Delete Record</b></p>";
											}
										}
                                        /////////////////////////////// POST ACTION TO GET A PATICULAR STUDENT DETAILS IF EDIT BUTTON IS CLICKED ///////////////////////////
                                        if(isset($_POST['edit_btn'])){
                                            $all_student_hidden_id = $_POST['all_student_hidden_id'];

                                            $query = " SELECT * FROM `students` WHERE `id` = '{$all_student_hidden_id}' ";
                                            $run_query = mysqli_query($connection, $query);

                                            if(mysqli_num_rows($run_query) == 1){
                                                while($result = mysqli_fetch_assoc($run_query)){
                                                    $id = $result['id'];
                                                    $gender = $result['gender'];
                                                    $firstname = $result['firstname'];
                                                    $lastname = $result['lastname'];
                                                    $othername = $result['othername'];
                                                    $dob = $result['dob'];
                                                    $mob = $result['mob'];
                                                    $yob = $result['yob'];
                                                    $contact_phone = $result['contact_phone'];
                                                    $address = $result['address'];
                                                    $state = $result['state'];
                                                    $nationality = $result['nationality'];
                                                    $sponsor_name = $result['sponsor_name'];
                                                    $sponsor_phone = $result['sponsor_phone'];
                                                    $relationship = $result['relationship'];
                                                    $class = $result['class'];
                                                    $passport = $result['passport'];
                                                }

                                                echo"
                                                    <div class='panel panel-primary'>
                                                        <div class='panel-heading'>
                                                            <h3 class='text-center'>Edit Student Info</h3>
                                                        </div>
                                                        <div class='panel-body'>
                                                            <form method='POST' enctype='multipart/form-data' action='staff_dashboard.php?students_reg_no'>
                                                                <legend>Students Bio-Data</legend>
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Gender:</span>
                                                                    <select class='form-control' name='edit_student_gender'>
                                                                        <option selected >"; echo ucfirst($gender); echo "</option>
                                                                        <option value='male'>Male</option>
                                                                        <option value='female'>Female</option>
                                                                    </select>
                                                                </div>
                                                                <br />
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>First Name:</span>
                                                                    <input type='text' name='edit_student_firstname' value='{$firstname}' required class='form-control' placeholder='Enter first name (surname)' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br />
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Last Name:</span>
                                                                    <input type='text' name='edit_student_lastname' value='{$lastname}' required class='form-control' placeholder='Enter last name' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br/>
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Other Name:</span>
                                                                    <input type='text' name='edit_student_othername' value='{$othername}' class='form-control' placeholder='Enter other name (optional)' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br/>
                                                                <div class='row'>
                                                                    <div class='col-md-4 col-sm-4 col-xs-12'>
                                                                        <br />
                                                                        <div class='input-group'>
                                                                            <span class='input-group-addon' id='basic-addon2'>D O B:</span>
                                                                            <select class='form-control' name='edit_student_dob' style='width: 100%; float: left;'>
                                                                                <option selected>"; echo $dob; echo "</option>";
                                                                    for($dob = 1; $dob <= 31; $dob++){
                                                                        echo "<option>{$dob}</option>";
                                                                    }

                                                                    echo"
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class='col-md-4 col-sm-4 col-xs-12'>
                                                                        <br />
                                                                        <div class='input-group'>
                                                                            <span class='input-group-addon' id='basic-addon2'>MONTH:</span>
                                                                            <select class='form-control' name='edit_student_mob' style='width: 100%; float: left;'>
                                                                                <option selected>"; echo $mob;  echo "</option>";

                                                                    $month_array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                                                                    foreach($month_array as $month){
                                                                        echo "<option>{$month}</option><br>";
                                                                    }
                                                                    echo"
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class='col-md-4 col-sm-4 col-xs-12'>
                                                                    <br />
                                                                    <div class='input-group'>
                                                                        <span class='input-group-addon' id='basic-addon2'>YEAR:</span>
                                                                        <select class='form-control' name='edit_student_yob' style='width: 100%; float: left;'>
                                                                            <option selected>"; echo $yob; echo"</option>";

                                                                    for($year = 2016; $year >= 1960; $year--){
                                                                        echo"
                                                                            <option>{$year}</option>";
                                                                    }

                                                                    echo"
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <br />
                                                            <legend>Contact</legend>
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Contact Phone:</span>
                                                                    <input type='phone' name='edit_student_phone' value='{$contact_phone}' required class='form-control' placeholder='Enter nearest phone number to you' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br />
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Home Address:</span>
                                                                    <textarea rows='3' name='edit_student_address' required class='form-control' placeholder='...' aria-describedby='basic-addon2'>{$address}</textarea>
                                                                </div>
                                                                <br/>

                                                            <legend>Place Of Origin</legend>
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>State:</span>
                                                                <select class='form-control' name='edit_student_state'>
                                                                    <option selected >"; echo $state; echo "</option>";

                                                                    $state_array = array("Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT Abuja");

                                                                    foreach($state_array as $state){
                                                                        echo "<option>{$state}</option><br>";
                                                                    }

                                                                    echo"
                                                                </select>
                                                            </div>
                                                            <br />
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Nationality:</span>
                                                                <select class='form-control' name='edit_student_nationality'>
                                                                    <option selected >"; echo $nationality; echo "</option>
                                                                    <option>Nigerian</option>
                                                                    <option>Non-nigerian</option>
                                                                </select>
                                                            </div>
                                                            <br />
                                                            <legend>Sponsor</legend>
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Name:</span>
                                                                <input type='text' name='edit_sponsor_name' value='{$sponsor_name}' required class='form-control' placeholder='Enter sponsors name' aria-describedby='basic-addon2'>
                                                            </div>
                                                            <br />
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Phone:</span>
                                                                <input type='phone' name='edit_sponsor_phone' value='{$sponsor_phone}' required class='form-control' placeholder='Enter sponsors phone number' aria-describedby='basic-addon2'>
                                                            </div>
                                                            <br />
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Relationship:</span>
                                                                <select class='form-control' name='edit_sponsor_relationship'>
                                                                    <option selected >";  echo $relationship; echo "</option>
                                                                    <option>Self</option>
                                                                    <option>Parent</option>
                                                                    <option>Sibling</option>
                                                                    <option>Guardian</option>
                                                                    <option>Others</option>
                                                                </select>
                                                            </div>
                                                            <br />

                                                        <legend>Academics</legend>
                                                        <div class='input-group'>
                                                            <span class='input-group-addon' id='basic-addon2'>Targeted Class:</span>
                                                            <select class='form-control' name='edit_student_tc'>
                                                                <option selected >{$class}</option>";
                                                                    $query = " SELECT * FROM `classes` ";
                                                                    $run_query = mysqli_query($connection, $query);
                                                                    if(mysqli_num_rows($run_query) > 0){
                                                                        while($result = mysqli_fetch_assoc($run_query)){
                                                                            $target_classes = $result['classes'];
                                                                            echo"
                                                                            <option>{$target_classes}</option>
                                                                        ";
                                                                        }
                                                                    }

                                                                    echo"
                                                            </select>
                                                        </div>

                                                        <!--<legend>Multimedia</legend>
                                                        <div class='input-group'>
                                                            <span class='input-group-addon' id='basic-addon2'>Passport:</span>
                                                            <input type='file' name='file' value='{$passport}' required class='form-control' aria-describedby='basic-addon2'>
                                                        </div>-->
                                                        <br />

                                                        <div class='text-center'>
                                                            <input type='hidden' name='one_student_hidden_id' value='{$id}' />
                                                            <input type='submit' name='student_edit_btn' value='UPDATE STUDENT INFO' class='btn btn-primary' />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>"
                                                ;
                                            }
                                        }

                                        //////////////////////////// POST ACTION TO EDIT AND UPDATE A PARTICULAR STUDENT'S INFO INTO DB //////////
                                        if(isset($_POST['student_edit_btn'])){
                                            $one_student_hidden_id = $_POST['one_student_hidden_id'];
                                            $edit_student_gender = inject_checker($connection, $_POST['edit_student_gender']);
                                            $edit_student_firstname = inject_checker($connection, $_POST['edit_student_firstname']);
                                            $edit_student_lastname = inject_checker($connection, $_POST['edit_student_lastname']);
                                            $edit_othername = inject_checker($connection, $_POST['edit_student_othername']);
                                            $edit_student_dob = inject_checker($connection, $_POST['edit_student_dob']);
                                            $edit_student_mob = inject_checker($connection, $_POST['edit_student_mob']);
                                            $edit_student_yob = inject_checker($connection, $_POST['edit_student_yob']);
                                            $edit_student_phone = inject_checker($connection, $_POST['edit_student_phone']);
                                            $edit_student_address = inject_checker($connection, $_POST['edit_student_address']);
                                            $edit_student_state = $_POST['edit_student_state'];
                                            $edit_student_nationality = $_POST['edit_student_nationality'];
                                            $edit_sponsor_name = inject_checker($connection, $_POST['edit_sponsor_name']);
                                            $edit_sponsor_phone = inject_checker($connection, $_POST['edit_sponsor_phone']);
                                            $edit_sponsor_relationship = $_POST['edit_sponsor_relationship'];
                                            $edit_student_tc = $_POST['edit_student_tc'];

                                            $query = " UPDATE `students` SET
                                                                          `gender` = '{$edit_student_gender}',
                                                                          `firstname` = '{$edit_student_firstname}',
                                                                          `lastname` = '{$edit_student_lastname}',
                                                                          `othername` = '{$edit_othername}',
                                                                          `dob` = '{$edit_student_dob}',
                                                                          `mob` = '{$edit_student_mob}',
                                                                          `yob` = '{$edit_student_yob}',
                                                                          `contact_phone` = '{$edit_student_phone}',
                                                                          `address` = '{$edit_student_address}',
                                                                          `state` = '{$edit_student_state}',
                                                                          `nationality` = '{$edit_student_nationality}',
                                                                          `sponsor_name` = '{$edit_sponsor_name}',
                                                                          `sponsor_phone` = '{$edit_sponsor_phone}',
                                                                          `relationship` = '{$edit_sponsor_relationship}',
                                                                          `class` = '{$edit_student_tc}' WHERE `id` = '{$one_student_hidden_id}' ";
                                            $run_query = mysqli_query($connection, $query);

                                            if($run_query == true){
                                                echo "<p class='text-success'><b>Student Info Updated</b></p>";
                                            }else{
                                                echo "<p class='text-danger><b>Student Info Update Failed</b></p>";
                                            }
                                        }

										echo"
									</tbody>
								</table>
							</div>
						";
					}
					elseif(isset($_GET['register_subjects'])){
						require_once("register_subject.php");
					}elseif(isset($_GET['upload'])){
						require_once("teacher_upload.php");
						
						foreach($error as $msg){
							echo "<h4 class='text-danger'>{$msg}</h4>";
						}
					}
										
					
					elseif(isset($_GET['logout'])){
						unset($_SESSION['admin']);
						header("Location:login.php");
						exit;
					}
					else{
						echo"
							<div class='panel panel-primary'>
								<div class='panel-body'>
									<div class='col-md-2 thumbnail text-center'>
										<img src='img/avatar.jpg' class='img-responsive img-rounded' />
									</div>
									
									<div class='col-md-2'>
										<br />
										<h3>{$user_fullname}</h3>
										<form>
											<input type='submit' name='upload_image_btn' value='Upload Image' class='btn btn-primary btn-xs text-center' />
										</form>
									</div>
									
									<div class='col-md-4'>
										<br />
										<br />
										<p><span style='font-weight: bold;'>Gender: </span>{$gender}</p>
										<p><span style='font-weight: bold;'>State:</span> {$user_state}</p>
										<p><span style='font-weight: bold;'>LGA:</span> {$user_lga}</p>
										<p><span style='font-weight: bold;'>Nationality:</span> {$user_nationality}</p>
									</div>
									<div class='col-md-4'>
										<br />
										<br />
										<p><span style='font-weight: bold;'>Address:</span> {$user_address}</p>
										<p><span style='font-weight: bold;'>Phone:</span> {$user_phone}</p>
										<p><span style='font-weight: bold;'>Email:</span> {$user_email}</p>

										<button id='male_order' class='btn btn-primary btn-xs text-center' data-toggle='modal' data-target='#demanppopUpWindow'>Edit Profile</button>
									</div>
									<div class='clearfix'></div>
								</div>
							</div>
						";
					}
				?>

            </div>
        </section>
    </div>

    <!------------- MODAL SECTION BEGINS HERE (ITEM ORDER MODAL) ----------->

    <!-- ADMIN EDIT MODAL BEGINS HERE -->
    <div class='modal fade' id='demanppopUpWindow'>
        <div class='modal-dialog'>
            <div class='modal-content'>

                <!-- header -->
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h3 class='modal-title'>Edit Profile</h3>
                </div>

                <!-- body (form) -->
                <div class='modal-body'>
                    <form method='POST' action='teacher_dashboard.php' role='form'>
                        <div>
                            <label class='checkbox-inline'>
                                <input type='radio' name='user_title' id='title1' value='mr' checked /> Mr
                            </label>

                            <label class='checkbox-inline'>
                                <input type='radio' name='user_title' id='title2' value='mrs' /> Mrs
                            </label>

                            <label class='checkbox-inline'>
                                <input type='radio' name='user_title' id='title3' value='miss' /> Miss
                            </label>
                        </div>
                        <br />
                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Fullname</span>
                            <input type='text' value='<?php echo $user_fullname; ?>' class='form-control'
                                name='user_fullname' />
                        </div>
                        <br />

                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Home Address:</span>
                            <textarea rows='3' name='user_address' required class='form-control' placeholder=''
                                aria-describedby='basic-addon2'><?php echo $user_address; ?></textarea>
                        </div>
                        <br />

                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Phone</span>
                            <input type='text' value='<?php echo $user_phone; ?>' class='form-control'
                                name='user_phone' />
                        </div>
                        <br />

                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>State:</span>
                            <select class='form-control' name='user_state'>
                                <option selected><?php echo $user_state; ?></option>
                                <?php
                                        $state_array = array("Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT Abuja");

                                        foreach($state_array as $state){
                                            echo "<option>{$state}</option><br>";
                                        }
                                    ?>

                            </select>
                        </div>
                        <br />

                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>LGA:</span>
                            <textarea rows='' name='user_lga' required class='form-control' placeholder=''
                                aria-describedby='basic-addon2'><?php echo $user_lga; ?></textarea>
                        </div>
                        <br />

                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Nationality:</span>
                            <select class='form-control' name='user_nationality'>
                                <option selected><?php echo $user_nationality; ?> </option>
                                <option>Nigerian</option>
                                <option>Non-nigerian</option>
                            </select>
                        </div>
                        <br />

                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Email</span>
                            <input type='text' value='<?php echo $user_email; ?>' class='form-control'
                                name='user_email' />
                        </div>
                        <br />

                        <!-- <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Password</span>
                                <input type='password' placeholder='Type password' class='form-control' name='user_password1' />
                            </div>
                            <br />

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Confirm Password</span>
                                <input type='password' placeholder='Retype Password' class='form-control' name='user_password2' />
                            </div>
                            <br /> -->

                        <input type='submit' name='profile_update_btn' value='Update Profile'
                            class='btn btn-primary btn-block' />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF ADMIN MODAL -->

    <?php
            /*$query = " SELECT * FROM `students` WHERE `id` = '{$all_student_hidden_id}' ";
            $run_query = mysqli_query($connection, $query);

            if(mysqli_num_rows($run_query) == 1){
                while($result = mysqli_fetch_assoc($run_query)){
                    $gender = $result['gender'];
                }
            }*/
        ?>

    <!-- STUDENT EDIT MODAL BEGINS HERE -->


</body>

</html>