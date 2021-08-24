<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Materia Entity
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $conteudo
 * @property string|null $imagem
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $user_id
 * @property int $status_id
 * @property int $tipo_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Tipo $tipo
 */
class Materia extends Entity
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
        'titulo' => true,
        'conteudo' => true,
        'imagem' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'status_id' => true,
        'tipo_id' => true,
        'user' => true,
        'status' => true,
        'tipo' => true,
    ];
}
