<style>
    .blog-detail li {
        list-style: disc;
        margin-left: 18px;
    }
</style>
<section class="blog-detail-banner-section blog_inner py-5">
    <div class="pattern-layer-two" style="background-image: url('<?php echo base_url();?>assets/front/images/icons/icon-6.png')"></div>
    <div class="pattern-layer-three" style="background-image:url('<?php echo base_url();?>assets/front/images/icons/icon-4.png')"></div>
    <div class="pattern-layer-four" style="background-image: url('<?php echo base_url();?>assets/front/images/icons/icon-8.png')"></div>
    <div class="auto-container text-center">
    <div class="blogTitle blog-title text-dark py-2">
        <h1><?php echo $page['title']; ?></h1>
    </div>
    <ul class="page-breadcrumb pb-4 pt-0 m-0">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="<?php echo base_url();?>blog/">Blog</a></li>
        <li><?php echo $page['title']; ?></li>
    </ul>
    </div>
</section>
<div class="sidebar-page-container blog_inner style-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <div class="blog-detail">


                    <div class="inner-box blog-content-box pr-2">
                        <div class="mb-2">
                            <img class="imgwidth100" src="<?php echo base_url().$page['featured_image'];?>" alt="">
                        </div>
                        <?php echo $page['description']; ?>
                    </div>
                </div>
            </div>

            <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                <aside class="sidebar sticky-top">
                    <div class="sidebar-widget popular-posts">
                        <div class="sidebar-title">
                            <h3 class="border-bottom">Recent Posts</h3>
                        </div>
                        <div class="widget-content">
                            <?php
                                foreach($latest_posts AS $blog){
                                $count++;
                               
                                $date       = date_create($blog['modified_date']);
                                $updated_on = date_format($date,"F d, Y");
                                        echo '<article class="post">
                                            <div class="post-info">'.$updated_on.'</div>
                                            <div class="text"><a href="'.base_url('blog/'.$blog['url_slug']).'/">'.$blog['title'].'</a></div>
                                        </article>'; 
                                }
                         
                             ?>
                           
                        </div>
                    </div>

                    <div class="sidebar-widget popular-posts">
                        <div class="sidebar-title">
                            <h3 class="border-bottom">Popular Posts</h3>
                        </div>
                        <div class="widget-content">
                             <?php
                                foreach($popular_posts AS $blog){
                                $count++;
                               
                                $date       = date_create($blog['modified_date']);
                                $updated_on = date_format($date,"F d, Y");
                                        echo '<article class="post">
                                            <div class="post-info">'.$updated_on.'</div>
                                            <div class="text"><a href="'.base_url('blog/'.$blog['url_slug']).'/">'.$blog['title'].'</a></div>
                                        </article>'; 
                                }
                         
                             ?>
                            
                        </div>
                    </div>
                </aside>
            </div>          


        </div>
    </div>
</div>    