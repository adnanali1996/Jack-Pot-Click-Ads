<?php
header ("Content-Type:text/css");
$color = "#42475B"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#42475B";
}

?>
.navbar-area ul li:hover a,
.contact-area:after
{
background-color:<?php echo $color ?>;
}

.sidebar .widget .widget-body li:hover a,
i.icofont.icofont-simple-up
{
color:<?php echo $color ?>;
}

.subscription-area .subscription-form input[type=submit],
.contact-area .contact-wrapper .contact-form input[type=submit]
{
box-shadow: inset 0 0 5px <?php echo $color ?>;
border: 2px solid <?php echo $color ?>;
}