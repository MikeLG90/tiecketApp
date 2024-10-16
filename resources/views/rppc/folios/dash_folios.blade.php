<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        RPPC | Index 
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
        <h3>Biblioteca de folios</h3>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">              
                    <table class="multi-table table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Número de folio</th>
                            <th>Generado por</th>
                            <th>Área</th>
                            <th>Para</th>
                            <th>Oficina o Delegación</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
        @php $i = 1; @endphp
        @foreach($folios as $f)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $f->num_folio }}</td>
                            <td>{{ $f->generado_por }}</td>
                            <td>{{ $f->area }}</td>
                            <td>{{ $f->destinatario }}</td>
                            <td>{{ $f->oficina }}</td>
                            <td>{{ $f->fecha_hora }}</td>
                        </tr>
            @php $i++; @endphp
        @endforeach

                    </tbody>

                        <tfoot>
                            <tr>
                            <th>#</th>
                            <th>Número de folio</th>
                            <th>Generado por</th>
                            <th>Área</th>
                            <th>Para</th>
                            <th>Oficina o Delegación</th>
                            <th>Fecha</th>
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