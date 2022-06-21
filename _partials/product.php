<section class="product" id="product">
        <div class="container">
            <div class="row1">
                <div class="title-section">
                    <p class="label">OUR PRODUCT</p>
                    <h3 class="heading">There are variant types of plants that will make your room more comfortable</h3>
                </div>
                <div class="btn-slider">
                    <i class='bx bxs-chevron-left-circle'></i>
                    <i class='bx bxs-chevron-right-circle'></i>
                </div>
            </div>
            <div class="row2">


                <!-- Swiper -->
                <div class="swiper mySwiperProduct">
                    <div class="swiper-wrapper">
                        <?php foreach ($products as $product) : ?> 
                            <div class="swiper-slide card-product">
                                <div class="card-img">
                                    <img src="assets/image/<?php echo htmlspecialchars($product['image'])?>" alt="" width="200">
                                </div>
                                <div class="card-body">
                                    <a href="#" class="product-name"><?php echo htmlspecialchars($product['name']) ?></a>
                                    <div class="star">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <p class="stock"><?php echo "stock " . htmlspecialchars($product['quantity'])?></p>
                                    <p class="price"><?php echo "Rp. " . number_format($product['price'], 0, ',', '.')?></p>
                                </div>
                                <a href="cart/buy.php?id=<?php echo $product['id'];?>" class="btn-card"><i class='bx bx-shopping-bag'></i></a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>