<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Origem Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $status_id
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Instrumento[] $instrumentos
 */
class Origem extends Entity
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
        'status' => true,
        'instrumentos' => true,
    ];
}
