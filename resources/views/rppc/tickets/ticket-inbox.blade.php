<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Tickets 
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   @vite(['resources/scss/light/assets/components/modal.scss'])
   @vite(['resources/scss/dark/assets/components/modal.scss'])
   @vite(['resources/scss/light/assets/components/tabs.scss'])
   @vite(['resources/scss/dark/assets/components/tabs.scss'])
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
   <!--  END CUSTOM STYLE FILE  -->
   <!--  END CUSTOM STYLE FILE  -->
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
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
   <div class="row layout-top-spacing">
      <h3>Tickets</h3>
      <!-- Nav Tabs -->
      <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox">
                  <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/>
                  <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>
               </svg>
               Inbox <span class="badge bg-danger">{{ $total_tickets3 }}</span>
            </button>
            @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3)
            <button class="nav-link" id="nav-profile-tab3" data-bs-toggle="tab" data-bs-target="#nav-profile3" type="button" role="tab" aria-controls="nav-profile3" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tickets">
                  <path d="m4.5 8 10.58-5.06a1 1 0 0 1 1.342.488L18.5 8"/>
                  <path d="M6 10V8"/>
                  <path d="M6 14v1"/>
                  <path d="M6 19v2"/>
                  <rect x="2" y="8" width="20" height="13" rx="2"/>
               </svg>
               Todos los tickets <span class="badge bg-danger">{{ $total_tickets }}</span>
            </button>
            @endif
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-text">
                  <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/>
                  <path d="M8 11h8"/>
                  <path d="M8 7h6"/>
               </svg>
               Antecedentes - 1
            </button>
            <button class="nav-link" id="nav-profile-tab1" data-bs-toggle="tab" data-bs-target="#nav-profile1" type="button" role="tab" aria-controls="nav-profile1" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-text">
                  <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/>
                  <path d="M8 11h8"/>
                  <path d="M8 7h6"/>
               </svg>
               Antecedentes - 2
            </button>
            @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 8)
            <button class="nav-link" id="nav-profile-tab2" data-bs-toggle="tab" data-bs-target="#nav-profile2" type="button" role="tab" aria-controls="nav-profile1" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-x">
                  <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
                  <path d="m9.5 14.5 5-5"/>
                  <path d="m9.5 9.5 5 5"/>
               </svg>
               Sin categorizar <span class="badge bg-danger">{{ $total_tickets2 }}</span>
            </button>
            @endif
            <button class="nav-link" id="nav-profile-tab4" data-bs-toggle="tab" data-bs-target="#nav-profile4" type="button" role="tab" aria-controls="nav-profile1" aria-selected="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send">
                  <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/>
                  <path d="m21.854 2.147-10.94 10.939"/>
               </svg>
               Enviados <span class="badge bg-danger">{{ $total_tickets4 }}</span>
            </button>
         </div>
      </nav>
   </div>
   <a href="#" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#inputFormModal">Nuevo Ticket</a>
   <!-- Tab Content -->
  <div class="tab-content" id="nav-tabContent">

      <!-- Inbox Tab -->
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
         <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow no-rounded-corners">
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
                        @foreach($tickets3 as $t)
                        <tr>
                           <td>{{ $i }}</td>
                           <td>

                              {{ $t->remitente_id }} 
                              <p>({{ $t->oficina_remitente }})</p>
                           </td>
                           <td>{{ $t->titulo }}</td>
                           <td>
                              @switch($t->urgencia)
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
                           <td>{{ $t->fecha_aper }}<span class="id_t" style="display: none;">{{ $t->ticket_id }}</span></td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                 <button class="btn btn-info" data-ticket-id="{{ $t->ticket_id }}" data-toggle="modal" data-target="#filesModal">
                                    <!-- Icono de ver -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                       <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                       <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                 </button>
                                 <a data-bs-toggle="modal" data-bs-target="#editModal{{ $t->ticket_id }}" type="button" class="btn btn-warning" 
                                    style="border-radius: 0 5px 5px 0;">
                                    <!-- Icono de editar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                       <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                       <path d="m15 5 4 4"/>
                                    </svg>
                                 </a>
                                 @include('rppc.tickets.edit-ticket')
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
      @include('rppc.tickets.files-ticket')
      <!-- Mis tickets -->
      <div class="tab-pane fade" id="nav-profile3" role="tabpanel" aria-labelledby="nav-profile-tab3">
         <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow no-rounded-corners">
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
                        @foreach($tickets as $t)
                        <tr>
                           <td>{{ $i }}</td>
                           <td>
                              {{ $t->remitente_id }}
                              <p>({{ $t->oficina_remitente }})</p>
                           </td>
                           <td>{{ $t->titulo }}</td>
                           <td>
                              @switch($t->urgencia)
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
                           <td>{{ $t->fecha_aper }}<span class="id_t" style="display: none;">{{ $t->ticket_id }}</span></td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                 <button class="btn btn-info" data-ticket-id="{{ $t->ticket_id }}" data-toggle="modal" data-target="#filesModal">
                                    <!-- Icono de ver -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                       <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                       <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                 </button>
                                 <a data-bs-toggle="modal" data-bs-target="#editModal3{{ $t->ticket_id }}" type="button" class="btn btn-warning" 
                                    style="border-radius: 0 5px 5px 0;">
                                    <!-- Icono de editar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                       <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                       <path d="m15 5 4 4"/>
                                    </svg>
                                 </a>
                                 @include('rppc.tickets.edit-ticket3')
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
      <!-- Antecedentes - 1 Tab -->
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
         <div class="statbox widget box box-shadow no-rounded-corners">
            <div class="widget-content widget-content-area">
               <table class="multi-table table dt-table-hover" style="width:100%">
                  <thead>
                     <tr>
                        <th>Entrada</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Fecha de apertura</th>
                        <th>Prioridad</th>
                        <th>Solicitante</th>
                        <th>Asignada a técnico</th>
                        <th>Categoría</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $i = 1; @endphp
                     @foreach($registros_1 as $r)
                     <tr>
                        <td>{{ $r->ID }}</td>
                        <td>{{ $r->Titulo }}</td>
                        <td>{{ $r->Estado }}</td>
                        <td>{{ $r->Ultima_modificacion }}</td>
                        <td>{{ $r->Fecha_apertura }}</td>
                        <td>{{ $r->Prioridad }}</td>
                        <td>{{ $r->Solicitante }}</td>
                        <td>{{ $r->Asignada_a_tecnico }}</td>
                        <td>{{ $r->Categoria }}</td>
                     </tr>
                     @php $i++; @endphp
                     @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Entrada</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Fecha de apertura</th>
                        <th>Prioridad</th>
                        <th>Solicitante</th>
                        <th>Asignada a técnico</th>
                        <th>Categoría</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
      <!-- Antecedentes - 2 Tab -->
      <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1">
         <div class="statbox widget box box-shadow no-rounded-corners">
            <div class="widget-content widget-content-area">
               <table class="multi-table table dt-table-hover" style="width:100%">
                  <thead>
                     <tr>
                        <th>Entrada</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Fecha de apertura</th>
                        <th>Prioridad</th>
                        <th>Solicitante</th>
                        <th>Asignada a técnico</th>
                        <th>Categoría</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $i = 1; @endphp
                     @foreach($registros_2 as $r)
                     <tr>
                        <td>{{ $r->ID }}</td>
                        <td>{{ $r->Titulo }}</td>
                        <td>{{ $r->Estado }}</td>
                        <td>{{ $r->Ultima_modificacion }}</td>
                        <td>{{ $r->Fecha_apertura }}</td>
                        <td>{{ $r->Prioridad }}</td>
                        <td>{{ $r->Solicitante }}</td>
                        <td>{{ $r->Asignada_a_tecnico }}</td>
                        <td>{{ $r->Categoria }}</td>
                     </tr>
                     @php $i++; @endphp
                     @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Entrada</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Última modificación</th>
                        <th>Fecha de apertura</th>
                        <th>Prioridad</th>
                        <th>Solicitante</th>
                        <th>Asignada a técnico</th>
                        <th>Categoría</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
      <!-- Sin Categorizar -->
      <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
         <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow no-rounded-corners">
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
                        @foreach($tickets2 as $t)
                        <tr>
                           <td>{{ $i }}</td>
                           <td>
                              {{ $t->remitente_id }}
                              <p>({{ $t->oficina_remitente }})</p>
                           </td>
                           <td>{{ $t->titulo }}</td>
                           <td>
                              @switch($t->urgencia)
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
                           <td>{{ $t->fecha_aper }}<span class="id_t" style="display: none;">{{ $t->ticket_id }}</span></td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                 <button class="btn btn-info" data-ticket-id="{{ $t->ticket_id }}" data-toggle="modal" data-target="#filesModal">
                                    <!-- Icono de ver -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                       <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                       <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                 </button>
                                 <a data-bs-toggle="modal" data-bs-target="#editModal2{{ $t->ticket_id }}" type="button" class="btn btn-warning" 
                                    style="border-radius: 0 5px 5px 0;">
                                    <!-- Icono de editar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                       <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                       <path d="m15 5 4 4"/>
                                    </svg>
                                 </a>
                                 @include('rppc.tickets.edit-ticket2')
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
      <!-- Sin Categorizar -->
      <div class="tab-pane fade" id="nav-profile4" role="tabpanel" aria-labelledby="nav-profile-tab4">
         <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow no-rounded-corners">
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
                        @foreach($tickets4 as $t)
                        <tr>
                           <td>{{ $i }}</td>
                           <td>
                              {{ $t->remitente_id }}
                              <p>({{ $t->oficina_remitente }})</p>
                           </td>
                           <td>{{ $t->titulo }}</td>
                           <td>
                              @switch($t->urgencia)
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
                           <td>{{ $t->fecha_aper }}<span class="id_t" style="display: none;">{{ $t->ticket_id }}</span></td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                 <button class="btn btn-info" data-ticket-id="{{ $t->ticket_id }}" data-toggle="modal" data-target="#filesModal">
                                    <!-- Icono de ver -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                       <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                       <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                 </button>
                                 <a data-bs-toggle="modal" data-bs-target="#editModal4{{ $t->ticket_id }}" type="button" class="btn btn-warning" 
                                    style="border-radius: 0 5px 5px 0;">
                                    <!-- Icono de editar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                       <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                       <path d="m15 5 4 4"/>
                                    </svg>
                                 </a>
                                 @include('rppc.tickets.edit-ticket4')
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
   </div>
   <!-- Modals -->
   @include('rppc.tickets.create-ticket')
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
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
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
      document.getElementById('oficina').addEventListener('change', function() {
          let oficinaId = this.value;
      
          fetch(`/usuarios/oficina/${oficinaId}`)
              .then(response => response.json())
              .then(data => {
                  let usuariosSelect = document.getElementById('usuarios');
                  usuariosSelect.innerHTML = '<option value="">Seleccione un usuario</option>';
                  
                  data.forEach(usuario => {
                      let option = document.createElement('option');
                      option.value = usuario.usuario_id;
                      option.textContent = usuario.nombre_completo;  
                      usuariosSelect.appendChild(option);
                  });
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
   <script>
      $(document).ready(function() {
          $('.btn-info').on('click', function() {
              const ticketId = $(this).data('ticket-id'); // Obtener ID del ticket
              
              // Realizar la solicitud AJAX para obtener detalles del ticket y archivos
              $.ajax({
                  url: '/ticket/files/' + ticketId,
                  method: 'GET',
                  success: function(data) {
                      console.log(data); // Verifica qué datos se están recibiendo
                      
                      // Limpiar los detalles y la lista de archivos antes de agregar nuevos
                      $('#fileList').empty();
                      // Acceder al primer elemento del array 'ticket'
                     const ticket = data.ticket[0]; // Primero asegurarte de que 'ticket' es un array
                      
                      // Llenar los campos del formulario con datos del ticket
                      $('#inApertura').val(ticket.fecha_aper);
                      $('#inLimite').val(ticket.fecha_lim);
                      $('#inTipo').val(ticket.tipo);
                      $('#inCat').val(ticket.categoria);
                      $('#inEstado').val(ticket.estado);
                      $('#inUrgencia').val(ticket.urgencia);
                      $('#inImpacto').val(ticket.impacto);
                      $('#inPrioridad').val(ticket.prioridad);
                      $('#textarea-t').val(ticket.descripcion);         
      
                      // Mostrar archivos adjuntos
                      if (data.files.length === 0) {
                          $('#fileList').append('<li>No hay archivos para este ticket.</li>');
                      } else {
                          data.files.forEach(file => {
                              const fileName = file.file_path.split('/').pop(); // Obtener solo el nombre del archivo
                              $('#fileList').append(`
                                  <li>
                                      <a href="/file/${encodeURIComponent(fileName)}" target="_blank">${fileName}</a> <!-- Enlace para ver el archivo -->
                                  </li>
                              `);
                          });
                      }
                  },
                  error: function() {
                      alert('Error al cargar los detalles del ticket.');
                  }
              });
          });
      });
   </script>
   <script>
      document.getElementById('store').addEventListener('submit', function(event) {
       // Obtener todos los campos del formulario
       const campos = document.querySelectorAll('#store input[required], #store select[required], #store textarea[required]');
       let todosLlenos = true;
      
       // Verificar si todos los campos están llenos
       campos.forEach(function(campo) {
           if (campo.value === '') {
               todosLlenos = false;
           }
       });
      
       // Si algún campo está vacío, evitar el envío del formulario
       if (!todosLlenos) {
           event.preventDefault(); // Detener el envío del formulario
           alert('Por favor, complete todos los campos antes de enviar el formulario.');
       }
      });
      
   </script>
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>