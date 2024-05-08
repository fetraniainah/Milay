document.addEventListener("DOMContentLoaded", function() {
    // Données de vente des articles par jour
    const salesData = {
        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        datasets: [{
            label: 'Article Sales',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            data: [12, 19, 3, 5, 2, 3, 7], // Exemple de données de vente par jour
        }]
    };

    // Configuration du graphique
    const chartConfig = {
        type: 'bar',
        data: salesData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    // Création du graphique
    const salesChart = document.getElementById('sales-chart').getContext('2d');
    new Chart(salesChart, chartConfig);
});
