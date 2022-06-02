<?php

    namespace App\Http\Dao;

    use App\CadastroModel;

    class CadastroDao extends CadastroModel
    {      
        public function __construct()
        {
            parent::__construct();
        }

        public function buscarTodos(): object 
        {
            return $this->paginate(15);
        }  

        public function buscarRegistro($id): object 
        {
            return $this->find($id);
        }  

        public function salvar($dados): bool 
        {
            try{
                $this->timestamps = false;               
                $this->nome = $dados->input('nome');
                $this->email = $dados->input('email');
                $this->senha = sha1($dados->input('senha'));
                $this->situacao = $dados->input('situacao');

                $this->save();

                return true;
            } catch(\Exception $e){
                return false;
            }            
        }

        public function atualizar($id, $dados): string
        {            
            $registro = $this->find($id);

            if(isset($registro)){
                try{
                    $registro->timestamps = false; 
                    $registro->nome = $dados->input('nome');                   
                    $registro->email = $dados->input('email');
                    $registro->senha = sha1($dados->input('senha'));
                    $registro->situacao = $dados->input('situacao');
                    $registro->atualizado_at = DATE('Y-m-d H:i:s');
    
                    $registro->update();
    
                    return 'S';
                } catch(\Exception $e){                    
                    return 'E';
                }
            } else {
                return 'N';
            }
        }

        public function excluir($id): string
        {
            $registro = $this->find($id);

            if(isset($registro)){
                try{
                    $registro->timestamps = false; 
                    $registro->situacao = 'I';
                    $registro->excluido_at = DATE('Y-m-d H:i:s');
                    $registro->update();
    
                    return 'S';
                } catch(\Exception $e){     
                    echo $e->getMessage();exit;               
                    return 'E';
                }
            } else {
                return 'N';
            }
        }
    }