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
    function get_estadocuentasxfecha($fecha,$cliente){
        $this->db->select('*');
        $this->db->from('estadocuenta_fecha');

        $this->db->join('estadocuenta', 'estadocuenta.estcue_id = estadocuenta_fecha.estcuefec_estcue_id');
        $this->db->join('alquiler', 'alquiler.alq_id = estadocuenta.estcue_alq_id');
        $this->db->join('cliente', 'cliente.cli_id = alquiler.alq_cli_id');
        $this->db->join('historialinea', 'historialinea.his_alq_id = alquiler.alq_id');
        $this->db->join('linea', 'linea.lin_id = historialinea.his_lin_id');

        $this->db->where('estcuefec_fecha', $fecha);
        $this->db->where('estcuefec_cli_id', $cliente);
        $query = $this->db->get();
        return $query->result_array();

    }
    function get_lista_estadocuentasxfecha(){
        $query = $this->db->get("estadocuenta_fecha");

        return $query->result_array();

    }
    function get_lista_informesdiarios(){
        $this->db->select('*');
        $this->db->from('operacion');
        $this->db->join('informediario', 'informediario.inf_ope_id = operacion.ope_id');
        $this->db->join('cliente', 'cliente.cli_id = operacion.ope_cli_id');
        $this->db->join('usuario', 'usuario.usu_id = operacion.ope_usu_id');

        $query = $this->db->get();
        return $query->result_array();

    }
    function get_lista_morosos(){
        $nopago="No pago";
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->join('alquiler', 'alquiler.alq_cli_id = cliente.cli_id');
        $this->db->join('estadocuenta', 'estadocuenta.estcue_alq_id = alquiler.alq_id');
        $this->db->join('historialinea', 'historialinea.his_alq_id = alquiler.alq_id');
        $this->db->where('his_pago',$nopago);
        $query = $this->db->get();
       return  $query->result_array();

    }
    function get_total_lineasxcorte($corte){
        $alquilada = "Alquilada";
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->where('lin_corte', $corte);
        $this->db->where('lin_estado', $alquilada);

        $query = $this->db->get();
        return $query->num_rows();

    }
    function get_lineasxcorte_discriminado($corte)
    {

        $alquilada = "Alquilada";
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->join('historialinea','historialinea.his_lin_id=linea.lin_id');
        $this->db->join('alquiler','alquiler.alq_id=historialinea.his_alq_id');
        $this->db->join('cliente','cliente.cli_id=alquiler.alq_cli_id');
        $this->db->where('lin_corte', $corte);
        $this->db->where('lin_estado', $alquilada);
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
    }
    function get_totallineasporcorte($corte)
    {
        $alquilada = "Alquilada";
        $this->db->where("lin_corte", $corte);
        $this->db->where("lin_estado", $alquilada);
        return $this->db->count_all_results('linea');
    }
    function get_totallineasporcortemys($corte)
    {
        $propietario="Mys";
        $alquilada = "Alquilada";
        $this->db->where("lin_corte", $corte);
        $this->db->where("lin_estado", $alquilada);
        $this->db->where("lin_propietario", $propietario);
        return $this->db->count_all_results('linea');
    }
    function get_totallineasporcortealejandro($corte)
    {
        $propietario="Alejandro";
        $alquilada = "Alquilada";
        $this->db->where("lin_corte", $corte);
        $this->db->where("lin_estado", $alquilada);
        $this->db->where("lin_propietario", $propietario);
        return $this->db->count_all_results('linea');
    }
    function get_sumasaldo_totales_hoy()
    {

        $fechahoy = date("d-m-Y");
        $this->db->select('sal_saldo');
        $this->db->from('saldos');
        $this->db->where('sal_fecha', $fechahoy);
        $query = $this->db->get();
        $result=$query->result_array();

        return $result;
    }



    function calcular_saldo()
    {
        $ayer=$this->get_sumasaldo_totales_ayer();
        $hoy=$this->get_sumasaldo_totales_hoy();

        $saldoactual=$ayer['saldo']+$hoy['entra']-$hoy['sale'];
        return $saldoactual;

    }
    function get_facturacion($corte)
    {
        $activo = "Activo";
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->join('alquiler','alquiler.alq_cli_id=cliente.cli_id');
        $this->db->join('historialinea','historialinea.his_alq_id=alquiler.alq_id');
        $this->db->join('linea','linea.lin_id=historialinea.his_lin_id');
        $this->db->join('datos','datos.dat_id=historialinea.his_dat_id');
        $this->db->join('plan','plan.pla_id=linea.lin_pla_id');
        $this->db->join('control_adicional','control_adicional.con_lin_id=linea.lin_id');
        $this->db->where('his_estado', $activo);
        $this->db->where('lin_corte', $corte);
        $query = $this->db->get();
        $result=$query->result_array();
        $final = array();
        $i = 0;
        $tmp = array();
        foreach($result as $key){

                $final[] = $key['cli_id'];

        }
        $final = array_unique($final);

        foreach($final as $f){
            $i=0;
            foreach($result as $key){

                if ($f == $key['cli_id']){
                    $tmp[$f][$i] = $key;
                }
                $i++;

            }
        }        return $tmp;
    }
}