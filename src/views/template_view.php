<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&family=Open+Sans&display=swap" rel="stylesheet">
    <title><?= $data['title'] ?? 'Новости'?></title>
</head>
<body>
    <div class="container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/components/header.php"; ?>
    </div>

    <!-- content -->
    <?php require_once 'src/views/'.$content_view; ?>  

    <div class="container">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/components/footer.php"; ?>
    </div>
</body>
</html>