<!-- resources/views/times/form.blade.php -->
@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ isset($time) ? 'Editar Time' : 'Novo Time' }}</h1>
        <!-- Formulário de criação/edição de time -->
    </div>
@endsection
