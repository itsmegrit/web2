// JavaScript để hiển thị thông tin giỏ hàng

// Hàm gửi yêu cầu Ajax để lấy dữ liệu session từ máy chủ
function getSessionData(callback) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var sessionData = JSON.parse(xhr.responseText);
        callback(sessionData);
      } else {
        console.error("Không thể truy xuất dữ liệu session");
      }
    }
  };
  xhr.open("GET", "./config/get_session_data.php");
  xhr.send();
}

// Hàm định dạng số tiền thành đơn vị tiền tệ
function formatCurrency(value) {
  return new Intl.NumberFormat("vi-VN", {
    style: "currency",
    currency: "VND",
  }).format(value);
}

// Hàm hiển thị các mục trong giỏ hàng
function displayCartItems(cartData) {
  var cartItemsElement = document.getElementById("cart-items");
  var totalPriceElement = document.getElementById("total-price");
  var total = 0;

  cartItemsElement.innerHTML = "";

  Object.keys(cartData).forEach(function (productID) {
    var cartItem = cartData[productID];
    var row = document.createElement("tr");

    var nameCell = document.createElement("td");
    nameCell.textContent = cartItem.name;
    row.appendChild(nameCell);

    var priceCell = document.createElement("td");
    priceCell.textContent = formatCurrency(cartItem.price);
    row.appendChild(priceCell);

    var quantityCell = document.createElement("td");
    quantityCell.textContent = cartItem.quantity;
    row.appendChild(quantityCell);

    var totalCell = document.createElement("td");
    var totalPrice = cartItem.price * cartItem.quantity;
    totalCell.textContent = formatCurrency(totalPrice);
    row.appendChild(totalCell);

    cartItemsElement.appendChild(row);

    total += totalPrice;
  });

  totalPriceElement.textContent = formatCurrency(total);
}

// Gọi hàm getSessionData và truyền hàm displayCartItems làm callback để hiển thị dữ liệu giỏ hàng
getSessionData(displayCartItems);
