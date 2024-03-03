import { Chart, DoughnutController, ArcElement, Tooltip, Legend } from 'chart.js';
import "chartjs-adapter-luxon";

class HungerController extends DoughnutController {

    draw() {
        super.draw(arguments);
        var width = this.chart.width,
            height = this.chart.height;

        var fontSize = (height / 114).toFixed(2);
        this.chart.ctx.font = fontSize + "em Verdana";
        this.chart.ctx.textBaseline = "middle";
        this.chart.ctx.fillStyle = "green";

        var text = this.getStatusText(),
            textX = Math.round((width - this.chart.ctx.measureText(text).width) / 2),
            textY = height - this.chart.ctx.measureText(text).hangingBaseline;

        this.chart.ctx.fillStyle = this.getTextColor();
        this.chart.ctx.fillText(text, textX, textY);
    }

    getStatusText() {
        if (this.chart.hungerLevel >=50) {
            return this.chart.lang['ok'];
        } else if (this.chart.hungerLevel >=20) {
            return this.chart.lang['hungry'];
        }
        return this.chart.lang['starving'];
    }

    getTextColor() {
        if (this.chart.hungerLevel >=50) {
            return "green";
        } else if (this.chart.hungerLevel >=20) {
            return "orange";
        }
        return "red";
    }
}

HungerController.id = 'hunger';
HungerController.defaults = DoughnutController.defaults;

Chart.register(HungerController, ArcElement, Tooltip, Legend);

export { Chart };
