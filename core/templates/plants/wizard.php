<main class="container">

<h1>Kultur</h1>

<form action="/plants/wizard" method="post">

<div class="input-group mb-3">
	<span class="input-group-text">Baumart</span>
	<input type="text" class="form-control" placeholder="" aria-label="species" value="" name="species">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Stückkosten</span>
	<input type="text" class="form-control" placeholder="" aria-label="cost" value="" name="cost">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Kulturvorbereitungskosten</span>
	<input type="text" class="form-control" placeholder="" aria-label="preparation" value="" name="preparation">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Pflanzungskosten</span>
	<input type="text" class="form-control" placeholder="" aria-label="planting" value="" name="planting">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Kultursicherungskosten (5 Jahre)</span>
	<input type="text" class="form-control" placeholder="" aria-label="tending" value="" name="tending">
</div>

<p>
	<button class="btn btn-primary" type="submit" name="submit">Schutzvarianten hinterlegen</button>
</p>

</form>

<?php var_dump($_SESSION); ?>

</main>
