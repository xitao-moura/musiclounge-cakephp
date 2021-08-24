<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Status Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $grupos_id
 *
 * @property \App\Model\Entity\Grupo $grupo
 * @property \App\Model\Entity\Categoria[] $categorias
 * @property \App\Model\Entity\Instrumento[] $instrumentos
 * @property \App\Model\Entity\Marca[] $marcas
 * @property \App\Model\Entity\Modelo[] $modelos
 * @property \App\Model\Entity\Origem[] $origens
 * @property \App\Model\Entity\Tipo[] $tipos
 * @property \App\Model\Entity\User[] $users
 */
class Status extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'created' => true,
        'modified' => true,
        'grupos_id' => true,
        'grupo' => true,
        'categorias' => true,
        'instrumentos' => true,
        'marcas' => true,
        'modelos' => true,
        'origens' => true,
        'tipos' => true,
        'users' => true,
    ];
}
