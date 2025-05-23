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
            <a href="/login" class="btn join-btn">Join Membership</a>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
