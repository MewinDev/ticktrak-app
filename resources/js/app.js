import './bootstrap';
import './dark-light-theme';

import confetti from 'canvas-confetti';
import Alpine from 'alpinejs';
import ApexCharts from 'apexcharts'

window.Alpine = Alpine;
window.confetti = confetti;
window.ApexCharts = ApexCharts;

Alpine.start();
