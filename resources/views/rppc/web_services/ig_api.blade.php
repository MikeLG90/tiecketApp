<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Catastro
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   <!--  END CUSTOM STYLE FILE  -->
   <style>
      .dt-table-hover td {
      cursor: pointer; /* Cambia el cursor a un puntero */
      }
   </style>
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <style>
      .custom-dropdown .dropdown-menu.show {
      z-index: 1050;
      }
   </style>
   <div class="row layout-top-spacing">
      <h3>Sistema de Consultas de Claves Catastrales</h3>
   </div>
   <div class="row">
      <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
         <div class="card shadow-sm">
            <div class="card-header ">
               <h4 class="mb-0">Por favor {{ auth()->user()->persona->nombre }} seleccione el municipio y la clave catastral a consultar</h4>
            </div>
            <div class="card-body">
               <div class="input-group mb-4">
                  <span class="input-group-text">Municipio</span>
                  <select class="form-control form-control-lg" id="municipio">
                     <option value="1">Cozumel</option>
                     <option value="2">Isla Mujeres</option>
                     <option value="3">Felipe Carrillo Puerto</option>
                     <option value="4">Othón P. Blanco</option>
                     <option value="5">Solidaridad</option>
                     <option value="6">Tulum</option>
                     <option value="7">Bacalar</option>
                     <option value="8">Puerto Morelos</option>
                  </select>
               </div>
               <div class="input-group mb-4">
                  <span class="input-group-text">Cve. catastral</span>
                  <input type="text" class="form-control form-control-lg" placeholder="ej. 7505623XXXX" aria-label="Recipient's username" aria-describedby="button-addon2" id="cve_catastro">
               </div>
    <!-- Botón de búsqueda -->
    <div class="d-grid gap-2 col-6 mx-auto">
                                    <!-- Default -->

                                       <button class="btn btn-success mb-4" type="submit" id="aprobar-btn">
                                          Buscar 
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                                       </button>

                                 </div>

               <h5 class="card-title mb-3">Detalles de la solicitud</h5>
               <hr class="mb-4">
               <div class="row g-3 mb-4">
                  <div class="col-md-4">
                     <div class="input-group">
                        <span class="input-group-text">Localidad</span>
                        <input type="text" class="form-control" id="localidad">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="input-group">
                        <span class="input-group-text">Latitud</span>
                        <input type="text" class="form-control"  id="latitud">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="input-group">
                        <span class="input-group-text">Longitud</span>
                        <input type="text" class="form-control" id="longitud">
                     </div>
                  </div>
               </div>
               <div class="input-group mb-4">
                  <span class="input-group-text">CVE. Catastral</span>
                  <input type="text" class="form-control" aria-describedby="" id="catastro">
               </div>
               <div class="input-group mb-4">
                  <span class="input-group-text">Nombre</span>
                  <input type="text" class="form-control" aria-describedby="" id="propietario">
               </div>
               <div class="input-group mb-4">
                    <span class="input-group-text">Dirección</span>
                    <textarea class="form-control" id="direccion" rows="3"></textarea>
                </div>


            </div>
         </div>
      </div>
   </div>
   <!--  BEGIN CUSTOM SCRIPTS FILE  -->
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
      $(document).ready(function() {
          $('.btn-success').on('click', function() {
            const cve = $('#cve_catastro').val();
            const municipio = $('#municipio').val()
      
              //Realizar la solicitud AJAX para la obtención del token
              $.ajax({
                  url: '/consulta-catastro/' + municipio + '/' + cve ,
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
                      console.log(data);
                      // Poner datos en los inputs
                      $('#localidad').val(data.nom_loc);
                      $('#catastro').val(data.clave_catastral);
                      $('#propietario').val(data.propietario);
                      $('#direccion').val(data.direccion);
                      $('#latitud').val(data.centroide_lat);
                      $('#longitud').val(data.centroide_log);

                  },
                  error: function(error) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Sin registros',
                        text: 'La conexión ha fallado',
                    });
                    return;
                      }
              });
      
          });
      });
   </script>

   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>