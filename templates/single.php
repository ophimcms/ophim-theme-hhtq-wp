<div class="container">
    <div class="row">
        <div class="myui-panel col-pd clearfix">
            <div class="myui-content__thumb">
                <a class="myui-vodlist__thumb img-md-220 img-sm-220 img-xs-130 picture" href="<?= watchUrl() ?>"
                   title="<?php the_title(); ?>">
                    <img class="lazyload" src="<?= op_get_thumb_url() ?>"
                         data-original="<?= op_get_thumb_url() ?>" />
                    <span class="play hidden-xs"></span></a>
                <?php if (watchUrl()) :?>
                <div class="imdbpost">
                    <a class="btn btn-primary btn_watch" href="<?= watchUrl() ?>"><i class="fa fa-play-circle"
                                                                                    aria-hidden="true"></i> Xem Phim</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="myui-content__detail">
                <h1 class="title text-fff"><?php the_title(); ?></h1>
                <h2 class="font-14"><?= op_get_original_title() ?> (<?= op_get_year() ?>)</h2>
                <div class="box-rating">
                    <input id="hint_current" type="hidden" value="">
                    <input id="score_current" type="hidden"
                           value="<?= op_get_rating() ?>">
                    <div id="star" data-score="<?= op_get_rating() ?>"
                         style="cursor: pointer; float: left; width: 200px;">
                    </div>
                    <span id="hint"></span>
                    <div id="div_average" style="float:left; line-height:20px; margin:0 5px; ">(<span class="average"
                                                                                                      id="average"><?= op_get_rating() ?></span> đ/<span
                                id="rate_count"> /
                                <?= op_get_rating_count() ?></span> lượt)
                    </div>
                    <meta itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating" />
                    <meta itemprop="ratingValue" content="<?= op_get_rating() ?>" />
                    <meta itemprop="ratingcount" content="<?= op_get_rating_count() ?>" />
                    <meta itemprop="bestRating" content="10" />
                    <meta itemprop="worstRating" content="1" />
                </div>
                <div class="myui-panel myui-panel-bg clearfix" id="desc">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_bd">
                            <div class="col-pd text-collapse content">
                                <ul>
                                    <li>
                                        Trạng thái <span class='quality1'><i class='fa fa-play-circle'
                                                                             aria-hidden='true'></i>
                                                        <?= op_get_status() ?></span>
                                    </li>
                                    <li>Năm phát hành: <a href=""
                                                          rel="tag"><?= op_get_year() ?></a>
                                    </li>
                                    <li>Số tập:<span class='episode'> <?= op_get_total_episode() ?></span></li>
                                    <li>Quốc gia:
                                        <?= op_get_regions() ?>
                                    <li>Thể loại:
                                        <?= op_get_genres(', ') ?>
                                    </li>
                                    <li>Đạo diễn:
                                        <?= op_get_directors(10,', ') ?>
                                    </li>
                                    <li>Diễn viên:
                                        <?= op_get_actors(10,', ') ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-wide-7 col-xs-1 padding-0">
            <div class="myui-panel myui-panel-bg clearfix" id="desc">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">Nội dung chi tiết</h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd">
                        <div class="col-pd text-collapse content">
                                <span class="sketch content">
                                    <p><?php the_content();?></p>
                    <p>Hãy xem phim để cảm nhận...</p>
                                </span>
                            <div class="the_tag_list">
                                <?= op_get_tags() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">Bình luận</h3>
                        </div>
                    </div>

                    <div class="tab-content myui-panel_bd" style="background-color: #fff; border-radius: 20px;">
                        <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(".tab-pane:first,.nav-tabs li:first").addClass("active");
            </script>
            <?php
            $postType = 'ophim';
            $taxonomyName = 'ophim_genres';
            $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
            if ($taxonomy) {
                $category_ids = array();
                foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                $my_query = new wp_query($args); ?>
                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_hd">
                            <div class="myui-panel__head active bottom-line clearfix">
                                <h3 class="title">Có thể bạn sẽ thích</h3>
                            </div>
                        </div>
                        <div class="tab-content myui-panel_bd">
                            <ul class="myui-vodlist__bd tab-pane fade in active clearfix">
                                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-3">
                                        <?php include THEMETEMPLADE.'/movie_card.php'?>
                                    </div>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php
                wp_reset_query();
            }
            ?>
        </div>
        <?php
        if ( is_active_sidebar('left-sidebar') ) {
            dynamic_sidebar( 'left-sidebar' );
        } else {
            _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
        }
        ?>
    </div>
</div>

<?php add_action('wp_footer', function (){?>

    
    <link href="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.css" rel="stylesheet" />
    <script src="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.js"></script>

    <script>
        var rated = false;
        jQuery(document).ready(function($) {
            $('#star').raty({
                number: 10,
                starHalf: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-half.png',
                starOff: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-off.png',
                starOn: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-on.png',
                click: function(score, evt) {
                    if (!rated) {
                        $.ajax({
                            url: '<?php echo admin_url('admin-ajax.php')?>',
                            type: 'POST',
                            data:{
                                action: "ratemovie",
                                rating: score,
                                postid: '<?php echo get_the_ID(); ?>',
                            },
                        }).done(function (data) {
                            alert("Đánh giá của bạn đã được gửi đi!")
                            rated = true;
                        });


                    }
                }
            });
        })
    </script>

<?php }) ?>


