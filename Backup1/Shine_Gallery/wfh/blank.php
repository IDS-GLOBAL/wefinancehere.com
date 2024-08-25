<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="gallerystyles.css" type="text/css"></link>




		<link rel="stylesheet" href="../../galleriffic-2.0/css/basic.css" type="text/css" />
		<link rel="stylesheet" href="../../galleriffic-2.0/css/galleriffic-2.css" type="text/css" />
		<script type="text/javascript" src="../../galleriffic-2.0/js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="../../galleriffic-2.0/js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="../../galleriffic-2.0/js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>
        
        


<!--Gallery Style -->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/aura_400.font.js"></script>
<script type="text/javascript">
  $(document).ready(function()
  {
   
	 /*Your ShineTime Welcome Image*/
	 var default_image = 'images/default.png';
	 var default_caption = 'Vehicle Preview';
	 
	 /*Load The Default Image*/
	 loadPhoto(default_image, default_caption);
	 
	 
	 function loadPhoto($url, $caption)
	 {
	 
	 
	    /*Image pre-loader*/
	    showPreloader();
	    var img = new Image();
	    jQuery(img).load( function() 
		{
			jQuery(img).hide();
			hidePreloader();
		
        }).attr({ "src": $url });
	
	    $('#largephoto').css('background-image','url("' + $url + '")');
		$('#largephoto').data('caption', $caption);
	 }

	 
	 /* When a thumbnail is clicked*/
	 $('.thumb_container').click(function()
	 {
	     
		  var handler = $(this).find('.large_image');
		  var newsrc  = handler.attr('src');
		  var newcaption  = handler.attr('rel');
		  loadPhoto(newsrc, newcaption);
	 
	 });
	 
	 /*When the main photo is hovered over*/
	 $('#largephoto').hover(function()
	 {
	    
		var currentCaption  = ($(this).data('caption'));
		var largeCaption = $(this).find('#largecaption');
		
		largeCaption.stop();
		largeCaption.css('opacity','0.9');
		largeCaption.find('.captionContent').html(currentCaption);
		largeCaption.fadeIn()
	
	
		
		 largeCaption.find('.captionShine').stop();
         largeCaption.find('.captionShine').css("background-position","-550px 0"); 
         largeCaption.find('.captionShine').animate({backgroundPosition: '550px 0'},700);
		 
		 Cufon.replace('.captionContent');
		

	 },
	 
	 function()
	 {
	    var largeCaption = $(this).find('#largecaption');
		largeCaption.find('.captionContent').html('');
		largeCaption.fadeOut();
	 
	 });
	
	 
	 
     /* When a thumbnail is hovered over*/
	 $('.thumb_container').hover(function()
	 {  
         $(this).find(".large_thumb").stop().animate({marginLeft:-7, marginTop:-7},200);
		 $(this).find(".large_thumb_shine").stop();
         $(this).find(".large_thumb_shine").css("background-position","-99px 0"); 
         $(this).find(".large_thumb_shine").animate({backgroundPosition: '99px 0'},700);
			 
	 }, function()
	 {
	    $(this).find(".large_thumb").stop().animate({marginLeft:0, marginTop:0},200);
	 });
	 
	 function showPreloader()
	 {
	   $('#loader').css('background-image','url("images/loader.gif")');
	 }
	 
	 function hidePreloader()
	 {
	   $('#loader').css('background-image','url("")');
	 }
   
  });
</script>

</head>

<body>


<!-- Start Big Window -->

<div class="mainframe">
      <div id="largephoto">
	  <div id="loader"></div>
	  
	  
	    <div id="largecaption">
		 <div class="captionShine"></div>
		   <div class="captionContent"></div>
		  
		</div>
		
       <div id="largetrans">  
      </div>
	        
      </div>
      
   </div>
   
<!-- End Big Window -->   
   


<!-- Start Thumbnail Gallery -->

				<div id="thumbs" class="navigation">
                
					<ul class="thumbs noscript">

				    </ul>
                    
				</div>
				
                <br>

            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="044.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="044.JPG" />
            
            <div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>

            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="045.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="045.JPG" />
            <div class='large_thumb_border'></div>
            
            <div class='large_thumb_shine'></div></div></div></div>
            
            
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="046.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="046.JPG" />
            <div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>
                        
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="047.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="047.JPG" />
            <div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>
                                    
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="048.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="048.JPG" />
            <div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>
                                        
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="049.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="049.JPG" />
            <div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>
            
            
            <div class='thumbnailimage'>
            <div class='thumb_container'>
                <div class='large_thumb'>
                    <img width="70px" class="large_thumb_image" alt="thumb"  src="050.JPG" />
                    <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="050.JPG" />
                    <div class='large_thumb_border'></div>
                    <div class='large_thumb_shine'></div></div></div></div>
                                                    
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="051.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src=051.JPG /><div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>
                                                    
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src=052.JPG />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src=052.JPG /><div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>
            
            
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src=053.JPG />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src=053.JPG /><div class='large_thumb_border'></div>
            
            <div class='large_thumb_shine'></div></div></div></div>
            
            <div class='thumbnailimage'>
            <div class='thumb_container'>
            <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src=054.JPG />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="054.JPG" />
            <div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>

            <div class='thumbnailimage'>
            <div class='thumb_container'><div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="055.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="055.JPG" />
            <div class='large_thumb_border'></div>
            
            <div class='large_thumb_shine'></div></div></div></div>
                                                                                            
         
            <div class='thumbnailimage'>
            <div class='thumb_container'>
                <div class='large_thumb'>
            <img width="70px" class="large_thumb_image" alt="thumb"  src="056.JPG" />
            <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="056.JPG" />
                                                                                            
            <div class='large_thumb_border'></div>
            
            <div class='large_thumb_shine'></div></div></div></div>
        
            <div class='thumbnailimage'>
            <div class='thumb_container'>
                <div class='large_thumb'>
                    <img width="70px" class="large_thumb_image" alt="thumb"  src="057.JPG" />
                    <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="057.JPG" />
            
            <div class='large_thumb_border'></div>
            <div class='large_thumb_shine'></div></div></div></div>
        
            <div class='thumbnailimage'>
            <div class='thumb_container'>
                <div class='large_thumb'>
                    <img width="70px" class="large_thumb_image" alt="thumb"  src="058.JPG" />
                    <img width="450px" class="large_image" rel="Finance This 2006 Hummer H3   Today!" src="058.JPG" />
                    
                    <div class='large_thumb_border'></div>
                    <div class='large_thumb_shine'></div></div></div></div><!--end entry-->
                    



<!-- End Thumbnail Gallery -->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>        
</body>

</html>