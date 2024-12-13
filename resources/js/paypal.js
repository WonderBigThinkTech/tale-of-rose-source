import { loadScript } from '@paypal/paypal-js'



export default async function handlePaypal() { 
  
  let paypal;

try {
    paypal = await loadScript({ 
      clientId: "ARO6TJJX75lGwWjEu9by8DCumab-Y0DTZ09V3AA3QkpZwIHCuJGU71veCZZvIJ8jjLZlr5Rb_l7mz6wt",
      currency: "USD",
      components: "buttons"      
    });
} catch (error) {
    console.error("failed to load the PayPal JS SDK script", error);
}



if (paypal) {
    try {
        await paypal.Buttons({
          style: {
                layout: 'horizontal',
                disableMaxWidth: true,
                color: 'gold',
                shape: 'rect',
                label: 'paypal', 
                height: 55           
            },

            createOrder: async function(data, actions) {
                return await axios.post('/cart/checkout/api', [])
                .then((response) => {
                   const orderData = response.data                  
                    return actions.order.create({
          purchase_units: [{
            "amount": {
              "currency_code": orderData.purchase_units.currency_code,
              "value": orderData.purchase_units.amount.value
            }
          }]
        })
                })
            },

            onApprove: function(data, actions) {  
              console.log(data)            
                return axios.post('/demo/checkout/api/' + data.orderID + '/capture/', [])
                .then(function(res) {
                    return res.data;
                }).then(function(orderData) {
                    // Three cases to handle:
                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                    //   (2) Other non-recoverable errors -> Show a failure message
                    //   (3) Successful transaction -> Show confirmation or thank you

                    // This example reads a v2/checkout/orders capture response, propagated from the server
                    // You could use a different API or structure for your 'orderData'
                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        return actions.restart(); // Recoverable state, per:
                        // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                    }

                    if (errorDetail) {
                        var msg = 'Sorry, your transaction could not be processed.';
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                        return alert(
                            msg
                        ); // Show a failure message (try to avoid alerts in production environments)
                    }

                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ': ' + transaction.id +
                        '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            },

        }).render("#paypalnj");       
    } catch (error) {
        console.error("failed to render the PayPal Buttons", error);
    }
}
 
}