<script>
export default {
    name: "App",
}
</script>

<template>
    <div class="p-5" >
        <p>
            <router-link to="/" class="pr-4 nav-item nav-link">Home</router-link>
            <router-link to="/create">Create</router-link>
        </p>
        <div>
            <router-view>

            </router-view>
        </div>
    </div>
</template>

<style scoped>

</style>
