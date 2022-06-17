import { ajax, appendForm } from "../helpers/helper.js";
import URL from "../helpers/url.js";
const d = document;



export function requests() {
    d.addEventListener("submit", async (e) => {
        e.preventDefault();
        //debugger;
        if (e.target.matches('.btn-login') || e.target.matches('.btn-login *')) {

        }

    });
}