<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
    //It has to be 'id' => $_GET['id'], at least to work in this episode, in episode 36 it will be back to $_POST
])->findOrFail();

//authorize($note['user_id'] === $currentUserId);
//Technical Debt, strict comparison
authorize($note['user_id'] == $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
    //It has to be 'id' => $_GET['id'], at least to work in this episode, in episode 36 it will be back to $_POST
]);

header('location: /notes');
exit();