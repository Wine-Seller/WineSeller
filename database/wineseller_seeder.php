<?php

require_once '../bootstrap.php';



// Tell PDO to throw exceptions on error
/*$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/

/*First, add a query to delete all the records from ads table*/
$deleteRecords = "TRUNCATE ads"; 

$dbc->exec($deleteRecords);

$adsList = [
    [
        'vendor'        => 'Bending Branch Winery',
        'city'          => 'Comfort',
        'state'         => 'Texas',
        'zip'           => '78013',
        'category'      => 'wine',
        'origin'        => 'US Texas',
        'style'         => 'Dry White',
        'vintage'       => '2014',
        'price'         => '20.00',
        'description'   => 'Vermentino is among the most popular grapes in Italy. We harvest these grapes from Las Brisas Vineyard in Carneros, California. The wine offers acidity and minerality, and it pairs well with lighter fare, such as seafood.',
        'image'         => '/img/vermentinoBendingBranch.jpg'
    ],

    [
        'vendor'        => 'Total Wine and More',
        'city'          => 'Atlanta',
        'state'         => 'Georgia',
        'zip'           => '30346',
        'category'      => 'wine',
        'origin'        => 'France Bordeaux Left Bank Pauillac',
        'style'         => 'Dry Red Bordeaux Blend',
        'vintage'       => '2010',
        'price'         => '999.99',
        'description'   => 'Chateau Lafite Rothschild - 1st Growth - 100 point rating from Wine Enthusiast - Concentrated, Plum, Currant, Full-bodied - "Almost black in color, this stunning wine is gorgeous, rich and dense, grand and powerful, with a strong sense of its own importance. The beautiful tannins and the fragrant black currant fruits are palpable.',
        'image'         => '/img/Lafite2010.jpg'
    ],

     [

        'vendor'        => 'Wine Enthusiast',
        'city'          => 'New York',
        'state'         => 'New York',
        'zip'           => '10003',
        'category'      => 'Accessories',
        'origin'        => 'US',
        'style'         => 'Wine Preservation System',
        'vintage'       => '0',
        'price'         => '299.95',
        'description'   => 'Coravin 1000 Wine Access System. For centuries, the cork had to be removed in order to enjoy a glass of wine-that era is over. The Coravin System is a transformational new technology that allows users to pour wine whiling keeping the cork in the bottle, where it has been since it was ﬁrst sealed in the winery. Now you can enjoy your favorite and ﬁnest wines by the glass whenever you like, and feel conﬁdent that your wine will be protected until the next glass is poured. Now you can share and enjoy the same bottle, or bottles on multiple occasions, over weeks, months, or even longer - without wasting a drop. How do we do it? When the Coravin System is put in place, a thin, hollow needle is inserted through the cork to extract the wine. The bottle is then pressurized with argon, an inert gas that is in the air we breathe. Once the bottle has been pressurized, the wine flows through the needle and pours into your glass. Once your wine is poured, the needle is removed, and the cork reseals itself.',
        'image'         => '/img/coravin.jpg'
    ],

     [

        'vendor'        => 'Crystal Classics',
        'city'          => 'Columbus',
        'state'         => 'Ohio',
        'zip'           => '10003',
        'category'      => 'Accessories',
        'origin'        => 'US',
        'style'         => 'Wine Glasses Red Burgundy',
        'vintage'       => '0',
        'price'         => '135.15',
        'description'   => 'Riedel Sommeliers Black Series Collector Edition Red Stem Burgundy Grand Cru',
        'image'         => '/img/glasses.jpg'
    ],

];

/*Update park_seeder.php to use prepare() rather than exec() - MySQL caches this statement*/
       /* ()*/

    $stmt = $dbc->prepare('INSERT INTO ads (vendor,city, state, zip, category, style, origin, vintage, price, description, image) 
        VALUES (:vendor, :city, :state, :zip, :category, :style, :origin, :vintage, :price, :description, :image)');

foreach ($adsList as $list) {
    $stmt->bindValue(':vendor', $list['vendor'], PDO::PARAM_STR);
    $stmt->bindValue(':city', $list['city'], PDO::PARAM_STR);
    $stmt->bindValue(':state', $list['state'], PDO::PARAM_STR);
    $stmt->bindValue(':zip', $list['zip'], PDO::PARAM_INT);
    $stmt->bindValue(':category', $list['category'], PDO::PARAM_STR);
    $stmt->bindValue(':style', $list['style'], PDO::PARAM_STR);
    $stmt->bindValue(':origin', $list['origin'], PDO::PARAM_STR);
    $stmt->bindValue(':vintage', $list['vintage'], PDO::PARAM_INT);       
    $stmt->bindValue(':price', $list['price'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $list['description'], PDO::PARAM_STR);
    $stmt->bindValue(':image', $list['image'], PDO::PARAM_STR);
 /*   $stmt->bindValue(':id', $list['id'], PDO::PARAM_STR);*/
    $stmt->execute();

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}

$deleteUsers = 'TRUNCATE TABLE users';
    $dbc->exec($deleteUsers);
    $users = [
        [ 
            'username'      =>  'shop1', 
            'password'      =>  password_hash('password', PASSWORD_DEFAULT),
            'email'         =>  'shop1@email.com',
            'age'           =>  '25',
        ],
        [ 
            'username'      =>  'shop2', 
            'password'      =>  password_hash('password', PASSWORD_DEFAULT),
            'email'         =>  'shop2@email.com',
            'age'           =>  '30',
        ],
        [ 
            'username'      =>  'shop3', 
            'password'      =>  password_hash('password', PASSWORD_DEFAULT),
            'email'         =>  'shop3@email.com',
            'age'           =>  '35',
        ],
        [ 
            'username'      =>  'shop4', 
            'password'      =>  password_hash('password', PASSWORD_DEFAULT),
            'email'         =>  'shop4@email.com',
            'age'           =>  '40',
        ]
    ];
  $seedUsersTable = "INSERT INTO users (  username,  password,  email, age)
            VALUES            ( :username, :password, :email, :age)";
    $stmt = $dbc->prepare($seedUsersTable);
    foreach ($users as $user) { 
        $stmt->bindValue(':username', $user['username'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $user['password'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindValue(':age', $user['age'], PDO::PARAM_INT);
        $stmt->execute();
        echo "Inserted User: ".$dbc->lastInsertId().PHP_EOL;
    }


?>