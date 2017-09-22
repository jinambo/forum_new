<?php

session_start();

require("classes/user.class.php");
include 'db.inc.php';

function showUsr($conn, $username) {

	$user_query = new user;
	echo $user_query->showUser($conn, $username);
}

function getInf($conn, $username) {

	$em_query = new user;
	echo $em_query->getInfo($conn, $username);
}

function setPm($conn, $content, $master, $username) {

	$pm = new user;
	$pm->setPrivateMsg($conn, $content, $master, $username);
}

function getPm($conn, $username) {

	$pm = new user;
	$pm->getPrivateMsg($conn, $username);
}

//=For Ajax=
if (isset($_POST['showUsr_call'])) {

	showUsr($conn, $_POST['uid']);
}

if (isset($_POST['setPm_call'])) {

	setPm($conn, $_POST['content'], $_POST['mid'], $_SESSION['209_uid']);
}