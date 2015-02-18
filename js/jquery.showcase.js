// -----------------------------------------------------------------------
// Eros Fratini - eros@recoding.it
// jquery.showcase 2.0.1
//
// 02/02/2010 - Wow, a fix about 10 minute after release....
// 02/02/2010 - Debugging and demos
// 27/12/2009 - Optimized animation, added functions to pause and resume autocycling
//			  - Tested external ease functions		
// 24/12/2009 - Added a lot of settings, redefine css
// 21/12/2009 - Begin to write v2.0
// 27/07/2009 - Added asynchronous loading of images
// 26/06/2009 - some new implementations
// 19/06/2009 - standardization
// 08/06/2009 - Initial sketch
//
// requires jQuery 1.3.x
//------------------------------------------------------------------------
(function(jQuery) {
    jQuery.fn.showcase = function (options) {
        var jQuerycontainer = this;
        // Retrieve options
        var opt;
        opt = jQuery.extend({}, jQuery.fn.showcase.defaults, options);

		if (!/images|titles/.test(opt.linksOn)) 
        {
            opt.linksOn = "images";
        }
		if (options && options.css) {  
            opt.css = jQuery.extend({}, jQuery.fn.showcase.defaults.css, options.css); 
        }
        if (options && options.animation) {  
            opt.animation = jQuery.extend({}, jQuery.fn.showcase.defaults.animation, options.animation); 
            if (!/horizontal-slider|vertical-slider|fade/.test(opt.animation.type)) 
            {
                opt.animation.type = "horizontal-slider";
            }
        }
        if (options && options.navigator) { 
            opt.navigator = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator, options.navigator); 
            
            if (!/top-left|top-right|bottom-left|bottom-right/.test(opt.navigator.position)) 
            {
                opt.navigator.position = "top-right";
            }
            
            if (!/horizontal|vertical/.test(opt.navigator.orientation)) 
            { 
                opt.navigator.orientation = "horizontal";
            }
            
			if (options.navigator.css)
			{
				opt.navigator.css = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.css, options.navigator.css);
			}
			
            if (options.navigator.item) { 
				opt.navigator.item = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item, options.navigator.item);
                // Progressive extensions of hover and selected states, inherited by standard css properties
                opt.navigator.item.cssHover = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item.css, jQuery.fn.showcase.defaults.navigator.item.cssHover);
                opt.navigator.item.cssSelected = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item.css, jQuery.fn.showcase.defaults.navigator.item.cssSelected);
                
				if (options.navigator.item.css) { 
                    opt.navigator.item.css = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item.css, options.navigator.item.css);
                    opt.navigator.item.cssHover = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item.cssHover, options.navigator.item.css);
                    opt.navigator.item.cssSelected = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item.cssSelected, options.navigator.item.css); 
                }  
				if (options.navigator.item.cssHover) { opt.navigator.item.cssHover = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item.cssHover, options.navigator.item.cssHover); }
				if (options.navigator.item.cssSelected) { opt.navigator.item.cssSelected = jQuery.extend({}, jQuery.fn.showcase.defaults.navigator.item.cssSelected, options.navigator.item.cssSelected); }
			}
		}
		
        if (options && options.titleBar) { 
            opt.titleBar = jQuery.extend({}, jQuery.fn.showcase.defaults.titleBar, options.titleBar); 
			if (!/bottom|top/.test(opt.titleBar.position)) 
            {
                opt.titleBar.position = "bottom";
            }
			
            if (options.titleBar.css) { opt.titleBar.css = jQuery.extend({}, jQuery.fn.showcase.defaults.titleBar.css, options.titleBar.css);  }
        }
        
        // Check loading mode.
        // If there's something in opt.images[], I'll load them asynchronously, 
        // it will be nice to have width and height setted, in order to define the jQuerycontainer sizes
        if (opt.images.length != 0) {
            jQuerycontainer.css({ width: opt.css.width, height: opt.css.height, overflow: "hidden" });
            for (var i in opt.images) {
                var img = new Image();
                img.src = opt.images[i].url;
                img.alt = opt.images[i].description || "";
                var jQuerylink = jQuery("<a />").attr({ "href": opt.images[i].link || "#", "target": opt.images[i].target || "_self" });
                jQuerylink.append(img);
                jQuerycontainer.append(jQuerylink);
            }
        }
        
        // Check loading state of #1 image
        if (jQuerycontainer.find("img:first")[0].complete) {
            jQuery.fn.showcase.start(jQuerycontainer, opt);
        }
        else {
            jQuerycontainer.find("img:first").load( function() {
                jQuery.fn.showcase.start(jQuerycontainer, opt);
            });
        }
		
		// functions to control the palyback of showcase
		jQuery.fn.extend({
			pause: function() { jQuerycontainer.data("stopped", true); },
			go: function() { jQuerycontainer.data("stopped", false); }
		}) 
    }

	// This will start all showcase's stuffs
    jQuery.fn.showcase.start = function(jQuerycontainer, opt) {
        // Define local vars
        var index = 0;                             
        var nImages = jQuerycontainer.find("img").length;
        var jQueryfi = jQuerycontainer.find("img:first");
        var imagesize = { width: jQueryfi.removeAttr("width").width(), height: jQueryfi.removeAttr("height").height() };
        
		opt.css.width = imagesize.width;
		opt.css.height = imagesize.height;
		
        // setup container
		jQuerycontainer.css(opt.css)
            .find("a").css({ position: "absolute", top: "0", left: "0" })
                .find("img").css("border", "0px");
    
    	// setup navigator
        var jQueryslider = jQuery("<div id='slider' />").css({ position:"absolute" });
		var jQuerydivNavigator = jQuery("<div id='navigator' />").css(opt.navigator.css);

        switch (opt.navigator.position)
        {
            case "top-left": jQuerydivNavigator.css({ top: "0px", left: "0px" });
                break;
            case "top-right": jQuerydivNavigator.css({ top: "0px", right: "0px" });
                break;
            case "bottom-left": jQuerydivNavigator.css({ bottom: "0px", left: "0px" });
                break;
            case "bottom-right": jQuerydivNavigator.css({ bottom: "0px", right: "0px" });
                break;
        }
        
        jQuerycontainer.find("a").wrapAll(jQueryslider).each( function(i) {
            switch (opt.animation.type)
            { 
                case "horizontal-slider":
                    jQuery(this).css("left", i*imagesize.width);
                    break;
                case "vertical-slider":
                    jQuery(this).css("top", i*imagesize.height);
                    break;
                case "fade":
                    jQuery(this).css({ top: "0", left: "0", opacity:1, "z-index": 1000-i });
                    break;
            }
            
			// Create navigation bar item
            var jQuerynavElement = jQuery("<a href='#'>" + (opt.navigator.showNumber ? (i + 1) : "") + "</a>")
                                .css({ 	display: "block",
										"text-decoration": "none",
										"-moz-outline-style": "none" })
                                .click( function() {
									if (opt.animation.autoCycle) { clearInterval(opt.animation.intervalID); } // stop the current automatic animation
                                    jQuery.fn.showcase.showImage(i, jQuerycontainer, imagesize, opt);
                                    index = i;
									if (opt.animation.autoCycle) { opt.animation.intervalID = showcaseCycler(index, nImages, jQuerycontainer, imagesize, opt); } // restart the automatic animation
                                    return false;
                                })
                                .hover( 
                                	function() { if (!jQuery(this).data("selected")) {
                                					if (opt.navigator.item.cssClassHover)
                                					{ jQuery(this).addClass(opt.navigator.item.cssClassHover); }
                                					else 
                                					{ jQuery(this).css(opt.navigator.item.cssHover); }
                                				}
                                	},
                                	function() { if (!jQuery(this).data("selected")) {
	                            					if (opt.navigator.item.cssClassHover) 
					                   				{ jQuery(this).removeClass(opt.navigator.item.cssClassHover); }
					                   				else 
					                   				{ jQuery(this).css(opt.navigator.item.css); }
                                				}
                                	}
                                )
                                .appendTo(jQuerydivNavigator);

            if (opt.navigator.item.cssClass) { jQuerynavElement.attr("class", opt.navigator.item.cssClass); }
            else {
            	jQuery.extend({}, jQuerynavElement.css, opt.navigator.item);
                jQuerynavElement.css(opt.navigator.item.css);
            }
			
			switch (opt.navigator.orientation) 
                {
                    case "horizontal":
                        jQuerynavElement.css("float", "left");
                        break;
                    case "vertical":
                        jQuerynavElement.css("float", "none");
                        break;    
                }
            
            if (opt.navigator.showMiniature) {
                jQuery("<img />").attr({ src: jQuery(this).find("img").attr("src"), width: jQuerynavElement.css("width").replace("px", ""), height: jQuerynavElement.css("height").replace("px", ""), border: "0px" }).appendTo(jQuerynavElement);
            }
        });
        
        if (opt.navigator.autoHide) {
            jQuerydivNavigator.css("opacity", 0);
        }
        
        jQuerycontainer.append(jQuerydivNavigator).hover(
            function() { 
                if (opt.titleBar.autoHide && opt.titleBar.enabled) {
                    jQuery(jQuerytitleBar).stop().animate({ opacity: opt.titleBar.css.opacity, left: 0, right: 0, height: opt.titleBar.css.height }, 250);
                }
                if (opt.navigator.autoHide) { jQuery(jQuerydivNavigator).stop().animate({ opacity: 1 }, 250); }
                jQuery(this).data("isMouseHover", true);
            },
            function() { 
                if (opt.titleBar.autoHide && opt.titleBar.enabled) {
                    jQuerytitleBar.stop().animate({ opacity: 0, height: "0px" }, 400); 
                }
                if (opt.navigator.autoHide) { jQuerydivNavigator.stop().animate({ opacity: 0 }, 250); }
                jQuery(this).data("isMouseHover", false);
            }
        );
        
        // Create titleBar
		if (opt.titleBar.enabled) {
			if (opt.linksOn == "images")
			{
				var jQuerytitleBar = jQuery("<div id='subBar' />").html( jQuery("<span />").html(jQuerycontainer.find("a:first img").attr("alt")) );
			}
			else 
			{
				var jQuerya = jQuery("<a />").attr("href", jQuerycontainer.find("a:first").attr("href")).html("<span>" + jQuerycontainer.find("a:first img").attr("alt") + "</span>");
				var jQuerytitleBar = jQuery("<div id='subBar' />").html(jQuerya)

				jQuerycontainer.find("#slider a").each( function() {
					jQuery(this).attr("rel", jQuery(this).attr("href"));
				});
				jQuerycontainer.find("#slider a").removeAttr("href");
			}
			
            jQuerytitleBar.css({
                opacity: 0.50,
                width: "100%",
			 	overflow: "hidden",
    	   	   	"z-index": 10002,
    	   	   	position: "absolute"
            });
            
			if(opt.titleBar.position == "top") { jQuerytitleBar.css("top", "0"); }
            else { jQuerytitleBar.css("bottom", "0"); }
			
	        if (opt.titleBar.cssClass) { jQuerytitleBar.attr("class", opt.titleBar.cssClass); }
	        else { 
                jQuerytitleBar.css(opt.titleBar.css); 
                jQuery("a", jQuerytitleBar).css("color", opt.titleBar.css.color);
            }
            
	        if (opt.titleBar.autoHide) { jQuerytitleBar.css({
				"height": "0px",
				"opacity": 0
			}); }
	        jQuerytitleBar.appendTo(jQuerycontainer);
		}
			
		// set first image as selected
		jQuery.fn.showcase.setNavigationItem(0, jQuerycontainer, opt);
        
		// startup cycling
        if (opt.animation.autoCycle) {
            opt.animation.intervalID = showcaseCycler(index, nImages, jQuerycontainer, imagesize, opt);
        }
    }
    
	var showcaseCycler = function(index, nImages, jQuerycontainer, imagesize, opt) {
		return setInterval( function() { 
				if (!jQuerycontainer.data("stopped")){
					if (!jQuerycontainer.data("isMouseHover") || !opt.animation.stopOnHover) 
                    	jQuery.fn.showcase.showImage(++index % nImages, jQuerycontainer, imagesize, opt);	
				}
            }, opt.animation.interval);
	};
	
    jQuery.fn.showcase.showImage = function(i, jQuerycontainer, imagesize, opt) {
        var jQuerya = jQuerycontainer.find("a");
		var jQuerya_this = jQuerycontainer.find("a").eq(i);

        switch (opt.animation.type)
        { 
            case "horizontal-slider": jQuerycontainer.find("#slider").stop().animate({ left: - (i*imagesize.width) }, opt.animation.speed, opt.animation.easefunction);
                break;
            case "vertical-slider": jQuerycontainer.find("#slider").stop().animate({ top: - (i*imagesize.height) }, opt.animation.speed, opt.animation.easefunction);
                break;
            case "fade":
                jQuerycontainer.css({ "z-index": "1001" });
                if (jQuerya_this.css("z-index") != "1000") 
                {
                    jQuerya_this.css({ "z-index": "1000", opacity: 0 });
					
                    jQuerya.not(jQuerya_this).each( function() {
						if (jQuery(this).css("z-index") != "auto")
							jQuery(this).css("z-index", parseInt(jQuery(this).css("z-index"), 10) - 1);
                    });
                    
                    jQuerya_this.stop().animate({ opacity: 1 }, opt.animation.speed, opt.animation.easefunction);
                }
                break;
        }

		if (opt.titleBar.enabled) {
			if (opt.linksOn == "titles") {
				jQuery("#subBar a", jQuerycontainer).attr({
					"href": jQuerya_this.attr("rel"), "target": jQuerya_this.attr("target")
				});
			}
		}
		jQuery("#subBar span", jQuerycontainer).html(jQuerya_this.find("img").attr("alt"));
        // Setting selected navigationItem
		jQuery.fn.showcase.setNavigationItem(i, jQuerycontainer, opt);
	};
    
	// Highlight the navigationItem related to image
	jQuery.fn.showcase.setNavigationItem = function(i, jQuerycontainer, opt) {
        if (opt.navigator.item.cssClassSelected) {
            jQuerycontainer.find("#navigator a").removeClass(opt.navigator.item.cssClassSelected).data("selected", false);
			jQuerycontainer.find("#navigator a").eq(i).addClass(opt.navigator.item.cssClassSelected).data("selected", true);
        }
        else {
			if (opt.navigator.item.cssClass) {
				//jQuerycontainer.find("#navigator a").removeAttr("style").data("selected", false);
				jQuerycontainer.find("#navigator a").eq(i).css(opt.navigator.item.cssSelected).data("selected", true);
			}
			else {
				jQuerycontainer.find("#navigator a").css(opt.navigator.item.css).data("selected", false);
				jQuerycontainer.find("#navigator a").eq(i).css(opt.navigator.item.cssSelected).data("selected", true);	
			}
        }
	};
	
    jQuery.fn.showcase.defaults = {
        images: [],
		linksOn: "images",
		css: {	position: "relative", 
				overflow: "hidden",
				border: "none",
				width: "",
				height: ""
		},
        animation: { autoCycle: true,
                     stopOnHover: true,
                     interval: 4000,
                     speed: 500,
                     easefunction: "swing",
                     type: "horizontal-slider" },
		
		navigator: { css: {	border: "none",
					        padding: "5px",
							margin: "0px",
							position: "absolute", 
			            	"z-index": 1000
					},
					position: "top-right",
					orientation: "horizontal",
					autoHide: false,
					showNumber: false,
					showMiniature: false,
					item: { cssClass: null,
					 		cssClassHover: null,
					     	cssClassSelected: null,
							css: {	
								color: "#000000",
								"text-decoration": "none",
                                "text-align": "center",
								"-moz-outline-style": "none",
								width: "12px", 
								height: "12px",
								lineHeight: "12px",
								verticalAlign: "middle",
								backgroundColor: "#878787",
								margin: "0px 3px 3px 0px",
								border: "solid 1px #acacac",
								"-moz-border-radius": "4px",
								"-webkit-border-radius": "4px" },
							cssHover: {
								backgroundColor: "#767676",
								border: "solid 1px #676767" },
							cssSelected: {	
								backgroundColor: "#00FF00",
								border: "solid 1px #acacac" }
							}
                     },
		titleBar: { enabled: true,
					autoHide: true,
					position: "bottom",
		            cssClass: null,
		            css: { 	opacity: 0.50,
		        	   	   	color: "#ffffff",
		                   	backgroundColor: "#000000",
		                   	height: "40px",
						   	padding: "4px",
		                   	fontColor: "#444444",
		                   	fontStyle: "italic",
		                   	fontWeight: "bold",
		                   	fontSize: "1em" } }
	};
	
})(jQuery);