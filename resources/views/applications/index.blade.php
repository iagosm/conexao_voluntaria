@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">Inscrições</h2>
            <a href="{{ route('applications.create') }}" class="btn btn-success mb-3">Nova Inscrição</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $application)
                        <tr>
                            <td>{{ $application->name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->phone }}</td>
                            <td>{{ $application->cpf }}</td>
                            <td>
                                <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Nenhuma inscrição encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
