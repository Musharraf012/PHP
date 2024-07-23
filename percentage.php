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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
        }

        .form-group span {
            color: red;
        }

        h1 {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center">Discount Calculator</h2>
            <form action="" onsubmit="validateForm(event)">
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" name="number" placeholder="Enter price" id="price" value="<?php echo isset($_REQUEST['number']) ? htmlspecialchars($_REQUEST['number']) : ''; ?>">
                    <span>
                        <?php
                        if (isset($_REQUEST['form1'])) {
                            if (empty($price)) {
                                echo "Please enter price.";
                            } elseif ($price < 0) {
                                echo "Please enter a valid price.";
                            }
                        }
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="discount">Discount:</label>
                    <input type="number" class="form-control" name="discount" placeholder="Enter discount" id="discount" value="<?php echo isset($_REQUEST['discount']) ? htmlspecialchars($_REQUEST['discount']) : ''; ?>">
                    <span>
                        <?php
                        if (isset($_REQUEST['form1'])) {
                            if (empty($discount)) {
                                echo "Please enter discount.";
                            } elseif ($discount < 0) {
                                echo "Please enter a valid discount.";
                            }
                        }
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="option">Discount Type:</label>
                    <select name="option" id="option" class="form-control">
                        <option value="flat" <?php echo (isset($option) && $option == 'flat') ? 'selected' : ''; ?>>Flat</option>
                        <option value="percentage" <?php echo (isset($option) && $option == 'percentage') ? 'selected' : ''; ?>>Percentage</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="form1" value="sub">Calculate Amount</button>
            </form>
            <div id="result" class="mt-4">
                <div id="pri">
                    <h1>Price: <?php $price = (!empty($price) ? $price : '0');
                                echo $price ?></h1>
                </div>
                <div id="dis">
                    <h1>Discount: <?php $discount = (!empty($discount) ? $discount : '0');
                                    echo $discount ?></h1>
                </div>
                <div id="totalAmount">
                    <h1>Total Amount: <?php $totalAmount = (!empty($totalAmount) ? $totalAmount : '0');
                                        echo $totalAmount ?></h1>
                </div>
            </div>
        </div>
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
            } else if (selectedOption === 'flat' && (discount <= 0 || discount > price)) {
                errorMessage += 'Please enter a valid flat discount that is less than the price.\n';
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>