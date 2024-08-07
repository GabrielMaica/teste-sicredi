@extends('admin.layouts.app')

@section('content')
<h1>Editar o Usuário: {{$user->name}}</h1>
<div class="py-6">
    <h2 class="font-semibold text xl text-gray-800">
        Editar o Usuário {{$user->name}}
    </h2>

</div>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<form action="{{ route('users.update', $user->id) }}" method = "POST">
    @method('put')
    @include('admin.users.partials.form')
    
</form>
@endsection