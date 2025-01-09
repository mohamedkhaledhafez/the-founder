<?php

/*
============================================================
== Manage Permissions Page
== You can Add | Edit| Update and Delete Students from here
============================================================
*/
ob_start();
session_start();

$pageTitle = 'User Permissions';
include 'init.php';

$getAd = $con->prepare("SELECT * FROM admin WHERE UserName = ?");
$getAd->execute(array($sessionUser));
$info = $getAd->fetch();
$AdminRole = $info['role_id'];

$getAdmin = $con->prepare("SELECT 
                                roles_permissions.*,
                                permissions.perm_desc AS perm_name
                            FROM 
                                roles_permissions
                            INNER JOIN
                                permissions
                            ON
                                permissions.perm_id = roles_permissions.perm_id
                            ");
$getAdmin->execute();
$info = $getAdmin->fetchAll();

if (isset($_SESSION['Username'])) {

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    foreach ($info as $permission_name) {
        if (($permission_name["perm_name"] == "Permissions") && ($permission_name["role_id"] == $AdminRole)) {
            // Start Manage Page
            if ($do == 'Manage') {  // Manage Admin's Permissions Page 

?>

                <h1 class="text-center main-title"><?php echo $lang['Roles']; ?></h1>
                <div class="container">
                    <div class="table-responsive">
                        <a href="permissions.php?do=add_Role" class="btn btn-success mb-3">
                            <i class="fa fa-plus"></i> <?php echo $lang['add_role'] ?>
                        </a>
                        <table class="main-table manage-members text-center table table-bordered">
                            <thead>
                                <tr>
                                    <td class='perm_role'><?php echo $lang['User_role'] ?></td>
                                    <td class='perm_actions'><?php echo $lang['Actions'] ?></td>
                                </tr>
                            </thead>
                            <?php
                            // Select all Admins
                            $stmt2 = $con->prepare("SELECT * FROM roles WHERE active = 1 ORDER BY role_id");
                            $stmt2->execute();
                            $rows = $stmt2->fetchAll();
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['role_name'] . "</td>";
                                echo "<td class='control_column'>
                                            <a href='permissions.php?do=Show_Perm&roleId=" . $row['role_id'] . "' class='btn btn-info'><i class='fa fa-eye'></i> " . $lang['show_perm'] . "</a>
                                            <a href='permissions.php?Delete=" . $row['role_id'] . "' class='btn btn-danger confirm'><i class='fa fa-trash'></i> </a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>

                </div>

            <?php
            } elseif ($do == 'add_Role') { ///////////////////////////////////////////////////// Add Student Page 
            ?>
                <h1 class="text-center main-title"><?php echo $lang['add_role'] ?></h1>
                <div class="container">
                    <div class="row">
                        <form class="col-md-9 form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <!--start Role Name Field-->
                            <div class="form-group  form-group-lg d-flex">
                                <label class="col-sm-3 control-label"><?php echo $lang['role_name'] ?></label>
                                <div class="col-sm-9 col-md-6">
                                    <input type="text" name="role_name" class="form-control" placeholder="Enter The New Role Name" />
                                </div>
                            </div>
                            <!--End Role Name Field-->

                            <!--start Submit Field-->
                            <div class="form-group  form-group-lg">
                                <div class=" col-sm-10 btn_flex">
                                    <input type="submit" value="<?php echo $lang['add_role'] ?>" name="add_role" class="btn btn-primary" />
                                    
                                    <a class="btn btn-primary ml" href="permissions.php"><?php echo $lang['go_to_back'] ?></a>
                                </div>
                            </div>
                            <!--End Submit Field-->
                        </form>
                    </div>
                </div>

                <?php

            }

            if (isset($_POST['add_role'])) {

                // Get variables from Form
                $role_name   = $_POST['role_name'];
                // Validate the Form
                $formErrors = array();

                if (empty($role_name)) {
                    $formErrors[] = 'Please Enter Unique Role Name';
                }

                // Loop into errors array and Echo it
                foreach ($formErrors as $error) { ?>
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header d-flex justify-content-between">
                                <strong>Error</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <?php echo $error; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                // Check if there is no error proceed the update operation            
                if (empty($formErrors)) {

                    // Check if user is exist in Database
                    $check = checkItem("role_name", "roles", $role_name);

                    if ($check == 1) { ?>
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header d-flex justify-content-between">
                                    <strong>خطأ</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    <?php echo $lang['role_insert_err']; ?>
                                </div>
                            </div>
                        </div>

                    <?php

                    } else {
                        // Insert user informations to database
                        $stmt = $con->prepare("INSERT INTO 
                                        roles(role_name)
                                        VALUES(:mrole)");

                        $stmt->execute(array('mrole' => $role_name));
                    ?>
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div id="liveToast" class="toast toast_success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header toast_success d_flex">
                                    <strong>Success</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body toast_success">
                                    <?php echo $lang['role_Added']; ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
            }

            if ($do == 'add_perm') { ///////////////////////////////////////////////////// Add Permissions Page 
                $roleId = isset($_GET['roleId']) && is_numeric($_GET['roleId']) ? intval($_GET['roleId']) : 0;   // intval => integer value
                $permId = isset($_GET['permId']) && is_numeric($_GET['permId']) ? intval($_GET['permId']) : 0;   // intval => integer value

                ?>

                <h1 class="text-center main-title"><?php echo $lang['Permission'] ?></h1>
                <div class="container">
                    <form class="form-horizontal" action='permissions.php?do=Insert_perm&permId=<?php echo $permId ?>&roleId=<?php echo $roleId ?>&lang=<?php echo $_SESSION['lang'] ?>' method="POST" enctype="multipart/form-data">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="<?php echo $lang['Add_permission'] ?>" class="btn btn-success" />
                                <a class="btn btn-primary" href="permissions.php"><?php echo $lang['go_to_back'] ?></a>
                            </div>
                        </div>
                        <div class="permissions_box">
                        <?php
                            $stmt2 = $con->prepare("SELECT * FROM permissions ORDER BY ordering DESC");
                            $stmt2->execute();
                            $rows = $stmt2->fetchAll();
                            foreach ($rows as $row) {
                                echo "<div>" . "<input type='checkbox' name='update[]' value='" . $row['perm_id'] . "' /> " . $row['perm_desc'] . "</div>";
                                
                            }
                            ?>
                        </div>
                        
                    </form>
                </div>

            <?php
            } elseif ($do == 'Insert_perm') { ///////////////////////////////////////////////////// Insert Permissions Page 

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    echo "<h1 class='text-center main-title'>" . $lang['Insert'] . "</h1>";
                    echo "<div class='container'>";

                    // Check if Get request UserId is numeric & get its integer value 
                    $roleId = isset($_GET['roleId']) && is_numeric($_GET['roleId']) ? intval($_GET['roleId']) : 0;  // intval => integer value
                    $permId = isset($_GET['permId']) && is_numeric($_GET['permId']) ? intval($_GET['permId']) : 0;   // intval => integer value
                    // if (isset($_POST['addPermissions_btn'])) {
                    if (isset($_POST['update'])) {
                        foreach ($_POST['update'] as $permission) {
                        
                            $stmt = $con->prepare("SELECT perm_id, role_id FROM roles_permissions  WHERE perm_id = ? AND role_id = '$roleId'");
                            $stmt->execute(array($permission));
                            $rowsCount = $stmt->rowCount();
                            
                            if($rowsCount > 0) {
                                echo '<script>alert("This permission is already added before !")</script>';
                                echo "<script>window.location.href ='permissions.php'</script>";

                            } else {
                            
                            // Insert permission to database
                            $stmt = $con->prepare("INSERT INTO roles_permissions(perm_id, role_id) VALUES('$permission', '$roleId')");
                            $stmt->execute();
                            }
                        }
                        $theMsg = "<div class='alert alert-success'>" . $lang['permissions_inserted'] . "</div>";
                        echo $theMsg;
                        echo '<a class="btn btn-primary" href="permissions.php?do=Show_Perm&roleId=' . $roleId . '">' . $lang['go_to_back'] . '</a>';

                        // redirectHome($theMsg, 'back', 3);
                    } else {
                        $theMsg = '<div class="alert alert-danger">Please Select At Least 1 Permission</div>';
                        redirectHome($theMsg, 'back', 3);                    }
                    
                } else {

                    echo "<div class='container'>";

                    $theMsg = '<div class="alert alert-danger">SORRY, YOU CANT EDIT THIS PAGE DIRECTLY</div>';

                    echo "</div>";
                }

                echo "</div>";
            } elseif ($do == 'Show_Perm') { ///////////////////////////////////////////////////// Add Student Page 

                // Check if Get request UserId is numeric & get its integer value 
                $roleId = isset($_GET['roleId']) && is_numeric($_GET['roleId']) ? intval($_GET['roleId']) : 0;  // intval => integer value

                // Select all data in database that depend on this userId 
                $stmt = $con->prepare("SELECT * FROM roles WHERE role_id = ?");

                // Execute query
                $stmt->execute(array($roleId));
                // Fetch the data
                $row = $stmt->fetch();

            ?>
                <h1 class="text-center main-title"><?php echo $row['role_name']; ?></h1>
                <div class="container">
                    <div class="table-responsive">
                        <a href="permissions.php?do=add_perm&roleId=<?php echo $roleId ?>&lang=<?php echo $_SESSION['lang'] ?>" class="btn btn-success mb-3">
                            <i class="fa fa-plus"></i> <?php echo $lang['Add_permission'] ?>
                        </a>
                        <a class="btn btn-primary mb-3" href="permissions.php"><?php echo $lang['go_to_back'] ?></a>

                        <table class="main-table manage-members text-center table table-bordered">
                            <thead>
                                <tr>
                                    <td class='perm_role'><?php echo $lang['User_Permissions'] ?></td>
                                    <td class='perm_actions'><?php echo $lang['Actions'] ?></td>
                                </tr>
                            </thead>
                            <?php
                            // Select all Admins
                            $stmt2 = $con->prepare("SELECT 
                                                        roles_permissions.*,
                                                        permissions.perm_desc AS perm_Name,
                                                        permissions.perm_id AS perm_ID,
                                                        roles.role_id AS role_ID
                                                    FROM
                                                        roles_permissions
                                                    INNER JOIN
                                                        permissions
                                                    ON
                                                        permissions.perm_id = roles_permissions.perm_id
                                                    INNER JOIN
                                                        roles
                                                    ON
                                                        roles.role_id = roles_permissions.role_id
                                                    WHERE
                                                        roles_permissions.role_id = $roleId

                                                    ");
                            $stmt2->execute();
                            $rows = $stmt2->fetchAll();
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['perm_Name'] . "</td>";
                                echo "<td class='perm_actions'>";

                                echo "<a href='permissions.php?do=DeletePerm&perm=" . $row['perm_id'] . "&roleId=" . $roleId . "&lang=" . $_SESSION['lang'] . "' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
                                // echo "<a href='permissions.php?do=De_activate&perm=" . $row['perm_ID'] . "&roleId=" . $roleId ."&lang=" . $_SESSION['lang'] ."' class='btn btn-warning'><i class='fa fa-close'></i> ". $lang['De_activate'] ."</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                    
                </div>

    <?php
            } elseif ($do == 'DeletePerm') {  /////////////////////////////////// Delete Student Page

                echo "<h1 class='text-center main-title'>" . $lang['Delete'] . "</h1>";
                echo "<div class='container'>";

                // Check if Get request UserId is numeric & get its integer value 
                $roleId = isset($_GET['roleId']) && is_numeric($_GET['roleId']) ? intval($_GET['roleId']) : 0;   // intval => integer value
                $permId = isset($_GET['perm']) && is_numeric($_GET['perm']) ? intval($_GET['perm']) : 0;   // intval => integer value

                $stmt = $con->prepare("DELETE FROM roles_permissions WHERE role_id = ? AND perm_id = ?");

                $stmt->execute(array($roleId, $permId));
                $theMsg = "<div class='alert alert-success'>" . $lang['role_Delete'] . '</div>';
                redirectHome($theMsg, 'back', 3);

                echo "</div>";
            } 
            /* 
            elseif ($do == 'Delete') {  /////////////////////////////////// Delete Student Page

                echo "<h1 class='text-center main-title'>" . $lang['Delete'] . "</h1>";
                echo "<div class='container'>";

                // Check if Get request UserId is numeric & get its integer value 
                $roleId = isset($_GET['roleId']) && is_numeric($_GET['roleId']) ? intval($_GET['roleId']) : 0;   // intval => integer value

                // Select all data depend on this userID
                $check = checkItem('role_id', 'roles', $roleId);

                // If thre is such userId, Show the Form
                if ($check > 0) {

                    $stmt = $con->prepare("DELETE FROM roles WHERE role_id = :mrole ");
                    $stmt->bindParam(":mrole", $roleId);
                    $stmt->execute();

                    $theMsg = "<div class='alert alert-success'>" . $lang['role_Delete'] . '</div>';
                    redirectHome($theMsg, 'back', 3);
                } else {
                    $theMsg = "<div class='alert alert-danger'>No such ID</div>";
                    redirectHome($theMsg);
                }

                echo "</div>";
            }  */
            if (isset($_GET['Delete'])) {
                $roleId = $_GET['Delete'];
                $stmt = $con->prepare("UPDATE roles SET active = 0 WHERE role_id = ?");
                $stmt->execute(array($roleId));

                header('location:permissions.php');
            }
            
            elseif ($do == 'Activate') {  /////////////////////////////////// Activate Student Page

                echo "<h1 class='text-center main-title'>" . $lang['Activate'] . "</h1>";
                echo "<div class='container'>";

                // Check if Get request UserId is numeric & get its integer value 
                $roleId = isset($_GET['roleId']) && is_numeric($_GET['roleId']) ? intval($_GET['roleId']) : 0;  // intval => integer value
                $perm = isset($_GET['perm']) && is_numeric($_GET['perm']) ? intval($_GET['perm']) : 0;   // intval => integer value

                // Select all data depend on this userID
                $check = checkItem('permisson_id', 'roles_permissions', $perm);

                // If thre is such userId, Show the Form
                if ($check > 0) {

                    $stmt = $con->prepare("UPDATE roles_permissions SET status = 1 WHERE permisson_id = ? AND role_id = ?");

                    $stmt->execute(array($perm, $roleId));

                    $theMsg = "<div class='alert alert-success'>" . $lang['permission_activated'] . '</div>';
                    redirectHome($theMsg, 'back', 3);
                } else {
                    $theMsg = "<div class='alert alert-danger'>No such ID</div>";
                    redirectHome($theMsg);
                }

                echo "</div>";
            } elseif ($do == 'De_activate') {  /////////////////////////////////// Delete Student Page

                echo "<h1 class='text-center main-title'>" . $lang['De_activate'] . "</h1>";
                echo "<div class='container'>";

                // Check if Get request UserId is numeric & get its integer value 
                $roleId = isset($_GET['roleId']) && is_numeric($_GET['roleId']) ? intval($_GET['roleId']) : 0;  // intval => integer value
                $perm = isset($_GET['perm']) && is_numeric($_GET['perm']) ? intval($_GET['perm']) : 0;   // intval => integer value

                // Select all data depend on this userID
                $check = checkItem('permisson_id', 'roles_permissions', $perm);

                // If thre is such userId, Show the Form
                if ($check > 0) {

                    $stmt = $con->prepare("UPDATE roles_permissions SET status = 0 WHERE permisson_id = ? AND role_id = ?");

                    $stmt->execute(array($perm, $roleId));

                    $theMsg = "<div class='alert alert-success'>" . $lang['permission_de_activated'] . '</div>';
                    redirectHome($theMsg, 'back', 3);
                } else {
                    $theMsg = "<div class='alert alert-danger'>No such ID</div>";
                    redirectHome($theMsg);
                }

                echo "</div>";
            }
        }
    }

    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="layout/js/virtual-select.min.js"></script>
    <script type="text/javascript">
        /*  VirtualSelect.init({
                ele: '#selected_grade'
            
            }); */

        $(document).ready(function() {

            $('#checkAll').change(function() {
                var x = $("#checkAll").val();
                // alert(x);
                if ($(this).is(':checked')) {
                    $('input[name="update[]"]').prop('checked', true);
                } else {
                    $('input[name="update[]"]').each(function() {
                        $(this).prop('checked', false);
                    });
                }

            });

            $('input[name="update[]"]').click(function() {
                var total_checkboxes = $('input[name="update[]"]').length;
                var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                if (total_checkboxes_checked == total_checkboxes) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }

            });
        });

        $("#parent_select").chosen();

        /*  $("#selectoption").multiselect({
             includeSelectAllOption:true,
             selectAllText:'Select all',

         }); */
    </script>

<?php
    include $templates . 'footer.php';
} else {

    header('Location: index.php');

    exit();
}

?>

<script>
    const toastTrigger = document.getElementById('submit');
    const toastLiveExample = document.getElementById('liveToast');
    const toastContainer = document.querySelector('.toast-container');
    if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
        })
    }

    setTimeout(() => {
        toastContainer.classList.add("d_none");
    }, 5000);

    const closeBtn = document.querySelector(".btn-close");
    closeBtn.addEventListener("click", () => {
        toastContainer.classList.add("d_none");
    });
</script>