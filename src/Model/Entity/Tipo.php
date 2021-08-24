<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tipo Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $status_id
 * @property int $grupo_id
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Grupo $grupo
 * @property \App\Model\Entity\User[] $users
 */
class Tipo extends Entity
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
        'status_id' => true,
        'grupo_id' => true,
        'status' => true,
        'grupo' => true,
        'users' => true,
    ];
}
