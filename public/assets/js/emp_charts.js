function getChartOptions(text, value, color1, color2) {
    return {
        chart: {
            height: 70,
            type: 'bar',
            stacked: true,
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '40%',
                borderRadius: 15,
                borderRadiusApplication: 'around',
                colors: {
                    backgroundBarColors: ['#d8d0e8'],
                    backgroundBarRadius: 15
                }
            },
        },
        colors: [color1],
        stroke: {
            width: 0,
        },
        series: [{
            name: text,
            data: [value]
        }],
        title: {
            floating: true,
            offsetX: -10,
            offsetY: -5,
            text: text,
            style: {
                fontSize: '20px',
                fontWeight: '2px',
                color: color1
            },
        },
        subtitle: {
            floating: true,
            align: 'right',
            offsetY: 0,
            text: value + '%',
            style: {
                fontSize: '20px',
                color: color2
            }
        },
        tooltip: {
            enabled: false
        },
        xaxis: {
            categories: [text],
        },
        yaxis: {
            max: 100
        },
        fill: {
            type: 'gradient',
            gradient: {
                inverseColors: false,
                gradientToColors: [color2]
            }
        },
    }
}

let depressionChart = new ApexCharts(document.querySelector("#depression"), getChartOptions('Depression', depressionPercentage, '#FDB983', '#FD7E30'));
let anxietyChart = new ApexCharts(document.querySelector("#anxiety"), getChartOptions('Anxiety', anxietyPercentage, '#b44bc9', '#f9b584'));
let stressChart = new ApexCharts(document.querySelector("#stress"), getChartOptions('Stress', stressPercentage, '#1bd1fd', '#4966ea'));

depressionChart.render();
anxietyChart.render();
stressChart.render();

var monthlyOptions = {
    series: [{
        data: [m_depression_percentage, m_anxiety_percentage, m_stress_percentage]
    }],
    chart: {
        height: 290,
        type: 'bar',
    },
    colors: ['#FDBF18', '#b44bc9', '#1bd1fd'],
    plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
            dataLabels: {
                position: 'top',
            },
        }
    },
    dataLabels: {
        enabled: true,
        style: {
            colors: ['#FDBF18', '#b44bc9', '#1bd1fd'],
        },
        offsetY: -40
    },
    legend: {
        show: false
    },
    xaxis: {
        categories: [
            'Depression',
            'Anxiety',
            'Stress',
        ],
        labels: {
            style: {
                colors: ['#FD7E30', '#b44bc9', '#1bd1fd'],
                fontSize: '12px'
            }
        }
    },
    yaxis: {
        max: 100
    },
    fill: {
        type: 'gradient',
        gradient: {
            type: "vertical",
            inverseColors: true,
            gradientToColors: ['#FD7E30', '#fdb983', '#4e5eeb']
        }
    },
};

var chartMonthly = new ApexCharts(document.querySelector("#monthly_stats"), monthlyOptions);
chartMonthly.render();

var yearlyOptions = {
    series: [
        {
            name: 'Depression',
            data: y_depression_percentage
        },
        {
            name: 'Anxiety',
            data: y_anxiety_percentage
        },
        {
            name: 'Stress',
            data: y_stress_percentage
        }
    ],
    chart: {
        height: 290,
        type: 'line',  // Changed to 'line'
    },
    colors: ['#FDBF18', '#b44bc9', '#1bd1fd'],
    plotOptions: {
        line: {  // Changed to 'line'
            dataLabels: {
                enabled: true,
            },
        }
    },
    dataLabels: {
        enabled: false,
        style: {
            colors: ['#FDBF18', '#b44bc9', '#1bd1fd'],
        },
        offsetY: -20
    },
    legend: {
        show: false
    },
    xaxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ],
    },
    yaxis: {
        max: 100
    },
    fill: {
        type: 'gradient',
        gradient: {
            type: "vertical",
            inverseColors: true,
            gradientToColors: ['#FD7E30', '#fdb983', '#4e5eeb']
        }
    },
};

var chartYearly = new ApexCharts(document.querySelector("#yearly_stats"), yearlyOptions);
chartYearly.render();


(function () {
    var calendar = new FullCalendar.Calendar(document.getElementById('event_calendar'), {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridDay,timeGridWeek,dayGridMonth'
        },
        buttonText: {
            timeGridDay: "Day",
            timeGridWeek: "Week",
            dayGridMonth: "Month"
        },
        themeSystem: 'bootstrap',
        slotDuration: '00:10:00',
        navLinks: true,
        droppable: true,
        selectable: true,
        selectMirror: true,
        editable: true,
        dayMaxEvents: true,
        handleWindowResize: true,
        events: arrEvents,
    });
    calendar.render();

    var options = {
        series: [hoursUsed, hoursRemaining],
        chart: {
            type: 'donut',
            height: 300
        },
        labels: ['Hours Used', 'Hours Remaining'],
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return opts.w.globals.series[opts.seriesIndex];
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " hours";
                }
            }
        },
        legend: {
            show: true,
            labels: {
                useSeriesColors: true
            }
        },
        colors: ['#3ec7d4', '#6ed742'],

    };

    var chart = new ApexCharts(document.querySelector("#hours_chart"), options);
    chart.render();


    var usersOptions = {
        series: [employees, accountants], // Example data: 65 employees and 35 accountants
        chart: {
            type: 'radialBar',
            height: 300
        },
        colors: ['#3ec7d4', '#6ed742'],
        legend: {
            show: true,
            labels: {
                useSeriesColors: true
            }
        },
        plotOptions: {
            radialBar: {
                max: totalUsers,
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function (w) {
                            return totalUsers;
                        }
                    }
                }
            }
        },
        labels: ['Employees', 'Accountants'],
    };

    var chart2 = new ApexCharts(document.querySelector("#users_chart"), usersOptions);
    chart2.render();

})();

$('.week-select').on('change', function () {
    var selectedWeek = $(this).val();
    $.ajax({
        url: '/api/getHealthStats/weekly',
        data: {
            week: selectedWeek,
            user_id: user_id
        },
        success: function (response) {
            depressionChart.updateOptions({
                subtitle: {
                    text: response.depression_percentage + '%'
                }
            });
            depressionChart.updateSeries([{data: [response.depression_percentage]}]);
            anxietyChart.updateOptions({
                subtitle: {
                    text: response.depression_percentage + '%'
                }
            });
            anxietyChart.updateSeries([{data: [response.anxiety_percentage]}]);
            stressChart.updateOptions({
                subtitle: {
                    text: response.depression_percentage + '%'
                }
            });
            stressChart.updateSeries([{data: [response.stress_percentage]}]);
        }
    });
});
$('.month-select').on('change', function () {
    var selectedMonth = $(this).val();
    $.ajax({
        url: '/api/getHealthStats/monthly',
        method: 'GET',
        data: {
            month: selectedMonth,
            user_id: user_id
        },
        success: function (response) {
            chartMonthly.updateSeries([{data: [response.depression_percentage, response.anxiety_percentage, response.stress_percentage]}]);
        }
    });
});
$('#date-select').on('change', function () {
    var selectedYear = $(this).val();
    $.ajax({
        url: '/api/getHealthStats/yearly',
        method: 'GET',
        data: {
            year: selectedYear,
            user_id: user_id
        },
        success: function (response) {
            chartYearly.updateSeries([
                {
                    name: 'Depression',
                    data: response.depression_percentage
                },
                {
                    name: 'Anxiety',
                    data: response.anxiety_percentage
                },
                {
                    name: 'Stress',
                    data: response.stress_percentage
                }
            ]);
        }
    });
});
