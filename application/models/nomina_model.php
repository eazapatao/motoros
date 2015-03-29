<?php

class Nomina_model extends CI_Model{


    function get_lista_nomina(){
        $this->db->select('*');
        $this->db->from('nomina');
        $this->db->join('usuario', 'usuario.usu_id = nomina.nomquin_usu_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_lista_prestamo(){
        $this->db->select('*');
        $this->db->from('prestamo_empleado');
        $this->db->join('usuario', 'usuario.usu_id = prestamo_empleado.emppre_usu_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    function get_info_nomina($id){
        $this->db->select('*');
        $this->db->from('nomina');
        $this->db->where('nomquin_id', $id);
        $this->db->join('usuario', 'usuario.usu_id = nomina.nomquin_usu_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    function get_info_prestamo($id){
        $this->db->select('*');
        $this->db->from('prestamo_empleado');
        $this->db->where('emppre_id', $id);
        $this->db->join('usuario', 'usuario.usu_id = prestamo_empleado.emppre_usu_id');
        $query = $this->db->get();
        return $query->result_array();

    }
function calcularnomina()
{

        $nomina = intval($this->input->post("nomina"));
        $diaslaborados = intval($this->input->post("diaslaborados"));
        $descuentos = intval($this->input->post("descuentos"));
        $descuadres = intval($this->input->post("descuadres"));
        $liquidacion = intval($this->input->post("liquidacion"));
        $total = (($nomina * $diaslaborados) - ($descuentos + $descuadres) + $liquidacion);

    return $total;


        }


    function calcular()
    {

        $a = intval($this->input->post("50"));
        $b = intval($this->input->post("100"));
        $c = intval($this->input->post("500"));
        $d = intval($this->input->post("1000"));
        $e = intval($this->input->post("2000"));
        $f = intval($this->input->post("5000"));
        $g = intval($this->input->post("10000"));
        $h = intval($this->input->post("20000"));
        $i = intval($this->input->post("50000"));
        $total = (($a * 50) + ($b * 100) + ($c * 500) + ($d * 1000) + ($e * 2000) + ($f * 5000) + ($g * 10000) + ($h * 20000) + ($i * 50000));

        echo "<script language='javascript'>";
        echo "alert('$total')";
        echo "</script>";
        return $total;


    }


        function guardar_nomina(){
        $nomina=$this->calcularnomina();
        $data = array(

        "nomquin_usu_id" => $this->input->post("usuario"),
        "nomquin_nomina" => $this->input->post("nomina"),
        "nomquin_diaslaborados" => $this->input->post("diaslaborados"),
        "nomquin_descuentos" => $this->input->post("descuentos"),
        "nomquin_descuadres" => $this->input->post("descuadres"),
        "nomquin_liquidacion" => $this->input->post("liquidacion"),
        "nomquin_novedades" => $this->input->post("novedades"),
        "nomquin_fechainicio" => $this->input->post("fechainicio"),
        "nomquin_fechafin" => $this->input->post("fechafin"),
        "nomquin_total" => $nomina
        );

        $this->db->insert("nomina", $data);
        }

    function guardar_prestamo(){
        $data = array(

            "emppre_usu_id" => $this->input->post("usuario"),
            "emppre_fecha" => $this->input->post("fecha"),
            "emppre_valor" => $this->input->post("valor"),
            "emppre_cuotas" => $this->input->post("cuotas")

        );

        $this->db->insert("prestamo_empleado", $data);
    }

    function get_nomina($id){
        $query = $this->db->get_where('nomina', array('nomquin_id' => $id));

        return $query->result_array();

    }

    function get_prestamo($id){
        $query = $this->db->get_where('prestamo_empleado', array('emppre_id' => $id));

        return $query->result_array();

    }

    function upd_nomina()
    {
        $nomina=$this->calcularnomina();
        $data = array(
            "nomquin_usu_id" => $this->input->post("usuario"),
            "nomquin_nomina" => $this->input->post("nomina"),
            "nomquin_diaslaborados" => $this->input->post("diaslaborados"),
            "nomquin_descuentos" => $this->input->post("descuentos"),
            "nomquin_descuadres" => $this->input->post("descuadres"),
            "nomquin_liquidacion" => $this->input->post("liquidacion"),
            "nomquin_novedades" => $this->input->post("novedades"),
            "nomquin_fechainicio" => $this->input->post("fechainicio"),
            "nomquin_fechafin" => $this->input->post("fechafin"),
            "nomquin_total" => $nomina
        );

        $this->db->where("nomquin_id", $this->input->post("nomquin_id"));
        $this->db->update('nomina', $data);

    }

    function del_nomina($id)
    {

        $this->db->where("nomquin_id", $id);
        $this->db->delete('nomina');

    }
    function upd_prestamo()
    {
        $data = array(
            "emppre_usu_id" => $this->input->post("usuario"),
            "emppre_fecha" => $this->input->post("fecha"),
            "emppre_valor" => $this->input->post("valor"),
            "emppre_cuotas" => $this->input->post("cuotas")
        );

        $this->db->where("emppre_id", $this->input->post("emppre_id"));
        $this->db->update('prestamo_empleado', $data);

    }

    function del_prestamo($id)
    {

        $this->db->where("emppre_id", $id);
        $this->db->delete('prestamo_empleado');

    }

}