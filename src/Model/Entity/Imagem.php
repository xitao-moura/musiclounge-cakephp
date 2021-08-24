<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Imagem Entity
 *
 * @property int $id
 * @property string|null $imagem
 * @property string|null $descricao
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $instrumento_id
 * @property int $status_id
 *
 * @property \App\Model\Entity\Instrumento $instrumento
 * @property \App\Model\Entity\Status $status
 */
class Imagem extends Entity
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
        'descricao' => true,
        'created' => true,
        'modified' => true,
        'instrumento_id' => true,
        'status_id' => true,
        'instrumento' => true,
        'status' => true,
    ];
}
