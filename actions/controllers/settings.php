<?php

if (empty($_POST)) {
    return;
}

if (!empty($_POST['erase_database'])) {
    query('TRUNCATE TABLE phones');
    $message = 'Database has been successfully erased';
}

if (!empty($_POST['user_submit'])) {
    $newPassword = trim($_POST['user_password']);
    if (empty($newPassword)) {
        $errorMessage = 'The password should not be empty';
        return;
    }
    query('UPDATE `settings` SET `value`=:password WHERE `name`="password"', array(':password' => $newPassword));
    $message = 'The password has been successfully updated';
}
