<?php
session_start();
require '../../php/auth_functions.php';
require '../../php/datacheck.php';
require '../../php/security_functions.php';

if(isset($_REQUEST['activation'])){
    if(strcmp($_REQUEST['activation'], $_SESSION['activation']) == 0){
        $_POST['loginsubmit'] = 'loginsubmit';
        $_POST['email'] = $_SESSION['email'];
        $_POST['password'] = "7777777";
        $_POST['auth'] = 1;
    }else{
        header("Location: resend_validation.inc.php");
        exit;
    }
}
if (!isset($_POST['loginsubmit'])){
    header("Location: ../login.php");
    exit();
} else {
    foreach($_POST as $key => $value){
        $_POST[$key] = _cleaninjections(trim($value));
    }

    if (!verify_csrf_token() && !isset($_POST['auth'])){
        $_SESSION['STATUS']['loginstatus'] = 'Request could not be validated';
        header("Location: ../login.php");
        exit();
    }
    require '../../env/db.inc.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        $_SESSION['STATUS']['loginstatus'] = 'fields cannot be empty';
        header("Location: ../login.php");
        exit();
    } else {
        $sql = "UPDATE users SET last_login_at=NOW() WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['ERRORS']['sqlerror'] = 'SQL ERROR';
            header("Location: ../login.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
        }
        if(isset($_POST['auth'])){
            $sql = "UPDATE users SET status=1 WHERE emailUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
            }
        }
        $sql = "SELECT * FROM users WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
            header("Location: ../login.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck == false && !isset($_SESSION['email'])) {
                    $_SESSION['ERRORS']['wrongpassword'] = 'wrong password';
                    header("Location: ../login.php");
                    exit();
                } else {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['emailUsers'];
                    $_SESSION['first_name'] = $row['firstname'];
                    $_SESSION['last_name'] = $row['lastname'];
                    if ($row['status'] == 0) {
                        header("Location: ../notverified.php");
                        exit();
                    }
                    if ($row['verified_at'] != NULL) {
                        $_SESSION['auth'] = 'verified';
                    } else {
                        $_SESSION['auth'] = 'loggedin';
                    }
                    $_SESSION['profile_image'] = $row['profile_image'];
                    $_SESSION['verified_at'] = $row['verified_at'];
                    $_SESSION['created_at'] = $row['created_at'];
                    $_SESSION['updated_at'] = $row['updated_at'];
                    $_SESSION['last_login_at'] = $row['last_login_at'];
                    $_SESSION['user_type'] = $row['user_type'];
                    if ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 3) {
                        header("Location: ../../partner/partner_board.php");
                    } elseif ($_SESSION['user_type'] == 4 || $_SESSION['user_type'] == 5 || $_SESSION['user_type'] == 6) {
                        header("Location: ../../employee/employee_board.php");
                    } elseif ($_SESSION['user_type'] == 7) {
                        header("Location: ../../patient/index.php");
                    } else {
                        header("Location: ../../admin/dashboard.php");
                    }
                    exit();
                }
            } else {
                $_SESSION['ERRORS']['nouser'] = 'user does not exist';
                header("Location: ../login.php");
                exit();
            }
        }
    }
}