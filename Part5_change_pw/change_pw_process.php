<?php

if (isset($_POST["submit"])) {

    // ghep file
    require_once "../Part1_connection/connection.php";
    require_once "../Part1_connection/function.php";

    $User_Name        = isset($_POST['User_Name']) ? trim($_POST['User_Name']) : "";
    $Password_Current = isset($_POST['Password_Current']) ? trim($_POST['Password_Current']) : "";
    $Password_New     = isset($_POST['Password_New']) ? trim($_POST['Password_New']) : "";

    // dung ham checkUserName o function.php de lay du lieu nguoi dung
    $data         = checkUserName($connect_db, $User_Name, $User_Name);

   
    // kiem tra username ton tai, neu data rong tuc la chua ton tai username -> chuyen huong ve change_pw kem thong bao loi errorusername=ivalidusername
    if (empty($data)) {
        header("location: ./change_pw.php?errorusername=ivalidusername");

        // ngat he thong de bao ve database
        exit();

    }
    // lay du lieu Phone_number

    $Phone_Number = $data[0]["PHONE"];

    // dung ham LoginSystem de kiem tra password current co voi username ko? neu fasle la pw current sai -> chuyen huong ve change_pw kem thong bao loi errorpw=ivalidpwcurrent
    if (LoginSystem($connect_db, $User_Name, $Password_Current) == false) {
        header("location: ./change_pw.php?errorpw=ivalidpwcurrent");

        // ngat he thong de bao ve database

        exit();
    }

    // Tien hanh update mat khau moi bang ham reset_PW
    reset_Pw($connect_db, $User_Name, $Phone_Number, $Password_New);

    // chuyen huong ve change_pw.php voi thong bao thanh cong
    header("location: ./change_pw.php?pw=success");
    exit();

}
