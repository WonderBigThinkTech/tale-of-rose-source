 <aside>
     <div id="shopify-section-cart-drawer" class="shopify-section cart-drawer"><!-- sections/cart-drawer -->
         <style>
             #shopify-section-cart-drawer .cart-drawer__header {
                 background-color: #000000;
             }

             #shopify-section-cart-drawer .cart-drawer__title,
             #shopify-section-cart-drawer .cart-drawer__box:not(.cart-drawer--empty) .cart-drawer__title:before {
                 color: #ffffff;
             }

             #shopify-section-cart-drawer .cart-drawer__box {
                 background: #ffffff;
                 color: #444444;
             }

             #shopify-section-cart-drawer .cart-items__item-title {
                 color: #171520;
             }

             #shopify-section-cart-drawer .cart__proceed-to-checkout {
                 background-color: #00c371;
                 color: #ffffff;
             }

             #shopify-section-cart-drawer .cart__proceed-to-checkout svg {
                 stroke: #ffffff;
             }

             #shopify-section-cart-drawer .cart__proceed-to-checkout:hover {
                 background-color: #00c371;
                 color: #ffffff;
             }

             #shopify-section-cart-drawer.cart__proceed-to-checkout:hover svg {
                 stroke: #ffffff;
             }

             #shopify-section-cart-drawer .cart__total-price,
             #shopify-section-cart-drawer .cart-items__item-price {
                 color: #d10000;
             }

             #shopify-section-cart-drawer .cart-drawer__shipping-fill {
                 background-color: #bac7df;
             }

             #shopify-section-cart-drawer .cart-drawer__shipping-text {
                 color: #999999;
                 text-transform: capitalize;
             }

             #shopify-section-cart-drawer .shipping-bar__discount-value {
                 background: rgba(0, 0, 0, 0);
                 color: #999999;
             }

             #shopify-section-cart-drawer .cart-items__item-variant {
                 color: #656565
             }

             #shopify-section-cart-drawer .cart-drawer__continue-shipping,
             #shopify-section-cart-drawer .cart-drawer__button-link {
                 color: #000000;
             }

             #shopify-section-cart-drawer .cart-drawer__button-link {
                 border-color: #000000;
             }

             #shopify-section-cart-drawer .cart-drawer__button-link:hover {
                 background-color: #000000;
                 color: #fff;
             }

             #shopify-section-cart-drawer .cart-drawer__box .drawer-review_single {
                 font-weight: 400;
             }

             #shopify-section-cart-drawer .cart-drawer__review-content {
                 font-weight: 400;
             }
         </style>
         <style>
             .cart-drawer__title-shipping-bar {
                 display: flex;
                 align-items: center;
                 justify-content: center;
                 width: 200px;
                 margin: 9px auto 10px;
                 border: solid 1px #ededef;
                 padding: 8px 0px;
                 font-size: 14px;
                 font-weight: 400;
                 line-height: 16px;
                 color: #252525;
                 text-align: center;
                 border-radius: 8px;
                 box-shadow: 0px 4px 6px -2px #EAECF0, 0px 12px 16px -4px #10182814;
             }

             .cart-drawer__overlay,
             .cart-drawer__box {
                 transition: ease 0.3s all;
                 position: fixed;
                 z-index: 100;
                 height: 100%;
                 top: 0;
             }

             .cart-drawer__overlay {
                 width: 100%;
                 left: 0;
                 background-color: rgba(0, 0, 0, 0.8);
                 justify-content: flex-end;
                 opacity: 0;
                 visibility: hidden;
             }

             .cart-drawer__box-content {
                 padding: 0 46px 15px;
             }

             .cart-drawer__box {
                 right: -100%;
                 background-color: #fff;
                 width: 90%;
                 max-width: 538px;
                 overflow: auto;
             }

             body.cart-drawer--opened {
                 overflow: hidden;
             }

             body.cart-drawer--opened .cart-drawer__overlay {
                 opacity: 1;
                 visibility: visible;
             }

             body.cart-drawer--opened .cart-drawer__box {
                 right: 0;
             }

             .cart-drawer__header {
                 padding: 7px 0 7px 17px;
                 text-align: center;
                 margin-bottom: 9px;
                 letter-spacing: 0px;
                 display: flex;
                 justify-content: center;
                 align-items: center;
             }

             .cart-drawer__title {
                 display: inline;
                 font-size: 14px;
                 font-weight: normal;
                 position: relative;
             }

             .cart-drawer__box:not(.cart-drawer--empty) .cart-drawer__title:before {
                 content: 'L';
                 width: 20px;
                 height: 20px;
                 position: absolute;
                 left: 140px;
                 transform: translatex(-110%) scaleX(-1) rotate(-40deg);
                 font-size: 16px;
                 top: -2px;
             }

             .cart-drawer__shipping {
                 margin-bottom: 7px;
                 font-size: 0.9rem;
             }

             .cart-drawer__shipping-bar {
                 position: relative;
                 width: 100%;
                 height: 30px;
                 border-radius: 30px;
                 align-items: center;
                 justify-content: center;
                 background-color: #EAECF0;
             }

             .cart-drawer__shipping-fill {
                 height: 100%;
                 border-radius: 30px;
                 position: absolute;
                 left: 1px;
                 top: 0;
                 transition: ease-in 0.4s all;
                 pointer-events: none;
             }

             .cart-drawer__shipping-text {
                 text-align: center;
                 margin-bottom: 3px;
                 line-height: 18px;
                 font-size: 14px;
                 font-weight: 400;
             }

             .cart-drawer__shipping-text .shipping-bar__discount-value {
                 margin: 0 3px;
                 font-weight: 400;
                 font-size: 12px;
                 line-height: 18px;
             }

             .cart-drawer__links {
                 justify-content: center;
                 align-items: center;
                 margin: 29px 0 5px;
                 font-size: 14px;
                 line-height: 24px;
                 font-weight: 700;
             }

             .cart-drawer__paypal+.cart-drawer__links {
                 margin: 30px 0 7px;
             }

             .cart-drawer__links.cart-drawer__links--sb {
                 justify-content: space-between;
             }

             .cart-drawer__continue-shipping {
                 text-decoration: underline;
                 font-size: inherit;
             }

             .cart-drawer__button-link {
                 padding: 7px 7px 6px;
                 border-width: 1px;
                 border-style: solid;
                 line-height: 1;
             }

             .cart-items__list,
             .cart-items__item-variant,
             .cart-items__item-price,
             .cart-items__item-discount,
             .cart__empty,
             .cart-drawer__review-title,
             .cart-drawer__review-subtitle,
             .cart-drawer__review-content,
             .cart-drawer__badge-title {
                 display: block;
             }

             .cart-items__item-price {
                 font-size: 16px;
                 font-weight: 500;
                 line-height: 1.1;
             }

             .cart-items__item-discount {
                 font-size: 0.85em;
                 margin-bottom: 5px;
             }

             .cart-drawert__items {
                 width: 100%;
                 list-style: none;
             }

             .cart-items__item-info-wrapper {
                 width: 100%;
                 flex: 1;
                 justify-content: space-between;
             }

             .cart-items__item-info-wrapper,
             .cart-items__line-item,
             .cart-items__item-quantity-wrapper,
             .cart-drawer__paypal,
             .cart__proceed-to-checkout,
             .cart-drawer__badges-list,
             .cart-drawer__overlay,
             .cart-drawer__shipping-bar,
             .cart-drawer__links,
             .cart-drawer__review-item {
                 display: flex;
             }

             .cart-items__line-item {
                 padding: 16px 0 23px;
                 gap: 38px;
             }

             .cart-drawer__title:before,
             .cart-drawer__button-link {
                 display: inline-block;
             }

             .cart-items__item-image-wrapper {
                 width: 100px;
                 height: 100px;
                 overflow: hidden;
                 flex-shrink: 0;
             }

             .cart-items__item-image-wrapper svg,
             img.cart-items__item-image {
                 width: 100%;
                 height: 100%;
                 object-fit: contain;
             }

             .cart-items__item-title {
                 line-height: 20px;
                 font-size: 16px;
                 margin-bottom: 8px;
             }

             .cart-items__item-link {
                 color: inherit;
                 font-weight: 500;
                 font-size: 16px;
             }

             .cart-items__item-variant {
                 font-size: 1rem;
                 margin-bottom: 7.5px;
                 font-weight: 500;
             }

             .cart-items__item-result {
                 display: flex;
                 text-align: right;
                 flex-direction: column-reverse;
                 justify-content: space-between;
                 align-items: flex-end;
                 margin-right: 1px;
             }

             .cart-items__item-quantity-wrapper {
                 width: 71px;
                 height: 30px;
                 overflow: hidden;
                 margin-right: 1px;
                 border: 1px solid #252525;
                 border-radius: 4px;
                 display: flex;
                 align-items: center;
             }

             .cart-items__item-minus,
             .cart-items__item-quantity,
             .cart-items__item-plus,
             .cart__total-price-wrapper {
                 text-align: center;
             }

             .cart__total-price {
                 margin-right: 6px;
                 font-size: 20px;
                 font-weight: 500;
             }

             .cart-items__outstock-tooltip {
                 display: none;
                 text-align: center;
                 justify-content: center;
                 margin-top: 4px;
                 width: 100%;
                 color: red;
                 font-size: 14px;
             }

             .cart-items__item-minus,
             .cart-items__item-plus,
             .cart-items__item-quantity {
                 border: none;
                 background: transparent;
             }

             .cart-items__item-minus,
             .cart-items__item-plus {
                 flex: 0 0 32%;
                 height: 100%;
                 line-height: 0.5rem;
                 font-size: 1rem;
             }

             .cart-items__item-minus[disabled],
             .cart-items__item-plus[disabled] {
                 background: #eee;
                 color: #aaa;
                 cursor: not-allowed;
             }

             .cart-items__item-quantity {
                 width: 36%;
                 border-left: none;
                 border-right: none;
             }

             .cart-items__item-remove {
                 font-size: 13.8px;
                 display: inline-flex;
                 align-items: center;
                 justify-content: flex-end;
                 margin-bottom: 8px;
             }

             .cart-items__remove-text {
                 text-decoration: underline;
                 color: #414141;
                 font-weight: 400;
             }

             .cart-items__item-details {
                 width: 85%;
                 display: flex;
                 flex-direction: column;
                 justify-content: flex-start;
                 gap: 6px;
                 margin-top: 1px;
             }

             .cart__total-price-wrapper strong {
                 text-align: left;
                 margin-left: 6px;
                 font-size: 19px;
                 letter-spacing: 0;
             }

             .cart__total-price-wrapper {
                 margin: 21px 0 15px;
                 width: 100%;
                 font-size: 20px;
                 display: flex;
                 justify-content: space-between;
                 align-items: center;
             }

             .cart-items__form,
             .cart__proceed-to-checkout {
                 width: 100%;
             }

             .cart__proceed-to-checkout {
                 align-items: center;
                 justify-content: center;
                 height: 49px;
                 gap: 3px;
                 font-size: 16px;
                 padding: 10px 0;
                 line-height: 1;
                 letter-spacing: 0.1px;
             }

             .cart__proceed-to-checkout.cart__proceed-to-checkout--top {
                 margin: 15px 0;
             }

             .cart__proceed-to-checkout svg {
                 height: 20px;
                 width: 24px;
                 padding-bottom: 1px;
                 padding-right: 6px;
             }

             .cart__item-count {
                 padding-left: 2px;
                 letter-spacing: 0.2px;
                 font-size: 15.8px;
             }

             .cart__proceed-to-checkout-arrow {
                 padding-right: 5px;
                 padding-bottom: 2px;
                 padding-left: 4px;
                 font-size: 10px;
             }

             .cart-drawer__coupon {
                 text-align: center;
                 margin: 7px 0 0;
                 font-size: 16px;
             }

             .cart-drawer__badges-list {
                 margin-top: 8px;
                 flex-wrap: wrap;
                 justify-content: space-between;
             }

             .cart-drawer__badge-wrapper {
                 display: flex;
                 align-items: center;
                 justify-content: flex-start;
                 flex-direction: column;
                 gap: 0;
             }

             .cart-drawer__badges-list--s2 .cart-drawer__badge-wrapper {
                 width: 49%;
             }

             .cart-drawer__badges-list--s3 .cart-drawer__badge-wrapper {
                 width: 32%;
             }

             .cart-drawer__badges-list--s4 .cart-drawer__badge-wrapper {
                 width: 22.1%;
             }

             .cart-drawer__badges-list--s5 .cart-drawer__badge-wrapper {
                 width: 18.4%;
             }

             .cart-drawer__badges-list--s6 .cart-drawer__badge-wrapper {
                 width: 15%;
             }

             .cart-drawer__badge-wrapper svg,
             .cart-drawer__badge-wrapper img {
                 width: 62%;
             }

             .cart-drawer__badge-title {
                 width: 100%;
                 font-size: 12px;
                 letter-spacing: 0.3px;
                 text-align: center;
             }

             .cart-drawer__paypal {
                 align-items: center;
                 flex-direction: column;
                 width: 100%;
                 margin-top: 4px;
             }

             .cart-drawer .cart-drawer__paypal svg {
                 width: 171px;
                 height: auto;
                 max-height: 79px;
             }

             .cart-drawer__reviews-title {
                 text-align: center;
                 font-size: 20px;
                 margin-bottom: 8px;
             }

             .cart-drawer__review-content-wrapper {
                 display: flex;
                 flex-direction: column;
                 gap: 3px;
             }

             .cart-drawer__review-date {
                 color: #626262;
                 font-size: 12px;
                 letter-spacing: 0px;
                 font-weight: 500;
             }

             .cart-drawer__review-stars {
                 display: flex;
                 align-items: center;
                 margin-bottom: 1px;
                 margin-top: 1px;
             }

             .cart-drawer__review-stars svg {
                 width: 23.2px;
                 height: auto;
             }

             .cart-drawer__review-stars svg path {
                 fill: #FF9900;
             }

             .cart-reviews__reviews-stars-text {
                 color: #C9C9C9;
                 font-size: 16px;
                 margin-left: 5px;
                 text-transform: capitalize;
                 margin-top: 4px;
             }

             .cart-drawer__review-headline {
                 font-size: 14px;
                 font-weight: 500;
                 line-height: 16px;
                 color: #000;
                 margin-top: 3px;
             }

             .cart-drawer__review-item:not(:last-of-type) {
                 margin-bottom: 26px;
             }

             .cart-drawer__review-image-wrapper {
                 margin-right: 10px;
                 flex: 0 0 50px;
             }

             .cart-drawer__review-image {
                 width: 100%;
             }

             .cart-drawer__review-title {
                 font-weight: bold;
             }

             .cart-drawer__review-subtitle {
                 font-size: 0.8rem;
                 color: #f00;
             }

             .cart-drawer__review-content {
                 font-size: 14px;
                 color: #000;
                 line-height: 1.2;
                 margin-top: 4px;
             }

             .cart-drawer__review-content p {
                 font-size: inherit;
             }

             .cart-drawer__review-content p strong {
                 float: left;
                 line-height: 16px;
                 font-weight: 500;
             }

             .cart-drawer__review-content p span {
                 letter-spacing: 0.17px;
                 display: block;
                 line-height: 15.9px;
             }

             .cart__empty {
                 margin: 30px auto 10px;
                 text-align: center;
             }

             .cart__empty-message {
                 font-size: 18px;
             }

             .cart-drawer__upsell-alert {
                 display: none;
                 color: red;
                 margin-top: 10px;
                 font-size: 14px;
             }

             .cart-drawer__upsell-atc-price[disabled] {
                 background-color: #eee;
                 color: #656565;
                 border: 1px solid #656565;
             }

             .cart-drawer__upsell-atc--mask {
                 display: none;
                 position: absolute;
                 top: 0px;
                 right: 0px;
                 bottom: 0px;
                 left: 0px;
             }

             .cart-drawer__upsell-atc-price[disabled]+.cart-drawer__upsell-atc--mask {
                 display: block;
             }

             @media (min-width: 1441px) {
                 .cart-drawer__box {
                     width: 555px;
                     max-width: 555px;
                 }
             }

             @media (max-width: 1019px) {
                 .cart-drawer__box-content {
                     padding: 0 42px 15px;
                 }

                 .cart-drawer__box {
                     max-width: 491px;
                 }

                 .cart-drawer__header {
                     padding: 0;
                     height: 32px;
                     margin-bottom: 10px;
                 }

                 .cart-drawer__title {
                     font-size: 12.78px;
                     padding-left: 15.6px;
                 }

                 .cart-drawer__box:not(.cart-drawer--empty) .cart-drawer__title:before {
                     font-size: 13px;
                     left: 143px;
                 }

                 .cart-drawer__title-shipping-bar {
                     width: 200px;
                     height: 31.6px;
                     font-size: 10.952px;
                     margin: 9px auto 9.7px;
                     padding: 6.3px 0px;
                     line-height: 1;
                 }

                 .cart-drawer__shipping {
                     margin-bottom: 5px;
                 }

                 .cart-drawer__shipping-bar {
                     height: 27.379px;
                 }

                 .cart-drawer__shipping-text {
                     font-size: 10.952px;
                     line-height: 16.428px;
                     margin-bottom: 3px;
                     padding-top: 1px;
                 }

                 .cart-drawer__shipping-text .shipping-bar__discount-value {
                     margin: 0px 3px;
                     font-weight: 400;
                     font-size: 10.952px;
                     line-height: 16.428px;
                 }

                 .cart-items__line-item {
                     gap: 33.7px;
                     padding: 13.5px 0;
                     margin-left: 0px;
                 }

                 .cart-items__line-item:not(:last-child) {
                     margin-bottom: 2px;
                 }

                 .cart-items__item-image-wrapper {
                     width: 100px;
                     height: 100px;
                 }

                 .cart-items__item-details {
                     width: 75%;
                     display: flex;
                     flex-direction: column;
                     justify-content: flex-start;
                     margin-top: 0px;
                 }

                 .cart-items__item-title {
                     margin-bottom: 8px;
                     line-height: 1;
                 }

                 .cart-items__item-link {
                     color: inherit;
                     font-weight: 500;
                     font-size: 14px;
                     letter-spacing: 0px;
                     line-height: 18.21px;
                 }

                 .cart-items__item-variant {
                     font-size: 14px;
                     margin-bottom: 8.3px;
                     letter-spacing: 0px;
                 }

                 .cart-items__item-result .cart-items__item-result,
                 .cart-items__item-quantity-wrapper {
                     width: 64.09px;
                     height: 27.315px;
                 }

                 .cart-items__item-result {
                     margin-right: 0px;
                 }

                 .cart-items__item-quantity {
                     font-size: 12.804px;
                 }

                 .cart-items__item-minus,
                 .cart-items__item-plus {
                     display: flex;
                     width: 21.951px;
                     height: 100%;
                     justify-content: center;
                     align-items: center;
                 }

                 .cart-items__item-remove {
                     font-size: 12px;
                     width: 60.518px;
                     height: 15.479px;
                     margin-bottom: 9px;
                 }

                 .cart-items__item-price {
                     font-size: 14px;
                     font-weight: 500;
                     line-height: 15px;
                     letter-spacing: 0px;
                     margin-left: 1px;
                 }

                 .cart__total-price-wrapper {
                     margin: 35px 0 23.8px;
                     font-size: 18px;
                     line-height: 22.5px;
                 }

                 .cart__total-price-wrapper strong {
                     text-align: left;
                     margin-left: 5px;
                     font-size: 17px;
                     line-height: 22.5px;
                     padding-top: 0;
                     letter-spacing: 0.4px
                 }

                 .cart__total-price {
                     margin-right: 5px;
                     font-size: 18px;
                     line-height: 22.5px;
                     padding-top: 0px;
                 }

                 .cart__proceed-to-checkout {
                     height: 44.719px;
                     font-size: 14.602px;
                     letter-spacing: 0.1px;
                     padding-right: 0px;
                     line-height: 1.1;
                 }

                 .cart__proceed-to-checkout svg {
                     height: 18px;
                     width: 25px;
                     padding-right: 3px;
                 }

                 .cart__item-count {
                     padding-left: 1px;
                     letter-spacing: 0.1px;
                     padding-bottom: 0px;
                     font-size: 14.602px;
                 }

                 .cart__proceed-to-checkout-arrow {
                     padding-right: 6.5px;
                     padding-bottom: 4px;
                 }

                 .cart-drawer__links {
                     font-size: 12.777px;
                     margin: 28px 0 10px;
                     line-height: 21.903px;
                 }

                 .cart-drawer__badges-list {
                     width: 100%;
                     margin: 22px auto 0;
                 }

                 .cart-drawer__badges-list--s4 .cart-drawer__badge-wrapper {
                     width: 20.5%;
                 }

                 .cart-drawer__badge-wrapper svg,
                 .cart-drawer__badge-wrapper img {
                     width: 72%;
                     height: 100%;
                 }

                 .cart-drawer__badge-wrapper {
                     gap: 6px;
                 }

                 .cart-drawer__badge-title {
                     font-size: 10px;
                 }

                 .cart-drawer__paypal {
                     margin-top: 5px;
                 }

                 .cart-drawer .cart-drawer__paypal svg {
                     width: 157px;
                 }

                 .cart-drawer__review-date {
                     font-size: 10.996px;
                     line-height: 14.661px;
                     padding-left: 0px;
                     margin-top: 8px;
                 }

                 .cart-drawer__review-stars {}

                 .cart-drawer__review-stars svg {
                     width: 21.15px;
                 }

                 .cart-reviews__reviews-stars-text {
                     font-size: 14.661px;
                     margin: 1.5px 5px;
                     letter-spacing: 0px;
                 }

                 .cart-drawer__review-content-wrapper {
                     gap: 4px;
                 }

                 .cart-drawer__review-headline {
                     font-size: 12.828px;
                     margin-top: 2px;
                     line-height: 14.661px;
                 }

                 .cart-drawer__review-content {
                     font-size: 13px;
                     margin-top: 1px;
                 }

                 .cart-drawer__review-content p strong {
                     margin-left: 0;
                     font-size: 12.828px;
                     line-height: 1.2;
                 }

                 .cart-drawer__review-content p span {
                     font-size: 12.828px;
                     letter-spacing: 0.16px;
                     line-height: 14.761px;
                 }

                 .cart-drawer__review-item:not(:last-of-type) {
                     margin-bottom: 14.5px;
                 }

                 .cart-drawer__reviews {
                     margin: 0 auto 20px;
                 }
             }

             @media(max-width: 767px) {
                 .cart-drawer__box {
                     max-width: 350px;
                     width: 95%;
                 }

                 .cart-drawer__box-content {
                     padding: 0 30px 15px;
                 }

                 .cart-drawer__header {
                     padding: 2px 0;
                     margin-bottom: 0;
                     height: 30px;
                 }

                 .cart-drawer__title-shipping-bar {
                     width: 179px;
                     height: 22.4px;
                     padding: 0px;
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     border-radius: 5px;
                     margin: 10px auto;
                     line-height: 1;
                 }

                 .cart-drawer__title-shipping-bar,
                 .cart-drawer__shipping-text .shipping-bar__discount-value {
                     font-size: 12px;
                 }

                 .cart-drawer__title {
                     font-size: 12px;
                     padding-left: 12px;
                 }

                 .cart-drawer__shipping-bar {
                     margin: 0 auto;
                     height: 19.494px;
                 }

                 .cart-drawer__shipping {
                     margin-bottom: 1px;
                 }

                 .cart-drawer__shipping-text {
                     margin-bottom: 8px;
                     font-size: 12px;
                 }

                 .cart-items__line-item {
                     padding: 10px 0;
                     gap: 24.2px;
                     margin-left: 0;
                 }

                 .cart-items__line-item:not(:last-child) {
                     margin-bottom: 6px;
                 }

                 .cart-items__item-details {
                     margin-top: 1px;
                     width: 75%;
                 }

                 .cart-items__item-image-wrapper {
                     width: 70px;
                     height: 70px;
                 }

                 .cart-items__item-title {
                     line-height: 12.966px;
                     margin-bottom: 4px;
                     font-size: 10px;
                 }

                 .cart-items__item-link {
                     font-size: 14px;
                     letter-spacing: 0px;
                     line-height: 1
                 }

                 .cart-items__item-variant {
                     font-size: 10px;
                     margin-bottom: 5.4px;
                 }

                 .cart-items__item-quantity-wrapper {
                     height: 19.45px;
                     width: 46.789px;
                     border-radius: 3px;
                 }

                 .cart-items__item-minus,
                 .cart-items__item-plus {
                     flex: 0 0 32%;
                 }

                 .cart-items__item-minus svg,
                 .cart-items__item-plus svg {
                     width: 100%;
                     height: 100%;
                 }

                 .cart-items__item-quantity {
                     font-size: 14px;
                 }

                 .cart-items__item-price,
                 .cart-items__remove-text {
                     font-size: 10px;
                 }

                 .cart-items__item-price {
                     margin-top: 0px;
                     line-height: 12.966px;
                     margin-right: 0.4px;
                     letter-spacing: 0px;
                     font-size: 14px;
                 }

                 .cart-items__item-remove {
                     width: unset;
                     padding: 0;
                     margin-bottom: 3px;
                 }

                 .cart__total-price-wrapper {
                     margin: 28px 0 21.4px;
                 }

                 .cart__total-price-wrapper strong,
                 .cart__total-price {
                     font-size: 12.816px;
                     line-height: 16.02px;
                     padding-top: 0px;
                 }

                 .cart__total-price-wrapper strong {
                     margin-left: 3.8px;
                     letter-spacing: -0.2px;
                 }

                 .cart__total-price {
                     margin-right: 3.8px;
                     letter-spacing: 0px;
                 }

                 .cart__proceed-to-checkout {
                     height: 31.841px;
                     font-size: 10.397px;
                     gap: 0;
                     padding: 9.6px 0;
                     align-items: unset;
                     line-height: 1.3;
                 }

                 .cart__item-count {
                     font-size: 10.397px;
                     padding: 0;
                     padding-left: 2.5px;
                     padding-right: 3px;
                 }

                 .cart__proceed-to-checkout-arrow {
                     font-size: 12.897px;
                     padding: 0;
                 }

                 .cart__proceed-to-checkout svg {
                     width: 10.892px;
                     height: 11.992px;
                     flex-shrink: 0;
                     padding: 0;
                     margin-right: 6.5px;
                 }

                 .cart-drawer__badge-title {
                     text-align: center;
                     margin-left: 0;
                 }

                 .cart-drawer__links {
                     font-size: 10px;
                     margin: 7px 0;
                     line-height: 1;
                 }

                 .cart-drawer__badges-list {
                     width: 100%;
                     margin: 19px auto 0;
                 }

                 .cart-drawer__badges-list--s4 .cart-drawer__badge-wrapper {
                     width: 19.5%;
                     gap: 4px;
                 }

                 .cart-drawer__badge-wrapper svg,
                 .cart-drawer__badge-wrapper img {
                     width: 74%;
                     height: 70%;
                 }

                 .cart-drawer__reviews-title {
                     font-size: 14px;
                 }

                 .cart-drawer__reviews {
                     margin: 10px auto 29px;
                 }

                 .cart-drawer__review-content-wrapper {
                     gap: 2px;
                 }

                 .cart-drawer__review-date {
                     font-size: 10px;
                     line-height: 1;
                     margin-top: 0;
                 }

                 .cart-drawer__review-stars {
                     gap: 0px;
                     margin: 2.7px 0;
                 }

                 .cart-drawer__review-stars svg {
                     width: 15.8px;
                     height: 14px;
                 }

                 .cart-reviews__reviews-stars-text {
                     font-size: 10px;
                     margin: 1px 0px 0px 3px;
                     letter-spacing: 0px;
                 }

                 .cart-drawer__review-headline {
                     line-height: 10.793px;
                     margin: 2px 0;
                 }

                 .cart-drawer__review-headline,
                 .cart-drawer__review-content {
                     font-size: 10px;
                     letter-spacing: 0px;
                 }

                 .cart-drawer__review-content {
                     margin-top: 0px;
                 }

                 .cart-drawer__review-content p strong {
                     font-size: 10px;
                 }

                 .cart-drawer__review-content p span {
                     font-size: 10px;
                     letter-spacing: 0.13px;
                     line-height: 1;
                 }

                 .cart-drawer__review-item:not(:last-of-type) {
                     margin-bottom: 18px;
                 }

                 .cart-drawer__box:not(.cart-drawer--empty) .cart-drawer__title:before {
                     font-size: 0.7rem;
                     top: -1px;
                     left: 75px;
                 }

                 .cart-drawer .cart-drawer__paypal svg {
                     width: 111.396px;
                 }
             }
         </style>

         <div class="cart-drawer__overlay"></div>


         @include('cart-item-only')


         <script type="lazyload_int">
    

 var shipping_bar = shipping_bar ||{};

 const CartDrawerSettings ={
 shipping:{
 discount: '',
 text:{
 before: '',
 after: ''
 }
 },

 coupon:{
 text:{
 free: null,
 nonfree: ""
 }
 }
 };
