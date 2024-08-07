@extends('admin.layouts.app')

@section('content')
<div class="py-6">
<h1 class="font-semibold text-xl text-gray-800">
    Novo Usuário
</h1>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<form action="{{ route('users.store') }}" method = "POST">
    @include('admin.users.partials.form')
    
</form>
@endsection