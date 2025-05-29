<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hairstyle Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <x-navbar />

    <div class="catalog-header">
        <div class="container">
            <h1 class="catalog-title">Hairstyle Catalog</h1>
            <p class="catalog-subtitle">Browse our collection of popular hairstyles for inspiration</p>
        </div>
    </div>

    <div class="container">
        <div class="hairstyles-grid">
            <div class="row">
                @foreach ($hairstyles as $hairstyle)
                    <div class="col-md-3 hairstyles-item">
                        <div class="card hairstyles-card">
                            <div class="hairstyles-image">
                                @if ($hairstyle->image)
                                    <img src="{{ asset('storage/' . $hairstyle->image) }}" alt="{{ $hairstyle->name }}"
                                        class="w-100 h-100 object-cover">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adb5bd"
                                        class="bi bi-image" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="hairstyles-content">
                                <h4 class="hairstyles-name">{{ $hairstyle->name }}</h4>
                                <div class="rating">
                                    @php
                                        $fullStars = floor($hairstyle->rating);
                                        $hasHalfStar = $hairstyle->rating - $fullStars >= 0.5;
                                        $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                                    @endphp

                                    @for ($i = 0; $i < $fullStars; $i++)
                                        ★
                                    @endfor

                                    @if ($hasHalfStar)
                                        ☆
                                    @endif

                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        ☆
                                    @endfor

                                    <span class="text-muted">{{ $hairstyle->rating }}</span>
                                </div>

                                @if (isset($hairstyle->description))
                                    <p class="hairstyle-description">
                                        {{ \Illuminate\Support\Str::limit($hairstyle->description, 80) }}</p>
                                @endif

                                <a href="/booking">
                                    <button class="book-style-btn">Book This Style</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
