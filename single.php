<?php
get_header();
?>
<div class="container">
    <div class="row">
        <div class="myui-panel active myui-panel-bg clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <?php
                    while ( have_posts() ) : the_post();
                        ?>

                        <div class="group-film">
                            <h2><?php the_title(); ?>
                            </h2>
                            <div class="">
                                <?php  the_content(); ?>
                            </div>

                        </div>


                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
