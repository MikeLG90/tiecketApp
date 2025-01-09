<div class="modal fade" id="exampleModalCenter2{{ $o->oficina_folio_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar área</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <h4 class="modal-heading mb-4 mt-2">Por favor complete el formulario</h4>

                <form method="POST" action="/oficinas-folios/update/{{ $o->oficina_folio_id }}">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="oficina_folio_id" value="{{ $o->oficina_folio_id }}">

                    <!-- Nombre de la Oficina -->
                    <div class="mb-3">
                        <label for="nombreEdit" class="form-label">Nombre de la oficina</label>
                        <input 
    type="text" 
    name="nombreEdit" 
    id="nombreEdit" 
    class="form-control" 
    value="{{ $o->oficina }}" 
    placeholder="Nombre">

                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="descripcionEdit" class="form-label">Descripción</label>
                        <input 
                            type="text" 
                            name="descripcionEdit" 
                            id="descripcionEdit" 
                            class="form-control" 
                            value="{{ $o->descripcion }}" 
                            placeholder="Descripción">
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save">
                                <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/>
                                <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/>
                                <path d="M7 3v4a1 1 0 0 0 1 1h7"/>
                            </svg> 
                            Actualizar
                        </button>
                        <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="m15 9-6 6"/>
                                <path d="m9 9 6 6"/>
                            </svg> 
                            Descartar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>