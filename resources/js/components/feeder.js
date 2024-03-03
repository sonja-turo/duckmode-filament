import { Chart } from "../hunger-chart";

export default function duckFeederWidget({ chart, lang, starvationRate}) {
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
            }, starvationRate);

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
            const newChart = new Chart(this.$refs.canvas, {
                type: chart.type,
                data: chart.cachedData,
                options: chart.options,
            });
            newChart.hungerLevel = this.hungerLevel;
            newChart.lang = lang;
            return newChart;
        },
        updateChart() {
            const chart = this.getChart()
            chart.data = {
                datasets:[{
                    data: [this.hungerLevel, 100 - this.hungerLevel],
                    backgroundColor: [this.getStateColour(), "Gray"]
                }],
                lang: lang
            }
            chart.hungerLevel = this.hungerLevel;
            chart.update('resize')
        },
        getStateColour() {
            return this.hungerLevel >=50 ? "Green": this.hungerLevel >= 20 ? "Orange": "Red";
        },
        getChart() {
            return Chart.getChart(this.$refs.canvas);
        }
    }
}
