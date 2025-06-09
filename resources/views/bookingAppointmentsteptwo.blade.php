<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Appointment Step Two</title>
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

        <form id="hairstyle-form" action="{{ route('booking.store-step-two') }}" method="POST">
            @csrf
            <div class="container-three">
                <div class="selection">
                    <h2>Choose Hairstyle</h2>
                    <p>Choose your preferred hairstyle</p>
                </div>

                <div class="hairstyles-grid">
                    <div class="row">
                        @foreach ($hairstyles as $hairstyle)
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 hairstyles-item">
                                <div class="card-hairstyle" onclick="selectHairstyle('{{ $hairstyle->id }}')">
                                    <div class="check-mark" id="check-{{ $hairstyle->id }}" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                        </svg>
                                    </div>
                                    <div class="hairstyles-image">
                                        @if ($hairstyle->image)
                                            <img src="{{ asset('storage/' . $hairstyle->image) }}"
                                                alt="{{ $hairstyle->name }}" class="w-100 h-100 object-cover">
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                fill="#adb5bd" class="bi bi-image" viewBox="0 0 16 16">
                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                <path
                                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="hairstyles-content">
                                        <h4 class="hairstyles-name text-center">{{ $hairstyle->name }}</h4>
                                        <div class="rating text-center">
                                            @for ($i = 0; $i < floor($hairstyle->rating); $i++)
                                                ★
                                            @endfor
                                            @if ($hairstyle->rating - floor($hairstyle->rating) > 0)
                                                ☆
                                            @endif
                                            <span class="text-muted">{{ number_format($hairstyle->rating, 1) }}</span>
                                        </div>
                                        @if (isset($hairstyle->description))
                                            <p class="hairstyle-description text-center">
                                                {{ \Illuminate\Support\Str::limit($hairstyle->description, 80) }}</p>
                                        @endif
                                    </div>
                                    <input type="radio" name="hairstyle_id" value="{{ $hairstyle->id }}"
                                        id="hairstyle-{{ $hairstyle->id }}" class="hairstyle-radio"
                                        style="display: none;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="button-hairstyle-container">
                    <a href="{{ route('booking.index') }}" class="back-button">Back</a>
                    <button type="submit" class="next-button">Next</button>
                </div>
            </div>
        </form>

        <x-footer />

        <script>
            function selectHairstyle(hairstyleId) {
                // Remove active class from all hairstyles
                document.querySelectorAll('.card-hairstyle').forEach(card => {
                    card.classList.remove('active');
                });

                // Hide all checkmarks
                document.querySelectorAll('.check-mark').forEach(check => {
                    check.style.display = 'none';
                });

                // Add active class to selected hairstyle
                const selectedCard = document.querySelector(`#hairstyle-${hairstyleId}`).closest('.card-hairstyle');
                selectedCard.classList.add('active');

                // Show checkmark
                document.querySelector(`#check-${hairstyleId}`).style.display = 'flex';

                // Check the radio button
                document.querySelector(`#hairstyle-${hairstyleId}`).checked = true;
            }

            // Check if there's a previously selected hairstyle
            document.addEventListener('DOMContentLoaded', function() {
                const selectedHairstyle = "{{ session('booking.hairstyle_id') ?? '' }}";
                if (selectedHairstyle) {
                    selectHairstyle(selectedHairstyle);
                }
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
            crossorigin="anonymous"></script>
    </div>
</body>

</html>
