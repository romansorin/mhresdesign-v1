<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/news.css">
    <title>Untitled</title>
    <?php require '../inc/includes.php';include_once '../inc/connection/connection.php';?>
</head>
<body>
    <?php include '../inc/header.php';?>
    <!-- edit this to later be able to allow users to customize the html instead of just a straight input -->
    <!-- use medium article format as a baseline for the styling and stuff -->
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1 id="title"><?=$result['title']?></h1>
                <h2 id="category"><?=$result['category']?></h2>
                <h2 id="date"><?=$result['date_created']?></h2>




                <div class="dropdown">

                <?php if ($user->hasPermission($req)): ?><button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" id="editMenuDropdown">
                    <i class="fa fa-ellipsis-h"></i></button>
                    <ul class="dropdown-menu">
                        <li><a href="post.php?id=<?=$result['id']?>&edit=true">Edit</a></li>
                    </ul>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="row">
            <?=$result['content']?>
        </div>
    </div>
    <?php include '../inc/footer.php';?>
</body>
</html>