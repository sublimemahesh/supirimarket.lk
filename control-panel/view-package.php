<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
$id = $_GET['id'];

$PACKAGE = new Package($id);
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>View Packages</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid">  
                <?php
                $vali = new Validator();
                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>View Package</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-package.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/package.php" enctype="multipart/form-data"> 

                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line"> 
                                                <?php
                                                $PRODUCT_CATEGORIES = new ProductCategories($PACKAGE->category);
                                                ?>
                                                <input type="text"   class="form-control"  autocomplete="off" name="name" required="true" value="<?php echo $PRODUCT_CATEGORIES->name; ?>" readonly="">
                                                <label class="form-label">Category</label>  

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <?php
                                                $SUB_CATEGORIES = new SubCategory($PACKAGE->sub_category);
                                                ?>
                                                <input type="text"   class="form-control"  autocomplete="off" name="name" required="true" value="<?php echo $SUB_CATEGORIES->name; ?>" readonly="">
                                                <label class="form-label">Sub Category</label>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="name" class="form-control"  autocomplete="off" name="name" required="true" value="<?php echo $PACKAGE->name ?>" readonly="">
                                                <label class="form-label">Name</label>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-12">                                       
                                        <div class="form-group form-float">
                                            <div class="form-line">

                                                <img src="../upload/package/<?php echo $PACKAGE->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="price" class="form-control"  autocomplete="off" name="price" required="true" min="0" value="<?php echo $PACKAGE->price ?>" readonly="">
                                                <label class="form-label">Price</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="discount" class="form-control"  autocomplete="off" name="discount" required="true" min="0"  value="<?php echo $PACKAGE->discount ?>" readonly="">
                                                <label class="form-label">Discount</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="product-list" class="form-control"  autocomplete="off" name="product_list"  value="<?php echo $PACKAGE->product_list ?>" readonly="">
                                                <label class="form-label">Product List</label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="description">Description</label>
                                        <div class="form-line">
                                            <textarea id="description" name="description" class="form-control" rows="5" readonly="">  <?php echo $PACKAGE->description ?></textarea> 
                                        </div> 
                                    </div>


                                    <div class="row clearfix">  </div>
                                    <hr/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- #END# Vertical Layout -->

            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/add-new-ad.js" type="text/javascript"></script>
        <script src="js/admin-js/product.js" type="text/javascript"></script>

        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: "#description",
                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false

            });


        </script>
    </body>

</html>