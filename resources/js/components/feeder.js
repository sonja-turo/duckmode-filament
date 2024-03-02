import { Chart } from "chart.js/auto";
import "chartjs-adapter-luxon";

export default function duckFeederWidget(data) {
    return {
        hungerLevel: 100,
        ducksMurdered: 0,
        audioPlayed: false,
        init() {
            this.initChart();

            setInterval(() => {
                this.hungerLevel--;

                if (this.hungerLevel < 0) {
                    this.hungerLevel = 100;
                    this.ducksMurdered++; 
                }
                this.updateChart();
            }, 1000);

            // Prevent audio spam
            setInterval(() => {
                this.audioPlayed = false;
            }, 3000)
        },
        feedDuck() {
            if (!this.audioPlayed) {
                this.$refs.duckmodeAudio.play();
                this.audioPlayed = true;
            }
            
            this.hungerLevel +=5;
            if (this.hungerLevel > 100) {
                this.hungerLevel = 100;
            }
            this.updateChart();
        },

        initChart() {

            Chart.defaults.plugins.tooltip.enabled = false;
            Chart.defaults.plugins.legend.display = false;
            return new Chart(this.$refs.canvas, {
                type: data.chart.type,
                data: data.chart.cachedData,
                options: data.chart.options,
            });
        },
        updateChart() {
            let chart = this.getChart()
            chart.data = {
                datasets:[{
                    data: [this.hungerLevel, 100 - this.hungerLevel],
                    backgroundColor: [this.getStateColour(), "Gray"]
                }]
            }
            chart.update('resize')
        },
        getStateColour() {
            return this.hungerLevel >=50 ? "Green": this.hungerLevel >= 15 ? "Orange": "Red";
        },
        getChart() {
            return Chart.getChart(this.$refs.canvas);
        }
    }
}
