<main class="container">

<div class="input-group mb-3">
	<span class="input-group-text">Forstbetrieb</span>
	<input type="text" class="form-control" placeholder="" aria-label="operation" value="<?php echo $header->operation; ?>">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Forstrevier</span>
	<input type="text" class="form-control" placeholder="" aria-label="district" value="<?php echo $header->district; ?>">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Revierleiter</span>
	<input type="text" class="form-control" placeholder="" aria-label="manager" value="<?php echo $header->manager; ?>">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Waldort</span>
	<input type="text" class="form-control" placeholder="" aria-label="location" value="<?php echo $header->location; ?>">
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Mehrwertsteuer
  </label>
</div>

<p>
	<!-- FORMULAR -->
	<a class="btn btn-primary" href="/wuchshuellenrechner/plants/" role="button">Pflanzen hinterlegen</a>
</p>

</main>
