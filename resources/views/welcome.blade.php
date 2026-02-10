<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Hub - Grow on ONDC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/welcome.css?v=1">
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <div class="nav-container">
                <div class="brand">
                    <i class="fa-solid fa-shop brand-icon"></i>
                    <span class="brand-text">Seller<span class="brand-highlight">Hub</span></span>
                </div>

                <div class="nav-links">
                    <a href="{{route('login')}}" class="nav-link">Login</a>
                    <a href="#" class="nav-link">Cart</a>
                    <a href="{{ route('plans') }}" class="btn-start">Start Selling</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="hero-content">

                <div>
                    <span class="tag-badge">ONDC Ready</span>
                    <h1 class="hero-heading">
                        Sell to millions across <br> <span class="text-blue">India's Network</span>
                    </h1>
                    <p class="hero-description">
                        Join the open network revolution. Connect your store once and become discoverable on Paytm,
                        PhonePe, and huge buyer apps instantly.
                    </p>
                    <div class="features-list">
                        <div class="feature-check">
                            <i class="fa-solid fa-check-circle check-icon"></i>
                            <span>0% Commission</span>
                        </div>
                        <div class="feature-check">
                            <i class="fa-solid fa-check-circle check-icon"></i>
                            <span>Fast Settlements</span>
                        </div>
                    </div>
                </div>

                <div class="how-it-works-col">
                    <h2 class="section-heading">How it Works</h2>

                    <div class="steps-container">
                        <div class="step-card">
                            <div class="step-icon-wrapper">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                            <div class="step-text">
                                <h3 class="step-title">1. Register</h3>
                                <p class="step-desc">Create your account using your GSTIN and bank details. It takes
                                    less than 10 minutes.</p>
                            </div>
                        </div>

                        <div class="step-card">
                            <div class="step-icon-wrapper">
                                <i class="fa-solid fa-box-open"></i>
                            </div>
                            <div class="step-text">
                                <h3 class="step-title">2. List Products</h3>
                                <p class="step-desc">Upload your catalog. Our system automatically formats it for ONDC
                                    standards.</p>
                            </div>
                        </div>

                        <div class="step-card">
                            <div class="step-icon-wrapper">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div class="step-text">
                                <h3 class="step-title">3. Receive Orders</h3>
                                <p class="step-desc">Get orders from multiple apps. Ship them and get paid directly to
                                    your bank.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>

</html>