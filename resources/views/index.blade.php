<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de precios</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="priceChart"></canvas>

    <script>
        let prices = {!! $prices !!};

        let timestamps = prices.map(function (price) {
            let date = new Date(price.last_updated);
            const day = date.getDate();
            const month = date.getMonth()+1;
            const year = date.getFullYear();
            const hour = date.getHours();
            const minutes = date.getMinutes();
            const formatDate = `${day}/${month}/${year} ${hour}:${minutes}`;
            return formatDate;
        });

        let priceValues = prices.map(function (price) {
            return price.price;
        });

        let ctx = document.getElementById('priceChart').getContext('2d');
        let chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: timestamps,
                datasets: [{
                    label: 'Precio BTC',
                    data: priceValues,
                    borderColor: 'blue',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>

