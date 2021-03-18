<?php

/* ----- Part 1: make the database connection  ---- */
 


$dbhost     = 'localhost';
$dbusername = 'root';
$dbpassword = '';

// ket noi voi websever qua tai khoan root, may chu local host || Neu ket noi that bai hien thong bao loi "error_connect_database" va dung chuong trinh
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword) or die("error_connect_database");

// tao database abc12 neu chua ton tai || Neu loi thi hien thong bao "error_create_db") va dung chuong trinh
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS abc12") or die("error_create_db");


// Select(su dung) database abc12 || Neu loi thi hien thong bao "error_use_abc12" va dung chuong trinh

mysqli_query($conn, "USE abc12") or die("error_use_abc12");


// Tao bang abc12users neu chua ton tai || Neu loi thi hien thong bao "error_create_table" va dung chuong trinh
$SQL_createtable = "CREATE table IF NOT EXISTS  abc12users (USERNAME VARCHAR(100) PRIMARY KEY, PASSWORD_HASH CHAR(40), PHONE VARCHAR(40) );";

mysqli_query($conn, $SQL_createtable) or die("error_create_table");

// ngat ket noi den web server
mysqli_close($conn);
/* ----- Part 1: END ---- */


// Tao ket noi truc tiep den db abc12 de lam cac part tiep theo

$database = 'abc12';

$connect_db = mysqli_connect($dbhost, $dbusername, $dbpassword, $database);

