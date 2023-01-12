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

// user directory path
$USER_DIR = __DIR__ . "/../users/" . $USER["ID"] . "/";

// user list read/write
$list = json_decode(file_get_contents($USER_DIR . "list.json")) ?? [
    [
        "title" => "prova1",
        "desc" => "descrizione della prova1",
        "check" => false,
    ],
    [
        "title" => "prova2",
        "desc" => "descrizione della prova2",
        "check" => true,
    ],
];
function storeList()
{
    global $USER_DIR, $list;
    file_put_contents($USER_DIR . "list.json", json_encode($list));
}

// switch on request type
// DEBUG: change GET to SET as soon as front has passed necessary api tests
if (isset($_GET)) {
    switch ($_GET["request"]) {

        case "list":
            echo json_encode($list);
            break;

        case "set":
            if (isset($_GET["value"])) {
                $list[] = $_GET["value"];
                storeList();
            } else {
                echo "ERROR 400: request is missing parameters ( 'value' )";
                echo "<br>visit localhost for the API reference";
                die();
            }
            break;

        case "del":
            if (isset($_GET["value"])) {
                $list = array_splice($list, $_GET["value"], 1);
                storeList();
            } else { // request not authorized
                echo "ERROR 400: request is missing parameters ( 'value' )";
                echo "<br>visit localhost for the API reference";
                die();
            }
            break;
    }
}
