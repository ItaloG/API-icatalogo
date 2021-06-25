<?php

session_start();

use App\Core\Controller;

class Categorias extends Controller
{
    //listagem de categorias
    public function index()
    {

        $categoriaModel = $this->Model("Categoria");

        $categorias = $categoriaModel->listarTodas();

        echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
    }

    public function find($id)
    {

        $categoriaModel = $this->Model("Categoria");
        $categoria = $categoriaModel->buscarPorId($id);

        if ($categoria) {
            echo json_encode($categoria, JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(400);
            echo json_encode(["erro" => "Categoria não encontrada"], JSON_UNESCAPED_UNICODE);
        }
    }

    public function store()
    {

        $novaCategoria = $this->getRequestBody();

        //instanciando o model
        $categoriaModel = $this->model("Categoria");

        //atribuindo a descricao ao model
        $categoriaModel->descricao = $novaCategoria->descricao;

        //chamando o método inserir do model
        $categoriaModel = $categoriaModel->inserir();

        //verificando se deu certo
        if ($categoriaModel) {
            //se deu certo, retornar a categoria inserida
            http_response_code(201);
            echo json_encode($categoriaModel, JSON_UNESCAPED_UNICODE);
        } else {
            //se deu errado, mudar status code para 500 e retornar mensagem de erro
            http_response_code(500);
            echo json_encode(["erro" => "Problemas ao inserir categoria"]);
        }
    }

    public function update($id)
    {
        $categoriaEditar = $this->getRequestBody();

        //instanciando o model
        $categoriaModel = $this->model("Categoria");
        $categoriaModel = $categoriaModel->buscarPorId($id);
        //verificando se o id existe
        if (!$categoriaModel) {
            http_response_code(404);
            echo json_encode(["erro" => "Categoria não encontrda"]);
            exit();
        }
        //atribuindo a descricao ao model
        $categoriaModel->descricao = $categoriaEditar->descricao;

        //chamando o método atualizar do model
        if ($categoriaModel->atualizar()) {
            http_response_code(204);
        } else {
            http_response_code(500);
            echo json_encode(["erro" => "Problemas ao aditar categoria"]);
        }
    }

    public function delete($id){
        //instanciando o model
        $categoriaModel = $this->model("Categoria");
        $categoriaModel = $categoriaModel->buscarPorId($id);
        //verificando se o id existe
        if (!$categoriaModel) {
            http_response_code(404);
            echo json_encode(["erro" => "Categoria não encontrda"]);
            exit();
        }

        if($categoriaModel->getProduto()){
            http_response_code(404);
            echo json_encode(["erro" => "Categoria está cadastrada em um produto"]);
            exit();
        }

        //chamando o método atualizar do model
        if ($categoriaModel->deletar()) {
            http_response_code(204);
        } else {
            http_response_code(500);
            echo json_encode(["erro" => "Problemas ao ecluir categoria"]);
        }
    }
}
