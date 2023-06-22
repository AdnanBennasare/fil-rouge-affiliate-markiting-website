<?php
include_once('my admin/AdminDashboard/Managers/GestionProducts.php');
include_once('my admin/AdminDashboard/Managers/GestionCategory.php');
include_once('my admin/AdminDashboard/Managers/GestionType.php');


// brin all the categories
$gestionCategorys = new GestionCategory();
$Categorys = $gestionCategorys->RechercherTous();
$gestionProducts = new GestionProduct();
$gestionTypes = new GestionTypes();

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prime review</title>
  <link rel="icon" href="Ui/assets/img/OnlyLogo.png" type="image/png">

  <!-- swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


  <!-- styles -->
  <link rel="stylesheet" href="Ui/styles/style.css">
  <link rel="stylesheet" href="Ui/styles/variables.css">
  <link rel="stylesheet" href="Ui/styles/preloader.css">


  <!-- aos -->
  <link rel="stylesheet" href="Ui/vendor/aos/aos.css">

</head>

<body>
<div class="preloader-wrapper">
    <div class="preloder">
      <div class="shape shape-1"></div>
      <div class="shape shape-2"></div>
      <div class="shape shape-3"></div>
      <div class="shape shape-4"></div>
    </div>
  </div>
  <!-- ======================== Header ==================== -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="Ui/assets/img/logo.png" alt="">
      </a>
      <!-- ----------------- START OF NAV ---------------- -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>


          <?php
          foreach ($Categorys as $Category) {
            if (
              $Category->getCategory() == "Electronics" ||
              $Category->getCategory() == "Beauty & Care" ||
              $Category->getCategory() == "Home & Kitchen"
            ) {
              ?>

              <li class="dropdown"><a><span>
                    <?= $Category->getCategory() ?>
                  </span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <?php

                  $CategorysTypes = $gestionTypes->FetchTypesByCategory($Category->getId());

                  foreach ($CategorysTypes as $CategorysType) {
                    ?>
                    <li><a href="SameProductsType.php?Typeid=<?= $CategorysType->getId() ?>"><?= $CategorysType->getType() ?></a></li>
                  <?php } ?>
                </ul>
              </li>


              <?php
            }
          }
          ?>

          <li><a href="about.php">About</a></li>

          <li class="dropdown"><a><span>All Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <?php foreach ($Categorys as $Category) {
                if (
                  $Category->getCategory() != "Electronics" &&
                  $Category->getCategory() != "Beauty & Care" &&
                  $Category->getCategory() != "Home & Kitchen"
                ) {
                  ?>
                  <li><a href="SameProductsType.php?CategoryId=<?= $Category->getId() ?>"><?= $Category->getCategory() ?></a>
                  </li>
                  <?php
                }
              } ?>
            </ul>
          </li>
        </ul>
      </nav><!-- END OF NAV -->
      <div class="navElements d-flex">
        <div class="position-relative mt-2">
          <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
          <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
          <a href="#" class="mx-2"><span class="bi-instagram"></span></a>
        </div>

        <a href="search-page.php" class="mx-2 js-search-open mt-2"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle mt-1"></i>
      </div>
    </div>
  </header><!-- End Header -->






  <main id="main">
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in" data-aos-duration="1700">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <?php
                  foreach ($Categorys as $Category) {
                    if ($Category->getCategory() == "Home & Kitchen") {
                      ?>

                      <a href="SameProductsType.php?CategoryId=<?= $Category->getId() ?>"
                        class="img-bg d-flex align-items-end"
                        style="background-image: url('<?= $Category->getCategoryImg() ?>');">
                        <div class="img-bg-inner">
                          <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae
                            minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore
                            repudiandae quidem necessitatibus rem atque.</p>
                        </div>
                      </a>
                      <?php
                    }
                  }
                  ?>
                </div>

                <div class="swiper-slide">

                  <?php
                  foreach ($Categorys as $Category) {
                    if ($Category->getCategory() == "Beauty & Care") {
                      ?>

                      <a href="SameProductsType.php?CategoryId=<?= $Category->getId() ?>"
                        class="img-bg d-flex align-items-end"
                        style="background-image: url('<?= $Category->getCategoryImg() ?>');">
                        <div class="img-bg-inner">
                          <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2>
                          <p>Lorem ipsum dolor sit amet, </p>
                        </div>
                      </a>

                      <?php
                    }
                  }
                  ?>

                </div>

                <div class="swiper-slide">

                  <?php
                  foreach ($Categorys as $Category) {
                    if ($Category->getCategory() == "Electronics") {
                      ?>

                      <a href="SameProductsType.php?CategoryId=<?= $Category->getId() ?>"
                        class="img-bg d-flex align-items-end"
                        style="background-image: url('<?= $Category->getCategoryImg() ?>');">
                        <div class="img-bg-inner">
                          <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2>
                          <p>Lorem ipsum dolor sit amet, </p>
                        </div>
                      </a>

                      <?php
                    }
                  }
                  ?>
                </div>

                <div class="swiper-slide">

                  <?php
                  foreach ($Categorys as $Category) {
                    if ($Category->getCategory() == "gaming") {
                      ?>

                      <a href="SameProductsType.php?CategoryId=<?= $Category->getId() ?>"
                        class="img-bg d-flex align-items-end"
                        style="background-image: url('<?= $Category->getCategoryImg() ?>');">
                        <div class="img-bg-inner">
                          <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2>
                          <p>Lorem ipsum dolor sit amet, </p>
                        </div>
                      </a>

                      <?php
                    }
                  }
                  ?>

                </div>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->
  </main>




  <!-- ============== ELECTRONICS SECTION ================== -->
  <section id="posts" class="posts">
    <div class="container" data-aos="fade-up">

    <!-- Bringing the category name -->
      <?php
      foreach ($Categorys as $Category) {
        if ($Category->getCategory() == "Electronics") {

          $Products = $gestionProducts->getOneProductPerType($Category->getId())

            ?>
          <div style="border-top: 1px solid #040F3D;"></div>
          <div class="mt-5" style="width: 100px; height: 5px; background-color: #DEA14B;"></div>
          <h2 class="section-h2 mb-5">
            <?= $Category->getCategory() ?>
          </h2>


          <?php
        }
      }
      ?>


