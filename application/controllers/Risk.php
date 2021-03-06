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
 *
 * @property M_risk model
 */
class Risk extends Abs_child_manager {
    protected $_parent_field = 'project_id';
    public function __construct() {
        parent::__construct();
        $this->load_more_css("assets/css/font/detail.css");
        $this->load_more_js("assets/js/front/risk.js");
        $this->load->model('m_risk_type');
    }

    public function setting_class() {
        $this->name = Array(
            "class"  => "risk",
            "view"   => "risk",
            "model"  => "m_risk",
            "object" => "Risk",
        );
    }
    public function create($parent_value, $data = Array(), $data_return = Array()) {
        $id = $parent_value;
        $data['list_risk_type'] = $this->m_risk_type->get_all();
        $data["view_file"] = $this->name['view'] . '/risk_add_form';
        return parent::create($parent_value, $data, $data_return);
    }
    public function get_method_child() {
        $list_method = $this->m_risk_type->getall();
        echo json_encode([
            'state' => 1,
            'data'  => $list_method,
        ]);
    }
    public function create_save($parent_value, $data = Array(), $data_return = Array(), $skip_validate = FALSE) {
        if (sizeof($data) == 0) {
            $data = $this->input->post();
            $data[$this->_parent_field] = $parent_value;
        }
        if($data['risk_type_id']==null ||$data['code']==null ||$data['name']==null || $data['description'] ==null||$data['financial_impact']==null || $data['risk_level'] ==null )
        {
            echo json_encode([
                'state' => 0,
                'msg' => 'Invalid data!
                Don\'t leave the inputs empty.',
            ]);;
            return 0;
        }
        return $this->add_save($data, $data_return, $skip_validate);
    }

    public function add_link($origin_column_value, $column_name, &$record, $column_data, $caller) {
        return '<a href="' . site_url('risk/detail/' . $record->id) . '">' . $origin_column_value . '</a>';
    }

    function detail($id) {
        $data['detail_risk'] = $this->model->get($id);
        $data['risk_id']=$id;
        $content = $this->load->view("admin/font/risk_detail", $data, TRUE);
        $this->load_more_css("assets/css/font/detail.css");
        $this->show_page($content);
    }
}