<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

// retrieve session data
require __DIR__ . "/../php/config.php";

// check for auth
if (!$USER) {

    // request not authorized
    http_response_code(403);
    echo "ERROR 403: authentication has not been provided";
    echo "<br>visit localhost for the API reference";
    die();
}
// user is logged => proceed

// user directory path
$USER_DIR = __DIR__ . "/../users/" . $USER["ID"] . "/";

// user list read/write
$list = json_decode(file_get_contents($USER_DIR . "list.json"), true) ?? [
    0 => [
        "title" => "prova1",
        "desc" => "descrizione della prova1",
        "check" => false,
    ],
];
function storeList()
{
    global $USER_DIR, $list;
    file_put_contents($USER_DIR . "list.json", json_encode($list));
}

// switch on request type
if (isset($_GET)) {
    switch ($_GET["request"]) {

        case "list":
            // list all user tags
            /* no operation is taking place
             * because the list of tasks
             * is always returned to the user
             */
            break;

        case "set":
            // set task (new task/re-set old task)
            if (array_key_exists("value", $_GET)) {
                // check for key
                if (array_key_exists("key", $_GET)) {
                    $list[$_GET["key"]] = $_GET["value"];
                } else {
                    $list[] = $_GET["value"];
                }

                storeList();
            } else {
                http_response_code(400);
                echo "ERROR 400: request is missing parameters ( 'value' )";
                echo "<br>visit localhost for the API reference";
                die();
            }
            break;

        case "del":
            // delete specific task
            if (array_key_exists("value", $_GET)) {
                // $list = array_splice($list, $_GET["value"], 1);
                unset($list[$_GET["value"]]);
                storeList();
            } else { // request not authorized
                http_response_code(400);
                echo "ERROR 400: request is missing parameters ( 'value' )";
                echo "<br>visit localhost for the API reference";
                die();
            }
            break;
    }
}

// Return the actual state of list
echo json_encode($list);
