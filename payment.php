<?php
$errors = array(); // Initialize an empty array to store any validation errors

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Check if the card number field is empty
	if (empty($_POST['card_number'])) {
		$errors[] = 'Please enter your card number';
	} else {
		$card_number = trim($_POST['card_number']);
		// Check if the card number contains only digits
		if (!ctype_digit($card_number)) {
			$errors[] = 'Card number should contain only digits';
		} else {
			// Check if the card number is valid using the Luhn algorithm
			if (!luhn_check($card_number)) {
				$errors[] = 'Invalid card number';
			}
		}
	}

	// Check if the expiration date field is empty
	if (empty($_POST['expiration_date'])) {
		$errors[] = 'Please enter your expiration date';
	} else {
		$expiration_date = trim($_POST['expiration_date']);
		// Check if the expiration date is in the correct format (MM/YY)
		if (!preg_match('/^\d{2}\/\d{2}$/', $expiration_date)) {
			$errors[] = 'Expiration date should be in the format MM/YY';
		}
	}

	// Check if the CVV field is empty
	if (empty($_POST['cvv'])) {
		$errors[] = 'Please enter your CVV';
	} else {
		$cvv = trim($_POST['cvv']);
		 // Check if the CVV contains only digits
		if (!ctype_digit($cvv)) {
			$errors[] = 'CVV should contain only digits';
		}
	}

	// Check if the name on card field is empty
	if (empty($_POST['name_on_card'])) {
		$errors[] = 'Please enter your name on card';
	}

	// Check if the billing address field is empty
	if (empty($_POST['billing_address'])) {
		$errors[] = 'Please enter your billing address';
	}

	// Check if the amount field is empty
	if (empty($_POST['amount'])) {
		$errors[] = 'Please enter the amount';
	} else {
		$amount = trim($_POST['amount']);
		 // Check if the amount contains only digits and a dot (for decimal point)
		if (!preg_match('/^\d+(\.\d{1,2})?$/', $amount)) {
			$errors[] = 'Amount should be a valid number';
		}
	}
}

// Function to check if a credit card number is valid using the Luhn algorithm
function luhn_check($number) {
	$number = str_replace(' ', '', $number); // Remove spaces from the number
	$sum = 0;
	for ($i = 0; $i < strlen($number); $i++) {
		$digit = (int)$number[$i];
		if (($i % 2) == 0) {
			$digit *= 2;
			if ($digit > 9) {
				$digit -= 9;
			}
		}
		$sum += $digit;
	}
	return (($sum % 10) == 0);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Form</title>
	<!-- Import Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<!-- Import Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Import Materialize CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Set the viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="./css/p_style.css">
</head>
<body>
	<div class="container">
		<h2 class="center-align">Payment Form</h2>
		<form>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">credit_card</i>
					<input id="card_number" type="text" class="validate">
					<label for="card_number">Card Number</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<i class="material-icons prefix">event</i>
					<input id="expiration_date" type="text" class="validate">
					<label for="expiration_date">Expiration Date</label>
				</div>
				<div class="input-field col s6">
					<i class="material-icons prefix">lock</i>
					<input id="cvv" type="text" class="validate">
					<label for="cvv">CVV</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
					<input id="name_on_card" type="text" class="validate">
					<label for="name_on_card">Name on Card</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">location_on</i>
					<input id="billing_address" type="text" class="validate">
					<label for="billing_address">Billing Address</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">attach_money</i>
					<input id="amount" type="text" class="validate">
					<label for="amount">Amount</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
					    <i class="material-icons right">send</i>
					</button>
				</div>
			</div>
		</form>
	</div>
	<!-- Import jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Import Materialize JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
<script>
    // Get the form element
    const form = document.querySelector('form');

    // Add an event listener to the form on submit
    form.addEventListener('submit', function(event) {
        // Get the input values
        const cardNumber = document.querySelector('#card_number').value;
        const expirationDate = document.querySelector('#expiration_date').value;
        const cvv = document.querySelector('#cvv').value;
        const nameOnCard = document.querySelector('#name_on_card').value;
        const billingAddress = document.querySelector('#billing_address').value;
        const amount = document.querySelector('#amount').value;

        // Define regular expressions for validation
        const cardNumberRegex = /^[0-9]{16}$/;
        const expirationDateRegex = /^(0[1-9]|1[0-2])\/[0-9]{2}$/;
        const cvvRegex = /^[0-9]{3}$/;
        const nameOnCardRegex = /^[a-zA-Z\s]+$/;
        const billingAddressRegex = /^[a-zA-Z0-9\s,'-]*$/;
        const amountRegex = /^[0-9]+(\.[0-9]{1,2})?$/;

        // Validate card number
        if (!cardNumberRegex.test(cardNumber)) {
            alert('Please enter a valid card number.');
            event.preventDefault();
            return;
        }

        // Validate expiration date
        if (!expirationDateRegex.test(expirationDate)) {
            alert('Please enter a valid expiration date in the format MM/YY.');
            event.preventDefault();
            return;
        }

        // Validate CVV
        if (!cvvRegex.test(cvv)) {
            alert('Please enter a valid CVV.');
            event.preventDefault();
            return;
        }

        // Validate name on card
        if (!nameOnCardRegex.test(nameOnCard)) {
            alert('Please enter a valid name on card.');
            event.preventDefault();
            return;
        }

        // Validate billing address
        if (!billingAddressRegex.test(billingAddress)) {
            alert('Please enter a valid billing address.');
            event.preventDefault();
            return;
        }

        // Validate amount
        if (!amountRegex.test(amount)) {
            alert('Please enter a valid amount.');
            event.preventDefault();
            return;
        }
    });
</script>

</html>