<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Category;
use Smarty\Smarty;

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/../templates/');
$smarty->setCompileDir(__DIR__ . '/../templates_c/');
$smarty->setCacheDir(__DIR__ . '/../cache/');

$catModel = new Category();
$cats = $catModel->getAllWithRecentArticles(3);

$smarty->assign('categories', $cats);
$smarty->display('index.tpl');
