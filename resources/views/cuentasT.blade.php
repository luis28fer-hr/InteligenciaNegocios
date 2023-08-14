@extends('plantilla/layout')

@section('titulo', 'Cuentas T')

@section('plantilla')

    <div class="section">
        <h2>Cuentas T</h2>
        <p>Representación visual que permite un seguimiento claro de los movimientos contables.</p>
   
        <br>

        <button id="agregar-card"><div><i class="fa-solid fa-plus"></i></div>Nueva cuenta</button>
        <button id="balanceG"><div><i class=""></i></div>Generar</button>
        
         {{-- ACTIVOS 
        <h3>Activos</h3>
        <table id="tabla-activos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Circulante/Fijo</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán las filas generadas -->
            </tbody>
        </table>

        {PASIVOS 
        <h3>Pasivos</h3>
        <table id="tabla-pasivos">
            <thead>
                <tr class>
                    <th>ID</th>
                    <th>Título</th>
                    <th>TCirculante/Fijo</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán las filas generadas -->
            </tbody>
        </table>
        --}}
    
        
    {{-- ACTIVOS --}}
    <h3>Activos</h3>
    <div class="tables-container">

        {{-- Tabla de Circulantes --}}
        <table id="circulantes-A" border="1">
            <thead>
                <tr> <th colspan="2">Circulantes</th> </tr>
                <tr>
                    <th>Título</th>
                    <th>Cantidad</th>
                </tr>
            </thead>    
            <tbody>
            <!-- Aquí se agregarán las filas generadas -->
            </tbody>
            <tfoot>
                <tr>
                    <th>Total A Circulante</th>
                    <th id="totalAC">0.00</th>
                </tr>
            </tfoot>
            
        </table>

        {{-- Tabla de Fijos --}}
        <table id="fijos-A" border="1">
            <thead>
                <tr> <th colspan="2">Fijos</th> </tr>
                <tr>
                    <th>Título</th>
                    <th>Cantidad</th>
                </tr>
            </thead>   
            <tbody>
                <!-- Aquí se agregarán las filas generadas -->
            </tbody>
            <tfoot>
                <tr>
                    <th>Total A Fijo</th>
                    <th id="totalAF">0.00</th>
                </tr>
            </tfoot>
            
        </table>
    </div>

    {{-- PASIVOS --}}
    <h3>Pasivos</h3>
    <div class="tables-container">

        {{-- Tabla de Circulantes --}}
        <table id="circulantes-P" border="1">
            <thead>
                <tr> <th colspan="2">Circulantes</th> </tr>
                <tr>
                    <th>Título</th>
                    <th>Cantidad</th>
                </tr>
            </thead>    
            <tbody>
            <!-- Aquí se agregarán las filas generadas -->
            </tbody>
            <tfoot>
                <tr>
                    <th>Total P Circulante</th>
                    <th id="totalPC">0.00</th>
                </tr>
            </tfoot>
            
        </table>

        {{-- Tabla de Fijos --}}
        <table id="fijos-P" border="1">
            <thead>
                <tr> <th colspan="2">Fijos</th> </tr>
                <tr>
                    <th>Título</th>
                    <th>Cantidad</th>
                </tr>
            </thead>   
            <tbody>
                <!-- Aquí se agregarán las filas generadas -->
            </tbody>
            <tfoot>
                <tr>
                    <th>Total P Fijo</th>
                    <th id="totalPF">0.00</th>
                </tr>
            </tfoot>
            
        </table>
    </div>
        

     {{-- TOTALES --}}
     <h3>TOTALES</h3>
     <div class="tables-container">

         {{-- Tabla de Fijos --}}
         <table id="Totales" border="1">
             <thead>
                 <tr>
                     <th>Título</th>
                     <th>Cantidad</th>
                 </tr>
             </thead>   
             <tbody>
                <tr>
                    <th>Total Activo</th>                
                    <th id="totalActivo">0.00</th>
                </tr>
                <tr>
                    <th>Total Pasivo</th>                
                    <th id="totalPasivo">0.00</th>
                </tr>
                <tr>
                    <th>Capital</th>                
                    <th id="capital">0.00</th>
                </tr>
                <tr>
                    <th>TP+C</th>                
                    <th id="totalPaCa">0.00</th>
                </tr>
                    
             </tbody>
             
         </table>
     </div>
    
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
                            <option value="Circulante">Circulante</option>
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

                function initializeCerito(rowElement) {
                    var ceritoElement = $(rowElement).find('.lo-que-tengo.firts');
                    var ceritoElement = $(rowElement).find('.lo-que-no-tengo.second');

                    ceritoElement.on('click', function() {
                        if (this.innerText === "0") {
                            this.innerText = "";
                        }
                    });

                    ceritoElement.on('blur', function() {
                        if (this.innerText === "") {
                            this.innerText = "0";
                        }
                    });
                }
                function initializeAllCards() {
                    $('.card').each(function() {
                        initializeCerito(this);
                    });
                }

                initializeAllCards();

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


            //Filas de las tablas del BALANCE G
            function generarFilas() {
                //Declaracion de variables
                var filaHtmlCirculante = '';
                var filaHtmlFijo = '';

                var filaHtmlCirculanteP = '';
                var filaHtmlFijoP = '';

                var totalAC = 0;
                var totalAF = 0;

                var totalPC = 0;
                var totalPF = 0;

                var totalActivo = 0;
                var totalPasivo = 0;

                var totalCapital = 0;
                var totalPaCa = 0;

            // Recorremos cada card para obtener sus datos
            $('#card-container .card').each(function () {

                //Variables del card
                var cardId = $(this).attr('id');
                var titulo = $(this).find('input[type="text"]').val();
                var tipoAP = $(this).find('select[name="select1"]').val();
                var tipoCF = $(this).find('select[name="select2"]').val();
                var resultResta = $(this).find('.resultado-resta').val();

                //Si es activo entonces
                if (tipoAP == 'Activo'){

                    // Activo Circulante o fijo
                    if (tipoCF === 'Circulante') {
                        filaHtmlCirculante += `
                            <tr>
                                <td>${titulo}</td>
                                <td>${resultResta}</td>
                            </tr>`;
                        //Agrega fila
                        $('#circulantes-A tbody').html(filaHtmlCirculante);
                            //Suma de las cantidades AC
                            totalAC += parseFloat(resultResta);

                    }else if (tipoCF === 'Fijo') {
                        filaHtmlFijo += `
                            <tr>
                                <td>${titulo}</td>
                                <td>${resultResta}</td>
                            </tr>`;
                        //Agrega fila
                        $('#fijos-A tbody').html(filaHtmlFijo);
                            //Suma de las cantidades AF
                            totalAF += parseFloat(resultResta);
                    } 

                //Si es Pasivo entonces
                }else if(tipoAP == 'Pasivo'){

                    // Activo Circulante o fijo
                     if (tipoCF === 'Circulante') {
                    filaHtmlCirculanteP += `
                        <tr>
                            <td>${titulo}</td>
                            <td>${resultResta}</td>
                        </tr>`;
                        //Agrega fila
                        $('#circulantes-P tbody').html(filaHtmlCirculanteP);
                            //Suma de las cantidades PC
                            totalPC += parseFloat(resultResta);

                    }else if (tipoCF === 'Fijo') {
                        filaHtmlFijoP += `
                            <tr>
                                <td>${titulo}</td>
                                <td>${resultResta}</td>
                            </tr>`;
                        //Agrega fila
                        $('#fijos-P tbody').html(filaHtmlFijoP);
                            //Suma de las cantidad PF
                            totalPF += parseFloat(resultResta);
                    } 

                }else{
                    //Si no es activo o pasivo entonces es capital (se suman las capitales)
                    totalCapital += parseFloat(resultResta);
                } 

                //Operaciones
                totalActivo = (totalAC) + (totalAF); 
                totalPasivo = (totalPC) + (totalPF);
                totalPaCa = (totalPasivo) + (totalCapital); 
 

            });
            //Totale Pasivo y total Activo
            $('#totalActivo').text(totalActivo.toFixed(2));
            $('#totalPasivo').text(totalPasivo.toFixed(2));

            //Capital
            $('#capital').text(totalCapital.toFixed(2));

            //Capital + Total Pasivo
            $('#totalPaCa').text(totalPaCa.toFixed(2));

            //Sub totales
            $('#totalAC').text(totalAC.toFixed(2));
            $('#totalAF').text(totalAF.toFixed(2));
            $('#totalPC').text(totalPC.toFixed(2));
            $('#totalPF').text(totalPF.toFixed(2));
        }

        // Funcionalidad para el botón "Generar"
        $('#balanceG').on('click', function () {
            generarFilas(); // Generar o reemplazar las filas en las tablas con los datos actualizados
        });

        
    });
    </script>

