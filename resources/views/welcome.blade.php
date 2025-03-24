<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Fahed AlJghamy</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: iPortfolio - v3.10.0
    * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Mobile nav toggle button ======= -->
<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!-- ======= Header ======= -->
<header id="header">
    <div class="d-flex flex-column">

        <div class="profile">
            <img src="{{ asset('assets/img/Setting/' . ($setting->photo ?? 'default-profile.jpg')) }}" alt="" class="img-fluid rounded-circle">
            <h1 class="text-light"><a href="#"><strong>{{ $setting->name }}</strong></a></h1>
            <div class="social-links mt-3 text-center">
                @foreach($links as $link)
                    <a href="{{ $link->link }}" class="gitlab"><i class="{{ $link->icon }}"></i></a>

                @endforeach
                {{--                <a href="https://gitlab.com/fahed-92" class="gitlab"><i class="bx bxl-gitlab"></i></a>--}}
                {{--                <a href="https://fahed9285@gmail.com" class="gmail"><i class="bx bxl-gmail"></i></a>--}}
                {{--                <a href="https://www.facebook.com/FahedAljghamy/" class="facebook"><i class="bx bxl-facebook"></i></a>--}}
                {{--                <a href="https://www.instagram.com/fahed9285/" class="instagram"><i class="bx bxl-instagram"></i></a>--}}
                {{--                <a href="https://github.com/fahed-92" class="github"><i class="bx bxl-github"></i></a>--}}
                {{--                <a href="https://www.linkedin.com/in/fahedaljghamy/" class="linkedin"><i class="bx bxl-linkedin"></i></a>--}}
            </div>
        </div>

        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a>
                </li>
                <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
                <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a>
                </li>
                <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i>
                        <span>Portfolio</span></a></li>
                <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a>
                </li>
                <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
        <h1><strong>{{ $setting->name }}</strong></h1>
        <p>I'm <span class="typed" data-typed-items="{{ $positions }}"></span></p>

        {{--        Software Engineer, Backend Developer, FullStack Laravel Developer, Systems Analyst--}}
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>About</h2>
                <p>
                    {!! $about->summary ?? 'No summary available yet.' !!}
                </p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{ asset('assets/img/Setting/' . ($setting->photo ?? 'default-profile.jpg')) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>{{ $setting->name ?? 'Your Name' }}</h3>
                    <p class="fst-italic">
                        {{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore--}}
                        {{--                        magna aliqua.--}}
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong>
                                    <span>{{ $about->birthday ?? 'Not specified' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Nationality:</strong>
                                    <span>{{ $about->nationality ?? 'Not specified' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                    <span>{{ $about->phone ?? 'Not specified' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong>
                                    <span>{{ $about->city ?? 'Not specified' }}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>
                                    <span>{{ $about->age ?? 'Not specified' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                    <span>{{ $about->degree ?? 'Not specified' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                    <span>{{ $about->email ?? 'Not specified' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                    <span>Available</span></li>
                            </ul>
                        </div>
                    </div>
                    <p>

                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <section id="skills" class="skills section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Skills</h2>
            </div>
            @foreach($categories as $category)
                <h3>{{ $category->name }}</h3>
                <div class="row skills-content">

                    <div class="col-lg-6" data-aos="fade-up">
                        @foreach($category->skills as $index =>   $skill)
                            @if ($index % 2 == 0)
                                <div class="progress">
                                    <span class="skill">{{$skill->skill}} <i
                                            class="val">{{$skill->percentage}}%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{$skill->percentage}}" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">

                        @foreach($category->skills as $index =>   $skill)
                            @if ($index % 2 != 0)
                                <div class="progress">
                                    <span class="skill">{{$skill->skill}} <i
                                            class="val">{{$skill->percentage}}%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="{{$skill->percentage}}" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>
            @endforeach
        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
        <div class="container">

            <div class="section-title">
                <h2>Resume</h2>
                <p>Web Developer specializing in Back end development. Experienced with all stages of the development
                    cycle for dynamic web projects. Well-versed in numerous programming languages including PHP OOP,
                    JavaScript, HTML5, CSS, MySQL, C, C#, C++.</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-up">
                    {{--                    <h3 class="resume-title">Sumary</h3>--}}
                    {{--                    <div class="resume-item pb-0">--}}
                    {{--                        <h4>Eng.Fahed AlJghamy</h4>--}}
                    {{--                        <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>--}}
                    {{--                        <ul>--}}
                    {{--                            <li>Portland par 127,Orlando, FL</li>--}}
                    {{--                            <li>(123) 456-7891</li>--}}
                    {{--                            <li>alice.barkley@example.com</li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}

                    <h3 class="resume-title">Education</h3>
                    @foreach( $educations as $education)
                        <div class="resume-item">
                            <h4>{{ $education->faculty }}</h4>

                            <h5>From:{{ $education->from_year }} - To: @if( $education->to_year !='Invalid date') {{ $education->to_year }} @else Present @endif</h5>
                            <p><em>{{ $education->university }}</em></p>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="resume-title">Professional Experience</h3>
                    @foreach($experiences as $experience)
                        <div class="resume-item">
                            <h4>{{ $experience ->position }}</h4>
                            <h5>{{ $experience->from_year }} - To: @if( $experience->to_year !='Invalid date') {{ $experience->to_year }} @else Present @endif</h5>
                            <p><em>{{ $experience -> company }}</em></p>
                            <p>{!!  $experience -> description !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Projects</h2>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach($uniqueCategory as $category)
                            <li data-filter=".filter-{{$category->category}}">{{$category->category}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $project->category }}">
                        <div class="portfolio-wrap">
                            <img src="{{asset('assets/img/projects/'.$project->image)}}" class="img-fluid" alt="">
                            <div class="portfolio-links">
                                <a href="{{asset('assets/img/projects/'.$project->image)}}"
                                   data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i
                                        class="bx bx-plus"></i></a>
                                <a href="{{$project->link}}" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>
            </div>

            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="{{ $service->icon }}"></i></div>
                        <h4 class="title"><a href="">{{ $service->service }}</a></h4>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->


    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
            </div>

            <div class="row" data-aos="fade-in">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{ $about->city }}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{ $about->email }}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{ $about->phone }}</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{ route('contact.send') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            {{--                            <div class="error-message"></div>--}}
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            {{--            &copy; Copyright <strong><span>iPortfolio</span></strong>--}}
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
            {{--            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
        </div>
    </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/typed.js/typed.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>

<script>
    // Track visitor when page loads
    fetch('{{ route("admin.visitors.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'User-Agent': navigator.userAgent
        }
    });
</script>

</body>

</html>
<script>
    document.querySelector('.php-email-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    form.reset();
                    document.querySelector('.sent-message').style.display = 'block';
                } else {
                    document.querySelector('.error-message').textContent = data.error;
                    document.querySelector('.error-message').style.display = 'block';
                }
            })
            .catch(error => {
                document.querySelector('.error-message').textContent = 'An error occurred. Please try again.';
                document.querySelector('.error-message').style.display = 'block';
            });
    });
</script>
