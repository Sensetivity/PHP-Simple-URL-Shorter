<?php
if (isset($_GET['k'])) {
	include 'base62.php';
	include 'sql.php';

	$db = new SafeMySQL();

	$key = $_GET['k'];
	$id = Base62::decode($key);

	$sql  = 'SELECT `url` FROM `urls` WHERE `id` = ?i LIMIT 1';
    $item = $db->getRow($sql, $id);

    if (!empty($item)) {
    	$url =  htmlentities($item['url']);

    	Header('Status: 301 Moved Permanently');
		Header('Location: ' . $url);

    } else {
    	echo 'Такої URL-адреси не має!';
    }

} else {
	echo 'Не передано URL-адреси!';
}