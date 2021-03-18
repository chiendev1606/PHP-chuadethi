<?php
// tao ham lay du lieu cua nguoi dung tu username hoac phone
function checkUserName($connect_db, $User_Name, $Phone_Number)
{
    // tao mang row chua du lieu
    $row = array();

    $sql = "SELECT * FROM abc12users WHERE USERNAME =? OR PHONE = ?;";

    // chuan bi cau lenh trong database
    $stmt = mysqli_stmt_init($connect_db);

    // neu cau lenh chua dc chua bi thi hien thi thong bao loi SQL error va ngat he thong
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error");
    } else {

        // gan bien vao vao cau lenh da duoc chuan bi
        mysqli_stmt_bind_param($stmt, "si", $User_Name, $Phone_Number);

        // thuoc thi cau lenh da duoc tao
        mysqli_stmt_execute($stmt);

        // lay du lieu sau khi da thuoc thi
        $data = mysqli_stmt_get_result($stmt);

        // dung ham mynumrow de kiem tra so ban ghi lay duoc, neu ko co ban ghi nao thi ko chay
        if (mysqli_num_rows($data) > 0) {

            // lay du lieu nguoi dung va cho vao mang row
            while ($row1 = mysqli_fetch_assoc($data)) {
                $row[] = $row1;
            }
        }

        // tra ve mang row
        return $row;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect_db);

}

// tao ham tao tai khoan nguoi dung
function Create_Account($connect_db, $User_Name, $Password, $Phone_Number)
{
    // ma hoa pw theo chuan sha1
    $hashedpw = sha1($Password);
    $sql      = "INSERT INTO abc12users(USERNAME, PASSWORD_HASH, PHONE) VALUES(?,?,?);";
    $stmt     = mysqli_stmt_init($connect_db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error");
    } else {
        mysqli_stmt_bind_param($stmt, "ssi", $User_Name, $hashedpw, $Phone_Number);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect_db);

}

// tao ham check username va password
function LoginSystem($connect_db, $User_Name, $Password)
{
    // tao bien chia khoa result = false, neu result = false tuc username password bi sai hoac khong ton tai va nguoc lai
    $result = false;

    // lay du lieu nguoi dung tu ham checkUserName da duoc tao o tren
    $data = checkUserName($connect_db, $User_Name, $User_Name);

    // ma hoa password nguoi dung nhap bang chuan sha1
    $hash_pw = sha1($Password);

    // neu mang data la mang rong thi khong thuc hien vi username nguoi dung nhap vao ko ton tai
    if (!empty($data)) {

        // so sanh pw nguoi dung nhap vao voi pw trong database neu match thi tra ve result = true tuc la username password da dung
        if ($hash_pw == $data[0]['PASSWORD_HASH']) {
            $result = true;
        }

    }
    // tra ve gia tri true
    return $result;

}

// ham tao ra 1 chuoi bat ki khong duoc trung voi cac chuoi password trong database
function random_str($connect_db)
{
    // tao 1 mang chua cac ki tu so 0-9, a-z, A-Z
    $arr = array_merge(range(0, 9), range("a", "z"), range("A", "Z"));

    // chuyen mang arr thanh chuoi random_str bang ham implode
    $random_str = implode('', $arr);

    // tao ra 1 chuoi ki tu ngay nhien bang ham str_shuffle
    $random_str = str_shuffle(implode('', $arr));

    // lay 10 ki tu cua chuoi random_str de lam password moi bang ham substr
    $str = substr($random_str, 0, 10);

    // ma hoa chuoi str bang sha1
    $hashed_str = sha1($str);
    // tao bien kiem tra enable
    $enable = true;
    // lay tat ca password nguoi dung trong database
    $data = mysqli_query($connect_db, "SELECT PASSWORD_HASH FROM abc12users");

    
    if (mysqli_num_rows($data) > 0) {
        // check chuoi ki tu vua tao co trung voi password o trong database khong? neu trung thi gan bien enable == fasle
        while ($row = mysqli_fetch_assoc($data)) {
            if ($hashed_str == $row["PASSWORD_HASH"]){
                $enable = false;
            }
        }
    }

    // neu bien enable == false thi chay lai ham random_str den khi nao tim ra chuoi ki tu hop le thi thoi
    if ($enable == false){
        random_str($connect_db);

    } elseif($enable == true) {
        // neu bien enable == true tuc la da tim ra chuoi ki tu hop le khong trung trong database, thi tien hanh tra ve chuoi ki tu do
        return $str ;
    }

}

// ham update password
function reset_Pw($connect_db, $User_Name, $Phone_Number, $pw_new)
{
    // tao bien chia khoa
    $result      = true;

    // ma hoa password moi bang sha1
    $pw_new_hash = sha1($pw_new);

    $sql  = "UPDATE abc12users SET PASSWORD_HASH=? WHERE USERNAME =? AND PHONE =?;";
    $stmt = mysqli_stmt_init($connect_db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error");
    } else {
        mysqli_stmt_bind_param($stmt, "ssi", $pw_new_hash, $User_Name, $Phone_Number);
        mysqli_stmt_execute($stmt);

        // dung ham mysqli_stmt_affected_rows kiem tra xem du lieu da duoc update chua, neu == 0 tuc la ko co hang nao duoc thay doi, va du lieu chua dc update
        // tien hanh gan bien result = false tuc la qua trinh update khong thanh cong;
        if (mysqli_stmt_affected_rows($stmt) == 0) {
            $result = false;

        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect_db);
    // tra ve bien result
    return $result;

}
