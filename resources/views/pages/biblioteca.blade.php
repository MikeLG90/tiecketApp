<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{$title}} 
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
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <style>
        .custom-dropdown .dropdown-menu.show {
            z-index: 1050;
        }
    </style>

    <div class="row layout-top-spacing">
        <h3>Biblioteca de vacunas</h3>
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
                            <th>Siginificado</th>
                            <th>Propósito</th>
                            <th>Fecha de aplicación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Vacuna 1</td>
                            <td>¿Qué es?</td>
                            <td>¿Para qué sirve?</td>
                            <td>¿Cuándo aplicarla?</td>
                            <td> 
                            <div class="btn-group" role="group" aria-label="Basic example">
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" type="button" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                           </a>
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" type="button" class="btn btn-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                           </a>
                           <a href="" type="button" class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                           </a>
                        </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Vacuna 2</td>
                            <td>¿Qué es?</td>
                            <td>¿Para qué sirve?</td>
                            <td>¿Cuándo aplicarla?</td>
                            <td> 
                            <div class="btn-group" role="group" aria-label="Basic example">
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" type="button" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                           </a>
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" type="button" class="btn btn-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                           </a>
                           <a href="" type="button" class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                           </a>
                        </div>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Vacuna 3</td>
                            <td>¿Qué es?</td>
                            <td>¿Para qué sirve?</td>
                            <td>¿Cuándo aplicarla?</td>
                            <td> 
                            <div class="btn-group" role="group" aria-label="Basic example">
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" type="button" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                           </a>
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" type="button" class="btn btn-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                           </a>
                           <a href="" type="button" class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                           </a>
                        </div>
                            </td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td>Vacuna 4</td>
                            <td>¿Qué es?</td>
                            <td>¿Para qué sirve?</td>
                            <td>¿Cuándo aplicarla?</td>
                            <td> 
                            <div class="btn-group" role="group" aria-label="Basic example">
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" type="button" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                           </a>
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" type="button" class="btn btn-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                           </a>
                           <a href="" type="button" class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                           </a>
                        </div>
                            </td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td>Vacuna 5</td>
                            <td>¿Qué es?</td>
                            <td>¿Para qué sirve?</td>
                            <td>¿Cuándo aplicarla?</td>
                            <td> 
                            <div class="btn-group" role="group" aria-label="Basic example">
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" type="button" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                           </a>
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" type="button" class="btn btn-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                           </a>
                           <a href="" type="button" class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                           </a>
                        </div>
                            </td>
                        </tr>
                    </tbody>

                        <tfoot>
                            <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Siginificado</th>
                            <th>Propósito</th>
                            <th>Fecha de aplicación</th>
                            <th class="text-center">Acciones</th>
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
    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>