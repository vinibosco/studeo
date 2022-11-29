<?php

namespace App\Model\Entity;

class Organization{

    /**
     * ID da organização
     * @var integer
     */
    public $id = 1;
    
    /**
     * Nome da organização
     * @var string
     */
    public $name = 'Studeo';

    /**
     * Site da organização
     * @var string
     */
    public $site = 'https://localhost/tcc/';

    /**
     * Descrição da organização
     * @var string
     */
    public $description = 'O Studeo não te ajuda , ele te salva! ';

}