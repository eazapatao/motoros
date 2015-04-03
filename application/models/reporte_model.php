<?php

class Reporte_model extends CI_Model{


    function get_lista_estadocuentas(){
        $this->db->select('*');
        $this->db->from('estadocuenta');
        $this->db->join('alquiler', 'alquiler.alq_id = estadocuenta.estcue_alq_id');
        $this->db->join('cliente', 'cliente.cli_id = alquiler.alq_cli_id');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_info_linea($id){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->where('lin_id', $id);
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $query = $this->db->get();
        return $query->result_array();

    }

    function get_linea_plan($id)
    {
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->from('linea');
        $this->db->where('linea',$id);

    }


    function get_lista_lineas_disponibles(){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $this->db->where('lin_estado',"Disponible");
        $query = $this->db->get();
        return $query->result_array();

    }

    function get_lista_datos(){
        $query = $this->db->get("datos");

        return $query->result_array();

    }
    function get_lista_historial(){
        $sql = "select *
        from alquiler join (cliente, historialinea, linea,plan,datos) on
        (cliente.cli_id=alq_cli_id AND historialinea.his_alq_id=alq_id AND historialinea.his_lin_id = linea.lin_id AND plan.pla_id=linea.lin_pla_id AND historialinea.his_dat_id=datos.dat_id)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function guardar_linea(){

        $data = array(
            "lin_pla_id" => $this->input->post("plan"),
            "lin_numero" => $this->input->post("numero"),
            "lin_corte" => $this->input->post("corte"),
            "lin_estado" => $this->input->post("estado"),
            "lin_minutosconsumidos" => $this->input->post("minutos"),
            "lin_pasaminutos" => $this->input->post("pasaminutos"),


        );

        $this->db->insert("linea", $data);

    }

    function guardar_historial(){

        $data = array(
            "his_lin_id" => $this->input->post("linea"),
            "his_alq_id" => $this->input->post("alquiler"),
            "his_dat_id" => $this->input->post("datos"),
            "his_valor_minvend" => $this->input->post("vlorminvend"),

        );

        $this->db->insert("historialinea", $data);
        $dato= array(
            "lin_estado" => "Alquilada"
        );
        $this->db->where("lin_id", $this->input->post("linea"));
        $this->db->update('linea', $dato);
        $this->guardar_estado_cuenta($this->input->post("linea"));
    }



    function guardar_estado_cuenta($numero){
        $this->db->select('lin_pla_id, pla_totalmin');
        $this->db->from('linea');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $this->db->where('lin_id', $numero);
        $query = $this->db->get();

        $result = $query->result_array();


        $verificacion = $this->verificar_estado_cuenta($this->input->post("alquiler"));

        if ($verificacion == 0){
            $debe = $this->input->post("vlorminvend") * $result[0]['pla_totalmin'];
            $data = array(
                "estcue_alq_id" => $this->input->post("alquiler"),
                "estcue_debe" => $debe,
                "estcue_abono" => 0,
                "estcue_saldo" => 0
            );

            $this->db->insert("estadocuenta", $data);
        }else{
            $debe = $this->get_debe_estado_cuenta($this->input->post("alquiler"))+($this->input->post("vlorminvend") * $result[0]['pla_totalmin']);
            $data = array(
                "estcue_debe" => $debe
            );

            $this->db->where('estcue_alq_id', $this->input->post("alquiler"));
            $this->db->update('estadocuenta', $data);
        }

    }

    function get_debe_estado_cuenta($id_alquiler){
        $this->db->select('estcue_debe');
        $this->db->from('estadocuenta');
        $this->db->where('estcue_alq_id', $id_alquiler);
        $query = $this->db->get();
        $resutl = $query->result_array();

        return $resutl[0]['estcue_debe'];
    }

    function verificar_estado_cuenta($id_alquiler){
        $this->db->where("estcue_alq_id", $id_alquiler);
        return $this->db->count_all('estadocuenta');
    }

    function get_linea($id){
        $query = $this->db->get_where('linea', array('lin_id' => $id));

        return $query->result_array();

    }
    function get_historial($id){
        $query = $this->db->get_where('historialinea', array('his_id' => $id));

        return $query->result_array();

    }

    function upd_linea()
    {
        $data = array(
            "lin_pla_id" => $this->input->post("plan"),
            "lin_numero" => $this->input->post("numero"),
            "lin_corte" => $this->input->post("corte"),
            "lin_estado" => $this->input->post("estado"),
            "lin_minutosconsumidos" => $this->input->post("minutos"),
            "lin_pasaminutos" => $this->input->post("pasaminutos"),
        );

        $this->db->where("lin_id", $this->input->post("lin_id"));
        $this->db->update('linea', $data);
    }
    function upd_historial()
    {

        $data = array(
            "his_lin_id" => $this->input->post("linea"),
            "his_alq_id" => $this->input->post("alquiler"),
            "his_dat_id" => $this->input->post("datos"),
            "his_valor_minvend" => $this->input->post("vlorminvend"),
        );

        $this->db->where("his_id", $this->input->post("his_id"));
        $this->db->update('historialinea', $data);
    }


    function del_linea($id)
    {

        $this->db->where("lin_id", $id);
        $this->db->delete('linea');

    }

    function del_historial()
    {

        $this->db->where("his_id", $this->input->post("his_id"));
        $this->db->delete('historialinea');

    }



}