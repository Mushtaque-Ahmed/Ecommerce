<?php
require('top.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
$cart_total=0;
foreach($_SESSION['cart'] as $key=>$val){ 
    $productArr=get_product($con,'','',$key);
    $psprice=$productArr['0']['product_sprice'];
    $qty=$val['qty'];
    $cart_total=$cart_total+($psprice*$qty);
}
  if(isset($_POST['submit'])){
        $address=get_safe_value($con,$_POST['address']);
        $city=get_safe_value($con,$_POST['city']);
        $pin_code=get_safe_value($con,$_POST['pin_code']);
        $payment_type=get_safe_value($con,$_POST['payment_type']);
        $user_id=$_SESSION['USER_ID'];
        $total_price=$cart_total;
        $payment_status='pending';
        if($payment_type=='cod'){
          $payment_status='success';
        }
        $order_status='1';
        $added_on=date('Y-m-d h:i:s');

        $insert="insert into orderd_product (user_id,address,city,pin_code,payment_type,total_price,payment_status,order_status,added_on)
        values('$user_id','$address','$city','$pin_code','$payment_type','$total_price','$payment_status','$order_status','$added_on')";
        mysqli_query($con,$insert) or die(mysqli_error($con));

        $order_id=mysqli_insert_id($con);
        foreach($_SESSION['cart'] as $key=>$val){ 
            $productArr=get_product($con,'','',$key);
            $psprice=$productArr['0']['product_sprice'];
            $qty=$val['qty'];
            mysqli_query($con,"insert into order_details(order_id,product_id,qty,price)
            values('$order_id','$key','$qty','$psprice')");
        }
        unset($_SESSION['cart']);
        ?>
    <script>
        window.location.href='thankyou.php';
    </script>
    <?php
}
?>

 <!-- Start Bradcaump area -->
 <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <?php
                                    $accordion_class='accordion__title';
                            if(!isset($_SESSION['USER_LOGIN'])){
                                $accordion_class='accordion__hide';
                                ?>
                                    <div class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" name="login_id" id="login_id" placeholder="Your Email*" style="width:100%">
                                                                <span class="field_error" id="login_err" style="color:red"></span>
                                                           </div>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" name="login_pass" id="login_pass" placeholder="Your Password*" style="width:100%">
                                                              <span class="field_error" id="password_err" style="color:red"></span>
                                                            </div>
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                            <button type="button" onclick="login()" class="fv-btn">Login</button>
                                                            </div>
                                                        </form>
                                                        <div class="form-output">
									                         <p id="login" style="color:red"></p>
							                         	</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Name</label>
                                                                <input type="text" id="name" name="name" placeholder="Your Name*" style="width:100%">
                                                                <span id="name_err" style="color:red"></span>
                                                            </div>
															<div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" id="email" name="email" placeholder="Your Email*" style="width:100%">
                                                                <span id="email_err" style="color:red"></span>
                                                            </div>
															
                                                            <div class="single-input">
                                                                <label for="user-pass">Mobile</label>
                                                                <input type="text" id="mobile" name="mobile" placeholder="Your Mobile*" style="width:100%">
                                                                <span id="mobile_err" style="color:red"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="text" name="password" id="password" placeholder="Your Password*" style="width:100%">
                                                                <span id="pass_err" style="color:red"></span>
                                                            </div>
                                                            <div class="dark-btn">
                                                            <button type="button" onclick="register()" class="fv-btn">Register</button>
                                                            </div>
                                                        </form>
                                                        <div class="form-output">
									                        <p class="form-mess" style=color:green></p>
								                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><?php
                                    }
                                    ?>
                                    <div class="<?php echo  $accordion_class?>">
                                        Address Information
                                    </div>
                                    <form method="post">
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                         
                                                <div class="row">
                                                   
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text"  name="address" placeholder="Street Address" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="City/State" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pin_code" placeholder="Post code/ zip" required>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                </div>
                                         
                                        </div>
                                    </div>
                                    <div class="<?php echo $accordion_class?>">
                                        payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                COD <input type="radio" name="payment_type" value="cod" required>
                                               &nbsp;&nbsp; PAY <input type="radio" name="payment_type" value="pay" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-method">
                                            <input type="submit" name="submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                            <?php
                                            $cart_total=0;
                                          foreach($_SESSION['cart'] as $key=>$val){
                                              $productArr=get_product($con,'','',$key);
                                              $pname=$productArr['0']['product_name'];
                                              $pmrp=$productArr['0']['product_mrp'];
                                              $psprice=$productArr['0']['product_sprice'];
                                              $pimg=$productArr['0']['product_img'];
                                              $qty=$val['qty'];
                                              $cart_total=$cart_total+($psprice*$qty);
                                        ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="adminthem/upload/<?php echo $pimg?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname?></a>
                                        <span class="price">$<?php echo $psprice*$qty?></span>
                                    </div>
                                    <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                                <?php 
                                          }
                                          ?>
                            </div>
                            <!--<div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price">$909.00</span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$9.00</span>
                                </div>
                            </div>-->
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price">$<?php echo $cart_total?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
<?php require('footer.php');?>