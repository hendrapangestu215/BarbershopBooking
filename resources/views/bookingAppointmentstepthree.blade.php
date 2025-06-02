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
        <div class="line"></div>
        <div class="step">
            <div class="circle">4</div>
                <span class="step-by-step">Confirm</span>
        </div>
    </div>

    <div class="container-three">
    <div class="selection">
            <h2>Choose Date & Time</h2>
            <p>Pick your preferred date and time</p>
    </div>

    <div class="container-date-section">
         <div class="date-section">
            <div class="date-title">Date</div>
            <div class="custom-date-input">
            <input type="date" id="datePicker" />
             <span class="placeholder-text" id="placeholderText">Select a date</span>
    </div>
</div>

    <div class="time-section">
      <label>Time</label>
      <div class="time-cards">
        <div class="time-card">09:00 AM</div>
        <div class="time-card">09:30 AM</div>
        <div class="time-card">10:00 AM</div>
        <div class="time-card">10:30 AM</div>
        <div class="time-card">11:00 AM</div>
        <div class="time-card">11:30 AM</div>
        <div class="time-card">12:00 PM</div>
        <div class="time-card">12:30 PM</div>
        <div class="time-card">13:00 PM</div>
        <div class="time-card">13:30 PM</div>
        <div class="time-card">14:00 PM</div>
        <div class="time-card">14:30 PM</div>
        <div class="time-card">15:00 PM</div>
        <div class="time-card">15:30 PM</div>
        <div class="time-card">16:00 PM</div>
        <div class="time-card">16:30 PM</div>
        <div class="time-card">17:00 PM</div>
      </div>
    </div>
</div>

    <div class="notice-requests">
        <label for="notes">Special Requests (optional):</label>
        <textarea id="notes" placeholder="Any special requests or notes for your barber"></textarea>
    </div>

    <div class="button-hairstyle-container">
        <a href="/booking-step-two" class="back-button">Back</a>
        <a href="/booking-step-four" class="next-button">Next</a>
    </div>


    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>