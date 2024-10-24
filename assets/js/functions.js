$(document).ready(function() {





// focus-visible polyfill (ran once)

function selectorSupported(selector){
  
  var support, link, sheet, doc = document,
      root = doc.documentElement,
      head = root.getElementsByTagName('head')[0],

      impl = doc.implementation || {
              hasFeature: function() {
                  return false;
              }
      },

  link = doc.createElement("style");
  link.type = 'text/css';

  (head || root).insertBefore(link, (head || root).firstChild);

  sheet = link.sheet || link.styleSheet;

  if (!(sheet && selector)) return false;

  support = impl.hasFeature('CSS2', '') ?
  
              function(selector) {
                  try {
                      sheet.insertRule(selector + '{ }', 0);
                      sheet.deleteRule(sheet.cssRules.length - 1);
                  } catch (e) {
                      return false;
                  }
                  return true;
                  
              } : function(selector) {
                
                  sheet.cssText = selector + ' { }';
                  return sheet.cssText.length !== 0 && !(/unknown/i).test(sheet.cssText) && sheet.cssText.indexOf(selector) === 0;
              };
   
  return support(selector);

};

if ((selectorSupported(":focus-visible")) != true){
  $('body').addClass('polyfill-focus-visible');
}

// modal trap focus function

var focusableEls = '';
var firstFocusableEl = '';
var lastFocusableEl = '';
var KEYCODE_TAB = 9;

function trapFocus(element) {

  focusableEls = $(element).find('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled]), iframe, video');
  firstFocusableEl = focusableEls[0];  
  lastFocusableEl = focusableEls[focusableEls.length - 1];

  // focus (second) elem on open
  if (focusableEls[1]){
    focusableEls[1].focus();
  } else {
    focusableEls[0].focus();
  }

  $(element).on('keydown', function(e) {

    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);
    
    if (!isTabPressed) { 

      return; 

    } 

    if ( e.shiftKey ) { // shift + tab
      if (document.activeElement === firstFocusableEl) {
        lastFocusableEl.focus();
        e.preventDefault();
      }
    } else { // tab
      if (document.activeElement === lastFocusableEl) {
        firstFocusableEl.focus();
        e.preventDefault();
      }
    } 
    
  });

}





// verify if safari (ran once)

var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));

if (isSafari){
  $('body').addClass('is-safari');
}

// verify if mobile user agent

var mobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
var $isMobileScreenSize = false;
var $triggeronce = false;

// check screen size and gives var true if is mobile size before load
if ( $(window).width() <= 779 ){  $isMobileScreenSize = true; $triggeronce = true;}
// check screen size and gives var true if is mobile size on resize
$(window).on('load resize', function(e){
  if ( $(window).width() <= 779 ){
    $('body').addClass('is-mobile-viewport');
    $isMobileScreenSize = true;
    return;
  }
  if ( $(window).width() >= 780 ){
    $('body').removeClass('is-mobile-viewport');
    $isMobileScreenSize = false;
    $triggeronce = false;
    return;
  }
});

// disable transition on window resize

let resizeTimer;
window.addEventListener("resize", () => {
  document.body.classList.add("resize-animation-disabled");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    document.body.classList.remove("resize-animation-disabled");
  }, 400);
});





// body scroll lock modal

// import functions
const disableBodyScroll = bodyScrollLock.disableBodyScroll;
const enableBodyScroll = bodyScrollLock.enableBodyScroll;

// set default
var targetScrollElement = '';
var $dataTarget = '';





// lazyload

function lazyload() {

	window.lazySizesConfig = window.lazySizesConfig || {};
	lazySizesConfig.loadMode = 1;
	lazySizesConfig.expand = 800;

	// Determine the images to be lazy loaded

	return;

}

lazyload();





// set vh on mobile

// First we get the viewport height and we multiple it by 1% to get a value for a vh unit

function setVh(){

  let vh = window.innerHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document
  document.documentElement.style.setProperty('--vh', `${vh}px`);

  // We listen to the resize event
  window.addEventListener('resize', () => {
    // We execute the same script as before
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  });

}

setVh();





// RETRIEVE SESSION STORE VARIABLES

