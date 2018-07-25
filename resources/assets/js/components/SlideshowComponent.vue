<template>
    <div class="container" id="slidebox">
        <div class="row">
            <div class="col" @click="previous()">
                <img src="/my-icons-collection/png/005-previous.png" alt="">
            </div>

            <div class="col scene scene--flipcard">
                <div class="flipcard" v-bind:class="{ 'is-flipped' : cardSide }" @click="cardSide = !cardSide">
                    <transition name="slide">
                        <p class="card text-center card__face card__face--front">{{ determineCardOrder[currentIndex].definition }}</p>
                    </transition>
                    <transition name="slide">
                        <p class="card text-center card__face card__face--back">{{ determineCardOrder[currentIndex].term }}</p>
                    </transition>
                </div>
            </div>

            <div class="col text-right" @click="next()">
                <img src="/my-icons-collection/png/006-next.png" alt="">
            </div>
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
                slide: 'none',
            }
        },

        methods: {
            next: function() {
                if (this.currentIndex < this.cardArray.length-1) {
                    this.currentIndex++;
                    this.slide = 'right';
                }
            },

            previous: function() {
                if (this.currentIndex > 0) {
                    this.currentIndex--;
                    this.slide= 'left';
                }
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
