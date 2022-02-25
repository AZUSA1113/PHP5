<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link href="css/pita.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header class=header>
        <div class=container>
        <a href="index.php"><img class=img_logo src="img/logo.jpeg" alt=""></a>
            <ul class=nav>
                <li><a href="login/select_logout.php">会員一覧</a></li>
                <li><a href="select.php">データ編集</a></li>
            </ul>
        </div>
    </header>

    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ログイン</legend>
                <label>Email：<input type="text" name="email"></label><br>
                <label>PASS：<input type="text" name="pass"></label><br>

                <input type="submit" value="送信">

                <input type="button" onclick="location.href='touroku.php'" value="新規登録">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>