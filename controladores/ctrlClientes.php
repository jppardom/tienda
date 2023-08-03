<?php

use function PHPSTORM_META\map;

class ControladorClientes{
    //Función para recibir los datos para gurardar cliente
    public function crtlGuardarCliente(){
        
        if (isset($_POST['cedula']) &&
            isset($_POST['nombre']) &&
            isset($_POST['apellido']) &&   
            isset($_POST['direccion']) &&       
            isset($_POST['telefono']) &&       
            isset($_POST['correo'])){ 
                $tabla ="cliente";
                $data = array('cedula' => $_POST['cedula'],
                             'nombre' => $_POST['nombre'],    
                             'apellidos' => $_POST['apellido'],
                             'direccion' => $_POST['direccion'],
                             'telefono' => $_POST['telefono'],
                             'email' => $_POST['correo']);
                
                $res = ModeloCliente::mdlGuardarCliente($tabla, $data);
                if($res == 'ok'){
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title: "¡Datos de cliente guardados Correctamente...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon:"error",
                        title: "¡Datos de cliente no se puden ser guardados...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';

                }
            }
    }

    //Función para cargar datos del cliente
    public static function ctrlCargarClientes($parametro, $id){
        $tabla = "cliente";
        $datosCliente = ModeloCliente::mdlCargarCliente($tabla, $parametro, $id);
        return $datosCliente;
    }

    

    //Función par actualizar datos
    public static function ctrlActualizarCliente(){
        if (isset($_POST['modificar_cedula']) &&
        isset($_POST['modificar_nombre']) &&
        isset($_POST['modificar_apellido']) &&
        isset($_POST['modificar_direccion']) &&
        isset($_POST['modificar_telefono']) &&
        isset($_POST['modificar_correo'])){
            $tabla ="cliente";
            $data = array('cedula' => $_POST['modificar_cedula'],
                         'nombre' => $_POST['modificar_nombre'],
                         'apellidos' => $_POST['modificar_apellido'],
                         'direccion' => $_POST['modificar_direccion'],
                         'telefono' => $_POST['modificar_telefono'],
                         'email' => $_POST['modificar_correo'],
                         'id_cliente' => $_POST['id']);
            $res = ModeloCliente::mdlActualizarCliente($tabla, $data);
            if($res == 'ok'){
                echo '<script>
                Swal.fire({
                    icon:"success",
                    title: "¡Datos de cliente actualizados Correctamente...!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "cliente";
                    }
                })
              </script>';
            } else{
                echo '<script>
                Swal.fire({
                    icon:"error",
                    title: "¡Datos de cliente no se puden ser actualizados...!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "cliente";
                    }
                })
              </script>';
                                                     
            }
        }

    }

   public static function ctrlEliminarClientes($id) {
    
    $tabla = "cliente"; 
    $datosCliente = ModeloCliente::mdlEliminarCliente($tabla, $id);
    return $datosCliente;
   }
}

