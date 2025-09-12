<?php
require 'ClassAutoload.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_data = [
        'full_name' => $_POST['full_name'],
        'id_number' => $_POST['id_number'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'employment' => $_POST['employment'],
        'monthly_income' => $_POST['monthly_income'],
        // if my user hasnt given me password i will use default123
        'password' => $_POST['password'] ?? 'default123'
    ];
    $required_fields = ['full_name', 'id_number', 'phone', 'email', 'address', 'employment', 'monthly_income'];
    $errors = [];

    foreach ($required_fields as $field) {
        if (empty($member_data[$field])) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }

    if (!filter_var($member_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address';
    }


    if (empty($errors)) {
        try {
            $fetchMembers = new FetchMembers();
            $member_id = $fetchMembers->addMember($member_data);

            if ($member_id) {
                echo "<h2>Registration Successful!</h2>";
                echo "<p>Welcome to RideLink SACCO!</p>";
                echo "<p>Your Member ID: <strong>" . $member_id . "</strong></p>";
                echo "<p>Please check your email for a welcome message.</p>";
                echo "<p><a href='login.php'>Click here to login</a></p>";
            } else {
                echo "<h2>Registration Failed</h2>";
                echo "<p>Sorry, there was an error processing your registration. Please try again.</p>";
                echo "<p><a href='member-registration.php'>Back to registration</a></p>";
            }
        } catch (Exception $e) {
            echo "<h2>Registration Failed</h2>";
            echo "<p>Error: " . $e->getMessage() . "</p>";
            echo "<p><a href='member-registration.php'>Back to registration</a></p>";
        }
    } else {
        echo "<h2>Registration Failed</h2>";
        echo "<p>Please fix the following errors:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "<p><a href='member-registration.php'>Back to registration</a></p>";
    }
} else {
    header('Location: member-registration.php');
    exit();
}
