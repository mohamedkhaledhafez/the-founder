<?php

ob_start(); // Output Buffering Start
session_start();

$pageTitle = 'لوحة التحكم';
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

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Messages Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">الرسائل</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-chat-left-dots"></i>
                                    </div>
                                    <div class="p-3">
                                        <h6><?php echo countItems('ID', 'messages'); ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Messages Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-6 col-xl-12">

                        <div class="card info-card customers-card">



                            <div class="card-body">
                                <h5 class="card-title">المستخدمين</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="p-3">
                                        <h6><?php echo countItems('UserID', 'admin'); ?></h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Recent Messages -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <!-- <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start">
                                                    <h6>Filter</h6>
                                                </li>

                                                <li><a class="dropdown-item" href="#">Today</a></li>
                                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div> -->

                            <div class="card-body">
                                <h2 class="card-title fw-bold">آخر الرسائل </h2>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">الاسم</th>
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
                                            <td>
                                                <a class="btn btn-info" target="_blank"
                                                    href="message_details.php?msgid=<?php echo $msg['ID'] ?>">عرض
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
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <!-- <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                                    <div class="activity">

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">32 min</div>
                                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                            <div class="activity-content">
                                                Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">56 min</div>
                                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                            <div class="activity-content">
                                                Voluptatem blanditiis blanditiis eveniet
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">2 hrs</div>
                                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                            <div class="activity-content">
                                                Voluptates corrupti molestias voluptatem
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">1 day</div>
                                            <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                            <div class="activity-content">
                                                Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a>
                                                tempore
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">2 days</div>
                                            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                            <div class="activity-content">
                                                Est sit eum reiciendis exercitationem
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">4 weeks</div>
                                            <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                            <div class="activity-content">
                                                Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div> -->
                <!-- End Recent Activity -->

            </div><!-- End Right side columns -->

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