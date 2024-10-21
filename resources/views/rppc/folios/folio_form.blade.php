<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        RPPC | Generador de folios
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/components/timeline.scss'])
        <!--  END CUSTOM STYLE FILE  -->
        
        <style>
            .toggle-code-snippet { margin-bottom: 0px; }
            body.dark .toggle-code-snippet { margin-bottom: 0px; }
        </style>
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-slot:scrollspyConfig>
        data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
    </x-slot>
    
    <!-- BREADCRUMB -->
    <!-- /BREADCRUMB -->
    <div class="row layout-top-spacing">
        <h3>Generador de folios</h3>
    </div>

    
    <div class="row">

        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Porfavor rellene los campos correspondientes</h4>
                        </div>                                                                        
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('folio.store') }}">
                        @csrf
                        <div class="row mb-3">
                          <label for="inputEmail2" class="col-sm-2 col-form-label">Generador por:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail2" name="generado" value="{{ auth()->user()->persona->nombre . ' ' . auth()->user()->persona->ape_materno . ' ' .  auth()->user()->persona->ape_paterno }}">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputPassword2" class="col-sm-2 col-form-label">Fecha y hora:</label>
                          <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="fecha" name="fecha" readonly>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputEmail2" class="col-sm-2 col-form-label">Para:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail2" name="para">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputEmail2" class="col-sm-2 col-form-label">Oficina o delegación:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail2" name="oficina">
                          </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
<!-- Default -->
<button class="btn btn-primary mb-4" type="submit">Generar</button>
</div>                    </form>

                </div>
            </div>
        </div>
    </div>


    </div>
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>

    <script>
        window.onload = function () {
            var fecha = new Date();
            var mes = fecha.getMonth();
            var dia = fecha.getDate();
            var anio = fecha.getFullYear();
            var horas = fecha.getHours();
            var minutos = fecha.getMinutes();

            // Añadir ceros a la izquierda si es necesario
            if (dia < 10) dia = '0' + dia;
            if (mes < 10) mes = '0' + mes;
            if (horas < 10) horas = '0' + horas;
            if (minutos < 10) minutos = '0' + minutos;

            document.getElementById('fecha').value = anio + "-" + mes + "-" + dia + "T" + horas + ":" + minutos;
        }
    </script>


    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>