<?php
    if(file_exists('Helpers/constants.php')) {
        include 'Helpers/constants.php';
    } 

    if(isset($_GET['action'])){
        if($_GET['action'] === "logout"){
            logout();
        }elseif($_GET['action'] === "fullname"){
            getFullName();
        }
    }

    function initializeUserLoginSession($userID, $userFirstName, $userLastName, $userEmail){
        session_start();
        echo "session start";
        $_SESSION[USER_ID] = $userID;
        $_SESSION[USER_FIRST_NAME] = $userFirstName;
        $_SESSION[USER_LAST_NAME] = $userLastName;
        $_SESSION[USER_EMAIL] = $userEmail;
    }
    
    function logout(){
        destroySession();
        return true;
    }

    function getLoginUserID(){
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        $sessionID = $_SESSION["userID"];
        session_write_close();
        return $sessionID;
    }

    function destroySession(){
        session_start();
        // remove all session variables
        // echo $_SESSION["userFirstName"];
        session_unset();

        // destroy the session
        // echo $_SESSION["userFirstName"];
        session_destroy();
        // echo $_SESSION["userFirstName"];
    }


    function getFullName(){
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        if($_SESSION && $_SESSION["userFirstName"]){
            $user = new stdClass();
            $user->firstName = $_SESSION["userFirstName"];
            $user->lastName = $_SESSION["userLastName"];
            $myJSON = json_encode($user);
            // $fullName = $_SESSION["userFirstName"]." ".$_SESSION["userLastName"];
        }
        session_write_close();
        echo $myJSON;
    }
?>