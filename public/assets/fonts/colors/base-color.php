<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here

$second = "#8e44ad"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( isset( $_GET[ 'second' ] ) AND $_GET[ 'second' ] != '' ) {
    $second = "#".$_GET[ 'second' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}

if( !$second OR !checkhexcolor( $second ) ) {
    $second = "#8e44ad";
}

?>


.overlay,
.gradient-bg,
.site-preloader ,
.why-choose-content,
.service-icon,
.service-icon i,
.service-icon .gradient-hover,
.portfolio-overlay,
.price-amount,
.main-menu.affix{
background: <?php echo $color ?>;
background: -webkit-gradient(linear, left bottom, left top, from(<?php echo $second ?>), to(<?php echo $color ?>));
background: linear-gradient(0deg, <?php echo $second ?>, <?php echo $color ?>);
}


<!--.pricing-tbl-single h3 {-->
<!--color: -webkit-gradient(linear, left top, left bottom, from(--><?php //echo $second ?><!--), to(--><?php //echo $color ?><!--));-->
<!--color: linear-gradient(180deg, --><?php //echo $second ?><!--, --><?php //echo $color ?><!--);-->
<!--}-->


.navbar-default .navbar-nav > li.active > a,
.navbar-default .navbar-nav > li.active > a:focus,
.navbar-default .navbar-nav > li.active > a:hover,
.navbar-default .navbar-nav > li > a:hover{

color: <?php echo $color ?>;
}

.breadcrumb li.active a,
.post-meta h2 a,
.widget h4,
.recent-post-item h5 a:hover,
.widget.categories li a:hover,
.widget.archive li a:hover,
.post-meta span a i,
.blog-single-wrap .post-meta h2,
.main-menu.affix .navbar-default .navbar-nav > li.active > a,
.main-menu.affix .navbar-default .navbar-nav > li.active > a:focus,
.main-menu.affix .navbar-default .navbar-nav > li > a:focus,
.main-menu.affix .navbar-default .navbar-nav > li.active > a:hover,
.main-menu.affix .navbar-default .navbar-nav > li > a:hover{

color: <?php echo $second ?>;
}

.slide-caption a,
.notfound-btn a,
.parallax-content a,
.video-content a,
.team-social li a:hover,
.post-content a:hover,
.blog-social li a:hover,
.banner-content a{

background-color: <?php echo $second ?>;
}

.pricing-tbl-single {

-webkit-box-shadow: 0 0 4px 0 <?php echo $second ?>;
box-shadow: 0 0 4px 0 <?php echo $second ?>;
}

.pricing-btn a,
.pagination li a,
.blog-social li a,
.testimonial-carousel.owl-carousel .owl-dot,
.post-content a{

border: 2px solid <?php echo $second ?>;
color: <?php echo $second ?>;
}

.pricing-tbl-single:hover a,
.team-single-info,
.subscribe-btn button,
.contact-form button,
.testimonial-carousel.owl-carousel .owl-dot.active{

background-color: <?php echo $second ?>;
}

.team-social,
.contact-form button:hover,
.underlineHover:after,
.subscribe-btn button:hover{

background-color: <?php echo $color ?>;
}


.widget.tag-cloud span a {


background-color: <?php echo $second ?>;
color: <?php echo $second ?>;

}

.pagination li.active a {
background-color:<?php echo $second ?>;
border-color: <?php echo $second ?>;
}

.pagination li a:hover,
.pagination li.active a:hover {

background-color: <?php echo $second ?>;
border-color: <?php echo $second ?>;

}
.pranto:hover,
input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover{
background: <?php echo $color ?>;
}

h2.active {
color: <?php echo $color ?>;
border-bottom: 2px solid <?php echo $second ?>;
}

input[type=button], input[type=submit], input[type=reset],
.pagination > .active > span{
background-color: <?php echo $second ?>;
}

input[type=text],
input[type=email],
select,
input[type=password]:focus {
background-color: #fff;
border-bottom: 2px solid <?php echo $second ?>;
}

