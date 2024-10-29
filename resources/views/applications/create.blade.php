@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center" style="background-color: #28a745; color: white;">
                    <h4>{{ __('Nova Inscrição') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('applications.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="opportunity_id" class="form-label">Oportunidade</label>
                            <select id="opportunity_id" class="form-control @error('opportunity_id') is-invalid @enderror" name="opportunity_id" required>
                                <option value="">Selecione uma oportunidade</option>
                                @foreach ($opportunities as $opportunity)
                                    <option value="{{ $opportunity->id }}" 
                                        {{ (request()->get('opportunity_id') == $opportunity->id) ? 'selected' : '' }}>
                                        {{ $opportunity->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('opportunity_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required>
                            @error('cpf')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Enviar Inscrição</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
