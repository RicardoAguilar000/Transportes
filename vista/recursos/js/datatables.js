$(document).ready(function () {
    $("#botonCrear").click(function () {
      $("#formulario")[0].reset();
      $(".modal-title").text("Crear Conductor");
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
        url: "modelo/obtener_registros.php",
        type: "POST"
      },
      "columnDefs": [{
        targets: [1, 2, 3, 4, 5, 6, 7],
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
  
  
    /** Insertar*/
    $(document).on('submit', '#formulario', function (event) {
      event.preventDefault();
  
      var id_Unidad = $('#id_Unidad').val().trim();
      var nombre = $('#nombre').val().trim();
      var edad = document.getElementById("edad").value;
      var experiencia = $('#experiencia').val();
      var numeroLicencia = $('#numeroLicencia').val();
      var estatus = $('#estatus').val();
      var imagen = document.getElementById("imagen_conductor").value;
  
  
  
      function borrarMensajesError() {
        document.getElementById("id_Unidad_error").textContent = "";
        document.getElementById("nombre_error").textContent = "";
        document.getElementById("edad_error").textContent = "";
        document.getElementById("experiencia_error").textContent = "";
        document.getElementById("numeroLicencia_error").textContent = "";
        document.getElementById("estatus_error").textContent = "";
        document.getElementById("imagen_error").textContent = "";
      }
  
      var isValid = true;

      if (id_Unidad === "") {
       event.preventDefault();
       isValid = false;
       document.getElementById("id_Unidad_error").textContent = "Por favor, selecciona una unidad.";
     }
   
   
     if (estatus === "") {
       event.preventDefault();
       isValid = false;
       document.getElementById("estatus_error").textContent = "Por favor, selecciona un estatus.";
     }
   
     // Validar nombre
     if (nombre === "") {
       event.preventDefault();
       isValid = false;
       document.getElementById("nombre_error").textContent = "El nombre es obligatorio.";
     } else if (!nombre.match(/^[A-Za-z ]+$/)) {
       event.preventDefault();
       isValid = false;
       document.getElementById("nombre_error").textContent = "El nombre solo debe contener letras.";
     }
   
     // Validar edad
     if (edad === "") {
       event.preventDefault();
       isValid = false;
       document.getElementById("edad_error").textContent = "La edad es obligatoria.";
     } else if (isNaN(edad)) {
       event.preventDefault();
       isValid = false;
       document.getElementById("edad_error").textContent = "La edad debe ser un número.";
     }
   
     // Validar experiencia
     if (experiencia === "") {
       event.preventDefault();
       isValid = false;
       document.getElementById("experiencia_error").textContent = "La experiencia es obligatoria.";
     } else if (experiencia.length > 3 || isNaN(experiencia)) {
       event.preventDefault();
       isValid = false;
       document.getElementById("experiencia_error").textContent = "La experiencia debe ser un número de hasta 3 dígitos.";
     }
   
     // Validar número de licencia
     if (numeroLicencia === "") {
       event.preventDefault();
       isValid = false;
       document.getElementById("numeroLicencia_error").textContent = "El número de licencia es obligatorio.";
     } else if (numeroLicencia.length !== 9) {
       event.preventDefault();
       isValid = false;
       document.getElementById("numeroLicencia_error").textContent = "El número de licencia debe ser un número de 9 dígitos.";
     }else if ( isNaN(numeroLicencia)) {
       event.preventDefault();
       isValid = false;
       document.getElementById("numeroLicencia_error").textContent = "El número de licencia solo acepta numeros.";
     }
   
  
  
    document.getElementById("id_Unidad").addEventListener("change", borrarMensajesError);
    document.getElementById("nombre").addEventListener("input", borrarMensajesError);
    document.getElementById("edad").addEventListener("input", borrarMensajesError);
    document.getElementById("experiencia").addEventListener("input", borrarMensajesError);
    document.getElementById("numeroLicencia").addEventListener("input", borrarMensajesError);
    document.getElementById("estatus").addEventListener("change", borrarMensajesError);
    document.getElementById("imagen_conductor").addEventListener("input", borrarMensajesError);
  
  
    if (isValid) {
      $.ajax({
          url: "modelo/crear.php",
          method: 'POST',
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function (data) {
            alert(data);
            $('#formulario')[0].reset();
            $('#modalUsuario').modal('hide');
            dataTable.ajax.reload();
          }
        });
      }
    });
  
  
  
  
    //Funcionalida de editar
    $(document).on('click', '.editar', function () {
      var id_conductor = $(this).attr("id");
      $.ajax({
        url: "modelo/obtener_registro.php",
        method: "POST",
        data: {
          id_conductor: id_conductor
        },
        dataType: "json",
        success: function (data) {
  
          //console.log(data);				
          $('#modalUsuario').modal('show');
          $('#id_Unidad').val(data.id_Unidad);
          $('#nombre').val(data.nombre);
          $('#edad').val(data.edad);
          $('#experiencia').val(data.experiencia);
          $('#numeroLicencia').val(data.numeroLicencia);
          $('#estatus').val(data.estatus);
          $('.modal-title').text("Editar Conductor");
          $('#id_conductor').val(id_conductor);
          $('#imagen_subida').html(data.imagen_conductor);
          $('#action').val("Editar");
          $('#operacion').val("Editar");
  
  
                    var regex = /^[A-Za-z\s]+$/;
  
          
        $('#id_Unidad').on('change', function () {
          var id_Unidad = $(this).val();
          if (id_Unidad === "") {
            $('#id_Unidad_error').text("Por favor, selecciona una Unidad.");
          } else {
            $('#id_Unidad_error').text("");
          }
        });
  
          
  
          $('#nombre').on('input', function () {
            var nombre = $(this).val().trim();
            if (nombre === "") {
              $('#nombre_error').text("El campo Nombre es requerido.");
            } else if (!regex.test(nombre)) {
              $('#nombre_error').text("El campo Nombre solo debe contener letras.");
            } else {
              $('#nombre_error').text("");
            }
          });
  
  
  
          $('#edad').on('input', function () {
            var edad = $(this).val().trim();
            if (edad === "") {
              $('#edad_error').text("El campo Edad es requerido.");
            } else if (isNaN(edad) || edad === "") {
              $('#edad_error').text("El campo Edad solo debe contener números.");
            }else {
              $('#edad_error').text("");
            }
          });
  
          $('#experiencia').on('input', function () {
            var experiencia = $(this).val().trim();
            if (experiencia === "") {
              $('#experiencia_error').text("El campo Experiencia es requerido.");
            } else if (isNaN(experiencia) || experiencia === "") {
              $('#experiencia_error').text("El campo Experiencia solo debe contener números.");
            } else if (experiencia.length > 3) {
              $('#experiencia_error').text("El campo Experiencia no puede ser mayor a 3 dígitos.");
            } else {
              $('#experiencia_error').text("");
            }
          });
  
          $('#numeroLicencia').on('input', function () {
            var numeroLicencia = $(this).val().trim();
            if (numeroLicencia === "") {
              $('#numeroLicencia_error').text("El campo Número de licencia es requerido.");
            } else if (isNaN(numeroLicencia)) {
              $('#numeroLicencia_error').text("El campo Número de licencia solo debe contener números.");
            } else if (numeroLicencia.length !== 9) {
              $('#numeroLicencia_error').text("El campo Número de licencia debe tener exactamente 9 dígitos.");
            } else {
              $('#numeroLicencia_error').text("");
            }
          });
  
          
        $('#estatus').on('change', function () {
          var estatus = $(this).val();
          if (estatus === "") {
            $('#estatus_error').text("Por favor, selecciona un estatus.");
          } else {
            $('#estatus_error').text("");
          }
        });
  
  
  
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      })
    });
  
    //Funcionalida de borrar
    $(document).on('click', '.borrar', function () {
      var id_conductor = $(this).attr("id");
  
      // Mostrar el modal de confirmación
      $('#confirmModal').modal('show');
  
      // Manejar el clic en el botón "Borrar" dentro del modal
      $('#confirmDelete').on('click', function () {
        $.ajax({
          url: "modelo/borrar.php",
          method: "POST",
          data: {
            id_conductor: id_conductor
          },
          success: function (data) {
            alert(data);
            dataTable.ajax.reload();
          }
        });
  
        // Ocultar el modal de confirmación
        $('#confirmModal').modal('hide');
      });
    });
  
  
  
  });
  
  