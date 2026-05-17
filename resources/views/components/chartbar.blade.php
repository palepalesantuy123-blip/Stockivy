<div class="mt-6 bg-[#F8F9FB] p-6 rounded-2xl border-2 border-gray-300 w-full mx-auto shadow-sm flex-1 flex-start">
    <canvas id="weeklyOverviewChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('weeklyOverviewChart').getContext('2d');

        const labelsData = {!! json_encode($labels) !!};
        const dataBawah = {!! json_encode($dataBawah) !!};
        const dataAtas = {!! json_encode($dataAtas) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelsData,
                datasets: [
                    {
                        label: 'Data Bawah',
                        data: dataBawah,
                        backgroundColor: '#D8DEE9',
                        borderRadius: { topLeft: 0, topRight: 0, bottomLeft: 8, bottomRight: 8 },
                        borderSkipped: false,
                    },
                    {
                        label: 'Data Atas',
                        data: dataAtas,
                        backgroundColor: '#ECEFF4',
                        borderRadius: 8,
                        borderSkipped: false,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        stacked: true,
                        grid: { display: false },
                        border: { color: '#8A8A8A' }
                    },
                    y: {
                        stacked: true,
                        min: 0,
                        max: 250,
                        ticks: { stepSize: 50 },
                        grid: { color: '#EAECEF' },
                        border: { display: false }
                    }
                },
                barPercentage: 0.6,
                categoryPercentage: 0.8
            }
        });
    });
    </script>
