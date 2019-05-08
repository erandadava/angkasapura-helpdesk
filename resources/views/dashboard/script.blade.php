@section('scripts')
        <script>
            var jumlah_prioritas = {!!$jumlah_prioritas!!};
            var label_prioritas = $.map(jumlah_prioritas, function(e) {
                return e.prio_name;
            });
            var value_prioritas = $.map(jumlah_prioritas, function(e) {
                return e.count;
            });
            var jumlah_kategori = {!!$jumlah_kategori!!};
            var label_kategori = $.map(jumlah_kategori, function(e) {
                return e.cat_name;
            });
            var value_kategori = $.map(jumlah_kategori, function(e) {
                return e.count;
            });
            console.log(jumlah_prioritas);
            var prioritas = new Chart(document.getElementById('chartPrioritas'), {
                type: 'horizontalBar',
                data: {
                labels: label_prioritas,
                    datasets: [
                        {
                        label : "Jumlah",   
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: value_prioritas
                        }
                    ]
                },
            });
            var kategori = new Chart(document.getElementById('chartKategori'), {
                type: 'pie',
                data: {
                labels: label_kategori,
                    datasets: [
                        {
                        label: "Jumlah",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: value_kategori
                        }
                    ]
                },
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            });
            var keluhan = new Chart(document.getElementById('chartKeluhan'), {
                type: 'doughnut',
                data: {
                labels: ["Belum","Selesai"],
                    datasets: [
                        {
                        label: "Jumlah",
                        backgroundColor: ["#3cba9f","#c45850"],
                        data: [{!!$jumlah_belum!!},{!!$jumlah_selesai!!}]
                        }
                    ]
                },
                
            });
            var bulan = new Chart(document.getElementById('chartBulan'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [
                        {
                        label: "Jumlah Keluhan",
                        borderColor: ["#8e5ea2"],
                        data: {!! $jumlah_bulan !!}
                        }
                    ]
                },
            });
        </script>
@endsection