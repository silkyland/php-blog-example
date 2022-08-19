<?php

session_start();

// clear all session
session_unset();
session_destroy();

header('Location: login.php');
