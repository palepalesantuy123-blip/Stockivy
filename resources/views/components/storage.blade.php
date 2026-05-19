<div class="bg-white p-6 rounded-2xl border-2 border-gray-300 w-full h-full shadow-sm flex flex-col justify-start">

    <div class="flex items-center gap-4 mb-6 mt-5 ml-3">
        <div class="bg-[#ECEFF4] rounded-lg shrink-0 flex items-center justify-center w-11 h-11 shadow-sm">
            <img src="/folder.png" alt="Folder Icon" class="w-6 h-6 object-contain">
        </div>
        <div>
            <h2 class="text-sm font-bold text-black leading-tight">Storage</h2>
            <h2 class="text-sm font-bold text-black leading-tight">Capacity</h2>
        </div>
    </div>

    <div class="flex flex-row items-center justify-between ml-12 mb-15 gap-4 flex-1">

        <div class="w-[50%]">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-400 font-bold text-sm">
                        <th class="pb-2 font-semibold">Label</th>
                        <th class="pb-2 text-right font-semibold">Amount</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-bold text-black">
                    <tr class="border-b border-gray-100 last:border-0">
                        <td class="py-3 flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-[#E5E9F0] border border-gray-400"></span>
                            Label 1
                        </td>
                        <td class="py-3 text-right">6,806</td>
                    </tr>
                    <tr class="border-b border-gray-100 last:border-0">
                        <td class="py-3 flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-[#D2D7E4] border border-gray-400"></span>
                            Label 2
                        </td>
                        <td class="py-3 text-right">2,000</td>
                    </tr>
                    <tr class="border-b border-gray-100 last:border-0">
                        <td class="py-3 flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-[#EBEDF3] border border-gray-400"></span>
                            Label 3
                        </td>
                        <td class="py-3 text-right">3,474</td>
                    </tr>
                    <tr class="border-b border-gray-100 last:border-0">
                        <td class="py-3 flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-[#C4C9D6] border border-gray-400"></span>
                            Label 4
                        </td>
                        <td class="py-3 text-right">7,307</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="w-[45%] flex justify-center items-center">
            <div class="w-full max-h-[180px] flex justify-center">
                <canvas id="storagePolarChart"></canvas>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const polarCtx = document.getElementById('storagePolarChart').getContext('2d');

        const storageData = [6806, 2000, 3474, 7307];

        new Chart(polarCtx, {
            type: 'polarArea',
            data: {
                labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
                datasets: [{
                    data: storageData,
                    backgroundColor: [
                        '#E5E9F0',
                        '#D2D7E4',
                        '#EBEDF3',
                        '#C4C9D6'
                    ],
                    borderColor: '#8A8A8A',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    r: {
                        grid: {
                            color: '#EAECEF'
                        },
                        angleLines: {
                            color: '#EAECEF'
                        },
                        ticks: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
