document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.add-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const price = button.getAttribute('data-price');
            const image = button.getAttribute('data-image');

            console.log("Hello")
            addToCart(productId, name, price, image);
        });
    });
});

function addToCart(productId, name, price, image) {
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            product_id: parseInt(productId),
            name: name,
            price: parseFloat(price),
            image: image,
            quantity: 1,
        }),
    })
    .then(response => response.json())
    .then(data => {
        showTemporaryMessage("Added to cart")
        updateCartCount();
    })
    .catch(error => console.error('Error:', error));
}

function updateCartCount() {
    fetch('/cart/count')
        .then(response => response.json())
        .then(data => {
            document.getElementById('cart-count').innerText = data.count;
        });
}

function showTemporaryMessage(message) {
    let tempMessage = document.getElementById('temp-message');

    if (!tempMessage) {
        tempMessage = document.createElement('div');
        tempMessage.id = 'temp-message';
        tempMessage.style.position = 'fixed';
        tempMessage.style.top = '10px';
        tempMessage.style.left = '50%';
        tempMessage.style.transform = 'translateX(-50%)';
        tempMessage.style.backgroundColor = '#f3f0eb';
        tempMessage.style.color = '#5b5a57';
        tempMessage.style.padding = '10px 20px';
        tempMessage.style.borderRadius = '4px';
        tempMessage.style.zIndex = '1000';
        tempMessage.style.fontSize = '20px';
        tempMessage.style.textAlign = 'center';
        document.body.appendChild(tempMessage);
    }

    tempMessage.textContent = message;
    tempMessage.style.display = 'block';

    setTimeout(() => {
        tempMessage.style.display = 'none';
    }, 2000);
}

function removeFromCart(productId) {
    fetch('/cart/remove', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ product_id: productId }),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        location.reload();
    })
    .catch(error => console.error('Error:', error));
}
