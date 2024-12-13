<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Grupos 
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
   @vite(['resources/scss/light/assets/components/carousel.scss'])
   @vite(['resources/scss/light/assets/components/modal.scss'])
   @vite(['resources/scss/light/assets/components/tabs.scss'])
   @vite(['resources/scss/dark/assets/components/carousel.scss'])
   @vite(['resources/scss/dark/assets/components/modal.scss'])
   @vite(['resources/scss/dark/assets/components/tabs.scss'])
   <link rel="stylesheet" href="{{asset('plugins/animate/animate.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/filepond/filepond.min.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/filepond/FilePondPluginImagePreview.min.css')}}">
   @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss'])
   @vite(['resources/scss/dark/plugins/filepond/custom-filepond.scss'])
   <!-- Estilos del sweet alert-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- Select2 componentes -->
   <!-- Styles -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
   <!-- Or for RTL support -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
   <!--  BEGIN CUSTOM STYLE FILE  -->
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
      <h3>Grupos</h3>
   </div>

   <a href="#" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Nuevo</a>
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
         <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
               <table class="multi-table table dt-table-hover" style="width:100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $i = 1; @endphp
                     @foreach($grupos as $g)
                     <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $g->nombre }}</td>
                        <td>{{ $g->descripcion }}</td>
                        <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" type="button" class="btn btn-primary">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                 </svg>
                              </a>
                              <button class="btn btn-info" data-group-id="{{ $g->group_id }}" data-bs-toggle="modal" data-bs-target="#filesModal1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                    <circle cx="12" cy="12" r="3"/>
                                 </svg>
                              </button>

                              <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" type="button" class="btn btn-primary">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
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
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Grupo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
               </svg>
            </button>
         </div>
         <div class="modal-body">
            <h4 class="modal-heading mb-4 mt-2">Porfavor llene el formulario</h4>
            <div class="row mb-4">
               <div class="form-group mb-4">
                  <form method="POST" action="{{ route('grupo.store') }}">
                     @csrf
                     <label for="disabledTextInput">Nombre del grupo</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
               </div>
               <label for="basic-url" class="form-label">Miembros</label>
               <div class="input-group mb-3">
               <select class="form-select" id="multiple-select-field" data-placeholder="Elige Miembros" multiple name="miembros[]" onchange="concatenarUsers()">
               <option value="">Selecciona los miembros para este grupo</option>
               @foreach ($users as $user)         
               <option value="{{ $user->usuario_id }}">{{ $user->nombre_completo }}</option>
               @endforeach
               </select>
               </div>
               <input type="hidden" name="miembros_ids" id="miembros_ids">
               <label for="basic-url" class="form-label">Descripción</label>
               <div class="input-group mb-3">
               <input type="text" class="form-control" name="descripcion">
               </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/><path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/><path d="M7 3v4a1 1 0 0 0 1 1h7"/></svg> Guardar</button>
               </form>
               <button class="btn btn-light-dark" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg> Descartar</button>
               </div>
            </div>
         </div>
      </div>
   </div><!-- Contenido del modal -->
</div>


      <!-- Modal para ver datos del grupo -->
      <!-- Modal -->
      <div class="modal fade" id="filesModal1" tabindex="-1" aria-labelledby="filesModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
         <!-- Encabezado del modal -->
         <div class="modal-header">
            <h5 class="modal-title" id="filesModalLabel">Miembros</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <!-- Cuerpo del modal -->
         <div class="modal-body">
            <!-- Detalles del ticket -->
            <div class="row">
               <div class="col-md-12">
                  <h6>Información del grupo</h6>
                  <hr>
                  <table id="group-table" class="table table-bordered">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Nombre del Miembro</th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- Los miembros serán insertados aquí -->
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- Pie del modal -->
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
   <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> 
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
      $( '#multiple-select-field' ).select2( {
      theme: "bootstrap-5",
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      placeholder: $( this ).data( 'placeholder' ),
      closeOnSelect: false,
      } );
   </script>
   <script>
      function concatenarUsers() {
         const selectElement = document.getElementById('multiple-select-field');
         const selectedOptions = Array.from(selectElement.selectedOptions);
         const selectedIds = selectedOptions.map(option => option.value).join(' | ');
      
         //Pasar los ids concatenados al input hidden
         document.getElementById('miembros_ids').value =selectedIds;
      }
   </script>
   <script>
      $(document).ready(function() {
         $('.btn-info').on('click', function() {
            const grupoId = $(this).data('group-id');
            const tableBody = document.getElementById("group-table").querySelector("tbody");
            tableBody.innerHTML = ""; // Limpia el contenido anterior
            // Solicitud AJAX para obtener detalles del grupo 
            $.ajax({
               url: '/miembros/' + grupoId,
               method: 'GET',
               success:function(data) {
                //  $('#group-table').empty();
      
                  //obtener el primer grupo del array
                  const miembros = data.miembros;
                  console.log(miembros); // Verifica el formato de los datos
                  
                  miembros.forEach((miembro, index) => {
                     const row =document.createElement('tr');
                     row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${miembro}</td>
                     `;
                     tableBody.appendChild(row);
                  });
               },
               error:function () {
                  alert('Hubo un error al cargar lso datos del grupo')
               }
            });
         });
      });
   </script>
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>