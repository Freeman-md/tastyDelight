<template>
    <Head title="Register" />

    <div class="flex items-center h-screen responsive-container">
        <div class="flex flex-col items-start w-1/2 space-y-8">
        
            <div class="flex flex-col items-start space-y-2">
                <h1 class="text-5xl font-bold">Hey, Welcome To Tasty Delight!</h1>
                <span class="text-2xl font-semibold">Create a new profile!</span>
            </div>
            
            <!-- <BreezeValidationErrors class="mb-4" /> -->

            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="flex flex-col w-3/4 space-y-6">
                <div>
                    <BreezeLabel for="username" value="Username" />
                    <BreezeInput id="username" type="text" class="block w-full mt-1" v-model="form.username" autofocus/>
                </div>

                <div class="mt-4">
                    <BreezeLabel for="password" value="Password" />
                    <BreezeInput id="password" type="password" class="block w-full mt-1" v-model="form.password" />
                </div>

                <div class="mt-4">
                    <BreezeLabel value="Select Your Avatar" />
                    <div class="flex items-center space-x-2">
                        <div
                            v-for="(avatar, index) in avatars"
                            :key="index"
                            class="w-24 h-24 rounded-full"
                            @click.prevent="changeAvatar(avatar)"
                        >
                            <img 
                                :src="avatar" 
                                class="object-cover object-center rounded-full"
                                :class="{'border-4 border-red-500': avatar == form.avatar}"
                            />
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <BreezeButton class="button-sm button-purple" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </BreezeButton>
                </div>
            </form>
        </div>
    </div>

    <Characters />
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import Characters from '@/Components/Characters.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    props: {
        status: String
    },

    components: {
        Head,
        Link,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Characters,
    },

    data() {
        return {
            form: this.$inertia.form({
                username: '',
                password: '',
                avatar: ''
            }),
            avatars: [
                this.$page.props.images.avatars.boy.one,
                this.$page.props.images.avatars.girl.one,
                this.$page.props.images.avatars.boy.two,
                this.$page.props.images.avatars.girl.two,
                this.$page.props.images.avatars.boy.three,
                this.$page.props.images.avatars.girl.three
            ]
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password'),
            })
        },
        changeAvatar(avatar) {
            this.form.avatar = avatar
        }
    }
}
</script>
