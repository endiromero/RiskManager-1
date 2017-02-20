<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2/14/2017
 * Time: 6:18 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Risk
 */
class Risk extends Manager_base {
    public function __construct() {
        parent::__construct();
    }

    public function setting_class() {
        $this->name = Array(
            "class"  => "risk",
            "view"   => "risk",
            "model"  => "m_risk",
            "object" => "Rủi Ro",
        );
    }

    public function manager($data = Array()) {
        $data["view_file"] = "admin/font/manager_container";
        parent::manager($data); // TODO: Change the autogenerated stub
    }
    public function add_link($origin_column_value, $column_name, &$record, $column_data, $caller) {
        return '<a href="risk/detail/'.$record->id.'">'.$origin_column_value.'</a>';
    }
    function detail($id) {
        $data['detail_risk'] = $this->model->get($id);
        $content = $this->load->view("admin/font/risk_detail", $data, TRUE);
        $this->load_more_css("assets/css/font/detail.css");
        $this->show_page($content);
    }
}