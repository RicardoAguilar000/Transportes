$(document).ready(function() {
    $("#botonCrear").click(function() {
        $("#formulario")[0].reset();
        $(".modal-title").text("Registrar Remolque");
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
            url: "modelo/obtener_registrosR.php",
            type: "POST"
        },
        "columnDefs": [{
            targets: [1, 2, 3, 4, 5, 6, 7], //last column
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
        var marca = $('#marca').val();
        var modelo = $('#modelo').val();
        var color = $('#color').val();
        var tamano = $('#tamano').val();
        var imagen = document.getElementById("imagen_remolque").value;

        function borrarMensajesError() {
            document.getElementById("marca_error").textContent = "";
            document.getElementById("modelo_error").textContent = "";
            document.getElementById("color_error").textContent = "";
            document.getElementById("tamano_error").textContent = "";
            document.getElementById("imagen_remolque_error").textContent = "";
          }
        
          var isValid = true;


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

 
    // Validar tamaño
    if (tamano === "") {
      event.preventDefault();
      isValid = false;
      document.getElementById("tamano_error").textContent = "El tamaño es obligatorio.";
  } else if (!tamano.match(/^\d+(?:\.\d{1,2})?\s*ft$/)) {
      event.preventDefault();
      isValid = false;
      document.getElementById("tamano_error").textContent = "El tamaño debe tener el formato '48 ft (Pies)'.";
  } else {
      document.getElementById("tamano_error").textContent = "";
  }
          document.getElementById("marca").addEventListener("input", borrarMensajesError);
          document.getElementById("modelo").addEventListener("input", borrarMensajesError);
          document.getElementById("color").addEventListener("input", borrarMensajesError);
          document.getElementById("tamano").addEventListener("input", borrarMensajesError);
          document.getElementById("imagen_remolque").addEventListener("input", borrarMensajesError);


          if (isValid) {

        $.ajax({
            url: "modelo/crearR.php",
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
        var id_remolque = $(this).attr("id");
        $.ajax({
            url: "modelo/obtener_registroR.php",
            method: "POST",
            data: {
                id_remolque: id_remolque
            },
            dataType: "json",
            success: function(data) {
                $('#modalUsuario').modal('show');
                $('.modal-title').text("Editar Remolque");
                $('#marca').val(data.marca);
                $('#modelo').val(data.modelo);
                $('#color').val(data.color);
                $('#tamano').val(data.tamano);
                $('#id_remolque').val(id_remolque);
                $('#imagen_subida').html(data.imagen_remolque);
                $('#action').val("Editar");
                $('#operacion').val("Editar");

                var regex = /^[A-Za-z\s]+/g;

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
                  } else if (!regex.test(color)) {
                    $('#color_error').text("El campo color solo debe contener letras.");
                  } else {
                    $('#color_error').text("");
                  }
                });
                $('#tamano').on('input', function () {
                  var tamano = $(this).val().trim();
                  if (tamano === "") {
                    $('#tamano_error').text("El tamaño marca es requerido.");
                  } else if (!tamano.match(/^\d+(?:\.\d{1,2})?\s*ft$/)) {
                    document.getElementById("tamano_error").textContent = "El tamaño debe tener el formato '48 ft (Pies)'.";
                  } else {
                    $('#tamano_error').text("");
                  }
                });      
                
            }
        });
    });

    //Aquí código eliminación
    $(document).on('click', '.borrar', function() {
        var id_remolque = $(this).attr("id");
        if (confirm("¿Estás seguro de que deseas eliminar este remolque?" + id_remolque)) {
            $.ajax({
                url: "modelo/borrar.php",
                method: "POST",
                data: {
                    id_remolque: id_remolque
                },
                success: function(data) {
                    alert(data);
                    dataTable.ajax.reload();
                }
            });
        }
    });
});

    