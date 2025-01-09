<?php
session_start();
$pageTitle  = 'تسجيل الدخول';
$noNavbar   = '';
include 'init.php';

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
/* if(isset($_SESSION['Username'])) {
            header('Location: dashboard.php');
            exit();
        } else if((isset($_SESSION['Username'])) && ($permission_name["role_id"] != 1)) {
            header('Location: dep_dashboard.php');
            exit();
        } */
// print_r($_SESSION);


// Check if user is coming from http post request:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $counter = 0;
    // $hashedPassword = sha1($password);

    // Check if user exist in database:
    $stmt = $con->prepare("SELECT
                                    * 
                                FROM 
                                    admin 
                                Where 
                                    UserName = ? 
                                AND 
                                    Password = ? 
                                AND
                                    admin.active = 1
                                ");
    $stmt->execute(array($username, $password));
    $row = $stmt->fetch();
    $rowsCount = $stmt->rowCount();


    $counter = 0;
    // If count > 0, this mean the database contain record about this user
    if ($rowsCount > 0) {
        $adminId = $row['UserID'];
        $adminRole = $row['role_id'];
        $adminUser = $row['UserName'];
        $_SESSION['Username'] = $username; // Register session name
        $_SESSION['ID']       = $row['UserID']; // Register session ID 
        // header('Location: dashboard.php');  // Redirect to dashboard page
        // $getCat = $con->prepare("SELECT admin, logs FROM admin_logs_number WHERE admin = '$adminId'");
        // $getCat->execute();
        // $counter += 1;

        // $stmt = $con->prepare("INSERT INTO admin_logs_number (logs, admin) VALUES('$counter', '$adminId')");
        // $stmt->execute();

        // $stmt2 = $con->prepare("SELECT distinct * FROM admin_logs_number LIMIT 1");
        // $stmt2->execute();
        // $grades = $stmt2->fetchAll();

        // foreach ($grades as $grad) {
        //     // $logs = $grad['logs'] + 1;
        //     // countMessages
        //     echo '<h1 class="logs_numbers">' . $adminUser . ' Loged : ' . countMessages('logs', 'admin_logs_number', "WHERE admin = {$adminId}") . ' Times</h1>';
        // }
        foreach ($info as $permission_name) {

            if ($adminRole != 1) {
                header("Location: dep_dashboard.php");
                exit();
            } elseif ($adminRole = 1) {
                header("Location: dashboard.php");
                exit();
            }
        }
    } else {
        $formsErrors[] = "Please enter valid username & password";
    }
}

?>

<!-- Welcome To Index Page  -->
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="<?php echo $imgs; ?>logo.png" alt="">
                                <span class="d-lg-block">The Founder</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">تسجيل الدخول</h5>
                                    <p class="text-center small">أدخل اسم المستخدم وكلمة المرور</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate
                                    action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">اسم المستخدم</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="user" class="form-control" id="yourUsername"
                                                required>
                                            <div class="invalid-feedback">من فضلك ادخل اسم المستخدم</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">كلمة المرور</label>
                                        <input type="password" name="pass" class="form-control" id="yourPassword"
                                            required>
                                        <div class="invalid-feedback">من فضلك اخدل كلمة المرور</div>
                                    </div>

                                    <!-- <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div> -->
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>
                                    </div>
                                    <!-- <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="pages-register.html">Create
                                                an account</a></p>
                                    </div> -->
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Designed by <a href="https://ultraapps.net/">Ultra Apps</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->