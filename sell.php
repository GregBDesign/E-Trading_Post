<?php
    require_once('./inc/header.php')
?>
<main>
    <section>
        <h2>Sell Your Item</h2>
    </section>
    <section class="flex sell-main">
        <div class="sell-container">
            <form id="addItem" action="." method="POST" enctype="multipart/form-data">
                <div class="flex sell-top">
                    <div class="flex sell-top-l">
                        <label for="type">Sale type</label>
                            <select name="type" id="type">
                                <option value="1">Auction</option>    
                                <option value="2">Fixed sale</option>    
                            </select>
                        <aside>
                            <p>Select the right format for your item, auction-style or fixed price</p>
                        </aside>
                        <label for="category">Category</label>
                            <select name="category" id="category">
                                <option value="1">First</option>
                                <option value="2">Second</option>
                            </select>
                        <aside>
                            <p>Explore E-Trading Post categories ahead of time to help you choose the best place to list your item.
                            TIP: Search for similar items to see where they are listed</p>
                        </aside>
                    </div>
                    <div class="flex sell-top-r">
                        <label for="image">Upload image</label>
                            <input id="sell-file" type="file" name="image" id="image">
                        <aside>
                            <p>Make your description come to life with vivid photos</p>
                        </aside>
                    </div>
                </div>
                <div class="flex sell-mid">
                    <label for="title">Title</label>
                        <input type="text" name="title" id="title">
                    <aside>
                        <p>Be clear, complete and descriptive. Your title should include words buyers would search for when looking for your item</p>
                    </aside>
                    <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Here’s your chance to really describe and promote your item. Be clear and complete. Include information such as brand, type, colour, specifications etc"></textarea>
                </div>
                <div class="flex sell-lwr">
                    <div class="flex sell-lwr-col">
                        <label for="price">Price</label>
                            <input type="text" id="price" name="price" placeholder="$">
                        <aside>
                            <p>What will your starting price be for bids or total price for fixed price sale?</p>
                        </aside>
                        <label for="qty">Quantity</label>
                            <input type="number" id="qty" name="qty">
                        <aside>
                            <p>How many items are you selling?</p>
                        </aside>
                        <label for="method">Payment method</label>
                            <select name="method" id="method">
                                <option value="1">Card</option>
                                <option value="2">Bank Transfer</option>
                                <option value="3">Cash on Delivery</option>
                            </select>
                    </div>
                    <div class="flex sell-lwr-col">
                        <label for="duration">Duration</label>
                            <select name="duration" id="duration">
                                <option value="3">3 Days</option>
                                <option value="7">7 Days</option>
                                <option value="10">10 Days</option>
                                <option value="14">14 Days</option>
                            </select>
                        <aside>
                            <p>How long do you want your listing to run?</p>
                        </aside>
                        <label for="location">Location</label>
                            <input type="text" name="location" id="location">
                        <aside>
                            <p>Enter your city or suburb</p>
                        </aside>
                        <label for="post">Postage method</label>
                            <select name="post" id="post">
                                <option value="1">Post</option>
                                <option value="2">Courier</option>
                                <option value="3">Collection</option>
                            </select>
                    </div> 
                </div>
                <div class="sell-submit">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </section>
</main>
<?php
    require_once('./inc/footer.php')
?>