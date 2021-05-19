<?php $user = $this->data['user']; ?>
<div class="city-wrapper">
    <?php
    $fields = $user->getFields();

    foreach ($fields as $field){
        $city = $field->getCity();
    }

    ?>
    <h2><?php echo $city->getName();  ?></h2>
    <div class="city-base">
        <?php
            foreach ($city->getBuildings() as $building){
                echo $building->getLevel();
                echo '<br>';
                echo $building->getPosition();
            }
        ?>
    </div>
</div>
