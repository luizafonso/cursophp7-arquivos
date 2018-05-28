<?php

$images = scandir("images");
#echo json_encode($images);
#var_dump($images);

$data = array();

foreach ($images as $cada) {
	if(!in_array($cada, array(".", ".."))) {
		$filename = "images" . DIRECTORY_SEPARATOR . $cada;
		$info = pathinfo($filename);

		$info["size"] = filesize($filename);
		$info["modificado"] = date("d/m/Y H:i:s", filemtime($filename));
		$info["url"] = "http://localhost/dir/".str_replace("\\", "/", $filename);

		array_push($data, $info);
	}
}

echo json_encode($data);

?>