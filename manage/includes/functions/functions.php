<?php


/**
 ** Get All Function v2.0
 ** [Function To Get All Records From any table 
 */

function getAllFrom($field, $tableName, $where, $and, $orderField, $ordering = "ASC")
{

    global $con;

    $getAll = $con->prepare("SELECT $field FROM $tableName $where $and ORDER BY $orderField $ordering");

    $getAll->execute();

    $all = $getAll->fetchAll();

    return $all;
}

/**
 ** Get Categories Function v2.0
 ** [Function To Get Categories From Database 
 */

function getCat()
{

    global $con;

    $getCat = $con->prepare("SELECT * FROM grades ORDER BY ID ASC");

    $getCat->execute();

    $cats = $getCat->fetchAll();

    return $cats;
}

function getGrades($where)
{

    global $con;

    $getCat = $con->prepare("SELECT * FROM grades $where ORDER BY ID ASC");

    $getCat->execute();

    $grades = $getCat->fetchAll();

    return $grades;
}


/**
 ** Get Newsletter Data Functions v2.0
 ** [Function To Get Newsletter Data From Database 
 */

function getNewsletter()
{

    global $con;

    $getNews = $con->prepare("SELECT * FROM news WHERE New_ID = ?");

    $getNews->execute();

    $news = $getNews->fetchAll();

    return $news;
}

/**
 * Check if the user is not activated
 * Function to check the register status of the user
 */

function checkUserStatus($user)
{
    global $con;

    $stmtx = $con->prepare("SELECT
                                        UserName 
                                    FROM 
                                        clients 
                                    Where 
                                        UserName = ?");
    $stmtx->execute(array($user));
    $status = $stmtx->rowCount();
    return $status;
}






/**
 * Title function that echo the page title in case the page has a variable  $pageTitle 
 * and echo default title for other pages
 */

function echoTitle()
{

    global $pageTitle;

    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo "Default";
    }
}


/*
      * Home Redirect Function
      * [This Function accept parameters] 
      * $theMsg   = Echo a message [Error | Success | Warning | any message]
      * $url      = The Link You Want To Redirect To
      * $seconds  = Seconds before Redircting to home page
      */


function redirectHome($theMsg, $url = null, $seconds = 0)
{

    if ($url === null) {

        $url  = 'index.php';
        $link = 'Home';
    } else {

        if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {

            $url  = $_SERVER['HTTP_REFERER'];
            $link = "Previous";
        } else {

            $url = 'index.php';
            $link = "Home";
        }
    }

    echo $theMsg;

    // echo "<div class='alert alert-info'>You will be redirected to $link page After $seconds seconds</div>";

    // Redirect to Home page (index page) => [url=index.php]
    header("refresh:$seconds;url=$url");

    // To exit and dont execute any code after header()
    exit();
}


/**
 * Function to check if items is already exist in database or not to add them if not exist
 * [This Function accept parameters]
 * $select = The Items To Select [ex: user, item, category] from >>> table ($from)
 * $from   = The Table To Select From [ex: users, items, categories]
 * $value  = The Value Of Select 
 */

function checkItem($select, $from, $value)
{

    global $con;

    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

    $statement->execute(array($value));

    $count = $statement->rowCount();

    return $count;
}


/**
 * Count Number Of Items 
 * [Function To Count The Number Of Items Rows]
 * $item  = The items to count
 * $table = The table to choose data from it 
 */

function countItems($item, $table)
{

    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

    $stmt2->execute();

    return $stmt2->fetchColumn();
}

/**
 * Count Number Of Daily Clients  
 * [Function To Count The Number Of Items Rows]
 * $item  = The items to count
 * $table = The table to choose data from it 
 */

function countDilyClients($client, $table, $where)
{

    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($client) FROM $table $where");

    $stmt2->execute();

    return $stmt2->fetchColumn();
}



/**
 ** Get The Latest Records
 ** [Function To Get Latest Items/Users/Categories/Comments... From Database 
 ** $select = Field to select
 ** $table  = The table to choose user's data from it
 ** $order  = The Descending Order of items
 ** $limit  = Number of records that will be fetched from users
 */

function getLatest($select, $table, $where = null, $order, $limit = 5)
{
    global $con;

    $getStatment = $con->prepare("SELECT $select FROM $table $where ORDER BY $order DESC LIMIT $limit");

    $getStatment->execute();

    $rows = $getStatment->fetchAll();

    return $rows;
}

function getLatestContract($select, $table, $where = null, $order, $limit = 5)
{
    global $con;

    $getStatment = $con->prepare("SELECT $select FROM $table $where ORDER BY $order ASC LIMIT $limit");

    $getStatment->execute();

    $rows = $getStatment->fetchAll();

    return $rows;
}

/**
 ** Get The Latest Message From Chat
 ** [Function To Get Latest Message From Chat] 
 ** $select = Field to select
 ** $table  = The table to choose user's data from it
 ** where   = The Condition
 ** $order  = The Descending Order of items
 ** $limit  = Number of records that will be fetched from users
 */
function getLatestMessage($select, $table, $where, $and, $order, $limit = 5)
{
    global $con;

    $getStatment = $con->prepare("SELECT $select FROM $table $where $and ORDER BY $order DESC LIMIT $limit");

    $getStatment->execute();

    $rows = $getStatment->fetchAll();

    return $rows;
}

function countMessages($msg, $table, $where, $and = null, $and2 = null, $and3 = null)
{

    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($msg) FROM $table $where $and $and2 $and3");

    $stmt2->execute();

    return $stmt2->fetchColumn();
}

