<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];

// 表示、表示確認したら全てコメントアウト🤗
// echo $email;
// echo $pass;

//2. DB接続します
// try {
//   //ID:'root', Password: 'root'
//   $pdo = new PDO('mysql:dbname=pita_pure;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }
require_once('funcs.php');
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "SELECT * FROM user_account WHERE email=:email  AND pass=:pass ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':pass', $pass);
// $res = $stmt->execute();


// // 1. SQL文を用意
// $stmt = $pdo->prepare("INSERT INTO login_pita(id, email, pass)VALUES(NULL, :email, :pass)");

// //  2. バインド変数を用意
// $stmt->bindValue(':email', $email, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':pass', $pass, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)


// //  3. 実行
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status === false){
  sql_error($stmt);
}


//４．データ登録処理後
// if($res==false){
//   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   $error = $stmt->errorInfo();
//   exit("ErrorMessage:".$error[2]);
// }

  // }else{
//   //５．index.phpへリダイレクト
//   header("Location: index.php");
//   exit;

// }

//摘出データ数を取得
$val = $stmt->fetch();

//該当レコードがあればSESSIONに値を代入
if($val["id"] !=""){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['email'];
  $_SESSION["pass"]      = $val['pass'];
  //login処理OKの場合select.phpへ遷移
  header("Location: ./login/in_page1.php");
}else{
  //login処理NGの場合index.phpへ遷移
  header("Location: touroku.php");
}

?>

