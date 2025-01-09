<?php
ob_start();
session_start();
$pageTitle = 'Ultra Apps';
include 'init.php';
?>

<div class="section_image services">
  <!-- <div class="overlay"></div> -->
  <!-- <img src="./admin/uploads/imgs/our_services.jpg" alt="" /> -->
  <div class="anim">
    <span class="nav__logo__text first">Our</span>
    <span class="slide">
      <span class="second">Services</span>
    </span>
  </div>
  <p class="mt-4">Let's GROW Together</p>
</div>

<section class="section service">
  <div class="container">
    <ul class="grid-list">
      <!-- Web Development service -->
      <li>
        <div class="service-card has-after">
          <figure class="card-icon">
            <img src=".<?php echo $imgs ?>service-web.jfif" width="140" height="140" loading="lazy" alt="Web Development" class="img" />
          </figure>

          <div class="card-content">
            <h3 class="h3 card-title">Web Development</h3>

            <p class="card-text">
              Create a website for your company or business is a very
              important matter that helps the spread of the site as it
              is the coordination of your company or business.
            </p>

            <a href="web-services.php" class="btn-link">
              <span class="span">Read More</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </div>
      </li>
      <!-- E-commerce service -->
      <li>
        <div class="service-card has-after">
          <figure class="card-icon">
            <img src=".<?php echo $imgs ?>service-e-commerce.jpeg" width="140" height="140" loading="lazy" alt="E-commerce" class="img" />
          </figure>

          <div class="card-content">
            <h3 class="h3 card-title">E-commerce Solutions</h3>

            <p class="card-text">
              Through the online store, you can easily display your
              services and products to a large segment of customers in
              more than one country, and through the store it is
              possible to complete the buying and selling process and
              shipping to the customer.
            </p>

            <a href="ecommerce.php" class="btn-link">
              <span class="span">Read More</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </div>
      </li>
      <!-- Lawyer system & website service -->
      <li>
        <div class="service-card has-after">
          <figure class="card-icon">
            <img src=".<?php echo $imgs ?>service-lawyer.jpg" width="140" height="140" loading="lazy" alt="Lawyer system" class="img" />
          </figure>

          <div class="card-content">
            <h3 class="h3 card-title">Lawyer system</h3>

            <p class="card-text">
              Establishing specialized programs in the management of law
              offices and legal advice.
            </p>

            <a href="lawyer-system.php" class="btn-link">
              <span class="span">Read More</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </div>
      </li>
      <!-- Reservation Systems service -->
      <li>
        <div class="service-card has-after">
          <figure class="card-icon">
            <img src=".<?php echo $imgs ?>service-booking.webp" width="140" height="140" loading="lazy" alt="Car rental websites" class="img" />
          </figure>

          <div class="card-content">
            <h3 class="h3 card-title">Reservation Systems</h3>

            <p class="card-text">
              If you have a clinic, salon, beauty center or car rental showroom and need
              an interface for your services and organize the booking of services.
            </p>

            <a href="#" class="btn-link">
              <span class="span">Read More</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </div>
      </li>
      <!-- Car rental website service -->
      <li>
        <div class="service-card has-after">
          <figure class="card-icon">
            <img src=".<?php echo $imgs ?>service_car_rental.jpeg" width="140" height="140" loading="lazy" alt="Car rental websites" class="img" />
          </figure>

          <div class="card-content">
            <h3 class="h3 card-title">Car rental website</h3>

            <p class="card-text">
              If you have a car showroom, we offer you a professional
              interface to display your cars and present them in the
              best shape to your customers.
            </p>

            <a href="car-rental.php" class="btn-link">
              <span class="span">Read More</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </div>
      </li>
      <!-- Salons & Beauty Centers Websites service -->
      <li>
        <div class="service-card has-after">
          <figure class="card-icon">
            <img src=".<?php echo $imgs ?>service-salon-beauty2.jpg" width="140" height="140" loading="lazy" alt="Car rental websites" class="img" />
          </figure>

          <div class="card-content">
            <h3 class="h3 card-title">Salons & Beauty Centers Websites</h3>

            <p class="card-text">
              If you have a beauty center or barbershop and would like to display your services and prices
              with the possibility of pre-booking the service and the service provider by the customer
              and printing invoices.
            </p>

            <a href="salon-services.php" class="btn-link">
              <span class="span">Read More</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </div>
      </li>
      <!-- Restaurant Websites service -->
      <li>
        <div class="service-card has-after">
          <figure class="card-icon">
            <img src=".<?php echo $imgs ?>service-restaurant.webp" width="140" height="140" loading="lazy" alt="Car rental websites" class="img" />
          </figure>

          <div class="card-content">
            <h3 class="h3 card-title">Restaurant Websites</h3>

            <p class="card-text">
              If you have a restaurant, cafe, or coffee store and would like to spread your brand to your customers,
              expand your customer base, and display your menu.
            </p>

            <a href="restaurants.php" class="btn-link">
              <span class="span">Read More</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</section>

