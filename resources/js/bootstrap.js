import axios from 'axios';
import * as coreui from '@coreui/coreui'

window.axios = axios;
window.coreui = coreui

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
