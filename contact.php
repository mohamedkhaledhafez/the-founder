<?php
ob_start();
session_start();
$pageTitle = 'The Founder | تواصل معنا';
include 'init.php';
?>
<section id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="actions.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="section-heading">
                                <h2 class="h2 section-title underline">تواصل معنا</h2>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="name" name="fname" id="fname" placeholder="الاسم الأول" autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="surname" name="lname" id="lname" placeholder="اسم العائلة" autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="البريد الإلكتروني" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="text" name="phone" id="phone" pattern="[0-9]+" maxlength="15" placeholder="رقم الهاتف" autocomplete="on">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" type="text" class="form-control" id="message" placeholder="موضوع الرسالة" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" name="send_msg" id="form-submit" class="btn">إرسال</button>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <ul class="social-list">
                                <!-- <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                    </a>
                                </li> -->

                                <li>
                                    <a href="https://instagram.com/thefoundermarkting?igshid=NzZlODBkYWE4Ng==" target="_blank" class="social-link">
                                        <ion-icon name="logo-instagram"></ion-icon>
                                    </a>
                                </li>

                                <!-- <li>
                                    <a href="#" class="social-link">
                                        <ion-icon name="logo-tiktok"></ion-icon>
                                    </a>
                                </li> -->
                            </ul>
                            <div class="contact-info">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <a href="#">info@thefounder.marketing</a>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <span>201551484645+</span>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </div>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=+201551484645&text=مرحباً، أريد الإستفسار &source=&data">201551484645+</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include $templates . 'footer.php';
ob_end_flush();
?>