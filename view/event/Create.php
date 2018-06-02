<div style="display: flex">
    <form method="post" id="createEventForm" class="mdc-card carte form"
          action="/Web/index.php?action=created&controller=event">
        <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
        <h2 class="card-h2 card-padding mdc-typography--title">Créer un évènement</h2>
	
		<input type="hidden" name="longitude" id="longitude_id" required/>
	
		<input type="hidden" name="latitude" id="latitude_id" required/>
	
		<div class="mdc-text-field" id="divLocalisation">
            <label class="mdc-floating-label" for="localisation">Localisation *</label>
            <input class="mdc-text-field__input" type='text' name='localisation' id='localisation' required/>
        </div>
        <div class="mdc-text-field" id="divTitre">
            <label class="mdc-floating-label" for="titre">Titre *</label>
            <input class="mdc-text-field__input" type="text" name="titre" id="titre" required/>
        </div>
        <div class="mdc-text-field" id="divDescription">
            <label class="mdc-floating-label" for="description">Description</label>
            <input class="mdc-text-field__input" type="text" name="description" id="description"/>
        </div>
        <div class="mdc-text-field" id="divDate">
            <label class="mdc-floating-label mdc-floating-label--float-above" for="date">Date *</label>
            <input class="mdc-text-field__input" type="date" name="date" id="date" required/>
        </div>
        <div class="mdc-text-field" id="divHeure">
            <label class="mdc-floating-label" for="heure">Heure *</label>
            <input class="mdc-text-field__input" type="number" name="heure" min="0" max="23" value="00">
            <input class="mdc-text-field__input" type="number" name="minutes" min="0" max="59" value="00">
        </div>
        <div class="mdc-form-field">
            <div class="mdc-checkbox" id="divPublic">
                <input type="checkbox" name="public" id="public"
                       class="mdc-checkbox__native-control">
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark"
                         viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path"
                              fill="none"
                              stroke="white"
                              d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="public">Rendre l'évènement public ?</label>
        </div>
        <input type="hidden" name="loginCreateur" value='<?php echo htmlspecialchars($_SESSION['login']); ?>'/>

        <button type="submit" class="mdc-fab material-icons">
                <span class="mdc-fab__icon">
                    send
                </span>
        </button>
        <p>Les champs marqués d'une * sont obligatoires</p>
        <input type="hidden" name="loginCreateur" value='<?php if (!empty($_SESSION['login'])) echo htmlspecialchars($_SESSION['login']); ?>'/>
    </form>

    <div class="mdc-card carte">
        <div id="map" style="height: 300px"></div>
    </div>
</div>
<script src="/Web/js/event.js" async defer></script>
<script>
	var marker;
	
	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 2,
			minZoom: 1,
			maxZoom: 11,
			center: {lat: 0 , lng: 0},
			streetViewControl: false, //désactive l'HUD inutile
			mapTypeControl: false,
			rotateControl: false,
			fullscreenControl: false
		});
		
		map.addListener('click', function(e) {
			placeMarkerAndPanTo(e.latLng, map);
		});
		
		if(document.getElementById("update")) { //Place un marqueur aux coordonnées de l'event à update
			var latitude = document.getElementById("latitude_id").value;
			var longitude = document.getElementById("longitude_id").value;
			
			var LatLng = new google.maps.LatLng(latitude, longitude)
			
			marker = new google.maps.Marker({
				position: LatLng,
				map: map
			});
			map.panTo(LatLng);
		}
	}
	
	function placeMarkerAndPanTo(latLng, map) {
		if(typeof marker !== 'undefined'){  //Détruit le précédent marqueur si on en avait placé un
			marker.setMap(null);
		}
		marker = new google.maps.Marker({
			position: latLng,
			map: map
		});
		document.getElementById("latitude_id").value = marker.getPosition().lat();
		document.getElementById("longitude_id").value = marker.getPosition().lng();
		map.panTo(latLng);
	}

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuog5LlTmtUH8-wB5IjxdJMY_Cq-CqhVU&language=fr&callback=initMap">
</script>

<script>
    divLocation = new mdc.textField.MDCTextField(document.querySelector('#divLocalisation'));
    divTitre = new mdc.textField.MDCTextField(document.querySelector('#divTitre'));
    divDescription = new mdc.textField.MDCTextField(document.querySelector('#divDescription'));
    divDate = new mdc.textField.MDCTextField(document.querySelector('#divDate'));
    divHeure = new mdc.textField.MDCTextField(document.querySelector('#divHeure'));
    divPublic = new mdc.checkbox.MDCCheckbox(document.querySelector('#divPublic'));
</script>

<style>
    .mdc-text-field {
        width: 90%;
        margin: auto;
    }

    .form p {
        padding: 15px;
    }

    button.mdc-fab.material-icons {
        margin: auto;
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>
   
