"use strict";

$(function() {


  if (typeof Chart != "undefined") {

    //
    //  Area chart
    //
    var areaChartData = {
      labels: ["20th Jan", "21th Jan", "22th Jan", "23th Jan", "24th Jan", "25th Jan"],
      datasets: [{
        label: "Personal",
        backgroundColor: chartColors.red,
        data: [5, 24, 17, 10, 21, 38]
      }, {
        label: "Business",
        backgroundColor: chartColors.blue,
        data: [18, 10, 4, 20, 30, 42]
      }]
    };

    if ($('#chart-area').length) {
      new Chart($('#chart-area'), {
        type: 'line',
        data: areaChartData,
        options: chartOptions
      });
    }

    //
    // Bar chart
    //
    var barChartData = {
      labels: ["20th Jan", "21th Jan", "22th Jan", "23th Jan", "24th Jan", "25th Jan"],
      datasets: [{
        label: "Personal",
        backgroundColor: chartColors.red,
        data: [5, 24, 17, 10, 21, 38]
      }, {
        label: "Business",
        backgroundColor: chartColors.blue,
        data: [18, 10, 4, 20, 30, 42]
      }]
    };

    if ($('#chart-bar').length) {
      new Chart($('#chart-bar'), {
        type: 'bar',
        data: barChartData,
        options: chartOptions
      });
    }


  }


});


//
// Draw map
//
function initMap() {
  var mapDiv = document.getElementById('contact-map');
  var map = new google.maps.Map(mapDiv, {
    center: {lat: 44.540, lng: -78.556},
    zoom: 15
  });

  var marker = new google.maps.Marker({
    position: {lat: 44.540, lng: -78.546},
    map: map,
    animation: google.maps.Animation.DROP,
    icon: 'assets/img/map-marker.png'
  });

  var infowindow = new google.maps.InfoWindow({
    content: "<strong>Our office</strong><br>3652 Seventh Avenue, Los Angeles, CA"
  });

  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  map.set('styles', [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]);
}