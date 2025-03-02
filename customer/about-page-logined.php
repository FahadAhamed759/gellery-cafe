<?php
    session_start();

    include("php/db-conn.php");
    include("php/function.php");

    if (!isset($_SESSION['user_id'])) {
        header("Location: login-form-page.php");
        exit();
    }


    $success_message = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $customer_id = $_POST['customer_id'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $customer_id = htmlspecialchars(trim($customer_id));
        $subject = htmlspecialchars(trim($subject));
        $message = htmlspecialchars(trim($message));

        if (!empty($customer_id) && !empty($subject) && !empty($message)) {
            $query = "INSERT INTO message (customer_id, subject, message) VALUES ('$customer_id', '$subject', '$message')";
            if (mysqli_query($conn, $query)) {
                $_SESSION['message'] = 'Message sent successfully!';
                header("Location: about-page-logined.php");
                exit();
            } else {
                $_SESSION['message'] = 'Error: ' . mysqli_error($conn);
            }
        } else {
            $_SESSION['message'] = 'Please fill out all fields.';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="pictures/logo/logo-white-bg.jpg">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/home-page-logined.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/about-page.css">
    <title>About Us - The Gallery Café</title>
</head>

<body>
    <header class="header">
        <div class="left-section">
            <img class="cafe-logo" src="pictures/logo/logo-white-bg.jpg">
        </div>

        <div class="right-section">
            <div class="right-button">
                <a class="home-header" href="home-page-logined.php">Home</a>
            </div>
            <div class="right-button" id="reservation-header">
                <a class="reservation-header" href="table-reservation-page.php">Table Reservation</a>
            </div>
            <div class="right-button" id="preorder-cushine-header">
                <a class="preorder-cushine-header" href="preorder-cusine-page.php">Pre-Order Cusine</a>
            </div>
            <div class="right-button" id="about-us">
                <a class="about-us" href="about-page-logined.php">About Us</a>
            </div>
            <div class="profile">
                <a href="logout.php">
                    <button class="login-button">Logout</button>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img class="slideshow-picture" src="pictures/slideshow/2.jpg">
                </div>

               
                <div class="overlay">
                    <div class="restaurant-title">
                        <h1>About Us></h1>
                        <h1>About Us></h1>
                        <div>
                            <a href="#welcome">
                                The Gallery Café
                            </a>
                            <a href="#our-story">
                                Our Story
                            </a>
                            <a href="#gallery">
                                Our Gallery
                            </a>
                            <a href="#contact-us">
                                Contact Us
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="about-container" id="welcome">
            <div class="content">
                <h3>The Gallery Café</h3>
                <p> A popular café in Colombo with a vibrant and modern atmosphere. It occasionally features artworks and offers a diverse menu.
                     The café is a favorite among both locals and tourists.</p>
            </div>
        </section>

        <section class="about-container" id="our-story">

            <div class="content">
                <h3>Our Story</h3>
                <p>In the heart of the bustling city, tucked away in a quiet alley, there lies a hidden gem—a café like no other. 
                The Hidden Garden is more than just a place to enjoy a cup of coffee; it's a sanctuary, a retreat from the noise and chaos of daily life It's Gallery cafe.</p>
            </div>
        </section>

        <section class="gallery-container-tb
        " id="gallery">
            <div class="gallery-tb">
                <h3>Our Gallery</h3>
                <div class="picture-grid">
                    <div class="picture-container"><img src="pictures/about-page/1.jpg"></div>
                    <div class="picture-container"><img src="pictures/about-page/2.jpeg"></div>
                    <div class="picture-container"><img src="pictures/about-page/3.jpg"></div>
                    <div class="picture-container"><img src="pictures/about-page/4.png"></div>
                    <div class="picture-container"><img src="pictures/about-page/5.jpg"></div>
                    <div class="picture-container"><img src="pictures/about-page/6.jpg"></div>
  
                </div>
            </div>
        </section>

        <section class="contact-container" id="contact-us">
            <div class="contact-layout">
                <div class="message-container">
                    <form class="message-form" id="message-form" method="post" autocomplete="off">
                        <label class="title">Send Mesaage</label>
                        <div class="input-section">
                            <label>Subject</label>
                            <input type="text" name="subject" placeholder="Enter your subject">
                        </div>
                        <div class="input-section">
                            <label>Message</label>
                            <textarea name="message" rows="5" cols="40">
                                </textarea>
                        </div>

                        <input type="hidden" id="customer-id" name="customer_id">

                        <div id="success-message" style="color: green; margin-top: 10px;"></div>

                        <input class="send-button" type="submit" value="Send">


                    </form>
                </div>
                <div class="contact-details">
                    <div class="contact-box">
                        <h3>Contact details</h3>
                        <div class="location">
                            <img src="pictures/Icons/location.svg">
                            <p><span>Address:</span> 40/9,Aurburn side, Colombo </p>
                        </div>
                        <div class="tel-no">
                            <img src="pictures/Icons/tel-no.svg">
                            <p><span>Phone:</span> +0760423536</p>
                        </div>
                        <div class="opening-time">
                            <img src="pictures/Icons/time.svg">
                            <div>
                                <p>
                                    <span>Opening Hours:</span><br>
                                    Monday - Friday <br>
                                    08.00 AM - 04.00 PM <br>
                                    Saturday - Sunday <br>
                                    08.00 AM - 10.00 PM <br>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="left-section">

            <div class="right-button">
                <a class="home-header" href="home-page-logined.php">Home</a>
            </div>
            <div class="right-button" id="reservation-header">
                <a class="reservation-header" href="table-reservation-page.php">Table Reservation</a>
            </div>
            <div class="right-button" id="preorder-cushine-header">
                <a class="preorder-cushine-header" href="preorder-cusine-page.php">Pre-Order Cushine</a>
            </div>
            <div class="right-button" id="about-us">
                <a class="about-us" href="about-page-logined.php">About Us</a>
            </div>

        </div>

        <div class="right-section">
            <div class="contact-box">

                <div class="location">
                    <img src="pictures/Icons/location.svg">
                    <p><span>Address:</span> 40/9 , Aurburn side , Colombo</p>
                </div>
                <div class="tel-no">
                    <img src="pictures/Icons/tel-no.svg">
                    <p><span>Phone:</span> +0760423536</p>
                </div>
                <div class="opening-time">
                    <img src="pictures/Icons/time.svg">
                    <div>
                        <p>
                            <span>Opening Hours:</span><br>
                            Monday - Friday <br>
                            08.00 AM - 04.00 PM <br>
                            Saturday - Sunday <br>
                            08.00 AM - 10.00 PM <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="logo-container">
                <img class="cafe-logo" src="pictures/logo/logo-white-bg.jpg">
            </div>
        </div>
    </footer>

    
    <script src="javascript/home-page-slideshow.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var customerId = "<?php echo htmlspecialchars($_SESSION['user_id']); ?>";
            document.getElementById('customer-id').value = customerId;
        });

        let successMessage = "<?php echo isset($_SESSION['message']) ? htmlspecialchars($_SESSION['message']) : ''; ?>";
        
        
        if (successMessage) {
            document.getElementById('success-message').textContent = successMessage;
 
            <?php unset($_SESSION['message']); ?>
        }
    </script>

</body>

</html>