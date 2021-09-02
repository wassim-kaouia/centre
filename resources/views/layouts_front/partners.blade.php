<section class="cta-2 clients ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="section-heading center-heading">
                    <h3 class="mt-5">Nos Meilleurs Partenaires</h3>
                </div>
            </div>
        </div>

        <div class="row cta-2-inner">
            @foreach ($partners as $partner)
            <div class="col-lg-2 col-sm-6 ">
                <div class="client-logo">
                    <img src="{{ $partner->logo }}" alt="logo" width="150" height="150">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>