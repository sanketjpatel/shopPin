<?php

/*
 * Developed by: Tanmay Garg
 * Contact: tanmaygarg@ymail.com
 */



//----------Function for Logging in users----------
function login($user, $pass) {
    $user = ($user);
    $pass = ($pass);
    require './db/db.php';

    //$lastLogin = date("l, M j, Y, g:i a");
    $query = "SELECT * FROM users WHERE uname = :user AND password = :pass";
    $stmt = $link->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    $row_count = $stmt->rowCount();

    if ($row_count == 1) {
        set_login_sessions($user);
        return 77;
    }
    else
        return 1;
}

//----------Function for checking if user exists----------
function userExists($user) {
    $user = ($user);
    require './db/db.php';

    //$lastLogin = date("l, M j, Y, g:i a");
    $query = "SELECT uname FROM users WHERE uname = :user";
    $stmt = $link->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $row_count = $stmt->rowCount();

    if ($row_count == 1) {
        return 77;
    }
    else
        return 1;
}

//----------Function for checking if email exists----------
function emailExists($email) {
    $email = ($email);
    require './db/db.php';

    //$lastLogin = date("l, M j, Y, g:i a");
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $link->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row_count = $stmt->rowCount();

    if ($row_count == 1) {
        return 77;
    }
    else
        return 1;
}
//----------Function for registering users----------

function addUser($user,$pass,$email,$name) 
{ 
        $user = ($user); 
        $pass = ($pass); 
       $email = ($email); 
          $name=$name;
        //Encrypt password for database 
            $pass = ($pass); 
      require './db/db.php';
if(userExists($user)===77){ return 3;}
    else if(emailExists($email)===77){ return 4;}
        else
        {
            $query = "INSERT INTO users (uname,password,email,name) VALUES (:user,:pass,:email,:name)";  
           $stmt = $link->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $row_count = $stmt->rowCount();

    if ($row_count == 1) {
                set_login_sessions($user);
        return 99;

    }
    else
        return 2;
            }  
} 
//----------Function for changing pass----------
function changepass($pass, $id) {
    $pass = ($pass);
    $uid = ($id);
    require './db/db.php';
    session_start();
    $user = $_SESSION['user'];
    $query = "UPDATE users SET password=:pass WHERE uname=:user and uid=:uid;";
    $stmt = $link->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':uid', $uid);

    if ($stmt->execute()) {
        return 77;
    }
    else
        return 1;
}


//----------Set Login Sessions----------

function set_login_sessions($user) {
    //start the session
    session_start();

    //set the sessions
    $_SESSION['user'] = $user;
    $_SESSION['logged_in'] = TRUE;
}

//----------Function for logging off users----------
function logoff() {
    //session must be started before anything
    session_start();

    //if we have a valid session
    if ($_SESSION['logged_in'] == TRUE) {
        //unset the sessions (all of them - array given)
        unset($_SESSION);
        //destroy what's left
        session_destroy();
    }

    //It is safest to set the cookies with a date that has already expired.
    if (isset($_COOKIE['cookie_id']) && isset($_COOKIE['authenticate'])) {
        /**
         * uncomment the following line if you wish to remove all cookies 
         * (don't forget to comment ore delete the following 2 lines if you decide to use clear_cookies)
         */
        clear_cookies();
        //setcookie ( "cookie_id", '', time() - 3600);
        //setcookie ( "authenticate", '', time() - 3600 );
    }

    //redirect the user to the default "logout" page
    header("Location: ../index.php");
}

function checklogin() {
    session_start();
    if (isset($_SESSION['logged_in'])) {
        if ($_SESSION['logged_in'] != TRUE) {

            header("Location: index.php");
        }
    }
    else
        header("Location: index.php");
}

?>
