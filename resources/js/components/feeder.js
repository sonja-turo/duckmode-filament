import { Chart } from "../hunger-chart";

export default function duckFeederWidget({duckId, chart, lang, starvationRate, breadHealth}) {
    return {
        hungerLevel: 100,
        ducksMurdered: 0,
        audioPlayed: false,
        init() {
            const duckState = localStorage.getItem('duck-mode.state-'+duckId) ||
                JSON.stringify({hungerLevel: this.hungerLevel, ducksMurdered: this.ducksMurdered});
            
            const state = JSON.parse(duckState);
            this.hungerLevel = parseInt(state.hungerLevel) ?? 100;
            this.ducksMurdered = parseInt(state.ducksMurdered) ?? 0;

            this.initChart();

            setInterval(() => {
                this.hungerLevel--;

                if (this.hungerLevel < 0) {
                    this.hungerLevel = 100;
                    this.ducksMurdered++;
                    this.dispatchMurderEvent();
                }
                localStorage.setItem('duck-mode.state-'+duckId, JSON.stringify({hungerLevel: this.hungerLevel, ducksMurdered: this.ducksMurdered}));
                this.updateChart();
            }, starvationRate);

            // Prevent audio spam
            setInterval(() => {
                this.audioPlayed = false;
            }, 3000)
            this.updateChart();
        },
        feedDuck() {
            if (!this.audioPlayed) {
                this.$refs.duckmodeAudio.play();
                this.audioPlayed = true;
            }

            this.hungerLevel += breadHealth;
            if (this.hungerLevel > 100) {
                this.hungerLevel = 100;
            }
            localStorage.setItem('duck-mode.state-'+duckId, JSON.stringify({hungerLevel: this.hungerLevel, ducksMurdered: this.ducksMurdered}));
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
                datasets: [{
                    data: [this.hungerLevel, 100 - this.hungerLevel],
                    backgroundColor: [this.getStateColour(), "Gray"]
                }],
                lang: lang
            }
            chart.hungerLevel = this.hungerLevel;
            chart.update('resize')
        },
        getStateColour() {
            return this.hungerLevel >= 50 ? "Green" : this.hungerLevel >= 20 ? "Orange" : "Red";
        },
        getChart() {
            return Chart.getChart(this.$refs.canvas);
        },
        dispatchMurderEvent() {
            Livewire.dispatch('duck-murder');
        }
    }
}
