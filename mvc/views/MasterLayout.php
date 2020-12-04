<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterLayout</title>
    <style>
    /* #header, #footer {
            padding: 20px;
            background-color: yellow;
        } */
    </style>
</head>

<body>
    <header id="header"></header>
    <div id="content">
        <?php require_once "./mvc/views/pages/". $data["page"] . ".php" ?>
    </div>
    <footer id="footer"></footer>
</body>

</html>