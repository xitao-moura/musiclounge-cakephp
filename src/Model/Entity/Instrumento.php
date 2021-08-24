<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Instrumento Entity
 *
 * @property int $id
 * @property string|null $descricao
 * @property string|null $caracteristicas
 * @property string|null $numero_serie
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $marca_id
 * @property int $modelo_id
 * @property int $categoria_id
 * @property int $origem_id
 * @property int $status_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Marca $marca
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Origem $origem
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Historico[] $historicos
 * @property \App\Model\Entity\Imagem[] $imagens
 */
class Instrumento extends Entity
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
        'descricao' => true,
        'caracteristicas' => true,
        'numero_serie' => true,
        'created' => true,
        'modified' => true,
        //'marca_id' => true,
        'categoria_id' => true,
        'origem_id' => true,
        'status_id' => true,
        'user_id' => true,
        'marca' => true,
        'modelo' => true,
        'categoria' => true,
        'origem' => true,
        'status' => true,
        'historicos' => true,
        'imagens' => true,
        'detalhes_roubo' => true
    ];
}
