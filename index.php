<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVE HOME SERVICE - Appliance Repair in Chennai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <meta name="description" content="Live Home Service offers reliable Washing Machine, AC, and Fridge repair services across Chennai. Book your service today with expert technicians.">
    <meta name="keywords" content="washing machine service Chennai, AC repair Chennai, fridge repair Chennai, home appliance repair Chennai">
    <meta name="author" content="LIVE HOME SERVICE">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="LIVE HOME SERVICE | Washing Machine, AC & Fridge Repair in Chennai">
    <meta property="og:description" content="Expert Washing Machine, AC, and Fridge repair services in Chennai. Trusted home appliance repair at your doorstep.">
    <meta property="og:image" content="https://www.livehomeservice.in/assets/og-image.jpg">
    <meta property="og:url" content="https://www.livehomeservice.in">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="LIVE HOME SERVICE | Appliance Repair in Chennai">
    <meta name="twitter:description" content="Expert Washing Machine, AC, and Fridge repair services in Chennai. Book now for trusted technicians.">
    <meta name="twitter:image" content="https://www.livehomeservice.in/assets/og-image.jpg">

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/logo.png" type="image/x-icon">

    <!-- Schema.org Structured Data (Local Business) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "HomeAndConstructionBusiness",
            "name": "LIVE HOME SERVICE",
            "image": "https://www.livehomeservice.in/assets/og-image.jpg",
            "@id": "https://www.livehomeservice.in",
            "url": "https://www.livehomeservice.in",
            "telephone": "+91-9876543210",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "No. 123, Anna Nagar",
                "addressLocality": "Chennai",
                "addressRegion": "TN",
                "postalCode": "600040",
                "addressCountry": "IN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "13.0827",
                "longitude": "80.2707"
            },
            "openingHoursSpecification": [{
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
                ],
                "opens": "09:00",
                "closes": "21:00"
            }],
            "sameAs": [
                "https://www.facebook.com/livehomeservice",
                "https://www.instagram.com/livehomeservice"
            ]
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Review Modal Logic
            var addReviewBtn = document.getElementById('addReviewBtn');
            var reviewModal = document.getElementById('reviewModal');
            var closeReviewModal = document.getElementById('closeReviewModal');
            var reviewForm = document.getElementById('reviewForm');
            var reviewMessage = document.getElementById('reviewMessage');
            if (addReviewBtn && reviewModal) {
                addReviewBtn.addEventListener('click', function() {
                    reviewModal.classList.remove('hidden');
                });
            }
            if (closeReviewModal && reviewModal) {
                closeReviewModal.addEventListener('click', function() {
                    reviewModal.classList.add('hidden');
                    reviewMessage.textContent = '';
                    reviewForm.reset();
                });
            }
            if (reviewForm) {
                reviewForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Simple validation
                    var name = reviewForm.name.value.trim();
                    var location = reviewForm.location.value.trim();
                    var rating = reviewForm.rating.value;
                    var feedback = reviewForm.feedback.value.trim();
                    if (!name || !location || !rating || !feedback) {
                        reviewMessage.textContent = 'Please fill in all fields.';
                        reviewMessage.classList.remove('text-green-600');
                        reviewMessage.classList.add('text-red-600');
                        return;
                    }
                    // Show loading
                    var submitBtn = reviewForm.querySelector('button[type="submit"]');
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Submitting...';
                    reviewMessage.textContent = '';
                    var formData = new FormData(reviewForm);
                    fetch('wp-admin/backend/submit_review.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(function(response) {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(function(data) {
                            if (data.success) {
                                reviewMessage.textContent = data.message;
                                reviewMessage.classList.remove('text-red-600');
                                reviewMessage.classList.add('text-green-600');
                                reviewForm.reset();
                            } else {
                                reviewMessage.textContent = data.message;
                                reviewMessage.classList.remove('text-green-600');
                                reviewMessage.classList.add('text-red-600');
                            }
                        })
                        .catch(function(error) {
                            reviewMessage.textContent = 'An error occurred. Please try again.';
                            reviewMessage.classList.remove('text-green-600');
                            reviewMessage.classList.add('text-red-600');
                        })
                        .finally(function() {
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'Submit Review';
                        });
                });
            }
        });
        // Enhanced Contact form AJAX submission with validation and loading indicator
        document.addEventListener('DOMContentLoaded', function() {
            var contactForm = document.getElementById('contactForm');
            var msgDiv = document.getElementById('formMessage');
            var submitBtn = contactForm ? contactForm.querySelector('button[type="submit"]') : null;
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Simple client-side validation
                    var name = contactForm.name.value.trim();
                    var phone = contactForm.phone.value.trim();
                    var appliance = contactForm.appliance.value;
                    var issue = contactForm.issue.value.trim();
                    if (!name || !phone || !appliance || !issue) {
                        msgDiv.textContent = 'Please fill in all fields.';
                        msgDiv.classList.remove('text-green-600');
                        msgDiv.classList.add('text-red-600');
                        return;
                    }
                    // Show loading indicator
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Submitting...';
                    msgDiv.textContent = '';
                    var formData = new FormData(contactForm);
                    fetch('wp-admin/backend/submit_contact.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(function(response) {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(function(data) {
                            if (data.success) {
                                msgDiv.textContent = data.message;
                                msgDiv.classList.remove('text-red-600');
                                msgDiv.classList.add('text-green-600');
                                contactForm.reset();
                            } else {
                                msgDiv.textContent = data.message;
                                msgDiv.classList.remove('text-green-600');
                                msgDiv.classList.add('text-red-600');
                            }
                        })
                        .catch(function(error) {
                            msgDiv.textContent = 'An error occurred. Please try again.';
                            msgDiv.classList.remove('text-green-600');
                            msgDiv.classList.add('text-red-600');
                        })
                        .finally(function() {
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'Request Service Call';
                        });
                });
            }
        });
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2ECC71',
                        secondary: '#27AE60',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
        }

        .testimonial-carousel {
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
        }

        .testimonial-card {
            scroll-snap-align: start;
        }
    </style>
