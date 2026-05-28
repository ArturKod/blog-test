<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{$category.name}</title>
</head>
<body>
    <h1>{$category.name}</h1>
    <p>{$category.description}</p>

    <form method="get">
        <input type="hidden" name="id" value="{$category.id}">
        <label>Сортировка:</label>
        <select name="sort" onchange="this.form.submit()">
            <option value="date" {if $sort=='date'}selected{/if}>По дате</option>
            <option value="views" {if $sort=='views'}selected{/if}>По просмотрам</option>
        </select>
    </form>

    {foreach $articles as $a}
        <div>
            <h3><a href="/article.php?id={$a.id}">{$a.title}</a></h3>
            <p>{$a.description}</p>
            <small>Просмотров: {$a.views} | Дата: {$a.created_at}</small>
        </div>
        <hr>
    {/foreach}

    <div>
        {if $current_page > 1}
            <a href="?id={$category.id}&sort={$sort}&page={$current_page-1}">← Предыдущая</a>
        {/if}
        Страница {$current_page} из {$last_page}
        {if $current_page < $last_page}
            <a href="?id={$category.id}&sort={$sort}&page={$current_page+1}">Следующая →</a>
        {/if}
    </div>

    <p><a href="/">← На главную</a></p>
</body>
</html>