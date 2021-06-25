<?php

use App\Core\Controller;

class Produtos extends Controller{

    //listagem
    public function index(){

        $produtoModel = $this->Model("Produto");

        $produtos = $produtoModel->listarTodos();

        echo json_encode($produtos, JSON_UNESCAPED_UNICODE);
    }

    //buscar pelo id

    //retornar a vire de edição

    //salvar a edição

    //retornar a vire de inserção

    //salvar a inserção

    //deletar

}