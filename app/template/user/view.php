<?php
$user = $data['user'];
?>
<h2>
    <?php echo $user->getUserName(); ?>
</h2>
<ul>
    <?php foreach ($data['fields'] as $field): ?>
        <li><?php echo 'x: '.$field['x'].' y: '.$field['y'] ?></li>
    <?php endforeach; ?>
</ul>