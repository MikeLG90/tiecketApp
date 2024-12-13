<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Áreas 
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
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
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link rel="stylesheet" href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}">
   @vite(['resources/scss/light/plugins/notification/snackbar/custom-snackbar.scss'])
   <!-- Estilos del sweet alert-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!--  END CUSTOM STYLE FILE  -->  
     
   <style>
      .description-cell {
    word-wrap: break-word;
    word-break: break-all;
    max-width: 30px; /* Ajusta el ancho máximo según lo que necesites */
    white-space: normal;
}
/* Estilo para el contenedor del grupo de botones */
.button-group {
    display: inline-flex; /* Alinear los botones horizontalmente */
    border: 1px solid #9e192d; /* Borde externo para todo el grupo */
    border-radius: 0.375rem; /* Bordes redondeados */
    overflow: hidden; /* Asegurar que los bordes redondeados funcionen */
}

/* Estilo para cada botón en el grupo */
.button-group button {
    background-color: #9e192d; /* Color de fondo */
    color: #ffffff; /* Texto blanco */
    border: none; /* Eliminar bordes predeterminados */
    padding: 0.375rem 0.75rem; /* Espaciado interno */
    font-size: 1rem; /* Tamaño de fuente */
    line-height: 1.5; /* Altura de línea */
    cursor: pointer; /* Cambiar el cursor al pasar */
    text-align: center; /* Centrar texto */
    text-decoration: none; /* Sin subrayado */
    font-weight: 400; /* Peso estándar */
    transition: background-color 0.2s ease, color 0.2s ease; /* Transición suave */
    flex: 1; /* Permitir que los botones se distribuyan uniformemente */
    position: relative; /* Necesario para el separador */
}

/* Estilo para el primer botón del grupo */
.button-group button:first-child {
    border-radius: 0.375rem 0 0 0.375rem; /* Bordes redondeados izquierdo */
}

/* Estilo para el último botón del grupo */
.button-group button:last-child {
    border-radius: 0 0.375rem 0.375rem 0; /* Bordes redondeados derecho */
}

/* Separador entre los botones */
.button-group button:not(:last-child)::after {
    content: ''; /* Crear un separador visual */
    width: 1px; /* Grosor del separador */
    height: 100%; /* Altura completa del botón */
    background-color: #7c1524; /* Mismo color que el botón hover */
    position: absolute; /* Posicionar dentro del botón */
    top: 0;
    right: 0;
}

/* Efecto hover para los botones */
.button-group button:hover {
    background-color: #7c1524; /* Color más oscuro al pasar el ratón */
}

/* Efecto clic (activo) */
.button-group button:active {
    background-color: #6a1220; /* Aún más oscuro al hacer clic */
}

/* Botón deshabilitado */
.button-group button:disabled {
    background-color: #d3d3d3; /* Fondo gris claro */
    color: #6c757d; /* Texto gris */
    cursor: not-allowed; /* Mostrar que no es interactivo */
    opacity: 0.65; /* Reducir visibilidad */
}

   </style>
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BREADCRUMB -->
   <div class="row layout-top-spacing">
      <h3>Departamentos</h3>
   </div>
   <!-- /BREADCRUMB -->
   <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
         <button type="button" class="btn btn-primary mb-2 mr-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
               <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
               <polyline points="14 2 14 8 20 8"></polyline>
               <line x1="12" y1="18" x2="12" y2="12"></line>
               <line x1="9" y1="15" x2="15" y2="15"></line>
            </svg>
            Nueva área
         </button>
         <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table table-striped dt-table-hover" style="width:50%">
               <thead>
                  <tr>
                  <th>#</th>
                     <th>ID</th>
                     <th>Área</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               <tbody>
               @php $i = 1; @endphp
               @foreach($areas as $a)           
                  <tr>
                     <td>{{ $i }}</td>
                     <td>{{ $a->area_id }}</td>
                     <td>{{ $a->area }}</td>
                     <td>
                        <div class="button-group" role="group" aria-label="Basic example">
                           <button data-bs-toggle="modal" data-bs-target="#exampleModalCenter2{{ $a->area_id }}" type="button">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                              <span>Editar</span>
</button>
                           <button data-bs-toggle="modal" data-bs-target="#exampleModalCenter3{{ $a->area_id }}" type="button" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                           <span>Eliminar</span>   
</button>
                        </div>
                    @include('rppc.areas.editar-area')
                    @include('rppc.areas.delete-area')
                     </td>
                  </tr>
                  @php $i++; @endphp
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <th>#</th>
                     <th>ID</th>
                     <th>Área</th>
                     <th>Acciones</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
   <!-- Modal store -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenterTitle">Nueva área</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                     <line x1="18" y1="6" x2="6" y2="18"></line>
                     <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg>
               </button>
            </div>
            <div class="modal-body">
               <h4 class="modal-heading mb-4 mt-2">Porfavor ingrese el nombre de la nueva área</h4>
               <div class="row mb-4">
                  <div class="form-group mb-4">
                     <form method="POST" action="{{ route('area.store') }}">
                        @csrf
                        <label for="disabledTextInput">Nombre del área</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
  </div>
  <label for="basic-url" class="form-label">Seleccione la dependencia</label>
               <div class="input-group mb-3">
               <select class="form-select" aria-label="Default select example" id="dependencia">
               <option selected>--Dependencia--</option>
               @foreach($dependencias as $d)
                <option value="{{ $d->dep_id }}">{{ $d->nombre }}</option>
                @endforeach
            </select>            
               </div>
             <label for="basic-url" class="form-label">Seleccione la delegación</label>
               <div class="input-group mb-3">
               <select class="form-select" aria-label="Default select example" id="oficinas" name="oficina">
               <option selected>--Delegación--</option>

            </select>            
               </div>

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/><path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/><path d="M7 3v4a1 1 0 0 0 1 1h7"/></svg> Guardar</button>
            </form>
            <button class="btn btn-light-dark" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg> Descartar</button>
            </div>
         </div>
      </div>
   </div>
   <!--  BEGIN CUSTOM SCRIPTS FILE  -->
   <x-slot:footerFiles>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
   </script>
   <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
   @vite(['resources/assets/js/custom.js'])
   <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script>
      $('#zero-config').DataTable({
          "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          "oLanguage": {
              "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Mostrando páginas PAGE of PAGES",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Buscar..",
             "sLengthMenu": "Resultados :  MENU",
          },
          "stripeClasses": [],
          "lengthMenu": [7, 10, 20, 50],
          "pageLength": 10 
      });
   </script>
   <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
   {{-- <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script> --}}
   @vite(['resources/assets/js/components/notification/custom-snackbar.js'])
   <script class="module">
      // Get the Toast button
      var toastButton = document.getElementById("toast-btn");
      // Get the Toast element
      var toastElement = document.getElementsByClassName("toast")[0];
      
      var toast = new bootstrap.Toast(toastElement)
      toastButton.onclick = function() {
          toast.show();
      }
      
      
   </script>
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
      document.getElementById('dependencia').addEventListener('change', function() {
          let depId = this.value;
      
          fetch(`/oficinas/dependencia/${depId}`)
              .then(response => response.json())
              .then(data => {
                  let oficinasSelect = document.getElementById('oficinas');
                  oficinasSelect.innerHTML = '<option value="">Seleccione una delegación</option>';
                  
                  data.forEach(oficina => {
                      let option = document.createElement('option');
                      option.value = oficina.oficina_id;
                      option.textContent = oficina.nombre;  
                      oficinasSelect.appendChild(option);
                  });
              });
      });
   </script>

   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>