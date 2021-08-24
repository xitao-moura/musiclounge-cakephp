<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Status Model
 *
 * @property \App\Model\Table\GruposTable&\Cake\ORM\Association\BelongsTo $Grupos
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\HasMany $Categorias
 * @property \App\Model\Table\InstrumentosTable&\Cake\ORM\Association\HasMany $Instrumentos
 * @property \App\Model\Table\MarcasTable&\Cake\ORM\Association\HasMany $Marcas
 * @property \App\Model\Table\ModelosTable&\Cake\ORM\Association\HasMany $Modelos
 * @property \App\Model\Table\OrigensTable&\Cake\ORM\Association\HasMany $Origens
 * @property \App\Model\Table\TiposTable&\Cake\ORM\Association\HasMany $Tipos
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Status get($primaryKey, $options = [])
 * @method \App\Model\Entity\Status newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Status[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Status|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Status saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Status patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Status[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Status findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatusTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('status');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Grupos', [
            'foreignKey' => 'grupos_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Categorias', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Instrumentos', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Marcas', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Modelos', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Origens', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Tipos', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'status_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['grupos_id'], 'Grupos'));

        return $rules;
    }
}
