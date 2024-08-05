import './bootstrap';

import "../css/style.css";

import "../css/header.css";

import "../css/home.css";
import "../css/sidebar.css";
import "../css/catePage.css";

// import "../css/bootstrap-icons.css";
import "./main";

import Alpine from 'alpinejs';
import Chart from 'chart.js/auto';

window.Alpine = Alpine;

Alpine.start();


const ctx = document.querySelector('#myChart');

if (ctx) {
    const atx = ctx.getContext('2d');

    function getAPi(){
      return window.axios.get('http://127.0.0.1:8000/api/soluongbaipost');
    }

    async function handleChartJS(){
      let data2 = await getAPi();
      let dataAPI = data2.data
      console.log(dataAPI);

      const labels = dataAPI.map((value, index) => {
        return value.name
      });

      let dataInput = dataAPI.map((value, index) => {
        return value.countPost
      });
      
      const data = {
        labels: labels,
        datasets: [{
          label: 'Số bài post',
          backgroundColor: [
            'red',
            'blue',
            'green',
            'yellow',
            'aqua',
            'pink'
          ],
          borderColor: 'rgb(255, 99, 132)',
          data: dataInput,
        }]
      };
    
      const config = {
        type: 'bar',
        data: data,
        options: {}
      };

      const myChart = new Chart(document.getElementById('myChart'),config)
    }

    handleChartJS();
    
}





