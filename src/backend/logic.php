<?php


function connect() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Voting";
    
    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function register($id, $firstname, $lastname, $email, $password, $age) {
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO tbl_users (id, first_name, last_name, email, password, age, role) VALUES (?, ?, ?, ?, ?, ?, 'user')");
    $stmt->bind_param("sssssi", $id, $firstname, $lastname, $email, $password, $age);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function login($email, $password) {
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $stmt->close();
        $conn->close();
        return true;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function logout() {
    session_destroy();
    header("Location: ../login.php");
}

function vote($voteeId, $voterId) {
    if (hasVoted($voterId)) {
        $_SESSION['message'] = "You have already voted";
        return false;
    }

    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM tbl_constestants WHERE idcard_number = ?");
    $stmt->bind_param("s", $voteeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE tbl_constestants SET vote_count = vote_count + 1 WHERE idcard_number = ?");
        $stmt->bind_param("s", $voteeId);
        $stmt->execute();

        $stmt = $conn->prepare("UPDATE tbl_users SET hasVoted = 1 WHERE id = ?");
        $stmt->bind_param("s", $voterId);
        $stmt->execute();
        
        $_SESSION['message'] = "Vote successful";
        $stmt->close();
        $conn->close();
        return true;
    } else {
        $_SESSION['message'] = "Votee not found";
        $stmt->close();
        $conn->close();
        return false;
    }
}

function verifyEmail($email) {
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result->num_rows > 0;
}

function getContestants() {
    $conn = connect();
    $result = $conn->query("SELECT * FROM tbl_constestants");
    $contestants = [];
    while ($row = $result->fetch_assoc()) {
        $contestants[] = $row;
    }
    $conn->close();
    return $contestants;
}

function hasVoted($voterId) {
    $conn = connect();
    $stmt = $conn->prepare("SELECT hasVoted FROM tbl_users WHERE id = ?");
    $stmt->bind_param("s", $voterId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $user['hasVoted'] == 1;
}

function getWinner() {
    $conn = connect();
    $result = $conn->query("SELECT * FROM tbl_constestants WHERE vote_count = (SELECT MAX(vote_count) FROM tbl_constestants)");
    $winner = $result->fetch_assoc();
    $conn->close();
    return $winner;
}
?>
