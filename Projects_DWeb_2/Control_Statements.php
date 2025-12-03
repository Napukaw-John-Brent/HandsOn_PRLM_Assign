<?php
//Napukaw, John Brent C.
//WD-203
//November 29, 2025

$traveler_name = "Traveler";
$world = "Teyvat";
$default_greeting = "Hello, Traveler!";

if ($traveler_name !== '') {
    $greeting = "Ad astra abyssosque, $traveler_name! Welcome to $world!";
} else {
    $greeting = $default_greeting;
}

$selected_weapon = 'Aquila Favonia (5★)';
$weapon2 = 'Wolf Gravestone (5★)';
$weapon3 = 'Skyward Harp (5★)';
$weapon4 = 'Prototype Rancour (4★)';
$weapon5 = 'Favonius Sword (4★)';
$weapon6 = 'Dull Blade (1★)';

$genshin_weapons = [
    'Aquila Favonia (5★)' => 299.99,
    'Wolf Gravestone (5★)' => 289.99,
    'Skyward Harp (5★)' => 279.99,
    'Prototype Rancour (4★)' => 89.99,
    'Favonius Sword (4★)' => 79.99,
    'Dull Blade (1★)' => 9.99
];

$weapon_price = match ($selected_weapon) {
    'Aquila Favonia (5★)' => $genshin_weapons['Aquila Favonia (5★)'],
    'Wolf Gravestone (5★)' => $genshin_weapons['Wolf Gravestone (5★)'],
    'Skyward Harp (5★)' => $genshin_weapons['Skyward Harp (5★)'],
    'Prototype Rancour (4★)' => $genshin_weapons['Prototype Rancour (4★)'],
    'Favonius Sword (4★)' => $genshin_weapons['Favonius Sword (4★)'],
    'Dull Blade (1★)' => $genshin_weapons['Dull Blade (1★)'],
    default => 0,
};

$weapons_list = [
    ['name' => 'Aquila Favonia (5★)', 'price' => 299.99],
    ['name' => 'Wolf Gravestone (5★)', 'price' => 289.99],
    ['name' => 'Skyward Harp (5★)', 'price' => 279.99],
    ['name' => 'Prototype Rancour (4★)', 'price' => 89.99],
    ['name' => 'Favonius Sword (4★)', 'price' => 79.99],
    ['name' => 'Dull Blade (1★)', 'price' => 9.99]
];

$sweet_madame = 3.99;
$mondstadt_hash_brown = 2.99;
$adeptus_temptation = 15.99;
$character_combo1 = $sweet_madame + $mondstadt_hash_brown; 
$character_combo2 = $adeptus_temptation + $sweet_madame; 
$character_combo3 = $mondstadt_hash_brown + $adeptus_temptation + $sweet_madame;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teyvat Adventures - Mondstadt's Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <header>
        <h1>Mondstadt's Store</h1>
    </header>

    <section id="greeting">
        <h2>Welcome to Teyvat!</h2>
        <p><?php echo $greeting; ?></p>
        <p><em>"Wherever you go, whatever life throws at you...In Teyvat, the stars in the sky will always have a place for you."</em></p>
    </section>

    <section id="weapons">
        <h2>Wagner's Blacksmith</h2>
        <p>Forged with the finest materials in Mondstadt:</p>
        <?php

    for($i = 0; $i < count($weapons_list); $i++) {
        $weapon = $weapons_list[$i];
        $rarity = strpos($weapon['name'], '5★') !== false ? 'legendary' : (strpos($weapon['name'], '4★') !== false ? 'epic' : 'common');
        echo "<p class='$rarity'><strong>{$weapon['name']}</strong>: {$weapon['price']} Mora</p>";
    }

        ?>
        <h3>Featured Weapon:</h3>
        <p>Price of <?= $selected_weapon; ?>: <?= $weapon_price; ?> Mora</p>
        
        <h3>Other Signature Weapons:</h3>
        <p><?= $weapon2; ?>: <?= $genshin_weapons[$weapon2]; ?> Mora</p>
        <p><?= $weapon3; ?>: <?= $genshin_weapons[$weapon3]; ?> Mora</p>
        <p><?= $weapon4; ?>: <?= $genshin_weapons[$weapon4]; ?> Mora</p>
    </section>

    <section id="food">
        <h2>Good Hunter Restaurant</h2>
        <h3>Individual Dishes:</h3>
        <p>Sweet Madame: <?php echo $sweet_madame; ?> Mora</p>
        <p>Mondstadt Hash Brown: <?php echo $mondstadt_hash_brown; ?> Mora</p>
        <p>Adeptus Temptation: <?php echo $adeptus_temptation; ?> Mora</p>
        
        <h3>Favorite Combos:</h3>
        <?php
        for($counter = 1; $counter <= 3; $counter++){
            echo "<p><strong>";
            if($counter == 1){
                echo "Aether's Combo";
            } elseif($counter == 2){
                echo "Liyue Adeptus' Feast";
            } elseif($counter == 3){
                echo "Archon's Banquet";
            }
            echo "</strong> - Price: ";
            if($counter == 1){
                echo $character_combo1;
            } elseif($counter == 2){
                echo $character_combo2;
            } elseif($counter == 3){
                echo $character_combo3;
            }
            echo " Mora</p>";
        }
        ?>
    </section>

    <section id="combos">
        <h2>Adventurer's Guild Start Packs</h2>
        <p>Special bundles for your journey through Teyvat!</p>
        <p><strong>Beginner's Blessing:</strong> Dull Blade + Sweet Madame - <?= $genshin_weapons['Dull Blade (1★)'] + $sweet_madame; ?> Mora</p>
        <p><strong>Knight's Preparation:</strong> Favonius Sword + Adeptus Temptation - <?= $genshin_weapons['Favonius Sword (4★)'] + $adeptus_temptation; ?> Mora</p>
        <p><strong>Archon's Arsenal:</strong> Aquila Favonia + Grand Banquet - <?= $genshin_weapons['Aquila Favonia (5★)'] + $character_combo3; ?> Mora</p>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>