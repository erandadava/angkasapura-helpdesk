@section('scripts')
        <script>
            var prioritas = new Chart(document.getElementById('chartPrioritas'), {
                type: 'horizontalBar',
                data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                        label: "Population (millions)",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: [2478,5267,734,784,433]
                        }
                    ]
                },
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            });
            var kategori = new Chart(document.getElementById('chartKategori'), {
                type: 'pie',
                data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                        label: "Population (millions)",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: [2478,5267,734,784,433]
                        }
                    ]
                },
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            });
            var keluhan = new Chart(document.getElementById('chartKeluhan'), {
                type: 'doughnut',
                data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                        label: "Population (millions)",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: [2478,5267,734,784,433]
                        }
                    ]
                },
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            });
            var bulan = new Chart(document.getElementById('chartBulan'), {
                type: 'line',
                data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                        label: "Population (millions)",
                        borderColor: ["#8e5ea2"],
                        data: [2478,5267,734,784,433]
                        }
                    ]
                },
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            });
        </script>
@endsection