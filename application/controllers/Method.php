<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2/14/2017
 * Time: 6:18 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Method
 */
class Method extends Manager_base {
    public function __construct() {
        parent::__construct();
    }

    public function setting_class() {
        $this->name = Array(
            "class"  => "method",
            "view"   => "method",
            "model"  => "m_method",
            "object" => "Phương pháp xử lí Rủi Ro",
        );
    }
}