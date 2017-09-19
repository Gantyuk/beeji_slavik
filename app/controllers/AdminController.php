<?php
namespace app\controllers;

use app\models\Main;
use vender\core\base\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $model = new Main();

        if (!empty($_GET['do'])) {
            if ($_GET["do"] == 'logout') {
                unset($_SESSION['admin']);
                session_destroy();
                header("Location: /admin");
            } else {
                $model->delet($_GET["do"]);
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['text'])) {
            if (!empty($_POST['sucses'])) {
                $sucses = '1';
            } else {
                $sucses = 'NULL';
            }
            $model->update_status_text($sucses, $_POST['text'], $_POST['id']);
        }
        if (!empty($_SESSION['admin'])) {
            $tasks = $model->display_task();
            $this->setVars(compact("tasks"));
        }
        $admin = require ROOT . '/admin_pas.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['user'])) {
            if ($admin['login'] == $_POST['user'] && $admin['pasword'] == md5($_POST['pass'])) {
                $_SESSION['admin'] = $admin;
                $tasks = $model->display_task();
                $this->setVars(compact("tasks"));
            } else {
                $alert = "Не вірний пароль або логін";
                $this->setVars(compact("alert"));
            }
        }
        $this->getView();
    }

    function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search']) && isset($_GET['field'])) {
            $model = new Main();
            $tasks = $model->display_task_search($_GET['search'], $_GET['field']);
            echo json_encode($tasks);
        }
    }

}