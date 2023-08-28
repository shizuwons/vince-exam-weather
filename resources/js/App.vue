<template>
    <div class="container skyblue-bg">
        <div class="content">
            <div class="search">
                <input class="field" v-model="city" type="text" name="city" placeholder="Add a city"/>
                <button class="btn-search" @click="fetchLocation">Search</button>
            </div>
            <div class="info-container">
                <ul v-for="weather in weatherData">
                    <li class="display">
                        <span class="infotext">
                            {{ formatDate(weather.dt_txt) }} 
                        </span>
                        <span class="degree">
                            {{ convertTemp(weather.main.temp) }} C&deg;
                        </span>
                        <img :src="`${imageUrl}${weather.weather[0].icon}.png`"/>
                    </li>
                    <hr class="divider">
                </ul>
            </div>
            <div class="info-container nearby">
                <p class="infotext">Nearby Places:</p>
                <ul v-for="place in placeData">
                    <li class="display places">
                        <img :src="`${place.categories[0].icon.prefix}32${place.categories[0].icon.suffix}`"/>
                        <p class="address">
                            <span class="placename">{{ place.name }}</span>
                            <p>
                                {{ `${place.location.formatted_address}` }}
                            </p>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script src="./functions.js"></script>