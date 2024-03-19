<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

//authorize($note['user_id'] === $currentUserId);
// altering since strict comparison has the user_id as a string and $currentUserId as an integer
authorize($note['user_id'] == $currentUserId);

require "views/notes/show.view.php";