<section class="hero-area bgimage">
    <div class="bg_image_holder"  style="background-image: url(/assets/images/banner-1.jpeg); opacity: 1;">
        <img src="/assets/images/banner-1.jpeg" alt="background-image">
    </div>
    <!-- start hero-content -->
    <div class="hero-content content_above">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container">
                <!-- start row -->
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="hero__content__title">
                            <h1>
                                <span class="light">Cadastre seu instrumento</span>
                                <!-- <span class="bold">e o projeja do comércio ilegal de instrumentos roubados</span> -->
                            </h1>
                            <p class="tagline">e o proteja do comércio ilegal de instrumentos roubados</p>
                            <!-- <p class="tagline">#JUNTOSSOMOSMAISFORTES</p> -->
                        </div>

                        <!-- start .hero__btn-area-->
                        <div class="hero__btn-area">
                            <!-- <a href="#" class="btn btn--round btn--lg">Pesquisar instrumentos</a>
                            <a href="/instrumentos/add" class="btn btn--round btn--lg" @click="search">Cadastrar instrumentos</a> -->
                        </div>
                        <!-- end .hero__btn-area-->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end .contact_wrapper -->
    </div>
    <!-- end hero-content -->

    <!--start search-area -->
    <div class="search-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .container -->
            <div class="row">
                <!-- start .col-sm-12 -->
                <div class="col-sm-12">
                    <!-- start .search_box -->
                    <div class="search_box">
                        <form action="/instrumentos/pesquisa">
                            <input type="text" class="text_field" placeholder="Pesquisar Agora por marca, modelo, número de série ..." name="search">
                            <!-- <div class="search__select select-wrap">
                                <select name="category" class="select--field" id="blah">
                                    <option value="">All Categories</option>
                                    <option value="">PSD</option>
                                    <option value="">HTML</option>
                                    <option value="">WordPress</option>
                                    <option value="">All Categories</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div> -->
                            <button type="submit" class="search-btn btn--lg" @click="query">Pesquisar Agora</button>
                        </form>
                    </div>
                    <!-- end ./search_box -->
                </div>
                <!-- end /.col-sm-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!--start /.search-area -->
    </section>