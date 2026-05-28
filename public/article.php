<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Smarty\Smarty;
use App\Models\Article;

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die('Неверный ID статьи');
}

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/../templates/');
$smarty->setCompileDir(__DIR__ . '/../templates_c/');
$smarty->setCacheDir(__DIR__ . '/../cache/');

$articleModel = new Article();
$article = $articleModel->getById($id);

if (!$article) {
    die('Статья не найдена');
}

$similar = $articleModel->getSimilar($id, 3);

$smarty->assign('article', $article);
$smarty->assign('similar', $similar);

$smarty->display('article.tpl');