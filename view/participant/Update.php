<form method="post" id="signupForm" class="form" action="/Web/index.php?action=updated&controller=participant"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Créer un compte</h3>

    <div id="alreadyExist"></div>
    <label for="nom_id">Entrez votre nom *</label>
    <input type='text' value='<?php echo htmlspecialchars($v->get("nom")); ?>' name='nom' id='nom_id' required/>

    <label for="idEvent_id">Entrez l'id *</label>
    <input type='text' value='<?php echo htmlspecialchars($v->get("idEvent")); ?>' name='idEvent' id='idEvent_id' required/>

    <div id="isPresentErreur">Serez-vous présent?</div>
    <label for="isPresent_id">Email *</label>
    <input type="checkbox" name="email" id="isPresent_id" <?php if($v->get("isPresent")==1){echo "checked";} ?> />

    <label for="message_id">Ecrivez un message</label>
    <input type="text" <?php if(strcmp($v->get("message"), "")){echo 'value="'.htmlspecialchars($v->get("message")).'"';}else{echo 'placeholder="Votre message..."';}?> name="message" id="message_id"/>

    <input type="submit" class="submitButton" value="Valider l'inscription"/>
    <p>Les champs marqués d'une * sont obligatoires</p>
</form>

<script src="/Web/js/participant.js" async defer></script>