</script>

         {{-- showsidebar --}}

     </div>
 </aside>
 </main>
 {{-- scriptSidezzz --}}


 <script type="lazyload_int">
    setTimeout(function (){
    window.CartAPI = (function (){
    'use strict';

    const couponOriginalContent = $('.cart-drawer__coupon').html();

    const $cartDrawer = $('#CartDrawer');

    const methods = {   
 async openCartDrawer(){
 $(document.body).addClass('cart-drawer--opened');
 },

 async closeCartDrawer(){
 $(document.body).removeClass('cart-drawer--opened');
 },
 };

 {{-- $('.icon--cart').click(async function (e){
 e.preventDefault();
 await methods.openCartDrawer();
 });
  --}}
 $(document).click(async function (e){
 if (
 $(e.target).is('.cart-drawer__overlay') ||
 $(e.target).is('.cart-drawer__close') ||
 $(e.target).is('.cart-drawer__close svg') ||
 $(e.target).is('.cart-drawer__close path') ||
 $(e.target).is('.cart-drawer__button--close-drawer')
 ){
 e.preventDefault();

 await methods.closeCartDrawer();
 }
 });
 

 {{-- $(document).on('submit', 'form[action*="/cart/add"]', async function (e){
 e.preventDefault();
 $('.btn-progress').css('width', 0).show().animate(
{
 width: '99.5%',
 }, 700 ); 
 
 await methods.openCartDrawer();
 $('.btn-progress').css('width', '100%').fadeOut();
 }); --}}



 return methods;
 })(jQuery);
 });
</script>
