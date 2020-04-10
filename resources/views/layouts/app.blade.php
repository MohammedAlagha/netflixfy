



    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Netflixify</title>

        <!--font awesome-->
        <link rel="stylesheet" href="dist/css/font-awesome5.11.2.min.css">

{{--        <!--bootstrap-->--}}
{{--        <link rel="stylesheet" href="dist/css/bootstrap.min.css">--}}
{{--        --}}

        <!-- Scripts -->





        <!--vendor css-->
        <link rel="stylesheet" href="dist/css/vendor.min.css">

        <!--google font-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">

        <!--main styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="dist/css/main.min.css">
    </head>
    <body>

    <section id="banner">


        <div class="movies owl-carousel owl-theme">

            <div class="movie text-white d-flex justify-content-center align-items-center">

                <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url('dist/images/iron_land.jpg') center/cover no-repeat;"></div>

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="d-flex justify-content-between">
                                <h1 class="movie__name fw-300">Iron Man</h1>
                                <span class="movie__year align-self-center">2017</span>
                            </div>

                            <div class="d-flex movie__rating my-1">
                                <div class="d-flex">
                                    <span class="fas fa-star text-primary mr-2"></span>
                                    <span class="fas fa-star text-primary mr-2"></span>
                                    <span class="fas fa-star text-primary mr-2"></span>
                                    <span class="fas fa-star text-primary mr-2"></span>
                                </div>
                                <span class="align-self-center">4.7</span>
                            </div>

                            <p class="movie__description my-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam distinctio doloremque eum excepturi exercitationem fugit inventore labore laboriosam magni, minus molestias neque non omnis qui quia soluta temporibus ut vero.</p>

                            <div class="movie__cta my-4">
                                <a href="show.html" class="btn btn-primary text-capitalize mr-0 mr-md-2"><span class="fas fa-play"></span> watch now</a>
                                <a href="#" class="btn btn-outline-light text-capitalize"><span class="fas fa-heart"></span> add to favorite</a>
                            </div>
                        </div><!-- end of col -->

                        <div class="col-6 mt-2 mx-auto col-md-4 col-lg-3  ml-md-auto mr-md-0">
                            <img src="dist/images/iron.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- end of row -->

                </div><!-- end of container -->

            </div><!-- end of movie -->

            <div class="movie text-white d-flex justify-content-center align-items-center">

                <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url('dist/images/gemni_land.jpg') center/cover no-repeat;"></div>

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="d-flex justify-content-between">
                                <h1 class="movie__name fw-300">Gemni</h1>
                                <span class="movie__year align-self-center">2019</span>
                            </div>

                            <div class="d-flex movie__rating my-1">
                                <div class="d-flex">
                                    <span class="fas fa-star text-primary mr-2"></span>
                                    <span class="fas fa-star text-primary mr-2"></span>
                                    <span class="fas fa-star text-primary mr-2"></span>
                                    <span class="fas fa-star text-primary mr-2"></span>
                                </div>
                                <span class="align-self-center">3.5</span>
                            </div>

                            <p class="movie__description my-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam distinctio doloremque eum excepturi exercitationem fugit inventore labore laboriosam magni, minus molestias neque non omnis qui quia soluta temporibus ut vero.</p>

                            <div class="movie__cta my-4">
                                <a href="show.html" class="btn btn-primary text-capitalize mr-0 mr-md-2"><span class="fas fa-play"></span> watch now</a>
                                <a href="" class="btn btn-outline-light text-capitalize"><span class="fas fa-heart"></span> add to favorite</a>
                            </div>
                        </div><!-- end of col -->

                        <div class="col-6 mt-2 mx-auto col-md-4 col-lg-3  ml-md-auto mr-md-0">
                            <img src="dist/images/gemni.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- end of row -->

                </div><!-- end of container -->

            </div><!-- end of movie -->

        </div><!-- end of movies -->

    </section><!-- end of banner section-->

    <section class="listing py-2">

        <div class="container">

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title text-white fw-300">Drama</h3>
                    <a href="" class="align-self-center text-capitalize text-primary">see all</a>
                </div>
            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">

                <div class="movie p-0">
                    <img src="dist/images/mortal_engines.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/gemni.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/avatar.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/iron.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section><!-- end of listing section -->

    <section class="listing py-2">

        <div class="container">

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title text-white fw-300">Action</h3>
                    <a href="" class="align-self-center text-capitalize text-primary">see all</a>
                </div>
            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">

                <div class="movie p-0">
                    <img src="dist/images/mortal_engines.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/gemni.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/avatar.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="dist/images/iron.jpg" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section><!-- end of listing section -->

    <footer id="footer" class="py-3 bg-primary text-center text-white">
        <p class="mb-0 text-capitalize">&copy; all copy right reserved for Netflixify 2019</p>
        <div class="social__icons">
            <a href="" class="text-white mr-2"><i class="fab fa-facebook fa-1x"></i></a>
            <a href="" class="text-white mr-2"><i class="fab fa-youtube"></i></a>
            <a href="" class="text-white mr-2"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>

{{--    <!--jquery-->--}}
{{--    <script src="dist/js/jquery-3.4.0.min.js"></script>--}}

{{--    <!--bootstrap-->--}}
{{--    <script src="dist/js/bootstrap.min.js"></script>--}}
{{--    <script src="dist/js/popper.min.js"></script>--}}

{{--    <!--vendor js-->--}}
{{--    <script src="dist/js/vendor.min.js"></script>--}}

    <!--main scripts-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="dist/js/main.min.js"></script>

    <script>
        $(document).ready(function () {

            $("#banner .movies").owlCarousel({
                loop: true,
                nav: false,
                items: 1,
                dots: false,
            });

            $(".listing .movies").owlCarousel({
                loop: true,
                nav: false,
                stagePadding: 50,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    900: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                },
                dots: false,
                margin: 15,
                loop: true,
            });

        });
    </script>
    </body>
    </html>

