<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Inbox
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <!--  BEGIN CUSTOM STYLE FILE  -->
   @vite(['resources/scss/light/plugins/editors/quill/quill.snow.scss'])
   @vite(['resources/scss/light/assets/apps/todolist.scss'])
   @vite(['resources/scss/light/assets/components/modal.scss'])
   @vite(['resources/scss/dark/plugins/editors/quill/quill.snow.scss'])
   @vite(['resources/scss/dark/assets/apps/todolist.scss'])
   @vite(['resources/scss/dark/assets/components/modal.scss'])
   @vite(['resources/css/sweet.css'])
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
   <!--  END CUSTOM STYLE FILE  -->
   <style>
      .avatar-img {
      width: 40px; /* Ajusta el tamaño según sea necesario */
      height: 40px; /* Mantén la proporción */
      border-radius: 50%; /* Para hacerla circular */  
      }
      .spacing {
      margin-right: 10px;
      }
      input[readonly] {
      background-color: #f0f0f0; /* Color de fondo más oscuro */
      color: #333; /* Color del texto */
      border: 1px solid #ccc; /* Borde */
      }
      input[readonly]:focus {
      border-color: #007bff; /* Cambia el color del borde al enfocar */
      outline: none; /* Sin contorno */
      }
   </style>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <div class="row layout-top-spacing">
   <div class="col-xl-12 col-lg-12 col-md-12">
   <div class="mail-box-container">
   <div class="mail-overlay"></div>
   <div class="tab-title">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
               <path d="M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z"></path>
            </svg>
            <h5 class="app-title">Ticket Inbox</h5>
         </div>
         <div class="col-md-12 col-sm-12 col-12 ps-0">
            <div class="todoList-sidebar-scroll mt-4">
               <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link list-actions active" id="all-list" data-toggle="pill" href="#pills-inbox" role="tab" aria-selected="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                           <line x1="8" y1="6" x2="21" y2="6"></line>
                           <line x1="8" y1="12" x2="21" y2="12"></line>
                           <line x1="8" y1="18" x2="21" y2="18"></line>
                           <line x1="3" y1="6" x2="3" y2="6"></line>
                           <line x1="3" y1="12" x2="3" y2="12"></line>
                           <line x1="3" y1="18" x2="3" y2="18"></line>
                        </svg>
                        Inbox <span class="todo-badge badge"></span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link list-actions" id="todo-task-done" data-toggle="pill" href="#pills-sentmail" role="tab" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up">
                           <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                        </svg>
                        Resueltos <span class="todo-badge badge"></span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link list-actions" id="todo-task-important" data-toggle="pill" href="#pills-important" role="tab" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                           <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        En proceso <span class="todo-badge badge"></span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link list-actions" id="todo-task-trash" data-toggle="pill" href="#pills-trash" role="tab" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-door-closed">
                           <path d="M18 20V6a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v14"/>
                           <path d="M2 20h20"/>
                           <path d="M14 12v.01"/>
                        </svg>
                        Cerrado
                     </a>
                  <li class="nav-item">
                     <a class="nav-link list-actions" id="todo-task-send" data-toggle="pill" href="#pills-trash" role="tab" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send">
                           <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/>
                           <path d="m21.854 2.147-10.94 10.939"/>
                        </svg>
                        Enviados <span class="todo-badge badge"></span>
                     </a>
                  </li>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link list-actions" id="todo-task-trash" data-toggle="pill" href="#pills-trash" role="tab" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader">
                           <path d="M12 2v4"/>
                           <path d="m16.2 7.8 2.9-2.9"/>
                           <path d="M18 12h4"/>
                           <path d="m16.2 16.2 2.9 2.9"/>
                           <path d="M12 18v4"/>
                           <path d="m4.9 19.1 2.9-2.9"/>
                           <path d="M2 12h4"/>
                           <path d="m4.9 4.9 2.9 2.9"/>
                        </svg>
                        En espera
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-12 col-sm-12 col-12">
            <button type="button" class="btn btn-success ms-5 mt-3" data-bs-toggle="modal" data-bs-target="#inputFormModal">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2">
                  <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/>
                  <path d="M14 2v4a2 2 0 0 0 2 2h4"/>
                  <path d="M3 15h6"/>
                  <path d="M6 12v6"/>
               </svg>
               Nuevo Ticket
            </button>
         </div>
      </div>
   </div>
   <div id="todo-inbox" class="accordion todo-inbox">
   <div class="search">
      <input type="text" class="form-control input-search" placeholder="Buscar Ticket...">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none">
         <line x1="3" y1="12" x2="21" y2="12"></line>
         <line x1="3" y1="6" x2="21" y2="6"></line>
         <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
   </div>
   <div class="todo-box">
      <div id="ct" class="todo-box-scroll">
         @foreach($tickets as $t)
         @if($t->estado == 5)
         <div class="todo-item all-list todo-task-done" id="estado-{{ $t->ticket_id }}">
            @elseif($t->estado == 3 || $t->estado == 4)
            <div class="todo-item all-list todo-task-important" id="estado-{{ $t->ticket_id }}">
               @elseif($t->estado == 6)
               <div class="todo-item todo-task-trash" id="estado-{{ $t->ticket_id }}">
                  @else
                  <div class="todo-item all-list" id="estado-{{ $t->ticket_id }}">
                     @endif
                     <div class="todo-item-inner" data-status="{{ $t->estado }}" >
                        <div class="n-chk text-center">
                           <div class="form-check form-check-primary form-check-inline mt-1 me-0" data-bs-toggle="collapse" data-bs-target>
                              <input class="form-check-input inbox-chkbox" type="checkbox">
                           </div>
                        </div>
                        <div class="todo-content">
                           <span class="apertura" style="display: none;">{{ $t->fecha_aper }}</span>
                           <span class="limite" style="display: none;">{{ $t->fecha_lim }}</span>
                           <span class="nu_ticket" style="display: none;">{{ $t->nu_ticket }}</span>
                           <span class="categoria" style="display: none;">{{ $t->categoria }}</span>
                           <span class="tipo" style="display: none;">{{ $t->tipo }}</span>
                           <span class="estado" style="display: none;">{{ $t->estado }}</span>
                           <span class="urgencia" style="display: none;">{{ $t->urgencia }}</span>
                           <span class="impacto" style="display: none;">{{ $t->impacto }}</span>
                           <span class="prioridad" style="display: none;">{{ $t->prioridad }}</span>
                           <span class="id_t" style="display: none;">{{ $t->ticket_id }}</span>
                           <div class="todo-header" style="display: flex; align-items: center;">
                              <img src="{{Vite::asset('resources/images/icon_user.png')}}" class="avatar-img spacing" alt="avatar">
                              <h5 class="todo-heading spacing" data-todoHeading="{{ $t->titulo }}" style="margin: 0;">
                                 {{$t->titulo}}
                              </h5>
                           </div>
                           <!-- <span class="spacing" style="display: block; margin-left: 40px;">{{ $t->tipo }}</span> --->
                           <p class="todo-text" 
                              data-todoHtml="{{ $t->descripcion }}" 
                              data-todoText='{"ops":[{"insert":"{{ $t->descripcion }}\n"}]}'>
                              {{ $t->descripcion }}
                           </p>
                        </div>
                        <div class="priority-dropdown custom-dropdown-icon">
                           <span style="white-space: nowrap;" >
                           {{ $t->fecha_aper }}
                           @if($t->urgencia == 2)
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#DE2E03" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon">
                              <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                              <line x1="12" y1="8" x2="12" y2="12"></line>
                              <line x1="12" y1="16" x2="12" y2="16"></line>
                           </svg>
                           @elseif($t->urgencia == 1)
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon">
                              <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                              <line x1="12" y1="8" x2="12" y2="12"></line>
                              <line x1="12" y1="16" x2="12" y2="16"></line>
                           </svg>
                           @elseif($t->urgencia == 3)
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFA500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon">
                              <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                              <line x1="12" y1="8" x2="12" y2="12"></line>
                              <line x1="12" y1="16" x2="12" y2="16"></line>
                           </svg>
                           @elseif($t->urgencia == 4)
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon">
                              <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                              <line x1="12" y1="8" x2="12" y2="12"></line>
                              <line x1="12" y1="16" x2="12" y2="16"></line>
                           </svg>
                           @elseif($t->urgencia == 5)
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon">
                              <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                              <line x1="12" y1="8" x2="12" y2="12"></line>
                              <line x1="12" y1="16" x2="12" y2="16"></line>
                           </svg>
                           @else
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon">
                              <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                              <line x1="12" y1="8" x2="12" y2="12"></line>
                              <line x1="12" y1="16" x2="12" y2="16"></line>
                           </svg>
                           @endif
                           <br>
                           <span class="spacing">{{ $t->remitente_id }}</span>
                        </div>
                        <div class="action-dropdown custom-dropdown-icon">
                           <div class="dropdown">
                              <a class="dropdown-toggle wa" href="#" role="button" id="dropdownMenuLink-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                 </svg>
                              </a>
                              <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-2">
                                 <a class="important dropdown-item" data-bs-toggle="modal" data-bs-target="#inputFormModal2{{ $t->ticket_id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                       <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                       <path d="m15 5 4 4"/>
                                    </svg>
                                    Actualizar
                                 </a>
                                 <!--  <a class="important dropdown-item" href="javascript:void(0);">Important</a>
                                    <a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
                                    <a class="dropdown-item permanent-delete" href="javascript:void(0);">Permanent Delete</a>
                                    <a class="dropdown-item revive" href="javascript:void(0);">Revive Task</a>
                                    -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal fade" id="todoShowListItem" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="task-heading modal-title mb-0"></h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                       <line x1="18" y1="6" x2="6" y2="18"></line>
                                       <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="compose-box">
                                    <div class="compose-content">
                                       <p class="task-text"></p>
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
                                                   <input name="fecha_apertura" type="text" id="inApertura"   class="form-control">
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
                                                   <input name="fecha_limite" type="datetime-local" id="inLimite" class="form-control">
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
                                                   <select name="tipo" id="inTipo" class="form-control">
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
                                                   <select name="categoria" id="inCat" class="form-control">
                                                      <option value="" disabled selected>Seleccione una categoría</option>
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
                                                   <select name="estado" id="inEstado" class="form-control">
                                                      <option value="" disabled selected>Seleccione un estado</option>
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
                                                   <select name="urgencia" id="inUrgencia" class="form-control">
                                                      <option value="" disabled {{ old('urgencia', $t->urgencia) == '' ? 'selected' : '' }}>Seleccione una urgencia</option>
                                                      <option value="1">Muy urgente</option>
                                                      <option value="2">Urgente</option>
                                                      <option value="3">Mediana</option>
                                                      <option value="4">Baja</option>
                                                      <option value="5" >Muy baja</option>
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
                                                   <select name="impacto" id="inImpacto" class="form-control">
                                                      <option value="" disabled selected>Seleccione un impacto</option>
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
                                                   <select name="prioridad" id="inPrioridad" class="form-control">
                                                      <option value="" disabled selected>Seleccione una prioridad</option>
                                                      <option value="1">Muy alta</option>
                                                      <option value="2">Alta</option>
                                                      <option value="3">Mediana</option>
                                                      <option value="4" >Baja</option>
                                                      <option value="5">Muy baja</option>
                                                      <!-- Agrega más opciones según sea necesario -->
                                                   </select>
                                                   <span class="validation-text"></span>
                                                </div>
                                             </div>
                                          </div>
                                          <div>
                                             <hr>
                                          </div>
                                       </div>
                                       <div class="attachments">
                                          <h4>Archivos:</h4>
                                          <ul id="fileList"></ul>
                                          <div id="previewContainer" style="display: none;">
                                             <iframe id="previewIframe" style="width: 100%; height: 500px;"></iframe>
                                             <button class="btn" id="closeIframe">Cerrar</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn" data-bs-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @include('rppc.tickets.view-ticket')
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <!-- Modal -->
         <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title add-title" id="addTaskModalTitleLabel1">Add Task</h5>
                     <h5 class="modal-title edit-title" id="addTaskModalTitleLabel2" style="display: none;">Edit Task</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                           <line x1="18" y1="6" x2="6" y2="18"></line>
                           <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="compose-box">
                        <div class="compose-content" id="addTaskModalTitle">
                           <form>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes">
                                          <path d="M12 20h9"></path>
                                          <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                       </svg>
                                       <div class="w-100">
                                          <input id="task" type="text" placeholder="Task" class="form-control" name="task">
                                          <span class="validation-text"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="d-flex  mail-subject">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text flaticon-menu-list">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                 </svg>
                                 <div class="w-100">
                                    <div id="taskdescription" class=""></div>
                                    <span class="validation-text"></span>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button class="btn btn-" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                     <button class="btn add-tsk btn-primary">Add Task</button>
                     <button class="btn edit-tsk btn-success">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
   <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
   @vite(['resources/assets/js/apps/todoList.js'])
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
      document.addEventListener('DOMContentLoaded', function() {
      // Función para verificar el estatus de los tickets
      function updateTicketStatus() {
         var ticketItems = document.getElementById('estado');
         
         ticketItems.forEach(function(ticket) {
             var status = ticket.getAttribute('data-status');
      
             if (status === '5') {
                 ticket.classList.add('todo-task-done'); // Añade la clase si está resuelto
             } else {
                 ticket.classList.remove('todo-task-done'); // Quita la clase si no está resuelto
             }
         });
         
         // Llama a tu notificación aquí si es necesario
      }
      
      // Llama a la función para inicializar el estatus
      updateTicketStatus();
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
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>