<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>


<form method="POST">

    <label for="product">Product:</label>
    <select name="product" id="product">
    <?php foreach($products->products AS $element):?>
        <option value="<?php echo $element->getId() ?>"> <?php echo $element->getName() ?> </option>
    <?php endforeach; ?>
    </select>



    <label for="customer">Customer Name:</label>
    <select name="customer" id="customer">
    <?php foreach($customers->customers AS $element):?>
        <option value="<?php echo $element->getId() ?>"> <?php echo $element->getName() ?> </option>
    <?php endforeach; ?>
    </select>

    <input type="submit">
</form>

<?php var_dump($customers->selectedCustomer->getId()) ?>
</section>
<?php require 'includes/footer.php'?>