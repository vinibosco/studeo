<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Conteudos{

    /**
     * ID
     * @var integer
     */
    public $id;

    /**
     * Nome de ID da matéria
     * @var string
     */
    public $idMateria;

    /**
     * Nome de ID do conteudo
     * @var string
     */
    public $idNome;

    /**
     * Titulo da matéria
     * @var string
     */
    public $titulo;

    /**
     * Texto de conteúdo
     * @var string
     */
    public $texto;

    /**
     * Vídeos da matéria
     * @var integer
     */
    public $videos;

    /**
     * Fotos da matéria
     * @var string
     */
    public $fotos;

    /**
     * Método responsável por cadastrar a instancia atual no banco de dados
     * @return boolean
     */
    /* public function cadastrar(){
        //INSERE A INSTANCIA NO BANCO
        $this->id = (new Database('videos'))->insert([
            'title' => $this->title,
            'description' => $this->description,
            'channel' => $this->channel,
            'channelUser' => $this->channelUser,
            'channelId' => $this->channelId,
            'thumbnail' => $this->thumbnail,
            'video' => $this->video,
            'date' => $this->date
        ]);

        //SUCESSO
        return true;
    } */

    /**
     * Método responsável por atualizar os dados do banco
     * @return boolean
     */
    /* public function atualizar(){
        return (new Database('videos'))->update('id = '.$this->id,[
            'title' => $this->title,
            'description' => $this->description,
            'channel' => $this->channel,
            'channelUser' => $this->channelUser,
            'channelId' => $this->channelId,
            'thumbnail' => $this->thumbnail,
            'video' => $this->video,
            'date' => $this->date
        ]);
    } */

    /**
     * Método responsável por excluir um usuário do banco
     * @return boolean
     */
    /* public function excluir(){
        return (new Database('videos'))->delete('id = '.$this->id);
    } */

    /**
     * Método responsável por retornar uma instancia com base em seu id
     * @param integer $id
     * @return User
     */
    public static function getConteudosByMateria($materia){
        return self::getConteudos('idMateria = "'.$materia.'"')->fetchObject(self::class);
    }


    /**
     * Método responsável por retornar uma instancia com base em seu id
     * @param integer $id
     * @return User
     */
    public static function getConteudosByTitulo($materia){
        return self::getConteudos('titulo = "'.$materia.'"')->fetchObject(self::class);
    }

    /**
     * Método responsável por retornar Usuarios
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public static function getConteudos($where = null, $order = null, $limit = null, $like = null, $fields = '*'){
        return (new Database('conteudos'))->select($where,$order,$limit,$like,$fields);
    }
}