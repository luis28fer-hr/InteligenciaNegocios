@extends('plantilla/layout')

@section('titulo', 'Cuentas T')

@section('plantilla')

    <div class="section">
        <h2>Cuentas T</h2>
        <p>Representación visual que permite un seguimiento claro de los movimientos contables.</p>

        
        
        <button id="agregar-card">Agregar Card</button>

        <div id="card-container">
            <!-- Aquí se agregarán los cards dinámicamente -->
        </div>
    </div>

    <style>
        .card {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .card input {
            margin-bottom: 10px;
        }
        .card table {
            margin-bottom: 10px;
        }
        .card table th {
            text-align: center;
        }
        .card table td {
            padding: 5px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var cardIndex = 1;

            // Agregar un nuevo card al hacer clic en el botón
            $('#agregar-card').on('click', function() {
                var cardId = 'card-' + cardIndex;
                var cardHtml = `
                    <div id="${cardId}" class="card">
                        <input type="text" placeholder="Título">
                        <button class="guardar-titulo">Guardar</button>
                        <table>
                            <tr>
                                <th>Lo que tengo</th>
                                <th>Lo que no tengo</th>
                            </tr>
                            <tr>
                                <td contenteditable="true" class="lo-que-tengo">0</td>
                                <td contenteditable="true" class="lo-que-no-tengo">0</td>
                            </tr>
                        </table>
                        <button class="agregar-fila">Agregar Fila</button>
                        <input type="text" value="0" disabled class="suma-lo-que-tengo">
                        <input type="text" value="0" disabled class="suma-lo-que-no-tengo">
                        <input type="text" value="0" disabled class="resultado-resta">
                        <button class="eliminar-card">Eliminar Card</button>
                    </div>
                `;
                $('#card-container').append(cardHtml);
                cardIndex++;

                // Funcionalidad para guardar el título
                $('#' + cardId + ' .guardar-titulo').on('click', function() {
                    var titulo = $('#' + cardId + ' input[type="text"]').val();
                    $('#' + cardId + ' h3').text(titulo);
                });

                // Funcionalidad para agregar filas a la tabla
                $('#' + cardId + ' .agregar-fila').on('click', function() {
                    var filaHtml = `
                        <tr>
                            <td contenteditable="true" class="lo-que-tengo">0</td>
                            <td contenteditable="true" class="lo-que-no-tengo">0</td>
                        </tr>
                    `;
                    $('#' + cardId + ' table').append(filaHtml);
                });

                // Actualizar la suma de "Lo que tengo" y "Lo que no tengo" al cambiar los valores en la tabla
                $('#' + cardId + ' table').on('input', 'td.lo-que-tengo, td.lo-que-no-tengo', function() {
                    var sumTengo = 0;
                    var sumNoTengo = 0;

                    $('#' + cardId + ' table td.lo-que-tengo').each(function() {
                        sumTengo += parseInt($(this).text()) || 0;
                    });

                    $('#' + cardId + ' table td.lo-que-no-tengo').each(function() {
                        sumNoTengo += parseInt($(this).text()) || 0;
                    });

                    $('#' + cardId + ' .suma-lo-que-tengo').val(sumTengo);
                    $('#' + cardId + ' .suma-lo-que-no-tengo').val(sumNoTengo);
                    $('#' + cardId + ' .resultado-resta').val(sumTengo - sumNoTengo);
                });

                // Funcionalidad para eliminar el card
                $('#' + cardId + ' .eliminar-card').on('click', function() {
                    $('#' + cardId).remove();
                });
            });
        });
    </script>
            
       

    </div>

@endsection
