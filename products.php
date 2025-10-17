<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
        <style>
            /* Consistent action icon sizing and button shape in product footers */
            .product-item .card-footer .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 6px 8px;
                min-width: 36px;
                height: 36px;
                border-radius: 6px;
            }

            .product-item .card-footer a.btn.btn-sm.text-dark.p-0 {
                padding: 0 6px; /* View detail keeps text but compact */
                min-width: auto;
                height: auto;
            }

            .product-item .card-footer i.fas {
                font-size: 16px; /* unified icon size */
                line-height: 1;
            }

            /* Make cart and like icon-only buttons square */
            .product-item .card-footer .cart-btn,
            .product-item .card-footer .like-btn,
            .product-item .card-footer .btn.border.like-btn {
                width: 36px;
                height: 36px;
                padding: 0;
            }

            /* Slight spacing for View Detail text icon */
            .product-item .card-footer a.btn.btn-sm.text-dark.p-0 i.fas.fa-eye {
                margin-right: 8px;
                font-size: 16px;
            }
            /* Heart styles: outline by default, filled when .liked is present */
            .product-item .card-footer .like-btn i.far.fa-heart {
                color: transparent;
                -webkit-text-stroke: 1px #ed0905ff; /* outline in theme color */
                text-stroke: 1px #007bff;
            }
            .product-item .card-footer .like-btn.liked i.far.fa-heart,
            .product-item .card-footer .like-btn.liked i.fas.fa-heart {
                color: #e60101ff; /* filled color when liked */
                -webkit-text-stroke: 0;
                text-stroke: 0;
            }
        </style>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>

                    <!-- Normalize product footers: ensure cart icon (no badge) and heart are present and positioned uniformly -->
                    <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelectorAll('.card-footer').forEach(function (footer) {
                            // keep detail link as-is
                            const detail = footer.querySelector('a[href="detail.php"]');

                            // create or find action group
                            let group = footer.querySelector('.action-group');
                            if (!group) {
                                group = document.createElement('div');
                                group.className = 'd-flex align-items-center action-group';
                            }

                            // move or create cart icon
                            let cartLink = footer.querySelector('a .fa-shopping-cart');
                            if (cartLink) cartLink = cartLink.closest('a');
                            if (cartLink) {
                                // remove any badge inside cart link
                                const b = cartLink.querySelector('.badge'); if (b) b.remove();
                                cartLink.classList.add('btn','btn-sm','btn-outline-secondary','position-relative','mr-2','cart-btn');
                            } else {
                                cartLink = document.createElement('a');
                                cartLink.href = '#';
                                cartLink.className = 'btn btn-sm btn-outline-secondary position-relative mr-2 cart-btn';
                                cartLink.setAttribute('title','Add to cart');
                                cartLink.innerHTML = '<i class="fas fa-shopping-cart text-primary"></i>';
                            }

                            // move or create wishlist heart
                            let wishLink = footer.querySelector('a .fa-heart');
                            if (wishLink) wishLink = wishLink.closest('a');
                            if (wishLink) {
                                const b2 = wishLink.querySelector('.badge'); if (b2) b2.remove();
                                wishLink.classList.add('btn','border','like-btn');
                            } else {
                                wishLink = document.createElement('a');
                                wishLink.href = 'wishlist.php';
                                wishLink.className = 'btn border like-btn';
                                wishLink.setAttribute('title','Add to Wishlist');
                                wishLink.innerHTML = '<i class="far fa-heart" aria-hidden="true"></i>';
                            }

                            // append group after detail link
                            // remove any old action-group to avoid duplicates
                            const existingGroup = footer.querySelector('.action-group');
                            if (existingGroup) existingGroup.remove();

                            group.appendChild(cartLink);
                            group.appendChild(wishLink);

                            // remove all non-detail anchors (we'll append standardized group)
                            footer.querySelectorAll('a').forEach(function(a) {
                                if (a !== detail) a.remove();
                            });

                            // finally append detail and group
                            if (detail) footer.appendChild(detail);
                            footer.appendChild(group);
                        });
                    });
                    </script>
                    <script>
                    // Toggle heart outline -> filled
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelectorAll('.like-btn').forEach(function(btn) {
                            btn.addEventListener('click', function (e) {
                                e.preventDefault();
                                const icon = btn.querySelector('i');
                                const pressed = btn.getAttribute('aria-pressed') === 'true';
                                if (!pressed) {
                                    // set liked
                                    btn.classList.add('liked');
                                    btn.setAttribute('aria-pressed', 'true');
                                    if (icon.classList.contains('far')) {
                                        icon.classList.remove('far');
                                        icon.classList.add('fas');
                                    }
                                } else {
                                    // unset liked
                                    btn.classList.remove('liked');
                                    btn.setAttribute('aria-pressed', 'false');
                                    if (icon.classList.contains('fas')) {
                                        icon.classList.remove('fas');
                                        icon.classList.add('far');
                                    }
                                }
                            });
                        });
                    });
                    </script>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist" role="button" aria-pressed="false">
                            <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist" role="button" aria-pressed="false">
                            <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist" role="button" aria-pressed="false">
                            <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist">
                           <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist">
                            <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-6.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist">
                            <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-7.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist">
                            <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-8.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border align-items-center">
                        <a href="detail.php" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <a href="wishlist.php" class="btn border like-btn position-relative mx-2" title="Add to Wishlist" aria-label="Add to Wishlist">
                            <i class="far fa-heart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger position-absolute" style="top:-8px; right:-8px; font-size:0.7rem;">0</span>
                        </a> 
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>