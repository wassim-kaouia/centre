{{-- <section class="testimonial section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading text-center">
                    <span class="subheading">Ce qui'ils disent nos etudiants </span>
                    <h3>Booster votre carrière en apprenant des nouveaux skills</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonials-slides owl-carousel owl-theme">
                    @foreach ($reviews as $review)
                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>{{ $review->content }}</p>
                             <div class="rating">
                                @if ($review->stars == null || $review->stars == 0 || $review->stars == 1)
                           <a href="#"><i class="fa fa-star"></i></a>
                        @endif
                        @if ($review->stars == 2)
                           <a href="#"><i class="fa fa-star"></i></a>
                           <a href="#"><i class="fa fa-star"></i></a>
                        @endif
                        @if ($review->stars == 3)
                           <a href="#"><i class="fa fa-star"></i></a>
                           <a href="#"><i class="fa fa-star"></i></a>
                           <a href="#"><i class="fa fa-star"></i></a>
                        @endif
                        @if ($review->stars == 4)
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                        @endif
                        @if ($review->stars == 5)
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                        @endif
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="{{ $review->user->avatar }}" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>{{ $review->user->name }}</h4>
                                <span class="designation">Etudiant</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="testimonial-3 section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading text-center">
                    <span class="subheading" style="color: #96c221">Feedback De Nos Étudiants</span>
                    <h3>Ce qu'ils disent nos étudiants</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonials-slides-3 owl-carousel owl-theme">
                    @foreach ($reviews as $review)
                    <div class="review-item">
                        <div class="rating">
                        @if ($review->stars == null || $review->stars == 0 || $review->stars == 1)
                           <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                        @endif
                        @if ($review->stars == 2)
                           <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                           <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                        @endif
                        @if ($review->stars == 3)
                           <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                           <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                           <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                        @endif
                        @if ($review->stars == 4)
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                        @endif
                        @if ($review->stars == 5)
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                            <a href="#"><i class="fa fa-star" style="color: #96c221" ></i></a>
                            <a href="#"><i class="fa fa-star" style="color: #96c221"></i></a>
                        @endif
                        </div>
                        <div class="client-info">
                            <p>{{ $review->content }}</p>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="{{ $review->user->avatar }}" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>{{ $review->user->name }}</h4>
                                <span class="designation text-dark">Etudiant(e)</span>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>