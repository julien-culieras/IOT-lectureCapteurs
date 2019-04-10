import Chart from "chart.js";

class Sensor {
    constructor(config, context) {
        this.id = config.id;
        this.refreshRate = config.refreshRate;
        this.data = [];
        this.context = context;
    }

    refreshData() {
        setInterval(() => {
            fetch(`http://localhost:8000/ajax/sensors/${this.id}/getNewRecord`).then(response => {
                return response.json().then(dataJson => {
                    dataJson.record && this.data.push(dataJson.record);
                    console.log("new value:", dataJson);
                });
            });
        }, this.refreshRate);
    }

    getInitialData(cb) {
        fetch(`http://localhost:8000/ajax/sensors/${this.id}/getLastRecords`).then(response => {
            return response.json().then(dataJson => {
                this.data = dataJson.reverse();
                cb();
                this.refreshData();
            });
        });
    }

    display() {
        const labels = [];
        for (let i = 0; i < this.data.length; i++) {
            labels.push(this.data[i].recorded_at);
        }
        const values = [];
        for (let i = 0; i < this.data.length; i++) {
            values.push(this.data[i].value);
        }
        const chart = new Chart(this.context, {
            type: "line",
            data: {
                labels,
                datasets: [
                    {
                        label: "un snsor",
                        backgroundColor: "rgb(255, 99, 132)",
                        borderColor: "rgb(255, 99, 132)",
                        data: values
                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: "Sensor chart"
                },
                tooltips: {
                    mode: "index",
                    intersect: false
                },
                hover: {
                    mode: "nearest",
                    intersect: true
                },
                scales: {
                    xAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: "Time"
                            }
                        }
                    ],
                    yAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: "Value"
                            }
                        }
                    ]
                }
            }
        });
    }
}

export default Sensor;
