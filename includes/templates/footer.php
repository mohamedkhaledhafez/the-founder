<!--==================== FOOTER ====================-->
<footer class="footer">
    <div class="footer-top section">
        <div class="container">
            <div class="footer-brand">
                <a href="#" class="logo">The Founder</a>

                <p class="text">
                    شركة The Founder هي شركة متخصصة في تقديم الخدمات التسويقية
                    والبرمجية للشركات الناشئة والمؤسسين ومساعدتهم على تأسيس أعمالهم
                    والترويج لها بشكل فعال وذلك من خلال تقديم باقة متنوعة من الخدمات
                    التسويقية المتعارف عليها وتطوير مواقع الويب وحلول التجارة
                    الإلكترونية لمساعدتك في الوصول إلى عملائك بشكل أسرع.
                </p>

                <ul class="social-list">
                    <!-- <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li> -->

                    <li>
                        <a href="https://instagram.com/thefoundermarkting?igshid=NzZlODBkYWE4Ng==" target="_blank"
                            class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <!-- <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-tiktok"></ion-icon>
                        </a>
                    </li> -->
                </ul>
            </div>

            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">روابط سريعة</p>
                </li>

                <li>
                    <a href="index.php" class="footer-link">الرئيسية</a>
                </li>

                <li>
                    <a href="about.php" class="footer-link">من نحن</a>
                </li>

                <li>
                    <a href="index.php#services" class="footer-link">خدماتنا</a>
                </li>

                <li>
                    <a href="contact.php" class="footer-link">تواصل معنا</a>
                </li>

                <!-- <li>
                    <a href="#" class="footer-link">Blog</a>
                </li> -->
            </ul>

            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">خدماتنا</p>
                </li>

                <li>
                    <a href="#" class="footer-link">تحسين محركات البحث</a>
                </li>

                <li>
                    <a href="#" class="footer-link">إدارة وسائل التواصل الاجتماعي</a>
                </li>

                <li>
                    <a href="#" class="footer-link">تطوير المواقع</a>
                </li>

                <li>
                    <a href="#" class="footer-link">إنشاء المتاجر الإلكترونية</a>
                </li>

                <li>
                    <a href="#" class="footer-link">أنشاء العلامة التجارية</a>
                </li>
            </ul>



            <ul class="footer-list">
                <li>
                    <p class="footer-list-title">تواصل معنا</p>
                </li>

                <li class="footer-item">
                    <div class="footer-item-icon">
                        <ion-icon name="logo-whatsapp"></ion-icon>
                    </div>

                    <div>
                        <a href="https://api.whatsapp.com/send?phone=+201551484645&text=مرحباً، أريد الإستفسار &source=&data"
                            target="_blank" class="footer-item-link">201551484645+</a>
                    </div>
                </li>

                <li class="footer-item">
                    <div class="footer-item-icon">
                        <ion-icon name="mail"></ion-icon>
                    </div>

                    <div>
                        <a href="mailto:info@thefounder.marketing"
                            class="footer-item-link">info@thefounder.marketing</a>
                        <!-- <a href="mailto:help@thefounder.marketing"
                            class="footer-item-link">help@thefounder.marketing</a> -->
                    </div>
                </li>

                <!-- <li class="footer-item">
                    <div class="footer-item-icon">
                        <ion-icon name="location"></ion-icon>
                    </div>

                    <address class="footer-item-link">
                        Pontiac, Michigan, United States of America
                    </address>
                </li> -->
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p class="copyright">
            &copy; <?php echo date("Y") ?> <a href="https://ultraapps.net/" class="copyright-link">Ultra Apps</a>. All
            Right Reserved
        </p>
    </div>
</footer>
<!-- 
    - #GO TO TOP
  -->

<a href="#top" class="go-top active" aria-label="Go To Top" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
</a>

<!-- 
    - #WHATSAPP ICON
  -->

<a data-mdb-toggle="popover" data-mdb-html="true" data-mdb-trigger="hover" data-mdb-placement="right" target="_blank"
    href="https://api.whatsapp.com/send?phone=+201551484645&text=مرحباً، أريد الإستفسار &source=&data"
    title="<b class='whatsapp-hover-text'>تريد مساعدة ؟</b>" class="whatsapp_float active" data-whatsapp>
    <i class="fa-brands fa-whatsapp whatsapp-icon"></i>
</a>

<!-- Translation Code here -->
<span id="google_translate_element">
    <div class="translate"></div>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            defaultLanguage: 'en',
            pageLanguage: 'en',
            // includedLanguages: 'ar,en',
            // layout: google.translate.TranslateElement.InLineLayout.SIMPLE,
            autoDisplay: false,
            multilanguagePage: true
        }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
</span>

<span class="navbar-nav mr-sm-2" id="google_translate_element"></span>

<!--=============== MDB JS ===============-->
<script src="<?php echo $js ?>mdb.min.js"></script>

<!--=============== SCROLL REVEAL ===============-->
<script src="<?php echo $js ?>scrollreveal.min.js"></script>

<!--================= GSAP =================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="<?php echo $js ?>main.js"></script>

<!--=============== PARTICLES JS ===============-->
<!-- <script src="<?php echo $js ?>particles.js"></script> -->
<!-- <script src="<?php echo $js ?>app.js"></script> -->

<!--=============== SLICK JS ===============-->
<!-- <script src="<?php echo $js ?>slick.js"></script> -->

<!--=============== Ionicon link ===============-->

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!--=============== Sweetalert ===============-->
<script src="<?php echo $js ?>sweetalert.min.js"></script>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
<script>
swal({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    button: "OK",
});
</script>
<?php
    unset($_SESSION['status']);
}
?>
</body>

</html>