export default function duckTopNav() {
    return {
        ducksMurdered: 0,

        init() {
            const duckState = localStorage.getItem('duck-mode.topnav') ||
                JSON.stringify({ducksMurdered: this.ducksMurdered});
            const state = JSON.parse(duckState);
            this.ducksMurdered = parseInt(state.ducksMurdered) ?? 0;
        },

        duckMurdered(e) {
            this.ducksMurdered++;
            localStorage.setItem('duck-mode.topnav', JSON.stringify({ducksMurdered: this.ducksMurdered}));
        }
    }
}
