<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   Ejemplo
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <!--  BEGIN CUSTOM STYLE FILE  -->
   @vite(['resources/scss/light/assets/apps/invoice-preview.scss'])
   @vite(['resources/scss/dark/assets/apps/invoice-preview.scss'])
   @vite(['resources/scss/light/assets/elements/custom-pagination.scss'])
   @vite(['resources/scss/light/assets/apps/blog-post.scss'])
   @vite(['resources/scss/dark/assets/elements/custom-pagination.scss'])
   @vite(['resources/scss/dark/assets/apps/blog-post.scss'])
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!--  END CUSTOM STYLE FILE  -->
   <style>
      form {
      display: inline-block;
      }
   </style>
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <div class="row invoice layout-top-spacing layout-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="doc-container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="invoice-container">
                     <div class="invoice-inbox">
                        <div id="ct" class="">
                           <div class="invoice-00001">
                              <div class="content-section">
                                 <div class="inv--head-section inv--detail-section">
                                    <div class="row">
                                       <div class="col-sm-6 col-12 mr-auto">
                                          <div class="d-flex">
                                             <img class="navbar-logo logo-dark" src="{{Vite::asset('resources/images/logo-png-rppc.png')}}" width="120" height="60" alt="company">
                                             <h3 class="in-heading align-self-center">Resolución: {{ $resolucion[0]->titulo }}</h3>
                                          </div>
                                          <!--   <p class="inv-street-addr mt-3">XYZ Delta Street</p>
                                             <p class="inv-email-address">info@company.com</p>
                                             <p class="inv-email-address">(120) 456 789</p> -->
                                       </div>
                                       <div class="col-sm-6 text-sm-end">
                                          <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Fecha de apertura: </span> <span class="inv-date">{{ $resolucion[0]->fecha_aper }}</span></p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="inv--detail-section inv--customer-detail-section">
                                    <div class="row">
                                       <div class="col-xl-12 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                          <p class="inv-to">Generado por: </p>
                                       </div>
                                       <div class="col-xl-12 col-lg-7 col-md-6 col-sm-4">
                                          <p class="inv-customer-name">{{ $resolucion[0]->remitente }}</p>
                                          <p class="inv-street-addr">{{ $resolucion[0]->oficina_dest }}</p>
                                          <p class="inv-email-address">
                                             Urgencia:
                                             @switch($resolucion[0]->urgencia)
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
                                          </p>
                                          <p class="inv-email-address">
                                             Estado:
                                             @switch($resolucion[0]->estatus)
                                             @case(0)
                                             <span class="badge badge-light-warning mb-2 me-4">EN REVISIÓN</span>
                                             @break
                                             @case(1)
                                             <span class="badge badge-light-success mb-2 me-4">APROBADA</span>
                                             @break
                                             @default
                                             <span class="badge badge-light-info mb-2 me-4">Indefinida</span>
                                             @endswitch
                                          </p>
                                          <hr>
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
                                                      <input name="fecha_apertura" type="text" id="fecha" class="form-control" readonly value="{{ $resolucion[0]->fecha_aper }}">
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
                                                      <select name="tipo" id="m-cc" class="form-control" required>
                                                         <option value="" disabled selected>Seleccione un tipo</option>
                                                         <option value="1" {{ $resolucion[0]->tipo == 1 ? 'selected' : '' }}>Incidente</option>
                                                         <option value="2" {{ $resolucion[0]->tipo == 2 ? 'selected' : '' }}>Solicitar</option>
                                                         <!-- Agrega más opciones según sea necesario -->
                                                      </select>
                                                      <span class="validation-text"></span>
                                                   </div>
                                                </div>
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
                                                      <select name="estado" id="m-cc" class="form-control" required>
                                                         <option value="" disabled selected>Seleccione un tipo</option>
                                                         <option value="1" {{ $resolucion[0]->estado == 1 ? 'selected' : '' }}>Nuevo</option>
                                                         <option value="2" {{ $resolucion[0]->estado == 2 ? 'selected' : '' }}>En curso (Asignada)</option>
                                                         <option value="3" {{ $resolucion[0]->estado == 3 ? 'selected' : '' }}>En curso (Planificada)</option>
                                                         <option value="4" {{ $resolucion[0]->estado == 4 ? 'selected' : '' }}>En espera</option>
                                                         <option value="5" {{ $resolucion[0]->estado == 5 ? 'selected' : '' }}>Resuelto</option>
                                                         <option value="6" {{ $resolucion[0]->estado == 6 ? 'selected' : '' }}>Cerrado</option>
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
                                                      <select name="urgencia" id="m-cc" class="form-control" required>
                                                         <option value="" disabled selected>Seleccione un tipo</option>
                                                         <option value="1" {{ $resolucion[0]->urgencia == 1 ? 'selected' : '' }}>Muy urgente</option>
                                                         <option value="2" {{ $resolucion[0]->urgencia == 2 ? 'selected' : '' }}>Urgente</option>
                                                         <option value="3" {{ $resolucion[0]->urgencia == 3 ? 'selected' : '' }}>Mediana</option>
                                                         <option value="4" {{ $resolucion[0]->urgencia == 4 ? 'selected' : '' }}>Baja</option>
                                                         <option value="5" {{ $resolucion[0]->urgencia == 5 ? 'selected' : '' }}>Muy baja</option>
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
                                                      <select name="impacto" id="m-cc" class="form-control" required>
                                                         <option value="" disabled selected>Seleccione un tipo</option>
                                                         <option value="1" {{ $resolucion[0]->impacto == 1 ? 'selected' : '' }}>Muy alto</option>
                                                         <option value="2" {{ $resolucion[0]->impacto == 2 ? 'selected' : '' }}>Alto</option>
                                                         <option value="3" {{ $resolucion[0]->impacto == 3 ? 'selected' : '' }}>Mediano</option>
                                                         <option value="4" {{ $resolucion[0]->impacto == 4 ? 'selected' : '' }}>Bajo</option>
                                                         <option value="5" {{ $resolucion[0]->impacto == 5 ? 'selected' : '' }}>Muy bajo</option>
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
                                                      <select name="prioridad" id="m-cc" class="form-control" required>
                                                         <option value="" disabled selected>Seleccione un tipo</option>
                                                         <option value="1" {{ $resolucion[0]->prioridad == 1 ? 'selected' : '' }}>Muy alta</option>
                                                         <option value="2" {{ $resolucion[0]->prioridad == 2 ? 'selected' : '' }}>Alta</option>
                                                         <option value="3" {{ $resolucion[0]->prioridad == 3 ? 'selected' : '' }}>Mediana</option>
                                                         <option value="4" {{ $resolucion[0]->prioridad == 4 ? 'selected' : '' }}>Baja</option>
                                                         <option value="5" {{ $resolucion[0]->prioridad == 5 ? 'selected' : '' }}>Muy baja</option>
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
                                                      <input required name="titulo" type="text" id="m-to" class="form-control" placeholder="Ingrese el título del ticket" value="{{ $resolucion[0]->titulo }}">
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
                                                      <input required name="titulo" type="text" id="m-to" class="form-control" placeholder="Ingrese el título del ticket" value="{{ $resolucion[0]->oficina_dest }}">
                                                      <span class="validation-text"></span>
                                                   </div>
                                                </div>
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
                                                <textarea required name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $resolucion[0]->descripcion }}</textarea>
                                                <span class="validation-text"></span>
                                             </div>
                                             <div>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <p class="inv-to">Anexo: </p>
                                       <ul id="filelist"></ul>
                                       <!-- Aquí se cargarán los archivos -->
                                       <br>
                                    </div>
                                 </div>
                                 <div class="d-grid gap-2 col-6 mx-auto">
                                    <!-- Default -->

                                       <button class="btn btn-success mb-4" type="submit" id="aprobar-btn">
                                          Aprobar 
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big">
                                             <path d="M21.801 10A10 10 0 1 1 17 3.335"/>
                                             <path d="m9 11 3 3L22 4"/>
                                          </svg>
                                       </button>

                                 </div>
                                 <div class="inv--note">
                                    <div class="row mt-4">
                                       <div class="col-sm-12 col-12 order-sm-0 order-1">
                                          <hr>
                                          <p>Añade una <span class="text-success">observación</span> para la aprobación de esta resolución</p>
                                          <h2 class="mb-5">Observaciones <span class="comment-count"></span></h2>
                                          <div class="post-comments">
                                             <div id="comentarios">
                                                @foreach($comentarios as $c)
                                                <div class="media mb-5 pb-5 primary-comment">
                                                   <div class="avatar me-4">
                                                      <img alt="avatar" src="{{ $c->image ? '/file/'.$c->image : '/file/def.jpg' }}" class="rounded-circle" />
                                                   </div>
                                                   <div class="media-body">
                                                      <h5 class="media-heading mb-1">{{ $c->usuario }}</h5>
                                                      <div class="meta-info mb-0">{{ $c->created_at }}</div>
                                                      <p class="media-text mt-2 mb-0">{{ $c->contenido }}</p>
                                                   </div>
                                                </div>
                                                @endforeach
                                             </div>
                                             <div class="post-pagination">
                                                <div class="pagination-no_spacing">
                                                   <ul class="pagination">
                                                      <li>
                                                         <a href="javascript:void(0);" class="prev">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                                                               <polyline points="15 18 9 12 15 6"></polyline>
                                                            </svg>
                                                         </a>
                                                      </li>
                                                      <li><a href="javascript:void(0);">1</a></li>
                                                      <li><a href="javascript:void(0);" class="active">2</a></li>
                                                      <li><a href="javascript:void(0);">3</a></li>
                                                      <li>
                                                         <a href="javascript:void(0);" class="next">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                               <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                         </a>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="post-form mt-5">
                                             <div class="section add-comment">
                                                <div class="info">
                                                   <h6 class="">Anexa una observación</h6>
                                                   <p>Añade un <span class="text-success">comentario</span> de esta resolución.</p>
                                                   <div class="row mt-4">
                                                      <form id="form-comentario" action="/comentario/store" method="POST">
                                                         @csrf
                                                         <div class="col-md-12">
                                                            <div class="mb-3">
                                                               <label class="form-label">Escribe la observación</label>
                                                               <textarea class="form-control" cols="30" rows="10" name="contenido" id="contenido"></textarea>
                                                               <input type="hidden" name="resolucion_id" value="{{ $resolucion[0]->resolucion_id }}" id="resolucion_id">
                                                            </div>
                                                         </div>
                                                   </div>
                                                   <div class="text-end mt-4">
                                                   <button class="btn btn-success" type="submit">Añade comentario</button>
                                                   </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--  BEGIN CUSTOM SCRIPTS FILE  -->
   <x-slot:footerFiles>
   @vite(['resources/assets/js/apps/invoice-preview.js'])
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
   <script>
      $(document).ready(function(){
         const resolucion_id = $('#resolucion_id').val();
      
         loadResolucionDetails(resolucion_id);
      
         // Función para cargar los detalles de la resolución
      
         function loadResolucionDetails(resolucionId) {
            if(!resolucionId) {
               console.log('No hay ID')
               return;
            }
      
            // Realizar Solicitud Ajax para obtener el archivo anexado
      
            $.ajax({
               url: '/resolucion/file/' + resolucionId,
               method: 'GET',
               success: function(data) {
                  console.log(data);
      
                  $('#fileList').empty();
      
                  // Mostrar archivos 
                  if (data.files.length === 0) {
                     $('#filelist').append('No hay archivos para mostrar');
                  } else {
                     data.files.forEach(file => {
                        const fileName = file.file_path.split('/').pop() // Obtener solo el nombre del archivo
                        const extension = fileName.split('.').pop().toLowerCase();
      
                        switch (extension) {
                           case 'pdf':
                              $('#filelist').append(`<li><a href="/file/${encodeURIComponent(fileName)}" target="_blank"><i class="fa-regular fa-file-pdf"></i> ${fileName}</a></li>`);
                              break;
                           case 'doc':
                           case 'docx':
                              $('#filelist').append(`<li><a href="/file/${encodeURIComponent(fileName)}" target="_blank"><i class="fa-regular fa-file-word"></i> ${fileName}</a></li>`);
                              break;
                              case 'jpg':
                           case 'jpeg':
                           case 'png':
                           case 'gif':
                              $('#filelist').append(`<li><a href="/file/${encodeURIComponent(fileName)}" target="_blank"><i class="fa-regular fa-image"></i> ${fileName}</a></li>`);
                              break;
                           default:
                              $('#filelist').append(`<li><a href="/file/${encodeURIComponent(fileName)}" target="_blank"><i class="fa-solid fa-paperclip"></i> ${fileName}</a></li>`);
                           break;
                           }
      
                     });
                  }
               },
               error: function() {
                  alert('Error al cargar los archivos de la resolución')
               }
            });
         }
      });
   </script>
   <script>
      // Realizar la apronación hablando la url de web.php para guardado
      $(document).ready(function () {
         $('#aprobar-btn').on('click', function() {
            let boton = $(this);
            let resolucion_id = {{ $resolucion[0]->resolucion_id }}

            $.ajax({
               url: '/aprobar/resolucion/' + resolucion_id,
               type: "POST",
               data: {
                  _token: "{{ csrf_token() }}"
               },
               success: function(response) {
                  boton.attr("disabled", true);
                  Swal.fire({
                         icon: 'success',
                         title: 'Éxito',
                         text: 'Acabas de aprobar esta solictud, ya esta lista para imprimir',
                     });
               },
               error: function(xhr, status, error) {
                alert("Error al aprobar la resolución.");
               }         
            });
         });
      });

   </script>
   <script>
      $(document).ready(function () {
         let estado = {{ $resolucion[0]->estatus }}
         let boton = $('#aprobar-btn');

         if (estado !== 0) {
            boton.attr("disabled", true);
         } else {
            consolo.log('No deshabilitar')
         }
      });
   </script>
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>