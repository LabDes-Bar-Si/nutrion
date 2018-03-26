<?php

/*
    Passos:
        Criar método cadastrar (action)
            Instanciar classe nutricionistaModel
            Instanciar class nutricionistaVo
            Setar os valores no objeto do nutricionistaVo através do post ($_POST['nome'])
            Verificar se o método insert da model foi inserido (if($model->insert($nutricionista)){})
            Retornar uma $_SESSION['msg'] = "Mensagem a passar"

        Criar método cadastro (rota para view)

        Criar método edita (rota para view)
            Instanciar classe nutricionistaModel
            Criar variável $nutricionista que recebe $model->getById($_GET["id"]);
            Passar os dados do $nutricionista para cada section referente
                Ex: $_SESSION["id"] = $nutricionista->getId();
        
        Criar método atualizar (action)
            Instanciar classe nutricionistaModel
            Instanciar class nutricionistaVo
            Setar os valores no objeto do nutricionistaVo através do post ($_POST['nome']), incluindo $id
            Verificar se o método update da model foi inserido (if($model->update($nutricionista)){})
            Retornar uma $_SESSION['msg'] = "Mensagem a passar"

        Fazer includes das Models(VO,DAO,Model) e DB
*/

include "app/models/nutricionista/nutricionistaDAO.php";
include "app/models/nutricionista/nutricionistaVo.php";
include "app/models/nutricionista/nutricionistaModel.php";
include "app/models/DB.php";

class nutricionistaController{

    public function cadastrar(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionista = new nutricionistaVo();
        
        $nutricionista->setNome($_POST["nutricionista"]); ///verificar campos!!!
        $nutricionista->setEmail($_POST["email"]);
        $nutricionista->setSenha($_POST["senha"]);

        if($nutricionistaModel->insertModel($nutricionista)){
            $_SESSION["msg"] = "Usuário cadastrado com sucesso!";
            header("Location: /nutrion/system/nutricionista/dashboard");
        }
        else{
            $_SESSION["msg"] = "Erro ao cadastrar usuário!";
            header("Location: /nutrion/system/nutricionista/login");
        }
    }

    public function login(){
        // Rota para view de login e cadastro
        include "app/views/nutricionista/login.php";
    }

    public function dashboard(){
        // Rota para view de login e cadastro
        include "app/views/nutricionista/dashboard.php";
    }

    public function logar(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionista = new nutricionistaVO();  
        
        $nutricionista->setEmail($_POST["email"]);
        $nutricionista->setSenha($_POST["senha"]);
        
        if ($nutricionistaModel->logar($nutricionista) == 1) {
            if (!isset($_SESSION)){
                session_start();
                $_SESSION["msg"] = "Logado com sucesso";
                $_SESSION["email"] = $nutricionista->getEmail();

                header("Location: /nutrion/system/nutricionista/dashboard"); 
            }       
        }
        else if ($nutricionistaModel->logar($nutricionista) == 101) {
            if (!isset($_SESSION)){
                session_start();
                $_SESSION["error"] = "Email e/ou senha inválidos.";

                header("Location: /nutrion/system/nutricionista/login");
            }
        }
    }

    public function edita(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionista = $nutricionistaModel->getByIdModel($_GET["id"]);

        $_SESSION["id"] = $nutricionista->getById();
        $_SESSION["nome"] = $nutricionista->getNome();
        $_SESSION["email"] = $nutricionista->getEmail();
        $_SESSION["senha"] = $nutricionista->getSenha();

        /* Rota para a view de edição */
    }

    public function atualizar(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionista = new nutricionistaVo();
        
        $nutricionista->setId($_POST["id"]);
        $nutricionista->setName($_POST["nome"]);
        $nutricionista->setEmail($_POST["email"]);
        $nutricionista->setSenha($_POST["senha"]);

        if($nutricionistaModel->updateModel($nutricionista)){
            $_SESSION["msg"] = "Usuário atualizado com sucesso!";
        }
        else{
            $_SESSION["msg"] = "Erro ao atualizar usuário!";
        }
    }
}

?>