<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Smarty\Smarty; 
use App\Models\Category;

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/../templates/');
$smarty->setCompileDir(__DIR__ . '/../templates_c/');
$smarty->setCacheDir(__DIR__ . '/../cache/');

$categoryId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sort = isset($_GET['sort']) && $_GET['sort'] === 'views' ? 'views' : 'date';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$perPage = 5;

$catModel = new Category();
$data = $catModel->getCategoryWithArticles($categoryId, $sort, $page, $perPage);

if (!$data) {
    die('Категория не найдена');
}

$smarty->assign('category', $data['category']);
$smarty->assign('articles', $data['articles']);
$smarty->assign('sort', $sort);
$smarty->assign('current_page', $data['current_page']);
$smarty->assign('last_page', $data['last_page']);
$smarty->display('category.tpl');