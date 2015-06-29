<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function reporte_ordenes_pedido($fecha_inicio, $fecha_fin) {
        $sql = $this->db->query("select numero_orden, fecha from orden_pedido WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'");
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function reporte_ordenes_produccion($fecha_inicio, $fecha_fin) {
        $sql = $this->db->query("select numero_orden, fecha from orden_produccion WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'");
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function materiales_orden_pedido($numero) {
        $this->db->where('numero_orden', $numero);
        $sql = $this->db->get('materiales_orden_pedido');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function materiales_orden_produccion($numero) {
        $this->db->where('numero_orden', $numero);
        $sql = $this->db->get('materiales_orden_produccion');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function reporte_consumo_materia_prima($fecha_inicio, $fecha_fin) {
        $sql = $this->db->query("select nombre, cantidad from materia_prima_consumida WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'");
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function reporte_productos_terminados($fecha_inicio, $fecha_fin) {
        $sql = $this->db->query("select nombre, cantidad from productos_terminados WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'");
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

}
