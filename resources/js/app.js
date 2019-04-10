import Sensor from "./Sensor.js";

const app = document.getElementById("app");
const canvas = document.createElement("canvas");
app.appendChild(canvas);

const config = {
    id: app.getAttribute("data-sensor"),
    refreshRate: app.getAttribute("data-refreshInterval")
}

const sensor = new Sensor(config, canvas);
sensor.getInitialData(() => {
    sensor.display();
});
