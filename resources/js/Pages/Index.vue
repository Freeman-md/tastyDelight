<template>
    <Head title="Home" />

    <div class="flex flex-col items-start justify-center h-full space-y-8 responsive-container">
      <div class="flex flex-col sm:w-2/5 lg:w-1/3">
        <img :src="$page.props.images.logo" class="object-cover object-center" />
      </div>
      <p class="text-xl font-semibold">Learn about Nigerian Food <br> with with Olanna and Ose!</p>
      <div class="flex items-center space-x-4" v-if="!$page.props.auth.user">
        <Link :href="route('register')" class="button button-orange button-sm">Sign up</Link>
        <Link :href="route('login')" class="button button-purple button-sm">Log in</Link>
      </div>
      <Link v-else :href="route('game')" class="button button-orange button-lg">Let's Play</Link>
    </div>

        
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeButton from '@/Components/Button.vue'
export default {
    layout: BreezeGuestLayout,
    components: {
      Head,
      Link,
      BreezeButton
    },
}
</script>
