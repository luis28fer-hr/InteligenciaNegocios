@extends('plantilla/layout')

@section('titulo', 'Dashboard')

@section('plantilla')


    <div class="section">
        <h2>Dashboard</h2>
        <p>Panel principal</p>

    </div>

    <div class="container">

        {{-- FORM DE REGISTRO DATOS/MOVIMIENTOS --}}
        <form action="#">

            <input type="text">

            <select class="form-select form-select-lg" name="" id="">
                <option selected>Select one</option>
                <option value="">New Delhi</option>
                <option value="">Istanbul</option>
                <option value="">Jakarta</option>
            </select>

            <button type="submit">Guardar</button>

        </form>

    </div>

@endsection
