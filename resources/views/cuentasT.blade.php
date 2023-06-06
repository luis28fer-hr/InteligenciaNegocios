@extends('plantilla/layout')

@section('titulo', 'Cuentas T')

@section('plantilla')

    <div class="section">
        <h2>Cuentas T</h2>
        <p>Representación visual que permite un seguimiento claro de los movimientos contables.</p>


        <button id="agregar-card"><div><i class="fa-solid fa-plus"></i></div>Nueva cuenta</button>

        <div id="card-container">
            <!-- Aquí se agregarán los cards dinámicamente -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var cardIndex = 1;

            // Agregar un nuevo card al hacer clic en el botón
            $('#agregar-card').on('click', function() {
                var cardId = 'card-' + cardIndex;
                var cardHtml = `
                    <div id="${cardId}" class="card">
                        <div>
                            <input type="text" placeholder="Título de la cuenta">
                            <button class="guardar-titulo"><i class="fa-solid fa-check"></i></button>
                        </div>
                        <table>
                            <tr>
                                <th class="firts">Debito</th>
                                <th class="second">Credito</th>
                            </tr>
                            <tr>
                                <td contenteditable="true" class="lo-que-tengo firts">0</td>
                                <td contenteditable="true" class="lo-que-no-tengo second">0</td>
                            </tr>
                        </table>

                        <div>
                            <input type="text" value="0" disabled class="suma-lo-que-tengo">
                            <input type="text" value="0" disabled class="suma-lo-que-no-tengo">
                        </div>
                        <input type="text" value="0" disabled class="resultado-resta">
                        <div class = "btns">
                            <button class="agregar-fila">Agregar Fila</button>
                            <button class="eliminar-card">Eliminar Card</button>
                        </div>
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
                            <td contenteditable="true" class="lo-que-tengo firts">0</td>
                                <td contenteditable="true" class="lo-que-no-tengo second">0</td>
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
