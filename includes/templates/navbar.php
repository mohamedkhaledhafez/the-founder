<!--=============== HEADER ===============-->
<!-- 
    - #HEADER
  -->

<header class="header" data-header>
  <div class="container">
    <div class="overlay" data-overlay></div>

    <a href="index.php">
      <img src=".<?php echo $imgs ?>logo.jpg" alt="The Founder Logo" class="logo-img">
    </a>

    <nav class="navbar" data-navbar>
      <div class="navbar-top w-100">
        <img src=".<?php echo $imgs ?>logo.jpg" alt="The Founder Logo" class="logo-img">

        <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="navbar-list w-100">
        <li class="navbar-item">
          <a href="index.php" class="navbar-link" data-navbar-link>الرئيسية</a>
        </li>

        <li class="navbar-item">
          <a href="about.php" class="navbar-link" data-navbar-link>من نحن</a>
        </li>

        <li class="navbar-item">
          <a href="index.php#services" class="navbar-link" data-navbar-link>خدماتنا</a>
        </li>

        <li class="navbar-item">
          <a href="index.php#features" class="navbar-link" data-navbar-link>لماذا نحن</a>
        </li>
        <!-- 
            <li class="navbar-item">
              <a href="blog.php" class="navbar-link" data-navbar-link>Blog</a>
            </li>
            -->
        <li class="navbar-item">
          <a href="contact.php" class="navbar-link" data-navbar-link>تواصل معنا</a>
        </li>
      </ul>
    </nav>

    <a href="contact.php" class="btn">
      <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>

      <span>طلب عرض سعر</span>
    </a>

    <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
      <ion-icon name="menu-outline"></ion-icon>
    </button>
  </div>
</header>