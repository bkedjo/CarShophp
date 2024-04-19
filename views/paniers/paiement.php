<!-- Affiche les détails du panier -->
<!-- Implémentez le code pour afficher les détails du panier -->

<!-- Formulaire pour choisir le mode de paiement -->
<form action="<?php echo URI; ?>paniers/validerPaiement" method="post">
    <select name="mode_paiement" id="mode_paiement">
        <option value="cod">Cash on Delivery</option>
        <option value="card">Card</option>
        <option value="paypal">Paypal</option>
    </select>
    <button type="submit">Valider le paiement</button>
</form>
