<meta property="og:image" content="<?php echo 'https://musiclounge.com.br/assets/images/batepapoml/' . $materia->imagem ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="828">
<meta property="og:image:height" content="323">
<meta property="og:type" content="article">
<meta property="article:author" content="MusicLounge - Bate Papo ML | <?php echo strtoupper($materia->user->nome) ?>">
<meta property="article:tag" content="">
<meta property="article:published_time" content="<?php echo $materia->created->format('d/m/Y H:i:s'); ?>">

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@musicloungebr" />
<meta name="twitter:creator" content="@musicloungebr" />
<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']; ?>" />
<meta property="og:title" content="MUSICLOUNGE - <?php echo strtoupper($materia->titulo) ?>" />
<!-- <meta property="og:description" content="<?php echo $materia->conteudo; ?>" /> -->