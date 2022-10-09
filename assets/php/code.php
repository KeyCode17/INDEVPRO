<?php
session_start();
require 'dbconnect.php';

if (isset($_POST['delete_member'])) {
    $member_id = mysqli_real_escape_string($con, $_POST['delete_member']);

    $query = "DELETE FROM members WHERE id='$member_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "member Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "member Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['update_member'])) {
    $member_id = mysqli_real_escape_string($con, $_POST['member_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE members SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$member_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "member Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "member Not Updated";
        header("Location: index.php");
        exit(0);
    }
}


if (isset($_POST['save_member'])) {
    $MemberID = mysqli_real_escape_string($con, $_POST['MemberID']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $HP = mysqli_real_escape_string($con, $_POST['HP']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $MaxLoan = mysqli_real_escape_string($con, $_POST['MaxLoan']);

    $query = "INSERT INTO members (MemberID,Name,Address,Phone,HP,Date,MaxLoan) VALUES ('$MemberID','$name','$address','$phone','$HP','$date','$MaxLoan')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "member Created Successfully";
        header("Location: ../../index.php");
    } else {
        $_SESSION['message'] = "member Not Created";
        header("Location: ../../index.php");
    }
}
