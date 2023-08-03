<?php
require_once "../controladores/ctrlClientes.php";
require_once "../modelos/mdlClientes.php";

class ajaxClientes{
    public $idClientes;

    public function cargarDatos(){
        $parametro = "cliente";
        $id = $this->idClientes;
        $datos = ControladorClientes::ctrlCargarClientes($parametro,$id);
        echo json_encode($datos);
    }
    public function eliminarDatos(){
        $parametro = "cliente";
        $id = $this->idClientes;
        $datos = ControladorClientes::ctrlEliminarClientes($id);
        echo json_encode($datos);
    }
    
}

if (isset($_POST['idClientes'])){
    $objAjaxClientes = new ajaxClientes();
    $objAjaxClientes->idClientes = $_POST['idClientes'];
    if(!empty($_POST['edit']) &&  $_POST['edit']=='edit'){
        $objAjaxClientes->cargarDatos();
    }else{
        $objAjaxClientes->eliminarDatos();
    }
    
}