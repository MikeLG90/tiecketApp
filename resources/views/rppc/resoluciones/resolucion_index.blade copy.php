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
         @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 8 || Auth::user()->rol_id == 6)
         <li class="nav-item" role="presentation">
            <a class="nav-link" id="fill-tab-3" data-bs-toggle="tab" href="#fill-tabpanel-3" role="tab" aria-controls="fill-tabpanel-3" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-minus">
                  <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
                  <path d="M9 12h6"/>
               </svg>
               @php
               $array = null;
               foreach($resoluciones as $r){
               if($r->estatus == 0) {
               $array++;
               }
               }
               $cantidad = $array;
               @endphp
               @switch (true)
               @case($cantidad > 0)
               Pendientes<span class="badge bg-danger">{{ $cantidad }}</span>
               @break
               @default
               Pendientes<span class="badge bg-danger"></span>
               @endswitch
            </a>
         </li>
         @endif
         <li class="nav-item" role="presentation">
            <a class="nav-link" id="fill-tab-3" data-bs-toggle="tab" href="#fill-tabpanel-4" role="tab" aria-controls="fill-tabpanel-4" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send">
                  <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/>
                  <path d="m21.854 2.147-10.94 10.939"/>
               </svg>
               Enviados
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
                  <div class="widget-content widget-content-area">
                     <table class="multi-table table dt-table-hover" style="width:100%">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php $i = 1; @endphp
                           @foreach($resoluciones as $r)
                           <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $r->remitente }}</td>
                              <td>{{ $r->titulo }}</td>
                              <td>
                                 @switch($r->urgencia)
                                 @case(1)
                                 <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span>
                                 @break
                                 @case(2)
                                 <span class="badge badge-light-danger mb-2 me-4">Urgente</span>
                                 @break
                                 @case(3)
                                 <span class="badge badge-light-warning mb-2 me-4">Mediana</span>
                                 @break
                                 @case(4)
                                 <span class="badge badge-light-success mb-2 me-4">Baja</span>
                                 @break
                                 @case(5)
                                 <span class="badge badge-light-info mb-2 me-4">Muy Baja</span>
                                 @break
                                 @default
                                 <span class="badge badge-light-info mb-2 me-4">Indefinida</span>
                                 @endswitch
                              </td>
                              <td>{{ $r->fecha_aper }}</td>
                              <td>
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info" href="/resolucion/{{ $r->resolucion_id }}">
                                       <!-- Icono de ver -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                          <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                          <circle cx="12" cy="12" r="3"/>
                                       </svg>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#editModal2" type="button" class="btn btn-warning" 
                                       style="border-radius: 0 5px 5px 0;">
                                       <!-- Icono de editar -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                          <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                          <path d="m15 5 4 4"/>
                                       </svg>
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @php $i++; @endphp
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
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
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php $i = 1; @endphp
                           @foreach($resoluciones as $r)
                           @if($r->estatus == 1)
                           <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $r->remitente }}</td>
                              <td>{{ $r->titulo }}</td>
                              <td>
                                 @switch($r->urgencia)
                                 @case(1)
                                 <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span>
                                 @break
                                 @case(2)
                                 <span class="badge badge-light-danger mb-2 me-4">Urgente</span>
                                 @break
                                 @case(3)
                                 <span class="badge badge-light-warning mb-2 me-4">Mediana</span>
                                 @break
                                 @case(4)
                                 <span class="badge badge-light-success mb-2 me-4">Baja</span>
                                 @break
                                 @case(5)
                                 <span class="badge badge-light-info mb-2 me-4">Muy Baja</span>
                                 @break
                                 @default
                                 <span class="badge badge-light-info mb-2 me-4">Indefinida</span>
                                 @endswitch
                              </td>
                              <td>{{ $r->fecha_aper }}</td>
                              <td>
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info" href="/resolucion/{{ $r->resolucion_id }}">
                                       <!-- Icono de ver -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                          <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                          <circle cx="12" cy="12" r="3"/>
                                       </svg>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#editModal2" type="button" class="btn btn-warning" 
                                       style="border-radius: 0 5px 5px 0;">
                                       <!-- Icono de editar -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                          <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                          <path d="m15 5 4 4"/>
                                       </svg>
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @php $i++; @endphp
                           @endif
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
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
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php $i = 1; @endphp
                           @foreach($resoluciones as $r)
                           @if($r->estatus == 0)
                           <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $r->remitente }}</td>
                              <td>{{ $r->titulo }}</td>
                              <td>
                                 @switch($r->urgencia)
                                 @case(1)
                                 <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span>
                                 @break
                                 @case(2)
                                 <span class="badge badge-light-danger mb-2 me-4">Urgente</span>
                                 @break
                                 @case(3)
                                 <span class="badge badge-light-warning mb-2 me-4">Mediana</span>
                                 @break
                                 @case(4)
                                 <span class="badge badge-light-success mb-2 me-4">Baja</span>
                                 @break
                                 @case(5)
                                 <span class="badge badge-light-info mb-2 me-4">Muy Baja</span>
                                 @break
                                 @default
                                 <span class="badge badge-light-info mb-2 me-4">Indefinida</span>
                                 @endswitch
                              </td>
                              <td>{{ $r->fecha_aper }}</td>
                              <td>
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info" href="/resolucion/{{ $r->resolucion_id }}">
                                       <!-- Icono de ver -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                          <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                          <circle cx="12" cy="12" r="3"/>
                                       </svg>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#editModal2" type="button" class="btn btn-warning" 
                                       style="border-radius: 0 5px 5px 0;">
                                       <!-- Icono de editar -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                          <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                          <path d="m15 5 4 4"/>
                                       </svg>
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @php $i++; @endphp
                           @endif
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="fill-tabpanel-4" role="tabpanel" aria-labelledby="fill-tab-4">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
               <div class="statbox widget box box-shadow">
                  <div class="widget-content widget-content-area">
                     <table class="multi-table table dt-table-hover" style="width:100%">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php $i = 1; @endphp
                           @foreach($resoluciones as $r)
                           @if($r->usuario_id == auth()->user()->usuario_id)
                           <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $r->remitente }}</td>
                              <td>{{ $r->titulo }}</td>
                              <td>
                                 @switch($r->urgencia)
                                 @case(1)
                                 <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span>
                                 @break
                                 @case(2)
                                 <span class="badge badge-light-danger mb-2 me-4">Urgente</span>
                                 @break
                                 @case(3)
                                 <span class="badge badge-light-warning mb-2 me-4">Mediana</span>
                                 @break
                                 @case(4)
                                 <span class="badge badge-light-success mb-2 me-4">Baja</span>
                                 @break
                                 @case(5)
                                 <span class="badge badge-light-info mb-2 me-4">Muy Baja</span>
                                 @break
                                 @default
                                 <span class="badge badge-light-info mb-2 me-4">Indefinida</span>
                                 @endswitch
                              </td>
                              <td>{{ $r->fecha_aper }}</td>
                              <td>
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info" href="/resolucion/{{ $r->resolucion_id }}">
                                       <!-- Icono de ver -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                          <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                          <circle cx="12" cy="12" r="3"/>
                                       </svg>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#editModal2" type="button" class="btn btn-warning" 
                                       style="border-radius: 0 5px 5px 0;">
                                       <!-- Icono de editar -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                          <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                          <path d="m15 5 4 4"/>
                                       </svg>
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @php $i++; @endphp
                           @endif
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>#</th>
                              <th>De:</th>
                              <th>Asunto</th>
                              <th>Urgencia</th>
                              <th>Fecha de apertura</th>
                              <th>Acciones</th>
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