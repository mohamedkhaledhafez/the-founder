<?php

ob_start(); // Output Buffering Start
session_start();

$pageTitle = 'تفاصيل الرسالة';
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
    foreach ($info as $permission_name) {
        if ($permission_name['perm_name'] == 'Messages' && $permission_name['role_id'] == $AdminRole) {

            // Check if Get request UserId is numeric & get its integer value 
            $msgid = isset($_GET['msgid']) && is_numeric($_GET['msgid']) ? intval($_GET['msgid']) : 0;

            // $stmt2 = $con->prepare("SELECT * FROM std_app WHERE ID = ?");
            $stmt = $con->prepare("SELECT * FROM messages WHERE ID = ?");
            // Execute the statement 
            $stmt->execute(array($msgid));
            $info = $stmt->fetch(); ?>

            <main id="main" class="main">
                <div class="pagetitle">
                    <h1>
                        <h1><?php echo $pageTitle ?></h1>
                    </h1>
                </div><!-- End Page Title -->

                <section class="section message">
                    <div class="row">

                        <!-- Left side columns -->
                        <div class="col-lg-8">
                            <div class="row">

                                <!-- Recent Messages -->
                                <div class="col-12">
                                    <div class="card recent-sales overflow-auto">

                                        <div class="card-body">
                                            <h5 class="card-title">تفاصيل الرسالة</h5>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label ">#</div>
                                                <div class="col-lg-9 col-md-8"><?php echo $info['ID']; ?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">اسم الراسل</div>
                                                <div class="col-lg-9 col-md-8">
                                                    <?php echo $info['fname'] . " " . $info['lname']; ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">البريد الإلكتروني</div>
                                                <div class="col-lg-9 col-md-8"><?php echo $info['email']; ?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
                                                <div class="col-lg-9 col-md-8"><?php echo $info['phone']; ?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">تاريخ الرسالة</div>
                                                <div class="col-lg-9 col-md-8"><?php echo $info['Date']; ?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">الرسالة </div>
                                                <div class="col-lg-9 col-md-8"><?php echo $info['message']; ?></div>
                                            </div>

                                        </div>

                                    </div>
                                </div><!-- End Recent Sales -->

                            </div>
                        </div><!-- End Left side columns -->


                    </div>
                </section>

            </main><!-- End #main -->


<?php
            include $templates . 'footer.php';
        }
    }
} else {
    header('Location: index.php');
    exit();
}

ob_end_flush();

?>