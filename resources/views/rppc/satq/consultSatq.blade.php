<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Index 
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
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
      <h3>Sistema de Consultas de Derechos de Pago</h3>
   </div>
   <div class="row">
      <div id="flHorizontalForm" class="col-lg-12 layout-spacing mx-2">
         <!-- Añadido margen horizontal -->
         <div class="statbox widget box box-shadow">
            <div class="widget-header">
               <div class="row">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                     <h4>Por favor {{ auth()->user()->persona->nombre }} ingrese la referencia de pago</h4>
                  </div>
               </div>
            </div>
            <div class="widget-content widget-content-area p-2">
               <!-- Añadido padding -->
               <div class="input-group mb-3">
                  <!-- Sin margen horizontal aquí, ya que se aplica al contenedor -->
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
                  <!-- Sin margen horizontal aquí, ya que se aplica al contenedor -->
                  <span class="input-group-text">Referencia</span>
                  <input type="text" class="form-control" placeholder="Referencia" id="referencia2">
                  <span class="input-group-text">RFC</span>
                  <input type="text" class="form-control" placeholder="RFC" id="rfc">
                  <span class="input-group-text">Fecha</span>
                  <input type="text" class="form-control" id="fechas">
               </div>
               <br>
               <div class="input-group mb-3">
                  <!-- Sin margen horizontal aquí -->
                  <span class="input-group-text">Nombre</span>
                  <input type="text" class="form-control" aria-describedby="" id="nombre">
               </div>
               <hr>
               <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                  <h6>Pago/s: (Para ver los movimentos dar click al concepto)</h6>
                  <table id="tabla1" class="multi-table table dt-table-hover w-100">
                     <thead>
                        <tr>
                           <th>Fecha de pago</th>
                           <th>Concepto</th>
                           <th>Cantidad</th>
                           <th>Precio unitario</th>
                           <th>Bloqueados</th>
                           <th>Usados</th>
                        </tr>
                     </thead>
                     <tbody>

                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Fecha de pago</th>
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
                  <table id="tabla2" class="multi-table table dt-table-hover w-100">
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

                              const hd = data2[0];

                              $('#referencia2').val(hd.Referencia);
                              $('#rfc').val(hd.Rfc);
                              $('#fechas').val(hd.Fecha);
                              $('#nombre').val(hd.Nombre);
      
                              conceptos.forEach((item, index) => {
      const row = document.createElement('tr');
      
      // Crear celdas y agregar un evento de clic a cada celda
      row.innerHTML = `
        <td data-id="${item.IdDetalle}">${item.PagoFecha}</td>
        <td data-id="${item.IdDetalle}">${item.Concepto}</td>
        <td data-id="${item.IdDetalle}">${item.Cantidad}</td>
        <td data-id="${item.IdDetalle}">${item.PrecioUnitario}</td>
        <td data-id="${item.IdDetalle}">${item.Bloqueados}</td>
        <td data-id="${item.IdDetalle}">${item.Usados}</td>
      `;
      
      // Agregar el evento de clic a cada celda
      row.querySelectorAll('td').forEach(td => {
    td.addEventListener('click', function() {
        const id = this.getAttribute('data-id'); // Obtener el ID desde el atributo data-id
         // Reemplaza esto con tu forma de obtener el token

        // Llamar a la función con los datos en JSON
        ejecutarFuncion(id, token);

        const targetTable = document.getElementById('tabla2');
        if (targetTable) {
            // Hacer scroll automáticamente hacia la tabla
            targetTable.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            console.error('No se encontró la tabla con ID "tabla2"');
        }
    });
});

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
   <script>
            
      
            function ejecutarFuncion(conceptoId, token) {
            const tableBody = document.getElementById('tabla2').querySelector('tbody');
            tableBody.innerHTML = '';

    // Mostrar el ID del registro en la consola
    console.log("ID del registro:", conceptoId);

    $.ajax({
        url: 'api/satq/log/' + conceptoId + '/' + token,
        method: 'GET',
        success: function(data3) {
            console.log('Datos recibidos:', data3);

            const datos = data3;

            datos.forEach((item, index) => {
            const row = document.createElement('tr');
      
      // Crear celdas y agregar un evento de clic a cada celda
      row.innerHTML = `
        <td>${item.Fecha}</td>
        <td>${item.Movimiento}</td>
        <td>${item.ConceptoId}</td>
        <td>${item.LlaveCompuesta}</td>
        <td>${item.FolioDiaHora}</td>
        <td>${item.Usuario}</td>
        <td>${item.Cantidad}</td>
      `;
      tableBody.appendChild(row);
      });





        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al realizar la solicitud:', textStatus, errorThrown);
            console.error('Detalles del error:', jqXHR.responseText);
        }
    });
}
      
   </script>
   <script></script>
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>