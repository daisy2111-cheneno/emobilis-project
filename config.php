<?php
$link = mysqli_connect("localhost", "root", "", "project");

if (!$link){
    die("Error connecting to server".mysqli_connect_error($link));
}
