@section('scripts')
        <script>
            Chart.plugins.unregister(ChartDataLabels);
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
                options : {
                    scales: {
                        xAxes: [
                        {
                            ticks: {
                            beginAtZero: true,
                            },
                            scaleLabel: {
                            display: false
                            },
                            gridLines: {},
                            stacked: true
                        }
                        ],
                        yAxes: [
                        {
                            stacked: true
                        }
                        ]
                    },
                    legend: {
                        display: false
                    },
                    animation: {
                        onComplete: function() {
                        var chartInstance = this.chart;
                        var ctx = chartInstance.ctx;
                        ctx.textAlign = "left";
                        ctx.font = "11px";
                        ctx.fillStyle = '#223388';
                        Chart.helpers.each(
                            this.data.datasets.forEach(function(dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            Chart.helpers.each(
                                meta.data.forEach(function(bar, index) {
                                data = dataset.data[index];
                                if (i == 0) {
                                    ctx.fillText(data, 70, bar._model.y + 4);
                                } else {
                                    ctx.fillText(data, bar._model.x - 25, bar._model.y + 4);
                                }
                                }),
                                this
                            );
                            }),
                            this
                        );
                        }
                    },
                    pointLabelFontFamily: "Quadon Extra Bold",
                    scaleFontFamily: "Quadon Extra Bold"
                }
                
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
                options: {
                    plugins: {
                        labels: {
                            render: 'value',
                            fontSize: 11,
                            fontColor: '#fff',
                        }
                    }
                }
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
                options: {
                    plugins: {
                        labels: {
                            render: 'value',
                            fontSize: 11,
                            fontColor: '#fff',
                        }
                    }
                }
                
                
            });
            var bulan = new Chart(document.getElementById('chartBulan'), {
                type: 'line',
                plugins: [ChartDataLabels],
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
                options: {
                    plugins: {
                    datalabels: {
                        align: function(context) {
                            var index = context.dataIndex;
                            var value = context.dataset.data[index];
                            var invert = Math.abs(value) <= 1;
                            return value < 1 ? 'end' : 'start'
                            },
                            anchor: 'end',
                            backgroundColor: null,
                            borderColor: null,
                            borderRadius: 4,
                            borderWidth: 1,
                            color: '#223388',
                            font: {
                            size: 11,
                            weight: 600
                            },
                            offset: 4,
                            padding: 0,
                            formatter: function(value) {
                                return Math.round(value * 10) / 10
                            }
                        }
                    }
                }
            });
        </script>
@endsection