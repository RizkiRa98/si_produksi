<?php
include 'koneksi.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{

    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'sim.renosafmebeul@gmail.com';
    $mail->Password   = 'lwxuhrmrgdjzonzf';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    $mail->setFrom('sim.renosafmebeul@gmail.com', $get_name);
    $mail->addAddress($get_email);


    $mail->isHTML(true);
    $mail->Subject = 'Reset Password Notification';

    $email_template = "
    <h2> Hello </h2>
    <h3> Kamu menerima email ini karena kamu mengirim permintaan reset password </h3>
    <br><br>
    <a href='http://localhost/si_produksi2/ubah_password.php?token=$token&email=$get_email'> Click Disini </a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}

if (isset($_POST['lupa-password'])) {
    $email = mysqli_escape_string($conf, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM user WHERE  email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($conf, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['nama_user'];
        $get_email = $row['email'];

        $update_token = "UPDATE user SET token='$token' WHERE email ='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conf, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = 'Link Reset Password Terkirim, Cek Email Anda!';
            header("location: lupa_password.php");
            exit(0);
        } else {
            $_SESSION['status'] = 'Ada yang salah!. #1';
            header("location: lupa_password.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = 'Email Tidak Ada!';
        header("location: lupa_password.php");
        exit(0);
    }
}

if (isset($_POST['ubah-password'])) {
    $email = mysqli_real_escape_string($conf, $_POST['email']);
    $password_baru = mysqli_real_escape_string($conf, $_POST['password_baru']);
    $konfirmasi_password = mysqli_real_escape_string($conf, $_POST['konfirmasi_password']);

    $token = mysqli_real_escape_string($conf, $_POST['password_token']);

    if (!empty($token)) {
        if (!empty($email) && !empty($password_baru) && !empty($konfirmasi_password)) {
            // cek token
            $check_token = "SELECT token FROM user WHERE token = '$token' LIMIT 1";
            $check_token_run = mysqli_query($conf, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {
                if ($password_baru == $konfirmasi_password) {
                    $update_password = "UPDATE user SET password='$password_baru' WHERE token = '$token' LIMIT 1 ";
                    $update_password_run = mysqli_query($conf, $update_password);

                    if ($update_password_run) {
                        echo "<script> alert('Update Password Berhasil!'); location.href = \"login.php\"; </script>";
                        exit(0);
                    } else {
                        $_SESSION['status'] = 'Update Password Gagal';
                        header("location: ubah_password.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION['status'] = 'Password dan Konfirmasi Password Berbeda';
                    header("location: ubah_password.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION['status'] = 'Token Invalid';
                header("location: ubah_password.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION['status'] = 'Semua Data Harus Di Isi';
            header("location: ubah_password.php?token=$token&email=$email");
            exit(0);
        }
    } else {
        $_SESSION['status'] = 'Token Tidak Tersedia';
        header("location: ubah_password.php");
        exit(0);
    }
}
