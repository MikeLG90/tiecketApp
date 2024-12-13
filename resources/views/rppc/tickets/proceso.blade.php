<div class="row">
         <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow no-rounded-corners">
               <div class="widget-content widget-content-area">
                  <table class="multi-table table dt-table-hover" style="width:100%">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>De: </th>
                           <th>Asunto</th>
                           <th>Urgencia</th>
                           <th>Fecha de apertura</th>
                           <th>Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $i = 1; @endphp
                        @foreach($tickets as $t)
                          @if($t->estado == 2 || $t->estado == 3)
                        <tr>
                           <td>{{ $i }}</td>
                           <td>{{ $t->remitente_id }}</td>
                           <td>{{ $t->titulo }}</td>
                           <td>
                              @switch($t->urgencia)
                              @case(1)
                              <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span>
                              @break
                              @case(2)
                              <span class="badge badge-light-danger mb-2 me-4">Muy Urgente</span> 
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
                              <!-- Contenido si ninguna de las anteriores se cumple -->
                              <span class="badge badge-light-info mb-2 me-4">Indefinida</span>
                              @endswitch
                           </td>
                           <td>{{ $t->fecha_aper }}<span class="id_t" style="display: none;">{{ $t->ticket_id }}</span>                           </td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                 <a data-bs-toggle="modal" data-bs-target="#ticket-modal{{ $t->ticket_id }}" data-ticket-id="{{ $t->ticket_id }}" type="button" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                       <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                       <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    <span></span>
                                 </a>
                                 <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3{{ $t->ticket_id }}" type="button" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                       <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                       <path d="m15 5 4 4"/>
                                    </svg>
                                    <span></span>   
                                 </a>
                                 <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3{{ $t->ticket_id }}" type="button" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                       <path d="M3 6h18"/>
                                       <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                       <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                       <line x1="10" x2="10" y1="11" y2="17"/>
                                       <line x1="14" x2="14" y1="11" y2="17"/>
                                    </svg>
                                    <span></span>   
                                 </a>
                              </div>
                              @include('rppc.tickets.view-ticket')

                           </td>
                        </tr>
                        @php $i++; @endphp
                            @endif
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>#</th>
                           <th>De: </th>
                           <th>Asunto</th>
                           <th>Urgencia</th>
                           <th>Fecha de apertura</th>
                           <th>Acciones</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>