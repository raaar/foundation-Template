/* Custom modules used:
 * Responsive
 * Preloader
 * Keyboard Controls (but manually removed)
 */
/* Unhide the slider on document load:*/
jQuery(document).ready(function() {
	jQuery("div.liquid-slider-wrapper").removeClass('hidden-slider');
});

/* Here is the slider using default settings */
if (jQuery('#slider-id').length) { // implies *not* zero
	jQuery('#slider-id').liquidSlider({
	  dynamicArrows:false,
	  continuous:false,
	  dynamicTabs:false,
	  swipe:false,
	  slideEaseFunction:"easeInOutExpo",
	  slideEaseDuration:1000
	});
} 





/* Config */
var sliderMaxWidth  = '1016',
    maxNumberOfSlidesShown = 4,
    useAutoslide     = false,
    autoslideDelay  = 5000;
/* End Config */

var tabPanelCount = 4;
var columnCount = 0;
var columnCountSecond = 0;

var baseArray = [];
var baseSizeArray = [];

var slideone = jQuery("#slider-id-wrapper .liquid-slider .panel-container .slider-id-panel");
loadBaseArray();

// 600px using my defaults
var midSwitch = sliderMaxWidth * ((maxNumberOfSlidesShown - 1) / maxNumberOfSlidesShown)/* + 25*/,
// 300px using my defaults
    smallSwitch = sliderMaxWidth * ((maxNumberOfSlidesShown - 2) / maxNumberOfSlidesShown) + 50;
	
	smallerSwitch = sliderMaxWidth * ((maxNumberOfSlidesShown - 3) / maxNumberOfSlidesShown) + 150;
// Set more if you desire, but add conditionals below.

// conditionals based on the screen width, we show a different # of slides.
// You can also set different heights here as well
function determineSlidesShown() {
  if (sliderObject.slideWidth < smallerSwitch) {
    // Switch to the smallest setting of all!!
    numberOfSlidesShown = maxNumberOfSlidesShown - 3;
	tabPanelCount = 1;
	transitionSize = 1;
	//relocateLarge();
	columnCount = sliderObject.panelCount;
	addTabs();
  } else if (sliderObject.slideWidth < smallSwitch) {
    // Switch to the smallest setting
    numberOfSlidesShown = maxNumberOfSlidesShown - 2;
	tabPanelCount = 2;
	transitionSize = 2;
	relocateLarge();
	getColumnCount();
	addTabs();
  } else if (sliderObject.slideWidth < midSwitch) {
    // if that fails, move to the mid width
    numberOfSlidesShown = maxNumberOfSlidesShown - 1;
	tabPanelCount = 3;
	transitionSize = 3;
	relocateLarge();
	getColumnCount();
	addTabs();
  } else {
    //This is for the heighest width
    numberOfSlidesShown = maxNumberOfSlidesShown;
	tabPanelCount = 4;
	transitionSize = 4;
	relocateLarge();
	getColumnCount();
	addTabs();
  }
  setSlidesShown();
  //jQuery("div.liquid-slider-wrapper").css( "opacity", "100%" );
};

var weAreOnSlideNumber;
function setSlidesShown() {
  jQuery('#slider-id-wrapper').css('max-width', sliderMaxWidth);
  jQuery('#slider-id-wrapper .liquid-slider .panel').css('width', 100 / (sliderObject.panelCount * numberOfSlidesShown) + '%');
  if (transitionSize > 1){
	jQuery('#slider-id-wrapper .liquid-slider .panel.large').css('width', 200 / (sliderObject.panelCount * numberOfSlidesShown) + '%');
  } else {
	jQuery('#slider-id-wrapper .liquid-slider .panel.large').css('width', 100 / (sliderObject.panelCount * numberOfSlidesShown) + '%');
  }
  jQuery('.liquid-slider-wrapper .liquid-slider .panel .panel').css('width', '100%');
  //console.log(sliderObject.panelCount);
  // Store the first panel so we know where we are (also reset on resize)
  weAreOnSlideNumber = sliderObject.options.firstPanelToLoad - 1; // Make it 0 based
  //adjust current slide
  sliderObject.currentTab = (weAreOnSlideNumber);
  sliderObject.transition();
}

// Store the slider in an object. you shouldnt need to edit this
var sliderObject = jQuery.data( jQuery('#slider-id')[0], 'liquidSlider');


