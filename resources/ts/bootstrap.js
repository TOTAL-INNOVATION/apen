import axios from 'axios';
import "./scripts/slides";
import Preview from "./scripts/preview";

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.addEventListener('load', () => {
	Preview.init();
});
