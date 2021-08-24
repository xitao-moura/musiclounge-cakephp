<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Catalogo Entity
 *
 * @property int $id
 * @property string|null $imagem
 * @property string|null $telefone
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $user_id
 * @property int $status_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Status $status
 */
class Catalogo extends Entity
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
        'imagem' => true,
        'telefone' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'status_id' => true,
        'user' => true,
        'status' => true,
    ];
}
