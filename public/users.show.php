<?php
    
    require_once( '../bootstrap.php');

    // redirect to home if user bypassed login/is not logged in
    if(!Auth::check()){
        header("Location: index.php");
        exit();
    }
    // returns array of ads by user's id
    function pageController()
    {
        $userArray = Auth::user();
        $data =['ads' => Ad::findAds($userArray['user_id'])];
        return $data;
    }
    // extract() will turn all the associative indices in the above $data array into variables that can be called directly later.
    // For example: $data['ads'] can now just be called by $ads
    extract(pageController());
    // Get an array of all the ad id's that the user created
    // It will be used to determine the most recent ad (couldn't use date_created because of its format)
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
        <h5 class="featured">Wineseller Profile Page</h5>

        <h2>Welcome, <?= $userArray['username']; ?>!</h2>     
                <ul>
            		<li>
                        <span class="pre">Username</span><?= $userArray['username']; ?>
                    </li>
            		<li>
                        <span class="pre">Email</span><?= $userArray['contact_email']; ?>
                    </li>
            	</ul>

        <a href="users.edit.php" class="button small radius">Edit Profile</a>
        <a href="ads.create.php" class="button small radius">Create New Ad</a>


    <div class="row">
        <div class="small-12 columns">
            <h3 id="myads" class="featured">My Ads</h3>
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
                            <img src="<?= $ad['image_url']; ?>" alt="No image provided.">
                        </a>
                        <p>
                            <span class="pre">Description</span>
                            <span class="description"><?= $ad['description']; ?></span>
                        </p>
                        <p>
                            <span class="pre">Price</span>
                            <span class="price">$<?= $ad['price']; ?></span>
                        </p>
                        <p class="view-post">
                            <a href="ads.show.php?id=<?= $ad['id']; ?>">
                                View <i class="fa fa-chevron-circle-right"></i>
                            </a>
                        </p>
                        <p class="view-post">
                            <a href="ads.edit.php?id=<?= $ad['id']; ?>">
                                Edit <i class="fa fa-pencil-square-o"></i>
                            </a>
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