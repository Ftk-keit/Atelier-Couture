<?php 
require_once("../views/navigation/navigation.html.php");
if (isset($_REQUEST)){
    if ($_REQUEST['action']){
        $requette = $_REQUEST['action'];
        switch ($requette) {
            case 'liste-article':
                listeArticle();
                break;
            case 'form-article':
                formulaire();
                break;
            case 'save-article':
                unset($_POST['action']);
                saveData($_POST);
                break;
            case 'edit-supprimer':
                $id = $_POST['id'];
                supprimerArticle($id);
                break;
            case 'edit-modifier':
                $id = $_POST['id'];
                modifierArticle($id);
                break;
            case 'valid-modif':
                $id = $_POST['id'];
                unset($_POST['id']);
                unset($_POST['action']);
                validModification($id, $_POST);
                break;
                
            default:
                # code...
                break;
        }
    } else {
        listeArticle();
    }
}
    function formulaire():void{
        require_once("../model/article.model.php");
        $structData = dataFormulaire();
        require_once("../views/articles/form.html.php");
    }
    function saveData(array $data):void{
        require_once("../model/article.model.php");
        if (saveArticle($data)){

            header("Location: " . WEBROOT . "?action=liste-article");
            exit;
        } else {
            var_dump($_POST);
            var_dump("ERROR");
        }
    }
    function listeArticle():void{
        require_once("../model/article.model.php");
        $articles = findAll();
        require_once("../views/articles/liste.html.php");
    }

    function supprimerArticle(int $id):void{
        require_once("../model/article.model.php");
        suppression($id);
        header("Location: " . WEBROOT . "?action=liste-article");
    }

    function modifierArticle(int $id) {
        require_once("../model/article.model.php");
        $article = getById($id);
        $structData = dataFormulaire();
        require_once("../views/articles/modif.html.php");
      
    }

    function validModification($id, $data):void{
        require_once("../model/article.model.php");
       // var_dump($data);
        modification($id, $data);
        header("Location: " . WEBROOT . "?action=liste-article");
    }
?>