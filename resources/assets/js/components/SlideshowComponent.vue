<template>
            <div class="col scene scene--flipcard">
                <div class="flipcard" v-bind:class="{ 'is-flipped' : cardSide }" v-on:click="cardSide = !cardSide">
                    <p class="card-body text-center card__face card__face--front">{{ determineCardOrder[currentIndex].definition }}</p>
                    <p class="card-body text-center card__face card__face--back" >{{ determineCardOrder[currentIndex].term }}</p>
                </div>
            </div>

</template>

<script>

    export default {

        props: ['cardsdata'],

        data: function () {
            return {
                cardArray: [],
                currentIndex: 0,
                cardSide: false,
            }
        },

        methods: {
            next: function() {
                currentIndex++;
            },

            previous: function() {
                currentIndex--;
            }
        },

        computed: {

            // <!-- Shuffles array in place. -->

            determineCardOrder: function() {

                this.cardArray = JSON.parse(this.cardsdata);
                var j, x, i;
                for (i = this.cardArray.length - 1; i > 0; i--) {
                    j = Math.floor(Math.random() * (i + 1));
                    x = this.cardArray[i];
                    this.cardArray[i] = this.cardArray[j];
                    this.cardArray[j] = x;
                }

                return this.cardArray;
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
