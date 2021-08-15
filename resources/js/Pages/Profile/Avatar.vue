<template>
    <Head title="Profile Avatar" />

    <Link 
        :href="route('profile.edit', { user })"
        class="fixed flex items-center justify-center text-xl font-bold text-white top-5 left-5 button button-xlg button-orange"
    >
        <span class="fas fa-arrow-left"></span>
    </Link>

    <div class="flex items-center h-screen responsive-container">
        <div class="flex flex-col items-center w-full space-y-8">
        
            <h6 class="text-4xl font-semibold">Select an Avatar: </h6>
            
            <BreezeValidationErrors class="mb-4" />

            <form @submit.prevent="submit" class="flex flex-col space-y-6">

                <div class="flex items-center space-x-2">
                  <div
                      v-for="(avatar, index) in avatars"
                      v-show="avatar !== user.avatar"
                      :key="index"
                      class="w-40 h-40 rounded-full"
                      @click.prevent="changeAvatar(avatar)"
                  >
                      <img 
                          :src="avatar" 
                          class="object-cover object-center rounded-full"
                          :class="{'border-4 border-red-500': avatar == form.avatar}"
                      />
                  </div>
                </div>
                

                <div class="flex justify-center">
                    <BreezeButton class="button-xlg button-purple" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Continue
                    </BreezeButton>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import BreezeButton from '@/Components/Button.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {

    components: {
        Head,
        Link,
        BreezeValidationErrors,
        BreezeButton
    },

    props: {
        user: {
          type: Object,
          required: true,
        }
    },

    data() {
        return {
            form: this.$inertia.form({
                avatar: '',
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
            this.form.put(this.route('profile.avatar', { user: this.user }))
        },
        changeAvatar(avatar) {
            this.form.avatar = avatar
        }
    }
}
</script>
