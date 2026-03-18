<?php
/**
 * The template part for displaying post page
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<section class="content-item-container content-item-block" itemscope itemtype="https://schema.org/ItemList">
    <aside class="content-item">
        <picture class="content-image m-b-20">
            <?php echo get_the_post_thumbnail();?>
        </picture>
        <div class="content">
            <?php echo custom_breadcrumbs();?>
            <h1 class="title m-b-30" itemprop="name" content="<?php the_title();?>"><?php the_title();?></h1>
            
            <div class="details-container flex flex-space-between m-b-30 flex-align-center">
                <div class="details m-y-30">
                    <div>Von: <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>"><?php echo get_the_author_meta('display_name');?></a></div>
                    <div>Letzte Aktualisierung: <time datetime="<?php echo get_the_modified_date('Y-m-d');?>"><?php echo get_the_modified_date();?></time></div>
                </div>
                <div class="share-container">
                    <?php echo get_template_part('templates/section/share');?>
                </div>
            </div>
            <div class="description" itemprop="description" content="<?php echo wp_strip_all_tags(get_the_content());?>"><?php the_content();?></div>
        </div>
        <?php $crb_coloring = carbon_get_post_meta(get_the_ID(), 'crb_coloring');?>
        <?php if(!empty($crb_coloring)):?>
        <?php $GLOBALS['counter'] = 1;?>
        <div class="content">
            <section class="items grid grid-2-columns gap-24">
                <?php foreach($crb_coloring as $item):?>
                <?php if(!empty($item['crb_image'])):?>
                <article class="item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <meta itemprop="position" content="<?php echo $GLOBALS['counter']++;?>">
                    <meta itemprop="url" content="<?php echo wp_get_attachment_url($item['crb_pdf']);?>">
                    <meta itemprop="thumbnailUrl" content="<?php echo wp_get_attachment_url($item['crb_image']);?>">
                    <meta itemprop="contentUrl" content="<?php echo wp_get_attachment_url($item['crb_pdf']);?>">
                    <meta itemprop="license" content="https://coloring2kids.xyz/lizenzbestimmungen/">
                    
                    <?php $likes = get_post_meta($item['crb_image'], '_likes', true) ?: 0;?>
                    <?php $liked = isset($_COOKIE['liked_attachment_' . $item['crb_image']]);?>
                    <div class="flex flex-space-between flex-align-center">
                        <div class="likes flex flex-align-center gap-10 <?php echo ($liked ? 'active' : '');?>" data-attachment="<?php echo $item['crb_pdf'];?>"><span class="number"><?php echo $likes;?></span> likes</div>
                        <?php $pdf_count = (int) get_post_meta($item['crb_pdf'], '_open_count', true);?>
                        <div class="downloads gap-10"><span class="number"><?php echo (int) $pdf_count;?></span> downloads</div>
                    </div>
                    <?php echo wp_get_attachment_image($item['crb_image'], 'medium');?>
                    <header itemprop="name">
                        <?php echo str_replace(['-', '_', '.jpg', '.jpeg', '.webp', '.png'], ' ', basename( get_attached_file( $item['crb_image'] )));?>
                    </header>
                    <div class="buttons grid">
                        <button onclick="openAndPrintFile('<?php echo wp_get_attachment_url($item['crb_pdf']);?>'); return false;" class="button button-primary" target="_blank" data-attachment-id="<?php echo $item['crb_pdf'];?>">Print</button>
                        <?php if(!empty($item['crb_pdf'])):?>
                            <a href="<?php echo wp_get_attachment_url($item['crb_pdf']);?>" data-attachment-id="<?php echo $item['crb_pdf'];?>" target="_blank" class="button button-secondary">PDF</a>
                        <?php endif;?>
                    </div>
                </article>
                <?php endif;?>
                <?php endforeach;?>
            </section>
        </div>
        <?php endif;?>
        
        <?php $crb_seo_text = carbon_get_post_meta(get_the_ID(), 'crb_seo_text');?>
        <?php if(!empty_content($crb_seo_text)):?>
        <article class="content">
            <div class="seo-block"><?php echo apply_filters('the_content', $crb_seo_text);?></div>
        </article>
        <?php endif;?>
        
        <?php
        $categories = wp_get_post_categories($post->ID);
        $args = [
            'category__in'   => $categories,      // те же категории
            'post__not_in'   => [$post->ID],      // исключаем текущий пост
            'post_type'      => 'post',           // или свой CPT
            'posts_per_page' => 15,
        ];
        $related = new WP_Query($args);
        ?>
        <?php if ($related->have_posts()):?>
        <article class="content">
            <h2>Ähnliche Malvorlagen</h2>
            <section class="items carousel-container">
                <div class="owl-carousel post-carousel">
                    <?php while ($related->have_posts()) : $related->the_post();?>
                    <?php get_template_part('templates/content-part/content', get_post_type());?>
                    <?php endwhile;?>
                    <?php wp_reset_postdata();?>
                </div>
            </section>
        </article>
        <?php endif;?>
        
        <div class="content">
            <?php comment_form();?>
        </div>
    </aside>
    <aside class="sidebar">
        <?php
        $taxonomy = 'category'; // или твоя таксономия
        
        $term_query = new WP_Term_Query([
            'taxonomy'   => $taxonomy,
            'hide_empty' => false,
            // 'posts_per_page' => 5,
            // 'meta_query' => [
            //     [
            //         'key'     => 'crb_show_as_top',
            //         'value'   => '1',
            //         'compare' => '=', // можно использовать '!=', 'LIKE', и т.д.
            //     ],
            // ],
        ]);
        
        $top_terms = $term_query->get_terms();
        ?>
        <?php if(isset($top_terms) && count($top_terms)):?>
        <div class="sidebar-item content">
            <h3 class="h3">Die besten Malvorlagen</h3>
            <div class="categories-list">
                <?php foreach($top_terms as $term):?>
                <a href="<?php echo get_term_link($term->term_id);?>" class="category-item border-radius-10 m-b-10 flex flex-space-between active"><?php echo $term->name;?></a>
                <?php endforeach;?>
            </div>
        </div>
        <?php endif;?>
        
        <?php
        $query = new WP_Query([
            'posts_per_page' => 5,
            'post_type'      => 'post', // или 'blog', если кастомный
            'meta_query'     => [
                [
                    'key'     => 'crb_show_as_top',
                    'value'   => '1',
                    'compare' => '=',
                ],
            ],
        ]);
        ?>
        <?php if ($query->have_posts()):?>
        <div class="sidebar-item content">
            <h3 class="h3">Beliebte Malvorlagen</h3>
            <section class="items">
                <?php while ($query->have_posts()): $query->the_post();?>
                <a href="<?php the_permalink();?>" class="item flex gap-10 flex-align-center">
                    <picture class="item-picture">
                        <?php echo get_the_post_thumbnail();?>
                    </picture>
                    <header><?php the_title();?></header>
                </a>
                <?php endwhile;?>
                <?php wp_reset_postdata();?>
            </section>
        </div>
        <?php endif;?>
        <?php
        $args = [
            'post__not_in'   => [$post->ID],      // исключаем текущий пост
            'post_type'      => 'post',           // или свой CPT,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'posts_per_page' => 5,
        ];
        $new = new WP_Query($args);
        ?>
        <?php if ($new->have_posts()):?>
        <div class="sidebar-item content">
            <h3 class="h3">Neue Malvorlagen</h3>
            <section class="items">
                <?php while ($new->have_posts()) : $new->the_post();?>
                <a href="<?php the_permalink();?>" class="item flex gap-10 flex-align-center">
                    <picture class="item-picture">
                        <?php echo get_the_post_thumbnail();?>
                    </picture>
                    <header><?php the_title();?></header>
                </a>
                <?php endwhile;?>
                <?php wp_reset_postdata();?>
            </section>
        </div>
        <?php endif;?>
        
        <script>
        function openAndPrintFile(fileUrl) {
            const printWindow = window.open(fileUrl, '_blank');
            printWindow.focus();
            
            printWindow.onload = function () {
                printWindow.print();
            };
        }
        </script>
    </aside>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[data-attachment-id]').forEach(function(link) {
        link.addEventListener('click', function() {
            var attachmentId = this.dataset.attachmentId;

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'action=track_attachment_click&attachment_id=' + attachmentId
            })
            .then(response => response.json())
            .then(data => {
                // console.log('New count:', data.data.new_count);
            });
        });
    });
});
</script>