<?php

ob_start();
session_start();

$pageTitle = 'Dashboard Themes';


include 'init.php';

if (isset($_SESSION['Username']) || isset($_SESSION['User'])) {

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    // Start Manage Page
    if ($do == 'Manage') { // Manage Page 
    ?>
            <h1 class="text-center main-title"><?php echo $lang['back_themes'] ?></h1>
        <div class="container">
            <div class="setting-box">
                <div class="setting-container open">
                    <div class="option-box">
                        <!-- <h4><?php echo $lang['choose_themes'] ?></h4> -->
                        <ul class="colors-list">
                            <li class="active" data-color="#123d7e" data-alterColor="#123d7e80"></li>
                            <li data-color="#004158" data-alterColor="#fde49880"></li>
                            <li  data-color="#552707" data-alterColor="#e92a1d80"></li>
                            <li data-color="#385723" data-alterColor="#8dd11f80"></li>
                            <li data-color="#4c004c" data-alterColor="#d873c780"></li>
                            <li data-color="#700000" data-alterColor="#d873c780"></li>
                            <li data-color="#604900" data-alterColor="#d873c780"></li>
                        </ul>
                    </div>
                </div>
            </div>     
        </div>
<?php
    } 

    include $templates . 'footer.php';

    } else {

        header('Location: index.php');
        exit();
    }

    ob_end_flush();
?>