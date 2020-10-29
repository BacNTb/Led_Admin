<?php
namespace Mvc\Models;

use Mvc\Models\CusResourceModel;

class CusRepository
{
    private $CusResourceModel;

    public function __construct() {
        $this->CusResourceModel = new CusResourceModel();
    }

    public function add($model) {      
        return $this->CusResourceModel->save($model);
    }

    public function update($model)  {       
        return $this->CusResourceModel->save($model);
    }

    public function delete($model) {
        return $this->CusResourceModel->delete($model);
    }

    public function getId($id) {
        return $this->CusResourceModel->getId($id);
    }

    public function showAll() {
        return $this->CusResourceModel->showAll();
    }
}