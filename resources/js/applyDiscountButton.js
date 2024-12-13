import Swal from 'sweetalert2'

export default function applyDiscount() {
  
   const applyButton = document.getElementById('applyDiscountButton')
   const codeBox = document.getElementById('discountCodeBox') 
   
  //edit type  
   
   applyButton.addEventListener('click', (e) => { 
    e.preventDefault();   
    const code = codeBox.value
   
    if (code != null) {
    const link = `${window.location.origin}/getDiscount`;    
    axios.post(link, {reductions: code, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => {  
      
          location.reload(true)     
    })
  }
     
  })

  const postalCodeBox = document.getElementById('postal-code')
  const stateBox = document.getElementById('state-box')
  const expressDelivery = document.getElementById('delivery-express')
  const standardDelivery = document.getElementById('delivery-standard')
  const pickupDelivery = document.getElementById('delivery-pickup')
  const shippingTotal = document.getElementById('shipping-total')
  const slink = `${window.location.origin}/getShippingCost`;
  const fullPriceBox = document.getElementById('full-price')
  const subTotalPriceBox = document.getElementById('sub-total-price')
  const subTotalPrice = parseFloat(subTotalPriceBox.textContent)
  
  const fullPrice = parseFloat(fullPriceBox.textContent)

  expressDelivery.addEventListener('click', function() {  
    var s = stateBox.value;
    var p = postalCodeBox.value;
    var d = "express"
   
    
    if(p.length >= 4) {
      axios.post(slink, {postalCode: p, state: s, delivery_strategies: d, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => { 
     if(response.data.toString().length > 0) {
          shippingTotal.textContent = '(Express Delivery) $' + response.data 
          fullPriceBox.textContent = subTotalPrice + parseFloat(response.data)
     } else {
       fullPriceBox.textContent = subTotalPrice
     }
    })
    } else {
      shippingTotal.textContent = 'ZIP Code is invalid'
      fullPriceBox.textContent = subTotalPrice
    }

      
  })

  standardDelivery.addEventListener('click', function() {    
    var s = stateBox.value;
    var p = postalCodeBox.value;
    var d = "standard"
   
    
    if(p.length >= 4) {
      axios.post(slink, {postalCode: p, state: s, delivery_strategies: d, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => { 
     if(response.data.toString().length > 0) {
          shippingTotal.textContent = '(Standard Delivery) $' + response.data 
        fullPriceBox.textContent = subTotalPrice + parseFloat(response.data)
     } else {
       fullPriceBox.textContent = subTotalPrice
     }
    })
    } else {
      shippingTotal.textContent = 'ZIP Code is invalid'
      fullPriceBox.textContent = subTotalPrice
    }
  })

  pickupDelivery.addEventListener('click', function() {       
    shippingTotal.textContent = '0'
    fullPriceBox.textContent = subTotalPrice
  })

  stateBox.addEventListener('change', function() {   
    var s = stateBox.value;
    var p = postalCodeBox.value;
    var d = expressDelivery.checked ? 'Express' : standardDelivery.checked ? 'Standard' : null;
   
    
    if(p.length >= 4) {
      axios.post(slink, {postalCode: p, state: s, delivery_strategies: d, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => { 
     if(response.data.toString().length > 0) {
          shippingTotal.textContent = `(${d}. Delivery) $` + response.data 
         fullPriceBox.textContent = subTotalPrice + parseFloat(response.data)
     } else {
       fullPriceBox.textContent = subTotalPrice
     }
    })
    } else {
      shippingTotal.textContent = 'ZIP Code is invalid'
      fullPriceBox.textContent = subTotalPrice
    }    
    
  })

  postalCodeBox.addEventListener('input', function() {       
    var s = stateBox.value;
    var p = postalCodeBox.value;
    var d = expressDelivery.checked ? 'Express' : standardDelivery.checked ? 'Standard' : null;
   
    
    if(p.length >= 4) {
      axios.post(slink, {postalCode: p, state: s, delivery_strategies: d, headers: 
      { 'Content-Type': 'application/json' }
     } ). then ((response) => { 
     
      if(response.data.toString().length > 0) {
        shippingTotal.textContent = `(${d}. Delivery) $` + response.data 
          fullPriceBox.textContent = subTotalPrice + parseFloat(response.data)
      } else {
        fullPriceBox.textContent = subTotalPrice
      }
    })
    } else {
      shippingTotal.textContent = 'ZIP Code is invalid'
      fullPriceBox.textContent = subTotalPrice
    } 
  })



  
}