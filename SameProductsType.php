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



  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">

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


  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="Ui/assets/img/logo.png" alt="">
      </a>





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

          <li class="dropdown"><a><span>All Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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
  // ------------   if filtring by TYPE ----------------
  if (isset($_GET['Typeid'])) {

    $typeId = $_GET['Typeid'];
    // Getting all the products in the type
    $Products = $gestionProducts->getProductsByType($typeId);
    // Getting the gategory details
    $categoryDetails = $gestionProducts->getCategoryDetails($typeId);
    $categoryId = $categoryDetails['Category_ID'];
    $CategoryName = $categoryDetails['Category_Name'];
    // Getting type name
    $type_Name = $gestionTypes->FetchTypeName($typeId);


     // ------------   if filtring by CATEGORY ----------------
  } elseif (isset($_GET['CategoryId'])) {

    $CategoryId = $_GET['CategoryId'];
    // Getting all the productds in that category
    $Products = $gestionProducts->getProductsByCategory($CategoryId);
    // Getting gategory details
    $Categorynm = $gestionCategorys->RechercherParId($CategoryId);
    $categoryName = $Categorynm->getCategory();

  } else {
    $Products = []; // Set default empty array if Typeid is not set or CategoryId is not set
  }

  $itemsPerPage = 3;
  $totalPages = ceil(count($Products) / $itemsPerPage);

  $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
  $startIndex = ($currentPage - 1) * $itemsPerPage;
  $endIndex = $startIndex + $itemsPerPage - 1;
  ?>




  <main id="main">
    <section>
      <div class="container">
        <div class="row col-12">

        <!-- Displaying the Category name and type name  -->
          <?php if (isset($_GET['Typeid'])) {

            ?>
            <h2 class="category-title"><strong>Category:</strong>
              <?php echo $CategoryName ?>
            </h2>
            <h2 class="category-title"><strong>Type:</strong>
              <?php echo $type_Name ?>
            </h2>

            <?php
          } elseif (isset($_GET['CategoryId'])) {


            ?>
            <h3 class="category-title">Category:
              <?php echo $categoryName ?>
            </h3>

            <?php
          }
          ?>


          <div class="col-md-8" data-aos="fade-up">
            <?php
            if (!empty($Products)) {
              foreach ($Products as $index => $product) {
                if ($index >= $startIndex && $index <= $endIndex) {
                  // Display product content here
                  ?>
                  <div class="d-md-flex post-entry-2 half">
                    <a href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>"
                      class="me-4 thumbnail">

                      <div class="d-flex justify-content-center align-items-center">

                        <img src="<?php echo $product['Image_URL'] ?>" alt="" height="230px" style="max-width: 100%" class="">

                      </div>
                    </a>
                    <div>
                      <a href="products-details.php?Product_Id=<?php echo $product['Product_Id'] ?>&Typeid=<?php echo $product['Type_Id'] ?>"
                        class="me-4 thumbnail">
                        <div class="post-meta"><span class="date">
                            <?php echo $product['Tag'] ?>
                          </span> <span class="mx-1">&bullet;</span></div>
                        <h3>
                          <?php echo $product['Product_Name'] ?>
                        </h3>
                        <p>
                          <?php echo $product['Bottom_Line'] ?>
                        </p>
                      </a>

                    </div>
                  </div>
                  <?php
                }
              }
              // --------------------- Pagination links----------------------------
              ?>
              <div class="text-start py-4">
                <div class="custom-pagination">
                  <?php if ($currentPage > 1 && isset($typeId)) { ?>
                    <a href="?Typeid=<?php echo $typeId; ?>&page=<?php echo $currentPage - 1; ?>" class="prev">Previous</a>
                  <?php } ?>

                  <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <?php if (isset($typeId)) { ?>
                      <a href="?Typeid=<?php echo $typeId; ?>&page=<?php echo $i; ?>"
                        class="<?php echo $i === $currentPage ? 'active' : ''; ?>"><?php echo $i; ?></a>
                    <?php } elseif (isset($CategoryId)) { ?>
                      <a href="?CategoryId=<?php echo $CategoryId; ?>&page=<?php echo $i; ?>"
                        class="<?php echo $i === $currentPage ? 'active' : ''; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                  <?php } ?>

                  <?php if ($currentPage < $totalPages && isset($typeId)) { ?>
                    <a href="?Typeid=<?php echo $typeId; ?>&page=<?php echo $currentPage + 1; ?>" class="next">Next</a>
                  <?php } ?>
                </div>
              </div>
              <?php
            } else {
              echo "No products found.";
            }
            ?>
          </div>



          <!-- OTHER RELATED PRODUCTS -->
          <div class="col-lg-3">
            <div class="trending">
              <h4>Other related Products</h4>
              <ul class="trending-post">

                <?php
                // Bringing the category id by the type id to i can show all the product in that category
                if (isset($_GET['Typeid'])) {
                  $TypeDetails = $gestionTypes->RechercherParId($_GET['Typeid']);
                  $CategoryId = $TypeDetails->getCategory();
                  $ProductsOtherProducts = $gestionProducts->getProductsByCategory($CategoryId);

                } elseif (isset($_GET['CategoryId'])) {

                  $ProductsOtherProducts = $gestionProducts->getProductsByCategory($_GET['CategoryId']);
                }

                foreach ($ProductsOtherProducts as $index => $ProductsOtherProduct) {
                  ?>
                  <?php if ($index > 8 & $index < 14) { ?>

                    <li>
                      <a
                        href="products-details.php?Product_Id=<?php echo $ProductsOtherProduct['Product_Id'] ?>&Typeid=<?php echo $ProductsOtherProduct['Type_Id'] ?>">
                        <div class="d-flex gap-5">
                          <div>
                            <img src="<?php echo $ProductsOtherProduct['Image_URL'] ?>" alt="" class="img-fluid"
                              width="160px">
                          </div>

                          <div>
                            <h3>
                              <?php echo $ProductsOtherProduct['Product_Name'] ?>
                            </h3>
                            <span class="author">
                              <?php echo $ProductsOtherProduct['Tag'] ?>
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
      </div>
    </section>
  </main><!-- End #main -->

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



          <!------------- Navigation in the footer ---------------->

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


          <!------------------ Categories in the footer --------------->

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



          <!-------------- Other Product in the footer ------------->
          <div class="col-lg-4">
            <h3 class="footer-heading">Other Products</h3>
            <ul class="footer-links footer-blog-entry list-unstyled">

              <?php foreach ($ProductsOtherProducts as $index => $product) { ?>
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












<!-- Button to scroll all the way up -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <script src="Ui/vendor/aos/aos.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="Ui/js/main.js"></script>


  <script src="Ui/js/subscribe.js"></script>

  <script>

    AOS.init();

  </script>
</body>

</html>