<section class="section service_important">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="bg-image hover-overlay shadow-2-strong rounded-5" data-mdb-ripple-color="light">
          <img src=".<?php echo $imgs ?>web-dev-Banner-008.jpg" class="img-fluid" />
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </div>
      </div>
      <div class="col-md-6">
        <h1 class="fw-bold mb-7">The importance of having a website for your business</h1>
        <p>
          Designing a website for your company or commercial activity is very important as it helps to
          spread your activity as it is the marketing tool for your company or business services,
          through which it is easy to access all the services, information and goals of the company.
        </p>
        <p>
          It also helps in the arrival of new customers through searching on the Internet,
          as well as facilitating communication through it, as there are contact numbers,
          addresses, a site map, as well as social media accounts and pages.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="websites__features h-100 h-custom gradient-custom-2">
  
  <div class="container py-5 h-100">
    <h1 class="fw-bold mb-7 text-center">Why choose ultra apps ?</h1>
    <p>
      We have the skills to achieve developing within your scope through The Web and we always pay off our best to be timely in our projects,
      Where we create websites according to the following criteria : 
    </p>
    <ul class="">
      <li><i class="fa-solid fa-square-check text-success"></i> Professional interfaces commensurate with the company's services</li>
      <li><i class="fa-solid fa-square-check text-success"></i> An attractive and unique website that is easy to browse and access to services and products easily</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Domain and hosting for free with emails linked with the domain</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Creating an attractive and wonderful slider for animated pictures, with the ability to add a gallery of photos and videos to the website</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Adding countless pages to the website</li>
      <li><i class="fa-solid fa-square-check text-success"></i> A website control panel that enables the customer to modify, add or delete</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Continuous technical support</li>
      <li><i class="fa-solid fa-square-check text-success"></i> The possibility of adding a special blog on the website that enables you to add articles and news on the website</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Responsive website is compatible and responsive to display screens, especially mobile phones</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Linking the website with social media pages and accounts</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Adding the WhatsApp button on the website to facilitate customer communication through the website on WhatsApp</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Prices to suit all budgets</li>
      <li><i class="fa-solid fa-square-check text-success"></i> Add a contact us page with a contact form as well as a site map</li>
    </ul>
  </div>
</section>

<?php
include $templates . 'footer.php';
ob_end_flush();
?>

<script>
  (function($) {
    // writes the string
    //
    function typeString($target, string, cursor, delaytyping, calllback) {
      $target.html(function(_, html) {
        return html + string[cursor];
      });
      if (cursor < string.length - 1) {
        setTimeout(function() {
          typeString($target, string, cursor + 1, delaytyping, calllback);
        }, delaytyping);
      } else {
        calllback();
      }
    }
    // clears the string after typing it
    function deleteString($target, delaydeleting, callback) {
      var length;
      $target.html(function(_, html) {
        length = html.length;
        return html.substr(0, length - 1);
      });
      if (length > 1) {
        setTimeout(function() {
          deleteString($target, delaydeleting, callback);
        }, delaydeleting);
      } else {
        callback();
      }
    }
    // jQuery hook
    $.fn.extend({
      typewritereffect: function(opts) {
        var settings = $.extend({}, $.typewritereffect.defaults, opts);
        return $(this).each(function() {
          (function loop($tar, idx) {
            // type
            typeString($tar, settings.text[idx], 0, settings.delaytyping, function() {
              // delete
              setTimeout(function() {
                deleteString($tar, settings.delaydeleting, function() {
                  loop($tar, (idx + 1) % settings.text.length);
                });
              }, settings.pause);
            });
          }($(this), 0));
        });
      }
    });
    // Here you can set the default timings for the typewriter effects
    // 1) delaytyping: number of milliseconds between each character being typed
    // 2) delaydeleting: number of milliseconds between each character being removed
    // 3) pause: number of milliseconds to pause after a line is fully typed
    $.extend({
      typewritereffect: {
        defaults: {
          delaytyping: 150,
          delaydeleting: 50,
          pause: 1000,
          text: []
        }
      }
    });
  }(jQuery));
  jQuery(document).ready(function($) {
    // This bit types the text into our element with ID 'typewriter'
    // Update the values in the text array to display the text you want
    $('#service_typewriter').typewritereffect({
      text: ["Rent Your Dream Car."]
    });
  })
</script>