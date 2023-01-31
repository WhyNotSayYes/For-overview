//добавление названия товара в форму быстрого заказа

let productItems = document.querySelectorAll('.good__item');
let buyNowButton = document.querySelector('.buy-one-click-btn');
let popupProductTitle = document.querySelector('.buy-on-one-click__title span');
let inputProductName = document.querySelector('input[name*="product"]');

//если открыт каталог
if (0 < productItems.length) {
    productItems.forEach((product) => {
        let productTitle = product.querySelector('.good__title').textContent;
        
        product.querySelector('.buy-one-click-btn').addEventListener('click', function() {
            popupProductTitle.textContent = productTitle;
            inputProductName.value = productTitle;
        })
    })
} 

//если открыта карточка товара
if (document.querySelector('.good-card__title')) {
    let productTitleInCard = document.querySelector('.good-card__title').textContent;

    document.querySelector('.buy-one-click-btn').addEventListener('click', function() {
        popupProductTitle.textContent = productTitleInCard;
        inputProductName.value = productTitleInCard;
    })
}

//если открыта страница чекаута
if (document.querySelector('.ordering')) {
    let inputProductQty = document.querySelector('input[name*="quantity"]');
    // let itemsList = document.querySelectorAll('.cart-order__item');
    let itemsList = document.querySelectorAll('.cart-mobile__item');

    let productsInCart = [];
    itemsList.forEach((element) => {
        // let chkProductTitle = element.querySelector('.cart-order__item_title').innerText;
        let chkProductTitle = element.querySelector('.cart-mobile-row-title').innerText;
        let chkProductQuantity = element.querySelector('.qty').value;

        inputProductName.value = chkProductTitle;
        inputProductQty.value = chkProductQuantity;
        let productData = inputProductName.value + ' ' + '-' + ' ' + inputProductQty.value + ' ' + 'шт';
        
        productsInCart.push(productData);
    })

    let inputProductData = document.querySelector('input[name*="productData"]');
    inputProductData.value = productsInCart;

}

//отправка формы

;(function() {
    // let forms = document.querySelectorAll('.popup__content');
    let forms = document.querySelectorAll('.sendform');

    if (forms.length === 0) {
        return;
    }

    let serialize = function(form) {
        let items = form.querySelectorAll('input');
        let str = '';

        for (let i = 0; i < items.length; i += 1) {
            let item = items[i];
            let name = item.name;
            let value = item.value;
            let separator = i === 0 ? '' : '&';

            if (value) {
                str += separator + name + '=' + value;
            }
        }

        return str;
    }

    let formSend = function(form) {
        let data = serialize(form);
  
        let xhr = new XMLHttpRequest();
        let url = '/agroprom/wp-content/themes/agroprom/mail.php';

        xhr.open('POST', url);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {

            let activePopup = document.querySelector('.popup.open');
            
            if (activePopup) {
                activePopup.classList.remove('open');
            } else {
                // console.log('error');
            }

            if (xhr.response.trim() === 'success') {
                document.querySelector('.buy-on-one-click_success').classList.add('open');
            }
            else if (xhr.response.trim() === 'checkout-success') {
                document.querySelector('.buy-on-one-click_success').classList.add('open');
                window.location.reload();
            }
            else if (xhr.response.trim() === 'callback-success') {
                document.querySelector('.callback_success').classList.add('open');
            }
            else {
                document.querySelector('.buy-on-one-click_fuck-up').classList.add('open');
            }
        };

        xhr.send(data);
    };


    for (let i = 0; i < forms.length; i += 1) {
        if(forms[i].classList.contains('sendform')) {
            forms[i].addEventListener('submit', function(e) {
                e.preventDefault();
                let form = e.currentTarget;
                formSend(form);
            })
        }
    }

})();

