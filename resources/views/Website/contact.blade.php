@extends('Website.layout.master')
@push('css')
<style>
    #google-map,
    body,
    html {
      padding: 0;
      height: 460px;
    }
  </style>
@endpush
@section('content')
   <!-- Start Map Section -->
   <div id="google-map"></div>
   <!-- End Map Section -->
   
   <!-- Start Contact Us Section -->
   <section id="content">
     <div class="container">
       <div class="row">
         <div class="col-md-4">
           <h2 class="medium-title">
             Contact Us
           </h2>
           <div class="information">
             <div class="contact-datails">
               <div class="icon">
                 <i class="ti-location-pin"></i>
               </div>
               <div class="info">
                 <h3>Address</h3>
                 <span class="detail">Main Office: NO.22-23 Street Name- City,Country</span>
                 <span class="datail">Customer Center: NO.130-45 Streen Name- City, Country</span>
               </div>
             </div>                
             <div class="contact-datails">
               <div class="icon">
                 <i class="ti-mobile"></i>
               </div>
               <div class="info">
                 <h3>Phone Numbers</h3>
                 <span class="detail">Main Office: +880 123 456 789</span>
                 <span class="datail">Customer Supprort: +880 123 456 789 </span>
               </div>
             </div>
             <div class="contact-datails">
               <div class="icon">
                 <i class="ti-location-arrow"></i>
               </div>
               <div class="info">
                 <h3>Email Address</h3>
                 <span class="detail">Customer 
                 Support: info@mail.com</span>
                 <span class="detail">Technical Support: support@mail.com</span>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-8">
           <!-- Form -->
           <form id="contactForm" class="contact-form" data-toggle="validator">
             <div class="row">
               <div class="col-md-12">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required data-error="Please enter your name">
                       <div class="help-block with-errors"></div>
                     </div>                    
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">                      
                       <input type="email" class="form-control" id="email" placeholder="mail@sitename.com" required data-error="Please enter your email">
                       <div class="help-block with-errors"></div>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group"> 
                       <textarea class="form-control" placeholder="Massage" rows="11" data-error="Write your message" required></textarea>
                       <div class="help-block with-errors"></div>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <button type="submit" id="submit" class="btn btn-common">Send Us</button>
                     <div id="msgSubmit" class="h3 text-center hidden"></div> 
                     <div class="clearfix"></div>   
                   </div>
                 </div>
               </div>                     
             </div> 
           </form>
         </div>            
       </div>
     </div>
   </section>
   <!-- End Contact Us Section  -->

   <section class="section text-center" >
  
   </div>
 </section>    
@endsection
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHo_WtZ2nIYCgCLf7sINZaqcrpqSDio9o"></script>
<!-- Google Maps JS Only for Contact Pages -->
<script type="text/javascript">
var map;
var defult = new google.maps.LatLng(23.749574, 90.396594,15);
var mapCoordinates = new google.maps.LatLng(23.749574, 90.396594,15); 

var markers = [];
var image = new google.maps.MarkerImage(
  'assets/img/map-marker.png',
  new google.maps.Size(84, 70),
  new google.maps.Point(0, 0),
  new google.maps.Point(60, 60)
);

function addMarker() {
  markers.push(new google.maps.Marker({
    position: defult,
    raiseOnDrag: false,
    icon: image,
    map: map,
    draggable: false
  }
));
  
}

function initialize() {
  var mapOptions = {
    backgroundColor: "#ffffff",
    zoom: 14,
    disableDefaultUI: true,
    center: mapCoordinates,
    zoomControl: false,
    scaleControl: false,
    scrollwheel: false,
    disableDoubleClickZoom: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{
      "featureType": "landscape.natural",
      "elementType": "geometry.fill",
      "stylers": [{
        "color": "#ffffff"
      }
                 ]
    }
             , {
               "featureType": "landscape.man_made",
               "stylers": [{
                 "color": "#ffffff"
               }
                           , {
                             "visibility": "off"
                           }
                          ]
             }
             , {
               "featureType": "water",
               "stylers": [{
                 "color": "#80C8E5"
               }
                           , {
                             "saturation": 0
                           }
                          ]
             }
             , {
               "featureType": "road.arterial",
               "elementType": "geometry",
               "stylers": [{
                 "color": "#999999"
               }
                          ]
             }
             , {
               "elementType": "labels.text.stroke",
               "stylers": [{
                 "visibility": "off"
               }
                          ]
             }
             , {
               "elementType": "labels.text",
               "stylers": [{
                 "color": "#333333"
               }
                          ]
             }
             
             , {
               "featureType": "road.local",
               "stylers": [{
                 "color": "#dedede"
               }
                          ]
             }
             , {
               "featureType": "road.local",
               "elementType": "labels.text",
               "stylers": [{
                 "color": "#666666"
               }
                          ]
             }
             , {
               "featureType": "transit.station.bus",
               "stylers": [{
                 "saturation": -57
               }
                          ]
             }
             , {
               "featureType": "road.highway",
               "elementType": "labels.icon",
               "stylers": [{
                 "visibility": "off"
               }
                          ]
             }
             , {
               "featureType": "poi",
               "stylers": [{
                 "visibility": "off"
               }
                          ]
             }
             
            ]
    
  }
      ;
  map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
  addMarker();
  
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endpush
