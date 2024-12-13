



import axios from "axios";

import DOMPurify from "dompurify";

import { useState } from 'react'

import changeqQuantity from "./quantityButton";



export default function updateCart() { 



    const cartDrawer = $('#CartDrawer');

    var cartContent;

 

    const contentArea = document.querySelector('.cart-items__form');

    const color = document.querySelector('#id-jq-swatch-color-element-1-1')

    const productId = document.getElementById('productId') 

    const textRadio = document.getElementById('textRadio')

    const pictureRadio = document.getElementById('pictureRadio')

   var printType = "text"

    const printText = document.getElementById('print_text') 

    const printFont = document.getElementById('f')

    const blackColor = document.getElementById('sw-black')

    const orangeColor = document.getElementById('sw-orange')  

    const flowerType = document.getElementById('flower-type')

    const quantityBox = document.getElementById('quantityInput')

    



  

    textRadio.addEventListener('click', function() {

      printType = "text"

    })



    pictureRadio.addEventListener('click', function() {

      printType = "picture"

    })



    var colorBlacks = document.querySelectorAll('#sw-ink')

    var printColor;



              for (let z = 0; z < colorBlacks.length; z++) {

                            colorBlacks[z].addEventListener('click', function() {

                                printColor = colorBlacks[z].value;

                            })

                        }

    

            

//alert("AAA")
/*
    $(document).on('submit', 'form[action*="/car/add"]', async function (e){

 e.preventDefault();

  

   

  const link = `${window.location.origin}/car/add`; 

            await axios.post(link, {

              productId: productId.value,

            quantity: quantityBox.value,

            color: color.value,

            print_type: printType,

            flower_type: flowerType.value,

            print_text: printText.value,

            print_font: printFont.value,

             print_color: printColor,           

            }).then((response)=> {   

              cartContent = response.data.theHTML                         

                contentArea.innerHTML = DOMPurify.sanitize(

                response.data.theHTML

                );

                changeqQuantity()

              }) 






 $('.btn-progress').css('width', 0).show().animate(

{

 width: '99.5%',

 }, 700 ); 



 

 await $(document.body).addClass('cart-drawer--opened');

 $('.btn-progress').css('width', '100%').fadeOut();

 }); 




 const cartDrawer = $('#CartDrawer');

$('.icon--cart').click( function (){

 e.preventDefault();

//  contentArea.innerHTML = DOMPurify.sanitize( cartContent );

   $(document.body).addClass('cart-drawer--opened');

 });


*/
                        
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





