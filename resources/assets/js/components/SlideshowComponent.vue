<template>

    <div class="container">
        <div v-for="card in determineCardOrder">
            <p>{{ card }}</p>
        </div>
    </div>

</template>

<script>

    export default {

        props: ['cardsdata'],

        data: function () {
            return {
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
