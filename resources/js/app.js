import Sensor from "Sensor.js"

const app = document.getElementById("app")
const canvas = document.createElement("canvas")
app.appendChild(canvas)

const data = {
    sensor: {
        address: "ZPER57:ZERO4587:2384283",
        name: "Temperature sensor"
    },
    records: [
        { date: "2019-03-20 10:03:35", value: "1.5" },
        { date: "2019-03-20 10:04:35", value: "2.5" },
        { date: "2019-03-20 10:05:35", value: "10.5" },
        { date: "2019-03-20 10:06:35", value: "12.5" },
        { date: "2019-03-20 10:07:35", value: "15.5" },
        { date: "2019-03-20 10:08:35", value: "17.5" },
        { date: "2019-03-20 10:09:35", value: "13.5" }
    ]
}

const sensor = new Sensor(data, canvas)
sensor.display()