// load up the basic tabs for the 
function loadBaseArray(){
	slideone.each(function(i, val) {
			
			if(jQuery(this).hasClass("large")){
				baseSizeArray[i] = 2;
			}
			else{
				baseSizeArray[i] = 1;
			}
			baseArray[i] = jQuery(this);
		});
}

// This will relocate the large columns if they are bisected by the edge of the page -
function relocateLarge(){
	// load our temp arrays from the base arrays -
	var panelArray = baseArray;
	var panelSizeArray = baseSizeArray;
	//remove the panels -
	slideone.each(function() {
		jQuery(this).detach();
	});
	// This sorts the panels so that large ones don't hang half off the page -
	function resort(){
		var swapOne = 1000;
		var swapTwo = 1000;
		for (var i in panelSizeArray){
			var sum = 0;
			for (var j = 0, L = i, sum = 0; j < L; sum += panelSizeArray[j++]);
			//console.log(i+"---"+sum);
			if (panelSizeArray[i] === 2 &&(sum % tabPanelCount) === (tabPanelCount - 1)){
				swapOne = i;
			}
			if (swapOne !== 1000 && panelSizeArray[i] === 1){
				swapTwo = i;
			}
			if (swapOne !== 1000 && swapTwo !== 1000) {
				var b = panelArray[swapOne]; panelArray[swapOne] = panelArray[swapTwo]; panelArray[swapTwo] = b; 
				var c = panelSizeArray[swapOne]; panelSizeArray[swapOne] = panelSizeArray[swapTwo]; panelSizeArray[swapTwo] = c; 
				//return;
			}
		}
		if (swapOne != 1000 && swapTwo != 1000) {resort();}
	}
	resort();
	// This rebuilds the set of panels after rearrangement -
	for (var i in panelArray){
		jQuery("#slider-id-wrapper .liquid-slider .panel-container").append(panelArray[i]);
	}
}

// This calculates the actual amount of columns used by the slides -
function getColumnCount(){
	columnCount = sliderObject.panelCount;
	slideone.each(function() {
		if(jQuery(this).hasClass("large")){columnCount++;}
	});
}
// Store the first panel so we know where we are
var weAreOnSlideNumber = sliderObject.options.firstPanelToLoad - 1; // Make it 0 based

// Call above functions to determine and set the panels in view first load
determineSlidesShown();

// if the browser width changes...
var resizingTimeout;
// A timeout so it runs only after resizing is released
jQuery(window).bind('resize', function () {
  clearTimeout(resizingTimeout);
    resizingTimeout = setTimeout(function () {
      // Send to adjust the height after resizing completes
      determineSlidesShown();
	  determineSlidesShownSecond();
      sliderObject.transition();
	  secondSliderObject.transition();
    }, 500);
});

// The autoslide
var direction = '.first.arrow-right', // 1 => Slide right
    lsAutoslide;
function autoslideFn() {
  lsAutoslide = setTimeout(function() {
    // Direction is set based on slide position
    jQuery(direction).trigger('click');
    autoslideFn();
  }, autoslideDelay);
}
// Call the autoslide if enabled
if (useAutoslide) {
  // You may want to run this on load if you have a lot of images
  //jQuery(window).bind("load", function () {
    autoslideFn();
  //}
}

// Move on arrow clicks
jQuery('.first.arrow-left').on('click', function() {
  clearTimeout(lsAutoslide);
  if (weAreOnSlideNumber === 0) {
    direction = '.first.arrow-right';
    return false;
  }
  if (weAreOnSlideNumber === transitionSize) {
    weAreOnSlideNumber -= transitionSize;
	sliderObject.currentTab = 0;
	updateTab(sliderObject.currentTab + 1);
	sliderObject.transition();
    return false;
  }
  weAreOnSlideNumber -= transitionSize;
  sliderObject.currentTab = sliderObject.currentTab - (transitionSize / numberOfSlidesShown);
  updateTab(sliderObject.currentTab + 1);
  sliderObject.transition();
});

jQuery('.first.arrow-right').on('click', function() {
  clearTimeout(lsAutoslide);
  if (weAreOnSlideNumber >= (columnCount - numberOfSlidesShown )) {
    direction = '.first.arrow-left';
    return false;
  }
  weAreOnSlideNumber += transitionSize;
  sliderObject.currentTab = sliderObject.currentTab + (transitionSize / numberOfSlidesShown);
  updateTab(sliderObject.currentTab + 1);
  sliderObject.transition();
});

