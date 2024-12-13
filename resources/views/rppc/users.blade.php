<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | Usuarios 
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
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <!--  END CUSTOM STYLE FILE  -->
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <style>
      .custom-dropdown .dropdown-menu.show {
      z-index: 1050;
      }

      /* Estilo general para todos los botones */
button {
    background-color: #9e192d; /* Color de fondo personalizado */
    color: #ffffff; /* Color del texto */
    border: 1px solid #9e192d; /* Borde del mismo color que el fondo */
    padding: 0.375rem 0.75rem; /* Espaciado interno similar a Bootstrap */
    font-size: 1rem; /* Tamaño de fuente estándar */
    line-height: 1.5; /* Altura de línea */
    border-radius: 0.375rem; /* Bordes redondeados como Bootstrap */
    transition: background-color 0.2s ease, color 0.2s ease; /* Transición suave */
    cursor: pointer; /* Cambiar el cursor al pasar */
    display: inline-block; /* Asegurar que se comporten como botones en línea */
    text-align: center; /* Centrar el texto */
    text-decoration: none; /* Sin subrayado */
    font-weight: 400; /* Peso estándar de la fuente */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

/* Efecto hover */
button:hover {
    background-color: #7c1524; /* Color más oscuro en hover */
    color: #ffffff; /* Mantener el texto blanco */
    border-color: #7c1524; /* Ajustar el borde */
}

/* Efecto al hacer clic */
button:active {
    background-color: #6a1220; /* Aún más oscuro al hacer clic */
    border-color: #6a1220; /* Borde consistente */
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2); /* Sombra interna */
}

/* Botones deshabilitados */
button:disabled {
    background-color: #d3d3d3; /* Color gris claro para deshabilitado */
    color: #6c757d; /* Texto gris */
    border-color: #d3d3d3; /* Sin contraste de borde */
    cursor: not-allowed; /* Mostrar que no es interactivo */
    opacity: 0.65; /* Reducir visibilidad */
}


   </style>
   <div class="row layout-top-spacing">
      <h3>Usuarios</h3>
   </div>


   <div class="row">
      <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
         <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
               <table class="multi-table table dt-table-hover" style="width:100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Departamento</th>
                        <th>Delegación</th>
                        <th>Dependencia</th>
                        <th>Cabeza de sector</th>
                        <th>Acción</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $i = 1; @endphp
                     @foreach($usuarios as $u)
                     <tr>
                        <td>{{ $i }}</td>
                        <td>
                           <div class="avatar" style="margin-right: 10px;">
<img alt="avatar" src="{{ $u->image ? '/file/'.$u->image : '/file/def.jpg' }}" class="rounded-circle" />
                              </div>{{ $u->nombre }}
                        </td>
                        <td>{{ $u->rol }}</td>
                        <td>{{ $u->departamento }}</td>
                        <td>{{ $u->delegacion }}</td>
                        <td>{{ $u->dependencia }}</td>
                        <td>{{ $u->cabeza_sector }}</td>
                        <td><button data-bs-toggle="modal" data-bs-target="#editModal{{ $u->usuario_id }}" type="button">Cambiar rol</button></td>
                     </tr>
                     @php $i++; @endphp
                     @include('rppc.cambiar_rol')
                     @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Departamento</th>
                        <th>Delegación</th>
                        <th>Dependencia</th>
                        <th>Cabeza de sector</th>
                        <th>Acción</th>
                     </tr>
                  </tfoot>
               </table>
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
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>