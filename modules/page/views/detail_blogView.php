<?php
get_header();
?>
<?php
$post_blog = db_fetch_row("SELECT * FROM `tbl_detail_blog`");
$list_product_selling = db_fetch_array("SELECT * FROM `tbl_product_selling`");
?>
<div id="main-content-wp" class="clearfix detail-blog-page">
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
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?php echo $post_blog['blog_title']; ?></h3>
                </div>
                <div class="section-detail">
                    <span class="create-date"><?php echo $post_blog['creat_at']; ?></span>
                    <div class="detail">
                        <?php echo $post_blog['content']; ?>
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
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
                    <a href="?page=detail_product" title="" class="thumb">
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