<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{$article.title}</title>
</head>
<body>

    <h1>{$article.title}</h1>

    {if $article.image}
        <img src="/uploads/{$article.image}" alt="{$article.title}" style="max-width: 100%;">
    {/if}

    <p><strong>Описание:</strong> {$article.description}</p>

    <div>
        <strong>Категории:</strong>
        {foreach $article.categories as $cat}
            <a href="/category.php?id={$cat.id}">{$cat.name}</a>{if !$cat@last}, {/if}
        {/foreach}
    </div>

    <div>
        <strong>Просмотров:</strong> {$article.views} |
        <strong>Дата публикации:</strong> {$article.created_at}
    </div>

    <hr>

    <div>
        {$article.content}
    </div>

    <hr>

    {if $similar}
        <h3>Похожие статьи</h3>
        <ul>
            {foreach $similar as $sim}
                <li>
                    <a href="/article.php?id={$sim.id}">{$sim.title}</a>
                    ({$sim.views} просмотров)
                </li>
            {/foreach}
        </ul>
    {/if}

    <p><a href="/">← На главную</a> | <a href="javascript:history.back()">Назад</a></p>

</body>
</html>