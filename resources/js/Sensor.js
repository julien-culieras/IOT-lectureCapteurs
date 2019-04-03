import Chart from "chart.js"

class Sensor {
    constructor(data, context) {
        this.data = data
        this.context = context
    }

    display() {
        const labels = []
        for (let i = 0; i < this.data.records.length; i++) {
            labels.push(this.data.records[i].date)
        }
        const values = []
        for (let i = 0; i < this.data.records.length; i++) {
            values.push(this.data.records[i].values)
        }
        const chart = new Chart(context, {
            type: "line",
            data: {
                labels,
                datasets: [
                    {
                        label: this.data.sensor.name,
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
        })
    }
}

export default Sensor
