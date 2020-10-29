<?php
namespace Mvc\Controllers;

use Mvc\Core\Controller;

use Mvc\Models\AdminModel;

use Mvc\Models\AdminRepository;


class AdminsController extends Controller
{

    private $AdminRepository;

    public function __construct(){
        $this->AdminRepository = new AdminRepository();
    }

    function admin($page)
    {   
        $newAdmin = new AdminModel();
        $d['admin'] = $this->AdminRepository->showAll($newAdmin);
        $this->set($d);

        if($page == 'home') {
            $this->render("home");

        } else {
            $this->render("admin");
        }
    }

    function create()
    {
        if (isset($_POST["name"])) {
            
            if (isset($_FILES["image"])) {
                
                // var_dump($_FILES["image"]);
                
                $fileUpload = $_SERVER['DOCUMENT_ROOT'] . '/admin/views/imgadmin/';

                // $file = $_FILES["image"]['name'];

                // var_export($name);

                // $name = implode($file);
                // echo $name;

                // if ($name == UPLOAD_ERR_OK) {

                    $tmp_name = $_FILES["image"]["tmp_name"];
                    $name = basename(implode($_FILES["image"]['name']));
                    move_uploaded_file($tmp_name, "$fileUpload/$name");


                    $Admin= new AdminModel();
                    $Admin->setName($_POST["name"]);
                    $Admin->setImg($name);
                    $Admin->setUsername($_POST["username"]);
                    $Admin->setPassword(sha1($_POST["password"]));
                    $Admin->setEmail($_POST["email"]);
                    $Admin->setTell($_POST["tell"]);
                    $Admin->setCreate_at(date("Y-m-d h:i:s"));
        
                    if ($this->AdminRepository->add($Admin)) {
        
                        header("Location: " . WEBROOT . "admins/admin/");
                    // }
                }
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $Admin= new AdminModel();
        $Admin->setId($id);

        if (isset($_POST["name"]))
        {
            $Admin->setName($_POST["name"]);
            $Admin->setUsername($_POST["username"]);
            $Admin->setPassword(sha1($_POST["password"]));
            $Admin->setEmail($_POST["email"]);
            $Admin->setTell($_POST["tell"]);
            $Admin->setUpdate_at(date("Y-m-d h:i:s"));

            if ($this->AdminRepository->update($Admin))
            {
                header("Location: " . WEBROOT . "leds/index");
            }
        }

        $d["Admin"] = $this->AdminRepository->getId($id);

        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $Admin = new AdminModel();
        $Admin->setId($id);
        if ($this->AdminRepository->delete($Admin))
        {
            header("Location: " . WEBROOT . "admins/admin/");
        }
    }

    function login($out)
    {
        if(isset($_POST['submit'])) {
            $repone = new AdminRepository();
            $resuft =  $repone->check($_POST['username'], sha1($_POST['password']));
            if($resuft) {
                $_SESSION['username'] = $resuft['username'];
                $_SESSION['name'] = $resuft['name'];
                
                header('Location: /admin/leds/index');
            }
            
        }
        if($out == 'out') {
            unset($_SESSION['username']);
        }
        
        $this->render("login");
    }
}

