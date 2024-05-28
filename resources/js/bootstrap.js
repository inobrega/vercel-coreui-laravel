import axios from 'axios';
import * as coreui from '@coreui/coreui'
import { Chart } from "chart.js/auto";
import { customTooltips } from '@coreui/chartjs';
import '@coreui/icons';
import * as coreuiUtils from '@coreui/utils';

// Adicionar o objeto Utils ao objeto coreui
const coreuiModified = {
    ...coreui,
    Utils: coreuiUtils,
    ChartJS: {
        customTooltips
    }
};

window.Chart = Chart;
window.axios = axios;
window.coreui = coreuiModified;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
