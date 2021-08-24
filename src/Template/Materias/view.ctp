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
                        <li>
                            <a href="/bate-papo-ml">Bate Papo M</a>
                        </li>
                        <li class="active">
                            <a href="#"><?= $materia->titulo ?></a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title"><?= $materia->titulo ?></h1>
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
                <div class="single_blog blog--default">
                    <article>
                        <figure>
                            <img src="/assets/images/batepapoml/<?= $materia->imagem ?>" alt="Blog image">
                        </figure>
                        <div class="blog__content">
                            <a href="#" class="blog__title">
                                <h4><?= $materia->titulo ?></h4>
                            </a>

                            <div class="blog__meta">
                                <div class="author">
                                    <span class="lnr lnr-user"></span>
                                    <p>por
                                        <a href="#"><?= $materia->user->nome ?></a>
                                    </p>
                                </div>
                                <div class="date_time">
                                    <span class="lnr lnr-clock"></span>
                                    <p><?= $materia->created->format('d/m/Y H:i:s'); ?></p>
                                </div>
                                <div class="comment_view">
                                    <!-- <p class="comment">
                                        <span class="lnr lnr-bubble"></span>0</p>
                                    <p class="view">
                                        <span class="lnr lnr-eye"></span>0</p> -->
                                </div>
                            </div>
                        </div>

                        <div class="single_blog_content">
                            <?= $materia->conteudo ?>
                        </div>
                    </article>
                </div>

                <div class="author_info">
                    <div class="author__img">
                        <img src="/assets/images/users/<?= $materia->user->avatar ?>" alt="Auth Image">
                    </div>

                    <div class="author__info">
                        <h4>Sobre <?= $materia->user->nome ?></h4>
                        <p><?= $materia->user->descricao ?></p>
                        <ul>
                            <li>
                                <a href="<?= $materia->user->facebook ?>" target="_blank">
                                    <span class="fa fa-facebook"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $materia->user->twitter ?>" target="_blank">
                                    <span class="fa fa-twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $materia->user->instagram ?>" target="_blank">
                                    <span class="fa fa-instagram"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end /.author_info -->
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
                    <!-- end /.banner -->
                </aside>
            </div>
        </div>
    </div>
</section>
<?= $this->element('utils/footer'); ?>
