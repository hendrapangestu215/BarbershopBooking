<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <x-navbar />

    <div class="services-header">
        <div class="container">
            <h1 class="services-title">Our Services</h1>
            <p class="services-subtitle">We offer a wide range of premium barbering services to meet your needs</p>
        </div>
    </div>

    <div class="services-main">
        <div class="container">
            <div class="row">
                @forelse($services as $service)
                    <div class="col-md-4">
                        <div class="service-container">
                            <div class="service-content">
                                <h2 class="service-name">{{ $service->name }}</h2>
                                <p class="service-description">{{ $service->description }}</p>
                                <div class="service-price">Rp{{ number_format($service->price, 0, ',', '.') }}</div>
                                <div class="service-duration">{{ $service->duration }} minutes</div>

                                <div class="service-features">
                                    @if (is_array($service->featured) && count($service->featured) > 0)
                                        @foreach ($service->featured as $feature)
                                            <div class="service-feature">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M20 6 9 17l-5-5"></path>
                                                </svg>
                                                <span>{{ $feature }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="service-feature">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20 6 9 17l-5-5"></path>
                                            </svg>
                                            <span>Basic service</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="service-footer">
                                <a href="/booking" class="w-100 d-block">
                                    <button class="book-now-btn rounded">Book Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p>No services available at the moment. Please check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
