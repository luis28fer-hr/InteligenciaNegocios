@extends('plantilla/layout')

@section('titulo', 'Cuentas T')

@section('plantilla')

    <div class="section">
        <h2>Cuentas T</h2>
        <p>Representación visual que permite un seguimiento claro de los movimientos contables.</p>

        
        <br>

        <div class="boton">
            <button id="agregar-card">Agregar CuentaT</button>
        </div>

        <button id="agregar-card"><div><i class="fa-solid fa-plus"></i></div>Nueva cuenta</button>
        <button id="balanceG"><div><i class=""></i></div>Generar</button>
        
        {{-- BALANCE GENERAL --}}
        <table id="tabla-generada">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Título</th>
                    <th>Tipo A/P</th>
                    <th>Tipo C/F</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán las filas generadas -->
            </tbody>
        </table>
        

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
                            <label>ID: ${cardId}</label>
                            <input type="text" placeholder="Título de la cuenta">
                            <button class="guardar-titulo"><i class="fa-solid fa-check"></i></button>
                            
                        </div>

                        <div>
                            <select class="form-select form-select-lg" name="select1" id="">
                             <option selected>Select one</option>
                            <option value="Activo">Activo</option>
                            <option value="Pasivo">Pasivo</option>
                             </select>
                             <select class="form-select form-select-lg" name="select2" id="">
                             <option selected>Select one</option>
                            <option value="Activo">Circulante</option>
                            <option value="Fijo">Fijo</option>
                             </select>
                        </div>
                        <table>
                            <tr>
                                <th class="firts">Debito</th>
                                <th class="second">Credito</th>
                            </tr>
                            <tr>
                                <td contenteditable="true" class="lo-que-tengo firts" id="cerito">0</td>
                                <td contenteditable="true" class="lo-que-no-tengo second">0</td>
                            </tr>
                        </table>

                        <div>
                            <input type="text" value="0" disabled class="suma-lo-que-tengo">
                            <input type="text" value="0" disabled class="suma-lo-que-no-tengo" >
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

                // Cerito Coqueto
                // Solo funciona para el Debito 1, se ocupan modificaciones para que funcione
                // en todas las filas, pero es propuesta
                $('#' + cardId + ' #cerito').on('click', function() {
                if (this.innerText === "0") {
                    this.innerText = "";
                }
                });
                $('#' + cardId + ' #cerito').on('blur', function() {
                if (this.innerText === "") {
                    this.innerText = "0";
                }
                });


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

            // // Funcionalidad para el botón "Generar"
            // $('#balanceG').on('click', function() {
            //         // Recorremos cada card para obtener sus datos
            //         $('#card-container .card').each(function() {
            //             var cardId = $(this).attr('id');
            //             var titulo = $(this).find('input[type="text"]').val();
            //             var tipoAP = $(this).find('select[name="select1"]').val();
            //             var tipoCF = $(this).find('select[name="select2"]').val();
            //             var resultResta = $(this).find('.resultado-resta').val();

            //             // Agregamos los datos a una nueva fila en la tabla generada
            //             var filaHtml = `<tr>
            //                 <td>${cardId}</td>
            //                 <td>${titulo}</td>
            //                 <td>${tipoAP}</td>
            //                 <td>${tipoCF}</td>
            //                 <td>${resultResta}</td>
            //             </tr>`;
            //             $('#tabla-generada tbody').append(filaHtml);
            //         });
            //     });

            function generarTabla() {
            var tablaHtml = '';
            
            // Recorremos cada card para obtener sus datos
            $('#card-container .card').each(function() {
                var cardId = $(this).attr('id');
                var titulo = $(this).find('input[type="text"]').val();
                var tipoAP = $(this).find('select[name="select1"]').val();
                var tipoCF = $(this).find('select[name="select2"]').val();
                var resultResta = $(this).find('.resultado-resta').val();

                // Agregamos los datos a una nueva fila en la tabla generada
                tablaHtml += `
                    <tr>
                        <td>${cardId}</td>
                        <td>${titulo}</td>
                        <td>${tipoAP}</td>
                        <td>${tipoCF}</td>
                        <td>${resultResta}</td>
                    </tr>
                `;
            });

            $('#tabla-generada tbody').html(tablaHtml);
        }

         // Funcionalidad para el botón "Generar"
         $('#balanceG').on('click', function() {
            generarTabla(); // Generar o reemplazar la tabla con los datos actualizados
        });

        });
    </script>


@endsection
