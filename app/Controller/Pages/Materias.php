<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;
use \App\Model\Entity\Conteudos as EntityConteudos;

class Materias extends Page{
    public static function getInfoMaterias($materia){
        switch($materia){
            case 'matematica':
                $nomeMateria = 'MATEMÁTICA';
                $fotoMateria = 'matematica';
                break;
            case 'portugues':
                $nomeMateria = 'PORTUGUÊS';
                $fotoMateria = 'portugues';
                break;
            case 'historia':
                $nomeMateria = 'HISTÓRIA';
                $fotoMateria = 'historia';
                break;
            case 'geografia':
                $nomeMateria = 'GEOGRAFIA';
                $fotoMateria = 'geografia';
                break;
            case 'fisica':
                $nomeMateria = 'FÍSICA';
                $fotoMateria = 'fisica';
                break;
            case 'filosofia':
                $nomeMateria = 'FILOSOFIA';
                $fotoMateria = 'filosofia';
                break;
            case 'sociologia':
                $nomeMateria = 'SOCIOLOGIA';
                $fotoMateria = 'sociologia';
                break;
            case 'biologia':
                $nomeMateria = 'BIOLOGIA';
                $fotoMateria = 'biologia';
                break;
            case 'quimica':
                $nomeMateria = 'QUÍMICA';
                $fotoMateria = 'quimica';
                break;
            default:
                $nomeMateria = 'Matéria não encontrada.';
                $fotoMateria = 'padrao';
                break;
        }

        return [$nomeMateria, $fotoMateria];
    }

    public static function getPiece($name){
        $itens = '';

        $itens .= View::render('pages/'.$name, [
        ]);

        return $itens;
    }

    public static function getConteudos($materia, $conteudo){
        //Organização
        $obOrganization = new Organization;

        $itens = '';

        $results = EntityConteudos::getConteudos('idMateria = "'.$materia.'"');

        $infoMaterias = self::getInfoMaterias($materia);

        while($search = $results->fetchObject(EntityConteudos::class)){
            if($conteudo == $search->idNome){
                if($search->videos == ""){
                    $videoEmbed = '';
                }else{
                    $videoEmbed = View::render('pages/conteudos/video',[
                        'video' => $search->videos,
                        'titulo' => $search->titulo
                    ]);;
                }

                $content = View::render('pages/conteudos/conteudoPadrao',[
                    'titulo' => $search->titulo,
                    'texto' => nl2br($search->texto),
                    'fotoMateria' => $infoMaterias[1],
                    'video' => $videoEmbed
                ]);
            }
        }
       
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage(
            //NOME DE ARQUIVOS CSS,JS...
            'conteudos',
            //TITLE DA PÁGINA
            $obOrganization->name,
            //DESCRIÇÃO DA PÁGINA
            $obOrganization->description,
            //CONTEUDO DA PÁGINA
            $content
        );
    }

    public static function getConteudosBox($materia){
        $itens = '';

        /* $results = EntityConteudos::getConteudosByMateria($materia); */
        $results = EntityConteudos::getConteudos('idMateria = "'.$materia.'"');

        while($conteudo = $results->fetchObject(EntityConteudos::class)){
            $itens .= View::render('pages/conteudos/padrao', [
                'titulo' => $conteudo->titulo,
                'materia' => $conteudo->idMateria,
                'conteudo' => $conteudo->idNome
            ]);
        }

        return $itens;
    }

    /**
     * Método responsável por retornar o conteúdo (view) da nossa Home
     * @return string
     */
    public static function getMaterias($materia){
        //Organização
        $obOrganization = new Organization;

        $infoMaterias = self::getInfoMaterias($materia);

        //VIEW DA HOME
        $content = View::render('pages/materias',[
            'nomeMateria' => $infoMaterias[0],
            'fotoMateria' => $infoMaterias[1],
            'conteudos' => self::getConteudosBox($infoMaterias[1])
        ]);

        //RETORNA A VIEW DA PÁGINA
        return parent::getPage(
            //NOME DE ARQUIVOS CSS,JS...
            'materias',
            //TITLE DA PÁGINA
            $obOrganization->name,
            //DESCRIÇÃO DA PÁGINA
            $obOrganization->description,
            //CONTEUDO DA PÁGINA
            $content
        );
    }

    public static function pesquisar($request){
        $request->getRouter()->redirect('/pesquisar/'.$_GET['pesquisa']);
    
    }





    public static function pesquisarConteudo($pesquisa){
        //Organização
        $obOrganization = new Organization;

        $pagina = '';

        $results = EntityConteudos::getConteudos('titulo LIKE "%'.$pesquisa.'%"' );

         while($conteudo = $results->fetchObject(EntityConteudos::class)){
            $pagina .= View::render('pages/conteudos/padrao', [
                'titulo' => $conteudo->titulo,
                'materia' => $conteudo->idMateria,
                'conteudo' => $conteudo->idNome
            ]);
        }

        //VIEW DA HOME
        $content = View::render('pages/materias',[
            'nomeMateria' => 'Pesquisar "'.$pesquisa.'"',
            'fotoMateria' => 'pesquisa',
            'conteudos' => $pagina
        ]);

        //RETORNA A VIEW DA PÁGINA
        return parent::getPage(
            //NOME DE ARQUIVOS CSS,JS...
            'materias',
            //TITLE DA PÁGINA
            $obOrganization->name,
            //DESCRIÇÃO DA PÁGINA
            $obOrganization->description,
            //CONTEUDO DA PÁGINA
            $content
        );
    }

}