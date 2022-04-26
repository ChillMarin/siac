
<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die('403');
}

$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'get':
        if (empty($data)) {
            die('403');
        }
        echo new Template($data['template']);
        
        break;

}