<!-- Bringing one product from each type  -->
      <div class="row g-5">
        <div class="col-lg-4">
          <?php foreach ($Products as $index => $product) { ?>
            <?php if ($index < 2) { ?>

              <div class="post-entry-1 lg">
                <a
                  href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>"><img
                    src="<?php echo $product['Image_URL'] ?>" alt="" class="img-fluid"></a>
                <a
                  href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>">
                  <div class="post-meta"><span class="date">
                      <?php echo $product['Tag'] ?>
                    </span> <span class="mx-1">&bullet;</span></div>
                  <h3>
                    <?php echo $product['Product_Name'] ?>
                  </h3>
                  <p class="mb-4 d-block">
                    <?php echo $product['Bottom_Line'] ?>
                  </p>
                </a>
              </div>
            <?php } ?>
          <?php } ?>

        </div>



        <div class="col-lg-8">
          <div class="row g-5">
            <div class="col-lg-4 border-start custom-border">

              <?php foreach ($Products as $index => $product) { ?>
                <?php if ($index > 2 & $index < 6) { ?>
                  <div class="post-entry-1">
                    <a
                      href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>"><img
                        src="<?php echo $product['Image_URL'] ?>" alt="" class="img-fluid"></a>
                    <a
                      href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>">

                      <div class="post-meta"><span class="date">
                          <?php echo $product['Tag'] ?>
                        </span> <span class="mx-1">&bullet;</span></div>
                      <h2>
                        <?php echo $product['Product_Name'] ?>
                      </h2>
                    </a>

                  </div>

                <?php } ?>
              <?php } ?>

            </div>





            <div class="col-lg-4 border-start custom-border">
              <?php foreach ($Products as $index => $product) { ?>
                <?php if ($index > 5 & $index < 9) { ?>

                  <div class="post-entry-1">
                    <a
                      href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>"><img
                        src="<?php echo $product['Image_URL'] ?>" alt="" class="img-fluid"></a>
                    <a
                      href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>">


                      <div class="post-meta"><span class="date">
                          <?php echo $product['Tag'] ?>
                        </span> <span class="mx-1">&bullet;</span></div>
                      <h2>
                        <?php echo $product['Product_Name'] ?>
                      </h2>
                    </a>
                  </div>


                <?php } ?>
              <?php } ?>



            </div>

            <!---- Trending Section OF ELECTRONICS SECTION ----->
            <div class="col-lg-4">

              <div class="trending">
                <h4>Other Related Products</h4>
                <ul class="trending-post">

                  <?php foreach ($Products as $index => $product) { ?>
                    <?php if ($index > 8 & $index < 15) { ?>


                      <li>
                        <a
                          href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>">
                          <h3>
                            <?php echo $product['Product_Name'] ?>
                          </h3>
                          <h3>
                            <?php echo $product['Brand'] ?>
                          </h3>
                          <p>
                            <?php
                            echo $product['CONS'];
                            ?>
                          </p>

                        </a>
                      </li>

                    <?php } ?>
                  <?php } ?>


                </ul>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ======= END OF ELECTRONICS SECTION ======= -->




  
  <!-- ============= BEAUTY & CARE SECTION ====================  -->

  <div class="container mb-4" data-aos="fade-up">
    <!-- bringing the name of category -->
    <?php
    foreach ($Categorys as $Category) {
      if ($Category->getCategory() == "Beauty & Care") {

        $BeautyCategoryProducts = $gestionProducts->getOneProductPerType($Category->getId());

        ?>
        <div style="border-top: 1px solid #000;"></div>
        <div class="mt-5" style="width: 100px; height: 5px; background-color: #dea14b;"></div>
        <h2 class="section-h2 mb-5">
          <?= $Category->getCategory() ?>
        </h2>


        <?php
      }
    }
    ?>


