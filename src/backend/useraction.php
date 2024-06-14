<?php
include_once './logic.php';
session_start();

$validation = [];

function validatePassword($password) {
    global $validation;
    if (empty($password)) {
        $validation['password'] = "Password is required";
    } elseif (strlen($password) < 8) {
        $validation['password'] = "Password must be at least 8 characters";
    } elseif (strlen($password) > 12) {
        $validation['password'] = "Password must be less than or equal to 12 characters";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if (isset($_POST['register'])) {
        $firstname = $_POST['firstname'] ?? null;
        $lastname = $_POST['lastname'] ?? null;
        $age = $_POST['age'] ?? null;
        $id = $_POST['idnum'] ?? null;

        if (empty($firstname)) $validation['firstname'] = "First name is required";
        if (empty($lastname)) $validation['lastname'] = "Last name is required";
        if (empty($email)) $validation['email'] = "Email is required";
        if (empty($age)) $validation['age'] = "Age is required";
        if (empty($id)) $validation['idnum'] = "ID number is required";
        validatePassword($password);

        if (!empty($age) && $age < 18) $validation['age'] = "Age must be at least 18 years";
        if (!empty($id) && strlen($id) != 5) $validation['idnum'] = "CRN number must be 5 digits";

        if (verifyEmail($email)) $validation['email'] = "Email already exists";

        if (empty($validation)) {
            if (register($id, $firstname, $lastname, $email, $password, $age)) {
                $_SESSION['message'] = "Registration successful, please login";
                header("Location: ../login.php");
                exit();
            } else {
                $validation['register'] = "Registration failed";
            }
        }
    } elseif (isset($_POST['login'])) {
        if (empty($email)) $validation['email'] = "Email is required";
        validatePassword($password);

        if (empty($validation)) {
            if (login($email, $password)) {
                $redirectUrl = ($_SESSION['role'] == 'admin') ? '../admin/dashboard.php' : '../dashboard.php';
                header("Location: $redirectUrl");
                exit();
            } else {
                $validation['login'] = "Login failed";
                $_SESSION['validation'] = $validation;
                header("Location: ../login.php");
                exit();
            }
        }
    } elseif (isset($_POST['logout'])) {
        logout();
    } elseif (isset($_POST['vote'])) {
        $voteeId = $_POST['idnumber'] ?? null;
        $voterId = $_POST['voterId'] ?? null;
        if (vote($voteeId, $voterId)) {
            $_SESSION['message'] = "Vote successful";
        } else {
            $_SESSION['message'] = "Sorry, you have already voted";
        }
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "You missed the form";
    }
}
?>
