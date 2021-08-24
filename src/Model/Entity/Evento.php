<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenTime|null $data_inicio
 * @property \Cake\I18n\FrozenTime|null $data_final
 * @property string|null $rua
 * @property string|null $num
 * @property string|null $complemento
 * @property string|null $cep
 * @property string|null $bairro
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $obs
 * @property int $status_id
 * @property int $tipo_id
 * @property int $categorias_id
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Tipo $tipo
 * @property \App\Model\Entity\Categoria $categoria
 */
class Evento extends Entity
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
        'data_inicio' => true,
        'data_final' => true,
        'rua' => true,
        'num' => true,
        'complemento' => true,
        'cep' => true,
        'bairro' => true,
        'created' => true,
        'modified' => true,
        'obs' => true,
        'status_id' => true,
        'tipo_id' => true,
        'categorias_id' => true,
        'status' => true,
        'tipo' => true,
        'categoria' => true,
        'user_id' => true,
    ];
}
