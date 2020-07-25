
    <link rel="stylesheet" href="public/build/css/intlTelInput.css">


    <div class="input-group">

        <input class="form-control"  placeholder="Numero de L'etdiant" id="phone" type="tel" name="tel" class="form-control"  style="color:#000000;" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" />
																	<span class="input-group-addon">
																		<i class="fa fa-phone bigger-110"></i>
																	</span>
    </div>
<!-- Load jQuery from CDN so can run demo immediately -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="public/build/js/intlTelInput.js"></script>
<script>
    $("#phone").intlTelInput({
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: "body",
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // initialCountry: "auto",
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "public/build/js/utils.js"
    });

    // ajout de la classe JS à HTML
    document.querySelector("html").classList.add('js');

    // initialisation des variables
    var fileInput  = document.querySelector( ".input-file" ),
        button     = document.querySelector( ".input-file-trigger" ),
        the_return = document.querySelector(".file-return");

    // action lorsque la "barre d'espace" ou "Entrée" est pressée
    button.addEventListener( "keydown", function( event ) {
        if ( event.keyCode == 13 || event.keyCode == 32 ) {
            fileInput.focus();
        }
    });

    // action lorsque le label est cliqué
    button.addEventListener( "click", function( event ) {
        fileInput.focus();
        return false;
    });

    // affiche un retour visuel dès que input:file change
    fileInput.addEventListener( "change", function( event ) {
        the_return.innerHTML = this.value;
    });
</script>
