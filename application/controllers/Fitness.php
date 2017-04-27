<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2/14/2017
 * Time: 6:18 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Fitness
 *
 * @property M_fitness model
 */
class Fitness extends Abs_child_manager {
    protected $_parent_field = 'project_id';

    public function __construct() {
        parent::__construct();
        $this->load_more_js("assets/js/front/fitness.js");
    }

    public function setting_class() {
        $this->name = Array(
            "class"  => "fitness",
            "view"   => "fitness",
            "model"  => "m_fitness",
            "object" => " Weighted fitness function",
        );
    }

    public function create($parent_value, $data = Array(), $data_return = Array()) {
        $id = $parent_value;
        $data["view_file"] = $this->name['view'] . '/fitness_add_form';
        return parent::create($parent_value, $data, $data_return);
    }

    public function create_save($parent_value, $data = Array(), $data_return = Array(), $skip_validate = FALSE) {
        if (!isset($data_return["callback"])) {
            $data_return["callback"] = "save_form_add_response";
        }
        if (sizeof($data) == 0) {
            $data = $this->input->post();
            $data[$this->_parent_field] = $parent_value;
        }
        $data_return = $this->_precheck_post_data($data, $data_return);
        if ($data_return['state'] != 1) {
            $data_return["data"] = $data;
            echo json_encode($data_return);
            return FALSE;
        } else {
            return $this->add_save($data, $data_return, $skip_validate);
        }
    }

    public function manage($parent_value, $data = Array()) {
        $data['fitness'] = $this->model->get($parent_value);
        parent::manage($parent_value, $data);
        $fitness_records = $this->model->get_many_by('project_id', $parent_value);
        $data['is_fitness'] = count($fitness_records);
    }

    public function ajax_list_data($data = Array()) {
        $data['callback'] = 'create_fitness_manage_table_callback';
        return parent::ajax_list_data($data); // TODO: Change the autogenerated stub
    }

    public function edit_save($id = 0, $data = Array(), $data_return = Array(), $skip_validate = FALSE) {
        if (!isset($data_return["callback"])) {
            $data_return["callback"] = "save_form_edit_response";
        }
        if (sizeof($data) == 0) {
            $data = $this->input->post();
        }
        $data_return = $this->_precheck_post_data($data, $data_return);
        if ($data_return['state'] != 1) {
            $data_return["data"] = $data;
            echo json_encode($data_return);
            return FALSE;
        } else {
            return parent::edit_save($id, $data, $data_return, $skip_validate);
        }
    }

    private function _precheck_post_data($data, $data_return = Array()) {
        if ($data['cost'] == NULL || $data['diff'] == NULL || $data['priority'] == NULL || $data['time'] == NULL) {
            $data_return['state'] = 0;
            $data_return['msg'] = 'Don\'t leave the inputs empty.';
        } else if ($data['cost'] + $data['diff'] + $data['priority'] + $data['time'] != 100) {
            $data_return['state'] = 0;
            $data_return['msg'] = 'Sum of weights must be 100.';
        } else {
            $data_return['state'] = 1;
        }
        return $data_return;
    }
}