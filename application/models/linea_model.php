<?php

class linea_model extends CI_Model{


    function get_lista_lineas(){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');

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
    function get_lista_lineas_alquiladas(){
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $this->db->where('lin_estado',"Alquilada");
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
        (cliente.cli_id=alq_cli_id AND historialinea.his_alq_id=alq_id AND historialinea.his_lin_id = linea.lin_id AND plan.pla_id=linea.lin_pla_id AND historialinea.his_dat_id=datos.dat_id) AND historialinea.his_estado='Activo'";
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

    }  function guardar_programarentregasim(){

    $data = array(
        "dev_cli_id" => $this->input->post("cliente"),
        "dev_lin_id" => $this->input->post("linea"),
        "dev_fecha" => $this->input->post("fecha"),
        "dev_usu_id" => $this->input->post("usuario"),

    );

    $this->db->insert("devolucion_linea", $data);

}

    function guardar_devolucion_linea()
    {
        if($this->input->post("pago")=='on')
        {

            $lin_id = $this->input->post("linea");
            $sql = "SELECT estcue_id, estcue_debe, estcue_alq_id, his_cargobasico, his_lin_id, his_estado
            FROM (estadocuenta) JOIN historialinea ON historialinea.his_alq_id = estadocuenta.estcue_alq_id
            WHERE his_lin_id = $lin_id AND his_estado = 'Activo'";
            $query = $this->db->query($sql);
            $data = $query->result_array();

            $data1 = array(
                "estcue_debe" => $data[0]['estcue_debe']-$data[0]['his_cargobasico']+($this->input->post("minconsumidos")*$this->input->post("valormin"))

            );
            $this->db->select('*');
            $this->db->from('estadocuenta');
            $this->db->where('estcue_id', $data[0]['estcue_id']);
            $this->db->update("estadocuenta", $data1);
            $cliente=$this->obtenercliente($data[0]['estcue_id']);
            $fecha=date("d-m-Y");
            $data1 = array(
                "estcuefec_estcue_id" =>   $data[0]['estcue_id'],
                "estcuefec_estcue_debe" => $data[0]['estcue_debe']-$data[0]['his_cargobasico']+($this->input->post("minconsumidos")*$this->input->post("valormin")),
                "estcuefec_estcue_abono" => 0,
                "estcuefec_estcue_saldo" => 0,
                "estcuefec_fecha" => $fecha,
                "estcuefec_cli_id" => $cliente
            );
            $this->db->insert("estadocuenta_fecha", $data1);
            $data2 = array(
                "his_fechafin" => $this->input->post("fechafin"),
                "his_estado"=> "Inactivo",
                "his_pago" => "Pago"

            );
            $this->db->select('*');
            $this->db->from('historialinea');
            $this->db->join('linea', 'linea.lin_id = historialinea.his_lin_id');
            $this->db->where('his_lin_id', $this->input->post("linea"));
            $this->db->update("historialinea", $data2);

            $data3 = array(
                "lin_estado"=>"Disponible",
                "lin_minutosconsumidos"=>$this->input->post("minconsumidos"),
                "lin_pasaminutos"=>$this->input->post("pasaminutos"),
            );
            $this->db->select('*');
            $this->db->from('linea');
            $this->db->where('lin_id', $this->input->post("linea"));
            $this->db->update("linea", $data3);

        }
        else{

            $lin_id = $this->input->post("linea");
            $sql = "SELECT estcue_id, estcue_debe, estcue_alq_id, his_cargobasico, his_lin_id, his_estado
        FROM (estadocuenta) JOIN historialinea ON historialinea.his_alq_id = estadocuenta.estcue_alq_id
        WHERE his_lin_id = $lin_id AND his_estado = 'Activo'";
            $query = $this->db->query($sql);
            $data = $query->result_array();

            $data2 = array(
                "his_fechafin" => $this->input->post("fechafin"),
                "his_estado"=> "Inactivo",
                "his_pago" => "No pago"

            );
            $this->db->select('*');
            $this->db->from('historialinea');
            $this->db->join('linea', 'linea.lin_id = historialinea.his_lin_id');
            $this->db->where('his_lin_id', $this->input->post("linea"));
            $this->db->update("historialinea", $data2);

            $data3 = array(
                "lin_estado"=>"Disponible",
                "lin_minutosconsumidos"=>$this->input->post("minconsumidos"),
                "lin_pasaminutos"=>$this->input->post("pasaminutos"),
            );
            $this->db->select('*');
            $this->db->from('linea');
            $this->db->where('lin_id', $this->input->post("linea"));
            $this->db->update("linea", $data3);
        }

    }
    function obtenercliente($estadocuenta)
    {
        $this->db->select('cli_id');
        $this->db->from('cliente');
        $this->db->join('alquiler','alquiler.alq_cli_id=cliente.cli_id');
        $this->db->join('estadocuenta','estadocuenta.estcue_alq_id=alquiler.alq_id');
        $this->db->where('estcue_id',$estadocuenta);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['cli_id'];
    }
    function obtenercargobasico($linea)
    {
        $this->db->select('his_cargobasico');
        $this->db->from('historialinea');
        $this->db->where('his_lin_id',$linea);
        $query3 = $this->db->get();
        $result = $query3->result_array();
        return $result[0]['his_cargobasico'];
    }
    function obteneridestcue($alquiler)
    {
        $this->db->select('estcue_id');
        $this->db->from('estadocuenta');
        $this->db->where('estcue_alq_id', $alquiler);
        $query2 = $this->db->get();
        $result = $query2->result_array();
        return $result[0]['estcue_id'];

    }
    function obteneridalquiler($linea)
    {
        $this->db->select('his_alq_id');
        $this->db->from('historialinea');
        $this->db->where('his_lin_id', $linea);
        $query1 = $this->db->get();
        $result = $query1->result_array();
        return $result[0]['his_alq_id'];
    }


    function guardar_historial(){
        $totalmin=$this->obtener_totalmin($this->input->post("linea"));
        $data = array(
            "his_lin_id" => $this->input->post("linea"),
            "his_alq_id" => $this->input->post("alquiler"),
            "his_dat_id" => $this->input->post("datos"),
            "his_valor_minvend" => $this->input->post("vlorminvend"),
            "his_fechainicio" => $this->input->post("fechainicio"),
            "his_estado" => $this->input->post("estado"),
            "his_cargobasico" => $this->input->post("vlorminvend") * $totalmin,

        );

        $this->db->insert("historialinea", $data);
        $dato= array(
            "lin_estado" => "Alquilada"
        );
        $this->db->where("lin_id", $this->input->post("linea"));
        $this->db->update('linea', $dato);

        $this->guardar_estado_cuenta($this->input->post("linea"),$this->input->post("alquiler"));


    }

    function obtener_totalmin($linea)
    {
        $this->db->select('pla_totalmin');
        $this->db->from('plan');
        $this->db->join('linea', 'linea.lin_pla_id = plan.pla_id');
        $this->db->where('pla_id', $linea);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['pla_totalmin'];
    }

    function guardar_estado_cuenta($numero,$alquiler)
    {

        $this->db->select('lin_pla_id, pla_totalmin');
        $this->db->from('linea');
        $this->db->join('plan', 'plan.pla_id = linea.lin_pla_id');
        $this->db->where('lin_id', $numero);
        $query = $this->db->get();
        $result = $query->result_array();


        $verificacion = $this->verificar_estado_cuenta($alquiler);

        $valordatos = ($this->obtener_preciodatos($numero));


        if($verificacion == 0)
        {

            $debe = ($this->input->post("vlorminvend") * $result[0]['pla_totalmin']) + $valordatos;
            $data = array(
                "estcue_alq_id" => $this->input->post("alquiler"),
                "estcue_debe" => $debe,
                "estcue_abono" => 0,
                "estcue_saldo" => 0,
                "estcue_estado" => "Activo"
            );

            $this->db->insert("estadocuenta", $data);
            $valorestadocuenta=$this->obtener_estadocuenta($alquiler);
            $cliente=$this->obtenercliente($valorestadocuenta);
            $fecha=date("d-m-Y");
            $data1 = array(
                "estcuefec_estcue_id" =>  $valorestadocuenta,
                "estcuefec_cli_id" => $cliente,
                "estcuefec_estcue_debe" => $debe,
                "estcuefec_estcue_abono" => 0,
                "estcuefec_estcue_saldo" => 0,
                "estcuefec_fecha" => $fecha,

            );
            $this->db->insert("estadocuenta_fecha", $data1);
        }
        else
        {

            $debe = $this->get_debe_estado_cuenta($alquiler)+($this->input->post("vlorminvend") * $result[0]['pla_totalmin'])+ $valordatos;
            $debe1 = ($this->input->post("vlorminvend") * $result[0]['pla_totalmin']) + $valordatos;
            $data = array(
                "estcue_debe" => $debe,

            );
            $this->db->where('estcue_alq_id', $alquiler);
            $this->db->update('estadocuenta', $data);

            $valorestadocuenta=$this->obtener_estadocuenta($alquiler);
            $cliente=$this->obtenercliente($valorestadocuenta);
            $fecha=date("d-m-Y");
            $data1 = array(
                "estcuefec_estcue_id" =>  $valorestadocuenta,
                "estcuefec_estcue_debe" => $debe1,
                "estcuefec_estcue_abono" => "",
                "estcuefec_estcue_saldo" => 0,
                "estcuefec_fecha" => $fecha,
                "estcuefec_cli_id" => $cliente,
            );
            $this->db->insert("estadocuenta_fecha", $data1);

        }
        $data2=array(
            "his_cargobasico"=>($this->input->post("vlorminvend") * $result[0]['pla_totalmin']) + $valordatos
        );
        $this->db->where('his_lin_id', $numero);
        $this->db->update('historialinea', $data2);

    }

    function obtener_estadocuenta($alquiler)
    {
        $this->db->select('estcue_id');
        $this->db->from('estadocuenta');
        $this->db->join('alquiler','alquiler.alq_id=estadocuenta.estcue_alq_id');
        $this->db->where('alq_id',$alquiler);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['estcue_id'];

    }
    function obtener_preciodatos($numero)
    {
        $this->db->select('dat_precio');
        $this->db->from('datos');
        $this->db->join('historialinea','historialinea.his_dat_id=datos.dat_id');
        $this->db->join('linea','linea.lin_id=historialinea.his_lin_id');
        $this->db->where('his_lin_id',$numero);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['dat_precio'];

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
        //  $this->db->from('estadocuenta')->where('estcue_alq_id', $this->$id_alquiler);
        //  return $this->db->count_all_results();
        //$sql = "SELECT * FROM estadocuenta WHERE estcue_alq_id=$id_alquiler";
        $this->db->where("estcue_alq_id", $id_alquiler);
        return $this->db->count_all_results('estadocuenta');

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
            // "his_cargobasico" => $this->input->post("cargobasico"),



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