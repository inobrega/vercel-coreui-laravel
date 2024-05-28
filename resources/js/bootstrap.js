import axios from 'axios';
import * as coreui from '@coreui/coreui'
import { Chart } from "chart.js";
import { customTooltips } from '@coreui/coreui-plugin-chartjs-custom-tooltips';
import '@coreui/icons';
import * as coreuiUtils from '@coreui/utils';

// Adicionar o objeto Utils ao objeto coreui
const coreuiModified = {
    ...coreui,
    Utils: coreuiUtils
};

window.Chart = Chart;
window.axios = axios;
window.coreui = coreuiModified;

// Configurar os tooltips personalizados
Chart.defaults.plugins.tooltip = {
    enabled: false,
    external: customTooltips
};


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
