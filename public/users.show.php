<?php
    
    require_once '../bootstrap.php';

    // redirect to home if user bypassed login/is not logged in
   /* if(!Auth::check()){
        header("Location: index.php");
        exit();
    }*/
    // returns array of ads by user's id
    function pageController()
    {
        $userArray = Auth::user();
        $data =['ads' => Ad::findAds($userArray['user_id'])];
        return $data;
    }
    // extract() transforms associative indices in $data array into variables that can be called directly - $data['ads'] will be called by $ads
    extract(pageController());
    // Retrieve array of ads created by user by using id of ad
    $ids = [];
    foreach($ads as $ad) {
        $ids[] = $ad['id'];
    }
?>

<!doctype html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>

<?php require_once '../views/partials/header.php'; ?>
</head>
<body>

<?php require_once '../views/partials/navbar.php'; ?>

<section id="account">
        <h5>Wineseller Profile Page</h5>

        <h2>Welcome, <?= $userArray['username']; ?>!</h2>     
                <ul>
            		<li>
                        <span class="pre">Username</span><?= $userArray['username']; ?>
                    </li>
            		<li>
                        <span class="pre">Email</span><?= $userArray['email']; ?>
                    </li>
            	</ul>

        <a href="users.edit.php" class="button small radius">Edit Profile</a>
        <a href="adsWineseller.create.php" class="button small radius">Create New Ad</a>


    <div class="row">
        <div class="small-12 columns">
            <h3>Ads</h3>
        </div>
    </div>
    <div class="row">
        <?php foreach($ads as $ad) { ?>
            <div class="large-4 medium-6 columns <?php if($ad['id'] == max($ids)){ echo 'end'; }?>">
                <div class="post">
                    <div class="panel">
                        <h3>
                            <a href="ads.show.php?id=<?= $ad['id']; ?>">
                                <?= $ad['title']; ?>
                            </a>
                        </h3>
                        <a href="ads.show.php?id=<?= $ad['id']; ?>">
                            <img src="<?= $ad['image']; ?>" alt="No image provided.">
                        </a>
                        <p>
                            <span class="pre">Description</span>
                            <span class="description"><?= $ad['description']; ?></span>
                        </p>
                        <p>
                            <span class="pre">Price</span>
                            <span class="price">$<?= $ad['price']; ?></span>
                        </p>
                        <p>
                            <a href="ads.show.php?id=<?= $ad['id']; ?>">View</a>
                        </p>
                        <p>
                            <a href="ads.edit.php?id=<?= $ad['id']; ?>">Edit</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php require_once '../views/partials/footer.php'; ?>

</body>
</html>