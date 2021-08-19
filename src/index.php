<?php
$date = date("Y-m-d H:i:s");
var_dump($date)
?>

<h1>ようこそ！PHP！</h1>
<p>ただいまの日時は、<?php echo $date ?>です。</p>

<?php
echo phpinfo();
