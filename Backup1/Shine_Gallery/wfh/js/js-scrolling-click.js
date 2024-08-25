//<![CDATA[ 
$(window).load(function(){
var step = 110;
var scrolling = false;

// Wire up events for the 'scrollUp' link:
$("#scrollUp").bind("click", function(event) {
    event.preventDefault();
    // Animates the scrollTop property by the specified
    // step.
    $("#contents").animate({
        scrollTop: "-=" + step + "px"
    });
}).bind("click", function(event) {
    scrolling = true;
    scrollContent("up");
}).bind("click", function(event) {
    scrolling = false;
});


$("#scrollDown").bind("click", function(event) {
    event.preventDefault();
    $("#contents").animate({
        scrollTop: "+=" + step + "px"
    });
}).bind("click", function(event) {
    scrolling = true;
    scrollContent("down");
}).bind("click", function(event) {
    scrolling = false;
});


function scrollContent(direction) {
    var amount = (direction === "up" ? "-=1px" : "+=1px");
    $("#contents").animate({
        scrollTop: amount
    }, 1, function() {
        if (scrolling) {
            scrollContent(direction);
        }
    });
}
});


//]]>  
