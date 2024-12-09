<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>جزئیات</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212;
            color: #ffffff;
            padding: 50px;
        }
        .container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            margin: auto;
        }
        h2 {
            text-align: center;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #ffffff;
        }
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .price {
            margin-top: 10px;
            color: #FFD700; /* رنگ طلایی */
            font-weight: bold;
            text-align: center;
        }
    </style>
    <script>
        const prices = {
            2: 600000,
            4: 600000,
            6: 750000,
            8: 750000,
            10: 850000,
            12: 1200000
        };

        function updatePrice() {
            const timeSelect = document.getElementById('time');
            const priceDisplay = document.getElementById('price');
            const selectedTime = timeSelect.value;

            if (selectedTime) {
                const price = prices[selectedTime];
                priceDisplay.innerText = `قیمت: ${price.toLocaleString()} تومان`;
            } else {
                priceDisplay.innerText = '';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>اطلاعات رزرو مادر رفیعی زاده</h2>
        <form method="POST" action="save_details.php">
            <input type="text" name="first_name" placeholder="نام" required>
            <input type="text" name="last_name" placeholder="فامیل" required>
            <input type="tel" id="phone" name="phone" placeholder="شماره تماس" required pattern="\d{11}" title="شماره تماس باید 11 رقم باشد.">
            <select id="time" name="time" required onchange="updatePrice();">
                <option value="" disabled selected>ساعت مورد نظر را انتخاب کنید</option>
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="8">8</option>
                <option value="10">10</option>
                <option value="12">شب خواب 12</option>
            </select>
            <div id="price" class="price"></div>
            <button type="submit">ارسال</button>
        </form>
    </div>
</body>
</html>
