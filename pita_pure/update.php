<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。

//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る

//2. $id = POST["id"]を追加

//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$name   = $_POST['name'];
$birthday   = $_POST['birthday'];
$post_num   = $_POST['post_num'];
$job   = $_POST['job'];
$email  = $_POST['email'];
$pass    = $_POST['pass'];
$id = $_POST["id"]; //これを追加しましょう 
//これはdetail.phpのhiddenで送られたid

// echo $name;
// echo $birthday;
// echo $post_num;
// echo $job;
// echo $email;
// echo $pass;
// echo $id;


//2. DB接続します
//*** function化する！  *****************
// try {
//     $db_name = 'gs_db3';    //データベース名
//     $db_id   = 'root';      //アカウント名
//     $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }

//function.phpに記述したものを書きます
//require一番最初に書く！
require_once('funcs.php');
$pdo = db_conn();


//３．データ更新SQL作成
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,content,indate)VALUES(:name,:email,:age,:content,sysdate())");
$stmt = $pdo->prepare( 'UPDATE user_account SET name=:name, birthday=:birthday, post_num=:post_num, job=:job, email=:email, pass=:pass WHERE id=:id;' );


// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birthday', $birthday, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':post_num', $post_num, PDO:: PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':job', $job, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pass', $pass, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// hiddenで受け取ったidをbindValueを用いて「安全かチェック」をする＝SQLインジェクション対策
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
// if ($status === false) {
//     //*** function化する！******\
//     $error = $stmt->errorInfo();
//     exit('SQLError:' . print_r($error, true));
// } else {
//     //*** function化する！*****************
//     header('Location: index.php');
//     exit();
// }
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}



//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。

//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る

//2. $id = POST["id"]を追加

//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$age    = $_POST['age'];
$content = $_POST['content'];
$id = $_POST["id"]; //これを追加しましょう 
//これはdetail.phpのhiddenで送られたid

//2. DB接続します
//*** function化する！  *****************
// try {
//     $db_name = 'gs_db3';    //データベース名
//     $db_id   = 'root';      //アカウント名
//     $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }

//function.phpに記述したものを書きます
//require一番最初に書く！
require_once('funcs.php');
$pdo = db_conn();


//３．データ更新SQL作成
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,content,indate)VALUES(:name,:email,:age,:content,sysdate())");
$stmt = $pdo->prepare( 'UPDATE gs_an_table SET name=:name, email=:email, age=:age, content=:content, indate=sysdate() WHERE id=:id;' );


// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
// hiddenで受け取ったidをbindValueを用いて「安全かチェック」をする＝SQLインジェクション対策
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
// if ($status === false) {
//     //*** function化する！******\
//     $error = $stmt->errorInfo();
//     exit('SQLError:' . print_r($error, true));
// } else {
//     //*** function化する！*****************
//     header('Location: index.php');
//     exit();
// }
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}


?>