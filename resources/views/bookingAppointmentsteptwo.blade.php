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
            <h2>Choose Hairstyle</h2>
            <p>Choose your preffered hairstyle</p>
    </div>

     <div class="hairstyles-grid">
            <div class="row">
                <!-- Row 1 -->
                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Modern Fade</h4>
                            <div class="rating">
                                ★★★★★ <span class="text-muted">4.9</span>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Classic Pompadour</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Textured Crop</h4>
                            <div class="rating">
                                ★★★★★ <span class="text-muted">4.8</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Slick Back</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.6</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Man Bun</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Buzz Cut</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.4</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Side Part</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Long Layers</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.6</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Crew Cut</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 4 -->
                 <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Quiff</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.8</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">Dreadlocks</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hairstyles-item">
                    <div class="card-hairstyle">
                        <div class="hairstyles-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                        <div class="hairstyles-content">
                            <h4 class="hairstyles-name">French Crop</h4>
                            <div class="rating">
                                ★★★★☆ <span class="text-muted">4.6</span>
                            </div>
                        </div>
                    </div>
                </div>

</div>

    <div class="button-hairstyle-container">
        <a href="/booking" class="back-button">Back</a>
        <a href="/booking-step-three" class="next-button">Next</a>
    </div>
</div>
</div>
        

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>