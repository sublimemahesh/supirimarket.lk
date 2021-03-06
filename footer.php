<div id="footer">
    <div class="list-box-footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a class="back-to-top" href="#">Top</a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-box-footer2">
                        <h2>Categories</h2>
                        <ul class="menu-footer2">
                            <?php
                            foreach (ProductCategories::all() as $key => $category) {
                                if ($key < 4) {
                                    ?>
                                    <li><a href="view-sub-categories.php?id=<?php echo $category['id'] ?>"><?php echo $category['name']; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-box-footer2">
                        <h2>Brands</h2>
                        <ul class="menu-footer2">
                            <?php
                            foreach (Brand::all() as $key => $brand) {
                                if ($key < 4) {
                                    ?>
                                    <li><a href="view-products-by-brand.php?id=<?php echo $brand['id'] ?>"><?php echo $brand['name']; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-box-footer2">
                        <h2>Quick Links</h2>
                        <ul class="menu-footer2">
                            <li><a href="all-products.php">All Products</a></li>
                            <li><a href="#">Offers</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-box-footer2">
                        <h2>Contact us</h2>
                        <ul class="contact-footer2">
                            <li><i class="fa fa-map-marker"></i>  No. 55, Isipathanarama Rd, Nawinna, Maharagama, Sri Lanka.</li>
                            <li><i class="fa fa-phone"></i> (+94) 70 277 3500 /<br> (+94) 11 366 3500 </li>
                            <li><i class="fa fa-envelope-o"></i> <a href="mailto:info@supirimarket.lk">info@freshcart.lk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="copyright2">
                        <p> Copyright FreshCart.lk ©   <?php echo date('Y') ?> All Rights    </p>
                        <p>Website By:  <i class="fa fa-hand-o-right text-primary heart"  style="color:white;"></i> <a href="https://www.synotec.lk/"  target="_blank"  style="color:white;">  Synotec Holdings (Pvt) Ltd.  </a></p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="payment2 payment-method">
                        <a href="#"><img src="images/home2/pay1.png" alt="" /></a>
                        <a href="#"><img src="images/home2/pay2.png" alt="" /></a>
                        <a href="#"><img src="images/home2/pay3.png" alt="" /></a>
                        <a href="#"><img src="images/home2/pay4.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

