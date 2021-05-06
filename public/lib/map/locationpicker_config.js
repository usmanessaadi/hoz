$(document).ready(function(){

    function updateControls(addressComponents) {
        $('#pos_street').val(addressComponents.addressLine1);
        $('#pos_city').val(addressComponents.city);
        $('#pos_state').val(addressComponents.stateOrProvince);
        $('#pos_zip').val(addressComponents.postalCode);
        $('#pos_country').val(addressComponents.country);
        // console.log(addressComponents);
    }
    $('#map').locationpicker({
        location: {
            // latitude: 19.795666003178052,
            // longitude: 23.49331749999999,
            latitude: location_lat,
            longitude: location_lang,

        },
        radius: 300,
        zoom : LocZoom,

        inputBinding: {
            latitudeInput: $('#pos_latitude'),
            longitudeInput: $('#pos_longitude'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#pos_loc_addresspicker')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {

            var mapContext = $(this).locationpicker('map');

            // mapContext.map.setZoom(7);

            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            updateControls(addressComponents);
        }
        ,
        oninitialized: function(component) {
            var addressComponents = $(component).locationpicker('map').location.addressComponents;
            updateControls(addressComponents);

            $('#pos_loc_addresspicker').val('')

        }

    });

});//End Document