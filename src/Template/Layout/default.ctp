<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

//$cakeDescription = 'Music Lounge - Seu espaço colaborativo';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TPTLJPQ');</script>
    <!-- End Google Tag Manager -->
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if($this->request->getParam('controller') == 'Instrumentos' && $this->request->getParam('action') == 'view'){
            echo $this->element('utils/opengraph');
        }

        if($this->request->getParam('controller') == 'Materias' && $this->request->getParam('action') == 'view'){
            echo $this->element('utils/opengraph-materias');
        }

        if($this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'main'){
            echo $this->element('utils/opengraph-main');
        }
    ?>
    <meta name="google-site-verification" content="CypvBhfrV1_SqqKzxhvkIn-BAT5W3Vou6qjQ-GoNFkM" />
    <title>
        <?php //$cakeDescription ?>
        <?= $title ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php //$this->Html->css('base.css') ?>
    <?php //$this->Html->css('style.css') ?>

    <?= $this->Html->css([
        '/assets/css/animate.css',
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
        '/assets/css/font-awesome.min.css',
        '/assets/css/fontello.css',
        '/assets/css/jquery-ui.css',
        '/assets/css/lnr-icon.css',
        '/assets/css/owl.carousel.css',
        '/assets/css/slick.css',
        '/assets/css/trumbowyg.min.css',
        '/assets/css/bootstrap/bootstrap.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css',
        '/assets/cropperjs/dist/cropper.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css',
        '//cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css',
        '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css',
        '/assets/style.css',
        '/assets/main.css?v='.date('ymdhis')
    ]) ?>

    <?php echo $this->Html->script([
        '/assets/js/vendor/jquery/jquery-1.12.3.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js'
    ]); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script>
        var base_url = "<?= $this->request->getAttribute('webroot'); ?>";
    </script>
</head>
<body class="preload home1 mutlti-vendor <?= strtolower('c-' . $this->request->getParam('controller') . '_a-' . strtolower($this->request->getParam('action')))?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPTLJPQ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?= $this->Flash->render() ?>
    <div class="container-fluid">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->Html->script([
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js',
        '/assets/js/vendor/jquery/popper.min.js',
        '/assets/js/vendor/jquery/uikit.min.js',
        '/assets/js/vendor/bootstrap.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/locales/pt-BR.js',
        '//cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js',
        '/assets/js/vendor/grid.min.js',
        '/assets/js/vendor/jquery-ui.min.js',
        '/assets/js/vendor/jquery.barrating.min.js',
        '/assets/js/vendor/jquery.countdown.min.js',
        '/assets/js/vendor/jquery.counterup.min.js',
        '/assets/js/vendor/jquery.easing1.3.js',
        '/assets/js/vendor/owl.carousel.min.js',
        '/assets/js/vendor/slick.min.js',
        '/assets/js/vendor/tether.min.js',
        '/assets/js/vendor/trumbowyg.min.js',
        '/assets/js/vendor/waypoints.min.js',
        '/assets/cropperjs/dist/cropper.min.js',
        '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',
        '/assets/js/crop.js?v='.date('Ymdhis'),
        '/assets/js/main.js'
    ]) ?>
    <?= $this->fetch('script_footer') ?>
</body>
</html>
