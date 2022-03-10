<?php 

require_once('../data.php');

function get_user_index(array $users) {
    $username = $_POST['login'];
    $userIndex = 1;
    foreach($users as $user) {
        if ($user['login'] == $username) {
            break;
        }
        $userIndex++;
    }
    return $userIndex;
}


function verify_password(array $users, int $userIndex) {
    $password = $_POST['password'];
    $knownPassword = $users[$userIndex]['password'];
    if ($password == $knownPassword) {
        return true;
    }
    else {
        return false;
    }
}

function verify_credentials(array $users) {
    if (verify_password($users, get_user_index($users))) {
        header('Location: http://php.test/TD-04-user-preference/sources/project/index.php');
    }
    else {
        echo "no";
    }
}
verify_credentials($users)

?>