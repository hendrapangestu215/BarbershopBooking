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
            <p class="booking-subtitle">Hello, {{ Auth::check() ? Auth::user()->name : 'Guest' }}! Let's get you booked
                for your next appointment.</p>
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

        <form id="date-time-form" action="{{ route('booking.store-step-three') }}" method="POST">
            @csrf
            <div class="container-three">
                <div class="selection">
                    <h2>Choose Date & Time</h2>
                    <p>Pick your preferred date and time</p>
                </div>

                <div class="container-date-section">
                    <div class="date-section">
                        <div class="date-title">Date</div>
                        <div class="custom-date-input">
                            <input type="date" id="datePicker" name="booking_date" min="{{ date('Y-m-d') }}"
                                value="{{ session('booking.booking_date') ?? '' }}" required />
                        </div>
                    </div>

                    <div class="time-section">
                        <label>Time</label>
                        <div class="time-cards">
                            @foreach (['9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM'] as $time)
                                <div class="time-card" onclick="selectTime('{{ $time }}')">{{ $time }}
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="booking_time" id="booking_time"
                            value="{{ session('booking.booking_time') ?? '' }}" required />
                    </div>
                </div>

                <div class="notice-requests">
                    <label for="notes">Special Requests (Optional)</label>
                    <textarea id="notes" name="special_requests" placeholder="Any special requests or notes for your barber">{{ session('booking.special_requests') ?? '' }}</textarea>
                </div>

                <div class="button-hairstyle-container">
                    <a href="{{ route('booking.step-two') }}" class="back-button">Back</a>
                    <button type="submit" class="next-button">Next</button>
                </div>
            </div>
        </form>

        <x-footer />

        <script>
            function selectTime(time) {
                // Remove active class from all time cards
                document.querySelectorAll('.time-card').forEach(card => {
                    card.classList.remove('active');
                });

                // Add active class to selected time
                const selectedTimeCards = document.querySelectorAll('.time-card');
                for (let i = 0; i < selectedTimeCards.length; i++) {
                    if (selectedTimeCards[i].textContent.trim() === time) {
                        selectedTimeCards[i].classList.add('active');
                        break;
                    }
                }

                // Set hidden input value
                document.getElementById('booking_time').value = time;
            }

            // Check if there's a previously selected date and time
            document.addEventListener('DOMContentLoaded', function() {
                const selectedDate = "{{ session('booking.booking_date') ?? '' }}";
                if (selectedDate) {
                    document.getElementById('datePicker').value = selectedDate;
                }

                const selectedTime = "{{ session('booking.booking_time') ?? '' }}";
                if (selectedTime) {
                    selectTime(selectedTime);
                }
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
            crossorigin="anonymous"></script>
    </div>
</body>

</html>
