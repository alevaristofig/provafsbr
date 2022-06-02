@extends('layout.app')

@section('conteudo')

    <main>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-bottom">
                <h1 class="h2">Cadastros</h1>
            </div>
        </div>    
        @if (session()->has('success'))     
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @else
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif                
        <form method="post" action="{{url('/api/crud-test',['id' => $dados->id])}}">
            @csrf  
            @method("PUT")           
            <div class="row">
                <div class="form-group col-md-6 margin-linha-form">                    
                    <input type="nome" class="form-control" name="nome" id="nome" value="{{$dados->nome}}" placeholder="Nome..."  require />
                </div>
                <div class="form-group col-md-6">                    
                    <input type="text" class="form-control" name="email" id="email" value="{{$dados->email}}" placeholder="E-mail..." require />
                </div>
                <div class="form-group col-md-6">                    
                    <input type="password" class="form-control" name="password" id="password" value="{{$dados->password}}" placeholder="Senha..." require />
                </div>
                <div class="form-group col-md-6">                    
                    <select name="situacao" class="form-control">
                        <option value="">Escolhar uma Opção</option>
                        <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <button class="btn btn-success">Salvar</button>
                </div>
            </div>                    
        </form> 
        <div class="form-group col-md-8">
            <a href="{{url('api/crud-test')}}" class="btn btn-danger btn_cancelar">Cancelar</a>
        </div>           
    </main>

@endsection