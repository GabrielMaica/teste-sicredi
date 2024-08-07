@extends('admin.layouts.app')

@section('content')
<div class="py-1 mb-4 text-center">
    <h2 class="font-bold text-xl text-gray-800">
    Usuários
    </h2>
@can('is-admin')
<h2>Você é um administrador do sistema!</h2>
@if (session()->has('success'))
{{ session('success') }}

@endif
<a href="{{ route('users.create') }}", class="font-semibold text-l text-gray-800">Adicionar Novo Usuário</a>
@endcan

    </a>
    <table class="shadow-2xl border-2 w-6/12 mx-auto">
    <thead class="text-gray-100">
        <tr>
            <th class="font-bold">Nome</th>
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
                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Editar</a>
                    @can('is-admin')
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:underline">Visualizar</a>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Nenhum usuário cadastrado</td>
            </tr>
        @endforelse
    </tbody>
</table>


    </tbody>
</table>
{{ $users->links() }}
@endsection