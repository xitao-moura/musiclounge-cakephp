<div class="modal fade rating_modal item_remove_modal" id="modalUploadImagensInstrumentos" tabindex="-1" role="dialog" aria-labelledby="modalUploadImagensInstrumentos">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">inserir imagens do instrumento?</h3>
                <!-- <p>You will not be able to recover this file!</p> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- end /.modal-header -->

            <div class="modal-body">
              <div class="file-loading">
                <?= $this->Form->create(null); ?>
                  <!-- <input id="input-700" name="kartik-input-700[]" type="file" multiple> -->
                  <?= $this->Form->control('kartik-input-700[]', ['id' => 'input-700', 'type' => 'file', 'multiple', 'label' => false]); ?>
                  <?= $this->Form->end(); ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary btn--round" data-dismiss="modal">Fechar</button>
            </div>
            <!-- end /.modal-body -->
        </div>
    </div>
</div>
 
<?php $this->append('script_footer'); ?>
<script>
$(document).ready(function() {
    // $("#input-b9").fileinput({
    //     showPreview: false,
    //     showUpload: false,
    //     elErrorContainer: '#kartik-file-errors',
    //     allowedFileExtensions: ["jpg", "png", "gif"],
    //     uploadUrl: base_url + '/Instrumentos/upload/<?= $instrumento->id?>'
    // });

    $("#input-700").fileinput({
        uploadUrl: 'https://musiclounge.com.br/Instrumentos/upload/<?= $instrumento->id?>',
        allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
        maxFileCount: 10,
        uploadExtraData: {
            'uploadToken': $("input[name=_csrfToken]").val(), // for access control / security
            '_csrfToken':  $("input[name=_csrfToken]").val()
        },
        initialPreviewAsData: true // identify if you are sending preview data only and not the markup
    });

    $('#input-700').on('fileuploaded', function(event, previewId, index, fileId) {
        console.log(index);
        console.log('File uploaded', previewId, index, fileId);
        $('.owl-carousel-instrumentos.owl-theme').append('<img src="/assets/images/instrumentos/'+index+'" alt="">');

        $('.owl-carousel-instrumentos').trigger('refresh.owl.carousel');
    });
});
</script>
<?php $this->end(); ?>