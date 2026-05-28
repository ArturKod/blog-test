<?php
/* Smarty version 5.8.0, created on 2026-05-28 11:39:50
  from 'file:category.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a18298677f574_27850237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33ed071852d8bb58195f879d52c3b49a75105f57' => 
    array (
      0 => 'category.tpl',
      1 => 1779906149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a18298677f574_27850237 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->getValue('category')['name'];?>
</title>
</head>
<body>
    <h1><?php echo $_smarty_tpl->getValue('category')['name'];?>
</h1>
    <p><?php echo $_smarty_tpl->getValue('category')['description'];?>
</p>

    <form method="get">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('category')['id'];?>
">
        <label>Сортировка:</label>
        <select name="sort" onchange="this.form.submit()">
            <option value="date" <?php if ($_smarty_tpl->getValue('sort') == 'date') {?>selected<?php }?>>По дате</option>
            <option value="views" <?php if ($_smarty_tpl->getValue('sort') == 'views') {?>selected<?php }?>>По просмотрам</option>
        </select>
    </form>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('articles'), 'a');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('a')->value) {
$foreach0DoElse = false;
?>
        <div>
            <h3><a href="/article.php?id=<?php echo $_smarty_tpl->getValue('a')['id'];?>
"><?php echo $_smarty_tpl->getValue('a')['title'];?>
</a></h3>
            <p><?php echo $_smarty_tpl->getValue('a')['description'];?>
</p>
            <small>Просмотров: <?php echo $_smarty_tpl->getValue('a')['views'];?>
 | Дата: <?php echo $_smarty_tpl->getValue('a')['created_at'];?>
</small>
        </div>
        <hr>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

    <div>
        <?php if ($_smarty_tpl->getValue('current_page') > 1) {?>
            <a href="?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('sort');?>
&page=<?php echo $_smarty_tpl->getValue('current_page')-1;?>
">← Предыдущая</a>
        <?php }?>
        Страница <?php echo $_smarty_tpl->getValue('current_page');?>
 из <?php echo $_smarty_tpl->getValue('last_page');?>

        <?php if ($_smarty_tpl->getValue('current_page') < $_smarty_tpl->getValue('last_page')) {?>
            <a href="?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('sort');?>
&page=<?php echo $_smarty_tpl->getValue('current_page')+1;?>
">Следующая →</a>
        <?php }?>
    </div>

    <p><a href="/">← На главную</a></p>
</body>
</html><?php }
}
