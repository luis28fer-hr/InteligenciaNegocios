@extends('plantilla/layout')

@section('titulo', 'Cuentas T')

@section('plantilla')

    <div class="section">
        <h2>Cuentas T</h2>
        <p>Representación visual que permite un seguimiento claro de los movimientos contables.</p>

        <br>

        <style>
            .card {
                width: 400px;
                background-color: lightblue;
                margin: 10px;
                padding: 10px;
                float: left;
            }

            .card input[type="text"] {
                width: 100%;
                margin-bottom: 10px;
            }

            .card table {
                width: 100%;
                border-collapse: collapse;
            }

            .card th, .card td {
                padding: 5px;
                border: 1px solid #000;
            }

            .card .add-row-btn {
                background-color: #4CAF50;
                color: white;
                padding: 5px 10px;
                border: none;
                cursor: pointer;
            }

            .card .add-row-btn:hover {
                opacity: 0.8;
            }

        </style>

        <script>
            $(document).ready(function() {
                var cardCount = 0;

                $('#add-card-btn').click(function() {
                    cardCount++;
                    var newCard = $('<div class="card"><input type="text" name="card_title" placeholder="Enter title"><table><thead><tr><th>Lo que tengo</th><th>Lo que no tengo</th></tr></thead><tbody></tbody></table><button class="add-row-btn">Add Row</button></div>');
                    $('#card-container').append(newCard);

                    newCard.find('.add-row-btn').click(function() {
                        var newRow = $('<tr><td><input type="text" name="tengo[]" placeholder="Enter content"></td><td><input type="text" name="no_tengo[]" placeholder="Enter content"></td></tr>');
                        newCard.find('tbody').append(newRow);
                    });
                });
            });
        </script>

        <button id="add-card-btn">Add Card</button>
        <div id="card-container"></div>
            
        </div>

    </div>

@endsection
