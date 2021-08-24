<?php         
    if ( !empty( $instrumento->imagens[0]->imagem ) ) {
        $capaTrack = $instrumento->imagens[0]->imagem;
    } else {
        $capaTrack = 'b9.jpg';
    }
?>
<meta property="og:image" content="<?php echo 'https://musiclounge.com.br/assets/images/instrumentos/' . $capaTrack ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="828">
<meta property="og:image:height" content="323">
<meta property="og:type" content="article">
<meta property="article:author" content="MusicLounge - Instrumento | <?php echo strtoupper($instrumento->descricao) ?>">
<meta property="article:tag" content="">
<meta property="article:published_time" content="<?php echo $instrumento->created->format('d/m/Y H:i:s'); ?>">

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@musicloungebr" />
<meta name="twitter:creator" content="@musicloungebr" />
<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']; ?>" />
<?php if($instrumento->status_id == 4){ ?>
<meta property="og:title" content="MUSICLOUNGE INSTRUMENTO ROUBADO - <?php echo strtoupper($instrumento->descricao) ?>" />
<?php }else{ ?>
<meta property="og:title" content="MUSICLOUNGE - <?php echo strtoupper($instrumento->descricao) ?>" />
<?php } ?>
<meta property="og:title" content="MUSICLOUNGE - <?php echo strtoupper($instrumento->descricao) ?>" />
<meta property="og:description" content="<?php echo $instrumento->caracteristicas; ?>" />