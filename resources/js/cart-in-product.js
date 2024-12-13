

import axios from "axios";
import DOMPurify from "dompurify";
import { useState } from 'react'
import changeqQuantity from "./quantityButton";

export default function openCartInProduct() { 
 
 
  $('.icon--cart').click(async function (e){
 e.preventDefault();
//  contentArea.innerHTML = DOMPurify.sanitize( cartContent );
  await $(document.body).addClass('cart-drawer--opened');
 });

 cartDrawer.on('click', '.cart-items__item-remove', async function (e){
  const removeButton = $(e.target).closest('.cart-items__line-item');
  const sku = removeButton.data('key')
  const link = `${window.location.origin}/cart/remove/${sku}`; 
            await axios.post(link, {}).then((response)=> {   
              cartContent = response.data.theHTML                         
                contentArea.innerHTML = DOMPurify.sanitize(
                response.data.theHTML
                );
              }) 

 });
 
}


