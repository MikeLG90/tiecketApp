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
      #users-container, #persona-container {
      display: none; /* Ocultos inicialmente */
      }
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
                     <label for="inputPassword2" class="col-sm-2 col-form-label">Dirigido a:</label>
                     <div class="col-sm-10">
                        <select id="catalogo2" class="form-control" name="tipo_usuario">
                           <option value="" selected>-- Selecciona --</option>
                           @foreach ( $usuarios as $u )                           
                           <option value="{{ $u->nombre_completo }}">{{ $u->nombre_completo }}</option>
                           @endforeach
                           <option value="otro">Otro</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="persona" class="col-sm-2 col-form-label">Ingrese el nombre:</label>
                     <div class="col-sm-10">
                        <input 
                           type="text" 
                           class="form-control" 
                           id="persona" 
                           name="persona" 
                           readonly 
                           placeholder="Seleccione o escriba un valor">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="catalogo" class="col-sm-2 col-form-label">Dependencia u oficina:</label>
                     <div class="col-sm-10">
                        <select id="catalogo" class="form-control" name="tipo_oficina">
                           <option value="" selected>-- Selecciona --</option>
                           @foreach ($oficinas as $o)                           
                           <option value="{{ $o->oficina }}">{{ $o->oficina }}</option>
                           @endforeach
                           <option value="otro">Otro</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="oficina" class="col-sm-2 col-form-label">Ingrese el nombre:</label>
                     <div class="col-sm-10">
                        <input 
                           type="text" 
                           class="form-control" 
                           id="oficina" 
                           name="oficina" 
                           readonly 
                           placeholder="Seleccione o escriba un valor">
                     </div>
                  </div>
                  <div class="d-grid gap-2 col-6 mx-auto">
                     <!-- Default -->
                     <button class="btn btn-primary mb-4" type="submit">Generar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!--  BEGIN CUSTOM SCRIPTS FILE  -->
   <x-slot:footerFiles>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
      window.onload = function () {
          var fecha = new Date();
          var mes = fecha.getMonth() + 1; // Sumar 1 para obtener el mes correcto
          var dia = fecha.getDate();
          var anio = fecha.getFullYear();
          var horas = fecha.getHours();
          var minutos = fecha.getMinutes();
      
          // Añadir ceros a la izquierda si es necesario
          if (dia < 10) dia = '0' + dia;
          if (mes < 10) mes = '0' + mes; // Aquí se ajusta para el formato 'MM'
          if (horas < 10) horas = '0' + horas;
          if (minutos < 10) minutos = '0' + minutos;
      
          document.getElementById('fecha').value = anio + "-" + mes + "-" + dia + "T" + horas + ":" + minutos;
      }
      
          
   </script>
   <script>
      $(document).ready(function() {
         $('#options').change(function() {
            const selectedValue = $(this).val();
      
            // Ocultar lols contenederos
            $('#users-container, #persona-container').hide();
      
            // Muestra el contenedor correspondiente según la selección
      
            if(selectedValue === 'usuario') {
               $('#users-container').show(); 
            } else if (selectedValue === 'persona') {
               $('#persona-container').show();
            }
         });
      });
      
   </script>
   <script>
      document.getElementById('catalogo2').addEventListener('change', function() {
         const personaInput = document.getElementById('persona');
      
         if (this.value === 'otro') {
            personaInput.value = '';
            personaInput.placeholder = 'Escriba aquí';
            personaInput.removeAttribute('readonly');
         } else if (this.value) {
            personaInput.value = this.value;
            personaInput.setAttribute('readonly', 'true');
         } else {
            personaInput.value = '';
            personaInput.setAttribute('readonly', 'true');
         }
      });

      document.getElementById('catalogo').addEventListener('change', function() {
         const oficinaInput = document.getElementById('oficina');
      
         if (this.value === 'otro') {
            oficinaInput.value = '';
            oficinaInput.placeholder = 'Escriba aquí';
            oficinaInput.removeAttribute('readonly');
         } else if (this.value) {
            oficinaInput.value = this.value;
            oficinaInput.setAttribute('readonly', 'true');
         } else {
            oficinaInput.value = '';
            oficinaInput.setAttribute('readonly', 'true');
         }
      });
   </script>
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>