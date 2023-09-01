<?php

require_once '../lib/helper.php';

// dd($_REQUEST);

$db = new db();
$db->table_name = 'doctors';

$data = [

    'fullname' => post('fullname'),
    'lastname' => post('lastname'),
    'email' => post('email'),
    'address' => post('address'),
    'About' => post('About'),
    'specialist' => post('specialist'),
];

if(post('firstname') == '' || post('lastname') == '' || post('email')== '') 
{
    $msg= 'Please fill valves';
    redirect(link_path('doctors/index.php?msg='.$msg));
} else {
if (post('id') == '' && post('submit') == 'insert') {

    $db->create($data);
    redirect(link_path('users/index.php'));
} else {
    $db->update($data, post('id'));
    redirect(link_path('users/index.php'));
    
}

}