$(document).ready(function(){
    $.ajax({
        url: "http://localhost/ktshop/admin/data/data.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var id_order = [];
            var thanhtien = [];

            for (var i in data) {
                id_order.push(data[i].name_pro);
                thanhtien.push(data[i].tong);
            }

            var chartdata = {
                labels: id_order,
                datasets : [
                    {
                        label : 'Tổng doanh số đã bán (VND)',
                        backgroundColor: '#925858',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: thanhtien
                    }
                ]
            };
            const config = {
                type: 'bar',
                data: chartdata,
                options: {}
              };
            const myChart = new Chart(
                document.getElementById('mycanvas'),
                config
              );
        },
        error: function(data) {
            console.log(data);
        }
    });
});