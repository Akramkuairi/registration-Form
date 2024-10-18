<?php
session_start();
include '../core/functions.php'; // Include your function definitions
include '../core/validations.php'; // Include your validation functions

$errors = [];

// Check if the request method is POST and the required fields are present
if (checkRequestMethod("POST") && checkPostInput('email') && checkPostInput('password')) {
    // Sanitize and assign POST values
    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    // Validate Email
    if (!requiredVal($email)) {
        $errors[] = "Email is required";
    } elseif (!emailVal($email)) {
        $errors[] = "Please type a valid email";
    }

    // Validate Password
    if (!requiredVal($password)) {
        $errors[] = "Password is required";
    }

    // If no validation errors, proceed to check the CSV file for the user
    if (empty($errors)) {
        $users_file = fopen("../data/users.csv", "r");
        $found = false;

        if ($users_file) {
            // Read through the CSV file
            while (($data = fgetcsv($users_file)) !== false) {
                // Assuming CSV structure: name,email,password_hash
                $stored_email = $data[1]; // Email is in the second column
                $stored_password_hash = $data[2]; // Password hash is in the third column

                // Check if email matches
                if ($stored_email === $email) {
                    // Verify the password using sha1 (or your chosen hash method)
                    if (sha1($password) === $stored_password_hash) {
                        // Authentication successful
                        $_SESSION['auth'] = [$data[0], $stored_email]; // Store user details in session
                        fclose($users_file);
                        redirect("../profile.php"); // Redirect to the profile page
                        exit;
                    } else {
                        $errors[] = "Incorrect password";
                    }
                    $found = true;
                    break; // Exit the loop since we've found the email
                }
            }
            fclose($users_file);
        }

        // If no matching email was found
        if (!$found) {
            $errors[] = "Email not found";
        }
    }

    // If there are errors, store them in session and redirect back to the login form
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("../login.php");
        exit;
    }
} else {
    echo 'Not Supported Method';
}
?>
