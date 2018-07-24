<template>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <
            </div>
            <div class="col">
                <p>{{ determineCardOrder[currentIndex].term }}</p>
                <p>{{ determineCardOrder[currentIndex].definition }}</p>
            </div>
            <div class="col text-right">
                >
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