<title>Tabla de Movimientos</title>
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }
  
  th {
    background-color: #f2f2f2;
  }
  
  .total-row {
    font-weight: bold;
  }
  
  .edit-btn {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 6px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    cursor: pointer;
  }
  
  .delete-btn {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 6px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    cursor: pointer;
  },
  .colored-cell {
  background-color: yellow; /* Cambia el color aquí según tus preferencias */
}
</style>

<div class="section">
<h2>Balanza de comprobacion</h2>
        <p>En este apartado indicamos los valores que se encuentran en las cuentasT</p>
</div>

<div>
    <button id="add-row-btn">Agregar fila</button>
    <table id="movimientos-table">
      <thead>
        <tr>
          <th>Descripción</th>
          <th>MoviDebe</th>
          <th>MoviHaber</th>
          <th>SaldoDeudor</th>
          <th>SaldoAcreedor</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot>
        <tr class="total-row">
          <td>Total:</td>
          <td id="total-movidebe">0</td>
          <td id="total-movihaber">0</td>
          <td id="total-saldodeudor">0</td>
          <td id="total-saldoacreedor">0</td>
          <td></td>
        </tr>
      </tfoot>
    </table>

    <script>
        document.getElementById('add-row-btn').addEventListener('click', function() {
          var table = document.getElementById('movimientos-table');
          var newRow = table.insertRow(1);
          newRow.innerHTML = `
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td>
              <button class="delete-btn">Eliminar</button>
            </td>
          `;
    
          newRow.querySelector('.delete-btn').addEventListener('click', function() {
            table.deleteRow(newRow.rowIndex);
            updateTotal();
          });
    
          updateTotal();
        });
    
        function updateTotal() {
          var table = document.getElementById('movimientos-table');
          var totalMovidebe = 0;
          var totalMovihaber = 0;
          var totalSaldodeudor = 0;
          var totalSaldoacreedor = 0;

          var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
          for (var i = 1; i < table.rows.length - 1; i++) {
            var row = table.rows[i];
            var movidebe = parseFloat(row.cells[1].textContent);
            var movihaber = parseFloat(row.cells[2].textContent);
            var saldodeudor = parseFloat(row.cells[3].textContent);
            var saldoacreedor = parseFloat(row.cells[4].textContent);
    
            totalMovidebe += isNaN(movidebe) ? 0 : movidebe;
            totalMovihaber += isNaN(movihaber) ? 0 : movihaber;
            totalSaldodeudor += isNaN(saldodeudor) ? 0 : saldodeudor;
            totalSaldoacreedor += isNaN(saldoacreedor) ? 0 : saldoacreedor;
          }
    
          document.getElementById('total-movidebe').textContent = totalMovidebe.toFixed(2);
          document.getElementById('total-movihaber').textContent = totalMovihaber.toFixed(2);
          document.getElementById('total-saldodeudor').textContent = totalSaldodeudor.toFixed(2);
          document.getElementById('total-saldoacreedor').textContent = totalSaldoacreedor.toFixed(2);
        }
      </script>
