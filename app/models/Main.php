<?php

namespace app\models;

use vender\core\DB;

class Main extends DB
{
    protected $_id;
    protected $_name;
    protected $_email;
    protected $_txt;
    protected $_img_url;
    protected $_status = NULL;
    protected $_Date_create;
    protected $_date_edit;

    public function __construct()
    {
        $this->_mysql = DB::instanse();
    }

    public function display_task_lim(&$number_of_pages, &$order)
    {
        $results_per_page = 3;
        $result = $this->_mysql->Query("SELECT * FROM tasks");
        $tasks = array();
        $number_of_results = mysqli_num_rows($result);
        $number_of_pages = ceil($number_of_results / $results_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        if (!isset($_GET['order'])) {
            $order = 'name';
        } else {
            $order = $_GET['order'];
        }
        $this_page_first_result = ($page - 1) * $results_per_page;
        $result = $this->_mysql->Query('SELECT * FROM tasks  ORDER By `' . $order . '` LIMIT ' . $this_page_first_result . ',' . $results_per_page);
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function display_task()
    {
        $tasks = array();
        $result = $this->_mysql->Query('SELECT * FROM tasks ');
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function display_task_search($search, $field)
    {
        $tasks = array();
        $result = $this->_mysql->Query('SELECT * FROM tasks WHERE `' . $field . '` LIKE \'%' . $search . '%\'');
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function delet($id)
    {
        return $this->_mysql->Query('DELETE FROM `tasks` WHERE `id` =' . $id);
    }

    public function update_status_text($status, $text, $id)
    {
        return $this->_mysql->Query('UPDATE `tasks` SET `txt`=\'' . $text . '\' ,`status`=' . $status . ' ,`Date_edit`=\'' . date('Y-m-d') . '\' WHERE id=' . $id);

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return mixed
     */
    public function getTxt()
    {
        return $this->_txt;
    }

    /**
     * @return mixed
     */
    public function getImgUrl()
    {
        return $this->_img_url;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->_Date_create;
    }

    /**
     * @return null
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @return mixed
     */
    public function getDateEdit()
    {
        return $this->_date_edit;
    }

    /**
     * @param mixed $Date_create
     */
    public function setDateCreate($Date_create)
    {
        $this->_Date_create = $Date_create;
    }

    /**
     * @param mixed $date_edit
     */
    public function setDateEdit($date_edit)
    {
        $this->_date_edit = $date_edit;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @param mixed $img_url
     */
    public function setImgUrl($img_url)
    {
        $this->_img_url = $img_url;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @param mixed $txt
     */
    public function setTxt($txt)
    {
        $this->_txt = $txt;
    }

    /**
     * @param null $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function Add()
    {

        $this->_mysql->Query("
                INSERT INTO
                     `tasks`(`name`, `e-mail`, `txt`, `img_url`, `Date_create`, `Date_edit`)
                VALUES
                    ('" . $this->getName() . "', '" . $this->getEmail() . "', '" . $this->getTxt() . "', '" . $this->getImgUrl() . "',
                     '" . date('Y-m-d') . "',' " . date('Y-m-d') . "')");
    }
}

?>