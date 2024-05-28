@include('shared.html')

@include('shared.head', ['title' => 'Offer Statistics'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')



<div class="p-4 sm:ml-64">
    <div id="chart"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            series: [
                    @foreach($offers as $status => $count)
                        {{ $count }},
                    @endforeach
            ],
            chart: {
                type: 'donut',
                height: 800
            },
            labels: [
                @foreach($offers as $status => $count)
                '{{ ucfirst($status) }}',
                @endforeach
            ],
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>

</body>
</html>
