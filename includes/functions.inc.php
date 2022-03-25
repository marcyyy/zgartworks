<?php

//log in
function userExists($conn, $username) {
	$sql = "SELECT * FROM accounts WHERE account_username = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../login.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $password) {
	$userExists = userExists($conn, $username);	

	if($userExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $userExists['account_password'];

	if ($password !== $pwdHashed) {
		header("location: ../login.php?error=wrongpassword");
		exit();
	}
	else if ($password === $pwdHashed) {
		session_start();
		$_SESSION["userid"] = $userExists["account_id"];
		$_SESSION["usernm"] = $userExists["account_username"];
		$_SESSION["userpd"] = $userExists["account_password"];
		header("location: ../admin.php?success");
		exit();
	}
}

