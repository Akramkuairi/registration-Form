<?php
session_start();
include '../core/functions.php';
include '../core/validations.php';

$errors = [];

if (checkRequestMethod("POST") && checkPostInput('name')) {
    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    /* Name Validation */
    if (!requiredVal($name)) {
        $errors[] = "name is required";
    } elseif (!minVal($name, 3)) {
        $errors[] = "name must be greater than 3 characters";
    } elseif (!maxVal($name, 25)) {
        $errors[] = "name must be smaller than 25 characters";
    }

    /* Email Validation */
    if (!requiredVal($email)) {
        $errors[] = "email is required";
    } elseif (!emailVal($email)) {
        $errors[] = "please type a valid email";
    }

    /* Password Validation */
    if (!requiredVal($password)) {
        $errors[] = "password is required";
    } elseif (!minVal($password, 6)) {
        $errors[] = "password must be greater than 6 characters";
    } elseif (!maxVal($password, 22)) {
        $errors[] = "password must be smaller than 20 characters";
    }

    /* If no errors, save data to CSV */
    if (empty($errors)) {
        $users_file = fopen("../data/users.csv", "a+");
        if ($users_file) {
            $data = [$name, $email, sha1($password)];
            fputcsv($users_file, $data);
            fclose($users_file);
        }

        $_SESSION['auth'] = [$name, $email];
        redirect("../index.php");
        die;
    } else {
        // Store errors in session and redirect back to the form
        $_SESSION['errors'] = $errors;
        //header("Location: ../register.php");
        redirect("../register.php");
        die;
    }
} else {
    echo 'Not Supported Method';
}

