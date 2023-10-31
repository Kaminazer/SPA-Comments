<script>
export default {
    name: "Create",
    data() {
        return {
            user_name: null,
            user_email: null,
            text: null,
            comments: [],
            errored: false,
            loading: false,
            captchaImage: '',
            captchaJson: '',
            captchaInput: '',
        }
    },
    methods: {
        addComment(){
            this.loading = true
            axios.post('api/comment', {
                user_name: this.user_name,
                user_email: this.user_email,
                text: this.text,
            })
                .then(response => {
                    this.redirectToComments()
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() => {
                    this.loading = false
                })
        },
        redirectToComments() {
            this.$router.push('/');
        },
        getCaptcha() {
            // Робимо запит на сервер для отримання CAPTCHA
            axios.get('/api/get-captcha')
                .then(response => {
                    this.setImageFromBase64(response.data.captcha);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        setImageFromBase64(base64Data) {
            this.captchaImage = `data:image/png;base64,${base64Data}`;
        },
        checkCaptcha() {
            // Ваш код для відправлення введеного CAPTCHA-коду на сервер та валідації
        },
    },
    mounted() {
        // Викликаємо метод getCaptcha при завантаженні компонента
        this.getCaptcha();
    },
}
</script>

<template>
    <div class="container">
        <h1 class="text-4xl text-center">Add comments</h1>
        <form @submit.prevent="addComment">
            <div class="mb-6">
                <label for="user_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Name</label>
                <input type="text" id="user_name" v-model="user_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="User Name" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                <input type="email" id="email" v-model="user_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
            </div>
            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text</label>
                <input type="text" id="text" v-model="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your comment" required>
            </div>
            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter captcha</label>
                <img :src="captchaImage" alt="CAPTCHA">
                <input type="text" id="text" v-model="captchaInput" class=" mt-2 mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter captcha" required>
                <button @click="checkCaptcha">Submit</button>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

        <div  class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"  v-if="errored" role="alert">
            <span class="font-medium">Помилка завантаження даних</span>
        </div>
        <div class="text-center" v-if="loading">
            <div role="status">
                <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Завантаження...</span>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
