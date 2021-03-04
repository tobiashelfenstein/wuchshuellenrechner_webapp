<main class="container">

<h1>Kultur</h1>

<form action="/project/wizard" method="post">

<div class="input-group mb-3">
	<span class="input-group-text">Forstbetrieb</span>
	<input type="text" class="form-control" placeholder="" aria-label="operation" value="<?php echo $header->operation; ?>" name="operation">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Forstrevier</span>
	<input type="text" class="form-control" placeholder="" aria-label="district" value="<?php echo $header->district; ?>" name="district">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Revierleiter</span>
	<input type="text" class="form-control" placeholder="" aria-label="manager" value="<?php echo $header->manager; ?>" name="manager">
</div>

<div class="input-group mb-3">
	<span class="input-group-text">Waldort</span>
	<input type="text" class="form-control" placeholder="" aria-label="location" value="<?php echo $header->location; ?>" name="location">
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="tax" value="true" id="flexCheckChecked" <?php if(!empty($header->tax)) { echo 'checked="checked"'; } ?>>
  <label class="form-check-label" for="flexCheckChecked">
    Mehrwertsteuer
  </label>
</div>

<p>
	<button class="btn btn-primary" type="submit" name="submit">Pflanzen hinterlegen</button>
</p>

</form>

</main>
