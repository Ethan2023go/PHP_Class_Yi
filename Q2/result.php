<?php include_once "db.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <header class="p-5">
        <h1 class="text-center">問卷結果</h1>
    </header>

<main class="container">
    <?php
   $subject=$Que->find($_GET['id']);
?>
<h2 class="text-cetner"><?=$subject['text'];?></h2>

<ul class="list-group col-6 mx-auto">
    <?php
     $opts=$Que->all(['subject_id'=>$_GET['id']]);
     foreach($opts as $idx => $opt){
        $div=($subject['count']>0)?$subject['count']:1;
        $rate=round($opt['count']/$div,3);
    ?>
    <li class="list-group-item list-group-item-action">
        <div class="col-6 d-flex">
        <?=$idx+1;?>
        <?=$opt['text'];?>
            <div class="col-8 bg-secondary" style="width:<?=$rate*0.667*100;?>%"></div>
            <div class="col-4"><?=$opt['count'];?>票(<?=$rate*100;?>%)</div>
        </div>
    </li>
    <?php
     }
    ?>
</ul>
<button class="btn btn-primary d-block mx-auto my-5" onclick="location.href='question.php'">返回</button>
</form>
</main>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>