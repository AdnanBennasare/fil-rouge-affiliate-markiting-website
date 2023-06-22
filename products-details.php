<?php

include_once('my admin/AdminDashboard/Managers/GestionCategory.php');
include_once('my admin/AdminDashboard/Managers/GestionType.php');
include_once('my admin/AdminDashboard/Managers/GestionProducts.php');


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


    <!-- ======================== Header ======================= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="Ui/assets/img/logo.png" alt="">

            </a>
            <!-- ----------------- START OF NAV ---------------- -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>

                    <!---- bringing all 3 main category  ----->
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

                            <!---- bringing all the types in that category  ----->

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

                    <li class="dropdown"><a><span>All Categories</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <!---- bringing all the other categorys  ----->

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



    <?php
    if (isset($_GET['Product_Id'])) {

        //  taking the product
        $product = $gestionProducts->RechercherParId($_GET['Product_Id']);
        //  getting all the affiliate links in that product
        $Links = $gestionProducts->Getallaffiliateslinks($_GET['Product_Id']);
        //  getting the type name of that product
        $type_Name = $gestionTypes->FetchTypeName($product->getTypeID());

    }
    ?>

    <main id="main">
        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 post-content" data-aos="fade-up">

                        <!-- showing the product here -->
                        <div class="mt-4">
                            <h2 class="products-h2 mb-2">
                                <?= $product->getName() ?>
                            </h2>
                            <h5>
                                <?= $product->getBrand() ?>
                            </h5>
                            <p class="mb-5">
                                <?php echo $type_Name ?>
                            </p>
                            <div class="d-md-flex post-entry-2 half gap-5">
                                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                    <img src="<?= $product->getImage_URL() ?>" alt="" height="260px"
                                        style="max-width: 100%" class="">
                                </div>
                                <div
                                    class="link-button col-lg-3 d-flex flex-column justify-content-center align-items-center gap-2">
                                    <?php
                                    if (isset($_GET['Product_Id'])) {
                                        if ($Links !== null) {
                                            foreach ($Links as $Link) {
                                                //  getting all its affiliate links 
                                                ?>
                                                <a target="_blank" href="<?= $Link->getAffiliate_Link() ?>" class="btn btn-warning"
                                                    style="width: 200px; background-color: #dba24e;">
                                                    <strong> <?= $Link->getPrice() ?>$</strong> At
                                                    <?= $Link->getAffiliate_Name() ?>
                                                   
                                                </a>
                                                <?php
                                            }
                                        } else {
                                            echo "there is no links yet for this product";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div>
                                <h5><strong>
                                        <?= $product->getTag() ?>
                                    </strong></h5>
                                <p>
                                    <?= $product->getBottom_Line() ?>
                                </p>
                                <p><strong>Pros:</strong>
                                    <?= $product->getPROS() ?>
                                </p>
                                <p><strong>Cons:</strong>
                                    <?= $product->getCONS() ?>
                                </p>
                            </div>
                        </div>



                        <?php
                        if (isset($_GET['Typeid'])) {
                            $typeId = $_GET['Typeid'];
                            //  getting the type name 
                        
                            $type_Name = $gestionTypes->FetchTypeName($typeId);
                            //  getting all the product that are in the same type as the one that were clicked on
                            $OtherProducts = $gestionProducts->getProductsByType($typeId);

                            if (!empty($OtherProducts)) {
                                foreach ($OtherProducts as $index => $OtherProduct) {
                                    // excluding the main product here to avoid repeating
                                    if ($OtherProduct['Product_Id'] != $_GET['Product_Id'] & $index < 5) {
                                        //  getting all its affiliate links 
                        
                                        $Links = $gestionProducts->Getallaffiliateslinks($OtherProduct['Product_Id']);
                                        ?>

                                        <div style="border-top: 1px solid #000;"></div>
                                        <div class="mt-5" style="width: 100px; height: 5px; background-color: #dea14b;"></div>
                                        <div class="mt-4">
                                            <h2 class="mb-2">
                                                <?php echo $OtherProduct['Product_Name'] ?>
                                            </h2>
                                            <h5>
                                                <?php echo $OtherProduct['Brand'] ?>
                                            </h5>
                                            <p class="mb-5">
                                                <?php echo $type_Name ?>
                                            </p>
                                            <div class="d-md-flex post-entry-2 half gap-5">
                                                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                                    <img src="<?php echo $OtherProduct['Image_URL'] ?>" alt="" height="260px"
                                                        style="max-width: 100%" class="">
                                                </div>
                                                <div
                                                    class="link-button col-lg-3 d-flex flex-column justify-content-center align-items-center gap-2">
                                                    <?php

                                                    if ($Links !== null) {
                                                        foreach ($Links as $Link) {
                                                            //  showing all its affiliate links 
                                    
                                                            ?>
                                                            <a href="<?= $Link->getAffiliate_Link() ?>" class="btn btn-warning"
                                                                style="width: 200px; background-color: #dba24e;">
                                                                <strong><?= $Link->getPrice() ?>$</strong> At
                                                                <?= $Link->getAffiliate_Name() ?>
                                                            </a>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo "No links for this product";
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div>
                                                <h5><strong>
                                                        <?php echo $OtherProduct['Tag'] ?>
                                                    </strong></h5>
                                                <p>
                                                    <?php echo $OtherProduct['Bottom_Line'] ?>
                                                </p>
                                                <p><strong>Pros:</strong>
                                                    <?php echo $OtherProduct['PROS'] ?>
                                                </p>
                                                <p><strong>Cons:</strong>
                                                    <?php echo $OtherProduct['CONS'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </div>

                    <!-- ============ OTHER RELATED PRODUCTS ======= -->
                    <div class="col-lg-3">
                        <div class="trending">
                            <h4>Other Related Products</h4>
                            <ul class="trending-post">
                                <?php foreach ($OtherProducts as $index => $OtherProduct) { ?>
                                    <?php if ($index > 4 & $index < 10) { ?>

                                        <li>
                                            <a
                                                href="products-details.php?Product_Id=<?php echo $OtherProduct['Product_Id'] ?>&Typeid=<?php echo $OtherProduct['Type_Id'] ?>">
                                                <div class="d-flex gap-5">
                                                    <div>
                                                        <img src="<?php echo $OtherProduct['Image_URL'] ?>" alt=""
                                                            class="img-fluid" width="160px">
                                                    </div>

                                                    <div>
                                                        <h3>
                                                            <?php echo $OtherProduct['Product_Name'] ?>
                                                        </h3>
                                                        <span class="author">
                                                            <?php echo $OtherProduct['Tag'] ?>
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
        </section>
    </main><!-- End #main -->




    <!-- ======= Footer ======= -->
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




                    <!-- Navigation in the footer -->

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
                                    <li><a href="category.php?categoryid=<?= $Category->getId() ?>"><i
                                                class="bi bi-chevron-right"></i>
                                            <?= $Category->getCategory() ?>
                                        </a></li>


                                    <?php
                                }
                            }
                            ?>

                            <li><a href="index.html"><i class="bi bi-chevron-right"></i> About</a></li>
                        </ul>
                    </div>


                    <!-- Categories in the footer -->

                    <div class="col-6 col-lg-2">
                        <h3 class="footer-heading">Categories</h3>
                        <ul class="footer-links list-unstyled">
                            <?php
                            foreach ($Categorys as $index => $Category) {
                                if ($index < 10) {
                                    ?>
                                    <li><a href="category.php?categoryid=<?= $Category->getId() ?>"><i
                                                class="bi bi-chevron-right"></i>
                                            <?= $Category->getCategory() ?>
                                        </a></li>

                                <?php }
                            } ?>

                        </ul>
                    </div>



                    <!-- Other Product in the footer -->
                    <div class="col-lg-4">
                        <h3 class="footer-heading">Other Products</h3>
                        <ul class="footer-links footer-blog-entry list-unstyled">

                            <?php foreach ($OtherProducts as $index => $product) { ?>
                                <?php if ($index > 0 & $index < 5) { ?>

                                    <li>
                                        <a href="single-post.html" class="d-flex align-items-center">
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




        <!-- Social media -->

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