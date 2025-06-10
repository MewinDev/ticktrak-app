 // Returns ApexCharts options, adapting to dark mode
const getChartOptions = () => {
    // Detect dark mode using Tailwind's dark class on html or body
    const isDark = document.documentElement.classList.contains('dark') || document.body.classList.contains(
        'dark');
    const progress = window.currentProgress || 0;
    return {
        series: [progress],
        colors: ["#0E9F6E"], // Chart color based on mode
        chart: {
            type: "radialBar",
            sparkline: {
                enabled: true
            },
        },
        plotOptions: {
            radialBar: {
                track: {
                    background: isDark ? '#374151' : '#E5E7EB', // Track color
                },
                dataLabels: {
                    show: true,
                    name: {
                        color: isDark ? '#fff' : '#111827'
                    }, // Label color
                    value: {
                        color: isDark ? '#fff' : '#111827'
                    } // Value color
                },
                hollow: {
                    margin: 0,
                    size: "60%",
                    background: isDark ? '#1f2937' : '#fff' // Hollow center color
                }
            },
        },
        grid: {
            show: true,
            strokeDashArray: 1
        },
        labels: ["Completed"], // Chart label
        legend: {
            show: false,
            position: "left",
            labels: {
                colors: isDark ? '#fff' : '#111827'
            }
        },
        tooltip: {
            enabled: false,
            theme: isDark ? 'dark' : 'light',
            x: {
                show: false
            },
        },
        yaxis: {
            show: false,
            labels: {
                formatter: function(value) {
                    return value + '%';
                },
                style: {
                    colors: isDark ? '#fff' : '#111827'
                }
            }
        }
    }
}

// Renders the radial chart, destroying previous instance if exists
function renderTaskChart() {
    if (document.getElementById("task-chart") && typeof ApexCharts !== 'undefined') {
        // Destroy previous chart if exists
        if (window.taskChartInstance) {
            window.taskChartInstance.destroy();
        }
        window.taskChartInstance = new ApexCharts(document.querySelector("#task-chart"), getChartOptions());
        window.taskChartInstance.render();
    }
}

// Initial render on page load
renderTaskChart();

// Listen for dark mode changes (Tailwind dark mode toggling)
// Re-render chart when dark mode class changes
const observer = new MutationObserver(() => {
    renderTaskChart();
});
observer.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ['class']
});
