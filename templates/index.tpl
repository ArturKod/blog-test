<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Блог</title></head>
<body>
{foreach $categories as $cat}
    <h2>{$cat.name}</h2>
    <p>{$cat.description}</p>
    <ul>
    {foreach $cat.articles as $article}
        <li><a href="/article.php?id={$article.id}">{$article.title}</a> (просмотров: {$article.views})</li>
    {/foreach}
    </ul>
    <a href="/category.php?id={$cat.id}">Все статьи</a>
{/foreach}
</body>
</html>