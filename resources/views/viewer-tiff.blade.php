<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar TIFF</title>
    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <style>
        #viewer {
            width: 100%;
            height: 500px;
            border: 1px solid #ccc;
            overflow: auto;
        }
    </style>
</head>
<body>
    <h1>Visualizar Imagen TIFF</h1>
    
    <!-- Formulario para subir TIFF -->
    <form id="upload-form" action="{{ route('preview-tiff') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="tiff">Seleccionar archivo TIFF:</label>
        <input type="file" name="tiff" id="tiff" accept=".tiff,.tif" required>
        <button type="submit">Previsualizar</button>
    </form>

    <!-- Contenedor del visor PDF -->
    <div id="viewer"></div>

    <script>
        const form = document.getElementById('upload-form');
        form.addEventListener('submit', async function (event) {
            event.preventDefault(); // Evita la recarga de la página

            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                alert('Error al cargar el archivo. Verifica que sea un TIFF válido.');
                return;
            }

            // Obtén el PDF generado como blob
            const pdfBlob = await response.blob();
            const pdfUrl = URL.createObjectURL(pdfBlob);

            // Usa PDF.js para renderizar el PDF
            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

            const container = document.getElementById('viewer');
            container.innerHTML = ''; // Limpia el visor
            pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
                pdf.getPage(1).then(function (page) {
                    const viewport = page.getViewport({ scale: 1 });
                    const canvas = document.createElement('canvas');
                    container.appendChild(canvas);

                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    page.render({
                        canvasContext: context,
                        viewport: viewport,
                    });
                });
            });
        });
    </script>
</body>
</html>
