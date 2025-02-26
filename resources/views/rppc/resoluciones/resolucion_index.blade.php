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
   @vite(['resources/css/navs.css'])
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
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
   <a href="#" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#inputFormModal">Nuevo</a>
   <div class="container mt-5">
      <nav class="nav-tabs-wrapper">
         <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item" role="presentation">
               <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="dashboard" aria-selected="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout me-2">
                     <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                     <line x1="3" y1="9" x2="21" y2="9"></line>
                     <line x1="9" y1="21" x2="9" y2="9"></line>
                  </svg>
                  Dashboard
               </a>
            </li>
            @if(Auth::user()->rol_id == 1 )
            <li class="nav-item" role="presentation">
               <a class="nav-link" id="resoluciones-tab" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="resoluciones" aria-selected="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text me-2">
                     <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                     <polyline points="14 2 14 8 20 8"></polyline>
                     <line x1="16" y1="13" x2="8" y2="13"></line>
                     <line x1="16" y1="17" x2="8" y2="17"></line>
                     <polyline points="10 9 9 9 8 9"></polyline>
                  </svg>
                  Resoluciones
               </a>
            </li>
            @endif
            <li class="nav-item" role="presentation">
               <a class="nav-link" id="aprobadas-tab" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="aprobadas" aria-selected="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle me-2">
                     <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                     <polyline points="22 4 12 14.01 9 11.01"></polyline>
                  </svg>
                  Aprobadas
               </a>
            </li>
            <li class="nav-item" role="presentation">
               <a class="nav-link" id="pendientes-tab" data-bs-toggle="tab" href="#fill-tabpanel-3" role="tab" aria-controls="pendientes" aria-selected="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock me-2">
                     <circle cx="12" cy="12" r="10"></circle>
                     <polyline points="12 6 12 12 16 14"></polyline>
                  </svg>
                  Pendientes
                  <span class="badge bg-danger ms-2">{{ $cantidad_pendientes }}</span>
               </a>
            </li>
            <li class="nav-item" role="presentation">
               <a class="nav-link" id="enviados-tab" data-bs-toggle="tab" href="#fill-tabpanel-4" role="tab" aria-controls="enviados" aria-selected="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send me-2">
                     <line x1="22" y1="2" x2="11" y2="13"></line>
                     <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                  </svg>
                  Enviados
               </a>
            </li>
         </ul>
      </nav>
   </div>
   <div class="tab-content pt-5" id="tab-content">
      <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
               <div class="statbox widget box box-shadow">
                  <div class="row layout-top-spacing">
                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="card">
                           <div class="card-body">
                              <strong>Total de resoluciones</strong>
                              <h5 class="card-title">{{ $total }}</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="card">
                           <div class="card-body">
                              <strong>Aprobadas</strong>
                              <h5 class="card-title">{{ $cantidad_aprobadas }}</h5>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="card">
                           <div class="card-body">
                              <strong>Pendientes</strong>
                              <h5 class="card-title">{{ $cantidad_pendientes }}</h5>
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
                  <div id="listado-resoluciones"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
      <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
               <div class="statbox widget box box-shadow">
                  <div id="listado-resolucionesA"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="fill-tabpanel-3" role="tabpanel" aria-labelledby="fill-tab-3">
      <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
               <div class="statbox widget box box-shadow">
                  <div id="listado-resolucionesP"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="fill-tabpanel-4" role="tabpanel" aria-labelledby="fill-tab-4">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
               <div class="statbox widget box box-shadow">
                  <div id="listado-resolucionesE"></div>
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
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   <!-- DataTables CSS -->
   @if (session('success'))
   <script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              title: '¡Éxito!',
              text: '{{ session('success') }}',
              icon: 'success',
              confirmButtonText: 'Aceptar',
               // Opcional: añadir configuración de customClass para aislar estilos
               customClass: {
                  container: 'swal-container',
                  popup: 'swal-popup',
                  header: 'swal-header',
                  title: 'swal-title',
                  text: 'swal-text',
                  closeButton: 'swal-close-button',
                  icon: 'swal-icon',
                  image: 'swal-image',
                  content: 'swal-content',
                  input: 'swal-input',
                  actions: 'swal-actions',
                  confirmButton: 'swal-confirm-button',
                  cancelButton: 'swal-cancel-button',
                  footer: 'swal-footer'
              }
          });
      });
   </script>
   @endif
   <script>
      document.addEventListener("DOMContentLoaded", function () {
          fetch("/resoluciones-chart-data")
              .then(response => response.json())
              .then(data => {
                  var options = {
                      chart: {
                          type: 'area',
                          height: 350
                      },
                      series: [{
                          name: 'Resoluciones',
                          data: data.data
                      }],
                      xaxis: {
                          categories: data.labels
                      },
                      stroke: {
                          curve: 'smooth',
                          width: 2
                      },
                      fill: {
                          type: 'gradient',
                          gradient: {
                              shade: 'dark',
                              type: 'vertical',
                              shadeIntensity: 0.5,
                              gradientToColors: ['#FEB019'],
                              inverseColors: false,
                              opacityFrom: 0.7,
                              opacityTo: 0.1,
                              stops: [0, 100]
                          }
                      },
                      colors: ['#FF4560'],
                      title: {
                          text: 'Resoluciones de la Semana',
                          align: 'center'
                      },
                      tooltip: {
                          enabled: true
                      }
                  };
      
                  var chart = new ApexCharts(document.querySelector("#chart"), options);
                  chart.render();
              });
      });
   </script>
   <script>
      window.onload = function () {
          var fecha = new Date();
          var mes = fecha.getMonth() + 1; // Sumar 1 para obtener el mes correcto
          var dia = fecha.getDate();
          var anio = fecha.getFullYear();
          var horas = fecha.getHours();
          var minutos = fecha.getMinutes();
      
          // Añadir ceros a la izquierda si es necesario
          if (dia < 10) dia = '0' + dia;
          if (mes < 10) mes = '0' + mes; // Aquí se ajusta para el formato 'MM'
          if (horas < 10) horas = '0' + horas;
          if (minutos < 10) minutos = '0' + minutos;
      
          document.getElementById('fecha').value = anio + "-" + mes + "-" + dia + "T" + horas + ":" + minutos;
      }
      
         
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