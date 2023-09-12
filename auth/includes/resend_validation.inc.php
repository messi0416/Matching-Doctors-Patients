<?php
session_start();
require_once(__DIR__ . "/../../brevomail.php");
$sendmailer = new Emailsend;
$fullname = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
$recipient = $_SESSION['email'];
$actVar = substr(sha1(time()), 0, 10);
$_SESSION['activation'] = $actVar;
$linkText = "https://recoureopro.com/auth/includes/login.inc.php?activation=" . $actVar;
$link = "<a href='" . $linkText . "' target='_blank' >" . $linkText . "</a>";
$sendmailer->verifyActivation($recipient, $fullname, $link);
echo "<div style='display:flex;justify-content:center;'><a href='https://recoureopro.com/auth/includes/resend_validation.inc.php' style='background-color:#14a800;border:2px solid #14a800;border-radius:100px;max-width:400px;min-width:230px;color:#ffffff;white-space:nowrap;font-weight:normal;display:block;font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:40px;text-align:center;text-decoration:none' > Resend Verification Email</a></div>";
?>