// get session store of lat/lng values
var latitude = sessionStorage.getItem("latitude");
var longitude = sessionStorage.getItem("longitude");

// get session store of menu header meta suncalc strings
var sunriseStr = sessionStorage.getItem("sunriseStr");
var sunsetStr = sessionStorage.getItem("sunsetStr");
var daylightStr = sessionStorage.getItem("daylightStr");
var latitudeStr = sessionStorage.getItem("latitudeStr");
var longitudeStr = sessionStorage.getItem("longitudeStr");
var currentTimeStr = sessionStorage.getItem("currentTimeStr");

// get session store of website appearance suncalc values
var dataDaySegment = sessionStorage.getItem("data-day-segment");
var dataTypeface = sessionStorage.getItem("data-typeface");
var dataBackgroundProgress = sessionStorage.getItem("data-background-progress");
var dataTextProgress = sessionStorage.getItem("data-text-progress");
var dataOrbitXProgress = sessionStorage.getItem("data-orbit-x-progress");
var dataOrbitYProgress = sessionStorage.getItem("data-orbit-y-progress");
var dataFaviconType = sessionStorage.getItem("data-favicon-type");

// define document root
const root = document.querySelector(':root');

// DEFINE SETTER FUNCTIONS

function setFavicon(initialState, endState){

  $('[data-favicon="link"]').each(function(){
    if($(this).attr("href")){
      var initialLink = $(this).attr("href");
      var updatedLink = initialLink.replace(initialState, endState);
      $(this).attr("href", updatedLink);
    }
    if($(this).attr("content")){
      var initialLink = $(this).attr("content");
      var updatedLink = initialLink.replace(initialState, endState);
      $(this).attr("content", updatedLink);
    }
  });

  // push status of progress as session storage
  $('body').attr('data-favicon-type', 'is-favicon-'+endState);
  sessionStorage.setItem("data-favicon-type", 'is-favicon-'+endState);

}

function setTypeface(daySegment, typeface){

  // day segment
  $('body').attr('data-day-segment', daySegment);
  sessionStorage.setItem('data-day-segment', daySegment);
  // typeface style
  root.style.setProperty('--typeface-theme', typeface);
  $('body').attr('data-typeface', typeface);
  sessionStorage.setItem('data-typeface', typeface);

}

function setHeaderStrings(sunriseStr, sunsetStr, daylightStr, latitudeStr, longitudeStr, currentTimeStr){

  // push values to html
  $('.has-sunrise-data').html(sunriseStr);
  $('.has-sunset-data').html(sunsetStr);
  $('.has-daylight-data').html(daylightStr);
  $('.has-latitude-data').html(latitudeStr);
  $('.has-longitude-data').html(longitudeStr);
  $('.has-current-time-data').html(currentTimeStr);

}

// SET SUNCALC META VALUES based on lat/lng

