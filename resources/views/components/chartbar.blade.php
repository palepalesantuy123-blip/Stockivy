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
                        label: 'Min Stock',
                        data: dataBawah,
                        backgroundColor: '#D8DEE9',
                        borderRadius: 0,
                        borderSkipped: false,
                    },
                    {
                        label: 'Max Stock',
                        data: dataAtas,
                        backgroundColor: '#ECEFF4',
                        borderRadius: { topLeft: 8, topRight: 8, bottomLeft: 0, bottomRight: 0 },
                        borderSkipped: false,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true, // DIKUNCI: Ukuran wadah grafik akan tetap presisi sesuai layout HTML-mu
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
                        // Menyesuaikan tinggi chart secara dinamis agar tidak mentok di angka 250 jika barangmu banyak
                        max: Math.max(...dataBawah.map((num, idx) => num + dataAtas[idx])) > 200 ? null : 250,
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
