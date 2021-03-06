<?php
var_dump(22);
include './class/include.php';

$PRODUCT_CATEGORIES = new ProductCategories(NULL);
?>
<!DOCTYPE HTML>
<html lang="en-US"> 
    <head>

        <title>FRESHCART.LK</title>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="noodp,index,follow" />
        <meta name='revisit-after' content='1 days' />

        <link rel="icon" href="images/logo-favicon.png" type="images/logo-favicon.png">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/libs/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/font-linearicons.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-theme.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/jquery.fancybox.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/owl.transitions.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/owl.theme.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/query.mCustomScrollbar.html"/>
        <link rel="stylesheet" type="text/css" href="css/libs/settings.css"/>
        <link rel="stylesheet" type="text/css" href="css/theme.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all"/>
        <!-- <link rel="stylesheet" type="text/css" href="css/rtl.css" media="all"/> -->
        <link href="control-panel/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>

        <link href="css/modle-login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="wrap">
            <?php include './header.php'; ?> 
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 hidden-sm hidden-xs">
                            <div class="wrap-category-hover4">
                                <div class="inner-category-hover4">
                                    <h2 class="title-category-hover"><span>Categories</span></h2>
                                    <ul class="list-category-hover">
                                        <?php
                                        foreach ($PRODUCT_CATEGORIES->all() as $product_categories) {
                                            ?>
                                            <li class="has-cat-mega">
                                                <a href="all-product.php?id=<?php echo $product_categories['id'] ?>"> <?php echo $product_categories['name'] ?></a>
                                                <div class="cat-mega-menu cat-mega-style1"> 
                                                    <div class="row">
                                                        <?php
                                                        $SUB_CATEGORY = new SubCategory(NULL);
                                                        foreach ($SUB_CATEGORY->getProductsByCategory($product_categories['id']) as $sub_category) {
                                                            ?>
                                                            <div class="col-md-4 col-sm-3">
                                                                <div class="list-cat-mega-menu"> 

                                                                    <h2 class="title-cat-mega-menu"><?php echo $sub_category['name'] ?></h2>
                                                                    <?php
                                                                    $PRODUCT = new Product(NULL);
                                                                    foreach ($PRODUCT->getProductsBySubProduct($sub_category['id']) as $product) {
                                                                        ?>
                                                                        <ul>
                                                                            <li><a href="view-product.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></li>
                                                                        </ul> 
                                                                    <?php } ?>
                                                                </div> 
                                                            </div>
                                                        <?php } ?>
                                                    </div>  
                                                </div>                                               
                                            </li> 
                                        <?php }
                                        ?>
                                    </ul>
                                    <a class="expand-list-link" href="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <div class="banner-home4 simple-owl-slider">
                                <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1]]">
                                    <?php
                                    $OFFER = new Offer(NULL);
                                    foreach ($OFFER->all() as $offer) {
                                        ?>
                                        <a href="view-product.php?id=<?php echo $offer['product_id'] ?>">
                                            <div class="item-banner4">
                                                <div class="banner-thumb">
                                                    <img src="upload/offer/<?php echo $offer['image_name'] ?>" alt="" />
                                                </div>
                                                <div class="banner-info rotate-text">
                                                    <h2 ><?php echo $offer['title'] ?></h2> 
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="hot-deals">
                                <h2><i class="fa fa-clock-o"></i> TESTIMONIAL</h2>
                                <div class="hotdeals-slider slider-home4 simple-owl-slider">
                                    <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1]]">
                                        <?php
                                        $testimonials = Comments::all();

                                        foreach ($testimonials as $testimonial) {
                                            ?>
                                            <div class="item">
                                                <ul class="list-product-hotdeal">
                                                    <li>
                                                        <div class="author-testimo">
                                                            <div class="author-test-link">
                                                                <a href="#">
                                                                    <img src="upload/comments/<?php echo $testimonial['image_name']; ?>" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="author-test-info">
                                                                <h3>
                                                                    <a href="#"><?php echo $testimonial['name']; ?></a>
                                                                </h3>
                                                                <span><?php echo $testimonial['title']; ?></span>
                                                            </div>
                                                        </div>
                                                        <p class="desc">
                                                            <?php echo $testimonial['comment'], 0, 50; ?>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="privacy-shipping">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item-privacy-shipping">
                                    <ul>
                                        <li><i class="fa fa-usd"></i></li>
                                        <li>
                                            <h2>30 DAYS RETURN</h2>
                                            <span>money back</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item-privacy-shipping">
                                    <ul>
                                        <li><i class="fa fa-truck"></i></li>
                                        <li>
                                            <h2>FREE SHIPPING</h2>
                                            <span>on all orders over $99</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item-privacy-shipping">
                                    <ul>
                                        <li><i class="fa fa-database"></i></li>
                                        <li>
                                            <h2>LOWEST PRICE</h2>
                                            <span>guarantee</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item-privacy-shipping">
                                    <ul>
                                        <li><i class="fa fa-hand-o-right"></i></li>
                                        <li>
                                            <h2>SAFE SHOPPING</h2>
                                            <span>guarantee 100%</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Privacy Shipping -->
                </div>	
                <div class="hot-deal-box content-product18">
                    <div class="container">
                        <div class="product-box18">
                            <?php
                            foreach ($PRODUCT_CATEGORIES->all() as $product_categories) {
                                ?> 

                                <div class="row" style="margin-bottom: 50px;">
                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <div class="hot-deal-tab-slider">
                                            <div class="hot-deal-tab-title">
                                                <label><?php echo $product_categories['name'] ?></label>
                                            </div>
                                            <div class="hot-deal-slider slider-home2">
                                                <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1],[480,2],[768,3],[980,4],[1200,4]]">
                                                    <?php
                                                    $PRODUCT = new Product(NULL);
                                                    foreach ($PRODUCT->getProductsByCategory($product_categories['id']) as $product) {
                                                        ?>                                                   
                                                        <div class="item">
                                                            <div class="item-hot-deal-product">

                                                                <div class="hot-deal-product-thumb">
                                                                    <div class="cat-hover-percent">
                                                                        <?php
                                                                        if ($product['discount'] > 0) {
                                                                            ?>
                                                                            <strong><?php echo $product['discount'] ?>%</strong> 
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="product-thumb">
                                                                        <a href="view-product.php?id=<?php echo $product['id'] ?>">
                                                                            <img alt="" src="upload/product-categories/sub-category/product/photos/<?php echo $product['image_name'] ?>"  > 
                                                                        </a>
                                                                        <div class="product-info-cart">
                                                                            
                                                                            <a class="addcart-link" href="#"  class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm<?php echo $product['id'] ?>"><i class="fa fa-shopping-basket"></i> Add to Cart</a>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="hot-deal-product-info">
                                                                    <h3 class="title-product  "><a  href="view-product.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></h3>
                                                                    <div class="info-price">
                                                                        <?php
                                                                        $price_amount = 0;
                                                                        $discount = 0;

                                                                        $discount = $product['discount'];
                                                                        $price_amount = $product['price'];

                                                                        $discount = ($price_amount * $discount) / 100;
                                                                        $discount_price = $product['price'] - $discount;
                                                                        if ($product['discount'] > 0) {
                                                                            ?>
                                                                            <span>Rs:<?php echo number_format($discount_price, 2) ?></span>
                                                                            <del>Rs:<?php echo number_format($product['price'], 2) ?></del>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <span>Rs:<?php echo number_format($product['price'], 2) ?></span>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  

                                                    <?php } ?>

                                                </div>
                                                <?php
                                                $PRODUCT = new Product(NULL);
                                                foreach ($PRODUCT->getProductsByCategory($product_categories['id']) as $product) {
                                                    $BRAND = new Brand($product['id']);
                                                    $price_amount = 0;
                                                    $discount = 0;

                                                    $discount = $product['discount'];
                                                    $price_amount = $product['price'];

                                                    $discount = ($price_amount * $discount) / 100;
                                                    $discount_price = $product['price'] - $discount;
                                                    ?> 
                                                    <!--Model in add to cart -->
                                                    <div class="modal fade" id="modalLoginForm<?php echo $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document"> 
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h4 class="modal-title w-100 font-weight-bold"><b> <?php echo $product['name'] ?> </b>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </h4>
                                                                </div>

                                                                <div class="modal-body mx-3">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="thumbnail">
                                                                                <img class="first-thumb" alt="" src="upload/product-categories/sub-category/product/photos/<?php echo $product['image_name'] ?>"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8"> 
                                                                            <p class="text-justify"><?php echo $product['short_description'] ?> </p>                                     
                                                                            <span pull-left> <i class="fa fa-circle"></i> Brand : <?php echo $BRAND->name ?> </span> </br>
                                                                            <span pull-right> <i class="fa fa-circle"></i> Unite : <?php echo $product['unite'] ?>  </span></br>
                                                                            <div class="col-md-6  " id="price-padd">    

                                                                                <label>Rs :</label> <span id="price-format-design" ><?php echo number_format($discount_price, 2) ?>   </span>

                                                                                <input type="hidden" id="price<?php echo $product['id'] ?>" class="price-format total_price_amount" value="<?php echo $discount_price ?>"/>
                                                                            </div>                                        
                                                                            <div class="col-md-6 "  id="price-padd">                                               
                                                                                <div class="attr-product">                                            
                                                                                    <div class="input-group">                                             
                                                                                        <input type="number" name="quantity" min="1" value="1"   id="quantity<?php echo $product['id'] ?>"     class=" form-control form-input-design"  />
                                                                                    </div>
                                                                                </div>                                            
                                                                            </div>
                                                                        </div>  
                                                                    </div>  
                                                                </div>

                                                                <div class="modal-footer d-flex justify-content-center">  
                                                                    <input type="hidden" class="form-control  "   id="product_id" value="<?php echo $product['id'] ?>" />
                                                                    <input   type="hidden" name="name"  id="name<?php echo $product['id'] ?>" value="<?php echo $product['name'] ?>" />

                                                                    <input type="button" class="btn btn-info add_to_cart" name="add_to_cart"  id="<?php echo $product['id'] ?>" value="   Add to Cart"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>    
                                        </div>
                                        <!-- End Hot Deal Tab -->
                                        <div class="item-adv-simple">
                                            <a href="#"><img alt="" src="upload/product-categories/banner/<?php echo $product_categories['banner'] ?>"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-bestseller-slider">
                                            <h2>best sellers</h2>
                                            <div class="slider-home2">
                                                <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1]]">
                                                    <div class="item">
                                                        <div class="item-product-bestseller">
                                                            <div class="product-thumb">
                                                                <a href="#"><img src="images/photos/extras/16.jpg" alt="" /></a>
                                                                <a href="#" class="addcart-link addcart-single"><i class="fa fa-shopping-basket"></i></a>
                                                            </div>
                                                            <div class="product-info2">
                                                                <h3 class="title-product"><a href="#">Product Name 02</a></h3>
                                                                <div class="info-price">
                                                                    <span>$455.99</span>
                                                                    <del>$895.99</del>
                                                                </div>
                                                                <div class="product-rating rating-style2">
                                                                    <div style="width:80%" class="inner-rating"></div>
                                                                </div>
                                                                <p class="desc-hidden">Que eget malesuada at nequeVivamus eget nibh. Etiamursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et trices.</p>
                                                            </div>
                                                        </div>
                                                        <div class="item-product-bestseller">
                                                            <div class="product-thumb">
                                                                <a href="#"><img src="images/photos/extras/17.jpg" alt="" /></a>
                                                                <a href="#" class="addcart-link addcart-single"><i class="fa fa-shopping-basket"></i></a>
                                                            </div>
                                                            <div class="product-info2">
                                                                <h3 class="title-product"><a href="#">Product Name 06</a></h3>
                                                                <div class="info-price">
                                                                    <span>$455.99</span>
                                                                    <del>$545.99</del>
                                                                </div>
                                                                <div class="product-rating rating-style2">
                                                                    <div style="width:80%" class="inner-rating"></div>
                                                                </div>
                                                                <p class="desc-hidden">Que eget malesuada at nequeVivamus eget nibh. Etiamursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et trices.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="item-product-bestseller">
                                                            <div class="product-thumb">
                                                                <a href="#"><img src="images/photos/extras/18.jpg" alt="" /></a>
                                                                <a href="#" class="addcart-link addcart-single"><i class="fa fa-shopping-basket"></i></a>
                                                            </div>
                                                            <div class="product-info2">
                                                                <h3 class="title-product"><a href="#">Product Name 02</a></h3>
                                                                <div class="info-price">
                                                                    <span>$455.99</span>
                                                                    <del>$895.99</del>
                                                                </div>
                                                                <div class="product-rating rating-style2">
                                                                    <div style="width:80%" class="inner-rating"></div>
                                                                </div>
                                                                <p class="desc-hidden">Que eget malesuada at nequeVivamus eget nibh. Etiamursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et trices.</p>
                                                            </div>
                                                        </div>
                                                        <div class="item-product-bestseller">
                                                            <div class="product-thumb">
                                                                <a href="#"><img src="images/photos/extras/19.jpg" alt="" /></a>
                                                                <a href="#" class="addcart-link addcart-single"><i class="fa fa-shopping-basket"></i></a>
                                                            </div>
                                                            <div class="product-info2">
                                                                <h3 class="title-product"><a href="#">Product Name 06</a></h3>
                                                                <div class="info-price">
                                                                    <span>$455.99</span>
                                                                    <del>$545.99</del>
                                                                </div>
                                                                <div class="product-rating rating-style2">
                                                                    <div style="width:80%" class="inner-rating"></div>
                                                                </div>
                                                                <p class="desc-hidden">Que eget malesuada at nequeVivamus eget nibh. Etiamursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et trices.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="zoom-image-thumb video-image-thumb">
                                                <a href="#"><img src="images/home18/ad12.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php } ?>


                        </div>
                    </div>
                </div>
                <!-- End Hot Deal Box -->
                <div class="container">
                    <div class="list-service2">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item-service2">
                                    <div class="service-thumb2">
                                        <a href="#"><img src="images/home2/od1.png" alt="" /></a>
                                    </div>	
                                    <div class="service-info2">
                                        <h2>Order Online</h2>
                                        <span>Hours: 8AM -11PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item-service2">
                                    <div class="service-thumb2">
                                        <a href="#"><img src="images/home2/od2.png" alt="" /></a>
                                    </div>
                                    <div class="service-info2">
                                        <h2>Save 30% </h2>
                                        <span>When you use credit card</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item-service2">
                                    <div class="service-thumb2">
                                        <a href="#"><img src="images/home2/od3.png" alt="" /></a>
                                    </div>
                                    <div class="service-info2">
                                        <h2>Free Shipping</h2>
                                        <span>On orders over $99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End List Service -->
                    <div class="bottom-home2">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="box-bottom-home2 box-from-blog">
                                    <h2>From the Blog</h2>
                                    <div class="from-blog-slider slider-home2">
                                        <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1]]">
                                            <div class="item">
                                                <div class="wrap-from-blog">
                                                    <div class="from-blog-thumb">
                                                        <a href="#"><img src="images/home2/blog.jpg" alt="" /></a>
                                                    </div>
                                                    <div class="from-blog-info">
                                                        <h3><a href="#">Magic marine breathable</a></h3>
                                                        <p>Lorem ipsum dolor sit amen, dolor imun ra adlip ulisys ensteo</p>
                                                    </div>
                                                </div>
                                                <div class="from-blog-more">
                                                    <ul>
                                                        <li><i class="fa fa-calendar-o"></i> 15 March 2016</li>
                                                        <li><i class="fa fa-comment-o"></i> 8</li>
                                                    </ul>
                                                    <a href="#" class="readmore"><i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="wrap-from-blog">
                                                    <div class="from-blog-thumb">
                                                        <a href="#"><img src="images/home2/blog.jpg" alt="" /></a>
                                                    </div>
                                                    <div class="from-blog-info">
                                                        <h3><a href="#">Magic marine breathable</a></h3>
                                                        <p>Lorem ipsum dolor sit amen, dolor imun ra adlip ulisys ensteo</p>
                                                    </div>
                                                </div>
                                                <div class="from-blog-more">
                                                    <ul>
                                                        <li><i class="fa fa-calendar-o"></i> 15 March 2016</li>
                                                        <li><i class="fa fa-comment-o"></i> 8</li>
                                                    </ul>
                                                    <a href="#" class="readmore"><i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="wrap-from-blog">
                                                    <div class="from-blog-thumb">
                                                        <a href="#"><img src="images/home2/blog.jpg" alt="" /></a>
                                                    </div>
                                                    <div class="from-blog-info">
                                                        <h3><a href="#">Magic marine breathable</a></h3>
                                                        <p>Lorem ipsum dolor sit amen, dolor imun ra adlip ulisys ensteo</p>
                                                    </div>
                                                </div>
                                                <div class="from-blog-more">
                                                    <ul>
                                                        <li><i class="fa fa-calendar-o"></i> 15 March 2016</li>
                                                        <li><i class="fa fa-comment-o"></i> 8</li>
                                                    </ul>
                                                    <a href="#" class="readmore"><i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="viewall">View All</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="box-bottom-home2">
                                    <div class="box-newsletter">
                                        <h2>Newsletter</h2>
                                        <p>Make sure you dont miss interesting happenings by joining our newsletter.</p>
                                        <form>
                                            <input type="text"  name="email" value="enter your e-mail " onfocus="if (this.value == this.defaultValue)
                                                        this.value = ''" onblur="if (this.value == '')
                                                                    this.value = this.defaultValue"/>
                                            <input type="submit" value="Subscribe" />
                                        </form>
                                    </div>
                                    <div class="social-home2 social-network">
                                        <h2>Connect with us</h2>
                                        <ul>
                                            <li><a href="#"><img alt="" src="images/home1/s1.png"></a></li>
                                            <li><a href="#"><img alt="" src="images/home1/s2.png"></a></li>
                                            <li><a href="#"><img alt="" src="images/home1/s3.png"></a></li>
                                            <li><a href="#"><img alt="" src="images/home1/s4.png"></a></li>
                                            <li><a href="#"><img alt="" src="images/home1/s5.png"></a></li>
                                            <li><a href="#"><img alt="" src="images/home1/s6.png"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="box-bottom-home2 box-testimo">
                                    <h2>testimonials</h2>
                                    <div class="testimo-slider slider-home2">
                                        <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1]]">
                                            <?php
                                            $COMMENT = new Comments(NULL);
                                            foreach ($COMMENT->activeComments() as $comment) {
                                                ?>
                                                <div class="item-testimo">
                                                    <div class="author-testimo">
                                                        <div class="author-test-link">
                                                            <a href="#"><img src="upload/comments/<?php echo $comment['image_name'] ?>" alt="" /></a>
                                                        </div>
                                                        <div class="author-test-info">
                                                            <h3><a href="#"><?php echo $comment['name'] ?></a></h3>
                                                            <span><?php echo $comment['city'] ?></span>
                                                        </div>
                                                    </div>
                                                    <p class="desc text-justify"> <?php echo substr($comment['comment'], 0, 120) ?>..</p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <a href="#" class="viewall">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Bottom Home 2 -->
                </div>
            </div>
            <?php include './footer.php'; ?>
        </div>
        <script type="text/javascript" src="js/libs/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/libs/jquery.fancybox.js"></script>
        <script type="text/javascript" src="js/libs/jquery-ui.js"></script>
        <script type="text/javascript" src="js/libs/owl.carousel.js"></script>
        <script type="text/javascript" src="js/libs/TimeCircles.js"></script>
        <script type="text/javascript" src="js/libs/jquery.countdown.js"></script>
        <script type="text/javascript" src="js/libs/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="js/libs/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="js/libs/jquery.themepunch.revolution.js"></script>
        <script type="text/javascript" src="js/libs/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="js/theme.js"></script>
        <script src="control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

        <script src="js/ajax/add_to_cart.js" type="text/javascript"></script>
        <script src="js/ajax/login.js" type="text/javascript"></script>
    </body> 
</html>