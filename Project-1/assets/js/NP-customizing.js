const mainContainer = document.querySelector('.wcus-checkout-fields');
const allSelects = mainContainer.querySelectorAll('.form-row');

//===============УДАЛЕНИЕ НАДПИСИ "УКАЖИТЕ АДРЕС ДОСТАВКИ"
mainContainer.querySelector('h3').remove();

//===============МЕТОДЫ ДОСТАВКИ

//добавление названия поля
const shippingMethodSelect = mainContainer.querySelector('.zen-ui-select-1');
shippingMethodSelect.insertAdjacentHTML('beforebegin', '<div class="custom-NP_label tab-field__title">Спосіб доставки</div>');

//добавление css-классов строке
shippingMethodSelect.parentElement.classList.add('ordering__tab-fields_field', 'tab-field');


//===============ГОРОД
const cityRow = allSelects[1];

//добавление css-классов строке
cityRow.classList.add('ordering__tab-fields_field', 'tab-field');

//добавление названия поля
const cityRowSelect = cityRow.querySelector('.woocommerce-input-wrapper');
cityRowSelect.insertAdjacentHTML('beforebegin', '<div class="custom-NP_label tab-field__title">Місто</div>');


//===============ОТДЕЛЕНИЕ
const warehouseRow = allSelects[2];

//добавление css-классов строке
warehouseRow.classList.add('ordering__tab-fields_field', 'tab-field');

//добавление названия поля
const warehouseRowSelect = warehouseRow.querySelector('.woocommerce-input-wrapper');
warehouseRowSelect.insertAdjacentHTML('beforebegin', '<div class="custom-NP_label tab-field__title">Відділення</div>');


//===============АДРЕС (ЕСЛИ ДОСТАВКА КУРЬЕРОМ)
const adressRow = allSelects[3];

//добавление css-классов строке
adressRow.classList.add('ordering__tab-fields_field', 'tab-field');

//добавление названия поля
const adressRowInput = adressRow.querySelector('.woocommerce-input-wrapper');
adressRowInput.insertAdjacentHTML('beforebegin', '<div class="custom-NP_label tab-field__title">Адреса</div>');

//добавление css-классов инпуту
adressRowInput.querySelector('#wcus_np_billing_custom_address').classList.add('input-text', 'tab-field__input');

