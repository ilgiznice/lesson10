<?php

require './quest.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Квест-игра</title>
</head>
<body>
<form method="post" action="index.php">
  <div class="question">
    <?= $question ?>
  </div>
  <div class="answers">
    <?php foreach ($answers as $answer) : ?>
      <div class="answer">
        <input type="radio" value=<?= json_encode($answer) ?> name="answer"><?= $answer['text'] ?>
      </div>
    <?php endforeach; ?>
  </div>
  <input type="submit" name="submit" value="Отправить">
  <div class="result">
    <?= $result ?>
  </div>
  <div class="actions">
    <a href="index.php">Начать заново</a>
  </div>
</form>
</body>
</html>