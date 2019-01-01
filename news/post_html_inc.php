<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled</title>
    <?php require '../inc/includes.php'; include_once '../inc/connection/connection.php'; ?>
</head>
<body>
    <?php include '../inc/header.php';?>
    <!-- edit this to later be able to allow users to customize the html instead of just a straight input -->
    <!-- use medium article format as a baseline for the styling and stuff -->
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1 id="title"><?=$result['title']?></h1>
                <h4 id="category"><?=$result['category']?></h4>
            </div>
        </div>
        <div class="row">
            <?=$result['content']?>
        </div>
    <?php if ($user->hasPermission($req)): ?><a href="post.php?id=<?=$result['id']?>&edit=true"><h6>Edit</h6></a> <?php endif;?>
    </div>
    <?php include '../inc/footer.php';?>
</body>
</html>