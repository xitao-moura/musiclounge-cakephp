<div class="modal fade rating_modal item_remove_modal" id="modal-foto-avatar" tabindex="-1" role="dialog" aria-labelledby="modal-foto-avatar">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Aterar foto de perfil?</h3>
                <!-- <p>You will not be able to recover this file!</p> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end /.modal-header -->

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7 offset-md-2 img-container img-avatar">
                        <?php
                            if (!empty($userLogado->avatar)){
                                $avatar = '/assets/images/users/' . $userLogado->avatar;
                            } else {
                                 $avatar = '/assets/images/usr_avatar.png';
                            }
                            echo $this->Html->image($avatar, ['class' => 'img-rounded center-block', 'style' => 'position:relative;', 'id' => 'image']);
                        ?>
                    </div>
                    <div class="col-md-7 offset-md-2">
                        <a class="btn btn-sm btn-warning btn--round" data-dismiss="modal">FECHAR</a>
                        <label class="btn btn-sm btn-info btn--round" for="inputImage" title="Upload image file">
                            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                                <span class="fa fa-upload"></span>
                            </span>
                        </label>
                        <a id="btn-salvar-foto-avatar" class="btn btn-sm btn-success btn--round">salvar</a>
                    </div>
                </div>
            </div>
            <!-- end /.modal-body -->
        </div>
    </div>
</div>