</div>

<div class="section">
  <h2>Nomina de usuario</h2>
          <p>En este apartado indicamos los valores que se encuentran en las cuentasT</p>
  </div>

<div>
  <table>
    <tr>
      <th>Impuesto</th>
      <th>Mensual</th>
    </tr>
    <tr>
      <td>Base</td>
      <td contenteditable="true" id="base"></td>
    </tr>
    <tr>
      <td>Limite inferior</td>
      <td contenteditable="true" id="limite-inferior"></td>
    </tr>
    <tr>
      <td>Excedente sobre el límite inferior</td>
      <td id="excedente"></td>
    </tr>
    <tr>
      <td>Tasa de impuestos</td>
      <td contenteditable="true" id="tasa"></td>
    </tr>
    <tr>
      <td>Impuesto previo</td>
      <td id="impuesto-previo"></td>
    </tr>
    <tr>
      <td>Cuota fija</td>
      <td contenteditable="true" id="cuota-fija"></td>
    </tr>
    <tr>
      <td>Impuesto</td>
      <td id="impuesto"></td>
    </tr>
    <tr>
      <td>Subsidio para el empleo</td>
      <td contenteditable="true" id="subsidio"></td>
    </tr>
    <tr>
      <td>Cantidad a retener</td>
      <td id="cantidad-retener"></td>
    </tr>
    <tr>
      <td>Subsidio para el empleo a pagar en efectivo</td>
      <td id="subsidio-efectivo"></td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Ingreso Neto</td>
      <td id="ingreso-neto"></td>
    </tr>
  </table>

  <script>
    const baseInput = document.getElementById('base');
    const limiteInput = document.getElementById('limite-inferior');
    const excedenteCell = document.getElementById('excedente');
    const tasaInput = document.getElementById('tasa');
    const impuestoPrevioCell = document.getElementById('impuesto-previo');
    const cuotaFijaInput = document.getElementById('cuota-fija');
    const impuestoCell = document.getElementById('impuesto');
    const subsidioInput = document.getElementById('subsidio');
    const cantiRetener = document.getElementById('cantidad-retener');
    const subsidioEfectivoCell = document.getElementById('subsidio-efectivo');
    const ingresoNetoCell = document.getElementById('ingreso-neto');

    function calculate() {
      const base = parseFloat(baseInput.innerText) || 0;
      const limite = parseFloat(limiteInput.innerText) || 0;
      const tasa = parseFloat(tasaInput.innerText) || 0;
      const cuotaFija = parseFloat(cuotaFijaInput.innerText) || 0;
      const subsidio = parseFloat(subsidioInput.innerText) || 0;

      const excedente = Math.max(base - limite, 0);
      excedenteCell.innerText = excedente.toFixed(2);

      const impuestoPrevio = excedente * (tasa / 100);
      impuestoPrevioCell.innerText = impuestoPrevio.toFixed(2);

      const impuesto = impuestoPrevio + cuotaFija;
      impuestoCell.innerText = impuesto.toFixed(2);

      const cantidadRetener = Math.max(impuesto - subsidio, 0);
      cantiRetener.innerText = cantidadRetener.toFixed(2);

      const subsidioEfectivo = Math.abs(impuesto - subsidio, 0);
      subsidioEfectivoCell.innerText = subsidioEfectivo.toFixed(2);

      const ingresoNeto = base + subsidioEfectivo;
      ingresoNetoCell.innerText = ingresoNeto.toFixed(2);
    }

    baseInput.addEventListener('input', calculate);
    limiteInput.addEventListener('input', calculate);
    tasaInput.addEventListener('input', calculate);
    cuotaFijaInput.addEventListener('input', calculate);
    subsidioInput.addEventListener('input', calculate);

    calculate();
  </script>
</div>



@endsection
