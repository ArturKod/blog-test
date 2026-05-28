<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{$article.title} - Блог</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="site-header">
    <div class="container">
        <h1><a href="/">Мой блог</a></h1>
    </div>
</div>
<div class="container">
    <article class="article-full">
        <h1>{$article.title}</h1>
        <div class="article-meta">
            <span> {$article.views} просмотров</span> |
            <span> {$article.created_at}</span>
        </div>

        {if $article.image}
            <div class="article-image">
                <img src="/uploads/{$article.image}" alt="{$article.title}">
            </div>
        {/if}

        <div class="article-description lead">
            <strong>Описание:</strong> {$article.description}
        </div>

        <div class="article-categories">
            <strong>Категории:</strong>
            {foreach $article.categories as $cat}
                <a href="/category.php?id={$cat.id}" class="category-badge">{$cat.name}</a>
                {if !$cat@last} {/if}
            {/foreach}
        </div>

        <div class="article-content">
            {$article.content}
        </div>
    </article>

    {if $similar|count}
        <div class="similar-list">
            <h3>Похожие статьи</h3>
            <ul>
                {foreach $similar as $sim}
                    <li>
                        <a href="/article.php?id={$sim.id}">{$sim.title}</a>
                        <div class="similar-meta"> {$sim.views} просмотров</div>
                    </li>
                {/foreach}
            </ul>
        </div>
    {/if}

    <div class="article-navigation">
        <a href="/" class="btn">← На главную</a>
        <a href="javascript:history.back()" class="btn">← Назад</a>
    </div>
</div>
</body>
</html>