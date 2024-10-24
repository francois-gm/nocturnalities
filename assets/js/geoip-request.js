


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
const body = document.body;

// DEFINE SETTER FUNCTIONS

function setHeaderStrings(sunriseStr, sunsetStr, daylightStr, latitudeStr, longitudeStr, currentTimeStr){

  // push values to html
  document.getElementsByClassName("has-sunrise-data")[0].innerHTML = sunriseStr;
  document.getElementsByClassName("has-sunset-data")[0].innerHTML = sunsetStr;
  document.getElementsByClassName("has-daylight-data")[0].innerHTML = daylightStr;
  document.getElementsByClassName("has-latitude-data")[0].innerHTML = latitudeStr;
  document.getElementsByClassName("has-longitude-data")[0].innerHTML = longitudeStr;
  document.getElementsByClassName("has-current-time-data")[0].innerHTML = currentTimeStr;

}

// ON PAGE LOAD, check if stored session values, and apply to page

if( (dataDaySegment != null) && (dataTypeface != null) ){
  root.style.setProperty('--typeface-theme', dataTypeface);
}

if( (dataBackgroundProgress != null) && (dataTextProgress != null) ){
  root.style.setProperty('--color-background', 'hsla(40,2.5%,'+dataBackgroundProgress+'%,1)');
  root.style.setProperty('--color-text', 'hsla(40,2.5%,'+dataTextProgress+'%,1)');
  document.querySelector('[data-favicon="theme"]').setAttribute('content', 'hsla(40,2.5%,'+dataBackgroundProgress+'%,1)');
}

if( (dataOrbitXProgress != null) && (dataOrbitYProgress != null) ){
  root.style.setProperty('--orbit-position', 'translate(calc('+dataOrbitXProgress+'vw - 50%), calc(-'+dataOrbitYProgress+'vh + 50%))');
}

if( (sunriseStr != null) && (sunsetStr != null) && (daylightStr != null) && (latitudeStr != null) && (longitudeStr != null) ){
  setHeaderStrings(sunriseStr, sunsetStr, daylightStr, latitudeStr, longitudeStr, currentTimeStr);
}

// ON PAGE LOAD, get LAT / LNG based on IP if not accessed already, and store in session, and launch clock

if( (latitude == null) || (longitude == null) ){
  
  body.classList.add("transition-color-theme-initial");
  body.classList.add("transition-text-theme-initial");

  setTimeout(() => {
    body.classList.add("transition-fx-theme-initial");
  }, 1);

  setTimeout(() => {
    body.classList.remove("transition-text-theme-initial");
    setTimeout(() => {
      body.classList.remove("transition-fx-theme-initial");
    }, 501);
  }, 500);

  let script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://geolocation-db.com/jsonp/fd18cb60-5f5a-11ee-87d3-bd3f0d7c4f89/';
  let h = document.getElementsByTagName('script')[0];
  h.parentNode.insertBefore(script, h);

  function callback(location){
    sessionStorage.setItem("latitude", location.latitude);
    sessionStorage.setItem("longitude", location.longitude);
  }
  
}






