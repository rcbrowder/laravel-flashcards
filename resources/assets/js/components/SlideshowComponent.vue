<template>


</template>

<script>

    export default {

        props: ['cardsData'],

        data: () => ({
            cardOrder: [],

        }),

        computed: {

            /**
            * Shuffles array in place.
            * @param {Array} a items An array containing the items.
            */

            determineCardOrder: function() {

                function shuffle(a) {
                var j, x, i;
                for (i = a.length - 1; i > 0; i--) {
                j = Math.floor(Math.random() * (i + 1));
                x = a[i];
                a[i] = a[j];
                a[j] = x;
                }
                return a;
}
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
