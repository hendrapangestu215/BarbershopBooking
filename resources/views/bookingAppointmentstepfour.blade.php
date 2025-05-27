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
        <div class="line active"></div>
        <div class="step">
            <div class="circle active">2</div>
                <span class="step-by-step">Hairstyle</span>
        </div>
        <div class="line active"></div>
        <div class="step">
            <div class="circle active">3</div>
                <span class="step-by-step">Date & Time</span>
            </div>
        <div class="line active"></div>
        <div class="step">
            <div class="circle active">4</div>
                <span class="step-by-step">Confirm</span>
        </div>
    </div>

    <div class="container-three">
    <div class="selection">
            <h2>Confirm Booking</h2>
            <p>Review and confirm your appointment details</p>
    </div>
`   
    <div class="container-three">
    <div class="confirmation-booking">
     <div class="image-booking"></div>
                <div class="select-service">
                <p class="service-tit">Classic Haircut</p>
            <div class="info">
                <span class="price">$25</span>
                <span class="duration">🕒 30 min</span>
            </div>
        </div>
    </div>
    <div class="line-table-confirm"></div>
        
        <div class="booking-container">
        <div class="summary-column">
            <div class="item">
                <div class="item-title">Hairstyle</div>
                <div class="item-value">Modern Fade</div>
            </div>
            <div class="item">
                <div class="item-title">Date</div>
                <div class="item-value">2 May 2025</div>
            </div>
        </div>

        <div class="summary-column">
            <div class="item">
                <div class="item-title">Barber</div>
                <div class="item-value">Any available barber</div>
            </div>
            <div class="item">
                <div class="item-title">Time</div>
                <div class="item-value">10:00 AM</div>
            </div>
        </div>
    </div>
        <div class="line-table-confirm"></div>
        <div class="customer-info">
            <p>Customer Information</p>
        </div>
        <div class="booking-container">
        <div class="summary-column">
            <div class="item">
                <div class="item-title">Name</div>
                <div class="item-value">Testing</div>
            </div>
            <div class="item">
                <div class="item-title">Email</div>
                <div class="item-value">Testing@gmail.com</div>
            </div>
        </div>

        <div class="summary-column">
            <div class="item">
                <div class="item-title">Phone Number</div>
                <div class="item-value">086526718281</div>
            </div>
        </div>
    </div>
    </div>

    
    <div class="notification-booking">
        <p>You will receive a confirmation email with your appointment details. 
            You can cancel or reschedule your appointment up to 24 hours before the scheduled time.</p>
    </div>

    <div class="button-hairstyle-container">
        <a href="/booking-step-three" class="back-button">Back</a>
        <a href="/booking-step-four" class="next-button">Confirm Booking</a>
    </div>
</div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>