$(document).ready(function() {
    $('#libros').DataTable({
"destroy": true, // Destruye la instancia existente
"searching": false,
"lengthChange": false,
"paging": false // Desactiva la paginación completamente
});


});


// Función para mostrar libros al ingresar seccion y el tomo 

function mostrarLibrosTS(seccion, tomo, oficinaId) {
    const tableBody = document.getElementById('libros').querySelector('tbody');
    tableBody.innerHTML = '';

    $.ajax({
        url: 'api/libros-st/' + seccion + '/' + tomo + '/' + oficinaId,
        method: 'GET',
        success: function(data) {
            data.forEach((item) => {
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
                        const id = this.getAttribute('data-id');
                        getImagenes(oficinaId, id);
                    });
                });
                tableBody.appendChild(row);
            });
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
        }
    });

}

// Función para iniciar la búsqueda
$(document).ready(function() {
$("#buscar").click(function() {
    const seccion = $("#seccion").val();
    const tomo = $('#tomo').val();
    const oficina = $('#oficina').val();
    mostrarLibrosTS(seccion, tomo, oficina);
});
});
/* Visor de pdf funciones*/
// Función para mostrar el PDF
function mostrarPdf(nombre_archivo, id_libro, oficinaId) {
    const url = `/tiff/view/${nombre_archivo}/${id_libro}/${oficinaId}`;

    let pdfDoc = null,
        pageNum = 1,
        zoom = 1.0,
        container = document.getElementById('pdf-canvas');

    // Cargar el documento PDF
    pdfjsLib.getDocument(url).promise.then(pdf => {
        pdfDoc = pdf;
        pageNum = 1;
        zoom = 1.0;
        renderPage(pageNum);
    });

    // Renderizar la página
    function renderPage(num) {
        pdfDoc.getPage(num).then(page => {
            const viewport = page.getViewport({ scale: zoom });

            // Crear un canvas temporal para convertir la página en imagen
            const canvas = document.createElement('canvas');
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            const ctx = canvas.getContext('2d');

            const renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };

            page.render(renderContext).promise.then(() => {
                // Convertir el canvas a imagen y establecerla como fondo del div
                const imgData = canvas.toDataURL('image/png');
                container.style.width = `${viewport.width}px`;
                container.style.height = `${viewport.height}px`;
                container.style.backgroundImage = `url(${imgData})`;
                container.style.backgroundSize = 'contain';
                container.style.backgroundRepeat = 'no-repeat';
                container.style.backgroundPosition = 'center';
            });
        });
    }

    // Navegar a la página anterior
    document.getElementById('prev').onclick = () => {
        if (pageNum <= 1) return;
        pageNum--;
        document.getElementById('page-num').value = pageNum;
        renderPage(pageNum);
    };

    // Navegar a la siguiente página
    document.getElementById('next').onclick = () => {
        if (!pdfDoc || pageNum >= pdfDoc.numPages) return;
        pageNum++;
        document.getElementById('page-num').value = pageNum;
        renderPage(pageNum);
    };

    // Aumentar el zoom
    document.getElementById('zoom-in').onclick = () => {
        zoom += 0.1;
        renderPage(pageNum);
    };

    // Disminuir el zoom
    document.getElementById('zoom-out').onclick = () => {
        if (zoom <= 0.1) return;
        zoom -= 0.1;
        renderPage(pageNum);
    };

    // Descargar el PDF
    document.getElementById('download').onclick = () => {
        const link = document.createElement('a');
        link.href = url;
        link.download = 'sample.pdf';
        link.click();
    };

    // Imprimir el PDF
    document.getElementById('print').onclick = () => {
        const iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        iframe.src = url;
        document.body.appendChild(iframe);
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
        document.body.removeChild(iframe);
    };
}


/* Conversión de imagenes TIFF a pdf */


// Función para mostrar las imágenes TIFF a PDF
function mostrarImagen(nombre_archivo, id_libro, oficinaId) {
    // Url de la ruta del controlador TiffController
    const url = `/tiff/view/${nombre_archivo}/${id_libro}/${oficinaId}`;

    // Establecer url en el iframe
    document.getElementById('viewer').src = url;
}
// Definición de la función en el ámbito global
function getImagenes(oficinaId, id) {
    const tableBody = document.getElementById('imagenes').querySelector('tbody');
    tableBody.innerHTML = '';
    console.log("ID del libro:", id);

    $.ajax({
        url: 'api/libro/imagenes/' + oficinaId + '/' + id,
        method: 'GET',
        success: function(data) {
            if (data.length === 0) {
            // Usar SweetAlert para mostrar la alerta
            Swal.fire({
                icon: 'warning',
                title: 'Sin registros',
                text: 'No se encontraron registros para los parámetros proporcionados.',
            });
            return; // Salimos de la función si no hay datos
        }
            console.log('Datos recibidos:', data);

            data.forEach((item) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td data-id="${item.id_libro}" data-name="${item.nombre_archivo}">${item.nombre_archivo}</td>
                `;
                row.querySelectorAll('td').forEach(td => {
                    td.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const name = this.getAttribute('data-name');

                        mostrarPdf(name, id, oficinaId);
                   // Resaltar la fila seleccionada
                   document.querySelectorAll('#imagenes tbody tr').forEach(tr => {
                       tr.classList.remove('fila-seleccionada'); // Quitar resaltado de otras filas
                   });
                   row.classList.add('fila-seleccionada'); // Agregar resaltado a la fila seleccionada
                    });
                });
                tableBody.appendChild(row);
            });
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
        }
    });
}

$(document).ready(function() {
$("#oficina").change(function() {
const oficinaId = $(this).val();
const tableBody = document.getElementById('libros').querySelector('tbody');
tableBody.innerHTML = ""; // Limpiar el contenido anterior de la tabla

console.log(oficinaId);

$.ajax({
   url: 'api/libros/' + oficinaId,
   method: 'GET',
   success: function(data) {
       data.forEach((item) => {
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

           // Agregar evento de clic a cada celda
           row.querySelectorAll('td').forEach(td => {
               td.addEventListener('click', function() {
                   const id = this.getAttribute('data-id');
                   getImagenes(oficinaId, id);

                   // Resaltar la fila seleccionada
                   document.querySelectorAll('#libros tbody tr').forEach(tr => {
                       tr.classList.remove('fila-seleccionada'); // Quitar resaltado de otras filas
                   });
                   row.classList.add('fila-seleccionada'); // Agregar resaltado a la fila seleccionada
               });
           });

           tableBody.appendChild(row);
       });
   },
   error: function(xhr, status, error) {
       console.error("Error en la solicitud AJAX:", status, error);
   }
});
});
});

