<!-- Modal -->
<div class="modal fade" id="editModal{{ $t->ticket_id }}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" >Actualizar Estado</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
         </button>
      </div>
      <div class="modal-body">
         <!-- Detalles del ticket -->
         <div class="row">
            <div class="w-100">
               <div class="w-100">
                  <p>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-captions">
                        <rect width="18" height="14" x="3" y="5" rx="2" ry="2"/>
                        <path d="M7 15h4M15 15h2M7 11h2M13 11h4"/>
                     </svg>
                     Título
                  </p>
                  <input class="form-control" type="text" id="editTitulo" value="{{ $t->titulo }}">
               </div>
               <hr>
               <div class="w-100">
                  <p>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-area">
                        <path d="M3 3v16a2 2 0 0 0 2 2h16"/>
                        <path d="M7 11.207a.5.5 0 0 1 .146-.353l2-2a.5.5 0 0 1 .708 0l3.292 3.292a.5.5 0 0 0 .708 0l4.292-4.292a.5.5 0 0 1 .854.353V16a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1z"/>
                     </svg>
                     Estado
                  </p>
                  <form method="POST" action="/ticket/update/{{ $t->ticket_id }}">
                  @csrf
                  @method('PUT')
                  <div>
                  <select name="editEstado" id="editEstado" class="form-control">
    <option value="" disabled>Seleccione un estado</option>
    <option value="1" {{ $t->estado == 1 ? 'selected' : '' }}>Nuevo</option>
    <option value="2" {{ $t->estado == 2 ? 'selected' : '' }}>En curso (Asignada)</option>
    <option value="3" {{ $t->estado == 3 ? 'selected' : '' }}>En curso (Planificada)</option>
    <option value="4" {{ $t->estado == 4 ? 'selected' : '' }}>En espera</option>
    <option value="5" {{ $t->estado == 5 ? 'selected' : '' }}>Resuelto</option>
    <option value="6" {{ $t->estado == 6 ? 'selected' : '' }}>Cerrado</option>
</select>

                     <span class="validation-text"></span>
                  </div>
               </div>
               <div>
                  <hr>
               </div>
            </div>
         </div>
         <div class="modal-footer">
         <button type="submit" class="btn btn-primary" id="updateTicketBtn">Actualizar</button> <!-- Botón para actualizar -->
         <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
         </div>
         </form>
      </div>
   </div>
</div>