function setSunCalc(thisLat, thisLng){

  // if session store not set, set values and store in session
  if( (sunriseStr == null) || (sunsetStr == null) || (daylightStr == null) || (latitudeStr == null) || (longitudeStr == null) ){

    // function to convert milisecond time duration in string

    function msToTime(duration) {

      var milliseconds = Math.floor((duration % 1000) / 100);
      var seconds = Math.floor((duration / 1000) % 60);
      var minutes = Math.floor((duration / (1000 * 60)) % 60);
      var hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

      hours = (hours < 10) ? "0" + hours : hours;
      minutes = (minutes < 10) ? "0" + minutes : minutes;
      seconds = (seconds < 10) ? "0" + seconds : seconds;

      return hours + "h" + minutes;

    }

    // functions to convert decimal lat/lng to DMS (degrees, minutes, seconds)

    function toDegreesMinutesAndSeconds(coordinate) {
        var absolute = Math.abs(coordinate);
        var degrees = Math.floor(absolute);
        var minutesNotTruncated = (absolute - degrees) * 60;
        var minutes = Math.floor(minutesNotTruncated);
        var seconds = Math.round(((minutesNotTruncated - minutes) * 60) * 100.0) / 100.0;

        return degrees + "° " + minutes + "′ " + seconds + "″";
    }

    function convertDMSlat(lat) {
      if(lat != null){
        var latitude = toDegreesMinutesAndSeconds(lat);
        var latitudeCardinal = lat >= 0 ? "N" : "S";
        return latitude + " " + latitudeCardinal;
      } else{
        return null;
      }
    }

    function convertDMSlng(lng) {
      if(lng != null){
        var longitude = toDegreesMinutesAndSeconds(lng);
        var longitudeCardinal = lng >= 0 ? "E" : "W";
        return longitude + " " + longitudeCardinal;
      } else{
        return null;
      }
    }

    // set suncalc meta values

    var times = SunCalc.getTimes(new Date(), thisLat, thisLng);
    var today = new Date();

    // displayed suncalc meta values for website header
    var sunriseStr = String(times.sunrise.getHours()).padStart(2, "0") + ':' + String(times.sunrise.getMinutes()).padStart(2, "0");
    var sunsetStr = String(times.sunset.getHours()).padStart(2, "0") + ':' + String(times.sunset.getMinutes()).padStart(2, "0");
    // daylight string
    var daylight = times.sunset.getTime() - times.sunrise.getTime();
    var daylightStr = msToTime(daylight);
    // adds trailing zero if time is less than 10h00
    if (daylightStr.length < 5){ var daylightStr = '0' + daylightStr }
    // lat/lng strings
    var latitudeStr = convertDMSlat(thisLat);
    var longitudeStr = convertDMSlng(thisLng);

    // set session store string variables
    sessionStorage.setItem("sunriseStr", sunriseStr);
    sessionStorage.setItem("sunsetStr", sunsetStr);
    sessionStorage.setItem("daylightStr", daylightStr);
    sessionStorage.setItem("latitudeStr", latitudeStr);
    sessionStorage.setItem("longitudeStr", longitudeStr);

    setHeaderStrings(sunriseStr, sunsetStr, daylightStr, latitudeStr, longitudeStr);

  }

}

// TIME CLOCK

