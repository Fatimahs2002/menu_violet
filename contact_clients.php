<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Contact</h2>
            <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="row gy-4">

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-map flex-shrink-0"></i>
                    <div>
                        <h3>Our Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>contact@example.com</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-share flex-shrink-0"></i>
                    <div>
                        <h3>Opening Hours</h3>
                        <div>
                            <strong>Mon-Sat:</strong> 11AM - 23PM;
                            <strong>Sunday:</strong> Closed
                        </div>
                    </div>
                </div>
            </div><!-- End Info Item -->

        </div>

        <?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $sql = "INSERT INTO `message`(`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     if ($conn->query($sql) === TRUE) {
    // Redirect to contact_clients.php after successful submission
  //    header('location:clients.php');
  //  exit();
     } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }

    $conn->close();
}
?>
<form class="row g-3" action="" method="post">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputEmail4" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputPassword4" name="email">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Subject</label>
    <input type="text" class="form-control" id="inputAddress" name="subject">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Message</label>
    <textarea type="text" class="form-control" id="inputAddress2"  rows="8" name="message"></textarea>
  </div>
  <div class="text-center"> 
<button type="submit" name="submit" class="btn-book-a-table p-3" style=" color: #fff;
  background: #1bf840; border:none; border: none; border-radius: 30px;" >Send Message</button>
</div>   
</form>
</section>


