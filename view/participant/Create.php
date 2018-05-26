<form method="post" id="signupForm" class="form" action="/Web/index.php?action=created&controller=participant"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Créer un compte</h3>

    <div id="alreadyExist"></div>
    <label for="nom_id">Entrez votre nom *</label>
    <input type='text' placeholder='Ex: OutlawSpiritus' name='nom' id='nom_id' required/>

    <label for="idEvent_id">Entrez l'id *</label>
    <input type='text' placeholder='Ex: 1' name='idEvent' id='idEvent_id' required/>

    <div id="isPresentErreur"></div>
    <label for="isPresent_id">Serez-vous présent? *</label>
    <input type="checkbox" name="isPresent" id="isPresent_id"/>

    <label for="message_id">Ecrivez un message</label>
    <input type="text" placeholder="Votre message..." name="message" id="message_id"/>

    <input type="submit" class="submitButton" value="Valider l'inscription"/>
    <p>Les champs marqués d'une * sont obligatoires</p>
</form>

<script src="/Web/js/participant.js" async defer></script>