<?php
/* Smarty version 5.8.0, created on 2026-05-28 15:05:04
  from 'file:article.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a1859a028f664_67366520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c9295f4c80ac95cad1a385edba221898dc82dcb' => 
    array (
      0 => 'article.tpl',
      1 => 1779975169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a1859a028f664_67366520 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/templates';
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->getValue('article')['title'];?>
</title>
</head>
<body>

    <h1><?php echo $_smarty_tpl->getValue('article')['title'];?>
</h1>

    <?php if ($_smarty_tpl->getValue('article')['image']) {?>
        <img src="/uploads/<?php echo $_smarty_tpl->getValue('article')['image'];?>
" alt="<?php echo $_smarty_tpl->getValue('article')['title'];?>
" style="max-width: 100%;">
    <?php }?>

    <p><strong>Описание:</strong> <?php echo $_smarty_tpl->getValue('article')['description'];?>
</p>

    <div>
        <strong>Категории:</strong>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('article')['categories'], 'cat', true);
$_smarty_tpl->getVariable('cat')->iteration = 0;
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
$_smarty_tpl->getVariable('cat')->iteration++;
$_smarty_tpl->getVariable('cat')->last = $_smarty_tpl->getVariable('cat')->iteration === $_smarty_tpl->getVariable('cat')->total;
$foreach0Backup = clone $_smarty_tpl->getVariable('cat');
?>
            <a href="/category.php?id=<?php echo $_smarty_tpl->getValue('cat')['id'];?>
"><?php echo $_smarty_tpl->getValue('cat')['name'];?>
</a><?php if (!$_smarty_tpl->getVariable('cat')->last) {?>, <?php }?>
        <?php
$_smarty_tpl->setVariable('cat', $foreach0Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>

    <div>
        <strong>Просмотров:</strong> <?php echo $_smarty_tpl->getValue('article')['views'];?>
 |
        <strong>Дата публикации:</strong> <?php echo $_smarty_tpl->getValue('article')['created_at'];?>

    </div>

    <hr>

    <div>
        <?php echo $_smarty_tpl->getValue('article')['content'];?>

    </div>

    <hr>

    <?php if ($_smarty_tpl->getValue('similar')) {?>
        <h3>Похожие статьи</h3>
        <ul>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('similar'), 'sim');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('sim')->value) {
$foreach1DoElse = false;
?>
                <li>
                    <a href="/article.php?id=<?php echo $_smarty_tpl->getValue('sim')['id'];?>
"><?php echo $_smarty_tpl->getValue('sim')['title'];?>
</a>
                    (<?php echo $_smarty_tpl->getValue('sim')['views'];?>
 просмотров)
                </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>

    <p><a href="/">← На главную</a> | <a href="javascript:history.back()">Назад</a></p>

</body>
</html><?php }
}
