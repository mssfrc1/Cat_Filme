<?php

class CategoriasController extends AppController {
    public $helpers = array('Html');

    public function getCategorias() {
        $categorias = $this->Categoria->find('all');
        return $categorias;
    }
    
    public function cadastro(){
       
        //Cadastra uma categoria, parâmetros recebidos por POST
        
        if ($this->request->is('post')) {
            try {
                $this->Categoria->create();
                if ($this->Categoria->save($this->request->data)) {
                    $this->Flash->sucess('A Categoria foi salva!');
                } else {
                    $this->Flash->error('Não foi possível salvar a categoria.');
                } 
            } catch (PDOException $e) {
                $this->Flash->error('Ocorreu um erro ao salvar a categoria, verifique se ela não está duplicada');
            }
        }
    }
}



?>