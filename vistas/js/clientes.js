$(".btnCargarDatos").click(function(){
    var idClientes = $(this).attr("idClientes");
    var datos  = new FormData();
    datos.append("idClientes", idClientes);
    datos.append("edit", "edit");

    $.ajax({
        url: "ajax/ajaxClientes.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            $('#modificar_cedula').val(respuesta['cedula'])
            $('#modificar_nombre').val(respuesta['nombre'])
            $('#modificar_apellido').val(respuesta['apellidos'])
            $('#modificar_direccion').val(respuesta['direccion'])
            $('#modificar_telefono').val(respuesta['telefono'])
            $('#modificar_correo').val(respuesta['email'])
        }
    });

})