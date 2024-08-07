@extends('admin.layouts.app')

@section('content')
<h1>Usuários</h1>

@if (session()->has('success'))
{{ session('success') }}

@endif
<a href="{{ route('users.create') }}">Adicionar Novo Usuário</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                    <a href="{{ route('users.show', $user->id) }}">Visualizar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td>colspan="100">nenhum usuário cadastrado</td>
            </tr>
            @endforelse

    </tbody>
</table>

{{ $users->links() }}
@endsection