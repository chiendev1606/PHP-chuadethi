<?php

if (isset($_POST["submit"])) {

    // ghep file
    require_once "../Part1_connection/connection.php";
    require_once "../Part1_connection/function.php";

    // kiem tra ton tai, neu bien ton tai thi khoi tao va gan gia tri. ( ham trim() la de xoa khoang trang (whites space) o dau va cuoi cua chuoi )
    $User_Name    = isset($_POST['User_Name']) ? trim($_POST['User_Name']) : "";
    $Phone_Number = isset($_POST['Phone_Number']) ? trim($_POST['Phone_Number']) : "";

    // kiem tra ton tai username, neu chua ton tai thi chay lenh if

    if (empty(checkUserName($connect_db, $User_Name, $User_Name))) {

        // neu username khong ton tai thi chuyen huong ve trang reset_pw.php kem tin nhan bao loi "error1=upnotexist";
        header("location: ./reset_pw.php?error1=upnotexist");

        // ngat he thong de bao ve database
        exit();

    } else {
        // dung ham random_str lap o function.php de tao 1 chuoi ki tu ngau nhien
        $pw_new = random_str($connect_db, $User_Name);

        // su dung ham reset_Pw de tien hanh update pw moi
        $check = reset_Pw($connect_db, $User_Name, $Phone_Number, $pw_new);

        // Neu ham reset_Pw tra ve gia tri false, tuc la qua trinh reset that bai, thi chuyen huong ve trang reset_pw.php kem tin nhan bao loi "error2=upnotmatch";
        if ($check == false) {
            header("location: ./reset_pw.php?error2=upnotmatch");

            // ngat he thong de bao ve database
            exit();

            // Neu ham reset_Pw tra ve gia tri true, tuc la qua trinh reset thanh cong, thi chuyen huong ve trang reset_pw.php kem tin nhan bao thanh cong va mat khau moi "pwnew=" . $pw_new;
        } elseif ($check == true) {
            header("location: ./reset_pw.php?pwnew=" . $pw_new);

            // ngat he thong de bao ve database
            exit();

        }

    }
}
