<?php
    require_once('./inc/header.php')
?>
<main>
    <section>
        <h2>Sell Your Item</h2>
    </section>
    <section class="flex sell-main">
        <form id="addItem" action="." method="POST" enctype="multipart/form-data">
            <div class="flex sell-top">
                <div class="flex sell-top-l">
                    <label for="type">Sale type</label>
                        <select name="type" id="type">
                            <option value="auction">Auction</option>    
                            <option value="fixed">Fixed sale</option>    
                        </select>
                    <label for="category">Category</label>
                        <select name="category" id="category">
                            <option value="1">First</option>
                            <option value="2">Second</option>
                        </select>
                </div>
                <div class="flex">
                    <label for="image">Upload image</label>
                        <input type="file" name="image" id="image">
                </div>
            </div>
            <div class="flex sell-mid">
                <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                <label for="description">Description</label>
                    <textarea id="description" name="description"></textarea>
            </div>
            <div class="flex sell-lwr">
                <div class="flex sell-lwr-col">
                    <label for="price">Price</label>
                        <input type="text" id="price" name="price" value="$">
                    <label for="qty">Quantity</label>
                        <input type="number" id="qty" name="qty">
                    <label for="method">Payment method</label>
                        <select name="method" id="method">
                            <option value="1">Card</option>
                            <option value="2">Cash</option>
                        </select>
                </div>
                <div class="flex sell-lwr-col">
                    <label for="duration">Duration</label>
                        <select name="duration" id="duration">
                            <option value="3">3 Days</option>
                            <option value="7">7 Days</option>
                            <option value="10">10 Days</option>
                        </select>
                    <label for="location">Location</label>
                        <input type="text" name="location" id="location">
                    <label for="post">Postage method</label>
                        <select name="post" id="post">
                            <option value="postage">Post</option>
                            <option value="collect">Collection</option>
                        </select>
                </div> 
            </div>
            <input type="submit" value="Submit">
        </form>
    </section>
</main>
<?php
    require_once('./inc/footer.php')
?>