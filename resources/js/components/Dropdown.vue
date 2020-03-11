<template>
    <div class="dropdown relative">
        <div class="dropdown-toggle hover:bg-green-400 rounded"
            aria-haspopup="true"
            aria-expanded="isOpen"
            @click.prevent="isOpen = !isOpen">
            <slot name="trigger"></slot>
        </div>
        <div v-show="isOpen" class="dropdown-menu absolute bg-white py-2 rounded shadow mt-2 w-full">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return { isOpen: false }
    },

    watch: {
        isOpen(isOpen) {
            if (isOpen) {
                document.addEventListener('click', this.closeIfClickedOutside);

            }
        }
    },

    methods: {
        closeIfClickedOutside(event) {
            if (! event.target.closest('.dropdown')) {
                this.isOpen = false;

             document.removeEventListener('click', this.closeIfClickedOutside);
            }
        }
    }
}
</script>
