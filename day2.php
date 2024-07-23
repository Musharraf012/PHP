<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // $variableName = 5   (for declaration of variable)(NOTE:variable should be print in only doublecoat)

    $num = 5;
    // exit; (for error checking)
    // die();  (for error checking)
    echo "$num";
    // for checking variable type and for print we use var_dump
    var_dump($num)

    ?>
</body>

</html>

<?php
if (isset($_REQUEST['form1'])) {
    $price = (!empty($_REQUEST['number'])) ? (int)$_REQUEST['number'] : 0;
    $discount = (!empty($_REQUEST['discount'])) ? (int)$_REQUEST['discount'] : 0;
    $option = $_REQUEST['option'];
    $totalAmount = 0;
    if ($option == 'flat') {
        $totalAmount = ($price) - ($discount);
    } else {
        $totalAmount = $price - ($price * $discount / 100);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Calculator</title>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
" rel="stylesheet">

</head>

<body>
    <form action="" onsubmit="validateForm(event)">
        <div>
            <label for="">Price : </label>
            <input type="number" name="number" placeholder="price" id="price"> <span>
                <?php
                if (isset($_REQUEST['form1'])) {
                    if (empty($price)) {
                        echo "Please Enter Price";
                    } else if ($price < 0) {
                        echo "Please Enter Valid Price";
                    }
                }
                ?>
            </span>
        </div><br><br>
        <div>
            <label for="">Discount : </label>
            <input type="number" name="discount" placeholder="discount" id="discount"> <span>
                <?php
                if (isset($_REQUEST['form1'])) {
                    if (empty($discount)) {
                        echo "Please Enter Discount";
                    } else if ($discount < 0) {
                        echo "Please Enter Valid discount";
                    }
                }
                ?>
            </span>
        </div><br><br>
        <div>Discount Type :
            <select name="option" id="option">
                <option value="flat">Flat</option>
                <option value="percentage">Percentage</option>
            </select>
        </div><br><br>
        <button type="submit" name="form1" value="sub">Get Find Amount</button><br><br>
    </form>
    <div id="pri">
        <h1>Price : <?php
                    $price = (!empty($price) ? $price : '0');
                    echo $price
                    ?></h1>

    </div>
    <div id="dis">
        <h1>Discount : <?php
                        $discount = (!empty($discount) ? $discount : '0');
                        echo $discount
                        ?></h1><span></span>
    </div>
    <div id="totalAmount">
        <h1>Total Amount :
            <?php
            $totalAmount = (!empty($totalAmount) ? $totalAmount : '0');
            echo $totalAmount
            ?>
        </h1>
    </div>
    <script>
        function validateForm(event) {
            var price = document.getElementById('price').value;
            var discount = document.getElementById('discount').value;
            var selectedOption = document.getElementById('option').value;
            var isValid = true;
            var errorMessage = "";

            if (price === '' || price <= 0) {
                errorMessage += 'Please enter a valid price greater than 0.\n';
                isValid = false;
            }

            if (discount === '' || discount < 0) {
                errorMessage += 'Please enter a valid discount.\n';
                isValid = false;
            } else if (selectedOption === 'percentage' && (discount <= 0 || discount >= 100)) {
                errorMessage += 'Please enter a discount between 0 and 100 for percentage discount.\n';
                isValid = false;
            } else if (selectedOption === 'flat' && (discount <= 0 || discount >= price)) {
                errorMessage += 'Please enter a valid flat discount that is less than to the price.\n';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();


                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorMessage,

                });
            }
        }
    </script>
</body>

</html>