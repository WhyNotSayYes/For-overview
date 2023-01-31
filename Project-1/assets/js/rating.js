const ratingItemsList = document.querySelectorAll('.rating__item');
const ratingItemsArray = Array.prototype.slice.call(ratingItemsList);

ratingItemsArray.forEach(item =>
    item.addEventListener('click', () =>
        item.parentNode.dataset.totalValue = item.dataset.itemValue
    )
);