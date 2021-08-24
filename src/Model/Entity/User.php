<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $hash
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $avatar
 * @property int $tipo_id
 * @property int $status_id
 * @property int $marca_id
 *
 * @property \App\Model\Entity\Tipo $tipo
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Marca $marca
 * @property \App\Model\Entity\Historico[] $historicos
 * @property \App\Model\Entity\Log[] $logs
 */
class User extends Entity
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
        'username' => true,
        'email' => true,
        'password' => true,
        'hash' => true,
        'created' => true,
        'modified' => true,
        'avatar' => true,
        'tipo_id' => true,
        'status_id' => true,
        'marca_id' => true,
        'tipo' => true,
        'status' => true,
        'marca' => true,
        'historicos' => true,
        'logs' => true,
        'cidade' => true,
        'estado' => true,
        'cidade_id' => true,
        'estado_id' => true,
        'descricao' => true,
        'facebook' => true,
        'twitter' => true,
        'instagram' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
