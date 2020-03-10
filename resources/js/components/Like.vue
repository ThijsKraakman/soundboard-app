<template>
<div>
    <button type="submit" :class="classes" v-bind:disabled="isOwner" @click="toggle">thumb_up</button>
    <span class="align-bottom ml-2 text-white" v-text="likeCount"></span>
</div>

</template>

<script>
export default {
    props: ['sound'],

    data() {
        return {
            likeCount: this.sound.likeCount,
            isLiked: this.sound.isLiked,
            isOwner: this.sound.isOwner
        }
    },

    computed: {
        classes() {
            if (this.isOwner === false) {
                return ['material-icons align-middle',
                    this.isLiked ? 'text-green-400 hover:text-red-400' : 'text-white hover:text-green-400']
            } else {
                return ['material-icons align-middle text-gray-400']
            }
        }
    },

    methods: {
        toggle() {
            axios.post('/sounds/' + this.sound.id + '/likes');
            if (this.isLiked) {
                this.isLiked = false;
                this.likeCount--;
            } else {
                this.isLiked = true;
                this.likeCount++;
            }
        }
    }
}
</script>