/* Adding in the tabs for the first slider */
function addTabs(){
	// build tab html for first slider:
	var pageCount = Math.ceil(columnCount/tabPanelCount);

	var tabString = '<ul id="monitor-slider-nav-ul" class="inline-list twelve columns mobile-four" style="float: left;';
	if (pageCount > 1){tabString += 'display: block;'}
	else {tabString += 'display: none;'};
	tabString += '">';
	if (pageCount > 1){jQuery("#slider-id-wrapper.liquid-responsive .arrows a i").show()}
	else {jQuery("#slider-id-wrapper.liquid-responsive .arrows a i").hide()};
	for (var i =0; i < columnCount; i++) {
		if (i%tabPanelCount === 0){
			currentPage = ((i)/tabPanelCount+1);
			//console.log(currentPage);
			var isactive = '';
			if (currentPage === 1){isactive = ' active';}
			tabString += '<li class="tab' + currentPage + isactive + '" style="width:'+ 100/pageCount +'%"><a title="Page ' + currentPage + '" href="#' + currentPage + '" class="ls-nav" data-goto="' + (i+1) + '">Page ' + currentPage + '</a></li>';
		}
	}
	tabString += '</ul>';
	// each time tab is refreshed replace html string
	jQuery('div.slider-tab-panel.first').html('');
	jQuery('div.slider-tab-panel.first').html(tabString);
	tabListener();
}
addTabs();

function tabListener(){
	jQuery('.slider-tab-panel.first a').click(function() {
	  //event.preventDefault();
	  var goToSlide = jQuery(this).data('goto') - 1;	
	  jQuery('ul#monitor-slider-nav-ul li').removeClass('active');
	  jQuery(this).parent().addClass('active');
	  //console.log(goToSlide);
	  clearTimeout(lsAutoslide);
	  weAreOnSlideNumber = goToSlide;
	  sliderObject.currentTab = (goToSlide / numberOfSlidesShown);
	  sliderObject.transition();
	});
}

function updateTab(activate){
	jQuery('ul#monitor-slider-nav-ul li').removeClass('active');
	jQuery('ul#monitor-slider-nav-ul li:nth-child(' + activate + ')').addClass('active');
}

// Move on Swipe
jQuery(sliderObject.sliderId + ' .panel').swipe({
  fallbackToMouseEvents: false,
  allowPageScroll: "vertical",
  swipe: function(e, input) {
    // Reverse the swipe direction
      var dir = (input === 'left') ? 1 /*right*/ : -1 /*left*/;
      clearTimeout(lsAutoslide);
      weAreOnSlideNumber += dir;
    if ( weAreOnSlideNumber !== (sliderObject.panelCount - numberOfSlidesShown) &&
      (weAreOnSlideNumber !== -1) ) {
      sliderObject.currentTab = sliderObject.currentTab + (dir / numberOfSlidesShown);
      sliderObject.transition();
    } else
      weAreOnSlideNumber -= dir; //reset count
  }
});
/* Finish first slider tab code */





/* The Second Slider!!! */

jQuery('#slider-id-2').liquidSlider({
  dynamicArrows:false,
  continuous:false,
  dynamicTabs:false,
  swipe:true,
  slideEaseFunction:"easeInOutExpo",
  slideEaseDuration:1000
});


var transitionSize = 2;

var baseArraySecond = [];
var baseSizeArraySecond = [];


//caching selectors for better performance
var slidetwo = jQuery("#slider-id-2-wrapper .liquid-slider .panel-container .slider-id-2-panel");

loadBaseArraySecond();

function determineSlidesShownSecond() {
  if (secondSliderObject.slideWidth < smallerSwitch) {
    // Switch to the smallest setting of all!!
    numberOfSlidesShownSecond = maxNumberOfSlidesShown - 3;
	transitionSize = 1;
	tabPanelCountSecond = 1;
	columnCountSecond = secondSliderObject.panelCount;
	addTabsSecond();
  } else if (secondSliderObject.slideWidth < smallSwitch) {
    // Switch to the smallest setting
    numberOfSlidesShownSecond = maxNumberOfSlidesShown - 2;
	transitionSize = 2;
	tabPanelCountSecond = 2;
	relocateLargeSecond();
	getColumnCountSecond();
	addTabsSecond();
  } else if (secondSliderObject.slideWidth < midSwitch) {
    // if that fails, move to the mid width
    numberOfSlidesShownSecond = maxNumberOfSlidesShown - 1;
	transitionSize = 3;
	tabPanelCountSecond = 3;
	relocateLargeSecond();
	getColumnCountSecond();
	addTabsSecond();
  } else {
    //This is for the heighest width
    numberOfSlidesShownSecond = maxNumberOfSlidesShown;
	transitionSize = 4;
	tabPanelCountSecond = 4;
	relocateLargeSecond();
	getColumnCountSecond();
	addTabsSecond();
  }
  setSlidesShownSecond();
};

