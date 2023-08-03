$(".btnCargarDatos").click(function () {
    let idClientes = $(this).attr("idClientes");
    let datos = new FormData();
    datos.append("idClientes", idClientes);
    datos.append("edit", "edit");

    $.ajax({
        url: "ajax/ajaxClientes.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $('#modificar_cedula').val(respuesta['cedula'])
            $('#modificar_nombre').val(respuesta['nombre'])
            $('#modificar_apellido').val(respuesta['apellidos'])
            $('#modificar_direccion').val(respuesta['direccion'])
            $('#modificar_telefono').val(respuesta['telefono'])
            $('#modificar_correo').val(respuesta['email'])
            $('#id').val(respuesta['id_cliente'])
        }
    });

})

$(".btnEliminarDatos").click(function (){
    let idClientes = $(this).attr("idClientes");
    console.log(idClientes)
    let datos = new FormData();
    datos.append("idClientes", idClientes);
    // datos.append("edit", "edit");
    datos.append("delete", "delete");
    Swal.fire({
        title: '¿Está seguro que desea eliminar los datos de persona?',
        text: "No podrá recuperar los datos!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminalo!',
        cancelButtonText: 'Cancelar',
    }).then((respuesta) => {
        if (respuesta.value) {
            $.ajax({
                url: "ajax/ajaxClientes.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                     $('#id').val(respuesta['id_cliente'])
                     if (respuesta == 1){
                        Swal.fire({
                            icon: 'success',
                            title: 'Elimando',
                            text: 'Datos Eliminados conexito!',
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "cliente";
                            }
                        })
                     }
                     else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo eliminar los datos!',
                        })

                   }
                }
            });
        }
    })
})



