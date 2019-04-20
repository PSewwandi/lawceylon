var radius = window.localStorage.getItem("radius");
var txt;
   if (confirm("Law Ceylon Wants to find your Location!")) {
       txt = "OK";
   } else {
       txt = "Cancel";
   }
     if (navigator.geolocation && txt=="OK") {
       navigator.geolocation.getCurrentPosition(
    function successFunction(position){
   var mylat = position.coords.latitude;
   var mylng = position.coords.longitude;

   var marker= mymap.addMarker({
     lat: mylat,
     lng: mylng,
     title: "Your Current Place",
     icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
     click: function(e) {
       alert('This is '+value.name+', law firm.');
     }
   });
   var c = mymap.drawCircle({
   lat: mylat,
   lng: mylng,
   radius: Number(radius),
   fillColor: 'blue',
   fillOpacity: 0.5,
   strokeWeight: 0.5,
   click: function(e){
     alert('You are inside given radius of your Current Location');
   }
 });
        },
    function errorFunction(position)
{
   alert('Error!');
});
}