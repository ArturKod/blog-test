<?php
/* Smarty version 5.8.0, created on 2026-05-28 09:51:56
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a18103c572172_23359817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d8b827a5739b54efc2c950126992a4cf5098281' => 
    array (
      0 => 'index.tpl',
      1 => 1779961705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a18103c572172_23359817 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
?><!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Блог</title></head>
<body>
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
    <h2><?php echo $_smarty_tpl->getValue('cat')['name'];?>
</h2>
    <p><?php echo $_smarty_tpl->getValue('cat')['description'];?>
</p>
    <ul>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cat')['articles'], 'article');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach1DoElse = false;
?>
        <li><a href="/article.php?id=<?php echo $_smarty_tpl->getValue('article')['id'];?>
"><?php echo $_smarty_tpl->getValue('article')['title'];?>
</a> (просмотров: <?php echo $_smarty_tpl->getValue('article')['views'];?>
)</li>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
    <a href="/category.php?id=<?php echo $_smarty_tpl->getValue('cat')['id'];?>
">Все статьи</a>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</body>
</html><?php }
}
