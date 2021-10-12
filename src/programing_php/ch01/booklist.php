<?php
$db = new mysqli("db", "develop", "develop", "develop");

// 接続情報が正しいことを確認する
if ($db->connect_error) {
    die("Connect Error ({$db->connect_error}) {$db->connect_error}");
}

$sql = "SELECT * FROM books WHERE available = 1 ORDER BY title";
$result = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookList</title>
</head>
<body>
    <table>
        <tr>
            <td colspan="4">
                <h3>These Books are currently available</h3>
            </td>
        </tr>

        <tr>
            <td>Title</td>
            <td>Year Published</td>
            <td>ISBN</td>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo stripslashes($row['title']); ?></td>
                <td><?php echo $row['pub_year']; ?></td>
                <td><?php echo $row['ISBN'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
