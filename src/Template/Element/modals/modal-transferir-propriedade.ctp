<div class="modal fade rating_modal item_remove_modal" id="modal-transferir-propriedade" tabindex="-1" role="dialog" aria-labelledby="modal-transferir-propriedade">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Transferir propriedade</h3>
                <p>Esta ação é irreversível, tem certeza que deseja fazer?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end /.modal-header -->
            <?= $this->Form->create(null, ['url' => ['controller' => 'Instrumentos', 'action' => 'setTransferencia']]); ?>
            <div class="modal-body">
                <div class="modules__content">
                    <div class="form-group">
                        <?= $this->Form->control('instrumento_id', ['type' => 'hidden', 'value' => $instrumento->id]); ?>
                    </div>
                    <?php //$this->Form->control('user_id', ['options' => $users, 'class' => 'form-control selectpicker', 'label' => false, 'empty' => 'Selecione o novo proprietário do instrumento', 'data-live-search' => true]); ?>
                    <div class="form-group">
                        <?php echo $this->Form->control('nome', ['class' =>'form-control', 'placeholder' => 'Nome do novo proprietário']) ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('email', ['class' =>'form-control', 'placeholder' => 'E-mail do novo proprietário']) ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary btn--round" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-sm btn-primary btn--round" title="Your custom upload logic">Salvar</button>
            </div>
            <?= $this->Form->end(); ?>
            <!-- end /.modal-body -->
        </div>
    </div>
</div>
