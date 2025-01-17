import axios from "axios";
import CustomSelect from "./scripts/select";
import "./scripts/chunks";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// Init custom components

CustomSelect.init();
