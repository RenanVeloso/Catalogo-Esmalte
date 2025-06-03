@extends('layouts.app')

@section('content')
<h2>Editar Esmalte</h2>

<form action="{{ route('esmaltes.update', $esmalte) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('esmaltes.partials.form', ['submit' => 'Atualizar'])

</form>
@endsection