function sunCalcClock(thisLat, thisLng) {

  let date = new Date();
  let times = SunCalc.getTimes(date, thisLat, thisLng);
  let prevDayDate = new Date().setDate(date.getDate() - 1);
  let prevDayTimes = SunCalc.getTimes(prevDayDate, thisLat, thisLng);
  let sun = SunCalc.getPosition(date, thisLat, thisLng);
  let moon = SunCalc.getMoonPosition(date, thisLat, thisLng);
  let hh = date.getHours();
  let mm = date.getMinutes();

  hh = (hh < 10) ? "0" + hh : hh;
  mm = (mm < 10) ? "0" + mm : mm;
    
  let time = hh + ":" + mm;

  $('.has-current-time-data').html(time);
  sessionStorage.setItem('currentTimeStr', time);


  // DAY SEGMENT AND TYPEFACE THEME

  if(date.getTime() > (times.sunset.getTime() + (3600000 * 4) ) ){
    setTypeface("is-midnight", "Redaction-100");
  } else if(date.getTime() > (times.sunset.getTime() + (3600000 * 2) ) ){
    setTypeface("is-early-night", "Redaction-70");
  } else if(date.getTime() > (times.sunset.getTime() + (3600000 * 1) ) ){
    setTypeface("is-dusk", "Redaction-50");
  } else if(date.getTime() > (times.sunset.getTime() + (3600000 * 0) ) ){
    setTypeface("is-sunset", "Redaction-35");
  } else if(date.getTime() > (times.sunset.getTime() - (3600000 * 1) ) ){
    setTypeface("is-afternoon", "Redaction-20");
  } else if(date.getTime() > (times.sunrise.getTime() + (3600000 * 1) ) ){
    setTypeface("is-noon", "Redaction-0");
  } else if(date.getTime() > (times.sunrise.getTime() + (3600000 * 0) ) ){
    setTypeface("is-morning", "Redaction-20");
  } else if(date.getTime() > (times.sunrise.getTime() - (3600000 * 1) ) ){
    setTypeface("is-sunrise", "Redaction-35");
  } else if(date.getTime() > (times.sunrise.getTime() - (3600000 * 2) ) ){
    setTypeface("is-dawn", "Redaction-50");
  } else if(date.getTime() > (times.sunrise.getTime() - (3600000 * 4) ) ){
    setTypeface("is-late-night", "Redaction-70");
  } else{
    setTypeface("is-midnight", "Redaction-100");
  }


  // BACKGROUND AND TEXT COLOR THEME

  const hour = 3600000;
  const minProgress = 15;
  const maxProgress = 95;

  function setValueColorTheme(backgroundValue, textValue){
    root.style.setProperty('--color-background', 'hsla(40,2.5%,'+backgroundValue+'%,1)');
    root.style.setProperty('--color-text', 'hsla(40,2.5%,'+textValue+'%,1)');
    $('[data-favicon="theme"]').attr('content', 'hsla(40,2.5%,'+backgroundValue+'%,1)');
  }

  function pushStatusColorTheme(backgroundProgress, textProgress){
    // push status of progress as data attributes
    $('body').attr('data-background-progress', backgroundProgress);
    $('body').attr('data-text-progress', textProgress);
    // push session storage of progress
    sessionStorage.setItem("data-background-progress", backgroundProgress);
    sessionStorage.setItem("data-text-progress", textProgress);
  }

  // night
  if((date.getTime() < (times.sunrise.getTime() - (hour * 2)) ) || (date.getTime() > (times.sunset.getTime() + (hour * 2)) ) ){

    if(sessionStorage.getItem("data-background-progress") != maxProgress || sessionStorage.getItem("data-text-progress") != minProgress){
      // set values and push status
      setValueColorTheme(maxProgress, minProgress);
      pushStatusColorTheme(maxProgress, minProgress);
    }

  }

  // -2h before sunrise to +2h after sunrise
  if((date.getTime() > (times.sunrise.getTime() - (hour * 2)) ) && (date.getTime() < (times.sunrise.getTime() + (hour * 2)) ) ){

    var sunriseElapsedCoord = date.getTime();
    var sunriseStart = times.sunrise.getTime() - (hour * 2);
    var sunriseEnd = times.sunrise.getTime() + (hour * 2);

    var sunriseElapsedDuration = sunriseElapsedCoord - sunriseStart;
    var sunriseTotalDuration = sunriseEnd - sunriseStart;

    var sunriseProgress = Math.round( ( (sunriseElapsedDuration / sunriseTotalDuration) * 100) );
    var sunriseInvertProgress = (100 - sunriseProgress);

    // clamp minimum and maximum values (prevents 100% white or 100% black)
    if(sunriseProgress <= minProgress){         sunriseProgress = minProgress;        }
    if(sunriseProgress >= maxProgress){         sunriseProgress = maxProgress;        }
    if(sunriseInvertProgress <= minProgress){   sunriseInvertProgress = minProgress;  }
    if(sunriseInvertProgress >= maxProgress){   sunriseInvertProgress = maxProgress;  }
    
    if(sessionStorage.getItem("data-background-progress") != sunriseInvertProgress || sessionStorage.getItem("data-text-progress") != sunriseProgress){
      // set values and push status
      setValueColorTheme(sunriseInvertProgress, sunriseProgress);
      pushStatusColorTheme(sunriseInvertProgress, sunriseProgress);
    }

  }

  // daylight
  if((date.getTime() > (times.sunrise.getTime() + (hour * 2)) ) && (date.getTime() < (times.sunset.getTime() - (hour * 2)) ) ){

    if(sessionStorage.getItem("data-background-progress") != minProgress || sessionStorage.getItem("data-text-progress") != maxProgress){
      // set values and push status
      setValueColorTheme(minProgress, maxProgress);
      pushStatusColorTheme(minProgress, maxProgress);
    }

  }

  // -2h before sunset to +2h after sunset
  if((date.getTime() > (times.sunset.getTime() - (hour * 2)) ) && (date.getTime() < (times.sunset.getTime() + (hour * 2)) ) ){

    var sunsetElapsedCoord = date.getTime();
    var sunsetStart = times.sunset.getTime() - (hour * 2);
    var sunsetEnd = times.sunset.getTime() + (hour * 2);

    var sunsetElapsedDuration = sunsetElapsedCoord - sunsetStart;
    var sunsetTotalDuration = sunsetEnd - sunsetStart;

    var sunsetProgress = Math.round( ( (sunsetElapsedDuration / sunsetTotalDuration) * 100) );
    var sunsetInvertProgress = (100 - sunsetProgress);

    // clamp minimum and maximum values (prevents 100% white or 100% black)
    if(sunsetProgress <= minProgress){          sunsetProgress = minProgress;        }
    if(sunsetProgress >= maxProgress){          sunsetProgress = maxProgress;        }
    if(sunsetInvertProgress <= minProgress){    sunsetInvertProgress = minProgress;  }
    if(sunsetInvertProgress >= maxProgress){    sunsetInvertProgress = maxProgress;  }

    if(sessionStorage.getItem("data-background-progress") != sunsetProgress || sessionStorage.getItem("data-text-progress") != sunsetInvertProgress){
      // set values and push status
      setValueColorTheme(sunsetProgress, sunsetInvertProgress);
      pushStatusColorTheme(sunsetProgress, sunsetInvertProgress);
    }

  }


  // ORBIT BODY

  // values

  let dayStart = times.sunrise.getTime();
  let dayEnd = times.sunset.getTime();
  let dayTotalDuration = dayEnd - dayStart;

  let dayElapsedCoord = date.getTime();
  let dayElapsedDuration = dayElapsedCoord - dayStart;
  let dayProgress = Math.round( ( (dayElapsedDuration / dayTotalDuration) * 100) );

  let nightStart = times.sunset.getTime();
  let nightEnd = times.sunrise.getTime();
  let prevNightStart = prevDayTimes.sunset.getTime();
  let nightTotalDuration = ((3600000 * 24) - dayTotalDuration);

  let nightElapsedCoord = date.getTime();
  let nightElapsedDurationBeforeMidnight = nightElapsedCoord - nightStart;
  let nightElapsedDurationAfterMidnight = nightElapsedCoord - prevNightStart;
  let nightProgressBeforeMidnight = Math.round( ( (nightElapsedDurationBeforeMidnight / nightTotalDuration) * 100) );
  let nightProgressAfterMidnight = Math.round( ( (nightElapsedDurationAfterMidnight / nightTotalDuration) * 100) );

  let altitudePositive = Math.abs(sun.altitude);
  let altitudeDegrees = altitudePositive * 57.2958;
  let altitudeProgress = Math.round(altitudeDegrees / 90 * 100);

  function pushStatusOrbit(OrbitXProgress, OrbitYProgress){
    // push status of progress as data attributes
    $('body').attr('data-orbit-x-progress', OrbitXProgress);
    $('body').attr('data-orbit-y-progress', OrbitYProgress);
    // push session storage of progress
    sessionStorage.setItem("data-orbit-x-progress", OrbitXProgress);
    sessionStorage.setItem("data-orbit-y-progress", OrbitYProgress);
  }

  // push position, daytime
  if((date.getTime() > times.sunrise.getTime()) && (date.getTime() < times.sunset.getTime()) ){
    if(sessionStorage.getItem("data-orbit-x-progress") != dayProgress || sessionStorage.getItem("data-orbit-y-progress") != altitudeProgress){
      root.style.setProperty('--orbit-position', 'translate(calc('+dayProgress+'vw - 50%), calc(-'+altitudeProgress+'vh + 50%))');
      // push status
      pushStatusOrbit(dayProgress, altitudeProgress);
    }
  }

  // push position, nightime, before midnight
  if(date.getTime() > times.sunset.getTime()){
    if(sessionStorage.getItem("data-orbit-x-progress") != nightProgressBeforeMidnight || sessionStorage.getItem("data-orbit-y-progress") != altitudeProgress){
      root.style.setProperty('--orbit-position', 'translate(calc('+nightProgressBeforeMidnight+'vw - 50%), calc(-'+altitudeProgress+'vh + 50%))');
      // push status
      pushStatusOrbit(nightProgressBeforeMidnight, altitudeProgress);
    }
  }

  // push position, nighttime, after midnight
  if(date.getTime() < times.sunrise.getTime()){
    if(sessionStorage.getItem("data-orbit-x-progress") != nightProgressAfterMidnight || sessionStorage.getItem("data-orbit-y-progress") != altitudeProgress){
      root.style.setProperty('--orbit-position', 'translate(calc('+nightProgressAfterMidnight+'vw - 50%), calc(-'+altitudeProgress+'vh + 50%))');
      // push status
      pushStatusOrbit(nightProgressAfterMidnight, altitudeProgress);
    }
  }


  // FAVICON

  // daytime
  if((date.getTime() > times.sunrise.getTime()) && (date.getTime() < times.sunset.getTime()) ){  
    if(sessionStorage.getItem("data-favicon-type") != 'is-favicon-day'){
      setFavicon("night", "day")
    }
  }

  // nighttime
  if( (date.getTime() > times.sunset.getTime()) || (date.getTime() < times.sunrise.getTime()) ){
    if(sessionStorage.getItem("data-favicon-type") != 'is-favicon-night'){
      setFavicon("day", "night")
    }
  }



  // Ticking of the clock
  let t = setTimeout(function(){ sunCalcClock(thisLat, thisLng) }, 1000); 

}





