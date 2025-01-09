<!DOCTYPE html>

<html dir="<?php echo $dir; ?>">
<!-- class="fontawesome-i2svg-active fontawesome-i2svg-complete" -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" CONTENT="The Founder | Digital Marketing Agencey 
    شركة The Founder هي شركة متخصصة في تقديم الخدمات التسويقية
                    والبرمجية للشركات الناشئة والمؤسسين ومساعدتهم على تأسيس أعمالهم
                    والترويج لها بشكل فعال وذلك من خلال تقديم باقة متنوعة من الخدمات
                    التسويقية المتعارف عليها وتطوير مواقع الويب وحلول التجارة
                    الإلكترونية لمساعدتك في الوصول إلى عملائك بشكل أسرع.">
    <!-- <meta name="google-site-verification" content="QSRGHCV3tB_9_r2GHU_v__kTz2eBFyOnM1uj_U9kNus" /> -->
    <meta name="robots" content="index,follow">
    <title><?php echoTitle(); ?> </title>
    <link rel="stylesheet" href="<?php echo $css ?>bootstrap.min.css" />
    <!-- Favicons -->
    <link href="<?php echo $$imgs ?>favicon.png" rel="icon">
    <link href="<?php echo $$imgs ?>apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo $vendor ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo $vendor ?>/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo $css ?>style.css" rel="stylesheet">


    <!-- <link rel="stylesheet" href="<?php echo $css ?>backend.css" /> -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8VG0J4TW8L"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-8VG0J4TW8L');
</script>

<body>
    <?php
    if ($noNavbar != '') {
        include 'navbar.php';
    }
    ?>