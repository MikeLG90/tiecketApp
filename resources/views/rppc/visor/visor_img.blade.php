<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visor de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
       <style>
      .dt-table-hover td {
      cursor: pointer; /* Cambia el cursor a un puntero */
      }
   </style>
    <style>
        /* Estilos generales */
        body {
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: #fff !important;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .sidebar h4 {
            color: #0d6efd;
        }

        .sidebar label {
            font-weight: bold;
            color: #495057;
        }

        .sidebar button {
            transition: all 0.3s ease;
        }

        .sidebar button:hover {
            background-color: #0a58ca;
        }

        /* Tabla */
        .table-container {
            overflow-y: auto;
            max-height: 150px;
        }

        .table-container2 {
            overflow-y: auto;
            max-height: 280px;
        }


        /* Visor PDF */
        .pdf-viewer {
            height: 400px;
            background-color: #e9ecef;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 1.2rem;
        }

        /* Botones */
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #6c757d;
            border-radius: 4px;
        }
    </style>

<link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss'])
</head>
<body>
    <!-- Navbar -->
<!--    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Visor de Libros</a>
        </div>
    </nav> -->

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar Izquierdo -->
            <div class="col-md-3 col-lg-2 sidebar p-3">
                <h4 class="mb-4">Visor</h4>
                <div class="mb-3">
                    <label>Oficina</label>
                    <select id="oficina" class="form-select">
                        <option selected>Seleccione una oficina</option>
                        <option value="1">Chetumal</option>
                        <option value="2">Cancún</option>
                        <option value="3">Playa del Carmen</option>
                        <option value="4">Cozumel</option>
                    </select>
                </div>
                <div class="mb-3 d-flex align-items-end">
    <div class="me-2">
        <label class="form-label">Sección</label>
        <input type="text" class="form-control" placeholder="Ingrese sección">
    </div>
    <div>
        <label class="form-label">Tomo</label>
        <input type="text" class="form-control" placeholder="Ingrese tomo">
    </div>
</div>

                <button class="btn btn-primary w-100 mb-4">Buscar</button>
                <label class="form-label">Imágenes</label>

                <div class="table-container2 mb-4">
                <table class="table table-hover table-striped" id="imagenes">
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

            <!-- Contenido Principal -->
            <div class="col-md-9 col-lg-10">
                <!-- Tabla Principal -->
                <div class="table-container mb-4">
                    <table class="multi-table table dt-table-hover w-100" id="libros">
                        <thead>
                            <tr>
                                <th>Id Libro</th>
                                <th>Id Oficina</th>
                                <th>Sección</th>
                                <th>Tomo</th>
                                <th>Volumen</th>
                                <th>Foja inicial</th>
                                <th>Foja final</th>
                                <th>No. Inscripciones</th>
                                <th>Estatus</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- Visor PDF -->
                <div class="pdf-viewer">
                <iframe id="viewer" src="" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{asset('plugins/global/vendors.min.js')}}"></script>
   @vite(['resources/assets/js/custom.js'])
   <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/custom_miscellaneous.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#libros').DataTable({
    "destroy": true, // Destruye la instancia existente
    "searching": false,
    "lengthChange": false,
    "paging": false // Desactiva la paginación completamente
});


});

</script>
<script>
    $(document).ready(function() {
    $("#oficina").change(function() {
        const oficinaId = $(this).val();
        const tableBody = document.getElementById('libros').querySelector('tbody');
        tableBody.innerHTML = ""; // Limpiar el contenido anterior de la tabla

        console.log(oficinaId);

        // Realizar solicitud AJAX para llamar los libros de la oficina seleccionada
        $.ajax({
            url: 'api/libros/' + oficinaId,
            method: 'GET',
            success: function(data) {
                const libros = data;
                console.log(libros);

                // Insertar libros en la tabla de libros
                libros.forEach((item) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td data-id="${item.id_libro}">${item.id_libro}</td>
                        <td data-id="${item.id_libro}">${item.id_oficina}</td>
                        <td data-id="${item.id_libro}">${item.seccion}</td>
                        <td data-id="${item.id_libro}">${item.tomo}</td>
                        <td data-id="${item.id_libro}">${item.volumen}</td>
                        <td data-id="${item.id_libro}">${item.foja_inicial}</td>
                        <td data-id="${item.id_libro}">${item.foja_final}</td>
                        <td data-id="${item.id_libro}">${item.no_inscripciones}</td>
                        <td data-id="${item.id_libro}">${item.status}</td>
                        <td data-id="${item.id_libro}">${item.observaciones}</td>
                    `;

                    row.querySelectorAll('td').forEach(td => {
                        td.addEventListener('click', function() {
                            const id = this.getAttribute('data-id'); // Obtener el ID desde el atributo data-id

                            getImagenes(oficinaId, id);
                        });
                    });
                    tableBody.appendChild(row); // Agregar la fila a la tabla
                });
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    });
});
</script>

<script>
    function getImagenes(oficinaId, id) {
        const tableBody = document.getElementById('imagenes').querySelector('tbody');
        tableBody.innerHTML = '';
        const oficinaId = oficinaId;
        // Mostrar id del libro
        console.log("ID del libro:", id);

        $.ajax({
            url: 'api/libro/imagenes/' + oficinaId + '/' + id,
            method: 'GET',
            success: function(data) {
                console.log('Datos recibidos:', data);

                const datos = data;
                // Generar lista de imagenes del libro correspondiente
                datos.forEach((item) => {
                    const row =document.createElement('tr');
                    row.innerHTML = `
                        <td data-id="${item.id_libro}" data-name="${item.nombre_archivo}">${item.nombre_archivo}</td>
                    `;
                    row.querySelectorAll('td').forEach(td => {
                        td.addEventListener('click', function() {
                            const id = this.getAttribute('data-id'); // Obtener el ID desde el atributo data-id
                            const name = this.getAttribute('data-name');

                            getImagenesLib(oficinaId, id, name);
                        });
                    });
                    tableBody.appendChild(row);
                });
            }
        });

    }
</script>
<script>
    function getImagenesLib(oficinaId, id, name) {
        
    }

</script>
</body>
</html>
