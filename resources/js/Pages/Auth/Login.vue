<template>
    <Head title="Log in" />

    <div class="flex items-center h-screen responsive-container">
        <div class="flex flex-col items-start w-1/2 space-y-8">
        
            <div class="flex flex-col items-start space-y-2">
                <h1 class="text-5xl font-bold">Welcome Back!</h1>
                <span class="text-2xl font-semibold">Login to continue exploring!</span>
            </div>
            
            <BreezeValidationErrors class="mb-4" />

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

                <div class="flex items-center justify-end mt-4">
                    <BreezeButton class="button-sm button-purple" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </BreezeButton>
                </div>
            </form>
        </div>
    </div>

    <Characters />
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import Characters from '@/Components/Characters.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {

    components: {
        Head,
        Link,
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Characters,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                username: '',
                password: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
