<?php
$sql = "INSERT INTO messages (NAME, MESSAGES) VALUES ($_POST[0], $_POST[1])";
echo htmlspecialchars($_POST['username']);
