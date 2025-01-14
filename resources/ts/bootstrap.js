import axios from "axios";
import CustomSelect from "./scripts/select";
import "./scripts/slides";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.addEventListener("load", () => {
	CustomSelect.init();
});
