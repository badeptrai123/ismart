<?php
session_start();
get_header();
?>
<?php
$list_product_selling = db_fetch_array("SELECT * FROM `tbl_product_selling`");
$list_laptop = db_fetch_array("SELECT * FROM `laptop`");
$list_phone = db_fetch_array("SELECT * FROM `phone`");
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_product_selling)) {
                    ?>
                        <ul class="list-item">
                            <?php
                            foreach ($list_product_selling as $item) {
                            ?>
                                <li>
                                    <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb']; ?>">
                                    </a>
                                    <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['product_price_new']); ?></span>
                                        <span class="old"><?php echo currency_format($item['product_price_old']); ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&action=addcart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=page&action=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_phone)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php
                            $count = 0;
                            foreach ($list_phone as $item) {
                                $count++;
                            ?>
                                <li>
                                    <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb']; ?>">
                                    </a>
                                    <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['product_price_new']); ?></span>
                                        <span class="old"><?php echo currency_format($item['product_price_old']); ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&action=addcart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=page&action=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php
                                if ($count == 8) {
                                    break;
                                }
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_laptop)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php
                            $count = 0;
                            foreach ($list_laptop as $item) {
                                $count++;
                            ?>
                                <li>
                                    <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb']; ?>">
                                    </a>
                                    <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['product_price_new']); ?></span>
                                        <span class="old"><?php echo currency_format($item['product_price_old']); ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&action=addcart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&action=index" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php
                                if ($count == 8) {
                                    break;
                                }
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?page=category_product" title="">Điện thoại</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Samsung</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="?page=category_product" title="">Iphone X</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Iphone 8</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Iphone 8 Plus</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Oppo</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Bphone</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Máy tính bảng</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">laptop</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Tai nghe</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Thời trang</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Đồ gia dụng</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Thiết bị văn phòng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_product_selling)) {
                    ?>
                        <ul class="list-item">
                            <?php
                            foreach ($list_product_selling as $item) {
                            ?>
                                <li class="clearfix">
                                    <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="thumb fl-left">
                                        <img src="<?php echo $item['product_thumb']; ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="?mod=product&action=detail_product&id=<?php echo $item['id'];?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                        <div class="price">
                                            <span class="new"><?php echo currency_format($item['product_price_new']); ?></span>
                                            <span class="old"><?php echo currency_format($item['product_price_old']); ?></span>
                                        </div>
                                        <a href="?mod=page&action=checkout" title="" class="buy-now">Mua ngay</a>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>