<?php
session_start();

include "connect.php";

/////////////////////// Delete Message ///////////////////////// 
if (isset($_POST['delete_msg'])) {
    $delete_msgId     = $_POST['delete_msgId'];

    $stmt = $con->prepare("DELETE FROM messages WHERE ID = :mid ");
    $stmt->bindParam(":mid", $delete_msgId);
    $stmt->execute();

    $_SESSION['status'] = 'تم حذف الرسالة بنجاح';
    $_SESSION['status_code'] = "success";

    header('location:messages.php');
}
/////////////////////// Add User ///////////////////////// 

if (isset($_POST['add_user'])) {
    $avatarName = $_FILES['avatar']['name'];
    $avatarSize = $_FILES['avatar']['size'];
    $avatarTmp = $_FILES['avatar']['tmp_name'];
    $avatarType = $_FILES['avatar']['type'];

    // Get variables from Form
    $user   = $_POST['username'];
    $pass   = $_POST['password'];
    // $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $full   = $_POST['fullname'];
    $user_role   = $_POST['user_role'];

    // List of allowed file type to upload
    $avatarAllowedExtension = array("jpeg", "jpg", "png", "gif", "jfif", "webp", "mp4");

    // Get avatar extensions
    $exp = explode('.', $avatarName);
    $avatarExtension = strtolower(end($exp));

    // Check if Category is exist in Database
    $stmtx = $con->prepare("SELECT
                                UserName 
                            FROM 
                                admin 
                            WHERE 
                                UserName = ?");
    $stmtx->execute(array($user));
    $status = $stmtx->rowCount();

    if ($status > 0) {
        $_SESSION['status'] = "عفواً، هذا المستخدم موجود بالفعل";
        $_SESSION['status_code'] = "error";
        header("Location: users.php?do=Add");
    } else {
        move_uploaded_file($avatarTmp, "uploads/imgs/" . $avatarName);

        // Insert Category Informations To Database
        $stmt = $con->prepare("INSERT INTO 
                            admin(UserName, Password, FullName, phone, Date, avatar, role_id)
                            VALUES(:muser, :mpass, :mfull, :mphone, now(), :mavatar, :mrole)");

        $stmt->execute(array(
            'muser' => $user,
            'mpass' => $pass,
            'mfull' => $full,
            'mphone' => $phone,
            'mavatar' => $avatarName,
            'mrole' => $user_role
        ));

        $_SESSION['status'] = "تم إنشاء حساب جديد";
        $_SESSION['status_code'] = "success";
        header("Location: users.php");
    }
}
/////////////////////// Edit User ///////////////////////// 

if (isset($_POST['update_user'])) {
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
    $userId     = $_POST['userId'];
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
    $formErrors = array();

    if (empty($formErrors)) {
        move_uploaded_file($avatarTmp, "uploads/imgs/" . $avatarName);

        // Insert Category Informations To Database
        $stmt = $con->prepare("UPDATE admin SET UserName = ?, FullName = ?, phone = ?, role_id = ?, Password = ?, avatar = ? WHERE UserID = ?");
        $stmt->execute(array($user, $full, $phone, $user_role, $pass, $avatar, $userId));

        $_SESSION['status'] = "تم تعديل الحساب";
        $_SESSION['status_code'] = "success";
        header("Location: users.php");
    }
}

/////////////////////// Delete User ///////////////////////// 
if (isset($_POST['delete_user'])) {
    $delete_uid     = $_POST['delete_uid'];

    $stmt = $con->prepare("DELETE FROM admin WHERE UserID = :mid ");
    $stmt->bindParam(":mid", $delete_uid);
    $stmt->execute();

    $_SESSION['status'] = 'تم حذف الحساب بنجاح';
    $_SESSION['status_code'] = "success";

    header('location:users.php');
}
