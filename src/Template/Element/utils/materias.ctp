<section class="latest-news section--padding">
    <!-- start /.container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Bate Papo
                        <span class="highlighted">ML</span>
                    </h1>
                    <p>Semanalmente trazemos especialistas de áreas especificas da música para trocar aquela idéia conosco e dar aquela dica matadora para nossa carreira.</p>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->

        <!-- start .row -->
        <div class="row">
            <?php foreach ($materias as $materia) { ?>
            <!-- start .col-md-4 -->
            <div class="col-lg-6 col-md-6">
                <div class="news">
                    <div class="news__thumbnail">
                        <img src="/assets/images/batepapoml/<?= $materia->imagem ?>" alt="News Thumbnail">
                    </div>
                    <div class="news__content">
                        <?php
                            echo $this->Html->link('<h4>'.$materia->titulo.'</h4>', [
                                  'controller' => 'Materias',
                                  'action' => 'view',
                                  'id' => $materia->id,
                                  'titulo' => Cake\Utility\Text::slug(strtolower(sanitizeString($materia->titulo)), '-')
                              ],[
                                'class' => 'news-title',
                                'escape' => false
                              ]);
                        ?>
                        <p><small><i>por: <?= $materia->user->nome ?></i></small></p>
                        <p><?= substr($materia->conteudo, 0, 206) . '...'; ?></p>
                        
                    </div>
                    <div class="news__meta">
                        <div class="date">
                            <span class="lnr lnr-clock"></span>
                            <p><?= $materia->created->format('d/m/Y H:i:s') ?></p>
                        </div>

                        <div class="other">
                            <!-- <ul>
                                <li>
                                    <span class="lnr lnr-bubble"></span>
                                    <span>0</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-eye"></span>
                                    <span>0</span>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end /.col-md-4 -->
            <?php } ?>
            <!-- start .col-md-4 -->
            <!-- <div class="col-lg-6 col-md-6">
                <div class="news">
                    <div class="news__thumbnail">
                        <img src="/assets/images/batepapoml/marketing-digital.jpg" alt="News Thumbnail">
                    </div>
                    <div class="news__content">
                        <a href="/marketing-digital-para-musicos" class="news-title">
                            <h4>Marketing Digital para Músicos</h4>
                        </a>
                        <p><small><i>por: Gabriel (OneRpm)</i></small></p>
                        <p>A forma de consumir música vem mudando conforme o tempo passa e os avanços tecnologicos surgem. O século XXI foi aos poucos desmitificando todos o conhecimento obtido no século passado sobre como fazer sucesso na música. O grande investimento das gravadoras sai de cena e dá espaço a vasta imensidão de recursos da internet e suas ferramentas.</p>
                    </div>
                    <div class="news__meta">
                        <div class="date">
                            <span class="lnr lnr-clock"></span>
                            <p>16 Nov 2020</p>
                        </div>

                        <div class="other">
                            <ul>
                                <li>
                                    <span class="lnr lnr-bubble"></span>
                                    <span>0</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-eye"></span>
                                    <span>0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end /.col-md-4 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>