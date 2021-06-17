<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>


        <form method="POST">

            <label for="product">Product:</label>
            <select name="product" id="product">
                <?php foreach ($products->products as $element): ?>
                    <option value="<?php echo $element->getId() ?>"> <?php echo $element->getName() ?> </option>
                <?php endforeach; ?>
            </select>

            <label for="amount">Amount:</label>
            <input name="amount" type="number" value="1" min="1" class="amount_field">

            <label for="customer">Customer Name:</label>
            <select name="customer" id="customer">
                <?php foreach ($customers->getCustomerArr() as $element): ?>
                    <option value="<?php echo $element->getId() ?>"> <?php echo $element->getName() ?> </option>
                <?php endforeach; ?>
            </select>

            <input type="submit">
        </form>


    </section>
    <hr>
    <section>

        <table>
        <thead>
        <tr>
            <th class="empty">  <?php echo $ProductName ?></th>
            <th colspan="2"></th>
            <th class="big" colspan="2"> For <?php echo $name ?></th>
        </tr>
        <tr class="headers">
            <th>Original price</th>
            <th>Amount</th>
            <th>Volume discount</th>
            <th>Fixed discounts</th>
            <th>Variable discount</th>
            <th>Final price</th>

        </tr>
        </thead>
        <tbody>
        <tr class="results">
            <td><?php echo $selProductPrice."€" ?></td>
            <td><?php echo $amount."pcs" ?></td>
            <td><?php echo $volumeDisc ?></td>
            <td><?php echo $fixedDisc."€" ?></td>
            <td><?php echo $varDisc."%" ?></td>
            <td><?php echo $finalPrice."€" ?></td>
        </tr>
        </tbody>
        </table>
    </section>
<?php require 'includes/footer.php' ?>