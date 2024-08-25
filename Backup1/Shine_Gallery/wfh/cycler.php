<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Position - Image Cycler</title>
  <link rel="stylesheet" href="jquery-ui.css" />
  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <style>
  body {
    margin: 0;
  }
  #thumb-container {
    overflow: hidden;
    position: relative;
    height: 500px;
  }
 
  img {
    position: absolute;
  }
  </style>
  <script>
  $(function() {
    // TODO refactor into a widget and get rid of these plugin methods
    $.fn.left = function( using ) {
      return this.position({
        my: "right middle",
        at: "left+25 middle",
        of: "#thumb-container",
        collision: "none",
        using: using
      });
    };
    $.fn.right = function( using ) {
      return this.position({
        my: "left middle",
        at: "right-25 middle",
        of: "#thumb-container",
        collision: "none",
        using: using
      });
    };
    $.fn.center = function( using ) {
      return this.position({
        my: "center middle",
        at: "center middle",
        of: "#thumb-container",
        using: using
      });
    };
 
    $( "img:eq(0)" ).left();
    $( "img:eq(1)" ).center();
    $( "img:eq(2)" ).right();
 
    function animate( to ) {
      $( this ).stop( true, false ).animate( to );
    }
    function next( event ) {
      event.preventDefault();
      $( "img:eq(2)" ).center( animate );
      $( "img:eq(1)" ).left( animate )
      $( "img:eq(0)" ).right().appendTo( "#thumb-container" );
    }
    function previous( event ) {
      event.preventDefault();
      $( "img:eq(0)" ).center( animate );
      $( "img:eq(1)" ).right( animate );
      $( "img:eq(2)" ).left().prependTo( "#thumb-container" );
    }
    $( "#previous" ).click( previous );
    $( "#next" ).click( next );
 
    $( "img" ).click(function( event ) {
      $( "img" ).index( this ) === 0 ? previous( event ) : next( event );
    });
 
    $( window ).resize(function() {
      $( "img:eq(0)" ).left( animate );
      $( "img:eq(1)" ).center( animate );
      $( "img:eq(2)" ).right( animate );
    });
  });
  </script>
</head>
<body>
 
<div id="thumb-container">
  <img src="044.JPG" width="500"  />
  <img src="045.JPG" width="500"  />
  <img src="046.JPG" width="500"  />
 
  <a id="previous" href="#">Previous</a>
  <a id="next" href="#">Next</a>
</div>
 
 
</body>
</html>