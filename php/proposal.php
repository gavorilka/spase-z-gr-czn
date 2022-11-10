<?php
    require "connect.php";
    // var_dump($_GET);
    // var_dump($_POST);
    header("Content-type: application/json; charset=utf-8");    
    function addProposal($name,$phone,$height,$weight,$con){
        $proposalQeury = $con->prepare('INSERT INTO `proposal`( `name`, `phone`, `height`, `weight`) VALUES (:name,:phone,:height,:weight)');
        $proposalQeury->execute(['name' => $name,'phone' => $phone, 'height' => $height, 'weight' => $weight]);
        return ["status" => true ,"message" =>"Ваша заявка принята на рассмотрение","id" =>$con->lastInsertId()];
    }

    if(empty($_POST['name'])) {
        echo json_encode(["status" => false ,"message" =>"Имя не задано"],JSON_UNESCAPED_UNICODE);
    } else if(empty($_POST['phone'])){
        echo json_encode(["status" => false ,"message" =>"Телефон не корректен"],JSON_UNESCAPED_UNICODE);
    } else if(empty($_POST['height']) || !is_numeric($_POST['height'])){
        echo json_encode(["status" => false ,"message" =>"Рост не корректен"],JSON_UNESCAPED_UNICODE);
    } else if(empty($_POST['weight']) || !is_numeric($_POST['weight'])){
        echo json_encode(["status" => false ,"message" =>"Вес не корректен"],JSON_UNESCAPED_UNICODE);
    } else if(empty($_POST['agreement']) || $_POST['agreement'] != 'on'){
        echo json_encode(["status" => false ,"message" =>"Вы не согласились"],JSON_UNESCAPED_UNICODE);
    } else {
        $temp = addProposal(htmlspecialchars($_POST['name'], ENT_QUOTES),htmlspecialchars($_POST['phone'], ENT_QUOTES),$_POST['height'],$_POST['weight'],$con);
        echo json_encode($temp,JSON_UNESCAPED_UNICODE);
        // var_dump ($temp);
        // header('Location: /');
    }
