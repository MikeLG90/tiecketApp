<!-- Modal -->
<div class="modal fade" id="filesModal" tabindex="-1" role="dialog" aria-labelledby="filesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filesModalLabel">Detalles del Ticket</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Detalles del ticket -->
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
                                                            <input value="" name="fecha_apertura" type="text" id="inApertura"   class="form-control">
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
                                                            <input value="" name="fecha_limite" type="datetime-local" id="inLimite" class="form-control">
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
                                                            <option value="" disabled>Seleccione un tipo</option>
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
    <option value="" disabled>Seleccione una categoría</option>
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
    <option value="" disabled>Seleccione un estado</option>
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
    <option value="" disabled>Seleccione una urgencia</option>
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
                        <textarea name="descripcion" class="form-control" id="textarea-t" rows="3"></textarea>
                        <span class="validation-text"></span>
                     </div>
                                                   <div>
                                                      <hr>
                                                   </div>
                                                </div>
                <!-- Archivos adjuntos -->
                <h4>Archivos:</h4>
                <ul id="fileList"></ul> <!-- Aquí se cargarán los archivos -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>