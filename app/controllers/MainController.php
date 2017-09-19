<?php

namespace app\controllers;

use app\models\Main;
use vender\core\base\Controller;

class MainController extends Controller
{
    public function index()
    {
        $model = new Main();
        $tasks = $model->display_task_lim($number_of_pages, $order);
        if ($order == 'name'){
            $select = 'Ім\'я';
        }elseif ($order == 'e-mail'){
            $select = 'Емайл';
        }else{
            $select = 'Статус';
        }
        $this->setVars(compact("select","tasks", "alert", "number_of_pages", "order"));
        $this->getView();
    }

    public function autor()
    {
        $this->getView();
    }

    public function add()
    {
        $types = array('image/gif', 'image/png', 'image/jpeg');
        function resize($image, $w_o = false, $h_o = false)
        {
            if (($w_o < 0) || ($h_o < 0)) {
                return false;
            }
            list($w_i, $h_i, $type) = getimagesize($image);
            $types = array("", "gif", "jpeg", "png");
            $ext = $types[$type];
            if ($ext) {
                $func = 'imagecreatefrom' . $ext;
                $img_i = $func($image);
            } else {
                return false;
            }
            if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
            if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
            $img_o = imagecreatetruecolor($w_o, $h_o);
            imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
            $func = 'image' . $ext;
            return $func($img_o, $image);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['text'])) {
            $picture_filetype = $_FILES['picture']['type'];
            $picture_filesize = $_FILES['picture']['size'];
            if (!in_array($picture_filetype, $types)) {
                die('<p>Заборонений тип файла.<a href="/main/add">Попробувати інший тип файла?</a></p>');
            }
            if ($picture_filesize == 0)
                die ("<p>Завантажений файл є пустим</p>");

            move_uploaded_file($_FILES["picture"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . "/public/images/tasks/" . $_FILES["picture"]["name"]);

            resize($_SERVER["DOCUMENT_ROOT"] . "/public/images/tasks/" . $_FILES["picture"]["name"], 320, 240);
            $task = new Main();
            $task->setName($_POST['name']);
            $task->setEmail($_POST['email']);
            $task->setTxt($_POST['text']);
            $task->setImgUrl($_FILES["picture"]["name"]);
            $task->Add();
            unset($_POST);
        }
        $this->getView();
    }
}

?>
