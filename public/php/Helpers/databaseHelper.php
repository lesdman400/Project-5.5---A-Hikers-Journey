<?php
    if(file_exists('./env.php')) {
        include './env.php';
    }

    if(!function_exists('env')) {
        function env($key, $default = null)
        {
            $value = getenv($key);
            if ($value === false) {
                return $default;
            }
            return $value;
        }
    }

    function connectMYSQL(){
        // Get Server info
        $servername = env('server');
        $username = env('username');
        $password = env('password');
        $dbname = env('dbname');

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    function closeMYSQL($conn){
        destroySession();
        $conn->close();
    }

?>