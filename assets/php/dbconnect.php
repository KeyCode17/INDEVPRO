<?php

$con = mysqli_connect("localhost", "root", "", "dbperpus");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}
