<?php

$question = '';
$step = '';
$answers = [];
$result = '';

$steps = [
  [
    'id' => 1,
    'question' => 'Влево или вправо?',
    'answers' => [
      [
        'text' => 'Влево',
        'function' => 'generateNextStep',
        'next_step' => 2,
      ],
      [
        'text' => 'Вправо',
        'function' => 'loseGame',
      ]
    ]
  ],
  [
    'id' => 2,
    'question' => 'Вперёд или назад?',
    'answers' => [
      [
        'text' => 'Вперёд',
        'function' => 'generateNextStep',
        'next_step' => 3,
      ],
      [
        'text' => 'Назад',
        'function' => 'loseGame',
      ]
    ]
  ],
  [
    'id' => 3,
    'question' => 'Прыгнуть или побежать?',
    'answers' => [
      [
        'text' => 'Прыгнуть',
        'function' => 'winGame',
      ],
      [
        'text' => 'Побежать',
        'function' => 'loseGame',
      ]
    ]
  ]
];

function findNextStep($id, $steps) {
  $step = null;
  foreach ($steps as $quest_step) {
    if ($quest_step['id'] == $id) {
      $step = $quest_step;
    }
  }
  return $step;
}

function generateQuestion($step) {
  return $step['question'];
}

function generateAnswers($step) {
  return $step['answers'];
}

function loseGame() {
  return 'Вы проиграли, попробуйте ещё раз.';
}

function winGame() {
  return 'Вы выиграли, поздравляем!';
}

if (isset($_POST['submit'])) {
  $answer = json_decode($_POST['answer'], true);
  switch ($answer['function']) {
    case 'generateNextStep':
      $step = findNextStep($answer['next_step'], $steps);
      $question = generateQuestion($step);
      $answers = generateAnswers($step);
      break;
    case 'loseGame':
      $result = loseGame();
      break;
    case 'winGame':
      $result = winGame();
      break;
  }
} else {
  $step = findNextStep(1, $steps);
  $question = generateQuestion($step);
  $answers = generateAnswers($step);
}


