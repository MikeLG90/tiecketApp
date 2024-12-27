<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar TIFF como PDF</title>
    <style>
        #viewer {
            width: 100%;
            height: 500px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Visualizar Imagen TIFF como PDF</h1>
    
    <!-- Formulario para subir TIFF -->
    <form id="upload-form" action="{{ route('preview-tiff') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="tiff">Seleccionar archivo TIFF:</label>
        <input type="file" name="tiff" id="tiff" accept=".tiff,.tif" required>
        <button type="submit">Previsualizar</button>
    </form>

    <!-- Contenedor para el visor PDF nativo -->
    <iframe id="viewer" src="" frameborder="0"></iframe>

    <script>
        const form = document.getElementById('upload-form');
        const viewer = document.getElementById('viewer');

        form.addEventListener('submit', async function (event) {
            event.preventDefault(); // Evita la recarga de la página

            const formData = new FormData(form);

            try {
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

                // Muestra el PDF en el iframe usando el visor nativo del navegador
                viewer.src = pdfUrl;

            } catch (error) {
                console.error('Error al procesar el archivo:', error);
                alert('Ocurrió un error al procesar el archivo.');
            }
        });
    </script>
</body>
</html>
