<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
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
            <li><a href="touroku.php">会員登録</a></li>
        </ul>
    </div>

</header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="touroku_insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>登録</legend>
                <label>Name：<input type="text" name="name"></label><br>
                <label>BirthDay：<input type="text" name="birthday"></label><br>
                <label>PostNumber：<input type="text" name="post_num"></label><br>
                <!-- <label>Job：<input type="text" name="job"></label><br> -->
                Job : <select name='job'>
                <option value='学生'>学生</option>
                <option value='会社員'>会社員</option>
                <option value='主婦'>主婦
                </option>
                </select><br>

                <label>Email：<input type="text" name="email"></label><br>
                <label>Pass：<input type="text" name="pass"></label><br>

                <input type="submit" value="送信">

            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>