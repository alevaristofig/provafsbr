<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dao\CadastroDao;
use App\Http\Requests\CadastroRequest;

class ApiController extends Controller
{
    private $cadastroDao;

    public function __construct()
    {
        $this->cadastroDao = new CadastroDao();        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = $this->cadastroDao->buscarTodos();

        return view('index',compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CadastroRequest $request)
    {
        if($this->cadastroDao->salvar($request)) {              
            $resposta = response()->json([
                'message' => 'Registro criado com Sucesso'
            ],201);

            session()->flash('success', 'Registro criado com Sucesso!');            
        } else {
            $resposta = response()->json([
                'message' => 'Erro,Registro não foi criado'
            ],500);

            session()->flash('error', 'Erro,Registro não foi criado');
        }

        return redirect('api/create/')->with('resposta', $resposta);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = $this->cadastroDao->buscarRegistro($id);

        return view('edit',compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $resposta = $this->cadastroDao->atualizar($id,$request);

        if($resposta === 'S') {            
            return response()->json([
                'message' => 'Registro criado com Sucesso'
            ],200);

            session()->flash('success', 'Registro criado com Sucesso!');   
        } elseif($resposta === 'N') {
            return response()->json([
                'message' => 'Registro não Encontrado'
            ],404);

            session()->flash('notfound', 'Registro não Encontrado');  
        } else {
            return response()->json([
                'message' => 'Erro, registro não foi atualizado'
            ],500);

            session()->flash('error', 'Erro, registro não foi excluído');         
        }

        return redirect('api/crud-test/')->with('resposta', $resposta);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resp = $this->cadastroDao->excluir($id);

        if($resp === 'S') {            
            $resposta = response()->json([
                'message' => 'Registro excluído com Sucesso'
            ],202);

            session()->flash('success', 'Registro criado com Sucesso!');            
        } elseif($resp === 'N') {
            $resposta = response()->json([                
                'message' => 'Registro não Encontrado'
            ],404);

            session()->flash('notfound', 'Registro não Encontrado');            
        } else {
            $resposta = response()->json([
                'message' => 'Erro, registro não foi excluído'
            ],500);

            session()->flash('error', 'Erro, registro não foi excluído');           
        }

        return redirect('api/crud-test/')->with('resposta', $resposta);  
    }
}