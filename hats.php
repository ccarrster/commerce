<DOCTYPE=html>
	<?php
	$client_id = "Ac7kJUsRgghmbrBX78TrJy5JNeqGMSXkuayCVJ5r-djNvqjfQ-TOyZlb85g7ggvk5r7JWxu66X6PBSOK";
	$secret = "EHW3ifQaf_09uEAj1yZ2-MskpsmazDBd-2CqDmWd933nQ5P4Y2_BVCOi3a19Ge1ocgK8LyltrZkPwpOU";

	$s = curl_init();
	$url = "https://api-m.sandbox.paypal.com/v1/oauth2/token";
	$data = "grant_type=client_credentials";
	curl_setopt($s,CURLOPT_URL,$url);
	curl_setopt($s,CURLOPT_HTTPHEADER,array('Accept: application/json', 'Accept-Language: en_US'));
	curl_setopt($s, CURLOPT_USERPWD, "$client_id:$secret");
	curl_setopt($s, CURLOPT_POSTFIELDS, $data);
	curl_setopt($s, CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_exec($s);
	//var_dump($return);
	curl_close($s);
	?>
<html>
	<head>
		<title>Cedar Row</title>
		<script src="https://www.paypal.com/sdk/js?client-id=<?php echo($client_id); ?>&currency=CAD"></script>
	</head>
	<body>
		<h1>Cedar Row</h1>
		<div id="paypal-button-container"></div>
		<script>
			paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '12.22'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
			// This function displays Smart Payment Buttons on your web page.
		</script>
	</body>
</html>
