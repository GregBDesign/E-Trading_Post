<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/header.php');

    unset($_SESSION["errors"]);
    unset($_SESSION["formData"]);
?>
<main>
    <section>
        <h2>Explore All Items</h2>
    </section>
    <?php 
        if(isset($_GET['status'])){ ?>
            <section class="info">
                <?php switch($_GET['status']){
                    case 'add':
                        echo "<h3>Item added successfully</h3>";
                        break;
                    case 'edit':
                        echo "<h3>Item edited successfully</h3>";
                        break;
                    case 'dberr':
                        echo "<h3>There is a database error</h3>";
                        break;
                    } ?>
            </section>
        <?php } ?>
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
                            <td class="hidden"><img src="<?php echo $allItems[$i]['image'] ?>" alt="<?php echo $allItems[$i]['title'] ?>"></td>
                            <td class="hidden"><a href="./views/updateitem.php?id=<?php echo $allItems[$i]['itemId']?>">Update</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php');
?>