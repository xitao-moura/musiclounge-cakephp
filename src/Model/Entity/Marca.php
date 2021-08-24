<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Marca Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $modelo_id
 * @property int $status_id
 *
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Instrumento[] $instrumentos
 * @property \App\Model\Entity\User[] $users
 */
class Marca extends Entity
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
        //'modelo_id' => true,
        'status_id' => true,
        'modelo' => true,
        'status' => true,
        'instrumentos' => true,
        'users' => true,
    ];
}
