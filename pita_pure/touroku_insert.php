<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$post_num = $_POST['post_num'];
$job = $_POST['job'];
$email = $_POST['email'];
$pass = $_POST['pass'];

// 表示、表示確認したら全てコメントアウト🤗
echo $email;
echo $pass;

//2. DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=pita_pure;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO user_account(id, name, birthday, post_num, job, email, pass)
VALUES(NULL, :name, :birthday, :post_num, :job, :email, :pass)");

//  2. バインド変数を用意
$stmt->bindValue(':name', $name, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birthday', $birthday, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':post_num', $post_num, PDO:: PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':job', $job, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pass', $pass, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)


//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: login.php");
  exit;

}


?>

