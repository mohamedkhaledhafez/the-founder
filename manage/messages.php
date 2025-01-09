<?php

ob_start(); // Output Buffering Start
session_start();

$pageTitle = 'الرسائل';
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
        if ($permission_name['perm_name'] == 'Dashboard' && $permission_name['role_id'] == $AdminRole) { ?>
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
                                            <h2 class="card-title fw-bold">آخر الرسائل </h2>
                                            <table class="table table-borderless datatable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th class="text-center" scope="col">الاسم</th>
                                                        <th scope="col">رقم الهاتف</th>
                                                        <th scope="col">التاريخ</th>
                                                        <th scope="col">الرسالة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $messages = getAllFrom("*", "messages", "", "", "ID", "ASC");
                                                    foreach ($messages as $msg) { ?>
                                                        <tr>
                                                            <th scope="row"><a href="#">#<?php echo $msg['ID']; ?></a></th>
                                                            <td><?php echo $msg['fname'] . " " . $msg['lname']; ?></td>
                                                            <td><?php echo $msg['phone']; ?></td>
                                                            <td><?php echo $msg['Date']; ?></td>
                                                            <td class="msg-actions">
                                                                <p>
                                                                <form action="actions.php" method="post">
                                                                    <input type="hidden" name="delete_msgId" value="<?php echo $msg['ID'] ?>">
                                                                    <button type="submit" name="delete_msg" class="btn btn-danger">
                                                                        <i class="bx bxs-trash"></i>
                                                                    </button>
                                                                </form>
                                                                </p>
                                                                <a class="btn btn-info" target="_blank" href="message_details.php?msgid=<?php echo $msg['ID'] ?>">عرض
                                                                    الرسالة</a>
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