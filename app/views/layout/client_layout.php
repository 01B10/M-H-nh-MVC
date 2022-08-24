<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/client/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        $this->render("block/header");
        $this->render($content,$sub);
        $this->render("block/footer");
    ?>
</body>
</html>