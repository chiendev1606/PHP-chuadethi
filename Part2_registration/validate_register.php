<?php

//  ---- tao cac bien

// bien thong bao loi
$error = "";

// bien thong bao success
$success      = "";

// bien Phone_number
$Phone_Number = "";

// bien username
$User_Name    = "";

// neu nguoi dung an submit thi moi tien hanh validate
if (isset($_POST["submit"])) {

    // ghep file 
    require_once "../Part1_connection/connection.php";
    require_once "../Part1_connection/function.php";

    // kiem tra ton tai, neu bien ton tai thi khoi tao va gan gia tri. ( ham trim() la de xoa khoang trang (whites space) o dau va cuoi cua chuoi )
    $User_Name    = isset($_POST['User_Name']) ? trim($_POST['User_Name']) : "";
    $Password     = isset($_POST['Password']) ? trim($_POST['Password']) : "";
    $Phone_Number = isset($_POST['Phone_Number']) ? trim($_POST['Phone_Number']) : "";

    // tao bien chia khoa de tao tai khoan. neu enable = true thi cho phep tao tai khoan
    $enable       = true;

    // bat dau validate
    
    // check username ton tai bang ham checkUserName o file function. Neu ham checkUserName tra ve gia tri khac rong thi username da ton tai chay tiep lenh ben trong If
    //  neu Username chua ton tai thi ko chay cau lenh if

    if (!empty(checkUserName($connect_db, $User_Name, $User_Name))) {
        
        // tao error message "username already taken !!"
        $error        = "username already taken !!";
        
        // xoa gia tri cua bien UserName va Phone_Number
        $User_Name    = "";
        $Phone_Number = "";

        // thay doi bien chia khoa de khong cho phep tao tai khoan
        $enable       = false;
    }

    // Tien hanh tao tai khoan neu username chua ton tai
    // dung ham Create_Account de tao tai khoan va them vao database
    if ($enable == true) {
        Create_Account($connect_db, $User_Name, $Password, $Phone_Number);
        $success = "Register successfull !";

    }

}
