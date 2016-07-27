<?php 
$latitude= esc_attr($instance['latitude']);
$longitude= esc_attr($instance['longitude']);
$marker_url=wp_get_attachment_image_src( $instance['marker'], 'full');
$description=wp_kses_post($instance['description']);
$shortcode=$instance['contact_form'];
?>
<section class="form-map">
<?php  echo do_shortcode($shortcode);?>
<div id="contact-map" style="height: 500px"></div>
</section>
<style>
    .form-map form{
  position: absolute;
    top: 50%;
    left: 10%;
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 50%;
    max-width: 600px;
    z-index: 1;
}
</style>
<script type="text/javascript">
function initMap() {
  var mapDiv = document.getElementById('contact-map');
  var map = new google.maps.Map(mapDiv, {
    center: {lat: <?php echo $latitude;?>, lng: <?php echo $longitude;?>},
    zoom: 15
  });
  var marker = new google.maps.Marker({
    position: {lat: <?php echo $latitude;?>, lng: <?php echo $longitude;?>},
    map: map,
    animation: google.maps.Animation.DROP,
    icon: "<?php echo $marker_url[0];?>"
  });
  var infowindow = new google.maps.InfoWindow({
    content: "<?php echo $description;?>"
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
  map.set('styles', [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyAs8qhN5cL8Dn_FmqkLY9s9ixKNS9QEQTk" async defer></script>