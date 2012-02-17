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

<?= Form::submit('login', 'Login'); ?>
<?= Form::close(); ?>