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

}

if (isset($_POST['idClientes'])){
    $objAjaxClientes = new ajaxClientes();
    $objAjaxClientes->idClientes = $_POST['idClientes'];
    if($_POST['edit'] == 'edit'){
        $objAjaxClientes->cargarDatos();
    }else{
        #$objAjaxClientes->eliminarDatos();
    }
    
}