<x-base-layout :scrollspy="true">
   <x-slot:pageTitle>
   RPPC | ConsultaSATQ
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <!-- BEGIN CUSTOM STYLE FILE -->
   @vite(['resources/scss/light/assets/components/timeline.scss'])
   @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss'])
   @vite(['resources/scss/dark/plugins/filepond/custom-filepond.scss'])

   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])

   
   <!-- Estilos del sweet alert -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- DataTables -->
   <!-- END CUSTOM STYLE FILE -->
   <style>
      .toggle-code-snippet { margin-bottom: 0px; }
      body.dark .toggle-code-snippet { margin-bottom: 0px; }
   </style>
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <x-slot:scrollspyConfig>
   data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
   </x-slot>
   <div class="row layout-top-spacing">
      <h3>Sistema de Consultas de Derechos de Pago</h3>
   </div>
   <div class="row">
      <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
         <div class="statbox widget box box-shadow">
            <div class="widget-header">
               <div class="row">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                     <h4>Por favor {{ auth()->user()->persona->nombre }} ingrese la referencia de pago</h4>
                  </div>
               </div>
            </div>
            <div class="widget-content widget-content-area">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="ej. 7505623XXXX" aria-label="Recipient's username" aria-describedby="button-addon2" id="referencia">
                  <button class="btn btn-info" type="button" id="button-addon2">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.3-4.3"/>
                     </svg>
                  </button>
               </div>
               <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                  <h6>Detalles de la solicitud</h6>
               </div>
               <hr>
               <div class="input-group">
                  <span class="input-group-text">Referencia</span>
                  <input type="text" class="form-control" placeholder="Referencia">
                  <span class="input-group-text">RFC</span>
                  <input type="text" class="form-control" placeholder="RFC">
                  <span class="input-group-text">Fecha</span>
                  <input type="text" class="form-control" id="fecha1">
               </div>
               <br>
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon3">Nombre</span>
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
               </div>
               <hr>
               <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                  <h6>Pago/s:</h6>

               <table id="tabla1" class="table table-striped table-hover table-bordered" style="width:100%">
                  <thead>
                     <tr>
                        <th>Fecha de pago</th>
                        <th>Subsidio programa</th>
                        <th>Subsidio folio</th>
                        <th>ID Detalle</th>
                        <th>Concepto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Bloqueados</th>
                        <th>Usados</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Fecha de pago</th>
                        <th>Subsidio programa</th>
                        <th>Subsidio folio</th>
                        <th>ID Detalle</th>
                        <th>Concepto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Bloqueados</th>
                        <th>Usados</th>
                     </tr>
                  </tfoot>
               </table>

               <hr>
               <h6>Detalles de Concepto</h6>

               
               <table id="tabla2" class="table table-striped table-hover table-bordered" style="width:100%">
                  <thead>
                     <tr>
                        <th>Fecha</th>
                        <th>Movimiento</th>
                        <th>Concepto ID</th>
                        <th>LLave compuesta</th>
                        <th>Folio-Dia-Hora</th>
                        <th>Usuario</th>
                        <th>Cantidad</th>
                     </tr>
                  </thead>
                  <tbody>
                     <!-- Aquí se cargan todos los conceptos de la referencia -->
                  </tbody>
                  <tfoot>
                     <tr>
                     <th>Fecha</th>
                        <th>Movimiento</th>
                        <th>Concepto ID</th>
                        <th>LLave compuesta</th>
                        <th>Folio-Dia-Hora</th>
                        <th>Usuario</th>
                        <th>Cantidad</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
   <!-- BEGIN CUSTOM SCRIPTS FILE -->
   <x-slot:footerFiles>

   <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
   @vite(['resources/assets/js/custom.js'])
   <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/custom_miscellaneous.js')}}"></script>

   <script>
$(document).ready(function () {
    // Configuración para la tabla 1
    $('#tabla1').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        lengthChange: true,
        info: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json" // Traducción al español
        }
    });

    // Configuración para la tabla 2
    $('#tabla2').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        lengthChange: true,
        info: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json" // Traducción al español
        }
    });
});

      
      window.onload = function () {
          var fecha = new Date();
          var mes = fecha.getMonth() + 1; // Meses de 0 a 11
          var dia = fecha.getDate();
          var anio = fecha.getFullYear();
          var horas = fecha.getHours();
          var minutos = fecha.getMinutes();
      
          if (dia < 10) dia = '0' + dia;
          if (mes < 10) mes = '0' + mes;
          if (horas < 10) horas = '0' + horas;
          if (minutos < 10) minutos = '0' + minutos;
      
          var inputFecha = document.getElementById('fecha');
          if (inputFecha) {
              inputFecha.value = `${anio}-${mes}-${dia}T${horas}:${minutos}`;
          }
      };
   </script>
   <script>
      $(document).ready(function() {
          $('.btn-info').on('click', function() {
            const referencia = $('#referencia').val();
            const tableBody = document.getElementById('tabla1').querySelector('tbody');
            tableBody.innerHTML = "";//Limpia el contenido anterior

            console.log(referencia); // Mostrará "Ejemplo" en la consola
              //Realizar la solicitud AJAX para la obtención del token
              $.ajax({
                  url: 'api/satq/token',
                  method: 'GET',
                  success: function(data) {
                      console.log(data);
                      const token = data.access_token;
                      //Realizar segunda peticon AJAX para obtener los conceptos

                      $.ajax({
                          url: 'api/satq/concepto/' + token + '/' + referencia,
                          method: 'GET',
                          success: function(data2) {
                              const conceptos = data2;
                              console.log(data2);

                              conceptos.forEach((item, index) => {
                                 const row = document.createElement('tr');
                                 row.innerHTML = `
                                 <td>${item.PagoFecha}</td>
                                 <td>${item.SubsidioPrograma}</td>
                                 <td>${item.SubsidioFolio}</td>
                                 <td>${item.IdDetalle}</td>
                                 <td>${item.Concepto}</td>
                                 <td>${item.Cantidad}</td>
                                 <td>${item.PrecioUnitario}</td>
                                 <td>${item.Bloqueados}</td>
                                 <td>${item.Usados}</td>
                                 `;
                                 tableBody.appendChild(row);
                              });
                          },
                          error: function(error1) {
                              console.error('Error al obtener los coneceptos', error1);
                          }
                      });
                  },
                  error: function(error) {
                      console.error('Error al obtener el token: ', error);
                  }
              });
          });
      });
   </script>
   </x-slot>
   <!-- END CUSTOM SCRIPTS FILE -->
</x-base-layout>