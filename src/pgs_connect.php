<?php

print('只今の日時は' . date("Y-m-d H:i:s") . 'です。'.PHP_EOL);

// 接続情報
$dbname = 'postgres';
$host = 'php_template_db';
$dbuser = 'postgres';
$dbpass = 'postgres';

try{
    // dbへ接続
    $dbh = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass);
    print('正常に接続されました。' . PHP_EOL);

    print('sysid, ユーザ名' . PHP_EOL);

    // クエリを実行しユーザー一覧を表示
    $sql = 'SELECT * FROM pg_user';
    foreach ($dbh->query($sql) as $row) {
        print($row['usesysid'] . ', ');
        print($row['usename'] . PHP_EOL);
    }
} catch (PDOException $e) {
    print('エラー:' . $e->getMessage());
    exit();
}
