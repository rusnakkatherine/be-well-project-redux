<?php
    require("connect.php");
    require("functions.php"); 
    //both username and passwords are filled

    //username -contains invalid characters

    //password -min length>=8

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $MIN_LENGTH = 8;

    if( $username == "" || $password == ""){
        echo "Username and password fields must be filled in";
    } else{
        if(hasInvalidCharacters($username)){
            echo "Username can only contain letters [a-z A-Z] and numbers from [0-9].";
        } else {
            if(strlen($password) >= $MIN_LENGTH) {
                //encrypt password before storing in database
                $password = encrypt($password);
                //Insert username and password into database 
                $sql = "INSERT INTO forum.users(username, password)
                    VALUES (?,?);
                ";

                $stmt=$conn->prepare($sql);
                $stmt->bind_param('ss', $username, $password);

                if ($stmt->execute()) {
                    echo "successfully registered as : " .$username;
                } else {
                    echo "failed to register, try again <br/>";
                }
            } else {
                echo "please enter a password with a minimum length of 8 characters.";
            }
        }
    }
?>