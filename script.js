let txn_date = document.querySelector("#txn_date");
let new_case = document.querySelector("#new_case");
let total_case = document.querySelector("#total_case");
let data = { nick: "nickza", id: "123" };

getTotalCase = () => {
  axios
    .get("https://covid19.ddc.moph.go.th/api/Cases/today-cases-all")
    .then((res) => {
      // console.log(res.data);
      txn_date.innerHTML = `รายงานผู้ติดเชื้อประจำวันที่ <br>${res.data[0].txn_date}`;
      new_case.innerHTML = `ผู้ติดเชื้อรายใหม่ <br>${res.data[0].new_case}`;
      total_case.innerHTML = `ยอดผู้ติดเชื้อสะสม <br>${res.data[0].total_case}`;
    });
};

getProvinceCase = () => {
  axios
    .get("https://covid19.ddc.moph.go.th/api/Cases/today-cases-by-provinces")
    .then((res) => {
      let covid_data = [];
      let top_5 = [];
      // console.log(res.data[0].province)

      for (const items of res.data) {
        covid_data.push(items.new_case);
      }
      covid_data.sort((a, b) => {
        return b - a;
      });

      for (i = 0; i < 5; i++) {
        let top1 = res.data.filter(function (el) {
          return el.new_case == covid_data[i];
        });
        // console.log(top1);
        top_5.push(top1[0]);
      }
      console.log(top_5[0]);
      var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [top_5[0].province, top_5[1].province, top_5[2].province, top_5[3].province, top_5[4].province],
        datasets: [{
          label: 'Top 5 ยอดผู้ติดเชื้อเพิ่มรายวัน',
          data: [top_5[0].new_case, top_5[1].new_case, top_5[2].new_case, top_5[3].new_case, top_5[4].new_case],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
      }
    });

    });
};
test = () => {
  // let data = [1,2,3,4,5]
  // data.shift(1)
  // console.log(data)
  //   console.log(i);
};

onWindowLoad = () => {
  getTotalCase();
  getProvinceCase();
  test();
};

window.onload = onWindowLoad;
