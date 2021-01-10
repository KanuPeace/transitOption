@extends('web.layouts.app' , ['title' => "Home"])
@section('content')
    <section id="lastOffer" class="last-offer-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Select your comfort vehicle</h2>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Company</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Current Location</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Travel Destination</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Price Range</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Ratings</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mt-15">
                    <button type="submit" class="btn-primary">Filter</button>
                </div>
            </div>
            <div class="row">
                @foreach ($vehicles as $vehicle)
                    <div class="col-lg-4 col-md-6 filtr-item">
                        @include("web.fragments.vehicle_item" , ["vehicle" => $vehicle])
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- <section id="lastOffer" class="last-offer-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Select your comfort vehicle</h2>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Company</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Current Location</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Travel Destination</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Price Range</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="select-box">
                        <select class="form-control">
                            <option value="1">Ratings</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mt-15">
                    <button type="submit" class="btn-primary">Filter</button>
                </div>
            </div>
            <div class="form-row">
                @foreach ($vehicles as $vehicle)
                    <div class="col-lg-4 col-md-6">
                        @include("web.fragments.vehicle_item" , ["vehicle" => $vehicle])
                    </div>
                @endforeach


                <div class="col-lg-12 col-md-12">
                    <div class="pagination text-center">
                        <span class="page-numbers current" aria-current="page">1</span>
                        <a href="#" class="page-numbers">2</a>
                        <a href="#" class="page-numbers">3</a>
                        <a href="#" class="page-numbers">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section id="testimonial" class="testimonial-section ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>What're Our Clients Say</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people.
                    Each time we travel, we see the world with new eyes.</p>
            </div>
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="testimonial-slider owl-carousel">
                        <div class="slider-item">
                            <div class="client-img">
                                <img src="{{ $web_source }}/img/client1.jpg" alt="client-1" />
                            </div>
                            <div class="content">
                                <div class="client-info">
                                    <h3>Jordan Alin</h3>
                                    <span>Bloger & Youtuber</span>
                                </div>
                                <div class="quote">
                                    <i class='bx bxs-quote-left'></i>
                                </div>
                                <p>
                                    The Personal Travel Agents Academy is a 12-month training programme allowing anyone
                                    with no previous travel experience to start their own travel business. This is an
                                    advanced course to help build knowledge in travel and develop sales skills.
                                </p>
                                <div class="review">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="client-img">
                                <img src="{{ $web_source }}/img/client2.jpg" alt="client-1" />
                            </div>
                            <div class="content">
                                <div class="client-info mb-30">
                                    <h3>David Milan</h3>
                                    <span>Photographer</span>
                                </div>
                                <div class="quote">
                                    <i class='bx bxs-quote-left'></i>
                                </div>
                                <p>
                                    The Personal Travel Agents Academy is a 12-month training programme allowing anyone
                                    with no previous travel experience to start their own travel business. This is an
                                    advanced course to help build knowledge in travel and develop sales skills.
                                </p>
                                <div class="review mt-15">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="client-img">
                                <img src="{{ $web_source }}/img/client3.jpg" alt="client-1" />
                            </div>
                            <div class="content">
                                <div class="client-info mb-30">
                                    <h3>Thomas Alva</h3>
                                    <span>Journalist</span>
                                </div>
                                <div class="quote">
                                    <i class='bx bxs-quote-left'></i>
                                </div>
                                <p>
                                    The Personal Travel Agents Academy is a 12-month training programme allowing anyone
                                    with no previous travel experience to start their own travel business. This is an
                                    advanced course to help build knowledge in travel and develop sales skills.
                                </p>
                                <div class="review mt-15">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="client-img">
                                <img src="{{ $web_source }}/img/client4.jpg" alt="client-1" />
                            </div>
                            <div class="content">
                                <div class="client-info mb-30">
                                    <h3>Emma Watson</h3>
                                    <span>Actress & Model</span>
                                </div>
                                <div class="quote">
                                    <i class='bx bxs-quote-left'></i>
                                </div>
                                <p>
                                    The Personal Travel Agents Academy is a 12-month training programme allowing anyone
                                    with no previous travel experience to start their own travel business. This is an
                                    advanced course to help build knowledge in travel and develop sales skills.
                                </p>
                                <div class="review mt-15">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="client-img">
                                <img src="{{ $web_source }}/img/client5.jpg" alt="client-1" />
                            </div>
                            <div class="content">
                                <div class="client-info mb-30">
                                    <h3>Jordan Alin</h3>
                                    <span>Bloger & Youtuber</span>
                                </div>
                                <div class="quote">
                                    <i class='bx bxs-quote-left'></i>
                                </div>
                                <p>
                                    The Personal Travel Agents Academy is a 12-month training programme allowing anyone
                                    with no previous travel experience to start their own travel business. This is an
                                    advanced course to help build knowledge in travel and develop sales skills.
                                </p>
                                <div class="review mt-15">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='clients-img'>
                <img class="image image-1" src="{{ $web_source }}/img/client1.jpg" alt="Demo Image">
                <img class="image image-2" src="{{ $web_source }}/img/client2.jpg" alt="Demo Image">
                <img class="image image-3" src="{{ $web_source }}/img/client3.jpg" alt="Demo Image">
                <img class="image image-4" src="{{ $web_source }}/img/client4.jpg" alt="Demo Image">
                <img class="image image-5" src="{{ $web_source }}/img/client5.jpg" alt="Demo Image">
            </div>
        </div>
        <div class="shape">
            <img src="{{ $web_source }}/img/shape1.png" alt="Background Shape">
        </div>
    </section>
@stop
