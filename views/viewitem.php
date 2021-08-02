<?php
    require_once('../inc/header.php');

    if($_GET['id'] >= count($allItems) || $_GET['id'] < 0 ){
        header("Location: ../index.php");
    }
?>
<main>
    <section>
        <h2><?php echo $allItems[$_GET['id']]['title'] ?></h2>
    </section>
    <section class="flex sell-main">
        <div class="sell-container">
            <div class="flex sell-top">
                <div class="flex sell-top-l view-top-l">
                    <div class="flex item-view">
                        <h3>Sale type</h3>
                        <p><?php echo $allItems[$_GET['id']]['saleType'] ?></p>
                    </div>
                    <div class="flex item-view">
                        <h3>Category</h3>
                        <p><?php echo $allItems[$_GET['id']]['category'] ?></p>
                    </div>
                    <div class="flex item-view">
                        <h3>Title</h3>
                        <p><?php echo $allItems[$_GET['id']]['title'] ?></p>
                    </div>
                    <div class="flex item-view">
                        <h3>Description</h3>
                        <p><?php echo $allItems[$_GET['id']]['description'] ?></p>
                    </div>
                </div>
                <div class="flex sell-top-r">
                    <img src="<?php echo "../public/assets/images/" . $allItems[$_GET['id']]['image'] ?>" alt="<?php echo $allItems[$_GET['id']]['title'] ?>">
                </div>
            </div>
            <div class="flex sell-lwr">
                <div class="flex sell-lwr-col">
                    <div class="flex item-view">
                        <h3>Price</h3>
                        <p>$ <?php echo $allItems[$_GET['id']]['price'] ?></p>
                    </div>
                    <div class="flex item-view">
                        <h3>Quantity</h3>
                        <p><?php echo $allItems[$_GET['id']]['quantity'] ?></p>
                    </div>
                    <div class="flex item-view">
                        <h3>Sellers preferred payment method</h3>
                        <p><?php echo $allItems[$_GET['id']]['paymentType'] ?></p>
                    </div>
                </div>
                <div class="flex sell-lwr-col">
                    <div class="flex item-view">
                        <h3>Duration</h3>
                        <p><?php echo $allItems[$_GET['id']]['duration'] ?> Days</p>
                    </div>
                    <div class="flex item-view">
                        <h3>Item Location</h3>
                        <p><?php echo $allItems[$_GET['id']]['location'] ?></p>
                    </div>
                    <div class="flex item-view">
                        <h3>Postage Method</h3>
                        <p><?php echo $allItems[$_GET['id']]['postType'] ?></p>
                    </div>
                </div> 
            </div>
            <form class="sell-submit" action="/Diploma/504-A1/www/index.php">
                <input type="submit" value="Back to all items">
            </form>
        </div>
    </section>
</main>
<?php
    require_once('../inc/footer.php')
?>