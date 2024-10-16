<?php
session_start();
include 'core/functions.php';
include 'core/validations.php';

session_destroy();
redirect('login.php');
die;