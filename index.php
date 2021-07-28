<?php
    require_once('./inc/header.php');
    // All items query in seperate file for modularity
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Diploma/504-A1/www/func/allitems.php');
?>
<main>
    <section>
        <h2>Explore All Items</h2>
    </section>
    <section>
        <table>
            <thead>
                <tr>
                    <th><h3>Title</h3></th>
                    <th class="hidden"><h3>Category</h3></th>
                    <th class="hidden"><h3>Price</h3></th>
                    <th class="hidden"><h3>Duration</h3></th>
                    <th class="hidden"><h3>Image</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i = 0; $i < count($allItems); $i++) { ?>
                        <tr>
                            <td><a href="./views/viewitem.php?id=<?php echo $i ?>"><?php echo $allItems[$i]['title'] ?></a></td>
                            <td class="hidden"><?php echo $allItems[$i]['category'] ?></td>
                            <td class="hidden"><?php echo '$' . $allItems[$i]['price'] ?></td>
                            <td class="hidden"><?php echo $allItems[$i]['duration'] . ' Days' ?></td>
                            <td class="hidden"><img src="<?php echo "./public/assets/images/" . $allItems[$i]['image'] ?>" alt="<?php echo $allItems[$i]['title'] ?>"></td>
                            <td class="hidden"><a href="/">Update</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
<?php
    require_once('./inc/footer.php')
?>

<!-- TO DO: MAKE A BIDS TABLE AND AUCTION TABLE -->