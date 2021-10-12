<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="view/css/css.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>


</head>
<body>
<header class="heading managing">
    <h1 style="text-align: center">WELCOME</h1>


</header>
<table>
    <?php foreach($allMembers as $value): ?>
        <tr>
            <td><?= $value->name ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>