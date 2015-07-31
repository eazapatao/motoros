<?php

class Detallebanco_model extends CI_Model{


    function get_lista_detallebanco(){
        $this->db->select('*');
        $this->db->from('detalle_banco');
        $this->db->join('cliente', 'cliente.cli_id = detalle_banco.detban_cli_id');
        $this->db->join('banco', 'banco.ban_id = detalle_banco.detban_ban_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    function get_lista_banco(){
        $query = $this->db->get("banco");

        return $query->result_array();

    }

    function get_info_banco($id){
        $this->db->select('*');
        $this->db->from('detalle_banco');
        $this->db->where('detban_id', $id);
        $this->db->join('banco', 'banco.ban_id = detalle_banco.detban_ban_id');
        $query = $this->db->get();
        return $query->result_array();

    }

    function guardar_detallebanco(){

        $data = array(

            "detban_ban_id" => $this->input->post("banco"),
            "detban_cli_id" => $this->input->post("cliente"),
            "detban_fecha" => $this->input->post("fecha"),
            "detban_transaccion" => $this->input->post("transaccion"),
            "detban_corte" => $this->input->post("corte"),
            "detban_valor" => $this->input->post("valor"),
            "detban_detalle" => $this->input->post("detalle"),

        );

        $this->db->insert("detalle_banco", $data);
        $this->guardar_estadocuenta($this->input->post("cliente"),$this->input->post("transaccion"),$this->input->post("valor"));

    }
    function guardar_estadocuenta($cliente,$transaccion,$valor)
    {
        $this->db->select('estcue_saldo,alq_id,alq_cli_id');
        $this->db->from('estadocuenta');
        $this->db->join('alquiler', 'alquiler.alq_id = estadocuenta.estcue_alq_id');
        $this->db->where('alq_cli_id', $cliente);
        $query = $this->db->get();
        $saldo = $query->result_array();

     if($transaccion=="Ingreso")
     {
         $data = array(
            "estcue_saldo" => $saldo[0]['estcue_saldo']-$valor
         );
         $this->db->update("estadocuenta",$data);
         $this->db->where('estcue_cli_id',$cliente);


     }
        else{
            $data = array(
                "estcue_saldo" => $saldo[0]['estcue_saldo']+$valor
            );
            $this->db->update("estadocuenta",$data);
            $this->db->where('estcue_cli_id',$cliente);
        }

    }

    function get_detallebanco($id){
        $query = $this->db->get_where('detalle_banco', array('detban_id' => $id));

        return $query->result_array();

    }

    function upd_detallebanco()
    {
        $data = array(
            "detban_ban_id" => $this->input->post("banco"),
            "detban_cli_id" => $this->input->post("cliente"),
            "detban_fecha" => $this->input->post("fecha"),
            "detban_transaccion" => $this->input->post("transaccion"),
            "detban_valor" => $this->input->post("valor"),
            "detban_detalle" => $this->input->post("detalle"),
        );

        $this->db->where("detban_id", $this->input->post("detban_id"));
        $this->db->update('detalle_banco', $data);

    }

    function del_detallebanco($id)
    {

        $this->db->where("detban_id", $id);
        $this->db->delete('detalle_banco');

    }

    function get_totales_bancolombia()
    {
        $query = "SELECT sum(detban_valor) as total_deben FROM detalle_banco WHERE detban_transaccion = 'Haber' AND detban_ban_id='1'";
        $result = $this->db->query($query);

        $deben =  $result->result_array();

        $deben = $deben[0]['total_deben'];


        $query = "SELECT sum(detban_valor) as total_haber FROM detalle_banco WHERE detban_transaccion = 'Debe' AND detban_ban_id='1'";
        $result = $this->db->query($query);

        $haber =  $result->result_array();

        $haber = $haber[0]['total_haber'];

        $total = array (
          "debeb" => $deben,
            "haberb" => $haber,
            "deferenciab" => $deben - $haber
        );

        return $total;
    }
    function get_totales_davivienda()
    {
        $query = "SELECT sum(detban_valor) as total_deben FROM detalle_banco WHERE detban_transaccion = 'Haber' AND detban_ban_id='2'";
        $result = $this->db->query($query);

        $deben =  $result->result_array();

        $deben = $deben[0]['total_deben'];


        $query = "SELECT sum(detban_valor) as total_haber FROM detalle_banco WHERE detban_transaccion = 'Debe' AND detban_ban_id='2'";
        $result = $this->db->query($query);

        $haber =  $result->result_array();

        $haber = $haber[0]['total_haber'];

        $total = array (
            "debed" => $deben,
            "haberd" => $haber,
            "deferenciad" => $deben - $haber
        );

        return $total;
    }

}