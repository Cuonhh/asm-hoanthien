"use strict";
var _ = require("lodash");
var axios = require("axios");
var Alpine = require("alpinejs");
var Chart = require("chart.js/auto");
function _interopDefaultLegacy(e) {
  return e && typeof e === "object" && "default" in e ? e : { "default": e };
}
var ___default = /* @__PURE__ */ _interopDefaultLegacy(_);
var axios__default = /* @__PURE__ */ _interopDefaultLegacy(axios);
var Alpine__default = /* @__PURE__ */ _interopDefaultLegacy(Alpine);
var Chart__default = /* @__PURE__ */ _interopDefaultLegacy(Chart);
window._ = ___default["default"];
window.axios = axios__default["default"];
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
var style = "";
var header = "";
var home = "";
var sidebar = "";
var catePage = "";
window.Alpine = Alpine__default["default"];
Alpine__default["default"].start();
const ctx = document.querySelector("#myChart");
if (ctx) {
  let getAPi = function() {
    return window.axios.get("http://127.0.0.1:8000/api/soluongbaipost");
  };
  ctx.getContext("2d");
  async function handleChartJS() {
    let data2 = await getAPi();
    let dataAPI = data2.data;
    console.log(dataAPI);
    const labels = dataAPI.map((value, index) => {
      return value.name;
    });
    let dataInput = dataAPI.map((value, index) => {
      return value.countPost;
    });
    const data = {
      labels,
      datasets: [{
        label: "S\u1ED1 b\xE0i post",
        backgroundColor: [
          "red",
          "blue",
          "green",
          "yellow",
          "aqua",
          "pink"
        ],
        borderColor: "rgb(255, 99, 132)",
        data: dataInput
      }]
    };
    const config = {
      type: "bar",
      data,
      options: {}
    };
    new Chart__default["default"](document.getElementById("myChart"), config);
  }
  handleChartJS();
}
