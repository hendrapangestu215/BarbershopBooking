<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <x-navbar />

    <!-- Success message alert -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="membership-header">
        <div class="container">
            <h1 class="membership-title">Membership</h1>
            <p class="membership-subtitle">Join our membership and get many other benefits!!</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Benefit Card 1 -->
            <div class="col-md-3 mb-4">
                <div class="benefit-card">
                    <h3 class="benefit-title">Special Discount</h3>
                    <div class="benefit-description">
                        <p>Get 10% for a regular haircut.</p>
                        <p>Get 5% for all haircuts in Tuesday - Thursday (18.00-20.00).</p>
                    </div>
                </div>
            </div>

            <!-- Benefit Card 2 -->
            <div class="col-md-3 mb-4">
                <div class="benefit-card">
                    <h3 class="benefit-title">Coupon</h3>
                    <div class="benefit-description">
                        <p>Get a coupon after haircut.</p>
                        <p>Exchange coupons for free product and service.</p>
                    </div>
                </div>
            </div>

            <!-- Benefit Card 3 -->
            <div class="col-md-3 mb-4">
                <div class="benefit-card">
                    <h3 class="benefit-title">Priority Queue</h3>
                    <div class="benefit-description">
                        <p>Get special priority slots of queue compared to normal queues.</p>
                    </div>
                </div>
            </div>

            <!-- Benefit Card 4 -->
            <div class="col-md-3 mb-4">
                <div class="benefit-card">
                    <h3 class="benefit-title">Birthday Gift</h3>
                    <div class="benefit-description">
                        <p>Get special 20% for all services on your birthday.</p>
                        <p>Get a free product with a minimum transaction of Rp 50.000.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="join-btn-container">
            @guest
                <a href="{{ route('login') }}" class="btn join-btn">Login to Join Membership</a>
            @else
                @if (Auth::user()->hasMembership())
                    <button class="btn join-btn already-member" disabled>Already a Member</button>
                @else
                    <button class="btn join-btn" data-bs-toggle="modal" data-bs-target="#joinMembershipModal">Join
                        Membership</button>
                @endif
            @endguest
        </div>
    </div>

    <!-- Membership Confirmation Modal -->
    @auth
        <div class="modal fade" id="joinMembershipModal" tabindex="-1" aria-labelledby="joinMembershipModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="joinMembershipModalLabel">Join Membership</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to join our membership program?</p>
                        <p>You will get access to all our exclusive membership benefits!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form id="joinMembershipForm" method="POST" action="{{ route('membership.join') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Yes, Join Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
