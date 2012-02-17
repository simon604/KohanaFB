<h2>Login</h2>
<? if ($message) : ?>
<h3 class="message">
    <?= $message; ?>
</h3>
<? endif; ?>

<?= Form::open('admin/login'); ?>

<?= Form::label('email', 'Email'); ?>
<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>

<?= Form::label('password', 'Password'); ?>
<?= Form::password('password'); ?>

<p>(Remember Me keeps you logged in for 2 weeks)</p>

<?= Form::submit('login', 'Login'); ?>
<?= Form::close(); ?>