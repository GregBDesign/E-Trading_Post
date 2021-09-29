<?php
    require_once('../inc/header.php');
    require_once('../func/edititems.php');

    $item = editItem($_GET['id'], $conn);
?>
<main>
    <section>
        <h2>Edit <?php echo $item[0]['title'] ?></h2>
    </section>
    <section class="flex sell-main">
        <div class="sell-container">
            <form id="addItem" action="../proc/sellproc.php?edit=<?php echo $item[0]['itemId']?>" method="POST" enctype="multipart/form-data">
                <div class="flex sell-top">
                    <div class="flex sell-top-l">
                        <label for="type">Sale type</label>
                            <select name="type" id="type" disabled>
                                <option value="1" <?php if($item[0]['format'] == 1){ ?> selected="selected" <?php } ?>>Auction</option>    
                                <option value="2" <?php if($item[0]['format'] == 2){ ?> selected="selected" <?php } ?>>Fixed sale</option>    
                            </select>
                        <aside>
                            <p>Select the right format for your item, auction-style or fixed price</p>
                        </aside>
                        <label for="category">Category</label>
                            <select name="category" id="category" disabled>
                                <option value="1" <?php if($item[0]['category'] == 1){ ?> selected="selected" <?php } ?>>Motors</option>
                                <option value="2" <?php if($item[0]['category'] == 2){ ?> selected="selected" <?php } ?>>Fashion</option>
                                <option value="3" <?php if($item[0]['category'] == 3){ ?> selected="selected" <?php } ?>>Books, Movies & Music</option>
                                <option value="4" <?php if($item[0]['category'] == 4){ ?> selected="selected" <?php } ?>>Electronics</option>
                                <option value="5" <?php if($item[0]['category'] == 5){ ?> selected="selected" <?php } ?>>Collectibles & Art</option>
                                <option value="6" <?php if($item[0]['category'] == 6){ ?> selected="selected" <?php } ?>>Home & Garden</option>
                                <option value="7" <?php if($item[0]['category'] == 7){ ?> selected="selected" <?php } ?>>Sporting Goods</option>
                                <option value="8" <?php if($item[0]['category'] == 8){ ?> selected="selected" <?php } ?>>Toys & Hobbies</option>
                                <option value="9" <?php if($item[0]['category'] == 9){ ?> selected="selected" <?php } ?>>Business & Industrial</option>
                                <option value="10" <?php if($item[0]['category'] == 10){ ?> selected="selected" <?php } ?>>Health & Beauty</option>
                                <option value="11" <?php if($item[0]['category'] == 11){ ?> selected="selected" <?php } ?>>Other & Misc</option>
                            </select>
                        <aside>
                            <p>Explore E-Trading Post categories ahead of time to help you choose the best place to list your item.
                            TIP: Search for similar items to see where they are listed</p>
                        </aside>
                    </div>
                    <div class="flex sell-top-r">
                        <label for="image">Upload image - <span>Optional</span></label>
                            <input type="file" name="image" id="image" disabled>
                        <aside>
                            <p>Make your description come to life with vivid photos</p>
                        </aside>
                    </div>
                </div>
                <div class="flex sell-mid">
                    <label for="title">Title <span class="err"><?php if(isset($_SESSION["errors"]["title"])){ echo $_SESSION["errors"]["title"];} ?></span></label>
                        <input class="read-only" type="text" name="title" id="title" value="<?php echo $item[0]['title']?>" readonly="readonly">
                    <aside>
                        <p>Be clear, complete and descriptive. Your title should include words buyers would search for when looking for your item</p>
                    </aside>
                    <label for="description">Description <span class="err"><?php if(isset($_SESSION["errors"]["description"])){ echo $_SESSION["errors"]["description"]; }?></span></label>
                        <textarea id="description" name="description" required><?php echo $item[0]['description']?></textarea>
                        <aside>
                            <p>Here’s your chance to really describe and promote your item. Be clear and complete. Include information such as brand, type, colour, specifications etc</p>
                        </aside>
                </div>
                <div class="flex sell-lwr">
                    <div class="flex sell-lwr-col">
                        <label for="price">Price <span class="err"><?php if(isset($_SESSION["errors"]["price"])){ echo $_SESSION["errors"]["price"]; }?></span></label>
                            <input class="read-only" type="number" id="price" name="price" value="<?php echo $item[0]['price']?>" readonly="readonly">
                        <aside>
                            <p>What will your starting price be for bids or total price for fixed price sale?</p>
                        </aside>
                        <label for="qty">Quantity <span class="err"><?php if(isset($_SESSION["errors"]["qty"])){ echo $_SESSION["errors"]["qty"]; }?></span></label>
                            <input class="read-only" type="number" id="qty" name="qty" value="<?php echo $item[0]["quantity"]?>" readonly="readonly">
                        <aside>
                            <p>How many items are you selling?</p>
                        </aside>
                        <label for="method">Payment method</label>
                            <select name="method" id="method">
                                <option value="1" <?php if($item[0]['format'] == 1){ ?> selected="selected" <?php } ?>>Card</option>
                                <option value="2" <?php if($item[0]['format'] == 2){ ?> selected="selected" <?php } ?>>Bank Transfer</option>
                                <option value="3" <?php if($item[0]['format'] == 3){ ?> selected="selected" <?php } ?>>Cash on Delivery</option>
                            </select>
                    </div>
                    <div class="flex sell-lwr-col">
                        <label for="duration">Duration</label>
                            <select name="duration" id="duration" disabled>
                                <option value="3" <?php if($item[0]['duration'] == 3){ ?> selected="selected" <?php } ?>>3 Days</option>
                                <option value="7" <?php if($item[0]['duration'] == 7){ ?> selected="selected" <?php } ?>>7 Days</option>
                                <option value="10" <?php if($item[0]['duration'] == 10){ ?> selected="selected" <?php } ?>>10 Days</option>
                                <option value="14" <?php if($item[0]['duration'] == 14){ ?> selected="selected" <?php } ?>>14 Days</option>
                            </select>
                        <aside>
                            <p>How long do you want your listing to run?</p>
                        </aside>
                        <label for="location">Location <span class="err"><?php if(isset($_SESSION["errors"]["location"])){ echo $_SESSION["errors"]["location"]; }?></span></label>
                            <input type="text" name="location" id="location" value="<?php echo $item[0]['location']?>" required>
                        <aside>
                            <p>Enter your city or suburb</p>
                        </aside>
                        <label for="post">Postage method</label>
                            <select name="post" id="post">
                                <option value="1" <?php if($item[0]['postage'] == 1){ ?> selected="selected" <?php } ?>>Mail</option>
                                <option value="2" <?php if($item[0]['postage'] == 2){ ?> selected="selected" <?php } ?>>Courier</option>
                                <option value="3" <?php if($item[0]['postage'] == 3){ ?> selected="selected" <?php } ?>>Collection</option>
                            </select>
                    </div> 
                </div>
                <div class="sell-submit">
                    <input type="submit" value="Edit">
                </div>
            </form>
        </div>
    </section>
</main>
<?php
    require_once('../inc/footer.php')
?>