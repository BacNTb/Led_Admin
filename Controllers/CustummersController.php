<?php
namespace Mvc\Controllers;

use Mvc\Core\Controller;

use Mvc\Models\CusModel;

use Mvc\Models\CusRepository;

class CustummersController extends Controller
{

    private $CusRepository;

    public function __construct(){
        $this->CusRepository = new CusRepository();
    }

    function cus($page)
    {
        $newCus = new CusModel();
        $d['cus'] = $this->CusRepository->showAll($newCus);
        $this->set($d);

        // var_export($d['cus']);

        if($page == 'home') {
            $this->render("home");

        } else {
            $this->render("cus");
        }
    }


    function delete($id)
    {
        $Cus = new CusModel();
        $Cus->setId($id);
        if ($this->CusRepository->delete($Cus))
        {
            header("Location: " . WEBROOT . "custummers/cus");
        }
    }
}