// ON PAGE LOAD, check if stored session values, and apply to page

if( (dataDaySegment != null) && (dataTypeface != null) ){
  setTypeface(dataDaySegment, dataTypeface);
}

if( (dataBackgroundProgress != null) && (dataTextProgress != null) ){
  root.style.setProperty('--color-background', 'hsla(40,2.5%,'+dataBackgroundProgress+'%,1)');
  root.style.setProperty('--color-text', 'hsla(40,2.5%,'+dataTextProgress+'%,1)');
  $('[data-favicon="theme"]').attr('content', 'hsla(40,2.5%,'+dataBackgroundProgress+'%,1)');
}

if( (dataOrbitXProgress != null) && (dataOrbitYProgress != null) ){
  root.style.setProperty('--orbit-position', 'translate(calc('+dataOrbitXProgress+'vw - 50%), calc(-'+dataOrbitYProgress+'vh + 50%))');
}

if(dataFaviconType == 'is-favicon-day'){    setFavicon("night", "day")  }
if(dataFaviconType == 'is-favicon-night'){  setFavicon("day", "night")  }

if( (sunriseStr != null) && (sunsetStr != null) && (daylightStr != null) && (latitudeStr != null) && (longitudeStr != null) && (currentTimeStr != null) ){
  setHeaderStrings(sunriseStr, sunsetStr, daylightStr, latitudeStr, longitudeStr, currentTimeStr);
}



