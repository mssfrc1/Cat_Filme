<?php

class FilmesController extends AppController {

    public $helpers = array('Html', 'Form');

    public $hasMany = array(
        'Categorias' => array(
            'className' => 'Categorias',
            'foreignKey' => 'id',
        )
    );

    public $components = array('Paginator', 'Session');

    public $paginate = array(
        'limit' => 4,
        'order' => array('filme.categoria_id' => 'asc')
    );

    /*
    *Retorna todos os filmes do nosso model filmes, passam pela paginação do paginator.
    */
    public function index() {
        $this->Paginator->settings = $this->paginate;
        $this->set('filmes', $this->Paginator->paginate('Filme')
    );

    }

    /**
     * Retorna para a view edicao um vetor com os dados do filme e as categorias.
     */

    public function edicao(){

        $this->set('filmes', $this->Filme->find('all'));
        $this->loadModel('Categoria');
        $categorias = $this->Categoria->find('list', array('fields' => array('id', 'nome')));
        $this->set('categorias', $categorias);

    }   
    

    /**
     * 1. Envia os dados da categoria para a view cadastro.
     * 2. Assim que o post é realizado, faz as validações necessárias para cadastrar um filme.
     */

    public function cadastro() {
        $this->loadModel('Categoria');
        $categorias = $this->Categoria->find('list', array('fields' => array('id', 'nome')));
        $this->set('categorias', $categorias);
    
        if ($this->request->is('post')) {
            debug($this->request->data);
    
            // trata o upload de imagens
            if (!empty($this->request->data['Filme']['capa']['name'])) {
                $imageData = $this->request->data['Filme']['capa'];
                $uploadPath = WWW_ROOT . 'media/filmes/';
                $imageName = time() . '_' . $imageData['name'];
                move_uploaded_file($imageData['tmp_name'], $uploadPath . $imageName);
                $this->request->data['Filme']['capa'] = $imageName;
    
                // Salva o nome da capa na coluna do banco de dados
                $this->request->data['Filme']['capa'] = $imageName;
            }
    
            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->sucess('O Filme foi salvo!');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Não foi possível salvar o filme.');
            }
        }
    }

    /**
     * Deleta um filme baseado no ID
     */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Filme->delete($id)) {
            $this->Flash->sucess('O Filme foi removido.');
            $this->redirect(array('action' => 'edicao'));
        }else{
            $this->Flash->error('Houve um erro ao tentar remover o filme');
        }
    }

    /**
     * Atualiza os campos de um filme
     */
    public function update() {
        if ($this->request->is('post')) {
            $id = $this->request->data['Filme']['id'];
            $this->Filme->id = $id;
            // Converte o nome da categoria para o seu valor em ID
            $this->request->data['Filme']['categoria_id'] = $this->request->data['Filme']['categoria_id_hidden'];
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->sucess('O filme foi atualizado.');
            } else {
                $this->Flash->error('Erro ao atualizar o filme.');
            }
        }
        $this->redirect(array('action' => 'edicao'));
    }

}



?>