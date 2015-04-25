<?php

if (isset($_POST['url'])) {
	$url = $_POST['url'];

	if (filter_var($url, FILTER_VALIDATE_URL)) {
		include 'base62.php';
		include 'sql.php';

		$db = new SafeMySQL();

		$url_hash = hash('haval128,3', $url);

		$sql  = 'SELECT `id` FROM `urls` WHERE `hash` = ?s LIMIT 1';
        $item = $db->getRow($sql, $url_hash);

        if (!empty($item)) {
        	$enc_id =  Base62::encode($item['id']);
        	echo 'http://localhost/redirect/' . $enc_id;

        } else {
        	$sql = 'INSERT INTO `urls` SET ?u';
			$db->query($sql, array('url' => $url, 'hash' => $url_hash));

        	$id = $db->insertId();
        	$enc_id =  Base62::encode($id);
        	echo 'http://localhost/redirect/' . $enc_id;
        }

	} else {
		echo 'Не вірна URL-адреса';
	}

} else {
	echo 'Не передано потрібних параметрів';
}
