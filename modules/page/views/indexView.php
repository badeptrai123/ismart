<?php
get_header();
?>
<?php
$list_product_selling = db_fetch_array("SELECT * FROM `tbl_product_selling`");
$list_blog = db_fetch_array("SELECT * FROM `tbl_blog`");
?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_blog)) {
                    ?>
                        <ul class="list-item">
                            <?php
                            foreach ($list_blog as $blog) {
                            ?>
                                <li class="clearfix">
                                    <a href="?mod=page&action=detail_blog" title="" class="thumb fl-left">
                                        <img src="<?php echo $blog['blog_thumb'] ;?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="?mod=page&action=detail_blog" title="" class="title"><?php echo $blog['title'] ;?></a>
                                        <span class="create-date"><?php echo $blog['creat_at'] ;?></span>
                                        <p class="desc"><?php echo $blog['blog_desc'] ;?></p>
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
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
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
                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                        <img src="<?php echo $item['product_thumb']; ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="?page=detail_product" title="" class="product-name"><?php echo $item['product_title']; ?></a>
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
                    <a href="?page=detail_blog_product" title="" class="thumb">
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