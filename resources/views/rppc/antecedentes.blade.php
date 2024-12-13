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
        <h3>Antencedentes de tickets anteriores </h3>
    </div>

    <div class="row">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">              
                <table class="multi-table table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID del Ticket</th>
                            <th>Nombre del Ticket</th>
                            <th>Generado por</th>
                            <th>Estado</th>
                            <th>Urgencia</th>
                            <th>Impacto</th>
                            <th>Prioridad</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Resolución</th>
                            <th>Contenido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $ticket->ticket_id }}</td>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->creator_name }}</td>
                                <td>
    @switch($ticket->status)
        @case(5)
            Nuevo
            @break

        @case(4)
            En curso (Asignada)
            @break

        @case(3)
            En espera
            @break

        @case(2)
            Resuelto
            @break

        @case(1)
            Cerrado
            @break

        @default
            Estado desconocido
    @endswitch
</td>
                                <td>{{ $ticket->urgency }}</td>
                                <td>{{ $ticket->impact }}</td>
                                <td>{{ $ticket->priority }}</td>
                                <td>{{ $ticket->date }}</td>
                                <td>{{ $ticket->solvedate }}</td>
                                <td>{{ $ticket->content }}</td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID del Ticket</th>
                            <th>Nombre del Ticket</th>
                            <th>Generado por</th>
                            <th>Estado</th>
                            <th>Urgencia</th>
                            <th>Impacto</th>
                            <th>Prioridad</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Resolución</th>
                            <th>Contenido</th>
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