<!-- Bringing one product from each type  -->

    <div class="col-lg-12">
      <div class="row">
        <?php foreach ($BeautyCategoryProducts as $index => $productBeauty) { ?>
          <?php if ($index < 3) { ?>

            <div class="col-lg-3 border-start custom-border">

              <div class="post-entry-1">
                <a
                  href="products-details.php?Product_Id=<?php echo $productBeauty['Product_Id'] ?>&Typeid=<?php echo $productBeauty['Type_Id'] ?>"><img
                    src="<?php echo $productBeauty['Image_URL'] ?>" alt="" class="img-fluid"></a>
                <a
                  href="products-details.php?Product_Id=<?php echo $productBeauty['Product_Id'] ?>&Typeid=<?php echo $productBeauty['Type_Id'] ?>">

                  <div class="post-meta"><span class="date">
                      <?php echo $productBeauty['Tag'] ?>
                    </span> <span class="mx-1">&bullet;</span></div>
                  <h2>
                    <?php echo $productBeauty['Product_Name'] ?>
                  </h2>
                  <p class="mb-4 d-block">
                    <?php echo $productBeauty['Bottom_Line'] ?>
                  </p>
                </a>
              </div>
            </div>

          <?php } ?>
        <?php } ?>



        <!-- Trending Section for beauty and care -->
        <div class="col-lg-3">
          <div class="trending">
            <h4>Other Related Products</h4>
            <ul class="trending-post">


              <?php foreach ($BeautyCategoryProducts as $index => $productBeauty) { ?>
                <?php if ($index > 2 & $index < 5) { ?>

                  <li>
                    <a
                      href="products-details.php?Product_Id=<?php echo $productBeauty['Product_Id'] ?>&Typeid=<?php echo $productBeauty['Type_Id'] ?>">
                      <div class="d-flex gap-5">
                        <div>
                          <img src="<?php echo $productBeauty['Image_URL'] ?>" alt="" class="img-fluid" width="160px">
                        </div>

                        <div>
                          <h3>
                            <?php echo $productBeauty['Product_Name'] ?>
                          </h3>
                          <span class="author">
                            <?php echo $productBeauty['Tag'] ?>
                          </span>
                        </div>
                      </div>
                    </a>
                  </li>

                <?php } ?>
              <?php } ?>

            </ul>
          </div>

        </div>

      </div>
    </div>

  </div>

  <!-- ----- END OF BEAUTY & CARE SECTION ------ -->













  <!-- ============= HOME & KITCHEN CATEGORY ====================  -->


  <div class="container" data-aos="fade-up">


    <!-- bringing the name of category -->

    <?php
    foreach ($Categorys as $Category) {
      if ($Category->getCategory() == "Home & Kitchen") {

        $HomeCategoryProducts = $gestionProducts->getOneProductPerType($Category->getId());

        ?>
        <div style="border-top: 1px solid #000;"></div>
        <div class="mt-5" style="width: 100px; height: 5px; background-color: #dea14b;"></div>
        <h2 class="section-h2 mb-5">
          <?= $Category->getCategory() ?>
        </h2>


        <?php
      }
    }
    ?>


    <div class="col-lg-12">
      <div class="row">

        <?php foreach ($HomeCategoryProducts as $index => $productHome) { ?>
          <?php if ($index < 1) { ?>

            <div class="col-lg-8 border-start custom-border">
              <div class="post-entry-1">
                <a
                  href="products-details.php?Product_Id=<?php echo $productHome['Product_Id'] ?>&Typeid=<?php echo $productHome['Type_Id'] ?>"><img
                    src="<?php echo $productHome['Image_URL'] ?>" alt="" class="img-fluid"></a>
                <a
                  href="products-details.php?Product_Id=<?php echo $productHome['Product_Id'] ?>&Typeid=<?php echo $productHome['Type_Id'] ?>">

                  <div class="post-meta"><span class="date">
                      <?php echo $productHome['Tag'] ?>
                    </span> <span class="mx-1">&bullet;</span></div>
                  <h2>
                    <?php echo $productHome['Product_Name'] ?>
                  </h2>
              </div>
              </a>
            </div>

          <?php } ?>
        <?php } ?>




        <!--Other related products  -->
        <div class="col-lg-4">

          <div class="trending">
            <h4>Other Related products</h4>

            <ul class="trending-post">

              <?php foreach ($HomeCategoryProducts as $index => $productHome) { ?>
                <?php if ($index > 0 & $index < 4) { ?>

                  <li>
                    <a
                      href="products-details.php?Product_Id=<?php echo $productHome['Product_Id'] ?>&Typeid=<?php echo $productHome['Type_Id'] ?>">




                      <div class="d-flex gap-5">
                        <div>
                          <img src="<?php echo $productHome['Image_URL'] ?>" alt="" class="img-fluid" width="160px">
                        </div>

                        <div>
                          <h3>
                            <?php echo $productHome['Product_Name'] ?>
                          </h3>
                          <span class="author">
                            <?php echo $productHome['Tag'] ?>
                          </span>
                        </div>
                      </div>



                    </a>
                  </li>

                <?php } ?>
              <?php } ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- ================================ Footer =================================== -->
  <footer id="footer" class="footer mt-5">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">

        <!-- -------------ABOUT SECTION------- -->
          <div class="col-lg-4">
            <h3 class="footer-heading">To get the latest products and stay updated, subscribe now!</h3>
            <p>
              Stay informed about our newest products and releases and
              Be the first to know about exclusive offers and discounts
              you will also be able to Get access to exciting updates and upcoming events.
            </p>
            <form method="post" id="subscribeForm" class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                  required>
                <div class="invalid-feedback">
                  Please provide a valid email.
                </div>
              </div>
              <button type="submit" id="subscribeButton" class="btn btn-primary">Subscribe</button>
            </form>
            <div class="valid-feedback" id="successMessage"></div>
          </div>

          <!------------- Navigation in the footer -------------->
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="index.html"><i class="bi bi-chevron-right"></i> Home</a></li>
              <?php
              foreach ($Categorys as $Category) {
                if (
                  $Category->getCategory() == "Electronics" ||
                  $Category->getCategory() == "Beauty & Care" ||
                  $Category->getCategory() == "Home & Kitchen"
                ) {
                  ?>
                  <li><a href="category.php?categoryid=<?= $Category->getId() ?>"><i class="bi bi-chevron-right"></i>
                      <?= $Category->getCategory() ?>
                    </a></li>


                  <?php
                }
              }
              ?>

              <li><a href="index.html"><i class="bi bi-chevron-right"></i> About</a></li>
            </ul>
          </div>


          <!----------- Categories in the footer --------------->
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Categories</h3>
            <ul class="footer-links list-unstyled">
              <?php
              foreach ($Categorys as $index => $Category) {
                if ($index < 10) {
                  ?>
                  <li><a href="category.php?categoryid=<?= $Category->getId() ?>"><i class="bi bi-chevron-right"></i>
                      <?= $Category->getCategory() ?>
                    </a></li>

                <?php }
              } ?>

            </ul>
          </div>



          <!--------------- Other Product in the footer ---------------->
          <div class="col-lg-4">
            <h3 class="footer-heading">Other Products</h3>
            <ul class="footer-links footer-blog-entry list-unstyled">

              <?php foreach ($Products as $index => $product) { ?>
                <?php if ($index > 8 & $index < 13) { ?>

                  <li>
                    <a href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>"
                      class="d-flex align-items-center">
                      <img src="<?php echo $product['Image_URL'] ?>" alt="" class="img-fluid me-3">
                      <div>
                        <div class="post-meta d-block"><span class="date">
                            <?php echo $product['Tag'] ?>
                          </span> <span class="mx-1">&bullet;</span></div>
                        <span>
                          <?php echo $product['Product_Name'] ?>
                        </span>
                      </div>
                    </a>
                  </li>

                <?php } ?>
              <?php } ?>

            </ul>
          </div>
        </div>
      </div>
    </div>




    <!-------------- Social media & copy right ------------->

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>Solicode</span></strong>. All Rights Reserved
            </div>
          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>




  <!-- Button to go all the way up -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <script src="Ui/vendor/aos/aos.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="Ui/js/main.js"></script>

  <script>

    AOS.init();

  </script>

  <script src="Ui/js/subscribe.js"></script>



</body>

</html>