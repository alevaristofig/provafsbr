@extends('layout.app')

@section('conteudo')
    <main>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-bottom">
                <h1 class="h2">Cadastros</h1>
            </div>
            @if (session()->has('success'))     
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session()->has('notfound')) 
                <div class="alert alert-warning">
                    {{ session('notfound') }}
                </div>
            @elseif (session()->has('error')) 
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif  
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">   
                <a href="{{url('api/create')}}" class="btn btn-info" style="margin-top:15px">Novo</a>       
                <table id="" class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Senha</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dados AS $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->nome}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->senha}}</td>
                                <td>{{ ($d->situacao == 'A') ? 'Ativo': 'Inativo'}}</td>
                                <td>
                                    <a href="{{url('api/show',[$d->id])}}" class="btn btn-info">Editar</a>
                                    <div>
                                        <form method="post" action="{{url('/api/crud-test',['id' => $d->id])}}">
                                            @csrf  
                                            @method("DELETE")    
                                            <button class="btn btn-danger">Excluir</button>
                                        </form> 
                                    </div>                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                            
            </div>
        </div>
        {{ $dados->links() }}
    </main>

@endsection