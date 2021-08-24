<footer class="footer-area">
    <div class="footer-big section--padding">
        <!-- start .container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="info-footer">
                        <div class="info__logo">
                            <img src="/assets/images/musicLounge_logo_principal.png" alt="footer logo">
                        </div>
                        <p class="info--text">Para mais informações entre em contato conosco através dos meios abaixo.</p>
                        <ul class="info-contact">
                            <!-- <li>
                                <span class="lnr lnr-phone info-icon"></span>
                                <span class="info">Tel: +55 11 96090-5991</span>
                            </li> -->
                            <li>
                                <span class="lnr lnr-envelope info-icon"></span>
                                <span class="info">musiclounge@musiclounge.com.br</span>
                            </li>
                            <!-- <li>
                                <span class="lnr lnr-map-marker info-icon"></span>
                                <span class="info">Rua: Cajupiranga, 185 - Jd.Nordeste - São Paulo - SP</span>
                            </li> -->
                        </ul>
                    </div>
                    <!-- end /.info-footer -->
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-5 col-md-6">
                    <div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Comunidade</h4>
                        <ul>
                            <li>
                                <a href="#">Como se juntar a nós</a>
                            </li>
                            <li>
                                <a href="#">Como isso funciona</a>
                            </li>
                            <!-- <li>
                                <a href="#">Buying and Selling</a>
                            </li> -->
                            <li>
                                <a href="#">Depoimentos</a>
                            </li>
                            <li>
                                <a href="/termos-de-uso">Termos de Uso</a>
                            </li>
                            <li>
                                <a href="/politica-privacidade">Política de Privacidade</a>
                            </li>
                            <!-- <li>
                                <a href="#">Refund Policy</a>
                            </li> -->
                            <!-- <li>
                                <a href="#">Affiliates</a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- end /.footer-menu -->
                </div>
                <!-- end /.col-md-5 -->

                <div class="col-lg-4 col-md-12">
                    <div class="newsletter">
                        <h4 class="footer-widget-title text--white">Newsletter</h4>
                        <p>Assine nosso newsletter e fique por dentro das novidades que estamos correndo atrás. =)</p>
                        <div class="newsletter__form">
                            <!-- <form action="/newsletter" method="post"> -->
                            <?= $this->Form->create(null, ['url' => ['controller' => 'Newsletters', 'action' => 'add'], 'method' => 'POST']); ?>
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text" placeholder="Seu e-mail" name="email">
                                    <button class="btn btn--round" type="submit">Enviar</button>
                                </div>
                            <?= $this->Form->end(); ?>
                            <!-- </form> -->
                        </div>

                        <!-- start .social -->
                        <div class="social social--color--filled">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/MusicloungeBr-112549403992442" target="_blank">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/musicloungebr/" target="_blank">
                                        <span class="fa fa-instagram"></span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#">
                                        <span class="fa fa-pinterest"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-dribbble"></span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- end /.social -->
                    </div>
                    <!-- end /.newsletter -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.footer-big -->

    <div class="mini-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <p>&copy; 2020
                            <a href="#">MusicLounge</a>. Todos direitos reservados. Criado por
                            <a href="#">Apaixonados por música e tecnologia</a>
                        </p>
                    </div>

                    <div class="go_top">
                        <span class="lnr lnr-chevron-up"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>