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
        <h3>Población</h3>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">              
                    <table class="multi-table table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>CURP</th>
                            <th>Nombre completo</th>
                            <th>Fecha de nacimiento</th>
                            <th>Edad</th>
                            <th>Dirección</th>
                            <th class="text-center">Esquema</th>
                            <th class="text-center dt-no-sorting">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AAAA000000AAAAAAA0</td>
                            <td>Tiger Nixon</td>
                            <td>00/00/0000</td>
                            <td>00</td>
                            <td>Municipio, localidad, colonia</td>
                            <td>
                                <div class="t-dot bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Completo"></div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>BBBB111111BBBBBBB1</td>
                            <td>Garrett Winters</td>
                            <td>01/01/1991</td>
                            <td>33</td>
                            <td>Municipio, localidad, colonia</td>
                            <td>
                                <div class="t-dot bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Incompleto"></div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                        <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>CCCC222222CCCCCCC2</td>
                            <td>Ashton Cox</td>
                            <td>02/02/1982</td>
                            <td>42</td>
                            <td>Municipio, localidad, colonia</td>
                            <td>
                                <div class="t-dot bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Completo"></div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                        <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>DDDD333333DDDDDDD3</td>
                            <td>Cedric Kelly</td>
                            <td>03/03/1973</td>
                            <td>51</td>
                            <td>Municipio, localidad, colonia</td>
                            <td>
                                <div class="t-dot bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Incompleto"></div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                        <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>EEEE444444EEEEEEE4</td>
                            <td>Airi Satou</td>
                            <td>04/04/1964</td>
                            <td>60</td>
                            <td>Municipio, localidad, colonia</td>
                            <td>
                                <div class="t-dot bg-success" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Completo"></div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink5">
                                        <a class="dropdown-item" href="javascript:void(0);">Ver esquema</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Deshabilitar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                        <tfoot>
                            <tr>
                                <th>CURP</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Dirección</th>
                                <th class="text-center">Esquema</th>
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