var radius = window.localStorage.getItem("radius");
var town = window.localStorage.getItem("town");
var townlat=Number(window.localStorage.getItem("townlat"));
var townlng=Number(window.localStorage.getItem("townlng"));
     if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(
  function successFunction(position){
   var mylat = townlat;
   var mylng = townlng;

   var marker= mymap.addMarker({
     lat: mylat,
     lng: mylng,
     title: "Your Current Place",
     //draggable:true,
     animation: google.maps.Animation.DROP,
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