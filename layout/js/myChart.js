const ctx = document.getElementById('projectsStage').getContext('2d');
const ctx2 = document.getElementById('porjectsStatus').getContext('2d');


$(document).ready(function() {
    $.ajax({
        url:"includes/data/phase.json",
        dataType: 'json',
        cache: false,
        method: "GET",
        success: function(data) {
            var value  = [];
            value.push(
                parseInt(data.planning),
                parseInt(data.analysis),
                parseInt(data.design),
                parseInt(data.implementation),
                parseInt(data.testing),
                parseInt(data.maintenance));
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Planning', 'Analysis', 'Design', 'Implementation', 'Testing', 'Maintenance'],
                    datasets: [{
                        label: '# of Votes',
                        data: value,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
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
                    responsive: true,
                    plugins: {
                        legend: {
                        position: 'top',
                        },
                        title: {
                        display: true,
                        text: 'Projects Stage'
                        }
                    }
                    },
            });
        } ,
        error: function(xhr,textStatus) {
            console.log(xhr);
            console.log(textStatus);
        }
    });
    $.ajax({
        url:"includes/data/status.json",
        dataType: 'json',
        cache: false,
        method: "GET",
        success: function(data) {
            var high  = [] , normal = [] ,low = [] ;
            high.push(
                parseInt(data.open[0]),
                parseInt(data.inProgress[0]),
                parseInt(data.design[0]),
                parseInt(data.testing[0]),
                parseInt(data.reopen[0]),
                parseInt(data.closed[0])
                );
            normal.push(
                parseInt(data.open[1]),
                parseInt(data.inProgress[1]),
                parseInt(data.design[1]),
                parseInt(data.testing[1]),
                parseInt(data.reopen[1]),
                parseInt(data.closed[1])
                );
            low.push(
                parseInt(data.open[2]),
                parseInt(data.inProgress[2]),
                parseInt(data.design[2]),
                parseInt(data.testing[2]),
                parseInt(data.reopen[2]),
                parseInt(data.closed[2])
                );

                const labels = [ 'Open', 'In Progress', 'Testing', 'Reopen','Closed'];
                const myChart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'High Priority',
                                data: high,
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                backgroundColor:[
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ]
                            },
                            {
                                label: 'Normal Priority',
                                data: normal,
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                backgroundColor:[
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ]
                            },
                            {
                                label: 'Low Priority',
                                data: low,
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                backgroundColor:[
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ]
                            }
                
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                            position: 'top',
                            },
                            title: {
                            display: true,
                            text: 'Projects Status'
                            }
                        }
                        },
                });

            } ,
            error: function(xhr,textStatus) {
                console.log(xhr);
                console.log(textStatus);
            }
    });
});