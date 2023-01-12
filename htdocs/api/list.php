<?php

// retrieve session data
require __DIR__ . "/../php/config.php";

// check for auth
if (!$USER) {

    // request not authorized
    echo "ERROR 403: authentication has not been provided";
    echo "<br>visit localhost for the API reference";
    die();
}
// user is logged => proceed

// switch on request type
// DEBUG: change GET to SET as soon as front has passed necessary api tests
if (isset($_GET)) {
    switch ($_GET["request"]) {
        case "list":
            echo "list";
            break;
        case "set":
            echo "set";
            break;
        case "del":
            echo "del";
            break;
    }
}
