<?php
ob_start();
session_start();
$pageTitle = 'The Founder | من نحن';
include 'init.php';
?>
<div class="about_page" style="background-image: url(manage/uploads/imgs/about-page.png); background-size: cover; background-position: top center; background-repeat: no-repeat;" background="https://mdbootstrap.com/img/Photos/Others/slide.jpg">
    <p class="line-1 anim-typewriter">
        من هم The Founder<br>
    </p>
</div>
<!-- 
    - #ABOUT
-->

<section class="section about-page-section" id="about">
    <div class="container">

        <div class="about-page-banner img-holder" style="--width: 720; --height: 960;">
            <img src=".<?php echo $imgs ?>Digital-Marketing-Experts-12-1024x536.webp" width="720" height="960" loading="lazy" alt="about banner" class="img-cover">
        </div>

        <div class="about-page-content">

            <h2 class="h2 section-title underline">نبذة عنا</h2>

            <p class="section-text">
                تقوم الشركة بإنشاء البراند واستغلال الترند لصالح اعمالك فنحن موجودون بشكل أساسي لمساعدة عملائنا في إدارة
                أعمالهم والتقدم في تطورها المستمر والمتزايد من خلال تسخير جميع أفرادنا وقيمنا الإبداعية باستخدام أحدث
                الأساليب والوسائل. </p>

            <h3 class="h3">من نحن ؟</h3>

            <p class="section-text">
                شركة The Founder هي شركة متخصصة في تقديم الخدمات التسويقية والبرمجية للشركات الناشئة والمؤسسين ومساعدتهم
                على تأسيس أعمالهم والترويج لها بشكل فعال وذلك من خلال تقديم باقة متنوعة من الخدمات التسويقية المتعارف
                عليها وتطوير مواقع الويب وحلول التجارة الإلكترونية لمساعدتك في الوصول إلى عملائك بشكل أسرع.
            </p>

            <h3 class="h3">مهمتنا</h3>

            <ul class="about-page-list">

                <li class="about-page-item">
                    <ion-icon name="checkmark-circle" aria-hidden="true"></ion-icon>

                    <p class="section-text">
                        جعل التسويق عبر الإنترنت مربحًا. نحن نركز على النتائج في علاقة طويلة الأمد مع عملائنا.
                    </p>
                </li>
            </ul>

            <h3 class="h3">هدفنا</h3>
            <ul class="about-page-list">
                <li class="about-page-item">
                    <ion-icon name="checkmark-circle" aria-hidden="true"></ion-icon>

                    <p class="section-text">
                        أن نصبح واحدة من أفضل وكالات التسويق في منطقة الشرق الأوسط وشمال إفريقيا، من خلال تقديم جميع
                        خدمات
                        التسويق في مكانٍ واحد. بالإضافة إلى إتباع منهج موجه نحو النتائج والتركيز على تحويل الشركات
                        الصغيرة إلى
                        شركات أكبر. </p>
                </li>
            </ul>

        </div>

    </div>
</section>
<!-- 
    - #SERVICE
-->

<section class="section service" id="services">
    <div class="container">
        <h2 class="h2 section-title underline">أهم وأبرز خدماتنا</h2>

        <ul class="service-list">
            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <i class="fa-solid fa-hashtag"></i>
                    </div>

                    <h3 class="h3 title">إدارة وسائل التواصل الاجتماعي</h3>

                    <p class="text">
                        يمكن أن تساعدك خدمات إدارة وسائل التواصل الاجتماعية في إنشاء
                        تواجد قوي والحفاظ عليه على الشبكات الاجتماعية الشهيرة مثل
                        Facebook و Twitter و Instagram وأي منصة أخرى.
                    </p>

                    <button class="card-btn" aria-label="Show More">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </li>

            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <i class="fa-solid fa-trademark"></i>
                    </div>

                    <h3 class="h3 title">أنشاء العلامة التجارية</h3>

                    <p class="text">
                        العلامة التجارية هي عملية تكوين تصور إيجابي قوي عن الشركة،
                        أو منتجاتها أو خدماتها في ذهن العميل من خلال الجمع بين عناصر
                        مثل الشعار والتصميم وبيان المهمة.
                    </p>

                    <button class="card-btn" aria-label="Show More">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </li>

            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <ion-icon name="desktop-outline"></ion-icon>
                    </div>

                    <h3 class="h3 title">تطوير المواقع الإلكترونية</h3>

                    <p class="text">
                        موقعك الإلكتروني هو أفضل من يتحدث عنك ويشرح أفكارك ويطرح
                        منتجاتك. يمكننا مساعدتك في إنشاء موقع إلكتروني يلبي احتياجات
                        عملك. سيعمل فريق الخبراء لدينا معك لتطوير حل مخصص يناسب
                        ميزانيتك وجدولك الزمني.
                    </p>

                    <button class="card-btn" aria-label="Show More">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </li>

            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <i class="fa-solid fa-chart-column"></i>
                    </div>

                    <h3 class="h3 title">التسويق بالأداء</h3>

                    <p class="text">
                        نحن نستخدم مجموعة متنوعة من الطرق، مثل الإعلانات المصورة،
                        وإعادة الاستهداف، للوصول إلى جمهورك المستهدف وامدادك بعملاء
                        وزيادة مبيعاتك. لدينا فريق من المحترفين ذوي الخبرة الذين
                        سيعملون معك لتطوير حملة تلبي احتياجاتك الخاصة وتحقق النتائج
                        المرجوة.
                    </p>

                    <button class="card-btn" aria-label="Show More">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </li>

            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>

                    <h3 class="h3 title">تحسين محركات البحث (SEO)</h3>

                    <p class="text">
                        تقدم The Founder خدمات تحسين محركات البحث الاحترافية التي
                        ستساعد في تحسين رؤية موقع الويب الخاص بك وترتيبه رقميًا.
                        سيقوم فريقنا بتطوير استراتيجية مصممة خصيصًا لعملك والتي
                        ستساعد في زيادة حركة المرور والتحويلات.
                    </p>

                    <button class="card-btn" aria-label="Show More">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </li>

            <li>
                <div class="service-card">
                    <div class="card-icon">
                        <ion-icon name="globe-outline"></ion-icon>
                    </div>

                    <h3 class="h3 title">التجارة الإلكترونية</h3>

                    <p class="text">
                        تعد خدمات التجارة الإلكترونية جزءا أساسيًا من خدماتنا. حيث
                        يمكننا إنشاء موقع مخصص للتجارة الإلكترونية لعملك، لتحصل على
                        النتائج التي تحتاجها. يمكننا إرشادك إلى الخيار الأفضل
                        لاحتياجاتك.
                    </p>

                    <button class="card-btn" aria-label="Show More">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- 
    - #CONTACT
-->
<section id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="actions.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="section-heading">
                                <h2 class="h2 section-title underline">اطلب خدمتك الآن</h2>
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
                                        <a data-mdb-toggle="popover" data-mdb-html="true" data-mdb-trigger="hover" data-mdb-placement="right" target="_blank" href="https://api.whatsapp.com/send?phone=+201551484645&text=مرحباً، أريد الإستفسار &source=&data" data-whatsapp>
                                            <span>201551484645+</span>
                                        </a>
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