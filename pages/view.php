<?php

require_once "../connect/db.php";


$newsId = isset($_GET["id"]) ? $_GET["id"]: 1;

// 
function parseNewsView($table) {
    global $db;
    global $newsId;
    $sth = $db->prepare("SELECT id, title, content FROM news WHERE id = $newsId");
    $sth->execute();
    return $sth->fetchAll();
}
// 

$newsView = parseNewsView('news');

?>
<?php foreach ($newsView as $item): ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $item["title"] ?> - Новости</title>
</head>
<body>
    <header class="header"></header>
    <main class="main">
        <section class="main__section">
            <div class="main__section_inner">
                <div class="news-view">
                    <h1 class="news-view__head"><?= $item["title"] ?></h1>
                    <div class="news-view__item">
                        <div class="news-view__item_text">
                        <?= $item["content"] ?>
                        </div>
                    </div>
                    <div class="news-view__footer">
                        <div class="news-view_footer_body">
                            <a href="/pages/news.php?id=1" class="news-view_footer_body_item">Все новости >></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer"></footer>
</body>
</html>
<?php endforeach; ?>