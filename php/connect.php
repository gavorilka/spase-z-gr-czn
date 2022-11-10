<?php

    $dbname = "space-z";
    $dsn = "mysql:host=localhost;dbname=$dbname;charset=utf8";
    $user = "root";
    $pass = "";
    $opt = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
        $con = new PDO($dsn,$user,$pass,$opt);
    } catch(PDOExeption $e){
        var_dump($e);
        echo $e->getMessage();
    }
    function myFetch($res) {
        $posts =[];
        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            $posts[] = $row;
        }
        return $posts;
    }