<div class="map">
    <?php for($y = 1 ; $y <= 20; $y++): ?>
        <?php for($x = 1 ; $x <= 20; $x++): ?>
            <div class="field <?php echo 'x'.$x.'y'.$y ?>">

            </div>
        <?php endfor; ?>
    <?php endfor; ?>
</div>