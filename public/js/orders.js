// orders.js
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.tool_btn').forEach(item => {
        item.addEventListener('click', event => {
            const status = event.target.dataset.status;
            const orders = ordersData; // ตรวจสอบตรงนี้
            const filteredOrders = orders.filter(order => order.orderstatus === status);

            const orderTableBody = document.getElementById('orderTableBody');
            orderTableBody.innerHTML = '';

            if (filteredOrders.length > 0) {
                filteredOrders.forEach(order => {
                    const row = `
                        <tr>
                            <td>${order.orderID}</td>
                            <td>${order.userID}</td>
                            <td>${order.totalAmount}</td>
                            <td>${order.orderstatus}</td>
                        </tr>
                    `;
                    orderTableBody.insertAdjacentHTML('beforeend', row);
                });
            } else {
                const row = `<tr><td colspan="5">Empty data</td></tr>`;
                orderTableBody.insertAdjacentHTML('beforeend', row);
            }
        });
    });
});
