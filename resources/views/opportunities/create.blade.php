@extends('layouts.app')

@section('title', 'Criar Oportunidade')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: #28a745; color: white;">
                    <h4>Criar Oportunidade</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('opportunities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cover_image">Capa da Oportunidade</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Criar Oportunidade</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
