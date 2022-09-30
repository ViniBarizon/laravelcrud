@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('students/new') }}">Novo Aluno</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de Alunos</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $s)
                            <tr>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->email }}</td> 
                            <td><a href="students/{{$s->id}}/edit" class ="btn btn-info" type = "att">Alterar</a></td>
                            <td>
                                <form method="POST" action="students/delete/{{ $s->id }}">
                                    @csrf
                                <button class ="btn btn-danger">Excluir</button>
                                </form>
                            </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
