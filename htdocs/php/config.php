<?php

// TODO: create login retrieval logic
// right now this is just a placeholder
// with fake login

session_start();

// fake login
$_SESSION["USER"] = [
    "ID" => "0001",
    "name" => "John",
];

// login retrieval
$USER = $_SESSION["USER"] ?? false;