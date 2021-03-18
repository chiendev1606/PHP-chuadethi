<?php

$error     = "";
$success   = "";
$User_Name = "";
if (isset($_POST["submit"])) {

    // ghep file
    require_once "../Part1_connection/connection.php";
    require_once "../Part1_connection/function.php";

    // kiem tra ton tai, neu bien ton tai thi khoi tao va gan gia tri. ( ham trim() la de xoa khoang trang (whites space) o dau va cuoi cua chuoi )
    $User_Name = isset($_POST['User_Name']) ? trim($_POST['User_Name']) : "";
    $Password  = isset($_POST['Password']) ? trim($_POST['Password']) : "";

    // dung ham login tao o function.php de check username va pw, neu username va pw dung thi chuyen sang trang login_success.php
    if (LoginSystem($connect_db, $User_Name, $Password) == true) {
        header("location: ./login_success.php");

    } else {

        // neu loi thi gan gia tri cho bien error
        $error = "invalid username or password";

    }

}
