<?php

/*
============================================================
==  Show Login Number
============================================================
*/
ob_start();

session_start();

$pageTitle = 'Login Number';

if (isset($_SESSION['Username'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    // Start Manage Page
    if ($do == 'Manage') {  // Manage Files Page 

        $stmt = $con->prepare("SELECT * FROM admin_logs_number");
        // Execute the statement 
        $stmt->execute();

        // Assign this info to variable
        $logs = $stmt->fetchAll();

        if (!empty($logs)) {

?>

            <h1 class="text-center main-title"><?php echo $lang['Logs_Numbers'] ?></h1>
            <div class="container">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center form_content">
                        <!-- Admin Filter -->
                        <div class="d-flex justify-content-between">
                            <form action="" method="GET">
                                <div class="d-flex align-items-center">
                                    <!--Start Subject Field-->
                                    <div class="form-group  form-group-lg">
                                        <!-- <label class="col-sm-2 control-label"><?php echo $lang['select_subj'] ?></label> -->
                                        <div class="col-sm-10 col-md-12">
                                            <select name="admin_select_box" id="mark_selected_subject" class="form-select" aria-label="Default select example">
                                                <option value="0"><?php echo $lang['select_admin'] ?></option>
                                                <?php
                                                $stmt = $con->prepare("SELECT distinct
                                                                    admin_logs_number.admin,
                                                                    admin.UserName AS admin_Name,
                                                                    admin.UserID AS admin_ID
                                                                FROM
                                                                    admin_logs_number
                                                                INNER JOIN 
                                                                    admin
                                                                ON 
                                                                    admin.UserID = admin_logs_number.admin
                                                                
                                                                ");
                                                $stmt->execute();
                                                $rows = $stmt->fetchAll();
                                                foreach ($rows as $sub) {
                                                    echo "<option value='" . $sub['admin'] . "'>" . $sub['admin_Name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--End Subject Field-->

                                    <button class="search_btn btn btn-primary" type="submit" name="admin_filter" value="search"><?php echo $lang['search'] ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table id="data_table" class="main-table manage-members text-center table table-bordered">

                        <thead>
                        <tr>
                                <td>User</td>
                                <!-- <td>Logs Number</td> -->
                                <td>Date</td>
                            </tr>
                        </thead>
                        <?php
                        // $userid = isset($_GET['userId']) && is_numeric($_GET['userId']) ? intval($_GET['userId']) : 0;
                        if (isset($_GET['admin_filter'])) {
                            $admin_select_box = $_GET['admin_select_box'];
                            // $exam_select_box = $_GET['exam_select_box']; 
                            $stmt = $con->prepare("SELECT distinct
                                                    admin_logs_number.*,
                                                    admin.UserName AS admin_Name,
                                                    admin.UserID AS admin_ID    
                                                FROM
                                                    admin_logs_number
                                                INNER JOIN 
                                                    admin
                                                ON 
                                                    admin.UserID = admin_logs_number.admin
                                                WHERE 
                                                    admin like :admin_select_box
                                                ORDER BY 
                                                    Date DESC
                                            ");
                            $stmt->execute(array(
                                ':admin_select_box' => $admin_select_box
                            ));
                            $rows = $stmt->fetchAll();
                            $adminId = $admin_select_box;
                            $logs_number = countMessages('logs', 'admin_logs_number', "WHERE admin = {$adminId}");
                            echo $lang['Logs_Numbers'] . " : " .  $logs_number;
                            foreach ($rows as $row) {
                                // $adminId = $row['admin'];

                                echo "<tr>";
                                // echo "<td>" . "<input type='checkbox' name='arch[]' value='" . $row["m_id"] ."' />". "</td>";
                                echo "<td>" . $row['admin_Name'] . "</td>";
                                // echo "<td>" . $row['logs'] . "</td>";
                                // echo "<td>" . countMessages('logs', 'admin_logs_number', "WHERE admin = {$adminId}") . "</td>";
                                echo "<td>" . $row['Date'] . "</td>";
                                echo "</tr>";
                            }
                        } elseif (isset($_GET['teacher_filter'])) {
                            $client_select_box = $_GET['client_select_box'];
                            // $exam_select_box = $_GET['exam_select_box']; 
                            $stmt3 = $con->prepare("SELECT distinct
                                                    client_logs_number.*,
                                                    clients.UserName AS client_Name,
                                                    clients.UserID AS client_ID    
                                                FROM
                                                    client_logs_number
                                                INNER JOIN 
                                                    clients
                                                ON 
                                                    clients.UserID = client_logs_number.client
                                                WHERE 
                                                    client like :client_select_box
                                                ORDER BY Date DESC
                                                    LIMIT 1");
                            $stmt3->execute(array(
                                ':client_select_box' => $client_select_box
                            ));
                            $rows = $stmt3->fetchAll();
                            foreach ($rows as $row) {
                                $clientId = $row['client'];
                                echo "<tr>";
                                // echo "<td>" . "<input type='checkbox' name='arch[]' value='" . $row["m_id"] ."' />". "</td>";
                                echo "<td>" . $row['client_Name'] . "</td>";
                                // echo "<td>" . $row['logs'] . "</td>";
                                echo "<td>" . countMessages('logs', 'client_logs_number', "WHERE client = {$clientId}") . "</td>";
                                echo "<td>" . $row['Date'] . "</td>";
                                echo "</tr>";
                            }
                        } ?>
                    </table>
                </div>
                <!-- <a href="attendance.php?do=Add&lang=<?php echo $_SESSION['lang'] ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> <?php echo $lang['Take_attendance'] ?>
            </a>  -->
            </div>

        <?php  } else {
            echo "<div class='container'>";
            echo "<div class='empty-msg'>" . $lang["identity_err"] . "</div>";
            echo "</div>";
        } ?>

<?php

    } elseif ($do == 'Delete') {  /////////////////////////////////// Delete Files Page

        echo "<h1 class='text-center main-title'>" . $lang['Delete'] . "</h1>";
        echo "<div class='container'>";

        // Check if Get request UserId is numeric & get its integer value 
        $fileid = isset($_GET['fileid']) && is_numeric($_GET['fileid']) ? intval($_GET['fileid']) : 0;  // intval => integer value

        // Select all data depend on this userID
        $check = checkItem('file_id', 'puploads', $fileid);

        // If thre is such userId, Show the Form
        if ($check > 0) {

            $stmt = $con->prepare("DELETE FROM puploads WHERE file_id = :mid ");

            $stmt->bindParam(":mid", $fileid);

            $stmt->execute();

            $theMsg = "<div class='alert alert-success'>" . $lang['delete_grade_file'] . '</div>';
            redirectHome($theMsg, 'back', 3);
        } else {
            $theMsg = "<div class='alert alert-danger'>No such ID</div>";
            redirectHome($theMsg);
        }

        echo "</div>";
    } ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="layout/js/virtual-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        // $("#client_select").chosen();
        // $("#project_select").chosen();
        // $("#select_Unit").chosen();

        $(document).ready(function() {
            $('#data_table').DataTable();
        });
    </script>
    
    <?php
    include $templates . 'footer.php';
} else {

    header('Location: index.php');
    exit();
}

ob_end_flush();
