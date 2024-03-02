export default function duckFeederWidget() {
    return {
        hungerLevel: 100,
        ducksMurdered: 0,
        audioPlayed: false,
        init() {
            setInterval(() => {
                this.hungerLevel--;
                if (this.hungerLevel < 0) {
                    this.hungerLevel = 100;
                    this.ducksMurdered++; 
                }
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
        }
    }
}
