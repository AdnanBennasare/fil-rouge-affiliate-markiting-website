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
        <section class="single-post-content">
            <div class="container-sm">
                <div class="row">
                    <div class="col-md-12 post-content" data-aos="fade-up">
                        <h2>Search</h2>
                        <p>
                            You can search the Prime reviewer articles by type name (search for
                            "Fans"), Prodcut (search for "pes5"), or other attributes.
                        </p>
                        <div class="search-input">
                            <form id="filterForm" action="">
                                <input id="filterInput" class="form-control" type="text">
                            </form>
                        </div>
                        <h4 class="mb-4 mt-2">
                            SEARCH RESULTS
                        </h4>
                        <div id="content-div" class="col-sm-12">
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </main><!-- End #main -->


    <!-- the list that the products are going to be displayed on -->
    <div id="productList">

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


    <script src="Ui/vendor/aos/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="Ui/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        AOS.init();

    </script>


    <script>
        $(document).ready(function () {
            $('#filterInput').on('input', function () {
                var filterValue = $(this).val();
                console.log(filterValue);
                var url = 'get_products.php'; // Replace with the actual server-side script URL

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: { filterValue: filterValue },

                    success: function (response) {
                        // Handle the response and update the product list
                        var productList = response; // Assuming the response is already parsed JSON
                        console.log(productList);

                        // Clear the existing content of the content-div element
                        $('#content-div').html('');

                        // Loop through the productList array and display the products
                        productList.forEach(function (product) {
                            // Extract the product details
                            var productId = product.Product_Id;
                            var productImage = product.Image_URL;
                            var productName = product.Product_Name;
                            var bottomLine = product.Bottom_Line;
                            var typeId = product.Type_Id;
                            // Create the HTML structure for the product and append it to the content-div element
                            var productHTML = `
                            <div class="d-md-flex post-entry-2 half gap-5">
                            <div class="col-lg-3 d-flex justify-content-center align-items-center">
                            <a href="products-details.php?Product_Id=${productId}&Typeid=${typeId}">
                            <img src="${productImage}" alt="" height="120px" style="max-width: 100%" class="">
                            </a>
                            </div>
                            <div class="link-button col-lg-8 d-flex flex-column justify-content-center align-items-center gap-2">
                            <h3>${productName}</h3>
                            <p class="p-2">${bottomLine}</p>
                            </div>
                            </div>
                            <div class="mt-5" style="border-top: 2px solid #d9d9d9;"></div>
                            <div class="mt-3 mb-5" style="width: 100px; height: 5px; background-color: #dea14b;"></div>`;

                            $('#content-div').append(productHTML);
                        });
                    },


                    error: function (xhr, status, error) {
                        // Handle any errors
                        console.error(error);
                    }
                });
            });
        });
    </script>




<script src="Ui/js/subscribe.js"></script>


</body>

</html>