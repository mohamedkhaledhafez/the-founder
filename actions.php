<?php
session_start();
include "manage/connect.php";

/////////////////////// Insert Message ///////////////////////// 
if (isset($_POST['send_msg'])) {
    $fname       = $_POST['fname'];
    $lname       = $_POST['lname'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $message    = $_POST['message'];

    if (empty($phone)) {
        $_SESSION['status'] = "من فضلك أدخل رقم هاتفك !";
        $_SESSION['status_code'] = "error";
        header("Location: contact.php");
    } else if (empty($message)) {
        $_SESSION['status'] = "من فضلك أدخل استفسارك";
        $_SESSION['status_code'] = "error";
        header("Location: contact.php");
    } else {
        $stmt = $con->prepare("INSERT INTO messages (fname, lname, email, phone, Date, message)
                                    VALUES('$fname', '$lname', '$email', '$phone', now(), '$message')");
        $stmt->execute();

        $_SESSION['status'] = "شكراً لتواصلكم معنا";
        $_SESSION['status_code'] = "success";
        header("Location: contact.php");
    }
}
/* 
<div class="alert fade" id="alert-danger" role="alert" data-mdb-color="danger" data-mdb-position="top-right" data-mdb-stacking="true" data-mdb-width="535px" data-mdb-width="535px" data-mdb-append-to-body="true" data-mdb-hidden="true" data-mdb-autohide="true" data-mdb-delay="2000">
    Please enter your contact number !
    <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
</div>
 */