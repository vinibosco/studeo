<?php

use \App\Http\Response;
use \App\Controller\Pages;

//ROTA HOME
$obRouter->get('/',[
    function(){
        return new Response(200,Pages\Home::getHome());
    }
]);


//ROTA MATÉRIAS
$obRouter->get('/materias/{materia}',[
    function($materia){
        return new Response(200,Pages\Materias::getMaterias($materia));
    }
]);

//ROTA MATÉRIAS -> CONTEUDOS
$obRouter->get('/conteudo/{materia}/{conteudo}',[
    function($materia,$conteudo){
        return new Response(200,Pages\Materias::getConteudos($materia, $conteudo));
    }
]);

//ROTA MATÉRIAS -> CONTEUDOS
$obRouter->get('/pesquisar/{pesquisa}',[
    function($pesquisa){
        return new Response(200,Pages\Materias::pesquisarConteudo($pesquisa));
    }
]);

//ROTA MATÉRIAS -> CONTEUDOS
$obRouter->get('/pesquisaheader',[
    function($request){
        return new Response(200,Pages\Materias::pesquisar($request));
    }
]);






//ROTA DEPOIMENTOS
/* $obRouter->get('/depoimentos',[
    'middlewares' => [
        'cache'
    ],
    function($request){
        return new Response(200,Pages\Testimony::getTestimonies($request));
    }
]); */

//ROTA DEPOIMENTOS (INSERT)
/* $obRouter->post('/depoimentos',[
    function($request){
        return new Response(200,Pages\Testimony::insertTestimony($request));
    }
]); */








//ROTA DINÂMICA
/* $obRouter->get('/pagina/{idPagina}/{acao}',[
    function($idPagina,$acao){
        return new Response(200,'Página '.$idPagina.' = '.$acao);
    }
]); */