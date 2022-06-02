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
                <form method="post" action="{{url('/api/crud-test')}}">
            <div class="row">
                <div class="form-group col-md-6 margin-linha-form">                    
                    <input type="nome" name="nome" id="nome" placeholder="Nome..." class="form-control @error('nome') is-invalid @enderror"  require />
                    @error('nome')
                        <div class="erro_form">
                            {{$message}}
                        </div> 
                    @enderror
                </div>
                <div class="form-group col-md-6">                    
                    <input type="text" name="email" id="email" placeholder="E-mail..." class="form-control @error('email') is-invalid @enderror" require />
                    @error('email')
                        <div class="erro_form">
                            {{$message}}
                        </div> 
                    @enderror
                </div>
                <div class="form-group col-md-6">                    
                    <input type="password" name="password" id="password" placeholder="Senha..." class="form-control @error('password') is-invalid @enderror" require />
                    @error('password')
                        <div class="erro_form">
                            {{$message}}
                        </div> 
                    @enderror
                </div>
                <div class="form-group col-md-6">                    
                    <select name="situacao" class="form-control" class="form-control @error('password') is-invalid @enderror">
                        <option value="">Escolhar uma Opção</option>
                        <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                    </select>
                    @error('password')
                        <div class="erro_form">
                            {{$message}}
                        </div> 
                    @enderror
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