<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/libraries/lib_excel/PHPExcel.php";
class Control_model extends CI_Model{


    function get_lista_controles(){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('control_adicional', 'control_adicional.con_lin_id = linea.lin_id');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $query = $this->db->get();
        return $query->result_array();

    }


    function guardar_controles(){

        $data = array(

            "con_lin_id" => $this->input->post("linea"),
            "con_fecha" => $this->input->post("fecha"),
            "con_facturacion" => $this->input->post("facturacion"),
            "con_descuentos" => $this->input->post("descuentos"),

        );

        $this->db->insert("control_adicional", $data);

    }

    function get_control($id){
        $query = $this->db->get_where('control_adicional', array('con_id' => $id));

        return $query->result_array();

    }
    function get_info_control($id){
        $this->db->select('*');
        $this->db->from('control');
        $this->db->where('con_id', $id);
        $this->db->join('linea', 'linea.lin_id = control.con_lin_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function guardar_control(){
        //Cargar PHPExcel library
        $this->load->library('excel');
        $name   = $_FILES['file']['name'];
        $tname  = $_FILES['file']['tmp_name'];
        $obj_excel = PHPExcel_IOFactory::load($tname);
        $sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);
        $arr_datos = array();
        foreach ($sheetData as $index => $value) {
            if ( $index != 1 ){
                $arr_datos = array(
                    'campo'  => $value['A'],
                    'campo1'  =>  $value['B'],
                    'campo2' =>  $value['C'],
                    'campo3'  =>  $value['D'],
                );
                foreach ($arr_datos as $llave => $valor) {
                    $arr_datos[$llave] = $valor;
                }
                $this->db->insert('example_table',$arr_datos);
            }
        }
        $result['valid'] = true;
        $result['message'] = 'Productos importados correctamente';
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }


}