<?php
require("connect.php");
require("functions.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

if ($username == "" || $password == "") {
    echo "Username and password fields must be filled in";
} else {
    if (hasInvalidCharacters($username)) {
        echo "Username can only contain letters [a-z A-Z] and numbers from [0-9].";
    } else {
        $sql = 
        "
            SELECT
                password
            FROM
                forum.users
            WHERE
                username = ?
            LIMIT 1;
        ";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($hashedPw);

        $stmt->fetch();
        if(crypt($password, $hashedPw) == $hashedPw){
            echo "password matches";
        } else{
            echo "password doesn't match";
        }

    }
}
?>