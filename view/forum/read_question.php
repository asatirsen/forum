<?php
namespace Anax\View;

//Create urls for navigation
use function Anax\View\url;

$urlToAskQuestion = url("question/create");



$question = $data["question"];
$answers = $data["answers"];
$comments = $data["comments"];
$answerComments = $data["answerComments"];


?>

<?php if (!$question) : ?>
    <p>There are no questions to show.</p>
    <?php
    return;
endif;
?>

<h1><?= $question->title ?></h1>
<p><?= $question->question ?></p>
<h4>Comments</h4>
<?php foreach ($comments as $comment) : ?>
    <p><?= $comment->comment ?></p>
<?php endforeach; ?>
<p><a href="<?= url("comment/question/{$question->id}"); ?>">Comment on question</a></p>

<p><a href="<?= url("answer/create/{$question->id}"); ?>">Svara på frågan</a></p>

<?php foreach ($answers as $answer) : ?>
<h3>Answer</h3>
<p>
    <?= $answer->answer?>
</p>
<h4>Comments</h4>
<?php foreach ($answerComments as $comment) : ?>
    <?php if ($comment->answer_id == $answer->id) : ?>
        <p><?= $comment->comment ?></p>
    <?php endif ?>
<?php endforeach; ?>
<p><a href="<?= url("comment/answer/{$answer->id}"); ?>">Comment on answer</a></p>

<?php endforeach; ?>


