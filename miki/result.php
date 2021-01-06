<?php

print_r($_GET);

$planYear = $_GET["planYear"];
$planMonth = $_GET["planMonth"];
$planDay = $_GET["planDay"];

$startHour = $_GET["startHour"];
$startMinute = $_GET["startMinute"];
$startPos = $_GET["startPos"];

$plan01Hour = $_GET["plan01Hour"];
$plan01Minute = $_GET["plan01Minute"];
$plan01text = $_GET["plan01text"];
// $plan01cate = $_GET["plan01cate"];

$plan02Hour = $_GET["plan02Hour"];
$plan02Minute = $_GET["plan02Minute"];
$plan02text = $_GET["plan02text"];
// $plan02cate = $_GET["plan02cate"];

$plan03Hour = $_GET["plan03Hour"];
$plan03Minute = $_GET["plan03Minute"];
$plan03text = $_GET["plan03text"];
// $plan03cate = $_GET["plan03cate"];

$plan04Hour = $_GET["plan04Hour"];
$plan04Minute = $_GET["plan04Minute"];
$plan04text = $_GET["plan04text"];
// $plan04cate = $_GET["plan04cate"];

$finishHour = $_GET["finishHour"];
$finishMinute = $_GET["finishMinute"];
$finishPos = $_GET["finishPos"];

if (!$startHour) {
  $startHour = date('H');
}
if (!$startMinute) {
  $startMinute = date('i');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/ress.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div>
    <p><?= $planYear ?>年<?= $planMonth ?>月<?= $planDay ?>日のスケジュール
  </div>

  <img width="500" height="500" src="https://map.yahooapis.jp/course/V1/routeMap?appid=dj00aiZpPU92Z3VjSDBEQTV4dCZzPWNvbnN1bWVyc2VjcmV0Jng9MzQ-&route=34.698699,135.491591,34.699006,135.497796,34.7054472,135.4997355|color:0000ffff&width=500&height=500&style=base:grayish">



  <div class="startBox">
    <p>出発</p>
    <div class="timeBox">
      <p><?= $startHour ?>：<?= $startMinute ?></p>
    </div>
    <p class="startPos"><?= $startPos ?></p>
  </div>

  <div class="plan01Box">
    <p>プラン１</p>
    <div class="timeBox">
      <p><?= $plan01Hour ?>：<?= $plan01Minute ?></p>
    </div>
    <p class="startPos"><?= $plan01text ?></p>
  </div>
  <div class="plan02Box">
    <p>プラン２</p>
    <div class="timeBox">
      <p><?= $plan02Hour ?>：<?= $plan02Minute ?></p>
    </div>
    <p class="startPos"><?= $plan02text ?></p>
  </div>
  <div class="plan03Box">
    <p>プラン３</p>
    <div class="timeBox">
      <p><?= $plan03Hour ?>：<?= $plan03Minute ?></p>
    </div>
    <p class="startPos"><?= $plantext ?></p>
  </div>
  <div class="plan04Box">
    <p>プラン４</p>
    <div class="timeBox">
      <p><?= $plan04Hour ?>：<?= $plan04Minute ?></p>
    </div>
    <p class="startPos"><?= $plan04text ?></p>
  </div>

  <div class="finishBox">
    <p>到着</p>
    <div class="timeBox">
      <p><?= $finishHour ?>：<?= $finishMinute ?></p>
    </div>
    <p><?= $finishPos ?></p>
  </div>

  <script src="js/jquery.js"></script>
</body>


</html>