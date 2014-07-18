<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/">
  <head>
    <title><?php wp_title(' - ', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/MyFontsWebfontsKit.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!--Uncomment this to use a favicon.ico in the theme directory: -->
    <link rel="SHORTCUT ICON" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    
    <?php $api_key_maps = "AIzaSyD5rId69G-ZPNYkZ9FNQuQ_ZxyRz2587bg"; ?>
    <script src="//code.jquery.com/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tools.min.js"></script>    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key_maps; ?>&sensor=false"></script>

    <script type="text/javascript">
   	var mobile_domain ="m.maykenbel.com";
    	// Set to false to not redirect on iPad
    	var ipad = true;
    	// Set to false to not redirect on other tablets (Android , BlackBerry, WebOS tablets).
    	var other_tablets = true;
    	// Include canonical link
        var path = encodeURIComponent(location.href);
    	var page = "?&url=" + path;
    	document.write('<link rel="alternate" media="only screen and (max-device-width: 1024px)" href="' + location.protocol + '//' + mobile_domain + page + '" >');
    	// Include the redirection script
    	document.write(unescape("%3Cscript src='"+location.protocol+"//s3.amazonaws.com/me.static/js/me.redirect.min.js' type='text/javascript'%3E%3C/script%3E")); 
    </script>

    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cookie.js"></script>
    
    <script type="text/javascript">
      jQuery(document).ready(function () {
        jQuery(".menu-item").hover(function () {
          jQuery(this).find(".sub-menu").css("display", "block");
        }, function () {
          jQuery(this).find(".sub-menu").css("display", "none");
        });
      });
    </script>
    
    <script>
        $(function() {
          var today = new Date();
          $( "#input-arrival-date" ).dateinput({format: 'dd/mm/yyyy', min: today});
          $( "#input-departure-date" ).dateinput({format: 'dd/mm/yyyy', min: today});
          $( "#message_arriving" ).dateinput({format: 'dd/mm/yyyy', min: today});
          $( "#message_departing" ).dateinput({format: 'dd/mm/yyyy', min: today});
          
          var hookdate1 = $("#input-arrival-date").data("dateinput");
          var hookdate2 = $("#input-departure-date").data("dateinput");
          var hookdate3 = $("#message_arriving").data("dateinput");
          var hookdate4 = $("#message_departing").data("dateinput");
          
          jQuery("#input-arrival-date").change(function () {
            hookdate2.setValue(hookdate1.getValue()).setMin(hookdate1.getValue());
          });
          
          jQuery("#message_arriving").change(function () {
            hookdate4.setValue(hookdate3.getValue()).setMin(hookdate3.getValue());
          });
        });
    </script>

    <?php wp_head(); ?>
<meta name="google-site-verification" content="pJfpUMm_URVkk0sniJs9koLMAwBPcCm4X9F-YfQcvag" />
  </head>
  
  <body <?php body_class(); ?>>
    <div id="header">
      <div id="headwrapper">
        <div id="flying-logo">
          <a href="<?php bloginfo('url'); ?>"><img alt="<?php bloginfo('description'); ?>" title="<?php bloginfo('description'); ?>" src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a>
          <div id="logo-msg-js"></div>
        </div>
        
        <div id="talk-to-us">
          <div id="phone-text-etc"><span id="phone-icon"></span>&nbsp;&nbsp;&nbsp;Talk to us today&nbsp;&nbsp;&nbsp;<span><a href="tel:02037587255">+44(0)20 3758 7255</a></span></div>
          <div id="timeframe-small">8AM-8PM WEEKDAYS + 10AM-5PM SATURDAYS (UK)</div>
          <div class="clearboth"></div>
        </div>
        
        <div id="navmenu-top">
          <ul id="topnav">
            <?php wp_nav_menu(array('theme_location' => 'header_nav')); ?>
          </ul>
        </div>
        <div class="clearboth"></div>
      </div>
      <?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>

      <script>
      jQuery(document).ready(function () {
        jQuery("#logo-msg-js").html(jQuery("#dataset_0 div.slider-logo-text").html());
      });
      
      jQuery(function() {
        // initialize scrollable
        jQuery("#homepage-slider").scrollable({ next: '#homepage-next', prev: '#homepage-prev', speed: 1000, circular: true}).navigator(".navi");
        
        //Call our responsive function
        responsiveScrollable();
        
        //Call our responsive funtion every time the browser window is resized
        jQuery(window).resize(function() {
          responsiveScrollable();
        });
        
        jQuery("#homepage-footer-post-slider").scrollable({ next: '#footernext', prev: '#footerprev', circular: true});
        jQuery("#quotes-slider").scrollable({ next: '#quotesnext', prev: '#quotesprev', circular: true});
        
        var api = jQuery("#homepage-slider").data("scrollable");
        
        api.onSeek(function(e, i) {
          jQuery("#logo-msg-js").html(jQuery("#dataset_" + this.getIndex() + " div.slider-logo-text").html());
          
         }); 
          
        function responsiveScrollable(){
          
          // Set width of scrollable slides to width of browser window
          //var siteWidth = $(window).width();
          
          if ($(window).width() >= 960) {
              jQuery('#homepage-slider .item').css('width', $(window).width());
              jQuery('#homepage-slider').css('width', $(window).width());
          } else {
              jQuery('#homepage-slider .item').css('width', 960);
              jQuery('#homepage-slider').css('width', 960);
          }
          
          // Set scrollable height to be proportional to the aspect ratio of the slide's content - eg if in your design the slide is 1000w x 500h, this ratio would be 2
          if ($(window).width() >= 940) {
            var bannerHeight = $(window).width() / 3.443478260869565; 
          } else {
            var bannerHeight = 940 / 3.443478260869565; 
          }
          
          jQuery('#homepage-slider .item').css('height', bannerHeight);
          jQuery('#homepage-slider').css('height', bannerHeight);
          
          if (1021 <= $(window).width() <= 1200) {
            jQuery('#homepage-enquiry-box').css('margin-top', bannerHeight - 100 + 'px');
            jQuery('#homepage-prev').css('margin-top', bannerHeight - (bannerHeight / 2 + 15) + 'px');
            jQuery('#homepage-next').css('margin-top', bannerHeight - (bannerHeight / 2 + 15) + 'px');
          } 
          
          if ($(window).width() <= 1020) {
            jQuery('#homepage-enquiry-box').css('margin-top', bannerHeight - 60 + 'px');
            jQuery('#homepage-prev').css('margin-top', bannerHeight - (bannerHeight / 2 + 5) + 'px');
            jQuery('#homepage-next').css('margin-top', bannerHeight - (bannerHeight / 2 + 5) + 'px');
          } 
          
          if ($(window).width() >= 1201) {
            jQuery('#homepage-enquiry-box').css('margin-top', bannerHeight - 140 + 'px');
            jQuery('#homepage-prev').css('margin-top', bannerHeight - (bannerHeight / 2 + 25) + 'px');
            jQuery('#homepage-next').css('margin-top', bannerHeight - (bannerHeight / 2 + 25) + 'px');
          }
          jQuery('#homepage-slider .navi').css('margin-top', bannerHeight + 5 + 'px');
          
          
          
          
          // Use the api to reposition the slide once it's been resized (if the broswer is resized)
          var api = $("#homepage-slider").data('scrollable');
          var currentSlide = api.getIndex();
          api.seekTo(currentSlide, 50);
        }
        
      });
      </script>



      <div id="homepage-slider">

        <a href="javascript:void(0)" id="homepage-next" class="next2"></a>
        <a href="javascript:void(0)" id="homepage-prev" class="prev2"></a>
        <div class="navi"></div>
      
        <div id="homepage-enquiry-box">
          <div id="find-place-to-stay">Find A Place To Stay</div>
          <div id='smaller-homepage-right-text'>LUXURY serviced apartments in London's Mayfair, Kensington and Belgravia</div>
          
          <div class="clearboth"></div>
          <div id="custom-enquiry-form-home">
            <form id="enquiry-from-jq">
              <input type="text" id="input-arrival-date" name="input_arrival_date" placeholder="Arrival Date">
              <input type="text" id="input-departure-date" name="input_departure_date" placeholder="Departure Date">
              <select name="select_type" id="apartment-type-select">
                <option value="0">Apartment Type</option>
                <option value="Studio">Studio</option>
                <option value="1_Bedroom">1 Bedroom</option>
                <option value="2_Bedroom">2 Bedroom</option>
                <option value="3_Bedroom">3 Bedroom</option>
                <option value="Penthouse_Suite">Penthouse Suite</option>
              </select>
              <span>Number of Guests&nbsp;&nbsp;</span><input style="width: 20px;" type="text" id="input-guests" name="input_guests" size="1">
            </form>
          </div>
        
          <div id="enquire-button-wrapper-home">
              <a href="javascript:void(0)" id="enquire-button-home" class="">VIEW APARTMENTS</a>
          </div>
          
          <script>
            jQuery(document).ready(function () {
              jQuery("#enquire-button-home").click(function () {
                jQuery.cookie(jQuery("#apartment-type-select").val(), 1);
                jQuery.cookie("arrivaldate", jQuery("#input-arrival-date").val());
                jQuery.cookie("departuredate", jQuery("#input-departure-date").val());
                jQuery.cookie("guestsno", jQuery("#input-guests").val());
                
                window.location.href = "<?php echo get_permalink( get_page_by_path( 'our-apartments' ) ) ?>";
              });
              
              jQuery("#four-boxes-home div").hover(function () {
                jQuery(this).addClass("box-dark");
              }, function () {
                jQuery(this).removeClass("box-dark");
              });
            });
          </script>
        </div>
        
        
        
      
        <div id="homepage-slider-wrapper" class="items">

            <?php 
            $args = array(
            'posts_per_page' => '96',
            'order'    => 'DESC',
            'post_type' => 'mkbc_homesliders',
            );
            
            $i = 0;
            
            $posts_array = get_posts($args);
            if(isset($posts_array) && !empty($posts_array)) : foreach( $posts_array as $my_post ) :
                $slider_thumb_errofix = wp_get_attachment_image_src(get_post_thumbnail_id($my_post->ID), "homepage-slider");
                $slider_thumb_errofix = $slider_thumb_errofix[0];
                
                echo "<div id='dataset_" . $i . "' class='custom-homepage-slide item' style='background: url(\"" . $slider_thumb_errofix . "\") repeat-x center;'><img style='width: 100%;' alt='' title='' src='" . $slider_thumb_errofix . "' />
                  <div class='slider-logo-text' style='display: none;'>
                    <div class='larger-letters-logo'>" . $my_post->post_title . "</div>
                    <div class='slider-logo-subtitle'>" . apply_filters('the_content', $my_post->post_content) . "</div>
                  </div>
                </div>";
               
                $i++;
                
                ?>
                
                
            <?php endforeach; endif; ?>
            
        </div>  
        
      </div>
      
    </div><!-- end #header -->
    
    <div id="wrapper">
    
      <div id="wrapper2">
                             
        <div id="main">
        
          <div id="content" style="background: #EFEFEF;">
              
              <div id="four-boxes-home">
                <div><a href="<?php echo get_permalink( get_page_by_path( 'our-apartments' ) ) ?>">Our Apartments</a></div>
                <div><a href="<?php echo get_permalink( get_page_by_path( 'enquiries' ) ) ?>">Enquire Now</a></div>
                <div><a href="<?php echo get_permalink( get_page_by_path( 'our-apartments' ) ) ?>">Location Map</a></div>
                <div class="box-last"><a href="<?php echo get_permalink( get_page_by_path( 'services', OBJECT , 'post' ) ) ?>">Services</a></div>
                <span class="clearboth"></span>
              </div>
              
              <?php if (have_posts()) : ?>
          
              <?php while (have_posts()) : the_post(); ?>
              
                  <div class="post" style="background: #EFEFEF;">
                          
                      <div class="pagecontent homeinsidepost" id="post-<?php the_ID(); ?>" style="background: #EFEFEF;">
                          

                       <div class="half-column-post-test">

                            <?php the_content('Read more &gt;'); ?>

                      </div>
                        </div>
                          </div>
                      <div id="post-<?php the_ID(); ?>" style="background: #EFEFEF;">
                          <div class="post" style="background: #EFEFEF;">
                      <div class="half-column-post-test">

      
                          <?php
                          
                          $attachments = get_children(array(
                              'post_parent' => $post->ID,
                              'post_status' => 'inherit',
                              'post_type' => 'attachment',
                              'post_mime_type' => 'image',
                              'orderby' => 'menu_order',
                          ));
                          
                          ?>
                                            
                      </div>

                  
                  </div>
              </div>
                  <div id="homepage-custom-images">
                    <?php 
                    $i = 0;
                    foreach ($attachments as $attachment) {
                      if ($i < 4) {
                      $storearray = wp_get_attachment_image_src($attachment->ID, "home-thumb");
                      $storearray = $storearray[0];
                      
                      echo "<a href='". get_permalink( get_page_by_path( 'london-life' ) ) ."'><img width='470' height='310' alt='' src='" . $storearray . "' /></a>";
                      $i++;
                      }
                    }
                    
                    ?>
                    <div id="london-parks" class="smallbox-home-london-life">Park Life</div>
                    <div id="london-museums" class="smallbox-home-london-life">Museums</div>
                    <div id="london-city" class="smallbox-home-london-life">Getting Around</div>
                    <div id="london-entertainment" class="smallbox-home-london-life">Cinema Guide</div>
                    <div id="london-life-home-center-of-images" class="smallbox-home-london-life"><span>London Life</span><p>Mayfair, Kensington <br>& Belgravia</p></div>
                  </div>
                  
                  <div id="homepage-custom-quotes">
                    <div class="post" style="background: #EFEFEF;"> 
                      <div class="pagecontent homeinsidepost" style="background: #EFEFEF;padding-bottom:0px;margin-bottom:-20px;">

                          <div class="half-column-post large">
                            <p>What Our <br />Guests Say</p> 
        </div>
                          
                          <div id="half-column-post-guests">
                          
                            <?php 
                            $args = array(
                            'posts_per_page' => '-1',
                            'post_type' => 'mkbc_homeguestsay',
                            );
                            
                            $posts_array = get_posts($args);
                            ?>
                            <div id="quotes-slider-navi">
                              <a id="quotesnext"></a>
                              <a id="quotesprev"></a>
                              <div class="clearboth"></div>
                            </div>
                            
                            <div id="quotes-slider">
                              <div id="quotes-slider-wrapper">
                              <?php
                              if(isset($posts_array) && !empty($posts_array)) : foreach( $posts_array as $my_post ) :
                                  echo "<div class='item quotes-single-slide'>";
                                  echo "<p>&nbsp;</p>
                                  <div id='quote-inside-text'>" . apply_filters('the_content', $my_post->post_content) . "</div>
                                  <div id='quote-author-name'>" . $my_post->post_title . "</div>
                                  <p>&nbsp;</p>";
                                  echo "</div>";
                                  $i++;
                                  ?>
                              <?php endforeach; endif; ?>
                              </div>
                            </div>
                          </div>
                                            
                      </div>
                  </div>
              </div>
                  
                  
              <?php endwhile;/* end the main loop */ ?>
          
              <?php endif; ?>
              
              <div id="slider-navigation-hpage">
                <a id="footernext"></a>
                <a id="footerprev"></a>
                <div class="clearboth"></div>
              </div>
              
              <div id="homepage-footer-post-slider">
                  <div id="homepage-footer-post-slider-wrapper">
                  
                  <?php 
                  $args = array(
                  'posts_per_page' => '12',
                  'orderby'    => 'rand'
                  );
                  
                  $i = 0;
                  
                  $posts_array = get_posts($args);
                  if(isset($posts_array) && !empty($posts_array)) : foreach( $posts_array as $my_post ) :
                      if ($i == 0) {
                          echo "<div class='three-post-cont-slide'>";
                      }
                      if ($i == 2) {
                        $classlast = " last";
                      } else {
                        $classlast = "";
                      }
                      $ranoutofnames = wp_get_attachment_image_src(get_post_thumbnail_id($my_post->ID), "london-thumb");
                      $ranoutofnames = $ranoutofnames[0];
                      echo "<div class='img-slider-hpage-london$classlast'>
                        <a href='". get_permalink($my_post->ID) ."'><img width='300' height='220' alt='' src='" . $ranoutofnames . "' /></a>
                        <a class='hpage-slider-title-link' href='". get_permalink($my_post->ID) ."'>".$my_post->post_title."</a>
                      </div>";
                      
                      if ($i == 2) {
                          echo "</div>";
                          $i = -1;
                      }
                      
                      $i++;
                      ?>
                  <?php endforeach; endif; ?>
                  <?php
                  if ($i < 2) {
                    echo "</div>";
                  }
                  ?>
                  
                  </div>
              </div>
              
          </div><!-- / end content -->
          
          
          <?php //get_sidebar(); ?>
            
          <div class="clearboth"></div>
          
        </div><!-- / end main -->
<!-- begin SnapEngage code -->
<script type="text/javascript">
  (function() {
    var se = document.createElement('script'); se.type = 'text/javascript'; se.async = true;
    se.src = '//commondatastorage.googleapis.com/code.snapengage.com/js/db4f7abe-a350-4d0a-ad1b-480c62ca796f.js';
    var done = false;
    se.onload = se.onreadystatechange = function() {
      if (!done&&(!this.readyState||this.readyState==='loaded'||this.readyState==='complete')) {
        done = true;
        /* Place your SnapEngage JS API code below */
        /* SnapEngage.allowChatSound(true); Example JS API: Enable sounds for Visitors. */
      }
    };
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(se, s);
  })();
</script>
<!-- end SnapEngage code -->
<?php get_footer(); ?>
      </div>
    </div>
    <div id="footer">
      <div id="footer-before">
        <div id="footer-inside-wrapper">
          <div class="footer-sides" style="text-align: right;">
            <h4>Properties</h4>
            
                      <?php

                      $taxonomy = 'apartments';
                      $tax_terms = get_terms($taxonomy, array('hide_empty' => false));

                      foreach ($tax_terms as $tax_term) {
                          $term_meta = get_option( "taxonomy_term_".$tax_term->term_id ); // Get Custom Data
                          echo '<div class="footer-appartment-list-title"><a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.', ' . $term_meta['mkb_apartment_district'] . '</a></div>';
  
                      }
                      
                      ?>
                      
          </div>
          <div class="footer-center">
            <img id="mkb-logo-btm" alt="maykenbel-bootm-logo" title="" src="<?php bloginfo('template_directory'); ?>/images/footer-logo.png" />
            <p>Subscribe to our newsletter for updates, offers and neighbourhood news.  We promise not to share your data and you can unsubscribe at any time by clicking the link at the bottom of our email.</p>
            
            <div id="custom-footer-bar"><?php dynamic_sidebar(); ?></div>
            
            <p>
              <a target="_blank" href="https://twitter.com/MaykenbelLondon"><img alt="" title="" src="http://www.maykenbel.com/wp-content/uploads/2014/05/twitter.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a target="_blank" href="https://www.facebook.com/Maykenbel"><img alt="" title="" src="http://www.maykenbel.com/wp-content/uploads/2014/05/fb.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a target="_blank" href="https://www.pinterest.com/aparthotels/"><img alt="" title="" src="http://www.maykenbel.com/wp-content/uploads/2014/05/pin.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a target="_blank" href="https://plus.google.com/+Maykenbel/posts"><img alt="" title="" src="http://www.maykenbel.com/wp-content/uploads/2014/05/gplus.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a target="_blank" href="http://www.linkedin.com/company/maykenbel-properties"><img alt="" title="" src="http://www.maykenbel.com/wp-content/uploads/2014/05/lin.png" /></a>
            </p>
          </div>
          <div class="footer-sides" style="text-align: left;">
             <h4>Penthouses</h4>
                      <?php

                      $taxonomy = 'penthouses';
                      $tax_terms = get_terms($taxonomy, array('hide_empty' => false));

                      foreach ($tax_terms as $tax_term) {
                          $term_meta = get_option( "taxonomy_term_".$tax_term->term_id ); // Get Custom Data
                          echo '<div class="footer-appartment-list-title"><a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.'</a></div>';
  
                      }
                      
                      ?>
             <div style="height: 20px;"></div>         
            <h4>Hotel</h4>
                      <?php

                      $taxonomy = 'hotels';
                      $tax_terms = get_terms($taxonomy, array('hide_empty' => false));

                      foreach ($tax_terms as $tax_term) {
                          $term_meta = get_option( "taxonomy_term_".$tax_term->term_id ); // Get Custom Data
                          echo '<div class="footer-appartment-list-title"><a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.' ' . $term_meta['mkb_apartment_district'] . '</a></div>';
  
                      }
                      
                      ?>
          </div>
          <div class="clearboth"></div>
        </div>
      </div>
      <div id="footer-wrapper">
        <div class="footer-left">&copy; <?php echo date('Y') ?> <a href="<?php bloginfo('url') ?>">Maykenbel Properties Ltd</a></div> 
        
        <div class="footer-right">Built by <a target="_blank" href="http://www.barefootseo.com/">Barefoot SEO</a></div>
        
        <div class="footer-right">
          <ul id="bottomnav">
            <?php wp_nav_menu(array('theme_location' => 'footer_nav')); ?>
          </ul>
        </div>
        
        <div class="clearboth"></div>
                
        <?php wp_footer(); ?>
      </div>
    </div>
    
    <script>    
      jQuery(document).ready(function () {
        console.log("init");
        if (getParameterByName('gclid') != '') {
          setCookie('adwords', '1', 30);
          console.log("cookie");
        }
        
        if (getCookie('adwords') == 1) {
          jQuery('#phone-text-etc').css('visibility', 'hidden');
          jQuery('.about-us-contact').css('display', 'none');
        }
      });
      
      function getParameterByName(name) {
          name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
          var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
              results = regex.exec(location.search);
          return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
      }
      
      function setCookie(cname,cvalue,exdays)
      {
        var d = new Date();
        d.setTime(d.getTime()+(exdays*24*60*60*1000));
        var expires = "expires="+d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
      } 
      
      function getCookie(cname)
      {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++)
          {
          var c = ca[i].trim();
          if (c.indexOf(name)==0) return c.substring(name.length,c.length);
          }
        return "";
      } 
    </script>

<?php 
if (function_exists('popupwfb')) {
  popupwfb( $Popupwfb_group = "GROUP1", $Popupwfb_id = "" ); 
}
?>    
    
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3682716-3', 'maykenbel.com');
  ga('send', 'pageview');

</script>

  </body>
</html>