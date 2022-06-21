<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') header('Location: /index.html');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['foto'])) {
        $count = count($_FILES['foto']['name']);
        for ($i = 0; $i < $count; $i += 1) {
            $file_name = $_FILES['foto']['name'][$i];
            $tmp_name = $_FILES['foto']['tmp_name'][$i];
            if ($_FILES['foto']['error'][$i] == 0) {
                if ($_FILES['foto']['size'][$i] < 2097152) {
                    $string = $_FILES['foto']['type'][$i];
                    $check = strpos($string, 'image');
                    if ($check !== false) {
                        $full_file_name = microtime().$file_name;
                        $move_result = move_uploaded_file($tmp_name,"../img/$full_file_name");
                        if ($move_result) echo "Файл $file_name отправлен на сервер \n";
                    }else echo "$file_name не прошёл проверку типа файла";
                }else echo "$file_name слишком велик для загрузки";
            }else echo "Ошибка при загрузке файла $file_name на сервер";
        }
    }
}


