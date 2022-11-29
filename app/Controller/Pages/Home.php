<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page{
    public static function getPiece($name){
        $itens = '';

        $itens .= View::render('pages/home/'.$name, [
        ]);

        return $itens;
    }

    /**
     * Método responsável por retornar o conteúdo (view) da nossa Home
     * @return string
     */
    public static function getHome(){
        //Organização
        $obOrganization = new Organization;

        //VIEW DA HOME
        $content = View::render('pages/home',[
        ]);

        //RETORNA A VIEW DA PÁGINA
        return parent::getPage(
            //NOME DE ARQUIVOS CSS,JS...
            'home',
            //TITLE DA PÁGINA
            $obOrganization->name,
            //DESCRIÇÃO DA PÁGINA
            $obOrganization->description,
            //CONTEUDO DA PÁGINA
            $content
        );
    }
}