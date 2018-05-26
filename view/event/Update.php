<form method="post" id="createEventForm" class="form" action="/Web/index.php?action=updated&controller=event"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Créer un évènement</h3>

    <label for="localisation">Localisation *</label>
    <input type='text' name='localisation' id='localisation' required/>

    <label for="titre">Titre *</label>
    <input type="text" name="titre" id="titre" required/>

    <label for="description">Description</label>
    <input type="text" name="description" id="description"/>

    <label for="date">Date *</label>
    <input type="date" name="date" id="date" required/>

    <label for="heure">Heure *</label>
    <input type="number" name="heure" min="0" max="23" value="00">
    <input type="number" name="minutes" min="0" max="59" value="00">

    <label for="public">Rendre l'évènement public ?</label>
    <input type="checkbox" name="public" id="public">

    <input type="hidden" name="loginCreateur" value='<?php if (!empty($_SESSION['login'])) echo htmlspecialchars($_SESSION['login']); ?>'/>

    <input type="submit" class="submitButton" value="Créer l'évènement"/>
    <p>Les champs marqués d'une * sont obligatoires</p>
</form>
