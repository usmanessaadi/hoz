@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="{{asset('css/home.css')}}" />
@endpush
@section('content')
<div class="container homepage" id="main">
  
    <section class="hero-section">
        <div class="content">
            <div class="titles container">
                <h1 class="header-title">
                    Peace of mind, for the best price!
                </h1>
                <img class="jealous-img" src="{{ asset('assets/images/jealous-title.png') }}" alt="Hoz Digital Locks Doors Gates">
                <a href="#footer" class="text-white">
                    <div class="scroller">
                        <h5>Get Started</h5>
                        <img src="{{ asset('assets/images/scroller.png') }}" alt="Hoz Scroller">
                    </div>
                </a>
                <div class="hero-cta">
                    <div class="shop-cta">
                        <h3>
                            Know what you want?
                        </h3>
                        <a href="#0" class="btn-cta">Shop</a>
                    </div>
                    <div class="hmc-cta">
                        
                        <h3>
                            Need guidance?
                        </h3>
                        <a href="{{route('hmc')}}" class="btn-cta">Help Me Choose</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="features_title">
            <h2>
                Features
            </h2>
            <p>
                Upgrade every level of your <br> home security
            </p>
        </div>

        <div class="features-cards">
            {{-- <div class="container"> --}}
                <div class="feature">
                    <img src="{{ asset('assets/images/feature-01-auto-relock.png') }}" alt="HOZ Auto Relock Function">
                    <h3>Auto Relock Function</h3>
                    <p>If users do not open the door after unlocking the device it will lock itself automatically.
                    </p>
                </div>
                <div class="feature">
                    <img src="{{ asset('assets/images/feature-02-double-lock.png') }}" alt="HOZ Auto Relock Function">
                    <h3>Double Lock Function</h3>
                    <p>Easy to check battery status with three step level indicator and alarm when battery replacement is required.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('assets/images/feature-03-battery-level.png') }}" alt="HOZ Auto Relock Function">
                    <h3>Battery Level Indicator</h3>
                    <p>Easy to check battery status with three step level indicator and alarm when battery replacement is required.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('assets/images/feature-04-prevent-tresepass.png') }}" alt="HOZ Auto Relock Function">
                    <h3>Prevent Trespass And Hacking</h3>
                    <p>After multiple incorrect attempted entries an alarm will sound and all the functions of the lock will be suspended for three minutes. The alarm activates after three incorrect PIN/card entries and five incorrect fingerprint entries.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('assets/images/feature-05-intrusion-detection.png') }}" alt="HOZ Auto Relock Function">
                    <h3>Intrusion Detection Function</h3>
                    <p>this function triggers an alarm sound when an attempt is made to forcefully open the door from the inside or the outside. (It is a basic function, and cannot while locked, the open/close door sensor detects it and triggers an alarm sound for 5 minutes.</p>
                </div>
            {{-- </div> --}}
        </div>
    </section>

    <section class="hiw">
        <h2>
            How It Works
        </h2>
        <div class="hiw-data">
            <div class="hiw-steps">
                <div onclick="stepper(this)" data-target="step-01" class="hiw-01  clicked">
                    <p class="hiw-step">
                        Step 01
                    </p>
                    <h3 class="hiw-title">
                        Shop For The Right Product With The Right Features
                    </h3>
                    <p class="hiw-text">
                        Shop for the product your looking for in our Shop page. If you need guidance and info about different features and product categories, you can check our Help Me Choose page. Still need help? You can always give us a call!
                    </p>
                </div>
                <div onclick="stepper(this)" data-target="step-02" class="hiw-02" >
                    <p class="hiw-step">
                        Step 02
                    </p>
                    <h3 class="hiw-title">
                        Easy Checkout and Installments across 3 months
                    </h3>
                    <p class="hiw-text">
                    Once you choose the right product for you, you can choose the exact time and date for the installation process and checkout using your preferred payment method. Not to mention, you only have to pay 1/3 price today using Atome checkout!    
                    </p>
                </div>
                <div  onclick="stepper(this)" data-target="step-03" class="hiw-03" >
                    <p class="hiw-step">
                        Step 03
                    </p>
                    <h3 class="hiw-title">
                        Track Every Step Of The Way
                    </h3>
                    <p class="hiw-text">
                        All steps of the process are trackable in your account center and you’ll receive an email whenever there is an update about your order. The technical team will be at your door at the time and day you set.    
                    </p>
                </div>
            </div>
            <div class="hiw-images">
                <img id="step-01" src="{{ asset('assets/images/step-01-img.jpg') }}" alt="HOZ Shop For The Right Product With The Right Features">
                <img id="step-02" style="display:none;" src="{{ asset('assets/images/step-02-img.jpg') }}" alt="HOZ Easy Checkout and Installments across 3 months">
                <img id="step-03" style="display:none; width: 100%;" src="{{ asset('assets/images/step-03-img.jpg') }}" alt="HOZ Track Every Step Of The Way">
            </div>
        </div>
    </section>

    <section class="testimonials">
        <h2>
            Over 5000 peoples trust HOZ with their security.
        </h2>
        <div class="testimonials-container">
            <img class="testomonials-left-img" src="{{ asset('assets/images/testomonials-left-img.png') }}" alt="Hoz Over 5000 peoples trust HOZ with their security.">
            <div class="testimonials-slider">
                <div class="testi-cards">
                    <div class="testi-card">
                        <div class="testi-profile">
                            <img src="{{ asset('assets/images/testi-dine-pennebker.png') }}" alt="HOZ Dine Pennebker">
                            <div class="testi-profile-details">
                                <h4>Diane Pennebaker</h4>
                                <div class="rating">
                                    <span class="not-filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                </div>
                            </div>
                        </div>
                        <h3>Intuitive with the right features</h3>
                        <p class="testi-date">
                            26 August, 2020
                        </p>

                        <p class="testi-text">
                            "I've tried a dozn maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features and was dozn maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features ans was maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features...
                        </p>
                        <div class="line"></div>
                        <div class="testi-images">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image1.png') }}" alt=" HOZ Testimonials Image">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image2.png') }}" alt=" HOZ Testimonials Image">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image3.png') }}" alt=" HOZ Testimonials Image">
                        </div>
                    </div>
                    <div class="testi-card">
                        <div class="testi-profile">
                            <img src="{{ asset('assets/images/testi-tony-jhonson.png') }}" alt="HOZ Tony Jhonson">
                            <div class="testi-profile-details">
                                <h4>Tony Johnson</h4>
                                <div class="rating">
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                </div>
                            </div>
                        </div>
                        <h3>This is great!!!</h3>
                        <p class="testi-date">
                            26 August, 2020
                        </p>

                        <p class="testi-text">
                            "I've tried a dozn maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features and was dozn maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features ans was maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features...
                        </p>
                        <div class="line"></div>
                        <div class="testi-images">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image1.png') }}" alt=" HOZ Testimonials Image">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image2.png') }}" alt=" HOZ Testimonials Image">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image3.png') }}" alt=" HOZ Testimonials Image">
                        </div>
                    </div>
                    <div class="testi-card">
                        <div class="testi-profile">
                            <img src="{{ asset('assets/images/testi-chery-smith.png') }}" alt="HOZ Chery Smith">
                            <div class="testi-profile-details">
                                <h4>Chery Smith</h4>
                                <div class="rating">
                                    <span class="not-filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                    <span class="filled">&#9734;</span>
                                </div>
                            </div>
                        </div>
                        <h3>Hight configurable and works.</h3>
                        <p class="testi-date">
                            26 August, 2020
                        </p>

                        <p class="testi-text">
                            "I've tried a dozn maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features and was dozn maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features ans was maps plugins, but the Google Maps one from Elfsight was the most intuitive, with just the right features...
                        </p>
                        <div class="line"></div>
                        <div class="testi-images">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image1.png') }}" alt=" HOZ Testimonials Image">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image2.png') }}" alt=" HOZ Testimonials Image">
                            <img src="{{ asset('assets/images/testi-dine-pennebker-image3.png') }}" alt=" HOZ Testimonials Image">
                        </div>
                    </div>
                </div>
                <div class="testi-arrows">
                    <img id="arrow-left" src="{{ asset('assets/images/arrow-left.png') }}" alt="HOZ Testimonials">
                    <img id="arrow-right" src="{{ asset('assets/images/arrow-right.png') }}" alt="HOZ Testimonials">
                </div>
            </div>
        </div>
        <a href="#0" class="testi-btn">Join The Family!</a>
    </section>

    <section class="local-sellers">
        <h2>Local Authorized Seller of:</h2>
        <div class="sellers">
            <div class="seller">
                <img src="{{ asset('assets/images/locals-seller-samsung.png') }}" alt="HOZ Samsung">
                <p>Samsung has been recogised globally as one of the biggest brand and industry leader in technology, today Samsung continue to deliver world best products like mobile, tv and SmartHome DigitalLock appliances.</p>
            </div>
            <div class="seller">
                <img src="{{ asset('assets/images/locals-seller-kaadas.png') }}" alt="HOZ kaadas">
                <p>From USA since 1920, Schlage has been creating the strong and advanced security products for homes and commercial buildings. They have been meticulous designers, painstaking engineers, and proud craftsmen. From durable mechanical locks to comprehensive electronic access control solutions and biometrics, Schlage has it all.</p>
            </div>
            <div class="seller">
                <img src="{{ asset('assets/images/locals-seller-schlage.png') }}" alt="HOZ schlage">
                <p>Kaadas brand was born in Germany, synonymous with precision, quality and stylish design led by consultants including BMW Senior Designer George Allmendinger, Kaadas products are built on rigour, reliability and security at a world class standard. Kaadas is driven by R&D centres in Germany and Shenzhen, and a design research centre in South Korea.</p>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <h2>Sounds Great?</h2>
        <div class="cta-btns">
            <img src="{{ asset('assets/images/start-here.png') }}" alt="HOZ">
            <a href="#0" class="cta-btn">Start Shopping <img src="{{ asset('assets/images/lil-arrow-right.png') }}" alt="HOZ"></a>
            <a href="#0" class="cta-btn hmc-cta-btn">Help Me Choose</a>
        </div>

    </section>
</div>

@endsection


@push('script')
   <script>
        var stepper = function(elem) {
            
            let stepTarget = $(elem).attr('data-target');
            let stepimg = $('#'+stepTarget);
            stepimg.siblings().fadeOut(function(){
                stepimg.fadeIn();
            });
            $(elem).addClass('clicked').siblings().removeClass('clicked');
        }
   </script>


<!-- Start of Async Callbell Code -->
<script>
  window.callbellSettings = {
    token: "t1xCsWmdGrQF3voZsQGaE3f2"
  };
</script>
<script>
  (function () {
    var w = window;
    var ic = w.callbell;
    if (typeof ic === "function") {
      ic('reattach_activator');
      ic('update', callbellSettings);
    } else {
      var d = document;
      var i = function () {
        i.c(arguments)
      };
      i.q = [];
      i.c = function (args) {
        i.q.push(args)
      };
      w.Callbell = i;
      var l = function () {
        var s = d.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = 'https://dash.callbell.eu/include/' + window.callbellSettings.token + '.js';
        var x = d.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
      };
      if (w.attachEvent) {
        w.attachEvent('onload', l);
      } else {
        w.addEventListener('load', l, false);
      }
    }
  })()
</script>
<!-- End of Async Callbell Code -->
@endpush