<?php
ob_start();
session_start();
$pageTitle  = 'تعديل الحساب';
include 'init.php';
if (isset($_SESSION['Username'])) {
    $getAdmin = $con->prepare("SELECT * FROM admin WHERE UserName = ?");
    $getAdmin->execute(array($sessionUser));
    $row = $getAdmin->fetch();
    $AdminRole = $row['role_id'];
    $AdminID = $row['UserID'];

    $do = isset($_GET['do']) ? $_GET['do'] : 'files';

    // Start Manage Page
    if ($do == 'Edit') {  // Edit Profile Info 
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <h1><?php echo $pageTitle ?></h1>
        </h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Start Messages -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Recent Messages -->
                    <div class="col-lg-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h2 class="card-title fw-bold">إضافة مستخدم</h2>

                                <form class="form-horizontal" action="actions.php" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="AdminID" value="<?php echo $AdminID ?>">

                                    <!--start Username Field-->
                                    <div class="form-group  form-group-lg">
                                        <div class="col-sm-10 col-md-10">
                                            <input type="text" name="username" class="form-control"
                                                value="<?php echo $row['UserName'] ?>" autocomplete="off"
                                                required="required" />

                                        </div>
                                        <label class="col-sm-2 control-label">اسم المستخدم</label>
                                    </div>
                                    <!--End Username Field-->

                                    <!--start Password Field-->
                                    <div class="form-group  form-group-lg">
                                        <div class="col-sm-10 col-md-10">
                                            <input type="hidden" name="oldpassword"
                                                value="<?php echo $row['Password'] ?>" />
                                            <input type="password" name="newpassword" class="form-control"
                                                autocomplete="new-password"
                                                placeholder="اترك هذا المكان خالياً إذا لم ترد تغيير كلمة المرور" />
                                        </div>
                                        <label class="col-sm-2 control-label">كلمة المرور</label>
                                    </div>
                                    <!--End Password Field-->

                                    <!--start FullName Field-->
                                    <div class="form-group  form-group-lg">
                                        <div class="col-sm-10 col-md-10">
                                            <input type="text" name="fullname" value="<?php echo $row['FullName'] ?>"
                                                class="form-control" />

                                        </div>
                                        <label class="col-sm-2 control-label">الاسم بالكامل</label>
                                    </div>
                                    <!--End FullName Field-->

                                    <!--Start Phone Number Field-->
                                    <div class="form-group  form-group-lg">
                                        <div class="col-sm-10 col-md-10">
                                            <input type="text" value="<?php echo $row['phone'] ?>" name="phone"
                                                class="form-control" />

                                        </div>
                                        <label class="col-sm-2 control-label">رقم الهاتف</label>
                                    </div>
                                    <!--End Phone Number Field-->

                                    <!-- Start Select Role Of User -->
                                    <div class="form-group  form-group-lg">
                                        <div class="col-sm-10 col-md-10">
                                            <select name="user_role" class="form-select"
                                                style="padding: 10px; font-size: 16px;">
                                                <option value="0">دور المستخدم</option>
                                                <?php
                                                                $allRoles = getAllFrom("*", "roles", "", "", "role_id", "ASC");
                                                                foreach ($allRoles as $role) {
                                                                    echo "<option value='" . $role['role_id'] . "'>" . $role['role_name'] . "</option>";
                                                                }
                                                                ?>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label">دور المستخدم</label>
                                    </div>
                                    <!-- End Select Role Of User -->

                                    <!--start Profile Image Field-->
                                    <div class="form-group  form-group-lg">
                                        <div class="col-sm-10 col-md-10">
                                            <input type="file" name="avatar" class="form-control" />
                                        </div>
                                        <label class="col-sm-2 control-label">صورة المستخدم</label>
                                    </div>
                                    <!--End Profile Image Field-->

                                    <!--start Submit Field-->
                                    <div class="form-group  form-group-lg">
                                        <div class=" col-sm-10">
                                            <input type="submit" name="add_user" value="إضافة"
                                                class="btn btn-primary btn-lg" />
                                        </div>
                                    </div>
                                    <!--End Submit Field-->
                                </form>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Messages -->

        </div>
    </section>

</main><!-- End #main -->

<?php } elseif ($do == 'Update') {
        echo "<h1 class='text-center main-title'>" . $lang['Update'] . "</h1>";
        echo "<div class='container'>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Upload Variables

            $avatarName = $_FILES['newavatar']['name'];
            $avatarSize = $_FILES['newavatar']['size'];
            $avatarTmp = $_FILES['newavatar']['tmp_name'];
            $avatarType = $_FILES['newavatar']['type'];

            // List of allowed file type to upload
            $avatarAllowedExtension = array("jpeg", "jpg", "png", "gif", "webp");

            // Get avatar extensions
            $exp = explode('.', $avatarName);
            $avatarExtension = strtolower(end($exp));


            // Get variables from Form
            $AdminID     = $_POST['AdminID'];
            $user   = $_POST['username'];
            // $email  = $_POST['email'];
            $full   = $_POST['fullname'];
            $phone   = $_POST['phone'];
            $user_role   = $_POST['user_role'];
            $oldImage = $_POST['oldavatar'];
            $newImage = $_FILES['newavatar']['name'];

            // Update Password
            $pass   = empty($_POST['newpassword']) ? $_POST['oldpassword'] : $_POST['newpassword'];

            if ($newImage != '') {
                $avatar = $_FILES['newavatar']['name'];
            } else {
                $avatar = $oldImage;
            }


            // Validate the Form
            $formErrors = array();

            if (empty($user)) {

                $formErrors[] = 'Username can\'t be empty';
            }

            if (strlen($user) < 3) {

                $formErrors[] = 'Username can\'t be Less than <strong>3</strong> charachters';
            }

            if (empty($full)) {

                $formErrors[] = 'Full name can\'t be empty';
            }

            if (empty($user_role)) {
                $formErrors[] = 'You must choose the role of the user';
            }
            /* 
            if (empty($email)) {

                $formErrors[] = 'Email can\'t be empty';
            } */

            // Loop into errors array and Echo it
            foreach ($formErrors as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>';
            }

            // Check if there is no error proceed the update operation

            if (empty($formErrors)) {

                // $avatar = rand(0, 10000) . '_' . $avatarName;

                move_uploaded_file($avatarTmp, "uploads/imgs/" . $avatar);

                // Update the database with this informations
                $stmt = $con->prepare("UPDATE admin SET UserName = ?, FullName = ?, phone = ?, role_id = ?, Password = ?, avatar = ? WHERE UserID = ?");
                $stmt->execute(array($user, $full, $phone, $user_role, $pass, $avatar, $AdminID));

                // Echo success Message
                $theMsg = "<div class='alert alert-success'>" . $lang['Account_Update'] . "</div>";
                echo $theMsg;
                echo '<a class="btn btn-primary" href="users.php">' . $lang['go_back'] . '</a>';
            }
        } else {

            $theMsg = '<div class="alert alert-danger">SORRY, YOU CAN\'T EDIT THIS PAGE DIRECTLY</div>';

            redirectHome($theMsg, 'back', 5);
        }

        echo "</div>";
    }
} else {
    header('Location: index.php');
    exit();
}

include $templates . 'footer.php';
ob_end_flush();
?>