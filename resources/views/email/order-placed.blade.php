<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body style="font-family: 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; background-color: #f8f9fa; color: #343a40; padding: 20px;">

    <h1 style="color: #007bff;">Your Order Confirmation</h1>

    <p style="margin-top: 20px;">Thank you for your order! Your order details are as follows:</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #007bff; color: #ffffff;">
                <th style="padding: 12px; text-align: left;">Product</th>
                <th style="padding: 12px; text-align: left;">Quantity</th>
                <th style="padding: 12px; text-align: left;">Price</th>
                <th style="padding: 12px; text-align: left;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productsInfo as $product)
            <tr>
                <td style="padding: 12px;">{{ $product['name'] }}</td>
                <td style="padding: 12px;">{{ $product['quantity'] }}</td>
                <td style="padding: 12px;">${{ $product['price'] }}</td>
                <td style="padding: 12px;">${{ $product['total'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 20px; font-weight: bold; font-size: 18px;">Total Amount: ${{ $totalAmount }}</p>

    <p>Your order has been successfully placed. We will notify you once it's shipped. Thank you for shopping with us!</p>
</body>

</html>