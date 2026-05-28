<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Блог</title>
</head>
<body>
<div class="site-header">
    <div class="container">
        <h1><a href="/">Мой блог</a></h1>
    </div>
</div>
<div class="container">
    {foreach $categories as $cat}
    <div class="category-card">
        <h2>{$cat.name}</h2>
        <p>{$cat.description}</p>
        <div class="articles-list">
            {foreach $cat.articles as $article}
                <div class="article-card">
                    <h3 class="article-title"><a href="/article.php?id={$article.id}">{$article.title}</a></h3>
                    <div class="article-meta">Просмотров: {$article.views} | Дата: {$article.created_at}</div>
                    <div class="article-description">{$article.description}</div>
                </div>            
            {/foreach}
        </div>
        <a href="/category.php?id={$cat.id}" class="btn">Все статьи</a>
    </div>
    {/foreach}
</div>
</body>
</html>