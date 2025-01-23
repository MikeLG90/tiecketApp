<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Resoluciones
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   @vite(['resources/scss/light/assets/components/modal.scss'])
   @vite(['resources/scss/dark/assets/components/modal.scss'])
   <!--  END CUSTOM STYLE FILE  -->
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <style>
      .custom-dropdown .dropdown-menu.show {
      z-index: 1050;
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
   <link rel="stylesheet" href="{{asset('plugins/apex/apexcharts.css')}}">
   @vite(['resources/scss/light/assets/components/list-group.scss'])
   @vite(['resources/scss/light/assets/widgets/modules-widgets.scss'])
   @vite(['resources/scss/dark/assets/components/list-group.scss'])
   @vite(['resources/scss/dark/assets/widgets/modules-widgets.scss'])
   <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
   <!--  CONTENIDO AQUÍ  -->

    <!-- Botón flotante para el modal -->
    <a href="#" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#inputFormModal">Nuevo Ticket</a>

   <div class="container mt-4">
      <ul class="nav nav-fill nav-tabs" role="tablist">
         <li class="nav-item" role="presentation">
            <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard">
                  <rect width="7" height="9" x="3" y="3" rx="1"/>
                  <rect width="7" height="5" x="14" y="3" rx="1"/>
                  <rect width="7" height="9" x="14" y="12" rx="1"/>
                  <rect width="7" height="5" x="3" y="16" rx="1"/>
               </svg>
               Dashboard
            </a>
         </li>
         <li class="nav-item" role="presentation">
            <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tickets">
                  <path d="m4.5 8 10.58-5.06a1 1 0 0 1 1.342.488L18.5 8"/>
                  <path d="M6 10V8"/>
                  <path d="M6 14v1"/>
                  <path d="M6 19v2"/>
                  <rect x="2" y="8" width="20" height="13" rx="2"/>
               </svg>
               Resoluciones
            </a>
         </li>
         <li class="nav-item" role="presentation">
            <a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-check">
                  <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
                  <path d="m9 12 2 2 4-4"/>
               </svg>
               Aprobadas
            </a>
         </li>
         <li class="nav-item" role="presentation">
            <a class="nav-link" id="fill-tab-3" data-bs-toggle="tab" href="#fill-tabpanel-3" role="tab" aria-controls="fill-tabpanel-3" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-minus">
                  <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
                  <path d="M9 12h6"/>
               </svg>
               Pendientes
            </a>
         </li>
      </ul>
   </div>
   <div class="tab-content pt-5" id="tab-content">
      <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
               <div class="statbox widget box box-shadow">
                  <div class="row layout-top-spacing">
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="card">
                           <div class="card-body">
                              <strong>Total de resoluciones</strong>
                              <h5 class="card-title">20</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="card">
                           <div class="card-body">
                              <strong>Aprobadas</strong>
                              <h5 class="card-title">20</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="card">
                           <div class="card-body">
                              <strong>Pendientes</strong>
                              <h5 class="card-title">20</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="card">
                           <div class="card-body">
                              <strong>Rechazadas</strong>
                              <h5 class="card-title">20</h5>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="widget-content widget-content-area">
                     <!-- Contenido del dashboard aquí -->
                     <div id="chart" style="max-width: 1000px; margin: 50px auto;"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <table class="multi-table table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Dirección</th>
                                <th class="text-center">Esquema</th>
                                <th class="text-center dt-no-sorting">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AAAA000000AAAAAAA0</td>
                                <td>Tiger Nixon</td>
                                <td>00/00/0000</td>
                                <td>00</td>
                                <td>Municipio, localidad, colonia</td>
                                <td>
                                    <div class="t-dot bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Completo"></div>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown custom-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Más filas aquí -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Dirección</th>
                                <th class="text-center">Esquema</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <table class="multi-table table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Dirección</th>
                                <th class="text-center">Esquema</th>
                                <th class="text-center dt-no-sorting">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AAAA000000AAAAAAA0</td>
                                <td>Tiger Nixon</td>
                                <td>00/00/0000</td>
                                <td>00</td>
                                <td>Municipio, localidad, colonia</td>
                                <td>
                                    <div class="t-dot bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Completo"></div>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown custom-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Más filas aquí -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Dirección</th>
                                <th class="text-center">Esquema</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="fill-tabpanel-3" role="tabpanel" aria-labelledby="fill-tab-3">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <table class="multi-table table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Dirección</th>
                                <th class="text-center">Esquema</th>
                                <th class="text-center dt-no-sorting">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AAAA000000AAAAAAA0</td>
                                <td>Tiger Nixon</td>
                                <td>00/00/0000</td>
                                <td>00</td>
                                <td>Municipio, localidad, colonia</td>
                                <td>
                                    <div class="t-dot bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Completo"></div>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown custom-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Más filas aquí -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Dirección</th>
                                <th class="text-center">Esquema</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
   </div>
   <br>
   @include('rppc.resoluciones.create-resolucion')
   <!--  BEGIN CUSTOM SCRIPTS FILE  -->
   <x-slot:footerFiles>
   <script>
      // Configuración del gráfico
      var options = {
        chart: {
          type: 'area', // Cambiamos a área para permitir el relleno
          height: 350
        },
        series: [
          {
            name: 'Temperatura',
            data: [22, 24, 21, 25, 27, 30, 35]
          }
        ],
        xaxis: {
          categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio']
        },
        stroke: {
          curve: 'smooth', // Línea curva
          width: 2
        },
        fill: {
          type: 'gradient', // Gradiente como relleno
          gradient: {
            shade: 'dark', // Sombreado oscuro
            type: 'vertical', // Dirección del gradiente
            shadeIntensity: 0.5, // Intensidad del sombreado
            gradientToColors: ['#FEB019'], // Color hacia el que gradúa
            inverseColors: false,
            opacityFrom: 0.7, // Opacidad en la parte superior
            opacityTo: 0.1, // Opacidad en la parte inferior
            stops: [0, 100] // Inicio y fin del gradiente
          }
        },
        colors: ['#FF4560'], // Color principal de la línea
        title: {
          text: 'Temperaturas Mensuales con Gradiente',
          align: 'center'
        },
        tooltip: {
          enabled: true
        }
      };
      
      // Renderizar la gráfica
      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
   </script>
   <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
   @vite(['resources/assets/js/custom.js'])
   <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/custom_miscellaneous.js')}}"></script>
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>