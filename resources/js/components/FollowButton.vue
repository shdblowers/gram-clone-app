<template>
   <div>
       <a href="#" class="btn btn-primary" @click="followUser">Follow Me</a>
   </div>
</template>

<script>
export default {
    props: ['userId'],

    mounted() {
        console.log('Component mounted.')
    },

    methods: {
        followUser() {
            axios.post(`/follow/${this.userId}`).then((response) => {alert(response.data)})
        }
    }
}
</script>
