<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Visor de Inscripciones</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="icon" type="image/x-icon" href="{{Vite::asset('resources/images/favicon_qroo.ico')}}"/>
      @vite(['resources/scss/layouts/modern-light-menu/light/loader.scss'])
      <style>
         .dt-table-hover td {
         cursor: pointer; /* Cambia el cursor a un puntero */
         }
      </style>
      <style>
         /* Estilos generales */
         body {
         background-color: #f8f9fa;
         }
         /* Navbar */
         .navbar {
         background-color: #343a40;
         }
         .navbar-brand {
         color: #fff !important;
         }
         /* Sidebar */
         .sidebar {
         height: 100vh;
         background: #ffffff;
         border-right: 1px solid #ddd;
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         border-radius: 10px;
         }
         .sidebar h4 {
         color: #0d6efd;
         }
         .sidebar label {
         font-weight: bold;
         color: #495057;
         }
         .sidebar button {
         transition: all 0.3s ease;
         }
         .sidebar button:hover {
         background-color: #0a58ca;
         }
         /* Tabla */
         .table-container {
         overflow-y: auto;
         max-height: 800px;
         }
         .table-container2 {
         overflow-y: auto;
         max-height: 280px;
         }
         /* Visor PDF */
         .pdf-viewer {
         height: 400px;
         background-color: #e9ecef;
         border: 1px solid #ddd;
         border-radius: 5px;
         display: flex;
         align-items: center;
         justify-content: center;
         color: #6c757d;
         font-size: 1.2rem;
         }
         /* Botones */
         .btn-primary {
         background-color: #0d6efd;
         border-color: #0d6efd;
         }
         .btn-primary:hover {
         background-color: #0b5ed7;
         border-color: #0a58ca;
         }
         /* Scrollbar personalizada */
         ::-webkit-scrollbar {
         width: 8px;
         }
         ::-webkit-scrollbar-thumb {
         background-color: #6c757d;
         border-radius: 4px;
         }
      </style>
         <style>
      .btn-flotante {
      font-size: 10px; /* Cambiar el tamaño de la tipografia */
      text-transform: uppercase; /* Texto en mayusculas */
      font-weight: bold; /* Fuente en negrita o bold */
      color: #ffffff; /* Color del texto */
      border-radius: 50px; /* Borde del boton */
      letter-spacing: 2px; /* Espacio entre letras */
      background-color: #9e192d !important;; /* Color de fondo */
      padding: 18px 30px; /* Relleno del boton */
      position: fixed;
      bottom: 120px;
      right: 40px;
      transition: all 300ms ease 0ms;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      z-index: 99;
      width: 60px; /* Ancho fijo del botón */
      height: 60px; /* Altura fija del botón */
      display: flex;
      align-items: center;
      justify-content: center; 
      }
      .btn-flotante:hover {
      background-color: #2c2fa5; /* Color de fondo al pasar el cursor */
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
      transform: translateY(-7px);
      }
      @media only screen and (max-width: 600px) {
      .btn-flotante {
      font-size: 14px;
      padding: 12px 20px;
      bottom: 20px;
      right: 20px;
      }
      }
   </style>

      <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
      @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
      @vite(['resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss'])
      @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
      @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])
      <script src="https://cdn.jsdelivr.net/npm/tiff.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   </head>
   <body>
      <!-- Navbar -->
      <!--    <nav class="navbar navbar-expand-lg navbar-dark">
         <div class="container-fluid">
             <a class="navbar-brand" href="#">Visor de Libros</a>
         </div>
         </nav> -->
         <a href="/crear-folio" class="btn-flotante">Volver</a>

      <div class="container-fluid mt-4">
         <div class="row">
            <!-- Sidebar Izquierdo -->
            <div class="col-md-3 col-lg-2 sidebar p-3">
               <div class="text-center mb-4">
                  <!-- Utiliza text-center para centrar el contenido -->
                  <a href="/crear-folio" class="nav-link">
                     <img src="{{ Vite::asset('resources/images/rppc_logo2.png') }}" width="140" height="50" alt="company" class="img-fluid"> <!-- img-fluid para que se ajuste responsivamente -->
                  </a>
               </div>
               <div class="mb-3">
                  <label>Oficina</label>
                  <select id="oficina" class="form-select">
                     <option selected>Seleccione una oficina</option>
                     <option value="1">Chetumal</option>
                     <option value="2">Cancún</option>
                     <option value="3">Playa del Carmen</option>
                     <option value="4">Cozumel</option>
                  </select>
               </div>
               <div class="container">
                  <div class="mb-3 row">
                     <div class="col-md-6 mb-3">
                        <label class="form-label">Sección</label>
                        <input type="text" class="form-control" placeholder="Ingrese sección" id="seccion">
                     </div>
                     <div class="col-md-6 mb-3">
                        <label class="form-label">Tomo</label>
                        <input type="text" class="form-control" placeholder="Ingrese tomo" id="tomo">
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-6 mb-3">
                        <label class="form-label">Inscripcion</label>
                        <input type="text" class="form-control" placeholder="Ingrese otro dato" id="inscripcion">
                     </div>
                     <div class="col-md-6 mb-3 d-flex align-items-end">
                        <button type="button" class="btn btn-primary" id="buscar">Buscar</button>
                     </div>
                  </div>
               </div>
               <label class="form-label">Inscripciones</label>
               <div class="table-container2 mb-4">
                  <table class="multi-table table dt-table-hover" id="inscripciones">
                     <tbody>
                        <!-- Imagnes de un libro -->
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Contenido Principal -->
            <div class="col-md-9 col-lg-10">
               <!-- Tabla Principal -->
               <div class="table-container mb-4">
                  <!-- Visor PDF -->
                  <iframe id="viewer" style="width: 100%; height: 800px; border: 1px solid #ccc;" src="{{ asset('rppc.pdf') }}"></iframe>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap JS Bundle -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <!-- jQuery CDN -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
      @vite(['resources/assets/js/custom.js'])
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/custom_miscellaneous.js')}}"></script>
      <script>
         // Función para mostrar las imágenes TIFF a PDF
          function mostrarImagen(nombre_archivo, oficinaId) {
              // Url de la ruta del controlador TiffController
              const url = `/tiff/ins/${nombre_archivo}/${oficinaId}`;
              // Establecer url en el iframe
             document.getElementById('viewer').src = url;
         
          }
          // Función para mostrar libros al ingresar seccion y el tomo 
          function mostrarInscripciones(seccion, tomo, oficinaId, inscripcion) {
         const tableBody = document.getElementById('inscripciones').querySelector('tbody');
         tableBody.innerHTML = '';
         
         $.ajax({
         url: 'api/inscripciones/' + seccion + '/' + tomo + '/' + oficinaId + '/' + inscripcion,
         method: 'GET',
         success: function(data) {
            if (data.length === 0) {
                // Usar SweetAlert para mostrar la alerta
                Swal.fire({
                    icon: 'warning',
                    title: 'Sin registros',
                    text: 'No se encontraron registros para los parámetros proporcionados.',
                });
                return; // Salimos de la función si no hay datos
            }
         
            // Si hay datos, renderiza las filas
            data.forEach((item) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                        <td data-name="${item.nombre_archivo}">${item.nombre_archivo}</td>
                    `;          
                row.querySelectorAll('td').forEach(td => {
                    td.addEventListener('click', function() {
                        const name = this.getAttribute('data-name');
                        mostrarImagen(name, oficinaId);
                    });
                });
                tableBody.appendChild(row);
            });
         },
         error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            // Usar SweetAlert para mostrar el error
            Swal.fire({
                icon: 'error',
                title: 'Error en la solicitud',
                text: 'Ocurrió un error al realizar la solicitud. Por favor, inténtelo de nuevo.',
            });
         }
         });
         }
         
          // Función para iniciar la búsqueda
          $(document).ready(function() {
          $("#buscar").click(function() {
              const seccion = $("#seccion").val();
              const tomo = $('#tomo').val();
              const oficina = $('#oficina').val();
              const inscripcion = $('#inscripcion').val();
              mostrarInscripciones(seccion, tomo, oficina, inscripcion);
          });
          });
      </script>
   </body>
</html>