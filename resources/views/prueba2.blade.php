<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avanzar y Retroceder en un Arreglo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>
        <h2 id="item"></h2>
        <button id="prev">Anterior</button>
        <button id="next">Siguiente</button>
    </div>

    <script>
        $(document).ready(function() {
            // Definimos el arreglo
            const items = ["Elemento 1", "Elemento 2", "Elemento 3", "Elemento 4"];
            let currentIndex = 0;

            // Función para mostrar el elemento actual
            function showItem() {
                $('#item').text(items[currentIndex]);
            }

            // Manejo del botón "Anterior"
            $('#prev').click(function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    showItem();
                }
            });

            // Manejo del botón "Siguiente"
            $('#next').click(function() {
                if (currentIndex < items.length - 1) {
                    currentIndex++;
                    showItem();
                }
            });

            // Mostrar el primer elemento al cargar
            showItem();
        });
    </script>
</body>
</html>
