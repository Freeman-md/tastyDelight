<template>
  <Head title="Edit Profile" />

  <div class="fixed left-0 py-2 pl-8 pr-32 text-xl font-semibold text-center text-white rounded-r-3xl top-24 bg-light-purple">Edit Your Profile</div>

  <div class="flex items-start justify-center h-full pt-40 space-x-6 responsive-container">
    
    <div class="flex w-3/4 h-full p-4 space-x-2 bg-white border-4 rounded-t-13xl border-dark-purple">

      <!-- Go Back To Profile -->
      <Link :href="route('profile', { user })" class="absolute flex items-center justify-center w-10 h-10 p-2 text-2xl font-bold text-white border-4 rounded-full top-40 right-72 bg-light-purple border-dark-purple">
        <span class="fa fa-times"></span>
      </Link>
    
      <!-- Profile Avatar -->
      <div class="flex flex-col items-center space-y-2">
        <img :src="$page.props.auth.user.avatar" class="w-32 h-32" />
        <Link :href="route('profile.avatar', { user })" class="flex flex-col items-center text-lg font-semibold button button-orange button-sm">
          <span class="fas fa-camera"></span>
          <span>Change</span>
          <span>Your</span>
          <span>Avatar</span>
        </Link>
      </div>

      <!-- Profile Information -->
      <div class="flex-grow w-2/3 h-full ">
        <form @submit.prevent="submit" class="flex flex-col responsive-container">
          
          <div class="flex flex-col items-start w-3/4 space-y-4">
            <div class="w-full">
              <BreezeLabel for="username" value="Change your username" />
              <BreezeInput id="username" type="text" class="block w-full mt-1" v-model="form.username" autofocus/>
            </div>

            <div class="w-full">
              <BreezeLabel for="age" value="Change your age" />
              <BreezeInput id="age" type="text" class="block w-full mt-1" v-model="form.age" />
            </div>

            <div class="w-full">
              <BreezeLabel for="password" value="Change your password" />
              <BreezeInput id="password" type="password" class="block w-full mt-1" v-model="form.password" />
            </div>
          </div>

          <div class="flex items-center justify-end mt-4">
            <BreezeButton class="button-sm button button-green" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Save Changes
            </BreezeButton>
          </div>

        </form>
      </div>
      
    </div>

    

  </div>
  
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest'
import BreezeLabel from '@/Components/Label.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeButton from '@/Components/Button.vue'
export default {
  layout: BreezeGuestLayout,
  components: {
    Head, 
    Link,
    BreezeLabel,
    BreezeInput,
    BreezeButton
  },
  props: {
    user: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
        form: this.$inertia.form({
            username: this.user.username,
            age: this.user.age,
            password: ''
        })
    }
  },

  methods: {
    submit() {
      this.form.put(this.route('profile.edit', {user: this.user}), {
        onFinish: () => this.form.reset('password'),
      })
    }
  }
}
</script>