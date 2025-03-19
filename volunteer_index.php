<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'volunteer') {
    header("Location: login.php"); // Redirect if not logged in as volunteer
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZooPare Zoological Park</title>
    <link rel="stylesheet" href="src/volunteer_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="#"><span class="zoo-text">Z<span class="oo-text">oo</span></span></a>
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="programs.php">Events</a></li>
                    <li><a href="animal.php">Animals</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="profile-menu">
    <button id="profileBtn">Profile ▼</button>
    <div id="dropdownMenu" class="dropdown-content">
        <p><strong>Welcome !, <?php echo $_SESSION['user_name']; ?></strong></p>
        <a href="programs.php">Events</a>
        <a href="logout.php" onclick="return confirmLogout()">Logout</a>
    </div>
</div>

        </div>
        <!-- JavaScript Code -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    var profileBtn = document.getElementById("profileBtn");
    var dropdownMenu = document.getElementById("dropdownMenu");

    // Toggle dropdown on button click
    profileBtn.onclick = function () {
        dropdownMenu.classList.toggle("show");
    };

    // Close dropdown when clicking outside
    window.onclick = function (event) {
        if (!profileBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove("show");
        }
    };
});
function confirmLogout() {
    return confirm("Do you want to logout?");
}

</script>
    </header>

    <!-- Hero Section -->
    <section class="hero" >
        <div class="hero-content">
            <h1 class="welcome">Welcome to <br>Zoological Park</h1>
            <a href="#" class="visit-btn">Visit Us</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
        <div class="section-header">
            <div class="line"></div>
            <h2>About</h2>
        </div>
        <div class="about-content">
            <div class="about-text">
                <h3>Wildlife Reserve<br>Zoopare zoological park</h3>
                <p>Nestled amidst 70 hectares of lush landscapes, ZooPare Zoological Park is home to over 2,000 animals from 200 different species across six continents. Since its inception in 1964, we've been more than a destination; our mission is to inspire understanding and appreciation of wildlife while fostering education, conservation, and community engagement.</p>
                <p>At ZooPare, visitors can explore diverse animal habitats, participate in interactive learning experiences, and join our conservation efforts to protect endangered species. Whether you're here to admire nature's wonders, learn about wildlife conservation, or simply enjoy a day out, ZooPare offers a unique and unforgettable experience for all.</p>
                
                
                <div class="awards">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzHg1APDe6IknUN3CK_877FkpK1RJTOuv4AQkDR6DUlMSAI37DHrsVGwQbKpWp8KMTgcY&usqp=CAU" alt="Best Zoo Award">
                    <img src="https://www.uflexltd.com/assets/images/chem/awards.jpg" alt="Excellence in Conservation">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvPiyD5LqTMBedrqLhE_9fcrjwo9uHfzOPqxT5eG7Da8lhyj43aVW7Oo8c-EebUjOXfM0&usqp=CAU" alt="Top Visitor Attraction">
                </div>
                
                <a href="#" class="see-more-btn">See More</a>
            </div>
            <div class="about-image">
                <img src="https://iso.500px.com/wp-content/uploads/2016/05/stock-photo-153487967.jpg" alt="Tiger at ZooPare">
                <div class="image-overlay">
                    <h4>HELP US PROTECT<br>MORE ANIMALS</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Join With Us Section -->
    <section class="section join">
        <div class="section-header">
            <div class="line"></div>
            <h2>Join<br><span class="subheading">with us</span></h2>
        </div>
        <p class="join-text">Join us for thrilling wildlife experiences, educational programs, and special events designed to bring you closer to nature—explore what's happening next at ZooPare!</p>
        
        <div class="experience-cards">
            <div class="card">
                <h3>Wildlife Conservation Workshop</h3>
                <div class="card-image">
                    <img src="https://gatrees.org/wp-content/uploads/2020/01/Georgia-Teacher-Conservation-Workshop2.jpg" alt="Conservation Workshop">
                </div>
                <a href="#" class="see-more-btn">See More!</a>
            </div>
            <div class="card">
                <h3>Night Safari Adventure</h3>
                <div class="card-image">
                    <img src="https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/0c/de/fb/ca.jpg" alt="Night Safari">
                </div>
                <a href="#" class="see-more-btn">See More!</a>
            </div>
            <div class="card">
                <h3>Meet The Giant Pandas</h3>
                <div class="card-image">
                    <img src="https://www.usatoday.com/gcdn/authoring/authoring-images/2024/04/30/USAT/73511269007-yun-chuan-0111536-x-1024-1.jpg?width=1536&height=1024&fit=crop&format=pjpg&auto=webp" alt="Giant Pandas">
                </div>
                <a href="#" class="see-more-btn">See More!</a>
            </div>
        </div>
    </section>

    <!-- Animals Section -->
    <section class="section animals" id = "animals">
        <div class="section-header">
            <div class="line"></div>
            <h2>Animals</h2>
        </div>
        <p class="animals-text">From majestic lions and elephants to adorable giant pandas and rare amphibians, ZooPare is home to over 2,000 animals from 200 different species across six continents. Our diverse collection includes some of the most vulnerable animals on the planet. Every visit supports our mission of conservation and care.</p>
        
        <div class="animals-content">
            <div class="animals-gallery">
                <div class="animal-thumbnail">
                    <img src="https://media.istockphoto.com/id/1298291670/photo/malayan-porcupine-hedgehog-is-eating-corn-and-vegetables.jpg?s=612x612&w=0&k=20&c=E9VMlEDNsWx75xOZf9HkKJbZGPGJm3rR2IiuemuBiP0=" alt="Hedgehog">
                </div>
                <div class="animal-thumbnail">
                    <img src="https://images.photowall.com/products/82182/cute-lion-cubs.jpg?h=699&q=85" alt="Lion Cub">
                </div>
                <div class="animal-thumbnail">
                    <img src="https://st.depositphotos.com/2047341/4703/i/450/depositphotos_47031589-stock-photo-indian-rhinoceros.jpg" alt="Rhinoceros">
                </div>
            </div>
            <div class="animals-collage">
                <img src="https://a4.pbase.com/g6/89/541989/2/76488449.vw3u7Wha.jpg" alt="ZooPare Animals Collage">
                <h3>Discover <span class="normal-text">the Amazing Animals of</span> ZooPare</h3>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section services" id = "services" >
        <div class="section-header">
            <div class="line"></div>
            <h2>Services</h2>
        </div>
        <div class="services-header">
            <h3>SPECIAL SERVICES<br><span class="subheading">FOR OUR GUESTS</span></h3>
            <a href="#" class="services-btn">ALL SERVICES</a>
        </div>
        
        <div class="mobile-app-banner">
            <div class="app-icon">
                <i class="fas fa-mobile-alt"></i>
            </div>
            <div class="app-text">
                <p>Download our app for an enhanced ZooPare experience soon...</p>
            </div>
        </div>
        
        <div class="service-cards">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <h4>Photos with Animals</h4>
                <p>Capture unforgettable moments with your favorite animals such as giraffes, zebras, some monkeys and giant pandas.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h4>Restaurant and Food</h4>
                <p>Enjoy a delicious meal at our restaurant or various eateries throughout the zoo with delicious options for the whole family.</p>
                <a href="#" class="green-btn">LEARN MORE</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <h4>Free Wi-Fi to Speed</h4>
                <p>Free Wi-Fi is available throughout the park. Connect and share your favorite moments on the go.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h4>Zoo Map & Guide</h4>
                <p>A perfect start can be boosted! Grab a paper, follow our guide or just use your phone.</p>
                <a href="#" class="green-btn">DOWNLOAD</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-gift"></i>
                </div>
                <h4>Souvenirs & Gifts</h4>
                <p>Get a souvenir to suit your children. The perfect gift shop is on your way to the exit gate.</p>
                <a href="#" class="green-btn">WATCH VIDEO</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-baby-carriage"></i>
                </div>
                <h4>Stroller Rental</h4>
                <p>Single stroller (designed for one child) or double stroller (designed for two children) is available.</p>
                <a href="#" class="green-btn">BOOK NOW</a>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section class="section contact" id = "contact">
        <div class="section-header">
            <div class="line"></div>
            <h2>Contact Us</h2>
        </div>
        <div class="contact-form">
            <form>
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+1 (123) 456-789">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message / Inquiry?</label>
                    <textarea id="message" name="message" rows="4"></textarea>
                </div>
                <div class="form-choices">
                    <label class="checkbox-container">
                        <input type="checkbox" name="general"> General Inquiry
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="special"> Special Event Inquiry
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="visit"> School Visit Inquiry
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="animals"> Animal Adoption Inquiry
                    </label>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Volunteer Section -->
    <section class="section volunteer">
        <div class="volunteer-content">
            <div class="volunteer-image">
                <img src="https://zoologicalsocietyofnj.org/wp-content/uploads/2021/12/initiatives.jpg" alt="Volunteer at ZooPare">
            </div>
            <div class="volunteer-text">
                <h3>Join Our Volunteer Community!</h3>
                <p>Passionate about wildlife? Become a ZooPare Volunteer and make a difference! Whether you're educating visitors, assisting in animal care, or supporting conservation programs, your efforts contribute to our mission to protect endangered species and our mission to inspire and care for the world's incredible wildlife!</p>
                <div class="volunteer-buttons">
                    <a href="register.php" class="green-btn">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-top">
            <div class="footer-contact">
                <h4>Reach Us</h4>
                <ul>
                    <li><i class="fas fa-phone"></i> +123-456-789</li>
                    <li><i class="fas fa-envelope"></i> hello@zoopare.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Wildlife Avenue, Nature Park</li>
                </ul>
            </div>
            
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#about">About</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Purchase Tickets</a></li>
                        <li><a href="#">Animal Adoption</a></li>
                        <li><a href="#">Donate</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Email address">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 ZooPare Zoological Park. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>