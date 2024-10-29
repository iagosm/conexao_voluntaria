@extends('layouts.app')

@section('title', 'Oportunidades')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Oportunidades</h2>
                <a href="{{ route('opportunities.create') }}" class="btn btn-primary">Nova Oportunidade</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Capa</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($opportunities as $opportunity)
                                <tr>
                                    <td>{{ $opportunity->id }}</td>
                                    <td>{{ $opportunity->title }}</td>
                                    <td>
                                        @if ($opportunity->cover_image)
                                            <img src="{{ asset('images/' . $opportunity->cover_image) }}" alt="Capa da Oportunidade" style="width: 100px; height: auto;">
                                        @else
                                            <span>Nenhuma imagem</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('opportunities.edit', $opportunity->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('opportunities.destroy', $opportunity->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($opportunities->isEmpty())
                        <div class="alert alert-warning text-center">Nenhuma oportunidade encontrada.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
