<?php
require_once __DIR__ . '/../models/user.php';

use models\User;

if(!isset($_GET['id'])) {
    header("Location: List-user.php");
    exit;
}

$user = User::find($_GET['id']);

if(!$user) {
    header("Location::List-user.php");
    exit;
}

User::delete($user['id']);
header("Location: List-user.php");
