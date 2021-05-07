<?php $fields = $this->data['fields']?>
<div class="map">
    <?php for($y = 1 ; $y <= 20; $y++): ?>
        <?php for($x = 1 ; $x <= 20; $x++): ?>
            <?php $class = ''; ?>
            <?php if(isset($fields[$y][$x])): ?>
                <?php $class = $fields[$y][$x]['class']; ?>
            <?php endif; ?>
            <div class="field <?php echo 'x'.$x.'y'.$y ?> <?php echo $class; ?>">

            </div>
        <?php endfor; ?>
    <?php endfor; ?>
</div>