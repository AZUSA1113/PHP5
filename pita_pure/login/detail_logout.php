<?php

//DB接続ができます
require_once('funcs.php');
$pdo = db_conn();

//👆id１番の人だったら、その人が登録したデータだけが欲しいので
//DBに接続して検索をして表示するため


/**
 * １．PHP
 * [ここでやりたいこと]
 * まず、クエリパラメータの確認 = GETで取得している内容を確認する
 * イメージは、select.phpで取得しているデータを一つだけ取得できるようにする。
 * →select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * ※SQLとデータ取得の箇所を修正します。
 */

//GET送信されたidを取得(URLの後ろについてるデータ)
$id = $_GET["id"]; 
// echo "GET: ". $id;

//SQLを準備する記述を書きます
$stmt = $pdo->prepare('SELECT * FROM user_account WHERE id=:id;');

//SQLが安全かチェックする
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

// sqlを実行
$status = $stmt->execute();//成功？失敗？

//結果表示

$view = '';

if ($status === false) {
    sql_error($status);//func.phpに記述しているエラーの共通かを活用していますsql_error()
} else {
    $result = $stmt->fetch();//一行だけ取得するからワイル使わないでfetchだけ
}




?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>会員情報</title>
    <link href="css/pita.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <header class=header>
        <div class=container>
        <a href="index.php"><img class=img_logo src="img/logo.jpeg" alt=""></a>
            <ul class=nav>
                <li><a href="select_logout.php">会員情報一覧</a></li>
            </ul>
        </div>
    </header>


    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
            <legend>会員情報</legend>
                <label>Name：<input type="text" name="name" value="<?=$result['name']?>"></label><br>
                <label>BirthDay：<input type="text" name="birthday" value="<?=$result['birthday']?>"></label><br>
                <label>PostNumber：<input type="text" name="post_num" value="<?=$result['post_num']?>"></label><br>
                <label>Job：<input type="text" name="job" value="<?=$result['job']?>"></label><br>
                <label>Email：<input type="text" name="email" value="<?=$result['email']?>"></label><br>
                <label>Pass：<input type="text" name="pass" value="<?=$result['pass']?>"></label><br>

                <!-- ここに一つ追加します -->
                <!-- <input type='hidden' name="id" value="<?=$result["id"]?>"> -->
                <!-- ここに一つ追加します -->
                <!-- <input type="submit" value="送信"> -->
            </fieldset>
        </div>
    </form>
</body>

</html>
