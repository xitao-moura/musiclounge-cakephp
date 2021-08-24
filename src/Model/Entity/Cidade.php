<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cidade Entity
 *
 * @property int $id
 * @property string|null $uf
 * @property string|null $nome
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $estado_id
 *
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\User[] $users
 */
class Cidade extends Entity
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
        'uf' => true,
        'nome' => true,
        'created' => true,
        'modified' => true,
        'estado_id' => true,
        'estado' => true,
        'users' => true,
    ];
}
