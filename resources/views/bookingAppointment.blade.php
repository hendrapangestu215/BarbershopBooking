<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <x-navbar />

    <div class="booking-header">
        <div class="container">
            <h1 class="booking-title">Book Your Appointment</h1>
            <p class="booking-subtitle">Hello, Testing! Let’s get you booked for your next appointment.</p>
        </div>
    </div>
    
    <div class="container">
    <div class="steps">
        <div class="step">
            <div class="circle active">1</div>
                <span class="step-by-step">Service</span>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">2</div>
                <span class="step-by-step">Hairstyle</span>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">3</div>
                <span class="step-by-step">Date & Time</span>
            </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle">4</div>
                <span class="step-by-step">Confirm</span>
        </div>
    </div>

        <div class="container-three">
        <div class="selection">
            <h2>Select Service</h2>
            <p>Select the service you’d like to book</p>
        </div>
    <div class="list-services">
        <div class="card-booking">
            <div class="image-booking"></div>
                <div class="select-service">
                <p class="service-tit">Classic Haircut</p>
                <p class="service-desc">Traditional haircut with clippers and scissors</p>
            <div class="info">
                <span class="price">$25</span>
                <span class="duration">🕒 30 min</span>
            </div>
            </div>
            </div>

        <div class="card-booking">
            <div class="image-booking"></div>
            <div class="select-service">
                <p class="service-tit">Beard Trim</p>
                <p class="service-desc">Shape and trim your beard to perfection</p>
            <div class="info">
                <span class="price">$15</span>
                <span class="duration">🕒 20 min</span>
            </div>
        </div>
        </div>

        <div class="card-booking">
            <div class="image-booking"></div>
            <div class="select-service">
                <p class="service-tit">Premium Package</p>
                <p class="service-desc">Complete grooming experience with haircut and beard trim</p>
            <div class="info">
                <span class="price">$45</span>
                <span class="duration">🕒 60 min</span>
            </div>
        </div>
        </div>

        <div class="card-booking">
            <div class="image-booking"></div>
            <div class="select-service">
                <p class="service-tit">Kids Haircut</p>
                <p class="service-desc">Haircut for children under 12 year old</p>
            <div class="info">
                <span class="price">$20</span>
                <span class="duration">🕒 25 min</span>
            </div>  
            </div>
            </div>
        
        <div class="card-booking">
            <div class="image-booking"></div>
            <div class="select-service">
                <p class="service-tit">Hot Towel Shave</p>
                <p class="service-desc">Traditional straight razor shave with hot towel</p>
            <div class="info">
                <span class="price">$30</span>
                <span class="duration">🕒 30 min</span>
            </div>
            </div>
            </div>

        <div class="card-booking">
            <div class="image-booking"></div>
            <div class="select-service">
                <p class="service-tit">Hair Coloring</p>
                <p class="service-desc">Professional hair coloring service</p>
            <div class="info">
                <span class="price">$60</span>
                <span class="duration">🕒 90 min</span>
            </div>
            </div>
            </div>
</div>

        <div class="button-container">
        <a href="/booking-step-two" class="next-button">Next</a>
</div>
</div>
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
