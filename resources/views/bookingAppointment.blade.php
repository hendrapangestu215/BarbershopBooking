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

        <form id="booking-form" action="{{ route('booking.store-step-one') }}" method="POST">
            @csrf
            <div class="container-three">
                <div class="selection">
                    <h2>Select Service</h2>
                    <p>Select the service you'd like to book</p>
                </div>
                <div class="list-services row">
                    @foreach ($services as $service)
                        <div class="col-12 col-md-6 mb-3">
                            <div class="card-booking" onclick="selectService('{{ $service->id }}')">
                                <div class="select-service">
                                    <p class="service-tit">{{ $service->name }}</p>
                                    <p class="service-desc">{{ $service->description }}</p>
                                    <div class="info">
                                        <span class="price">${{ $service->price }}</span>
                                        <span class="duration">🕒 {{ $service->duration }} min</span>
                                    </div>
                                </div>
                                <input type="radio" name="service_id" value="{{ $service->id }}"
                                    id="service-{{ $service->id }}" class="service-radio" style="display: none;">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="barber-section">
                    <h3>Barber (Optional)</h3>
                    <div class="barber-options">
                        @foreach ($barbers as $barber)
                            <div class="barber-option">
                                <input type="radio" name="barber_id" id="barber-{{ $barber->id }}"
                                    value="{{ $barber->id }}">
                                <label for="barber-{{ $barber->id }}">{{ $barber->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <p class="barber-helper">Leave unselected if you don't have a preference</p>
                </div>

                <div class="button-container">
                    <button type="submit" class="next-button">Next</button>
                </div>
            </div>
        </form>

        <x-footer />

        <script>
            function selectService(serviceId) {
                // Remove active class from all services
                document.querySelectorAll('.card-booking').forEach(card => {
                    card.classList.remove('active');
                });

                // Add active class to selected service
                const selectedCard = document.querySelector(`#service-${serviceId}`).closest('.card-booking');
                selectedCard.classList.add('active');

                // Check the radio button
                document.querySelector(`#service-${serviceId}`).checked = true;
            }

            // Check if there's a previously selected service
            document.addEventListener('DOMContentLoaded', function() {
                const selectedService = "{{ session('booking.service_id') ?? '' }}";
                if (selectedService) {
                    selectService(selectedService);
                }

                // Check if there's a previously selected barber
                const selectedBarber = "{{ session('booking.barber_id') ?? '' }}";
                if (selectedBarber) {
                    document.querySelector(`#barber-${selectedBarber}`).checked = true;
                }
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
            crossorigin="anonymous"></script>
    </div>
</body>

</html>
