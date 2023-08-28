import axios from 'axios';

export default {
    data() {
        return {
            city: "Tokyo",
            weatherData: [],
            placeData: [],
            imageUrl: "https://openweathermap.org/img/wn/"
        }
    },
    created() {
        this.fetchLocation();
    },
    methods: {
        fetchLocation() {
            axios.get(`http://localhost:8000/api/location?city=${this.city}`).then((response) => {
                const { weather, place } = response.data;
                this.weatherData = weather.list.slice(0, 6);
                this.placeData = place.results;
            }).catch((error) => {
                //alert("Please enter a valid city");
                console.log(error);    
            });
        },
        convertTemp(temp) {
            return Math.round(temp - 273.15);
        },
        formatDate(dateStr) {
            const date = new Date(dateStr);
            const month = date.getMonth() + 1;
            const day = date.getDate();
            const hour = date.getHours();

            return `${month}/${day} ${hour}:00`;
        }
    },
    mounted() {
        this.fetchLocation();
    }
}