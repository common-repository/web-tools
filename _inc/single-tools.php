<?php 
/**
 * The template for displaying all web-tools.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

wp_enqueue_script('jquery');

get_header();?>


<style>
.web-tools-header{ display: flex; justify-content: center; align-items: center; margin-bottom: 30px; } .web-tools-logo img{ border-radius: 10px; width: 50px; height: 50px; } .web-tools-name{ padding: 10px; font-weight: 800; text-align: center; } .web-tools-code-section{ padding-bottom: 30px; }
	
		.card{
    padding-left: 5%;
	padding-right: 5%;
	padding-top: 30px;
	padding-bottom: 30px;
	margin-bottom: 20px;
    transition: 0.8s;
    outline: none;
    border: 0px solid #fff;
	border-radius: 20px;
	background-color: #fff;
	box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
-webkit-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
  } 

  .card:hover {
	box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.5);
-webkit-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.5);
-moz-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.5);
  }
  
  .card p {
    font-size: min(4.5vw, 20px);
  }
  
  .color-card{
    color: white;
background: rgb(255,0,0);
background: -moz-linear-gradient(150deg, rgba(255,0,0,1) 0%, rgba(255,0,0,1) 26%, rgba(255,0,116,1) 100%);
background: -webkit-linear-gradient(150deg, rgba(255,0,0,1) 0%, rgba(255,0,0,1) 26%, rgba(255,0,116,1) 100%);
background: linear-gradient(150deg, rgba(255,0,0,1) 0%, rgba(255,0,0,1) 26%, rgba(255,0,116,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff0000",endColorstr="#ff0074",GradientType=1);  
}

  .color-card h2, .color-card h3,.color-card h4,.color-card h5, .color-card h6, .color-card a{
	  color: white;
  }
  
  .features .title, .faq .title, .tips .title {
    font-size: min(7vw, 50px);
	margin-bottom: 0;
  }

</style>

<?php 

$tool_name = get_post_meta($post->ID, 'webtools_toolname', true);
$tool_code = get_post_meta($post->ID, 'webtools_main_code', true);
$tool_icon = wp_get_attachment_url(get_post_meta($post->ID, 'webtools_toolicon', true));

?>

<div class="web-tools-header">
            <div class="web-tools-logo">
                <img alt="<?php echo $tool_name; ?>" src="<?php echo $tool_icon; ?>" />
            </div>
            <h1 class="web-tools-name"><?php echo $tool_name; ?></h1>
        </div>

	<div class="web-tools-main-section web-tools-code-section">
		        <?php 
		echo wp_specialchars_decode($tool_code, ENT_QUOTES); 
		
		?>
	</div>

  <div class="web-tools-content">
    <?php the_content() ?>
  </div> 
   
</div>
</div>

<?php get_footer(); ?>

