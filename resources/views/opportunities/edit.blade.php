@extends('layouts.app')

@section('title', 'Editar Oportunidade')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: #28a745; color: white;">
                    <h4>Editar Oportunidade</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('opportunities.update', $opportunity->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $opportunity->title }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $opportunity->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cover_image">Capa da Oportunidade</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Deixe em branco se não quiser alterar a imagem atual.</small>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Atualizar Oportunidade</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
