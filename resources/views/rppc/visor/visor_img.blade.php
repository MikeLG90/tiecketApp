<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Visor de Libros</title>
      <!-- Bootstrap CSS -->
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="icon" type="image/x-icon" href="{{Vite::asset('resources/images/favicon_qroo.ico')}}"/>
      @vite(['resources/scss/layouts/modern-light-menu/light/loader.scss'])
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
      @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
      @vite(['resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss'])
      @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
      @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])
      @vite(['resources/css/visor.css'])
      <style>
         .canvas-container { 
    text-align: center; /* Optional: centers any text inside the container */ 
         } 
      </style>
   </head>
   <body>
      <!-- Navbar -->
      <!--    <nav class="navbar navbar-expand-lg navbar-dark">
         <div class="container-fluid">
             <a class="navbar-brand" href="#">Visor de Libros</a>
         </div>
         </nav> -->
      <a href="/crear-folio" class="btn-flotante">Volver</a>
      <div class="container mx-auto px-4 mt-4">
         <div class="flex flex-col md:flex-row">
            <!-- Sidebar Izquierdo -->
            <div class="w-full md:w-1/4 lg:w-1/5 p-4 bg-gray-100 rounded-lg">
               <div class="text-center mb-6">
                  <a href="/crear-folio" class="inline-block">
                  <img src="{{ Vite::asset('resources/images/rppc_logo2.png') }}" width="140" height="50" alt="company" class="max-w-full h-auto">
                  </a>
               </div>
               <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-1">Oficina</label>
                  <select id="oficina" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                     <option selected>Seleccione una oficina</option>
                     <option value="1">Chetumal</option>
                     <option value="2">Cancún</option>
                     <option value="3">Playa del Carmen</option>
                     <option value="4">Cozumel</option>
                  </select>
               </div>
               <div class="mb-4 flex space-x-2">
                  <div class="flex-1">
                     <label class="block text-sm font-medium text-gray-700 mb-1">Sección</label>
                     <input type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Ingrese sección" id="seccion">
                  </div>
                  <div class="flex-1">
                     <label class="block text-sm font-medium text-gray-700 mb-1">Tomo</label>
                     <input type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Ingrese tomo" id="tomo">
                  </div>
               </div>
               <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6" id="buscar">Buscar</button>
               <label class="block text-sm font-medium text-gray-700 mb-2">Imágenes</label>
               <div class="overflow-x-auto mb-6 table-container2">
                  <table class="min-w-full divide-y divide-gray-200" id="imagenes">
                     <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Imagnes de un libro -->
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Contenido Principal -->
            <div class="w-full md:w-3/4 lg:w-4/5 pl-0 md:pl-6">
               <!-- Tabla Principal -->
               <div class="overflow-x-auto mb-6 table-container">
                  <table class="min-w-full divide-y divide-gray-200" id="libros">
                     <thead class="bg-gray-50">
                        <tr>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id Libro</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id Oficina</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sección</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tomo</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volumen</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foja inicial</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foja final</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Inscripciones</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estatus</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observaciones</th>
                        </tr>
                     </thead>
                     <tbody class="bg-white divide-y divide-gray-200">
                     </tbody>
                  </table>
               </div>
               <div id="controls" class="flex space-x-2 mb-4">
                  <button class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600" id="prev"><i class="fa-solid fa-angle-left"></i></button>
                  <input class="w-16 text-center border-gray-300 rounded-md" type="number" id="page-num" value="1">
                  <button class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600" id="next"><i class="fa-solid fa-angle-right"></i></button>
                  <button class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600" id="zoom-in"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                  <button class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600" id="zoom-out"><i class="fa-solid fa-magnifying-glass-minus"></i></button>
                  <button class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600" id="download"><i class="fa-solid fa-download"></i></button>
                  <button class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600" id="print"><i class="fa-solid fa-print"></i></button>
               </div>
               <div id="canvas-container" class="border border-gray-300 rounded-lg overflow-hidden">
                  <canvas id="pdf-canvas"></canvas>
                  
               </div>
               <!-- Visor PDF -->
            </div>
         </div>
      </div>
      
      <!-- Bootstrap JS Bundle -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <!-- jQuery CDN -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
      @vite(['resources/assets/js/custom.js'])
      @vite(['resources/js/visor/visor.js'])
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/custom_miscellaneous.js')}}"></script>
   </body>
</html>