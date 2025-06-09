<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <style>
        .success-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .success-icon {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .success-icon svg {
            width: 70px;
            height: 70px;
            color: #28a745;
        }

        .booking-details {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .booking-id {
            font-weight: 600;
            font-size: 18px;
        }

        .booking-status {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .detail-row {
            display: flex;
            margin-bottom: 15px;
        }

        .detail-label {
            width: 120px;
            font-weight: 500;
            color: #6c757d;
        }

        .detail-value {
            flex: 1;
            font-weight: 600;
        }

        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 20px 0;
        }

        .buttons-container {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }

        .dashboard-btn {
            background-color: #212121;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.2s;
        }

        .dashboard-btn:hover {
            background-color: #333;
            color: white;
        }

        .home-btn {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #212529;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.2s;
        }

        .home-btn:hover {
            background-color: #e9ecef;
            color: #212529;
        }

        @media (max-width: 576px) {
            .success-container {
                margin: 20px 15px;
            }

            .detail-row {
                flex-direction: column;
                margin-bottom: 20px;
            }

            .detail-label {
                width: 100%;
                margin-bottom: 5px;
            }

            .buttons-container {
                flex-direction: column;
            }

            .dashboard-btn,
            .home-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <x-navbar />

    <div class="container">
        <div class="success-container">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <h1 class="text-center">Booking Confirmed!</h1>
            <p class="text-center mb-4">Your appointment has been successfully booked</p>

            <div class="booking-details">
                <div class="booking-header">
                    <div class="booking-id">{{ $booking->booking_id }}</div>
                    <div class="booking-status">Confirmed</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Service</div>
                    <div class="detail-value">{{ $booking->service->name }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Price</div>
                    <div class="detail-value">${{ $booking->service->price }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Hairstyle</div>
                    <div class="detail-value">{{ $booking->hairstyle->name }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Date</div>
                    <div class="detail-value">{{ date('j F Y', strtotime($booking->date)) }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Time</div>
                    <div class="detail-value">{{ $booking->time }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Barber</div>
                    <div class="detail-value">{{ $booking->barber ? $booking->barber->name : 'Any available barber' }}
                    </div>
                </div>

                <div class="divider"></div>

                <div class="detail-row">
                    <div class="detail-label">Customer</div>
                    <div class="detail-value">{{ $booking->user->name }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ $booking->user->email }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Phone</div>
                    <div class="detail-value">{{ $booking->user->phone ?? 'Not provided' }}</div>
                </div>

                @if ($booking->special_requests)
                    <div class="divider"></div>
                    <div class="detail-row">
                        <div class="detail-label">Special Notes</div>
                        <div class="detail-value">{{ $booking->special_requests }}</div>
                    </div>
                @endif
            </div>

            <p class="text-center">A confirmation has been sent to your email address.</p>

            <div class="buttons-container">
                <a href="{{ route('home') }}" class="home-btn">Return to Home</a>
                <a href="{{ route('dashboard') }}" class="dashboard-btn">Go to Dashboard</a>
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
