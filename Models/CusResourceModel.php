<?php
namespace Mvc\Models;

use Mvc\Core\ResourceModel;

use Mvc\Models\CusModel;

class CusResourceModel extends ResourceModel {
    public function __construct(){
        $this->_init("custummer","",new CusModel());
    }
}