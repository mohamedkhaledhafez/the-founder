<?php

ob_start(); // Output Buffering Start
session_start();

$pageTitle = 'المستخدمين';
include 'init.php';
$getAd = $con->prepare('SELECT 
                            admin.*,
                            roles.role_name AS Role_Name
                        FROM
                            admin
                        INNER JOIN
                            roles
                        ON
                            roles.role_id = admin.role_id
                        WHERE
                            UserName = ?');
$getAd->execute([$sessionUser]);
$info = $getAd->fetch();
$AdminID = $info['UserID'];
$AdminRole = $info['role_id'];
$AdminRole_Name = $info['Role_Name'];
$AdminUsername = $info['UserName'];
$AdminFullName = $info['FullName'];
$AdminImage = $info['avatar'];

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
        if ($permission_name['perm_name'] == 'Users' && $permission_name['role_id'] == $AdminRole) {
            // Start Manage Page
            if ($do == 'Manage') {  // Manage Admins Page 
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
                                    <div class="col-12">
                                        <div class="card recent-sales overflow-auto">

                                            <div class="card-body">
                                                <h2 class="card-title fw-bold"><?php echo $pageTitle ?></h2>
                                                <a href="users.php?do=Add" class="btn btn-success fs-3"><i class="bx bxs-user-plus"></i>
                                                    إضافة مستخدم جديد</a>

                                                <table class="table table-borderless datatable">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th class="text-center" scope="col">اسم المستخدم</th>
                                                            <th scope="col">رقم الهاتف</th>
                                                            <th scope="col">دور المستخدم</th>
                                                            <th scope="col">الاسم بالكامل</th>
                                                            <th scope="col">تاريخ الإنضمام</th>
                                                            <th scope="col">التحكم</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $stmt2 = $con->prepare("SELECT 
                                                                                admin.*,
                                                                                roles.role_name AS admin_role
                                                                            FROM 
                                                                                admin
                                                                            INNER JOIN
                                                                                roles
                                                                            ON
                                                                                roles.role_id = admin.role_id
                                                                            WHERE
                                                                                admin.active = 1
                                                                            ORDER BY
                                                                                role_id
                                                                            ");
                                                        $stmt2->execute();
                                                        $users = $stmt2->fetchAll();
                                                        foreach ($users as $user) { ?>
                                                            <tr>
                                                                <th scope="row"><a href="#">#<?php echo $user['UserID']; ?></a></th>
                                                                <td><?php echo $user['UserName']; ?></td>
                                                                <td><?php echo $user['phone']; ?></td>
                                                                <td><?php echo $user['admin_role']; ?></td>
                                                                <td><?php echo $user['FullName']; ?></td>
                                                                <td><?php echo $user['Date']; ?></td>
                                                                <td class="msg-actions">

                                                                    <p>
                                                                    <form action="actions.php" method="post">
                                                                        <input type="hidden" name="delete_uid" value="<?php echo $user['UserID'] ?>">
                                                                        <button type="submit" name="delete_user" class="btn btn-danger">
                                                                            <i class="bx bxs-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                    </p>
                                                                    <a class="btn btn-success fs-4" href="users.php?do=Edit&uid=<?php echo $user['UserID'] ?>">
                                                                        تعديل البروفايل
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div><!-- End Recent Sales -->

                                </div>
                            </div><!-- End Messages -->

                        </div>
                    </section>

                </main><!-- End #main -->

            <?php } elseif ($do == 'Add') { ///////////////////////////////////////////////////// Add Users Page 
                $pageTitle = 'إضافة مستخدم'
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

                                                <form class="form-horizontal" action="actions.php" method="POST" enctype="multipart/form-data">
                                                    <!--start Username Field-->
                                                    <div class="form-group  form-group-lg">
                                                        <div class="col-sm-10 col-md-10">
                                                            <input type="text" name="username" class="form-control" autocomplete="on" required="required" />
                                                        </div>
                                                        <label class="col-sm-2 control-label">اسم المستخدم</label>
                                                    </div>
                                                    <!--End Username Field-->

                                                    <!--start Password Field-->
                                                    <div class="form-group  form-group-lg">
                                                        <div class="col-sm-10 col-md-10">
                                                            <input type="password" name="password" class="password form-control" autocomplete="new-password" required="required" />
                                                        </div>
                                                        <label class="col-sm-2 control-label">كلمة المرور</label>
                                                    </div>
                                                    <!--End Password Field-->

                                                    <!--start FullName Field-->
                                                    <div class="form-group  form-group-lg">
                                                        <div class="col-sm-10 col-md-10">
                                                            <input type="text" name="fullname" class="form-control" required="required" />
                                                        </div>
                                                        <label class="col-sm-2 control-label">الاسم بالكامل</label>
                                                    </div>
                                                    <!--End FullName Field-->

                                                    <!--Start Phone Number Field-->
                                                    <div class="form-group  form-group-lg">
                                                        <div class="col-sm-10 col-md-10">
                                                            <input type="text" name="phone" class="form-control" />
                                                        </div>
                                                        <label class="col-sm-2 control-label">رقم الهاتف</label>
                                                    </div>
                                                    <!--End Phone Number Field-->

                                                    <!-- Start Select Role Of User -->
                                                    <div class="form-group  form-group-lg">
                                                        <div class="col-sm-10 col-md-10">
                                                            <select name="user_role" class="form-select" style="padding: 10px; font-size: 16px;">
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
                                                            <input type="submit" name="add_user" value="إضافة" class="btn btn-primary btn-lg" />
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

                <?php
            } elseif ($do == 'Edit') {
                $pageTitle = "تعديل الحساب";

                // Check if Get request UserId is numeric & get its integer value 
                $uid = isset($_GET['uid']) && is_numeric($_GET['uid']) ? intval($_GET['uid']) : 0;  // intval => integer value

                // Select all data in database that depend on this userId 
                $stmt = $con->prepare("SELECT * FROM admin WHERE UserID = ?");

                // Execute query
                $stmt->execute(array($uid));
                // Fetch the data
                $row = $stmt->fetch();
                // The row count that prove that there is a record in database with this userId
                $rowsCount = $stmt->rowCount();

                // If thre is such userId, Show the Form
                if ($rowsCount > 0) {
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
                                                    <h2 class="card-title fw-bold"><?php echo $pageTitle ?></h2>

                                                    <form class="col-md-9 form-horizontal" action="actions.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="userId" value="<?php echo $uid ?>">
                                                        <!--start Username Field-->
                                                        <div class="form-group  form-group-lg">
                                                            <div class="col-sm-10 col-md-10">
                                                                <input type="text" name="username" class="form-control" value="<?php echo $row['UserName'] ?>" autocomplete="off" required="required" />

                                                            </div>
                                                            <label class="col-sm-2 control-label">اسم المستخدم</label>
                                                        </div>
                                                        <!--End Username Field-->

                                                        <!--start Password Field-->
                                                        <div class="form-group  form-group-lg">
                                                            <div class="col-sm-10 col-md-10">
                                                                <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>" />
                                                                <input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="اترك المكان خالياُ إذا لم تود تغيير كلمة المرور" />
                                                            </div>
                                                            <label class="col-sm-2 control-label">كلمة المرور</label>
                                                        </div>
                                                        <!--End Password Field-->

                                                        <!--start FullName Field-->
                                                        <div class="form-group  form-group-lg">
                                                            <div class="col-sm-10 col-md-10">
                                                                <input type="text" name="fullname" value="<?php echo $row['FullName'] ?>" class="form-control" />

                                                            </div>
                                                            <label class="col-sm-2 control-label">الاسم بالكامل</label>
                                                        </div>
                                                        <!--End FullName Field-->

                                                        <!--Start Phone Number Field-->
                                                        <div class="form-group  form-group-lg">
                                                            <div class="col-sm-10 col-md-10">
                                                                <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" />
                                                            </div>
                                                            <label class="col-sm-2 control-label">رقم الهاتف</label>
                                                        </div>
                                                        <!--End Phone Number Field-->

                                                        <!-- Start Select Role Of User -->
                                                        <div class="form-group  form-group-lg">
                                                            <div class="col-sm-10 col-md-10">
                                                                <select name="user_role" class="form-select" style="padding: 10px; font-size: 16px;">
                                                                    <option value="0">دور المستخدم</option>
                                                                    <?php
                                                                    $allRoles = getAllFrom("*", "roles", "", "", "role_id", "ASC");
                                                                    foreach ($allRoles as $role) { ?>
                                                                        <option value="<?php echo $role['role_id']; ?>" <?php if ($row['role_id'] == $role['role_id']) echo 'selected="selected"'; ?>>
                                                                            <?php echo $role['role_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <label class="col-sm-2 control-label">دور المستخدم</label>
                                                        </div>
                                                        <!-- End Select Role Of User -->

                                                        <!--start Profile Image Field-->
                                                        <div class="form-group  form-group-lg">
                                                            <div class="col-sm-10 col-md-10">
                                                                <input type="hidden" name="oldavatar" value="<?php echo $row['avatar'] ?>" />
                                                                <input type="file" name="newavatar" class="form-control" />
                                                            </div>
                                                            <label class="col-sm-2 control-label">صورة المستخدم</label>
                                                        </div>
                                                        <!--End Profile Image Field-->

                                                        <!--start Submit Field-->
                                                        <div class="form-group  form-group-lg">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                <input type="submit" name="update_user" value="تحديث الحساب" class="btn btn-primary btn-lg" />
                                                            </div>
                                                        </div>
                                                        <!--End Submit Field-->
                                                    </form>
                                                    <div class="col-md-3">
                                                        <?php
                                                        if (!empty($row['avatar'])) {
                                                            echo "<img class='user-img' src='" . $imgs . $row['avatar'] . "' alt='' />";
                                                        } else {
                                                            echo "<img class='user-img' src='" . $imgs . "profile-img.jpg' alt='' />";
                                                        }
                                                        ?>
                                                    </div>

                                                </div>

                                            </div>
                                        </div><!-- End Recent Sales -->

                                    </div>
                                </div><!-- End Messages -->

                            </div>
                        </section>

                    </main><!-- End #main -->
<?php
                } else {
                    echo "<div class='container'>";

                    $theMsg = '<div class="alert alert-danger">لا يوجد حساب بهذا الاسم</div>';

                    redirectHome($theMsg, 'back', 5);

                    echo "</div>";
                }
            }
        }
    }
    include $templates . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}

ob_end_flush();

?>