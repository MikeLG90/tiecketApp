<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   RPPC | INBOX 
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss'])
   @vite(['resources/scss/light/assets/components/modal.scss'])
   <!--  END CUSTOM STYLE FILE  -->
   <style>
      .tab-content {
      display: none;
      }
      .tab-content.active {
      display: block;
      }
      .table {
      border: 1px solid #dee2e6; /* Color de borde */
      border-collapse: separate; /* Asegúrate de que no se colapsen los bordes */
      }
      .table th, .table td {
      border: 1px solid #dee2e6; /* Color de borde para celdas */
      }
   </style>
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BREADCRUMB -->
   <!-- /BREADCRUMB -->
   <div class="seperator-header">
   </div>
   <div class="tabs">
      <ul class="nav nav-tabs">
         <li class="nav-item">
            <a class="nav-link active" id="principal-tab" href="#">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mailbox">
                  <path d="M22 17a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.5C2 7 4 5 6.5 5H18c2.2 0 4 1.8 4 4v8Z"/>
                  <polyline points="15,9 18,9 18,11"/>
                  <path d="M6.5 5C9 5 11 7 11 9.5V17a2 2 0 0 1-2 2"/>
                  <line x1="6" x2="7" y1="10" y2="10"/>
               </svg>
               Inbox de tickets
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="enCurso-tab" href="#">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
               </svg>
               Tickets resueltos
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="terminado-tab" href="#">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-list">
                  <rect width="7" height="7" x="3" y="3" rx="1"/>
                  <rect width="7" height="7" x="3" y="14" rx="1"/>
                  <path d="M14 4h7"/>
                  <path d="M14 9h7"/>
                  <path d="M14 15h7"/>
                  <path d="M14 20h7"/>
               </svg>
               Tickets pendientes
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="cancelado-tab" href="#">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send">
                  <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/>
                  <path d="m21.854 2.147-10.94 10.939"/>
               </svg>
               Tickets levantados
            </a>
         </li>
      </ul>
   </div>
   <div id="principal" class="tab-content active">
      <div class="row layout-spacing">
         <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
               <div class="widget-content widget-content-area">
                  <div class="col-lg-12 d-flex justify-content-end mb-3">
                     <button type="button" class="btn btn-success ms-5 mt-3" data-bs-toggle="modal" data-bs-target="#inputFormModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2">
                           <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/>
                           <path d="M14 2v4a2 2 0 0 0 2 2h4"/>
                           <path d="M3 15h6"/>
                           <path d="M6 12v6"/>
                        </svg>
                        Levantar Nuevo Ticket
                     </button>
                  </div>
                  <table id="style-3" class="table style-3 dt-table-hover">
                     <thead>
                        <tr>
                           <th class="checkbox-column text-center"></th>
                           <th class="text-center"></th>
                           <th>Remitente</th>
                           <th>Titulo</th>
                           <th>Tipo</th>
                           <th class="text-center">Estatus</th>
                           <th class="text-center dt-no-sorting">Ver</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $i = 1; @endphp
                        @foreach($tickets as $t)
                        <tr>
                           <td class="checkbox-column text-center"> {{ $i }} </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-17.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>{{ $t->remitente_id }}</td>
                           <td>{{ $t->titulo }}</td>
                           <td>{{ $t->tipo }}</td>
                           <td>                                @switch($t->estado)
                              @case('1')
                              <span class="shadow-none badge badge-success">{{ $t->estado }}</span>
                              @break
                              @case('2')
                              <span class="shadow-none badge badge-danger">{{ $t->estado }}</span>
                              @break
                              @case('3')
                              <span class="shadow-none badge badge-warning">{{ $t->estado }}</span>
                              @break
                              @case('4')
                              <span class="shadow-none badge badge-warning"> En Espera </span>
                              @break
                              @default
                              <span class="shadow-none badge badge-secondary">{{ $t->estado }}</span>
                              @endswitch  
                           </td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                       <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                       <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                 </a>
                              </ul>
                           </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="enCurso" class="tab-content">
      <div class="row layout-spacing">
         <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
               <div class="widget-content widget-content-area">
                  <table id="style-4" class="table style-3 dt-table-hover">
                     <thead>
                        <tr>
                           <th class="checkbox-column text-center"> Record Id </th>
                           <th class="text-center">Image</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Email</th>
                           <th>Mobile No.</th>
                           <th class="text-center">Status</th>
                           <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="checkbox-column text-center"> 1 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-17.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Donna</td>
                           <td>Rogers</td>
                           <td>donna@yahoo.com</td>
                           <td>555-555-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 2 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-19.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Andy</td>
                           <td>King</td>
                           <td>andyking@gmail.com</td>
                           <td>555-555-6666</td>
                           <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 3 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-20.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Alma</td>
                           <td>Clarke</td>
                           <td>Alma@live.com</td>
                           <td>777-555-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 4 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-21.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Vincent</td>
                           <td>Carpenter</td>
                           <td>vinnyc@outlook.com</td>
                           <td>555-666-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 5 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-22.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Kristen</td>
                           <td>Beck</td>
                           <td>kristen@adobe.com</td>
                           <td>444-444-4444</td>
                           <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 6 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-23.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Oscar</td>
                           <td>Garner</td>
                           <td>oscar@gmail.com</td>
                           <td>111-111-1111</td>
                           <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 7 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-24.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Nia</td>
                           <td>Hillyer</td>
                           <td>niaHill@yahoo.com</td>
                           <td>111-666-1111</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="terminado" class="tab-content">
      <div class="row layout-spacing">
         <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
               <div class="widget-content widget-content-area">
                  <table id="style-5" class="table style-3 dt-table-hover">
                     <thead>
                        <tr>
                           <th class="checkbox-column text-center"> Record Id </th>
                           <th class="text-center">Image</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Email</th>
                           <th>Mobile No.</th>
                           <th class="text-center">Status</th>
                           <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="checkbox-column text-center"> 1 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-17.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Donna</td>
                           <td>Rogers</td>
                           <td>donna@yahoo.com</td>
                           <td>555-555-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 2 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-19.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Andy</td>
                           <td>King</td>
                           <td>andyking@gmail.com</td>
                           <td>555-555-6666</td>
                           <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 3 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-20.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Alma</td>
                           <td>Clarke</td>
                           <td>Alma@live.com</td>
                           <td>777-555-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 4 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-21.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Vincent</td>
                           <td>Carpenter</td>
                           <td>vinnyc@outlook.com</td>
                           <td>555-666-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 5 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-22.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Kristen</td>
                           <td>Beck</td>
                           <td>kristen@adobe.com</td>
                           <td>444-444-4444</td>
                           <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 6 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-23.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Oscar</td>
                           <td>Garner</td>
                           <td>oscar@gmail.com</td>
                           <td>111-111-1111</td>
                           <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 7 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-24.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Nia</td>
                           <td>Hillyer</td>
                           <td>niaHill@yahoo.com</td>
                           <td>111-666-1111</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="cancelado" class="tab-content">
      <div class="row layout-spacing">
         <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
               <div class="widget-content widget-content-area">
                  <table id="style-6" class="table style-3 dt-table-hover">
                     <thead>
                        <tr>
                           <th class="checkbox-column text-center"> Record Id </th>
                           <th class="text-center">Image</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Email</th>
                           <th>Mobile No.</th>
                           <th class="text-center">Status</th>
                           <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="checkbox-column text-center"> 1 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-17.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Donna</td>
                           <td>Rogers</td>
                           <td>donna@yahoo.com</td>
                           <td>555-555-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 2 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-19.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Andy</td>
                           <td>King</td>
                           <td>andyking@gmail.com</td>
                           <td>555-555-6666</td>
                           <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 3 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-20.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Alma</td>
                           <td>Clarke</td>
                           <td>Alma@live.com</td>
                           <td>777-555-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 4 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-21.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Vincent</td>
                           <td>Carpenter</td>
                           <td>vinnyc@outlook.com</td>
                           <td>555-666-5555</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 5 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-22.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Kristen</td>
                           <td>Beck</td>
                           <td>kristen@adobe.com</td>
                           <td>444-444-4444</td>
                           <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 6 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-23.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Oscar</td>
                           <td>Garner</td>
                           <td>oscar@gmail.com</td>
                           <td>111-111-1111</td>
                           <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        <tr>
                           <td class="checkbox-column text-center"> 7 </td>
                           <td class="text-center">
                              <span><img src="{{Vite::asset('resources/images/profile-24.jpeg')}}" class="profile-img" alt="avatar"></span>
                           </td>
                           <td>Nia</td>
                           <td>Hillyer</td>
                           <td>niaHill@yahoo.com</td>
                           <td>111-666-1111</td>
                           <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                           <td class="text-center">
                              <ul class="table-controls">
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                          <polyline points="3 6 5 6 21 6"></polyline>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                       </svg>
                                    </a>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   <div class="modal fade inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title">Nuevo Ticket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">
               <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
               </svg>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <!--         <div class="col-md-12">
                     <div class="mb-4 mail-form">
                         <p>From:</p>
                         <select class="form-control" id="m-form">
                             <option value="info@mail.com">Info &lt;info@mail.com&gt;</option>
                             <option value="shaun@mail.com">Shaun Park &lt;shaun@mail.com&gt;</option>
                         </select>
                     </div>
                     </div>
                     </div> -->
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
                              <input name="fecha_apertura" type="datetime-local" id="fecha" class="form-control" readonly>
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
                              <input name="fecha_limite" type="datetime-local" id="m-cc" class="form-control">
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
                              <select name="tipo" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="tipo1">Incidente</option>
                                 <option value="tipo2">Solicitar</option>
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
                              <select name="categoria" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="tipo1">Acuerdo</option>
                                 <option value="tipo2">Apertura de folio</option>
                                 <option value="tipo2">Resolución</option>
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
                              <select name="estado" id="m-cc" class="form-control">
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
                              <select name="urgencia" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="tipo1">Muy urgente</option>
                                 <option value="tipo2">Urgente</option>
                                 <option value="tipo2">Mediana</option>
                                 <option value="tipo2">Baja</option>
                                 <option value="tipo2">Muy baja</option>
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
                              <select name="impacto" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="tipo1">Muy alto</option>
                                 <option value="tipo2">Alto</option>
                                 <option value="tipo2">Mediano</option>
                                 <option value="tipo2">Bajo</option>
                                 <option value="tipo2">Muy bajo</option>
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
                              <select name="prioridad" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione un tipo</option>
                                 <option value="tipo1">Muy alta</option>
                                 <option value="tipo2">Alta</option>
                                 <option value="tipo2">Mediana</option>
                                 <option value="tipo2">Baja</option>
                                 <option value="tipo2">Muy baja</option>
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
                              <input name="titulo" type="text" id="m-to" class="form-control" placeholder="Ingrese el título del ticket">
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
                              <select name="oficina" id="m-cc" class="form-control">
                                 <option value="" disabled selected>Seleccione una oficina</option>
                                 <option value="tipo1">Cancún</option>
                                 <option value="tipo2">Chetumal</option>
                                 <option value="tipo2">Cozumel</option>
                                 <option value="tipo2">Playa del Carmen</option>
                                 <!-- Agrega más opciones según sea necesario -->
                              </select>
                              <span class="validation-text"></span>
                           </div>
                        </div>
                     </div>
                     <div class="mb-4 mail-subject">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round">
                              <circle cx="12" cy="8" r="5"/>
                              <path d="M20 21a8 8 0 0 0-16 0"/>
                           </svg>
                           Para:
                        </p>
                        <div class="w-100">
                           <select name="usuario_id" id="m-cc" class="form-control">
                              <option value="" disabled selected>Seleccione a quién se le asignará el ticket</option>
                              <option value="1">User-1</option>
                              <!-- Agrega más opciones según sea necesario -->
                           </select>
                           <span class="validation-text"></span>
                        </div>
                     </div>
                     <div class="">
                        <p>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-down">
                              <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                              <path d="M12 10v6"/>
                              <path d="m15 13-3 3-3-3"/>
                           </svg>
                           Subir archivos:
                        </p>
                        <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                        <input class="form-control file-upload-input" type="file" name="attachments[]" multiple>
                        <br>
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
                        <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <span class="validation-text"></span>
                     </div>
                     <div>
                        <hr>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Sign in</button>
            </form>
            </div>
         </div>
      </div>
   </div>
   <!--  BEGIN CUSTOM SCRIPTS FILE  -->
   <x-slot:footerFiles>
   <script type="module" src="{{asset('plugins/global/vendors.min.js')}}"></script>
   @vite(['resources/assets/js/custom.js'])
   <script type="module" src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script>
      document.addEventListener('DOMContentLoaded', () => {
          document.querySelectorAll('.nav-link').forEach(tab => {
              tab.addEventListener('click', (e) => {
                  e.preventDefault();
                  
                  // Ocultar todas las secciones
                  document.querySelectorAll('.tab-content').forEach(content => {
                      content.classList.remove('active');
                  });
      
                  // Mostrar la sección correspondiente
                  const target = e.target.id.replace('-tab', '');
                  document.getElementById(target).classList.add('active');
      
                  // Resaltar la pestaña activa
                  document.querySelectorAll('.nav-link').forEach(link => {
                      link.classList.remove('active');
                  });
                  e.target.classList.add('active');
              });
          });
      });
      
         
   </script>
   <script type="module" src="{{asset('plugins/global/vendors.min.js')}}"></script>
   @vite(['resources/assets/js/custom.js'])
   <script type="module" src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script type="module">
      const c3 = $('#style-3').DataTable({
          "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          "oLanguage": {
              "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
             "sLengthMenu": "Results :  _MENU_",
          },
          "stripeClasses": [],
          "lengthMenu": [5, 10, 20, 50],
          "pageLength": 10
      });
      
      multiCheck(c3);
      
      const c4 = $('#style-4').DataTable({
          "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          "oLanguage": {
              "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
             "sLengthMenu": "Results :  _MENU_",
          },
          "stripeClasses": [],
          "lengthMenu": [5, 10, 20, 50],
          "pageLength": 10
      });
      
      multiCheck(c4);
      
                  const c5 = $('#style-5').DataTable({
          "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          "oLanguage": {
              "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
             "sLengthMenu": "Results :  _MENU_",
          },
          "stripeClasses": [],
          "lengthMenu": [5, 10, 20, 50],
          "pageLength": 10
      });
      
      multiCheck(c5);
      
                  const c6 = $('#style-6').DataTable({
          "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          "oLanguage": {
              "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
             "sLengthMenu": "Results :  _MENU_",
          },
          "stripeClasses": [],
          "lengthMenu": [5, 10, 20, 50],
          "pageLength": 10
      });
      
      multiCheck(c6);
   </script>
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>