</head>

<body class="font-poppins bg-gray-50">

    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center mr-3">
                    <img src="./assets/img/icon.png" alt="" width="30">
                </div>
                <h1 class="text-xl font-bold text-gray-800">LIVE HOME SERVICE</h1>
            </div>

            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="#home" class="text-gray-700 hover:text-primary transition">Home</a></li>
                    <li><a href="#services" class="text-gray-700 hover:text-primary transition">Services</a></li>
                    <li><a href="#areas" class="text-gray-700 hover:text-primary transition">Areas</a></li>
                    <li><a href="#contact" class="text-gray-700 hover:text-primary transition">Contact</a></li>
                </ul>
        </div>
        </div>
        </section>

        <!-- Footer -->

        </div>

        <button class="md:hidden text-gray-700" id="mobile-menu-button">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        </div>


        <div class="md:hidden hidden bg-white   shadow-lg" id="mobile-menu">
            <div class="container mx-auto px-4 py-3">
                <ul class="flex flex-col space-y-3">
                    <li><a href="#home" class="block py-2 text-gray-700 hover:text-primary transition">Home</a></li>
                    <li><a href="#services" class="block py-2 text-gray-700 hover:text-primary transition">Services</a></li>
                    <li><a href="#areas" class="block py-2 text-gray-700 hover:text-primary transition">Areas</a></li>
                    <li><a href="#contact" class="block py-2 text-gray-700 hover:text-primary transition">Contact</a></li>
                    <li>
                        <a href="tel:+919876543210" class="block bg-primary hover:bg-secondary text-white px-6 py-2 rounded-full font-medium text-center transition shadow-md">
                            <i class="fas fa-phone-alt mr-2"></i> Call Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>


    <section id="home" class="hero-image h-screen text-white py-20 md:py-32">
        <div class="container mx-auto px-4 text-center flex justify-center items-center flex-col h-full">
            <h1 class="text-3xl md:text-5xl font-bold mb-4">Fast & Reliable Appliance Repair in Chennai</h1>
            <p class="text-lg md:text-xl mb-8">Washing Machine • Air Conditioner • Fridge Service at Your Doorstep</p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="tel:+919876543210" class="bg-primary hover:bg-secondary text-white px-8 py-3 rounded-full font-medium transition shadow-lg">
                    <i class="fas fa-phone-alt mr-2"></i> Call Now
                </a>
                <a href="#contact" class="border-2 border-white hover:bg-white hover:text-gray-800 text-white px-8 py-3 rounded-full font-medium transition shadow-lg">
                    <i class="fas fa-calendar-alt mr-2"></i> Book Service
                </a>
            </div>
        </div>
    </section>


    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                        alt="Technician at work" class="rounded-2xl shadow-xl w-full">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Trusted Local Service Since 2012</h2>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        LIVE HOME SERVICE, led by KS Manikandan, provides doorstep repairs for washing machines, ACs, and fridges in Chennai.
                        With over a decade of experience, we offer quick response, genuine parts, and affordable service with a satisfaction guarantee.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                        <div class="bg-gray-50 p-4 rounded-xl text-center">
                            <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-bolt text-primary text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Same-Day Service</h4>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl text-center">
                            <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-rupee-sign text-primary text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Affordable Pricing</h4>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl text-center">
                            <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-cog text-primary text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Genuine Spare Parts</h4>
                        </div>
                    </div>

                    <a href="#contact" class="inline-block bg-primary hover:bg-secondary text-white px-6 py-3 rounded-full font-medium transition shadow-md">
                        <i class="fas fa-envelope mr-2"></i> Get a Free Quote
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Our Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Professional repair services for all major home appliances</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform hover:scale-105">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-washing-machine text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Washing Machine Repair</h3>
                        <p class="text-gray-600 mb-4">
                            Expert repair for all washing machine brands including LG, Samsung, IFB, Whirlpool. We fix drainage issues, spin problems, leaks, and more.
                        </p>
                        <a href="#contact" class="inline-block text-primary font-medium hover:text-secondary transition">
                            Book Now <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>


                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform hover:scale-105">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-wind text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">AC Service & Repair</h3>
                        <p class="text-gray-600 mb-4">
                            Complete AC services including gas filling, compressor repair, cooling issues, thermostat problems for all brands like Voltas, Daikin, Blue Star.
                        </p>
                        <a href="#contact" class="inline-block text-primary font-medium hover:text-secondary transition">
                            Book Now <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>


                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform hover:scale-105">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-refrigerator text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Refrigerator Repair</h3>
                        <p class="text-gray-600 mb-4">
                            Professional fridge repair services for cooling problems, thermostat issues, compressor repair, and gas leakage for all refrigerator brands.
                        </p>
                        <a href="#contact" class="inline-block text-primary font-medium hover:text-secondary transition">
                            Book Now <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Why Choose Us</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We go the extra mile to ensure your appliances work perfectly</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-rocket text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Fast Response</h3>
                    <p class="text-gray-600">Same-day service with quick response time</p>
                </div>

                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-shield text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Trusted Technician</h3>
                    <p class="text-gray-600">Certified professionals with 10+ years experience</p>
                </div>

                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tag text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Transparent Pricing</h3>
                    <p class="text-gray-600">No hidden charges, upfront pricing</p>
                </div>

                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Local Chennai Expert</h3>
                    <p class="text-gray-600">Serving Chennai for over a decade</p>
                </div>
            </div>
        </div>
    </section>


    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">How It Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Simple 3-step process to get your appliances fixed</p>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-8">

                <div class="text-center flex-1">
                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl font-bold">1</span>
                    </div>
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Call or Book Online</h3>
                    <p class="text-gray-600">Contact us via phone or our online booking form</p>
                </div>


                <div class="hidden md:block">
                    <i class="fas fa-arrow-right text-gray-400 text-2xl"></i>
                </div>


                <div class="text-center flex-1">
                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl font-bold">2</span>
                    </div>
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-cog text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Technician Arrives</h3>
                    <p class="text-gray-600">Our expert visits your home for diagnosis</p>
                </div>


                <div class="hidden md:block">
                    <i class="fas fa-arrow-right text-gray-400 text-2xl"></i>
                </div>


                <div class="text-center flex-1">
                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl font-bold">3</span>
                    </div>
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check-circle text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Service Completed</h3>
                    <p class="text-gray-600">Repair done with warranty provided</p>
                </div>
            </div>
        </div>
    </section>


    <section id="areas" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Areas We Cover</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Serving all major localities in Chennai</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">
                <div class="lg:w-1/2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0088888050006!2d80.15488931534622!3d13.0989629907559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5263d5d3d7e3e9%3A0x83a4a29e2a2f9a5e!2sAmbattur%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1623935400000!5m2!1sen!2sin"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        class="rounded-xl shadow-md"></iframe>
                </div>

                <div class="lg:w-1/2">
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Our Service Areas</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Ambattur (600053)</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Avadi (600054)</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Anna Nagar (600040)</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Kolathur (600099)</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Puzhal (600066)</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Thirumullaivoyal (600062)</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Pattaravakkam (600072)</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                                <span>Korattur (600076)</span>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-primary bg-opacity-10 rounded-lg border-l-4 border-primary">
                            <p class="text-gray-700">
                                <i class="fas fa-info-circle text-primary mr-2"></i>
                                We cover most areas in North and West Chennai. Call us to confirm service availability in your locality.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">What Our Customers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Hear from satisfied customers across Chennai</p>
            </div>

            <div class="relative">
                <div class="testimonial-carousel flex overflow-x-auto gap-6 pb-6 scrollbar-hide" id="testimonial-carousel">
                    <?php
                    // Fetch reviews from database
                    require_once 'wp-admin/backend/db.php';
                    $reviews = $conn->query("SELECT name, location, rating, feedback FROM testimonials ORDER BY id DESC LIMIT 10");
                    if ($reviews && $reviews->num_rows > 0) {
                        while ($row = $reviews->fetch_assoc()) {
                            $stars = intval($row['rating']);
                            echo '<div class="testimonial-card flex-shrink-0 w-full sm:w-2/3 md:w-1/3 bg-white p-6 rounded-xl shadow-sm">';
                            echo '<div class="flex items-center mb-4">';
                            echo '<div class="w-12 h-12 rounded-full bg-primary bg-opacity-10 flex items-center justify-center mr-4">';
                            echo '<i class="fas fa-user text-primary"></i>';
                            echo '</div>';
                            echo '<div>';
                            echo '<h4 class="font-bold text-gray-800">' . htmlspecialchars($row['name']) . '</h4>';
                            echo '<p class="text-gray-500 text-sm">' . htmlspecialchars($row['location']) . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="flex mb-2 text-yellow-400">';
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $stars) {
                                    echo '<i class="fas fa-star"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            echo '</div>';
                            echo '<p class="text-gray-600">' . htmlspecialchars($row['feedback']) . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="testimonial-card flex-shrink-0 w-full sm:w-2/3 md:w-1/3 bg-white p-6 rounded-xl shadow-sm text-center">No reviews yet. Be the first to add one!</div>';
                    }
                    ?>


                </div>

                <button class="hidden md:block absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white p-2 rounded-full shadow-md text-primary hover:bg-primary hover:text-white transition" id="prev-testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white p-2 rounded-full shadow-md text-primary hover:bg-primary hover:text-white transition" id="next-testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div class="flex justify-center items-center mt-10">
                <button id="addReviewBtn" class="px-10 py-3 bg-gradient-to-r from-green-500 to-green-200 border-2 border-green-800  rounded text-green-800 uppercase">
                    Add Review
                </button>
            </div>
            <!-- Review Modal -->
            <div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-xl p-8 w-full max-w-md relative">
                    <button id="closeReviewModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
                    <h3 class="text-2xl font-bold mb-6 text-center text-green-800">Add Your Review</h3>
                    <form id="reviewForm">
                        <div class="mb-4">
                            <label for="reviewName" class="block mb-2 font-medium">Name</label>
                            <input type="text" id="reviewName" name="name" class="w-full px-4 py-2 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="reviewLocation" class="block mb-2 font-medium">Location</label>
                            <input type="text" id="reviewLocation" name="location" class="w-full px-4 py-2 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="reviewRating" class="block mb-2 font-medium">Rating</label>
                            <select id="reviewRating" name="rating" class="w-full px-4 py-2 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="" disabled selected>Select rating</option>
                                <option value="5">★★★★★</option>
                                <option value="4">★★★★</option>
                                <option value="3">★★★</option>
                                <option value="2">★★</option>
                                <option value="1">★</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="reviewFeedback" class="block mb-2 font-medium">Feedback</label>
                            <textarea id="reviewFeedback" name="feedback" rows="4" class="w-full px-4 py-2 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition shadow-md">Submit Review</button>
                        <div id="reviewMessage" class="mt-4 text-center font-semibold"></div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </section>


    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Frequently Asked Questions</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Find answers to common questions about our services</p>
            </div>

            <div class="max-w-3xl mx-auto">

                <div class="mb-4 border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium text-gray-800 hover:text-primary transition" onclick="toggleFAQ(1)">
                        <span>Do you provide same-day service?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="accordion-content mt-2 text-gray-600" id="faq-content-1">
                        Yes, we offer same-day service for most repairs. If you call before 2 PM, we can usually schedule a technician visit the same day, depending on availability in your area.
                    </div>
                </div>


                <div class="mb-4 border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium text-gray-800 hover:text-primary transition" onclick="toggleFAQ(2)">
                        <span>Do you cover Avadi & Tiruvallur areas?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="accordion-content mt-2 text-gray-600" id="faq-content-2">
                        Yes, we cover Avadi and most parts of Tiruvallur. Please call us with your exact location to confirm service availability in your specific area.
                    </div>
                </div>


                <div class="mb-4 border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium text-gray-800 hover:text-primary transition" onclick="toggleFAQ(3)">
                        <span>Do you use original spare parts?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="accordion-content mt-2 text-gray-600" id="faq-content-3">
                        Yes, we use genuine OEM parts whenever possible. All parts come with warranty. We'll inform you before using any alternative parts and explain the reasons why.
                    </div>
                </div>


                <div class="mb-4 border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium text-gray-800 hover:text-primary transition" onclick="toggleFAQ(4)">
                        <span>What are your service charges?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="accordion-content mt-2 text-gray-600" id="faq-content-4">
                        Our service charges vary depending on the appliance and issue. We charge a nominal diagnostic fee which is waived if you proceed with the repair. We provide transparent pricing before starting any work.
                    </div>
                </div>


                <div class="mb-4 border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium text-gray-800 hover:text-primary transition" onclick="toggleFAQ(5)">
                        <span>What are your working hours?</span>
                        <i class="fas fa-plus text-primary"></i>
                    </button>
                    <div class="accordion-content mt-2 text-gray-600" id="faq-content-5">
                        We're open from 9 AM to 9 PM, 7 days a week including Sundays and public holidays. Emergency services may be available outside these hours with prior arrangement.
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="py-16 bg-gradient-to-r from-green-500 to-green-800 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-3">Contact Us</h2>
                <p class="max-w-2xl mx-auto opacity-90">Get in touch for fast appliance repair service in Chennai</p>
            </div>
            <div class="flex flex-col lg:flex-row gap-10">
                <!-- Contact Form -->
                <div class="lg:w-1/2">
                    <form class="bg-white bg-opacity-10 backdrop-blur-sm p-6 rounded-xl" id="contactForm">
                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-medium">Your Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg bg-green-800 border border-white border-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 placeholder-white placeholder-opacity-70" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block mb-2 font-medium">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 rounded-lg bg-green-800 border border-white border-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-70" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-4">
                            <label for="appliance" class="block mb-2 font-medium">Appliance Type</label>
                            <select id="appliance" name="appliance" class="w-full px-4 py-3 rounded-lg bg-green-800 text-white border border-white border-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 text-white" required>
                                <option value="" disabled selected>Select appliance</option>
                                <option value="washing-machine">Washing Machine</option>
                                <option value="ac">Air Conditioner</option>
                                <option value="fridge">Refrigerator</option>
                                <option value="other">Other Appliance</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="issue" class="block mb-2 font-medium">Describe the Issue</label>
                            <textarea id="issue" name="issue" rows="4" class="w-full px-4 py-3 rounded-lg border bg-green-800 border-white border-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 placeholder-white placeholder-opacity-70" placeholder="Briefly describe the problem you're facing" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg transition shadow-md">
                            Request Service Call
                        </button>
                        <div id="formMessage" class="mt-4 text-center font-semibold"></div>
                    </form>
                </div>
                <!-- Contact Info -->
                <div class="lg:w-1/2">
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm p-6 rounded-xl h-full">
                        <h3 class="text-xl font-bold mb-6">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Address</h4>
                                    <p class="opacity-90">
                                        No. 10/16 Ibrahim Street,<br>
                                        Chozhapuram, Ambattur,<br>
                                        Chennai – 600053
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Phone</h4>
                                    <p class="opacity-90 mb-2">
                                        <a href="tel:+919876543210" class="hover:underline">+91 98765 43210</a>
                                    </p>
                                    <a href="tel:+919876543210" class="inline-block bg-white text-primary hover:bg-gray-100 font-medium py-2 px-4 rounded-lg transition shadow-sm text-sm">
                                        <i class="fas fa-phone-alt mr-2"></i> Tap to Call
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-4 mt-1">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">WhatsApp</h4>
                                    <p class="opacity-90 mb-2">
                                        Chat with us for quick support
                                    </p>
                                    <a href="https://wa.me/919876543210" target="_blank" class="inline-block bg-white text-primary hover:bg-gray-100 font-medium py-2 px-4 rounded-lg transition shadow-sm text-sm">
                                        <i class="fab fa-whatsapp mr-2"></i> Chat Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center mr-3">
                             <img src="./assets/img/icon.png" alt="" width="30">
                        </div>
                        <h2 class="text-xl font-bold">LIVE HOME SERVICE</h2>
                    </div>
                    <p class="mt-2 text-gray-400 text-sm">Professional appliance repair services in Chennai</p>
                </div>
                <div class="mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
                    <ul class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-6 text-gray-400">
                        <li><a href="#home" class="hover:text-white transition">Home</a></li>
                        <li><a href="#services" class="hover:text-white transition">Services</a></li>
                        <li><a href="#areas" class="hover:text-white transition">Areas</a></li>
                        <li><a href="#contact" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-primary flex items-center justify-center transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-primary flex items-center justify-center transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-primary flex items-center justify-center transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400 text-sm">
                <p>© 2025 LIVE HOME SERVICE. All Rights Reserved.</p>
                <p class="mt-2">Built by <a href="https://www.firstinmarket.com">FIM TECH</a></p>
            </div>
        </div>
    </footer>

</body>


<script>
    // Review Modal Logic
    var addReviewBtn = document.getElementById('addReviewBtn');
    var reviewModal = document.getElementById('reviewModal');
    var closeReviewModal = document.getElementById('closeReviewModal');
    var reviewForm = document.getElementById('reviewForm');
    var reviewMessage = document.getElementById('reviewMessage');
    if (addReviewBtn && reviewModal) {
        addReviewBtn.addEventListener('click', function() {
            reviewModal.classList.remove('hidden');
        });
    }
    if (closeReviewModal && reviewModal) {
        closeReviewModal.addEventListener('click', function() {
            reviewModal.classList.add('hidden');
            reviewMessage.textContent = '';
            reviewForm.reset();
        });
    }
</script>
<script>
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });


    function toggleFAQ(id) {
        const content = document.getElementById(`faq-content-${id}`);
        const icon = document.querySelector(`.faq-question:nth-of-type(${id}) i`);

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.classList.remove('fa-minus');
            icon.classList.add('fa-plus');
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
        }
    }


    const carousel = document.getElementById('testimonial-carousel');
    const prevButton = document.getElementById('prev-testimonial');
    const nextButton = document.getElementById('next-testimonial');

    if (prevButton && nextButton) {
        prevButton.addEventListener('click', () => {
            carousel.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        nextButton.addEventListener('click', () => {
            carousel.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });
    }


    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            }
        });
    });
</script>






</html>