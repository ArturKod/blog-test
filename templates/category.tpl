<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{$category.name} - Блог</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="site-header">
    <div class="container">
        <h1><a href="/">Мой блог</a></h1>
    </div>
</div>
<div class="container">
    <div class="category-header">
        <h1>{$category.name}</h1>
        <p>{$category.description}</p>
    </div>

    <div class="sort-form">
        <form method="get">
            <input type="hidden" name="id" value="{$category.id}">
            <label for="sort">Сортировать по:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="date" {if $sort=='date'}selected{/if}>Дате (новые сначала)</option>
                <option value="views" {if $sort=='views'}selected{/if}>Просмотрам</option>
            </select>
        </form>
    </div>

    {if $articles|count == 0}
        <p>В этой категории пока нет статей.</p>
    {else}
        {foreach $articles as $a}
            <div class="article-card">
                <h2 class="article-title"><a href="/article.php?id={$a.id}">{$a.title}</a></h2>
                <div class="article-meta">
                    Просмотров: {$a.views} | Дата: {$a.created_at}
                </div>
                <div class="article-description">
                    {$a.description}
                </div>
                <a href="/article.php?id={$a.id}" class="btn">Читать далее →</a>
            </div>
        {/foreach}
    {/if}

    {if $last_page > 1}
        <div class="pagination">
            {if $current_page > 1}
                <a href="?id={$category.id}&sort={$sort}&page={$current_page-1}">← Предыдущая</a>
            {/if}
            <span class="current">Страница {$current_page} из {$last_page}</span>
            {if $current_page < $last_page}
                <a href="?id={$category.id}&sort={$sort}&page={$current_page+1}">Следующая →</a>
            {/if}
        </div>
    {/if}

    <p class="back-link"><a href="/" class="btn">← На главную</a></p>
</div>
</body>
</html>