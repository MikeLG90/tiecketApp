<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Inbox 
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
      background-color: #E91E63 !important;; /* Color de fondo */
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
   </div>
   <a href="#" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#inputFormModal">Nuevo Ticket
   </a>
   <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
         <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Inbox</button>
         <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">En Proceso</button>
         <button class="nav-link" id="espera" data-bs-toggle="tab" data-bs-target="#espera" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">En Espera</button>

      </div>
   </nav>
   <div class="tab-content" id="nav-tabContent">
   <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="row">
         <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow no-rounded-corners">
               <div class="widget-content widget-content-area">
                  <table class="multi-table table dt-table-hover" style="width:100%">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>De: </th>
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
                           <td>{{ $t->remitente_id }}</td>
                           <td>{{ $t->titulo }}</td>
                           <td>
                              @switch($t->urgencia)
                              @case(1)
                              <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span>
                              @break
                              @case(2)
                              <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span> 
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
                              <!-- Contenido si ninguna de las anteriores se cumple -->
                              <span class="badge badge-light-info mb-2 me-4">Indefinida</span>
                              @endswitch
                           </td>
                           <td>{{ $t->fecha_aper }}<span class="id_t" style="display: none;">{{ $t->ticket_id }}</span>                           </td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                 <a data-bs-toggle="modal" data-bs-target="#ticket-modal{{ $t->ticket_id }}" data-ticket-id="{{ $t->ticket_id }}" type="button" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                       <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                       <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    <span></span>
                                 </a>
                                 <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3{{ $t->ticket_id }}" type="button" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                       <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                       <path d="m15 5 4 4"/>
                                    </svg>
                                    <span></span>   
                                 </a>
                                 <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3{{ $t->ticket_id }}" type="button" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                       <path d="M3 6h18"/>
                                       <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                       <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                       <line x1="10" x2="10" y1="11" y2="17"/>
                                       <line x1="14" x2="14" y1="11" y2="17"/>
                                    </svg>
                                    <span></span>   
                                 </a>
                              </div>
                              @include('rppc.tickets.view-ticket')

                           </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>#</th>
                           <th>De: </th>
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
   <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   @include('rppc.tickets.proceso')  
   </div>
   <div class="tab-pane fade" id="espera" role="tabpanel" aria-labelledby="nav-home-tab">
   @include('rppc.tickets.espera')  

   </div>
   <div class="modal fade inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title">Nuevo Ticket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">
               <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
               </svg>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <!--         <div class="col-md-12">
                     <div class="mb-4 mail-form">
                         <p>From:</p>
                         <select class="form-control" id="m-form">
                             <option value="info@mail.com">Info &lt;info@mail.com&gt;</option>
                             <option value="shaun@mail.com">Shaun Park &lt;shaun@mail.com&gt;</option>
                         </select>
                     </div>
                     </div>
                     </div> -->
                  <div class="row">
                     <div class="col-md-6">
                        <div class="mb-4 mail-to">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                 <path d="M8 2v4"/>
                                 <path d="M16 2v4"/>
                                 <rect width="18" height="18" x="3" y="4" rx="2"/>
                                 <path d="M3 10h18"/>
                              </svg>
                              Fecha de apertura:
                           </p>
                           <div class="">
                              <input name="fecha_apertura" type="datetime-local" id="fecha" class="form-control" readonly>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                 <path d="M8 2v4"/>
                                 <path d="M16 2v4"/>
                                 <rect width="18" height="18" x="3" y="4" rx="2"/>
                                 <path d="M3 10h18"/>
                              </svg>
                              Fecha límite:
                           </p>
                           <div>
                              <input name="fecha_limite" type="datetime-local" id="m-cc" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dot">
                                 <circle cx="12" cy="12" r="10"/>
                                 <circle cx="12" cy="12" r="1"/>
                              </svg>
                              Tipo:
                           </p>
                           <div>
                              <select name="tipo" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="1">Incidente</option>
                                 <option value="2">Solicitar</option>
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle">
                                 <circle cx="12" cy="12" r="10"/>
                              </svg>
                              Categoría:
                           </p>
                           <div>
                              <select name="categoria" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="1">Acuerdo</option>
                                 <option value="2">Apertura de folio</option>
                                 <option value="3">Resolución</option>
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                        <!--  Estado -->
                     </div>
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-area">
                                 <path d="M3 3v16a2 2 0 0 0 2 2h16"/>
                                 <path d="M7 11.207a.5.5 0 0 1 .146-.353l2-2a.5.5 0 0 1 .708 0l3.292 3.292a.5.5 0 0 0 .708 0l4.292-4.292a.5.5 0 0 1 .854.353V16a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1z"/>
                              </svg>
                              Estado
                           </p>
                           <div>
                              <select name="estado" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="1">Nuevo</option>
                                 <option value="2">En curso (Asignada)</option>
                                 <option value="3">En curso (Planificada)</option>
                                 <option value="4">En espera</option>
                                 <option value="5">Resuelto</option>
                                 <option value="6">Cerrado</option>
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <!-- Urgencia --->
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-currency">
                                 <circle cx="12" cy="12" r="8"/>
                                 <line x1="3" x2="6" y1="3" y2="6"/>
                                 <line x1="21" x2="18" y1="3" y2="6"/>
                                 <line x1="3" x2="6" y1="21" y2="18"/>
                                 <line x1="21" x2="18" y1="21" y2="18"/>
                              </svg>
                              Urgencia:
                           </p>
                           <div>
                              <select name="urgencia" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="1">Muy urgente</option>
                                 <option value="2">Urgente</option>
                                 <option value="3">Mediana</option>
                                 <option value="4">Baja</option>
                                 <option value="5">Muy baja</option>
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <!-- Impacto -->
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert">
                                 <circle cx="12" cy="12" r="10"/>
                                 <line x1="12" x2="12" y1="8" y2="12"/>
                                 <line x1="12" x2="12.01" y1="16" y2="16"/>
                              </svg>
                              Impacto:
                           </p>
                           <div>
                              <select name="impacto" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="1">Muy alto</option>
                                 <option value="2">Alto</option>
                                 <option value="3">Mediano</option>
                                 <option value="4">Bajo</option>
                                 <option value="5">Muy bajo</option>
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <!-- Prioridad -->
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-aperture">
                                 <circle cx="12" cy="12" r="10"/>
                                 <path d="m14.31 8 5.74 9.94"/>
                                 <path d="M9.69 8h11.48"/>
                                 <path d="m7.38 12 5.74-9.94"/>
                                 <path d="M9.69 16 3.95 6.06"/>
                                 <path d="M14.31 16H2.83"/>
                                 <path d="m16.62 12-5.74 9.94"/>
                              </svg>
                              Prioridad:
                           </p>
                           <div>
                              <select name="prioridad" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="1">Muy alta</option>
                                 <option value="2">Alta</option>
                                 <option value="3">Mediana</option>
                                 <option value="4">Baja</option>
                                 <option value="5">Muy baja</option>
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-4 mail-to">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-captions">
                                 <rect width="18" height="14" x="3" y="5" rx="2" ry="2"/>
                                 <path d="M7 15h4M15 15h2M7 11h2M13 11h4"/>
                              </svg>
                              Título:
                           </p>
                           <div class="">
                              <input name="titulo" type="text" id="m-to" class="form-control" placeholder="Ingrese el título del ticket">
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-4 mail-cc">
                           <p>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building-2">
                                 <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                                 <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                                 <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                                 <path d="M10 6h4"/>
                                 <path d="M10 10h4"/>
                                 <path d="M10 14h4"/>
                                 <path d="M10 18h4"/>
                              </svg>
                              Oficina:
                           </p>
                           <div>
                              <select name="oficina" id="oficina" class="form-control">
                                 <option value="" disabled selected>Seleccione una oficina</option>
                                 @foreach ($oficinas as $o)
                                 <option value="{{ $o->oficina_id }}">{{ $o->oficina }}</option>
                                 @endforeach
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class="mb-4 mail-subject">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round">
                              <circle cx="12" cy="8" r="5"/>
                              <path d="M20 21a8 8 0 0 0-16 0"/>
                           </svg>
                           Para:
                        </p>
                        <div class="w-100">
                           <select name="usuario_id" id="usuarios" class="form-control">
                              <option value="" disabled selected>Seleccione a quién se le asignará el ticket</option>
                              <!-- Agrega más opciones según sea necesario -->
                           </select>
                           <span class="validation-text"></span>
                        </div>
                     </div>
                     <div class="">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-down">
                              <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                              <path d="M12 10v6"/>
                              <path d="m15 13-3 3-3-3"/>
                           </svg>
                           Subir archivos:
                        </p>
                        <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                        <input class="form-control file-upload-input" type="file" name="attachments[]" multiple>
                        <br>
                     </div>
                     <div class="w-100">
                        <p for="exampleFormControlTextarea1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notebook-pen">
                              <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4"/>
                              <path d="M2 6h4"/>
                              <path d="M2 10h4"/>
                              <path d="M2 14h4"/>
                              <path d="M2 18h4"/>
                              <path d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/>
                           </svg>
                           Descripción
                        </p>
                        <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <span class="validation-text"></span>
                     </div>
                     <div>
                        <hr>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Enviar</button>
            </form>
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
          var mes = fecha.getMonth();
          var dia = fecha.getDate();
          var anio = fecha.getFullYear();
          var horas = fecha.getHours();
          var minutos = fecha.getMinutes();
      
          // Añadir ceros a la izquierda si es necesario
          if (dia < 10) dia = '0' + dia;
          if (mes < 10) mes = '0' + mes;
          if (horas < 10) horas = '0' + horas;
          if (minutos < 10) minutos = '0' + minutos;
      
          document.getElementById('fecha').value = anio + "-" + mes + "-" + dia + "T" + horas + ":" + minutos;
          
      }
      
      // Función para bloquear la entrada de texto
      function blockInput(id) {
      const inputElement = document.getElementById(id);
      inputElement.addEventListener('keydown', function(event) {
      event.preventDefault(); // Bloquea la entrada
      });
      }
      
      // Llama a la función para cada input que deseas bloquear
      blockInput('inApertura');
      blockInput('inLimite');
      blockInput('inTipo'); // Esto no se puede bloquear porque es un select
      blockInput('inCat');
      blockInput('inEstado');
      blockInput('inUrgencia');
      blockInput('inImpacto');
      blockInput('inPrioridad');
      
   </script>
