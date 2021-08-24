<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Instrumentos Model
 *
 * @property \App\Model\Table\MarcasTable&\Cake\ORM\Association\BelongsTo $Marcas
 * @property \App\Model\Table\ModelosTable&\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 * @property \App\Model\Table\OrigensTable&\Cake\ORM\Association\BelongsTo $Origens
 * @property \App\Model\Table\StatusTable&\Cake\ORM\Association\BelongsTo $Status
 * @property &\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\HistoricosTable&\Cake\ORM\Association\HasMany $Historicos
 * @property \App\Model\Table\ImagensTable&\Cake\ORM\Association\HasMany $Imagens
 *
 * @method \App\Model\Entity\Instrumento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Instrumento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Instrumento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Instrumento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Instrumento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Instrumento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Instrumento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Instrumento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InstrumentosTable extends Table
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

        $this->addBehavior('Search.Search');
        $this->addBehavior('Sitemap.Sitemap');

        $this->setTable('instrumentos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // $this->belongsTo('Marcas', [
        //     'foreignKey' => 'marca_id',
        //     'joinType' => 'INNER',
        // ]);
        // $this->belongsTo('Modelos', [
        //     'foreignKey' => 'modelo_id',
        //     'joinType' => 'INNER',
        // ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Origens', [
            'foreignKey' => 'origem_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Status', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Historicos', [
            'foreignKey' => 'instrumento_id',
        ]);
        $this->hasMany('Imagens', [
            'foreignKey' => 'instrumento_id',
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
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->notEmpty('categoria_id');

        $validator
            ->scalar('caracteristicas')
            ->allowEmptyString('caracteristicas');

        $validator
            ->scalar('numero_serie')
            ->maxLength('numero_serie', 255)
            ->allowEmptyString('numero_serie');

        $validator
            ->add('numero_serie', 'custom', [
                'rule' => function($value, $context){
                    if(!empty($value)){
                        $n_serie = $this->find('all')
                        ->where(['numero_serie' => $value])
                        ->first();

                        if(!empty($n_serie)){
                            return false;
                        }

                        return true;
                    }
                    return true;
                },
                'message' => 'Número de série já cadastrado. Verifique e tente novamente!'
            ]);

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
        //$rules->add($rules->existsIn(['marca_id'], 'Marcas'));
        //$rules->add($rules->existsIn(['modelo_id'], 'Modelos'));
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));
        $rules->add($rules->existsIn(['origem_id'], 'Origens'));
        $rules->add($rules->existsIn(['status_id'], 'Status'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        //$rules->add($rules->isUnique(['numero_serie']));

        return $rules;
    }
}
