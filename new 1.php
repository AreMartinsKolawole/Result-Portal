<?php
function inject_checker($connection, $field) {
    $field = trim($field);
    $field = mysqli_real_escape_string($connection, $field);
    return $field;
}

if (isset($_POST['result_upload_btn'])) {
    $student_id = inject_checker($connection, $_POST['student_id']);
    $student_name = $_POST['student_name'];
    $student_class = $_POST['student_class'];
    $result_term = $_POST['result_term'];
    $result_subject = $_POST['result_subject'];
    $student_ca = $_POST['student_ca'];
    $student_project = $_POST['student_project'];
    $student_exam = $_POST['student_exam'];
    $student_total = $student_ca + $student_project + $student_exam;

    $query = "INSERT INTO `results1`(`class`, `term`, `reg_number`, `name`, `subjects`, `ca`, `project`, `exam`, `subject_total`, `date_of_upload`) 
              VALUES('$student_class', '$result_term', '$student_id', '$student_name', '$result_subject', '$student_ca', '$student_project', '$student_exam', '$student_total', '$date')";
    $run_query = mysqli_query($connection, $query);

    if ($run_query) {
        echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> Upload Successful</b></p>";
    } else {
        echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Failed! Try Again</b></p>";
    }
}

if (isset($_POST['go_upload'])) {
    $result_upload_class = inject_checker($connection, $_POST['result_upload_class']);
    $result_upload_subject = inject_checker($connection, $_POST['result_upload_subject']);
    $result_upload_term = inject_checker($connection, $_POST['result_upload_term']);
    $result_upload_session = inject_checker($connection, $_POST['result_upload_session']);

    if ($result_upload_class === $select) {
        $error[] = "Error: Please Select the Class for result upload";
    }
    if ($result_upload_subject === $select) {
        $error[] = "Error: Please Select the Subject for result upload";
    }
    if ($result_upload_term === $select) {
        $error[] = "Error: Please Select the Term for result upload";
    }

    if (empty($error)) {
        $query = "SELECT * FROM `subjects` WHERE `class` = '{$result_upload_class}' AND `subjects` = '{$result_upload_subject}' AND `term` = '{$result_upload_term}'";
        $run_query = mysqli_query($connection, $query);
        if (mysqli_num_rows($run_query) > 0) {
            while ($result = mysqli_fetch_assoc($run_query)) {
                $students_reg_no = $result['reg_number'];
                $student_names = $result['name'];
                $student_class = $result['class'];
                $result_term = $result['term'];
                $result_subject = $result['subjects'];
                echo "
                    <form method='POST' action='upload.php?go_upload'>
                        <div class='row'>
                            <div class='col-md-2'>
                                <input type='text' name='student_id' value='{$students_reg_no}' class='form-control' />
                            </div>
                            <div class='col-md-2'>
                                <input type='text' name='student_name' value='{$student_names}' class='form-control' />
                            </div>
                            <div class='col-md-1'>
                                <input type='text' name='student_class' value='{$student_class}' class='form-control' />
                            </div>
                            <div class='col-md-1'>
                                <input type='text' name='result_term' value='{$result_term}' class='form-control' />
                            </div>
                            <div class='col-md-1'>
                                <input type='text' name='result_subject' value='{$result_subject}' class='form-control' />
                            </div>
                            <div class='col-md-1'>
                                <input type='text' name='student_ca' class='form-control' />
                            </div>
                            <div class='col-md-1'>
                                <input type='text' name='student_project' class='form-control' />
                            </div>
                            <div class='col-md-1'>
                                <input type='text' name='student_exam' class='form-control' />
                            </div>
                            <div class='col-md-1'>
                                <input type='submit' name='result_upload_btn' value='Upload' class='btn btn-success' />
                            </div>
                        </div>
                        <br />
                    </form>
                ";
            }
        } else {
            echo "No records found";
        }
    }
}
?>
