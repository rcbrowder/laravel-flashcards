<template>

    <div class="container">
        <p>{{ cardsData }}</p>
    </div>

</template>

<script>

    export default {

        props: ['cards-data'],

        data: function () {
            return {
                cardsShit:0
            }
        },

        computed: {

            /**
            * Shuffles array in place.
            * @param {Array} a items An array containing the items.
            */

            determineCardOrder: function() {

                var cardArray = this.cardsData;


                return cardArray;
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
