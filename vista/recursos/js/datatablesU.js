$(document).ready(function() {
    $("#botonCrear").click(function() {
        $("#formulario")[0].reset();
        $(".modal-title").text("Registrar una unidad");
        $("#action").val("Crear");
        $("#operacion").val("Crear");
        $("#imagen_subida").html("");
    });

    var dataTable = $('#datos_usuario').DataTable({
        fixedHeader: true,
        responsive: true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "modelo/obtener_registrosU.php",
            type: "POST"
        },
        "columnDefs": [{
            targets: [1, 2, 3, 4,5], //last column
            "orderable": false
        }],
        language: {
            processing: "Cargando",
            search: "Buscar&nbsp;:",
            lengthMenu: "Agrupar de _MENU_ datos",
            info: "Mostrando del registro _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "No existen datos.",
            infoFiltered: "(filtrado de _MAX_ elementos en total)",
            infoPostFix: "",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron datos con tu busqueda",
            emptyTable: "No hay datos disponibles en la tabla.",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Ultimo"
            }
        }
    });

    //Aquí código inserción
    $(document).on('submit', '#formulario', function(event) {
        event.preventDefault();
        var id_remolque = $('#id_remolque').val();
        var marca = $('#marca').val();
        var modelo = $('#modelo').val();
        var color = $('#color').val();
        var descripcion = $('#descripcion').val();
        var imagen = $('#imagen_unidad').val().split('.').pop().toLowerCase();

        function borrarMensajesError() {
            document.getElementById("id_remolque_error").textContent = "";
            document.getElementById("marca_error").textContent = "";
            document.getElementById("modelo_error").textContent = "";
            document.getElementById("color_error").textContent = "";
            document.getElementById("descripcion_error").textContent = "";
          }   
          var isValid = true;

          if (id_remolque === "") {
           event.preventDefault();
           isValid = false;
           document.getElementById("id_remolque_error").textContent = "Por favor, selecciona un Remolque.";
          }
          
          if (marca === "") {
            event.preventDefault();
            isValid = false;
            document.getElementById("marca_error").textContent = "El marca es obligatorio.";
          } else if (!marca.match(/^[A-Za-z ]+$/)) {
            event.preventDefault();
            isValid = false;
            document.getElementById("marca_error").textContent = "El campo marca solo debe contener letras.";
          }

              // Validar modelo
              if (modelo === "") {
                event.preventDefault();
                isValid = false;
                document.getElementById("modelo_error").textContent = "La modelo es obligatoria.";
              } else if (isNaN(modelo)) {
                event.preventDefault();
                isValid = false;
                document.getElementById("modelo_error").textContent = "El campo modelo solo acepta numeros.";
              } else if (modelo.length >4 || modelo.length <4) {
                event.preventDefault();
                isValid = false;
                document.getElementById("modelo_error").textContent = "La modelo debe contener 4 numeros.";
              }
          
                  // Validar color
                  if (color === "") {
                    event.preventDefault();
                    isValid = false;
                    document.getElementById("color_error").textContent = "El color es obligatorio.";
                  } else if (!color.match(/^[A-Za-z ]+$/)) {
                    event.preventDefault();
                    isValid = false;
                    document.getElementById("color_error").textContent = "El campo color solo debe contener letras.";
                  }

                      // Validar descripcion
    if (descripcion === "") {
      event.preventDefault();
      isValid = false;
      document.getElementById("descripcion_error").textContent = "El descripcion es obligatorio.";
    } else if (!descripcion.match(/^[A-Za-z ]+$/)) {
      event.preventDefault();
      isValid = false;
      document.getElementById("descripcion_error").textContent = "El descripcion solo debe contener letras.";
    }


          document.getElementById("id_remolque").addEventListener("change", borrarMensajesError);
          document.getElementById("marca_error").addEventListener("input", borrarMensajesError);
          document.getElementById("modelo").addEventListener("input", borrarMensajesError);
          document.getElementById("color").addEventListener("input", borrarMensajesError);
          document.getElementById("descripcion").addEventListener("input", borrarMensajesError);


          if (isValid) {

        $.ajax({
            url: "modelo/crearU.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                $('#formulario')[0].reset();
                $('#modalUsuario').modal('hide');
                dataTable.ajax.reload();
            }
        });
    }
    });

    //Aquí código edición
    $(document).on('click', '.editar', function() {
        var id_unidad = $(this).attr("id");
        $.ajax({
            url: "modelo/obtener_registroU.php",
            method: "POST",
            data: {
                id_unidad: id_unidad
            },
            dataType: "json",
            success: function(data) {
                $('#modalUsuario').modal('show');
                $('.modal-title').text("Editar Unidad");
                $('#id_remolque').val(data.id_remolque);
                $('#marca').val(data.marca);
                $('#modelo').val(data.modelo);
                $('#color').val(data.color);
                $('#descripcion').val(data.descripcion);
                $('#id_unidad').val(id_unidad);
                $('#imagen_subida').html(data.imagen_unidad);
                $('#action').val("Editar");
                $('#operacion').val("Editar");

                var regex = /^[A-Za-z\s]+$/;

               
              $('#id_remolque').on('change', function () {
                var id_remolque = $(this).val();
                if (id_remolque === "") {
                  $('#id_remolque_error').text("Por favor, selecciona un Remolque.");
                } else {
                  $('#id_remolque_error').text("");
                }
              });


            $('#marca').on('input', function () {
              var marca = $(this).val().trim();
              if (marca === "") {
                $('#marca_error').text("El campo marca es requerido.");
              } else if (!regex.test(marca)) {
                $('#marca_error').text("El campo marca solo debe contener letras.");
              } else {
                $('#marca_error').text("");
              }
            });
            $('#modelo').on('input', function () {
              var modelo = $(this).val().trim();
              if (modelo === "") {
                $('#modelo_error').text("El campo modelo es requerido.");
              } else if (isNaN(modelo)) {
                $('#modelo_error').text("El campo modelo solo acepta numeros.");
              } else if (modelo.length >4 || modelo.length <4) {
                $('#modelo_error').text("La modelo debe contener 4 numeros.");
              }  else {
                $('#modelo_error').text("");
              }
            });
            $('#color').on('input', function () {
              var color = $(this).val().trim();
              if (color === "") {
                $('#color_error').text("El campo color es requerido.");
              } else if (!regex.test(marca)) {
                $('#color_error').text("El campo color solo debe contener letras.");
              } else {
                $('#color_error').text("");
              }
            });
            $('#descripcion').on('input', function () {
              var descripcion = $(this).val().trim();
              if (descripcion === "") {
                $('#descripcion_error').text("El campo descripción es requerido.");
              } else if (!regex.test(marca)) {
                $('#descripcion_error').text("El campo descripción solo debe contener letras.");
              } else {
                $('#descripcion_error').text("");
              }
            });
        },
        });
    });

    //Aquí código eliminación
    $(document).on('click', '.borrar', function() {
        var id_unidad = $(this).attr("id");
        if (confirm("¿Estás seguro de que deseas eliminar esta unidad?" + id_unidad)) {
            $.ajax({
                url: "modelo/borrar.php",
                method: "POST",
                data: {
                    id_unidad: id_unidad
                },
                success: function(data) {
                    alert(data);
                    dataTable.ajax.reload();
                }
            });
        }
    });
});

    
  