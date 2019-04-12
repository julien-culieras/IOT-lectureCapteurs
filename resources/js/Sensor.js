import Chart from "chart.js";

class Sensor {
    constructor(config, context) {
        this.id = config.id;
        this.refreshRate = parseInt(config.refreshRate);
        this.data = [];
        this.chart = null;
        this.context = context;
    }

    refreshData() {
        setInterval(() => {
            fetch(`http://localhost:8000/ajax/sensors/${this.id}/getNewRecord`).then(response => {
                return response.json().then(dataJson => {
                    if(dataJson.record) {
                        const record = dataJson.record[0]
                        this.data.push(record);
                        this.addRecordToChart(record)
                    }
                });
            });
        }, this.refreshRate * 1000);
    }

    addRecordToChart(record) {
        const {recorded_at, value} = record
        this.chart.data.labels.push(recorded_at);
        this.chart.data.datasets.forEach((dataset) => {
            dataset.data.push(value);
        });
        this.chart.update();
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
        this.chart = new Chart(this.context, {
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
