<div class="modal fade inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title">Nueva Resolución</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">
               <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
               </svg>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="/nueva-resolucion" enctype="multipart/form-data" id="store">
               @csrf
               <div class="row">
            <!--
               <div class="col-md-12">
                     <div class="mb-4 mail-form">
                         <p>From:</p>
                         <select class="form-control" id="m-form">
                             <option value="info@mail.com">Info &lt;info@mail.com&gt;</option>
                             <option value="shaun@mail.com">Shaun Park &lt;shaun@mail.com&gt;</option>
                         </select>
                     </div>
                     </div>
                     </div>   
                      -->
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
                              <input name="fecha_apertura" type="datetime-local" id="fecha" class="form-control">
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
                                 <option value="1">Reposición de asientos</option>
                                 <option value="2">Traspaso de folios</option>
                                 <option value="3">Cancelación de embargos</option>
                                 <option value="4">Reftificación de boleta</option>
                                 <option value="5">Rectificación de captura en la descripción de acto</option>
                                 <option value="6">Rectificación de captura del número exterior del predio </option>
                                 <option value="7">Rectificación de folio/s</option>
                                 <option value="8">Cancelación de anotación</option>
                                 <option value="9">Cancelación de gravamen</option>
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
                              <select name="urgencia" id="m-cc" class="form-control" required>
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
                              <select name="impacto" id="m-cc" class="form-control" required>
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
                              <select name="prioridad" id="m-cc" class="form-control" required>
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
                              <input required name="titulo" type="text" id="m-to" class="form-control" placeholder="Ingrese el título de la resolución">
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
                              Delegación donde se requiere la resolución:
                           </p>
                           <div>
                              <select name="oficina" id="oficina" class="form-control" required>
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
                     <div class="">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-down">
                              <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                              <path d="M12 10v6"/>
                              <path d="m15 13-3 3-3-3"/>
                           </svg>
                           Solicitud:
                        </p>
                        <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                        <input class="form-control file-upload-input" type="file" name="attachments1[]" multiple>
                        <br>
                     </div>
                     <div class="">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-down">
                              <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                              <path d="M12 10v6"/>
                              <path d="m15 13-3 3-3-3"/>
                           </svg>
                           Oficio:
                        </p>
                        <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                        <input class="form-control file-upload-input" type="file" name="attachments2[]" multiple>
                        <br>
                     </div>
                     <div class="">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-down">
                              <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                              <path d="M12 10v6"/>
                              <path d="m15 13-3 3-3-3"/>
                           </svg>
                           Anexo (Opcional):
                        </p>
                        <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                        <input class="form-control file-upload-input" type="file" name="attachments[]" multiple>
                        <br>
                     </div>
                     <div class="mb-4 mail-subject">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round">
                              <circle cx="12" cy="8" r="5"/>
                              <path d="M20 21a8 8 0 0 0-16 0"/>
                           </svg>
                           Promovente:
                        </p>
                        <div class="w-100">
                        <input required name="promovente" type="text" id="m-to" class="form-control" placeholder="Ingrese el nombre del proveniente">
                           <span class="validation-text"></span>
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
                        <textarea required name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <span class="validation-text"></span>
                     </div>
                     <div>
                        <hr>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect">Enviar</button>
            </form>
            </div>
         </div>
      </div>
   </div>