<?php
use yii\easyii\modules\faq\api\Faq;
use yii\easyii\modules\page\api\Page;

$page = Page::get('page-faq');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;
?>
<h1><?= $page->seo('h1', $page->title) ?></h1>
<br/>

<?php foreach(Faq::items() as $item) : ?>
    <p><strong>Вопрос: </strong><?= $item->question ?></p>
    <blockquote><strong>Ответ: </strong><?= $item->answer ?></blockquote>
<?php endforeach; ?>
