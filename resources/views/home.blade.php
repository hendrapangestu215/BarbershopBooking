<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <x-navbar />

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="hero-title">Premium Barbershop Experience</h1>
                    <p class="hero-subtitle">Experience the finest haircuts and grooming services. Book your appointment
                        today and look your best.</p>
                    <div class="d-flex gap-3">
                        <a href="/booking" class="btn-appointment rounded">
                            Book Appointment
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                        <a href="/services" class="btn-secondary-outline rounded">View Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="feature-title text-center">Premium Barbershop Experience</h2>
            <p class="feature-subtitle text-center">Experience the finest haircuts and grooming services in town. Our
                skilled
                barbers are dedicated to helping you look and feel your best.</p>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 d-flex flex-column">
                        <div class="card-body text-center">
                            <div class="feature-icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="6" cy="6" r="3"></circle>
                                    <path d="M8.12 8.12 12 12"></path>
                                    <path d="M20 4 8.12 15.88"></path>
                                    <circle cx="6" cy="18" r="3"></circle>
                                    <path d="M14.8 14.8 20 20"></path>
                                </svg>
                            </div>
                            <h4 class="feature-name">Expert Barbers</h4>
                            <p class="feature-description">Our team of skilled professionals with years of experience.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 d-flex flex-column">
                        <div class="card-body text-center">
                            <div class="feature-icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                    <path
                                        d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                </svg>
                            </div>
                            <h4 class="feature-name">Easy Booking</h4>
                            <p class="feature-description">Book your appointment online in just a few clicks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 d-flex flex-column">
                        <div class="card-body text-center">
                            <div class="feature-icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg>
                            </div>
                            <h4 class="feature-name">No Wait Time</h4>
                            <p class="feature-description">Arrive at your scheduled time and get your haircut right
                                away.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <h2 class="service-title text-center">Our Services</h2>
            <p class="service-subtitle text-center">We offer a wide range of premium barbering services.</p>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card service-card h-100 d-flex flex-column">
                        <div class="service-content flex-grow-1">
                            <h4 class="fw-bold">Classic Haircut</h4>
                            <p class="text-muted small">Traditional haircut to keep you looking clean.</p>
                            <div class="service-price">$25</div>
                            <div class="service-time">30 minutes</div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Consultation</span>
                            </div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Shampoo</span>
                            </div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Styling</span>
                            </div>
                        </div>
                        <div class="service-footer mt-3">
                            <a href="/booking" class="w-100">
                                <button class="book-now-btn rounded w-100">Book Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card service-card h-100 d-flex flex-column">
                        <div class="service-content flex-grow-1">
                            <h4 class="fw-bold">Beard Trim</h4>
                            <p class="text-muted small">Keep your beard looking neat and fresh.</p>
                            <div class="service-price">$15</div>
                            <div class="service-time">20 minutes</div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Beard Wash</span>
                            </div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Hot Towel</span>
                            </div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Beard Oil</span>
                            </div>
                        </div>
                        <div class="service-footer mt-3">
                            <a href="/booking" class="w-100">
                                <button class="book-now-btn rounded w-100">Book Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card service-card h-100 d-flex flex-column">
                        <div class="service-content flex-grow-1">
                            <h4 class="fw-bold">Premium Package</h4>
                            <p class="text-muted small">Complete grooming experience.</p>
                            <div class="service-price">$45</div>
                            <div class="service-time">60 minutes</div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Haircut</span>
                            </div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Beard Trim</span>
                            </div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Hot Towel Treatment</span>
                            </div>
                            <div class="service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-check mr-2 h-4 w-4 text-black">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <span>Face Massage</span>
                            </div>
                        </div>
                        <div class="service-footer mt-3">
                            <a href="/booking" class="w-100">
                                <button class="book-now-btn rounded w-100">Book Now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="/services" class="view-all-btn rounded">
                    View All Services
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Hairstyles Section -->
    <section class="hairstyle-section py-5">
        <div class="container">
            <h2 class="text-center mb-2">Featured Hairstyles</h2>
            <p class="text-center text-muted mb-5">Get inspired by our most popular styles</p>

            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="hairstyle-card h-100">
                        <div class="hairstyle-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z">
                                </path>
                            </svg>
                        </div>
                        <div class="hairstyle-content p-3">
                            <h5 class="hairstyle-name">Modern Fade</h5>
                            <div class="rating text-warning">★★★★★ <span class="text-muted">4.9</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="hairstyle-card h-100">
                        <div class="hairstyle-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z">
                                </path>
                            </svg>
                        </div>
                        <div class="hairstyle-content p-3">
                            <h5 class="hairstyle-name">Classic Pompadour</h5>
                            <div class="rating text-warning">★★★★☆ <span class="text-muted">4.7</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="hairstyle-card h-100">
                        <div class="hairstyle-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z">
                                </path>
                            </svg>
                        </div>
                        <div class="hairstyle-content p-3">
                            <h5 class="hairstyle-name">Textured Crop</h5>
                            <div class="rating text-warning">★★★★★ <span class="text-muted">4.8</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="hairstyle-card h-100">
                        <div class="hairstyle-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z">
                                </path>
                            </svg>
                        </div>
                        <div class="hairstyle-content p-3">
                            <h5 class="hairstyle-name">Slick Back</h5>
                            <div class="rating text-warning">★★★★☆ <span class="text-muted">4.6</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="/hairstyles" class="catalog-btn rounded">
                    Browse Full Catalog
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Ready for a Fresh Look?</h2>
            <p class="cta-subtitle">Book your appointment today and experience the difference.</p>
            <a href="/booking" class="cta-btn rounded">
                Book Now
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg>
            </a>
        </div>
    </section>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
