$(document).ready(function() {
  $.simpleWeather({
    location: 'Mentor, OH',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = '<h2><span id="temp">'+weather.temp+'&deg;'+weather.units.temp+'</span>';
      html += '<i class="icon-'+weather.code+'"></i></h2>';
      html += '<h2><span id="location">'+weather.city+', '+weather.region+'</span>'+ ' | ';
      html += '<span id="currently">'+weather.currently+'</span></h2>';
  
      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
});