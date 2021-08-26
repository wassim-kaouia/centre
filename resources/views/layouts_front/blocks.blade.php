<section class="feature">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>{{ json_last_error_msg()}}</h4>
                        {{-- <p>{{  json_decode($settings->bloc1,true)['description']}}</p> --}}
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        {{-- <h4>{{ json_decode($settings->bloc2,true)['title'] }}</h4>
                        <p>{{  json_decode($settings->bloc2,true)['description'] }}</p> --}}
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="feature-text">
                        {{-- <h4>{{ json_decode($settings->bloc3,true)['title']}}</h4> 
                        <p>{{  json_decode($settings->bloc3,true)['description']}}</p>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>