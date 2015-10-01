<!DOCTYPE html><html lang="en"><head>
<title>Boundle</title>
<meta charset='utf8'>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 minimal-ui">

<!-- Favicon -->
<link rel='icon' href='assets/img/boundle.png?v=7'>

<!-- Google Fonts -->
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,'>

<!-- Bootstrap -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

<!-- Style -->
<link rel='stylesheet' href='assets/css/style.css'>

<style>
</style>
</head><body>

<div class="container">

<div class="row">
<div class="col-lg-12">

<h1>B <img src="assets/img/boundle.svg" class="icon"> undle</h1>

<p>Boundle binds the value of HTML elements to the global <code>boundle</code> JSON object. Simply include <code>boundle.js</code> after <code>jquery</code>, then add the <code>data-boundle</code> attribute to the HTML elements you'd like to synchronize.</p>

<hr>

<div class='row'>
<div class='col-sm-6'>

<div class='form-group'>
<label>Username</label>
<input class='form-control' data-boundle='username' data-boundle-to='.name' value='james'>
<span class='help-block'>This input's value can now be found in <code>boundle.username</code>.</span>
</div>

</div>
<div class='col-sm-6'>

<p>You can also synchronize multiple HTML Element values with a single boundle by adding the <code>data-boundle-to</code> attribute to the source HTML Element: <span class='name'></span>.</p>

<p>Boundle automatically handles what value to synchronize from different HTML elements.</p>

</div>
</div>

<hr>

<div class='row'>
<div class='col-sm-4'>

<label>Checkboxes and Radios</label>

<div class='checkbox'>
<label><input type='checkbox' data-boundle='remember'> Remember Me (<span class='name'></span>)</label>
<span class='help-block'>This checkbox returns true or false in <code>boundle.remember</code></span>
</div>

<div class='radio'>
<label><input type='radio' name='onoroff' data-boundle='on'> On</label>
<span class='help-block'>This radio returns true or false in <code>boundle.on</code></span>
</div>

<div class='radio'>
<label><input type='radio' name='onoroff' data-boundle='off'> Off</label>
<span class='help-block'>This radio returns true or false in <code>boundle.off</code></span>
</div>

</div>
<div class='col-sm-4'>

<div class='form-group'>
<label>Textarea</label>
<textarea class='form-control' data-boundle='details'></textarea>
<span class='help-block'>This textarea's value can now be found in <code>boundle.details</code></span>
</div>

</div>
<div class='col-sm-4'>

<div class='form-group'>
<label>Select</label>
<select class='form-control' data-boundle='selection'>
<option value='a'>A</option>
<option value='b'>B</option>
</select>
<span class='help-block'>The value of this select's chosen option can now be found in <code>boundle.selection</code></span>
</div>

</div>
</div><!-- .row -->

<hr>

<p>Boundle can also synchronize <span data-boundle='static'>static text</span> and HTML elements with the <code>contenteditable</code> attribute like <span contenteditable='true' data-boundle='other' class='editable'>this</span>.</p>

</div>
</div>

</div><!-- .container -->

<div class="container">
<h2 style="color:darkgray;">Unboundled Form</h2>
<hr>
<div class="row">
<div class="col-sm-6">
<form>

<!-- AUTOCOMPLETE HACK -->
<input class="hidden" type="password">

<div class="form-group">
<label class="control-label" for="email">Email</label>
<input class="form-control" id="email" placeholder="Enter email" type="email">
</div>

<div class="form-group">
<label class="control-label" for="password">Password</label>
<input class="form-control" id="password" placeholder="Enter password" type="password">
</div>

<div class="form-group">
<div class="checkbox"><label><input type="checkbox"> Remember Me</label></div>
</div>

<div class="form-group">
<button id="boundleButton" class="btn btn-default" type="submit">Boundle this Form</button>
</div>
</form>
</div>

<div class="col-sm-6">
<p>The <code>boundleForms ()</code> function dynamically boundles any old HTML form.</p>
<p>When a boundable element doesn't have an id or name attribute <span class="text-muted">(ex: "Remember Me" field)</span> its <code>data-boundle</code> attribute values follows the following convention: <code>boundle-{[data-boundle].length}</code>.</p>
<p>The following input element types aren't boundable:</p>
<ul class="inline">
<li>password</li>
<li>button</li>
<li>submit</li>
<li>hidden</li>
</ul>

</div>
</div>
</div>

<footer>
<div class="container">
<div class="row">
<div class="col-sm-12">

<hr>

<p class='text-muted'><small><a href="http://prosperful.com">Prosperful</a> &copy; 1983 - 2015. All Rights Reserved</small></p>
</div>
</div>
</div>
</footer>

<!-- jQuery -->
<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>

<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Boundle -->
<script src="assets/js/boundle.js"></script>

<script>
$ (window).ready (function () {
	$ ("#boundleButton").click (function (e) {
		e.preventDefault ();
		
		boundleForms ();
		
		$ ("h2").text ("Boundled Form");
		$ (this).addClass ("disabled");
		
		return true;
	});
});
</script>

</body></html>