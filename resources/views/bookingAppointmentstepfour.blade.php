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
            <p class="booking-subtitle">Hello, {{ Auth::user()->name }}! Let's get you booked for your next appointment.
            </p>
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

            <div class="confirmation-booking">
                <div class="select-service">
                    <p class="service-tit">{{ $service->name }}</p>
                    <div class="info">
                        <span class="price">Rp{{ number_format($service->price, 0, ',', '.') }}</span>
                        <span class="duration">🕒 {{ $service->duration }} min</span>
                    </div>
                </div>
            </div>
            <div class="line-table-confirm"></div>

            <div class="booking-container">
                <div class="summary-column">
                    <div class="item">
                        <div class="item-title">Hairstyle</div>
                        <div class="item-value">{{ $hairstyle->name }}</div>
                    </div>
                    <div class="item">
                        <div class="item-title">Date</div>
                        <div class="item-value">{{ date('j F Y', strtotime($booking->booking_date)) }}</div>
                    </div>
                </div>

                <div class="summary-column">
                    <div class="item">
                        <div class="item-title">Barber</div>
                        <div class="item-value">{{ $barber ? $barber->name : 'Any available barber' }}</div>
                    </div>
                    <div class="item">
                        <div class="item-title">Time</div>
                        <div class="item-value">{{ $booking->booking_time }}</div>
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
                        <div class="item-value">{{ Auth::user()->name }}</div>
                    </div>
                    <div class="item">
                        <div class="item-title">Email</div>
                        <div class="item-value">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="summary-column">
                    <div class="item">
                        <div class="item-title">Phone Number</div>
                        <div class="item-value phone-number">{{ Auth::user()->phone ?? 'Not provided' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="notification-booking">
            <p>You will receive a confirmation email with your appointment details.
                You can cancel or reschedule your appointment up to 24 hours before the scheduled time.</p>
        </div>

        <div class="button-hairstyle-container">
            <a href="{{ route('booking.step-three') }}" class="back-button">Back</a>
            <button onclick="showConfirmationModal()" class="next-button">Confirm Booking</button>
        </div>
    </div>

    <!-- Desktop Confirmation Modal -->
    <div id="confirmationModal" class="modal desktop-only">
        <!-- Keep your existing desktop modal content unchanged -->
        <div class="modal-content">
            <div class="confirmation-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M19 3h-1V1h-2v2H8V1H6v2H5C3.9 3 3 3.9 3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V9h14v10zM5 7V5h14v2H5zm2 4h10v2H7v-2zm0 4h7v2H7v-2z" />
                </svg>
            </div>
            <h2 style="text-align: center;">Booking Confirmed!</h2>
            <p style="text-align: center;">Your appointment has been successfully booked</p>

            <div class="confirmation-details">
                <h3>Booking Details</h3>
                <div class="booking-id">Booking ID: BK-{{ str_pad($booking->booking_id, 4, '0', STR_PAD_LEFT) }}</div>

                <div class="booking-detail-row">
                    <div>Service</div>
                    <div>Price</div>
                </div>
                <div class="booking-detail-row">
                    <div><strong>{{ $service->name }}</strong></div>
                    <div><strong>Rp{{ number_format($service->price, 0, ',', '.') }}</strong></div>
                </div>

                <div class="booking-detail-row">
                    <div>Hairstyle</div>
                    <div>Barber</div>
                </div>
                <div class="booking-detail-row">
                    <div><strong>{{ $hairstyle->name }}</strong></div>
                    <div><strong>{{ $barber ? $barber->name : 'Any barber' }}</strong></div>
                </div>

                <div class="booking-detail-row">
                    <div>Date</div>
                    <div>Time</div>
                </div>
                <div class="booking-detail-row">
                    <div><strong>{{ date('j F Y', strtotime($booking->booking_date)) }}</strong></div>
                    <div><strong>{{ $booking->booking_time }}</strong></div>
                </div>

                <div class="customer-details">
                    <h4>Customer Information</h4>
                    <div class="booking-detail-row">
                        <div>Name</div>
                        <div>Phone</div>
                    </div>
                    <div class="booking-detail-row">
                        <div><strong>{{ Auth::user()->name }}</strong></div>
                        <div><strong class="phone-number">{{ Auth::user()->phone ?? 'Not provided' }}</strong></div>
                    </div>

                    <div class="booking-detail-row" style="margin-top: 10px;">
                        <div>Email</div>
                    </div>
                    <div class="booking-detail-row">
                        <div><strong>{{ Auth::user()->email }}</strong></div>
                    </div>
                </div>
            </div>

            <div class="confirmation-message">
                <p>A confirmation has been sent to your email address.</p>
            </div>

            <form id="confirmFormDesktop" action="{{ route('booking.confirm') }}" method="POST">
                @csrf
                <button type="submit" class="modal-button">Confirmation</button>
            </form>
        </div>
    </div>

    <!-- Mobile Confirmation Modal -->
    <div id="confirmationModalMobile" class="modal mobile-only">
        <div class="modal-content mobile-modal-content">
            <div class="confirmation-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M19 3h-1V1h-2v2H8V1H6v2H5C3.9 3 3 3.9 3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V9h14v10zM5 7V5h14v2H5zm2 4h10v2H7v-2zm0 4h7v2H7v-2z" />
                </svg>
            </div>
            <h2 style="text-align: center;">Booking Confirmed!</h2>
            <p style="text-align: center;">Your appointment has been successfully booked</p>

            <div class="booking-id" style="text-align: center; margin-bottom: 15px;">
                Booking ID: BK-{{ str_pad($booking->booking_id, 4, '0', STR_PAD_LEFT) }}
            </div>

            <div class="mobile-booking-details">
                <h3>Booking Details</h3>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Service</div>
                    <div class="mobile-value">{{ $service->name }}</div>
                </div>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Price</div>
                    <div class="mobile-value">Rp{{ number_format($service->price, 0, ',', '.') }}</div>
                </div>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Hairstyle</div>
                    <div class="mobile-value">{{ $hairstyle->name }}</div>
                </div>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Barber</div>
                    <div class="mobile-value">{{ $barber ? $barber->name : 'Any barber' }}</div>
                </div>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Date</div>
                    <div class="mobile-value">{{ date('j F Y', strtotime($booking->booking_date)) }}</div>
                </div>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Time</div>
                    <div class="mobile-value">{{ $booking->booking_time }}</div>
                </div>

                <h4 style="margin-top: 15px;">Customer Information</h4>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Name</div>
                    <div class="mobile-value">{{ Auth::user()->name }}</div>
                </div>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Phone</div>
                    <div class="mobile-value">{{ Auth::user()->phone ?? 'Not provided' }}</div>
                </div>

                <div class="mobile-booking-item">
                    <div class="mobile-label">Email</div>
                    <div class="mobile-value">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="confirmation-message" style="margin-top: 15px; text-align: center;">
                <p>A confirmation has been sent to your email address.</p>
            </div>

            <form id="confirmFormMobile" action="{{ route('booking.confirm') }}" method="POST">
                @csrf
                <button type="submit" class="modal-button" style="width: 100%;">Confirmation</button>
            </form>
        </div>
    </div>

    <x-footer />

    <script>
        function showConfirmationModal() {
            // Check viewport width to determine which modal to show
            if (window.innerWidth < 768) {
                document.getElementById("confirmationModalMobile").style.display = "block";
            } else {
                document.getElementById("confirmationModal").style.display = "block";
            }
        }

        // Close the modals when clicking outside of them
        window.onclick = function(event) {
            const desktopModal = document.getElementById("confirmationModal");
            const mobileModal = document.getElementById("confirmationModalMobile");

            if (event.target == desktopModal) {
                desktopModal.style.display = "none";
            }

            if (event.target == mobileModal) {
                mobileModal.style.display = "none";
            }
        }

        // Handle form submissions for both modals
        document.getElementById('confirmFormDesktop').addEventListener('submit', handleFormSubmission);
        document.getElementById('confirmFormMobile').addEventListener('submit', handleFormSubmission);

        function handleFormSubmission(e) {
            // Change button text to show processing
            const button = this.querySelector('button[type="submit"]');
            button.textContent = 'Processing...';
            button.disabled = true;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