var weAreOnSlideNumberSecond;
function setSlidesShownSecond() {
  jQuery('#slider-id-2-wrapper .liquid-slider-wrapper').css('max-width', sliderMaxWidth);
  jQuery('#slider-id-2-wrapper .liquid-slider .panel').css('width', 100 / (secondSliderObject.panelCount * numberOfSlidesShownSecond) + '%');
  if (transitionSize > 1){
	jQuery('#slider-id-2-wrapper .liquid-slider .panel.large').css('width', 200 / (secondSliderObject.panelCount * numberOfSlidesShownSecond) + '%');
  } else {
	jQuery('#slider-id-2-wrapper .liquid-slider .panel.large').css('width', 100 / (secondSliderObject.panelCount * numberOfSlidesShownSecond) + '%');
  }
  jQuery('#slider-id-2-wrapper .liquid-slider .panel .panel').css('width', '100%');
  // DP jQuery('#slider-id-2-wrapper .liquid-slider .panel .panel.large').css('width', '100%');
  // Store the first panel so we know where we are (also reset on resize)
  weAreOnSlideNumberSecond = secondSliderObject.options.firstPanelToLoad - 1; // Make it 0 based
  //adjust current slide
  secondSliderObject.currentTab = (weAreOnSlideNumberSecond);
  secondSliderObject.transition();
}

var secondSliderObject = jQuery.data( jQuery('#slider-id-2')[0], 'liquidSlider');



// load up the basic tabs for the 
function loadBaseArraySecond(){
	slidetwo.each(function(i, val) {
		if(jQuery(this).hasClass("large")){
			baseSizeArraySecond[i] = 2;
		}
		else{
			baseSizeArraySecond[i] = 1;
		}
		baseArraySecond[i] = jQuery(this);
	});
}

// This will relocate the large columns if they are bisected by the edge of the page -
function relocateLargeSecond(){
	// load our temp arrays from the base arrays -
	var panelArray = baseArraySecond;
	var panelSizeArray = baseSizeArraySecond;
	//remove the panels -
	slidetwo.each(function() {
		jQuery(this).detach();
	});
	// This sorts the panels so that large ones don't hang half off the page -
	function resort(){
		var swapOne = 1000;
		var swapTwo = 1000;
		for (var i in panelSizeArray){
			var sum = 0;
			for (var j = 0, L = i, sum = 0; j < L; sum += panelSizeArray[j++]);
			//console.log(i+"---"+sum);
			if (panelSizeArray[i] === 2 &&(sum % tabPanelCount) === (tabPanelCount - 1)){
				swapOne = i;
			}
			if (swapOne !== 1000 && panelSizeArray[i] === 1){
				swapTwo = i;
			}
			if (swapOne !== 1000 && swapTwo !== 1000) {
				var b = panelArray[swapOne]; panelArray[swapOne] = panelArray[swapTwo]; panelArray[swapTwo] = b; 
				var c = panelSizeArray[swapOne]; panelSizeArray[swapOne] = panelSizeArray[swapTwo]; panelSizeArray[swapTwo] = c; 
				//return;
			}
		}
		if (swapOne != 1000 && swapTwo != 1000) {resort();}
	}
	resort();
	// This rebuilds the set of panels after rearrangement -
	for (var i in panelArray){
		jQuery("#slider-id-2-wrapper .liquid-slider .panel-container").append(panelArray[i]);
	}
}

// This calculates the actual amount of columns used by the slides -
function getColumnCountSecond(){
	columnCountSecond = secondSliderObject.panelCount;
	slidetwo.each(function() {
		if(jQuery(this).hasClass("large")){columnCountSecond++;}
	});
}

// Store the first panel so we know where we are
var weAreOnSlideNumberSecond = secondSliderObject.options.firstPanelToLoad - 1; // Make it 0 based

// Call above functions to determine and set the panels in view first load
determineSlidesShownSecond();

