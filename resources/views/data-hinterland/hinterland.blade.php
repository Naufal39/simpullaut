@extends('layouts/main')

@section('isihalaman')
    <main class="main">

        <!-- Services Section -->
        <section id="services" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Data Hinterland</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/pangandaran.png') }}" alt="" class="mt-3"
                                    style="max-width: 80%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'pangandaran']) }}" class="stretched-link">
                                <h3>Kab. Pangandaran</h3>
                            </a>
                            <p>
                                Provident nihil minus qui consequatur non omnis maiores. Eos
                                accusantium minus dolores iure perferendis tempore et
                                consequatur.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/banjar.png') }}" alt="" class="mt-3"
                                    style="max-width: 25%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'banjar']) }}" class="stretched-link">
                                <h3>Banjar</h3>
                            </a>
                            <p>
                                Ut autem aut autem non a. Sint sint sit facilis nam iusto
                                sint. Libero corrupti neque eum hic non ut nesciunt dolorem.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/ciamis.png') }}" alt="" class="mt-3"
                                    style="max-width: 25%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'ciamis']) }}" class="stretched-link">
                                <h3>Ciamis</h3>
                            </a>
                            <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/tasikmalaya.png') }}" alt="" class="mt-3"
                                    style="max-width: 25%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'tasikmalaya']) }}" class="stretched-link">
                                <h3>Kab. Tasikmalaya</h3>
                            </a>
                            <p>
                                Non et temporibus minus omnis sed dolor esse consequatur.
                                Cupiditate sed error ea fuga sit provident adipisci neque.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/kota-tasikmalaya.png') }}" alt="" class="mt-3"
                                    style="max-width: 25%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'kota-tasikmalaya']) }}" class="stretched-link">
                                <h3>Kota Tasikmalaya</h3>
                            </a>
                            <p>
                                Non et temporibus minus omnis sed dolor esse consequatur.
                                Cupiditate sed error ea fuga sit provident adipisci neque.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/cianjur.png') }}" alt="" class="mt-3"
                                    style="max-width: 25%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'cianjur']) }}" class="stretched-link">
                                <h3>Kab. Cianjur</h3>
                            </a>
                            <p>
                                Cumque et suscipit saepe. Est maiores autem enim facilis ut
                                aut ipsam corporis aut. Sed animi at autem alias eius labore.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/garut.png') }}" alt="" class="mt-3"
                                    style="max-width: 25%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'garut']) }}" class="stretched-link">
                                <h3>Kab. Garut</h3>
                            </a>
                            <p>
                                Hic molestias ea quibusdam eos. Fugiat enim doloremque aut
                                neque non et debitis iure. Corrupti recusandae ducimus enim.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <i><img src="{{ asset('img/logo-kab/kabupaten-sukabumi.png') }}" alt="" class="mt-3"
                                    style="max-width: 25%;"></i>
                            <a href="{{ route('detail-hinterland', ['id' => 'kabupaten-sukabumi']) }}"
                                class="stretched-link">
                                <h3>Kab. Sukabumi</h3>
                            </a>
                            <p>
                                Hic molestias ea quibusdam eos. Fugiat enim doloremque aut
                                neque non et debitis iure. Corrupti recusandae ducimus enim.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>
            </div>
        </section>
        <!-- /Services Section -->

    </main>
@endsection
