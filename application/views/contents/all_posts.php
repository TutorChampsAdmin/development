<?php

$blogList  = '';
$count     = 0 ;
foreach($blogs AS $blog){
    $count++;
   
    $date       = date_create($blog['modified_date']);
    $updated_on = 'Updated  '.date_format($date,"F d, Y");
    $blogList .= '<div class="news-block style-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="'.$blog['title'].'"><img src="'.base_url().$blog['list_image'].'" alt="'.$blog['title'].'"></a>
                        </div>
                        <div class="lower-content">
                            <div class="border-layer"></div>
                            <ul class="post-info">
                                <li>'.$blog['cat_name'].'</li>
                                <li>'.$updated_on.'</li>
                            </ul>
                            <h4><a href="'.base_url('blog/'.$blog['url_slug']).'/">
                                    '.$blog['title'].'
                                </a></h4>
                            <a href="'.base_url('blog/'.$blog['url_slug']).'/" class="more">More <span class="fa fa-angle-double-right"></span></a>
                        </div>
                    </div>
                </div>'; 
}

?>

<section class="blog-page-section">
    <div class="pattern-layer-one" style="background-image: url('<?php echo base_url();?>assets/front/images/icons/icon-5.png')"></div>
    <div class="pattern-layer-two" style="background-image: url('<?php echo base_url();?>assets/front/images/icons/icon-6.png')"></div>
    <div class="pattern-layer-three" style="background-image: url('<?php echo base_url();?>assets/front/images/icons/icon-4.png')"></div>
    <div class="auto-container">
        <!-- Page Breadcrumb -->
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Blog</li>
        </ul>
        <div class="content-box">
            <h2>Latest articles &amp; news</h2>
            <div class="text">Interested in knowing about the latest trends in online education or online homework
                solutions? Want to learn some handy tips and tricks to improve your writing skills or be better prepared
                for the exam? Check our blogs now!</div>
        </div>
    </div>
    <div class="outer-container">
        <div class="row clearfix" id="all_blog_post">
            <?php echo $blogList;?>
    </div>
    
</section>