<script>
    function cargarArchivosTicket(idTicket) {
        console.log(`Cargando archivos para el ticket ID: ${idTicket}`); // Verifica si el ticket tiene el ID correcto

        $.ajax({
            url: '/ticket/files/' + idTicket, // Ruta para obtener los archivos del ticket
            method: 'GET',
            success: function(files) {
                console.log(files); // Verifica qué archivos se están recibiendo en la respuesta

                // Limpiar la lista de archivos del modal antes de agregar los nuevos
                $('#fileList').empty();

                // Verificar si se recibieron archivos
                if (files.length === 0) {
                    $('#fileList').append('<li>No hay archivos para este ticket.</li>');
                } else {
                    // Recorrer los archivos y agregarlos a la lista
                    files.forEach(file => {
                        const extension = file.file_path.split('.').pop().toLowerCase();
                        const iconClass = getFileIcon(extension);

                        $('#fileList').append(`
                            <li>
                                <i class="${iconClass}"></i> <!-- Icono según el tipo de archivo -->
                                <a href="#" class="file-link" data-file-name="${file.file_path.split('/').pop()}">
                                    ${file.file_path.split('/').pop()}
                                </a>
                            </li>
                        `);
                    });
                }

                // Mostrar el modal con los archivos cargados
                $('#ticket-modal').modal('show');
            },
            error: function() {
                alert('Error al cargar los archivos del ticket.');
            }
        });
    }

    // Evento para abrir la vista previa en el iframe
    $(document).on('click', '.file-link', function(event) {
        event.preventDefault();
        const fileName = $(this).data('file-name');
        const extension = fileName.split('.').pop().toLowerCase();

        // Validar si el archivo es compatible con la previsualización
        if (['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'].includes(extension)) {
            $('#previewIframe').attr('src', '/file/' + encodeURIComponent(fileName));
            $('#previewContainer').show(); // Mostrar el contenedor del iframe
        } else {
            alert('No se puede previsualizar este tipo de archivo.');
        }
    });

    // Cerrar el iframe al ocultar el modal
    $(document).on('click', '#closeIframe', function() {
        $('#previewContainer').hide();
        $('#previewIframe').attr('src', ''); // Limpiar el iframe
    });

    // Función para obtener el icono según la extensión del archivo
    function getFileIcon(extension) {
        const icons = {
            'pdf': 'fas fa-file-pdf',
            'jpg': 'fas fa-file-image',
            'jpeg': 'fas fa-file-image',
            'png': 'fas fa-file-image',
            'doc': 'fas fa-file-word',
            'docx': 'fas fa-file-word',
            'txt': 'fas fa-file-alt',
            // Agrega más extensiones e iconos según sea necesario
        };
        return icons[extension] || 'fas fa-file'; // Icono por defecto
    }

    // Llamar a la función al hacer clic en el botón
    $('.btn-info').on('click', function() {
        const ticketId = $(this).data('ticket-id');
        cargarArchivosTicket(ticketId);
    });
</script>

   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>