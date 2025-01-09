<?php
ob_start();
session_start();
$pageTitle = 'The Founder';
include 'init.php';
?>

<main>
  <article>
    <!-- 
        - #HERO
      -->

    <section class="hero" id="home">
      <div class="container">
        <div class="hero-content">
          <p class="hero-subtitle">أهلا بك في The Founder</p>

          <h2 class="h2 hero-title">نحن نصنع نجاحك في المستقبل</h2>

          <p class="hero-text">
            نقدم لك مجموعة واسعة من خدمات التسويق، ونستخدم استراتيجيات محددة
            بصدق وشفافية اتحقيق أفضل النتائج المرجوة
          </p>

          <a href="about.php" class="btn hero-btn">
            <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>

            <span>المزيد عنا</span>
          </a>
        </div>

        <figure class="hero-banner">
          <img src=".<?php echo $imgs ?>hero-banner.png" width="694" height="529" loading="lazy" alt="hero-banner" class="w-100 banner-animation" />
        </figure>
      </div>
    </section>

    <!-- 
        - #ABOUT
      -->

    <section class="section about" id="about">
      <div class="container">
        <figure class="about-banner">
          <img src=".<?php echo $imgs ?>about-banner.png" width="700" height="532" loading="lazy" alt="about banner" class="w-100 banner-animation" />
        </figure>

        <div class="about-content">
          <h2 class="h2 section-title underline">تعرف علينا</h2>

          <p class="about-text">
            شركة The Founder هي شركة متخصصة في تقديم الخدمات التسويقية
            والبرمجية للشركات الناشئة والمؤسسين ومساعدتهم على تأسيس أعمالهم
            والترويج لها بشكل فعال وذلك من خلال تقديم باقة متنوعة من الخدمات
            التسويقية المتعارف عليها وتطوير مواقع الويب وحلول التجارة
            الإلكترونية لمساعدتك في الوصول إلى عملائك بشكل أسرع.
          </p>

          <p class="about-text">
            تقوم الشركة بإنشاء البراند واستغلال الترند لصالح اعمالك فنحن
            موجودون بشكل أساسي لمساعدة عملائنا في إدارة أعمالهم والتقدم في
            تطورها المستمر والمتزايد من خلال تسخير جميع أفرادنا وقيمنا
            الإبداعية باستخدام أحدث الأساليب والوسائل.
          </p>

          <a href="about.php" class="btn hero-btn">
            <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>

            <span>اقرأ المزيد</span>
          </a>
        </div>
      </div>
    </section>

    <!-- 
        - #SERVICE
      -->

    <section class="section service" id="services">
      <div class="container">
        <h2 class="h2 section-title underline">ما سنقدمه لك</h2>

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
        - #FEATURES
      -->

    <section class="section features" id="features">
      <div class="container">
        <h2 class="h2 section-title underline">لماذا تختار The Founder</h2>

        <ul class="features-list">
          <li>
            <div class="features-card">
              <div class="icon">
                <ion-icon name="bulb-outline"></ion-icon>
              </div>

              <div class="content">
                <h3 class="h3 title">الأفكار والتحليلات</h3>

                <p class="text">
                  النجاح فكرة، وتحليل الأفكار هي أهم أسلحتنا.
                </p>
              </div>
            </div>
          </li>

          <li>
            <div class="features-card">
              <div class="icon">
                <ion-icon name="color-palette-outline"></ion-icon>
              </div>

              <div class="content">
                <h3 class="h3 title">التصميم</h3>

                <p class="text">
                  هويتك أمام عملائك في العالم الرقمي هي جزء من رأاس مالك،
                  ونحن سنساعدك على خل هوية مميزة وجذابة.
                </p>
              </div>
            </div>
          </li>
        </ul>

        <figure class="features-banner">
          <img src=".<?php echo $imgs ?>features.gif" width="369" height="318" loading="lazy" alt="Features Banner" class="w-100 banner-animation" />
        </figure>

        <ul class="features-list">
          <li>
            <div class="features-card">
              <div class="icon">
                <ion-icon name="code-slash-outline"></ion-icon>
              </div>

              <div class="content">
                <h3 class="h3 title">الحلول البرمجية</h3>

                <p class="text">
                  تواجدك على جميع المنصات بما في ذلك المواقع الإلكترونية أمر
                  حتمي في ذلك الوقت، ولدينا ما يلبي احتياجات عملك ويبرز
                  منتجاتك.
                </p>
              </div>
            </div>
          </li>

          <li>
            <div class="features-card">
              <div class="icon">
                <ion-icon name="rocket-outline"></ion-icon>
              </div>

              <div class="content">
                <h3 class="h3 title">التطور المستمر</h3>

                <p class="text">
                  هدفنا ليس فقط البداية، بل التواجد دائماً بجانبك ومساعدتك
                  على المنافسة بالصفوف الأمامية عن طريق التخطيط طويل المدى.
                </p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>


    <!-- 
        - #FREQUENTLY QUESTIONS
      -->

    <section class="section ceo" id="ceo">
      <div class="container">

        <figure class="ceo-banner">
          <img src=".<?php echo $imgs ?>ceo.JPG" width="700" height="532" loading="lazy" alt="ceo banner" class="w-100" />
        </figure>
        <div class="ceo-content">
          <h2 class="h2 section-title underline">The Founder CEO Word</h2>
          <h1 class="ceo-name">Mr. Mohamed Ali</h1>
          <span class="ceo-position">CEO & Co-Founder</span>
          <p class="ceo-text ceo-text-1">
            أشعر بالفخر بكل النجاحات التي حققناها لنا ولعملائنا.
          </p>

          <p class="ceo-text ceo-text-2">
            إن هذا الشعور بالفخر يجعلني أكثر التزاماً من ذي قبل بالتعلم المستمر والتواصل المستمر والإبداع المستمر والحفاظ على القيم والأسس التي بنيت عليها شركتنا.
          </p>

          <p class="ceo-text ceo-text-3">
            وفي نهاية هذه السطور القليلة أريد أن أعلمكم عن سر نجاحنا، وهو العمل الدؤوب، والتعلم المستمر، والحفاظ على قيمة الإبداع ومواكبة التقدم المذهل في مجال إدارة الأعمال، وذلك من أجل الوصول إلى هدفنا الأسمى، وهو نجاح عملائنا وتقدمهم المستمر، والذي هو في الأساس نجاحنا.
          </p>
        </div>
      </div>
    </section>


    <!-- 
        - #FREQUENTLY QUESTIONS
      -->

    <section class="section frequently" id="frequently">
      <div class="container">
        <div class="frequently-content">
          <h2 class="h2 section-title underline">أكثر الأسئلة شيوعاً</h2>

          <div class="accordion" id="accordionExample">
            <!-- QUESTION #1 -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  ما هو التسويق الرقمي ؟
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                <div class="accordion-body">
                  يُعد التسويق الرقمي، المعروف أيضًا بالتسويق عبر الإنترنت،
                  طريقةً للترويج لعلاماتك التجارية أو منتجاتك أو خدماتك عبر
                  قنوات على الإنترنت، مثل محركات البحث والمواقع الإلكترونية
                  ووسائل التواصل الاجتماعي ورسائل البريد الإلكتروني والندوات
                  عبر الإنترنت وتطبيقات الجهاز المحمول. ببساطة، يتمثل
                  التسويق الرقمي في أي جهد تسويق يحتاج إلى أجهزة إلكترونية
                  وبرامج وإنترنت لإنشاء حملات تسويقية والترويج لها.
                </div>
              </div>
            </div>
            <!-- QUESTION #2 -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  ما هي أهمية التسويق الرقمي ؟
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-mdb-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>
                    يقضي جمهورك في المتوسط أكثر من ست ساعات يوميًا على
                    الإنترنت:
                  </strong>
                  بين تصفح المواقع الإلكترونية ومشاهدة مقاطع الفيديو وقراءة
                  المحتوى على المدوّنات ووسائل التواصل الاجتماعي. من هنا،
                  يُعد التسويق الرقمي طريقةً سهلةً للوصول مباشرةً إلى
                  الجمهور. إذا لم تضع استراتيجية تسويق رقمي لشركتك بعد، فقد
                  حان الوقت لإنشائها.
                </div>
              </div>
            </div>
            <!-- QUESTION #3 -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  ما هي فوائد التسويق الرقمي ؟
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-mdb-parent="#accordionExample">
                <div class="accordion-body">
                  <ul>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      الوصول إلى جمهورك في أي مكان في العالم
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      إنشاء صورة أفضل للعلامة التجارية
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      استهداف الأشخاص الذين يتطابقون مع ملف تعريف العميل
                      المثالي لديك
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      التحكم بشكل أفضل بميزانية التسويق الخاصة بك
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      توفير تجربة مخصصة بشكل كبير
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      الاستفادة من الرؤية العالية لأداء حملتك
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      التفاعل مع جمهورك وإنشاء علاقات مفيدة معه
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      عائد على الاستثمار قابل للقياس
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- QUESTION #4 -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  ما هي أنواع التسويق الرقمي ؟
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-mdb-parent="#accordionExample">
                <div class="accordion-body">
                  <ul>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      تحسين محركات البحث (SEO)
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      تسويق المحتوى
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      التسويق عبر البريد الإلكتروني
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      التسويق عبر الرسائل النصية القصيرة
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      التسويق عبر وسائل التواصل الاجتماعي (SMM)
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      التسويق المدفوع
                    </li>
                    <li>
                      <ion-icon name="checkmark-circle-outline"></ion-icon>
                      الندوات عبر الإنترنت
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <figure class="frequently-banner">
          <img src=".<?php echo $imgs ?>frequently.png" width="700" height="532" loading="lazy" alt="frequently banner" class="w-100 banner-animation" />
        </figure>
      </div>
    </section>

    <!-- 
        - #BLOG
      -->
    <!-- 
        <section class="section blog" id="blog">
          <div class="container">
            <h2 class="h2 section-title underline">Our Blog & News</h2>

            <ul class="blog-list">
              <li>
                <div class="blog-card">
                  <figure class="banner">
                    <a href="#">
                      <img
                        src=".<?php echo $imgs ?>blog-1.jpg"
                        width="750"
                        height="350"
                        loading="lazy"
                        alt="Vestibulum massa arcu, consectetu pellentesque scelerisque."
                        class="img-cover"
                      />
                    </a>
                  </figure>

                  <div class="content">
                    <h3 class="h3 title">
                      <a href="#">
                        Vestibulum massa arcu, consectetu pellentesque
                        scelerisque.
                      </a>
                    </h3>

                    <p class="text">
                      Sed quis sagittis velit. Aliquam velit eros, bibendum ut
                      massa et, consequat laoreet erat nam ac imperdiet.
                    </p>

                    <div class="meta">
                      <div class="publish-date">
                        <ion-icon name="time-outline"></ion-icon>

                        <time datetime="2022-03-07">7 March, 2022</time>
                      </div>

                      <button class="comment" aria-label="Comment">
                        <ion-icon name="chatbubble-outline"></ion-icon>

                        <data value="15">15</data>
                      </button>

                      <button class="share" aria-label="Share">
                        <ion-icon name="share-social-outline"></ion-icon>
                      </button>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div class="blog-card">
                  <figure class="banner">
                    <a href="#">
                      <img
                        src=".<?php echo $imgs ?>blog-2.jpg"
                        width="750"
                        height="350"
                        loading="lazy"
                        alt="Quisque egestas iaculis felis eget placerat ut pulvinar mi."
                        class="img-cover"
                      />
                    </a>
                  </figure>

                  <div class="content">
                    <h3 class="h3 title">
                      <a href="#">
                        Quisque egestas iaculis felis eget placerat ut pulvinar
                        mi.
                      </a>
                    </h3>

                    <p class="text">
                      Sed quis sagittis velit. Aliquam velit eros, bibendum ut
                      massa et, consequat laoreet erat nam ac imperdiet.
                    </p>

                    <div class="meta">
                      <div class="publish-date">
                        <ion-icon name="time-outline"></ion-icon>

                        <time datetime="2022-03-07">7 March, 2022</time>
                      </div>

                      <button class="comment" aria-label="Comment">
                        <ion-icon name="chatbubble-outline"></ion-icon>

                        <data value="15">15</data>
                      </button>

                      <button class="share" aria-label="Share">
                        <ion-icon name="share-social-outline"></ion-icon>
                      </button>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div class="blog-card">
                  <figure class="banner">
                    <a href="#">
                      <img
                        src=".<?php echo $imgs ?>blog-3.jpg"
                        width="750"
                        height="350"
                        loading="lazy"
                        alt="Fusce sem ligula, imperdiet sed nisi sit amet, euismod posuere."
                        class="img-cover"
                      />
                    </a>
                  </figure>

                  <div class="content">
                    <h3 class="h3 title">
                      <a href="#">
                        Fusce sem ligula, imperdiet sed nisi sit amet, euismod
                        posuere.
                      </a>
                    </h3>

                    <p class="text">
                      Sed quis sagittis velit. Aliquam velit eros, bibendum ut
                      massa et, consequat laoreet erat nam ac imperdiet.
                    </p>

                    <div class="meta">
                      <div class="publish-date">
                        <ion-icon name="time-outline"></ion-icon>

                        <time datetime="2022-03-07">7 March, 2022</time>
                      </div>

                      <button class="comment" aria-label="Comment">
                        <ion-icon name="chatbubble-outline"></ion-icon>

                        <data value="15">15</data>
                      </button>

                      <button class="share" aria-label="Share">
                        <ion-icon name="share-social-outline"></ion-icon>
                      </button>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div class="blog-card">
                  <figure class="banner">
                    <a href="#">
                      <img
                        src=".<?php echo $imgs ?>blog-4.jpg"
                        width="750"
                        height="350"
                        loading="lazy"
                        alt="Donec feugiat mollis nisi in dignissim. Morbi sollicitudin quis."
                        class="img-cover"
                      />
                    </a>
                  </figure>

                  <div class="content">
                    <h3 class="h3 title">
                      <a href="#">
                        Donec feugiat mollis nisi in dignissim. Morbi
                        sollicitudin quis.
                      </a>
                    </h3>

                    <p class="text">
                      Sed quis sagittis velit. Aliquam velit eros, bibendum ut
                      massa et, consequat laoreet erat nam ac imperdiet.
                    </p>

                    <div class="meta">
                      <div class="publish-date">
                        <ion-icon name="time-outline"></ion-icon>

                        <time datetime="2022-03-07">7 March, 2022</time>
                      </div>

                      <button class="comment" aria-label="Comment">
                        <ion-icon name="chatbubble-outline"></ion-icon>

                        <data value="15">15</data>
                      </button>

                      <button class="share" aria-label="Share">
                        <ion-icon name="share-social-outline"></ion-icon>
                      </button>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>
        -->
  </article>
</main>

<?php
include $templates . 'footer.php';
ob_end_flush();
?>