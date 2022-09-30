@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('students') }}">Voltar</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Cadastro de Alunos</h1>
                    @if (Request::is('*/edit'))
                    <form method="POST" action="{{ url('students/update') }}/{{ $students->id }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" value="{{ $students->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Endereço de Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $students->email }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>

                    @else
                    
                    <form method="POST" action="{{ url('students/add') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Endereço de Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
