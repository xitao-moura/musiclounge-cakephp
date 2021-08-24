<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="breadcrumb">
                  <ul>
                      <li>
                          <a href="/">Home</a>
                      </li>
                      <li class="active">
                          <a href="#">Bate Papo ML</a>
                      </li>
                  </ul>
              </div>
              <h1 class="page-title">Bate Papo ML</h1>
          </div>
          <!-- end /.col-md-12 -->
      </div>
      <!-- end /.row -->
  </div>
  <!-- end /.container -->
</section>

<section class="blog_area section--padding2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php foreach ($materias as $materia): ?>
          <div class="single_blog blog--default">
              <figure>
                  <img src="/assets/images/batepapoml/<?= $materia->imagem ?>" alt="Blog image">

                  <figcaption>
                      <div class="blog__content">
                        <!-- <a href="/materias/view/<?= $materia->id ?>" class="blog__title">
                          <h4><?= $materia->titulo ?></h4>
                        </a> -->
                        <?php
                            echo $this->Html->link('<h4>'.$materia->titulo.'</h4>', [
                                  'controller' => 'Materias',
                                  'action' => 'view',
                                  'id' => $materia->id,
                                  'titulo' => Cake\Utility\Text::slug(strtolower(sanitizeString($materia->titulo)), '-')
                              ],[
                                'class' => 'blog__title',
                                'escape' => false
                              ]);
                        ?>

                          <div class="blog__meta">
                              <div class="author">
                                  <span class="lnr lnr-user"></span>
                                  <p>por
                                      <a href="#"><?= $materia->user->nome ?></a>
                                  </p>
                              </div>
                              <div class="date_time">
                                  <span class="lnr lnr-clock"></span>
                                  <p><?= $materia->created->format('d/m/Y H:i:s') ?></p>
                              </div>
                              <div class="comment_view">
                                  <!-- <p class="comment">
                                      <span class="lnr lnr-bubble"></span>0</p>
                                  <p class="view">
                                      <span class="lnr lnr-eye"></span>0</p> -->
                              </div>
                          </div>
                      </div>

                      <div class="btn_text">
                          <?= substr($materia->conteudo, 0, 367) . '...'; ?>
                          <br>
                          <?php
                            echo $this->Html->link('Ler mais', [
                                  'controller' => 'Materias',
                                  'action' => 'view',
                                  'id' => $materia->id,
                                  'titulo' => Cake\Utility\Text::slug(strtolower(sanitizeString($materia->titulo)), '-')
                              ],[
                                'class' => 'btn btn--md btn--round',
                                'escape' => false
                              ]);
                        ?>
                          <!-- <a href="/materias/view/<?= $materia->id ?>" class="btn btn--md btn--round">Ler mais</a> -->
                      </div>
                  </figcaption>
              </figure>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="col-lg-4">
        <aside class="sidebar sidebar--blog">
          <div class="sidebar-card card--search card--blog_sidebar">
              <div class="card-title">
                  <h4>Perdeu um dos Bate Papos ML?</h4>
                  <p>faça uma pesquisa abaixo por ele =)</p>
              </div>
              <!-- end /.card-title -->

              <div class="card_content">
                  <form action="/bate-papo-ml" method="get">
                      <div class="searc-wrap">
                          <input type="text" placeholder="Buscar Bate Papo ML..." name="search">
                          <button type="submit" class="search-wrap__btn">
                              <span class="lnr lnr-magnifier"></span>
                          </button>
                      </div>
                  </form>
              </div>
              <!-- end /.card_content -->
          </div>
          <!-- <div class="banner">
              <img src="/assets/images/banner.jpg" alt="Banner">
              <div class="banner_content">
                  <h1>Banner</h1>
                  <p>360x270</p>
              </div>
          </div> -->
          <!-- end /.sidebar-card -->
        </aside>
      </div>
    </div>
  </div>
</section>
<?= $this->element('utils/footer'); ?>