// ON PAGE LOAD, get LAT / LNG based on IP if not accessed already, and store in session, and launch clock

if( (latitude == null) || (longitude == null) ){

  $.ajax({
    url: "https://geolocation-db.com/jsonp/fd18cb60-5f5a-11ee-87d3-bd3f0d7c4f89/",
    jsonpCallback: "callback",
    dataType: "jsonp",
    success: function( location ) {
      // set session storage
      sessionStorage.setItem("latitude", location.latitude);
      sessionStorage.setItem("longitude", location.longitude);
      // trigger functions
      setSunCalc(location.latitude, location.longitude);
      sunCalcClock(location.latitude, location.longitude);
    }
  });  

} else{
  // trigger functions based on lat/lng from session storage
  setSunCalc(latitude, longitude);
  sunCalcClock(latitude, longitude);
}





// COOKIE VALIDATION

// if no cookies yet
if ( !(Cookies.get('accept')) ) {
  $('body').addClass('no-cookies');
  $cookie = false;
}

if ( (Cookies.get('accept')) ) {
  $cookie = true;
}

// function to show content of iframe

var $fetchForIframes = $('body');

function cookiesAcceptedShowIframes(){

  var $thisiframe = $($fetchForIframes).find('iframe');
  if ( ($cookie == true) ){
    $($thisiframe).each(function() {  $(this).attr("src", $(this).data('url') );  });
  }
  
  return;

}

// button to accept cookies
$('button.cookies-accept').on('click', function(){

  Cookies.set('accept', { expires: 60 });
  $cookie = true;
  $('body').removeClass('no-cookies');

  cookiesAcceptedShowIframes();

  return;

});

cookiesAcceptedShowIframes();



});


