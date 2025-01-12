import axios from "axios";
import Preview from "./scripts/preview";
import CustomSelect from "./scripts/select";
import "./scripts/slides";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.addEventListener("load", () => {
	Preview.init();
	CustomSelect.init();
});
