<?php
    session_start();
    if(isset($_POST["quit"]) && $_POST["quit"] =='exit'){
        unset($_SESSION["admin"]);
    }
    if(!isset($_SESSION["admin"]) && !$_SESSION["admin"]) header('Location: admin.php');
    // var_dump($_SESSION);
    require("php/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
             table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 14px;
            border-radius: 10px;
            border-spacing: 0;
            text-align: center;
            }
            th {
            background: #BCEBDD;
            color: white;
            text-shadow: 0 1px 1px #2D2020;
            padding: 10px 20px;
            }
            th, td {
            border-style: solid;
            border-width: 0 1px 1px 0;
            border-color: white;
            }
            th:first-child, td:first-child {
            text-align: left;
            }
            th:first-child {
            border-top-left-radius: 10px;
            }
            th:last-child {
            border-top-right-radius: 10px;
            border-right: none;
            }
            td {
            padding: 10px 20px;
            background: #F8E391;
            }
            tr:last-child td:first-child {
            border-radius: 0 0 0 10px;
            }
            tr:last-child td:last-child {
            border-radius: 0 0 10px 0;
            }
            tr td:last-child {
            border-right: none;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_SESSION["admin"])):

        ?>
            <form method="POST">
                <input name="quit" type="submit" value="exit">
            </form>
            <table>
                <tr>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Рост</th>
                    <th>Вес</th>
                    <th>Статус</th>
                </tr>
                <?php 
                    $proposalQuery = $con->prepare('SELECT * FROM `proposal`');
                    $proposalQuery->execute();
                    $proposals = myFetch($proposalQuery);
                    foreach($proposals as $proposal):
                ?>
                <tr>
                    <td><?=$proposal->name?></td>
                    <td><?=$proposal->phone?></td>
                    <td><?=$proposal->height?></td>
                    <td><?=$proposal->weight?></td>
                    <td>
                        <?php 
                        if($proposal->status == 0) {
                            $statusTitle = "Не обработана";
                            $buttons = "
                                <button type ='submit' value='1'>Рассмотреть</button>
                                <button type ='submit' value='2'>Одобрить</button>
                            ";
                        } else if ($proposal->status == 1) {
                            $statusTitle = "Находится рассмотрение";
                            $buttons = "
                                <button type ='submit' value='2'>Одобрить</button>
                            ";
                        } else if($proposal->status == 2) {
                            $statusTitle = "Заявка одоюрена";
                            $buttons = "
                                <button type ='submit' value='0'>Отменить</button>
                            ";
                        }
                        ?>
                        <?=$statusTitle?>
                        <form action="" method="post">
                            <input type="hidden" value="<?=$proposal->id?>">
                            <?=$buttons?>
                        </form>
                    </td>
                </tr>
                <?php 
                    endforeach;
                ?>
            </table>
        <?php endif;?>
    </body>
</html>