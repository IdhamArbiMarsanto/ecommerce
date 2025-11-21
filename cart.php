<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Effort Outdoor - Shopping Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Effort Outdoor Ecommerce" name="keywords">
    <meta content="Modern shopping cart for Effort Outdoor" name="description">

    <!-- Favicon -->
    <link href="img/logo.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .cart-item {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .cart-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }
        .cart-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-controls button {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            background: #bbd197;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .quantity-controls button:hover {
            background: #a8c085;
        }
        .quantity-controls input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 0 10px;
        }
        .cart-summary {
            background: linear-gradient(135deg, #bbd197 0%, #a8c085 100%);
            color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .cart-summary .card-header {
            background: rgba(255,255,255,0.1);
            border: none;
            border-radius: 15px 15px 0 0;
        }
        .cart-summary .card-body {
            background: rgba(255,255,255,0.05);
        }
        .cart-summary .card-footer {
            background: rgba(255,255,255,0.1);
            border-radius: 0 0 15px 15px;
            border: none;
        }
        .btn-remove {
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn-remove:hover {
            background: #c82333;
        }
        .empty-cart {
            text-align: center;
            padding: 50px 20px;
            background: #f8f9fa;
            border-radius: 15px;
            margin: 20px 0;
        }
        .empty-cart i {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 20px;
        }
        .coupon-section {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <?php include 'partials/topbar.php'; ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?php include 'partials/navbar.php'; ?>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <?php include 'partials/head.php'; ?>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5 pb-5">
        <div class="row px-xl-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-4 text-center" style="color: #333; font-weight: 600;">Shopping Cart</h2>
                
                <!-- Cart Items -->
                <div class="cart-container">
                    <div class="cart-item p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-4">
                                <input type="checkbox" class="item-checkbox" checked style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                <img src="img/product-1.jpg" alt="Product" class="cart-img">
                            </div>
                            <div class="col-md-3 col-8">
                                <h6 class="mb-1">Colorful Stylish Shirt</h6>
                                <small class="text-muted">Size: M | Color: Red</small>
                            </div>
                            <div class="col-md-2">
                                <span class="font-weight-bold text-primary">Rp 150.000</span>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-controls">
                                    <button class="btn-minus">-</button>
                                    <input type="number" value="1" min="1" readonly class="quantity-input">
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <span class="font-weight-bold subtotal">Rp 150.000</span>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-4">
                                <input type="checkbox" class="item-checkbox" checked style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                <img src="img/product-2.jpg" alt="Product" class="cart-img">
                            </div>
                            <div class="col-md-3 col-8">
                                <h6 class="mb-1">Comfortable Sneakers</h6>
                                <small class="text-muted">Size: 42 | Color: Black</small>
                            </div>
                            <div class="col-md-2">
                                <span class="font-weight-bold text-primary">Rp 250.000</span>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-controls">
                                    <button class="btn-minus">-</button>
                                    <input type="number" value="2" min="1" readonly class="quantity-input">
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <span class="font-weight-bold subtotal">Rp 500.000</span>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-4">
                                <input type="checkbox" class="item-checkbox" checked style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                <img src="img/product-3.jpg" alt="Product" class="cart-img">
                            </div>
                            <div class="col-md-3 col-8">
                                <h6 class="mb-1">Outdoor Hiking Boots</h6>
                                <small class="text-muted">Size: 43 | Color: Brown</small>
                            </div>
                            <div class="col-md-2">
                                <span class="font-weight-bold text-primary">Rp 350.000</span>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-controls">
                                    <button class="btn-minus">-</button>
                                    <input type="number" value="1" min="1" readonly class="quantity-input">
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <span class="font-weight-bold subtotal">Rp 350.000</span>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-4">
                                <input type="checkbox" class="item-checkbox" checked style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                <img src="img/product-4.jpg" alt="Product" class="cart-img">
                            </div>
                            <div class="col-md-3 col-8">
                                <h6 class="mb-1">Waterproof Jacket</h6>
                                <small class="text-muted">Size: L | Color: Blue</small>
                            </div>
                            <div class="col-md-2">
                                <span class="font-weight-bold text-primary">Rp 400.000</span>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-controls">
                                    <button class="btn-minus">-</button>
                                    <input type="number" value="1" min="1" readonly class="quantity-input">
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <span class="font-weight-bold subtotal">Rp 400.000</span>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-4">
                                <input type="checkbox" class="item-checkbox" checked style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                <img src="img/product-5.jpg" alt="Product" class="cart-img">
                            </div>
                            <div class="col-md-3 col-8">
                                <h6 class="mb-1">Camping Tent</h6>
                                <small class="text-muted">Size: 2-Person | Color: Green</small>
                            </div>
                            <div class="col-md-2">
                                <span class="font-weight-bold text-primary">Rp 500.000</span>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-controls">
                                    <button class="btn-minus">-</button>
                                    <input type="number" value="1" min="1" readonly class="quantity-input">
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <span class="font-weight-bold subtotal">Rp 500.000</span>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item p-4">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-4">
                                <input type="checkbox" class="item-checkbox" checked style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                <img src="img/product-6.jpg" alt="Product" class="cart-img">
                            </div>
                            <div class="col-md-3 col-8">
                                <h6 class="mb-1">Backpack 50L</h6>
                                <small class="text-muted">Size: One Size | Color: Black</small>
                            </div>
                            <div class="col-md-2">
                                <span class="font-weight-bold text-primary">Rp 200.000</span>
                            </div>
                            <div class="col-md-3">
                                <div class="quantity-controls">
                                    <button class="btn-minus">-</button>
                                    <input type="number" value="1" min="1" readonly class="quantity-input">
                                    <button class="btn-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <span class="font-weight-bold subtotal">Rp 200.000</span>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty Cart (hidden by default) -->
                <div id="empty-cart" class="empty-cart d-none">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>Your cart is empty</h4>
                    <p>Looks like you haven't added anything to your cart yet.</p>
                    <a href="shop.php" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Coupon Section -->
                <div class="coupon-section">
                    <h5 class="mb-3"><i class="fas fa-ticket-alt text-primary mr-2"></i>Have a Coupon?</h5>
                    <form class="d-flex">
                        <input type="text" class="form-control mr-2" placeholder="Enter coupon code" style="border-radius: 25px;">
                        <button class="btn btn-outline-primary" style="border-radius: 25px; padding: 0 20px;">Apply</button>
                    </form>
                </div>

                <!-- Cart Summary -->
                <div class="card cart-summary border-0">
                    <div class="card-header">
                        <h4 class="font-weight-semi-bold m-0"><i class="fas fa-receipt mr-2"></i>Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal (2 items)</span>
                            <span>Rp 650.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span>Rp 20.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Tax</span>
                            <span>Rp 65.000</span>
                        </div>
                        <hr style="border-color: rgba(255,255,255,0.3);">
                        <div class="d-flex justify-content-between">
                            <strong>Total</strong>
                            <strong>Rp 735.000</strong>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="checkout.php" method="POST">
                            <button type="submit" class="btn btn-light w-100 py-3" style="border-radius: 25px; font-weight: 600;">
                                <i class="fas fa-credit-card mr-2"></i>Proceed To Checkout
                            </button>
                        </form>
                        <a href="shop.php" class="btn btn-outline-light w-100 mt-2" style="border-radius: 25px;">
                            <i class="fas fa-arrow-left mr-2"></i>Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <!-- Footer Start -->
    <?php include 'partials/footer.php'; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        // Initial update summary
        updateSummary();

        // Quantity controls
        $(document).on('click', '.btn-plus', function(){
            let input = $(this).siblings('.quantity-input');
            let value = parseInt(input.val());
            input.val(value + 1);
            updateItemSubtotal($(this).closest('.cart-item'));
            updateSummary();
        });

        $(document).on('click', '.btn-minus', function(){
            let input = $(this).siblings('.quantity-input');
            let value = parseInt(input.val());
            if(value > 1){
                input.val(value - 1);
                updateItemSubtotal($(this).closest('.cart-item'));
                updateSummary();
            }
        });

        // Checkbox change
        $(document).on('change', '.item-checkbox', function(){
            updateSummary();
        });

        // Remove item
        $(document).on('click', '.btn-remove', function(){
            $(this).closest('.cart-item').remove();
            updateSummary();
            checkEmptyCart();
        });

        function updateItemSubtotal(cartItem){
            let priceText = cartItem.find('.text-primary').text();
            let price = parseInt(priceText.replace(/[^\d]/g, ''));
            let quantity = parseInt(cartItem.find('.quantity-input').val());
            let subtotal = price * quantity;
            cartItem.find('.subtotal').text('Rp ' + subtotal.toLocaleString());
        }

        function updateSummary(){
            let totalItems = $('.item-checkbox:checked').length;
            let subtotal = 0;
            $('.cart-item').each(function(){
                if ($(this).find('.item-checkbox').is(':checked')) {
                    let itemSubtotalText = $(this).find('.subtotal').text();
                    let itemSubtotal = parseInt(itemSubtotalText.replace(/[^\d]/g, ''));
                    subtotal += itemSubtotal;
                }
            });
            let shipping = 20000; // Fixed shipping
            let tax = Math.round(subtotal * 0.1); // Tax as 10% of subtotal
            let total = subtotal + shipping + tax;

            $('.cart-summary .card-body').html(`
                <div class="d-flex justify-content-between mb-3">
                    <span>Subtotal (${totalItems} items)</span>
                    <span>Rp ${subtotal.toLocaleString()}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Shipping</span>
                    <span>Rp ${shipping.toLocaleString()}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Tax</span>
                    <span>Rp ${tax.toLocaleString()}</span>
                </div>
                <hr style="border-color: rgba(255,255,255,0.3);">
                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>Rp ${total.toLocaleString()}</strong>
                </div>
            `);
        }

        function checkEmptyCart(){
            if($('.cart-item').length === 0){
                $('.cart-container').addClass('d-none');
                $('#empty-cart').removeClass('d-none');
            } else {
                $('.cart-container').removeClass('d-none');
                $('#empty-cart').addClass('d-none');
            }
        }
    });
    </script>
</body>

</html>