// The autoslide
var secondDirection = '.second.arrow-right', // 1 => Slide right
    secondlsAutoslide;
function secondautoslideFn() {
  secondlsAutoslide = setTimeout(function() {
    // Direction is set based on slide position
    jQuery(secondDirection).trigger('click');
    secondautoslideFn();
  }, autoslideDelay);
}
// Call the autoslide if enabled
if (useAutoslide) {
  // You may want to run this on load if you have a lot of images
  //jQuery(window).bind("load", function () {
    secondautoslideFn();
  //}
}

// Move on arrow clicks
jQuery('.second.arrow-left').on('click', function() {
  clearTimeout(secondlsAutoslide);
  if (weAreOnSlideNumberSecond === 0) {
    secondDirection = '.second.arrow-right';
    return false;
  }
  if (weAreOnSlideNumberSecond === transitionSize) {
    weAreOnSlideNumberSecond -= transitionSize;
	secondSliderObject.currentTab = 0;
	updateTabSecond(secondSliderObject.currentTab + 1);
	secondSliderObject.transition();
    return false;
  }
  weAreOnSlideNumberSecond -= transitionSize;
  secondSliderObject.currentTab = secondSliderObject.currentTab - (transitionSize / numberOfSlidesShownSecond);
  updateTabSecond(secondSliderObject.currentTab + 1);
  secondSliderObject.transition();
});
jQuery('.second.arrow-right').on('click', function() {
  clearTimeout(secondlsAutoslide);
  if (weAreOnSlideNumberSecond >= (columnCountSecond - numberOfSlidesShownSecond )) {
    secondDirection = '.second.arrow-left';
    return false;
  }
  weAreOnSlideNumberSecond += transitionSize;
  secondSliderObject.currentTab = secondSliderObject.currentTab + (transitionSize / numberOfSlidesShownSecond);
  updateTabSecond(secondSliderObject.currentTab + 1);
  secondSliderObject.transition();
});

/* Adding in the tabs for the second slider */
function addTabsSecond(){
	// build tab html for second slider:
	var pageCount = Math.ceil(columnCountSecond/tabPanelCountSecond);
	var tabString = '<ul id="monitor-slider-nav-ul-second" class="inline-list twelve columns mobile-four" style="float: left;';
	// This hides tabs if there is only one page:
	if (pageCount > 1){tabString += 'display: block;'}
	else {tabString += 'display: none;'};
	tabString += '">';
	// This hides the arrows if there is only one page:
	if (pageCount > 1){jQuery("#slider-id-2-wrapper.liquid-responsive .arrows a i").show()}
	else {jQuery("#slider-id-2-wrapper.liquid-responsive .arrows a i").hide()};
	for (var i =0; i < columnCountSecond; i++){
		if (i%tabPanelCountSecond === 0){
			currentPage = ((i)/tabPanelCountSecond+1);
			var isactive = '';
			if (currentPage === 1){isactive = ' active';}
			tabString += '<li class="tab' + currentPage + isactive +'" style="width:'+ 100/pageCount +'%"><a title="Page '+ currentPage +'" href="#'+ currentPage +'" class="ls-nav" data-goto="'+ (i+1) +'">Page '+ currentPage +'</a></li>';
		}
	}
	tabString += '</ul>'
	// each time tab is refreshed replace html string:
	jQuery('div.slider-tab-panel.second').html('');
	jQuery('div.slider-tab-panel.second').html(tabString);
	tabListenerSecond();
}
addTabsSecond();

function tabListenerSecond(){
	jQuery('.slider-tab-panel.second a').click(function() {
	  //event.preventDefault();
	  var goToSlide = jQuery(this).data('goto') - 1;
	  jQuery('ul#monitor-slider-nav-ul-second li').removeClass('active');
	  jQuery(this).parent().addClass('active');
	  //console.log(goToSlide);
	  clearTimeout(secondlsAutoslide);
	  weAreOnSlideNumberSecond = goToSlide;
	  secondSliderObject.currentTab = Math.ceil((goToSlide / numberOfSlidesShownSecond));
	  secondSliderObject.transition();
	});
}
function updateTabSecond(activate){
	jQuery('ul#monitor-slider-nav-ul-second li').removeClass('active');
	jQuery('ul#monitor-slider-nav-ul-second li:nth-child(' + activate + ')').addClass('active');
}
/* Finish second slider tab code */